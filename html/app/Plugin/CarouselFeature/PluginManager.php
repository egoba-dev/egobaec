<?php

namespace Plugin\CarouselFeature;

use Eccube\Entity\Block;
use Eccube\Entity\BlockPosition;
use Eccube\Plugin\AbstractPluginManager;
use Psr\Container\ContainerInterface;
use Symfony\Component\Filesystem\Filesystem;

/**
 * プラグインマネージャー
 * プラグインのインストール・アンインストール時の処理
 */
class PluginManager extends AbstractPluginManager
{
    /**
     * プラグインインストール時
     */
    public function install(array $meta, ContainerInterface $container)
    {
        error_log('[CarouselFeature][PluginManager] Install start');
        
        // アップロードディレクトリ作成
        $this->createUploadDirectory($container);
        
        error_log('[CarouselFeature][PluginManager] Install completed');
    }

    /**
     * プラグイン有効化時
     */
    public function enable(array $meta, ContainerInterface $container)
    {
        error_log('[CarouselFeature][PluginManager] Enable start');
        
        try {
            // アップロードディレクトリ確認
            $this->createUploadDirectory($container);
            
            // ブロック作成
            $this->createBlock($container);
            
            // テンプレートコピー
            $this->copyTemplate($container);
            
            // 初期設定作成
            $this->initializeConfig($container);
            
            error_log('[CarouselFeature][PluginManager] Enable completed successfully');
        } catch (\Exception $e) {
            error_log('[CarouselFeature][PluginManager] Enable error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * プラグイン無効化時
     */
    public function disable(array $meta, ContainerInterface $container)
    {
        error_log('[CarouselFeature][PluginManager] Disable start');
        
        try {
            // ブロック削除
            $this->removeBlock($container);
            
            // テンプレート削除
            $this->removeTemplate($container);
            
            error_log('[CarouselFeature][PluginManager] Disable completed successfully');
        } catch (\Exception $e) {
            error_log('[CarouselFeature][PluginManager] Disable error: ' . $e->getMessage());
        }
    }

    /**
     * プラグインアンインストール時
     */
    public function uninstall(array $meta, ContainerInterface $container)
    {
        error_log('[CarouselFeature][PluginManager] Uninstall start');
        
        try {
            // ファイルクリーンアップの確認
            $this->confirmFileCleanup($container);
            
            error_log('[CarouselFeature][PluginManager] Uninstall completed successfully');
        } catch (\Exception $e) {
            error_log('[CarouselFeature][PluginManager] Uninstall error: ' . $e->getMessage());
        }
    }

    /**
     * プラグインアップデート時
     */
    public function update(array $meta, ContainerInterface $container)
    {
        // アップロードディレクトリの確認
        $this->createUploadDirectory($container);
        
        // ブロックの確認・作成
        $this->createBlock($container);
        
        // テンプレートの確認・更新
        $this->copyTemplate($container);
    }

    /**
     * ブロック作成
     */
    protected function createBlock(ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine.orm.entity_manager');
        $blockRepository = $entityManager->getRepository(Block::class);
        
        // 既存ブロックチェック
        $block = $blockRepository->findOneBy(['file_name' => 'carousel_feature']);
        
        if (!$block) {
            $block = new Block();
            $block->setName('カルーセル特集');
            $block->setFileName('carousel_feature');
            $block->setUseController(true); // コントローラーを使用
            $block->setDeletable(false); // 削除不可
            
            $entityManager->persist($block);
            $entityManager->flush();
            
            error_log('[CarouselFeature][PluginManager] Block created with ID: ' . $block->getId());
        } else {
            // 既存ブロックの設定を更新（重要：UseControllerを必ずtrueに）
            $block->setUseController(true);
            $block->setDeletable(false);
            $entityManager->persist($block);
            $entityManager->flush();
            error_log('[CarouselFeature][PluginManager] Block already exists and updated');
        }
    }

    /**
     * ブロック削除
     */
    protected function removeBlock(ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine.orm.entity_manager');
        $blockRepository = $entityManager->getRepository(Block::class);
        
        $block = $blockRepository->findOneBy(['file_name' => 'carousel_feature']);
        
        if ($block) {
            // ブロック配置情報も削除
            $blockPositions = $entityManager->getRepository(BlockPosition::class)
                ->findBy(['Block' => $block]);
            
            foreach ($blockPositions as $blockPosition) {
                $entityManager->remove($blockPosition);
            }
            
            $entityManager->remove($block);
            $entityManager->flush();
            
            error_log('[CarouselFeature][PluginManager] Block removed');
        }
    }

    /**
     * テンプレートコピー
     */
    protected function copyTemplate(ContainerInterface $container)
    {
        $sourceFile = __DIR__ . '/Resource/template/Block/carousel.twig';
        
        // プラグイン内部のテンプレート配置先
        $pluginInternalTargets = [
            __DIR__ . '/Resource/template/Block/',
            __DIR__ . '/Resource/template/default/Block/',
        ];
        
        foreach ($pluginInternalTargets as $targetDir) {
            try {
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                
                $targetFile = $targetDir . 'carousel_feature.twig';
                
                // carousel.twig が存在する場合は carousel_feature.twig としてコピー
                if (file_exists($sourceFile)) {
                    copy($sourceFile, $targetFile);
                    error_log('[CarouselFeature] Template copied to: ' . $targetFile);
                } else {
                    error_log('[CarouselFeature] Source template not found: ' . $sourceFile);
                }
            } catch (\Exception $e) {
                error_log('[CarouselFeature] Template copy failed: ' . $e->getMessage());
            }
        }
    }

    /**
     * テンプレート削除
     */
    protected function removeTemplate(ContainerInterface $container)
    {
        $templatePaths = [
            __DIR__ . '/Resource/template/Block/carousel_feature.twig',
            __DIR__ . '/Resource/template/default/Block/carousel_feature.twig',
        ];
        
        foreach ($templatePaths as $templatePath) {
            if (file_exists($templatePath)) {
                unlink($templatePath);
                error_log('[CarouselFeature] Template removed: ' . $templatePath);
            }
        }
    }

   /**
     * アップロードディレクトリを作成
     */
    private function createUploadDirectory(ContainerInterface $container)
    {
        // EccubeConfigからHTMLディレクトリを取得
        $eccubeConfig = $container->get('Eccube\Common\EccubeConfig');
        $htmlDir = $eccubeConfig->get('eccube_html_dir'); // /var/www/html/html
        
        // Webからアクセス可能なディレクトリは親ディレクトリ
        $webRoot = dirname($htmlDir); // /var/www/html
        $uploadDir = $webRoot . '/upload/carousel_feature';
        
        error_log('[CarouselFeature] HTML dir from config: ' . $htmlDir);
        error_log('[CarouselFeature] Web root: ' . $webRoot);
        error_log('[CarouselFeature] Upload dir: ' . $uploadDir);
        
        $filesystem = new Filesystem();
        
        if (!$filesystem->exists($uploadDir)) {
            $filesystem->mkdir($uploadDir, 0755);
            error_log('[CarouselFeature] Created upload directory: ' . $uploadDir);
        }

        // セキュリティ用.htaccessファイル作成
        $htaccessPath = $uploadDir . '/.htaccess';
        if (!$filesystem->exists($htaccessPath)) {
            $htaccessContent = $this->getSimpleSecurityHtaccessContent();
            $filesystem->dumpFile($htaccessPath, $htaccessContent);
            error_log('[CarouselFeature] Created .htaccess: ' . $htaccessPath);
        }

        // index.htmlファイル作成
        $indexPath = $uploadDir . '/index.html';
        if (!$filesystem->exists($indexPath)) {
            $filesystem->dumpFile($indexPath, '<!-- Directory listing disabled -->');
        }
        
        return $uploadDir;
    }


      /**
     * シンプルなセキュリティ用.htaccessの内容を取得
     */
    private function getSimpleSecurityHtaccessContent()
    {
        return <<<HTACCESS
# CarouselFeature Upload Security
<FilesMatch "\\.(php|phtml|php3|php4|php5|php7|php8|pl|py|jsp|asp|aspx|sh|cgi|exe|com|bat|cmd|scr|vbs|js|htaccess|htpasswd)$">
    order allow,deny
    deny from all
</FilesMatch>

<FilesMatch "\\.(jpg|jpeg|png|gif|webp|bmp|ico|svg)$">
    order allow,deny
    allow from all
</FilesMatch>

<FilesMatch "^\\.|~$|\\.bak$|\\.backup$|\\.old$|\\.tmp$|\\.temp$">
    order allow,deny
    deny from all
</FilesMatch>
HTACCESS;
    }
    /**
     * ファイルクリーンアップの確認
     */
    private function confirmFileCleanup(ContainerInterface $container)
    {
        $eccubeConfig = $container->get('Eccube\Common\EccubeConfig');
        $uploadDir = $eccubeConfig->get('eccube_html_dir') . '/upload/carousel_feature';
        
        $filesystem = new Filesystem();
        
        if ($filesystem->exists($uploadDir)) {
            // アップロードされたファイルの存在確認
            $files = glob($uploadDir . '/*');
            $imageFiles = array_filter($files, function($file) {
                return is_file($file) && !in_array(basename($file), ['.htaccess', 'index.html']);
            });

            if (!empty($imageFiles)) {
                // ファイルが存在する場合の警告ログ
                error_log(sprintf(
                    'CarouselFeature: %d個のアップロードファイルが残っています。手動で削除してください: %s',
                    count($imageFiles),
                    $uploadDir
                ));
            }
        }
    }

    /**
     * プラグイン設定の初期化
     */
    public function initializeConfig(ContainerInterface $container)
    {
        try {
            $entityManager = $container->get('doctrine.orm.entity_manager');
            
            // 設定テーブルの確認
            $configRepo = $entityManager->getRepository('Plugin\CarouselFeature\Entity\CarouselConfig');
            $config = $configRepo->find(1);
            
            if (!$config) {
                // デフォルト設定を作成
                $configService = $container->get('Plugin\CarouselFeature\Service\ConfigService');
                $configService->getConfig(); // これによりデフォルト設定が作成される
                
                error_log('[CarouselFeature] Default config created');
            }
            
        } catch (\Exception $e) {
            error_log('CarouselFeature初期化エラー: ' . $e->getMessage());
        }
    }
}