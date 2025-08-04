<?php

namespace Plugin\CategoryProductBlock\Repository;

use Eccube\Repository\AbstractRepository;
use Plugin\CategoryProductBlock\Entity\Config;
use Doctrine\Persistence\ManagerRegistry;

class ConfigRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Config::class);
    }

    public function get(): ?Config
    {
        try {
            $config = $this->findOneBy([]);
            
            if (!$config) {
                // 設定が存在しない場合はデフォルト設定を作成して返す
                $config = $this->createDefaultConfig();
                error_log('[CategoryProductBlock] Config not found, created default config');
            }
            
            return $config;
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock] ConfigRepository get error: ' . $e->getMessage());
            // エラーの場合もデフォルト設定を返す
            return $this->createDefaultConfig();
        }
    }

    /**
     * デフォルト設定を作成
     */
    private function createDefaultConfig(): Config
    {
        $config = new Config();
        $config->setDisplayCount(10);
        $config->setColumnsCount(5);
        $config->setRowsCount(2);
        $config->setShowCategoryTags(true);
        $config->setShowProductListButton(true);
        
        return $config;
    }

    /**
     * 設定を保存（親クラスの save メソッドをオーバーライド）
     */
    public function save($entity)
    {
        try {
            $this->getEntityManager()->persist($entity);
            $this->getEntityManager()->flush();
            error_log('[CategoryProductBlock] Config saved successfully');
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock] Config save error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * 設定専用の保存メソッド
     */
    public function saveConfig(Config $config): void
    {
        $this->save($config);
    }
}