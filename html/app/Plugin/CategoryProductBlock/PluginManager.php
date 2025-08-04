<?php

namespace Plugin\CategoryProductBlock;

use Eccube\Entity\Block;
use Eccube\Entity\BlockPosition;
use Eccube\Entity\Page;
use Eccube\Plugin\AbstractPluginManager;
use Eccube\Repository\BlockRepository;
use Eccube\Repository\PageRepository;
use Plugin\CategoryProductBlock\Entity\Config;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;

class PluginManager extends AbstractPluginManager
{
    public function enable(array $meta, ContainerInterface $container)
    {
        try {
            error_log('[CategoryProductBlock][PluginManager] Enable start');
            
            $this->createTable($container);
            $this->createConfig($container);
            $this->createBlock($container);
            $this->copyTemplate($container);
            
            error_log('[CategoryProductBlock][PluginManager] Enable completed successfully');
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock][PluginManager] Enable error: ' . $e->getMessage());
            error_log('[CategoryProductBlock][PluginManager] Stack trace: ' . $e->getTraceAsString());
            throw $e;
        }
    }

    public function disable(array $meta, ContainerInterface $container)
    {
        try {
            error_log('[CategoryProductBlock][PluginManager] Disable start');
            
            $this->removeBlock($container);
            $this->removeTemplate($container);
            
            error_log('[CategoryProductBlock][PluginManager] Disable completed successfully');
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock][PluginManager] Disable error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function uninstall(array $meta, ContainerInterface $container)
    {
        try {
            error_log('[CategoryProductBlock][PluginManager] Uninstall start');
            
            $this->dropTable($container);
            
            error_log('[CategoryProductBlock][PluginManager] Uninstall completed successfully');
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock][PluginManager] Uninstall error: ' . $e->getMessage());
            throw $e;
        }
    }

    private function createTable(ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine.orm.entity_manager');
        $connection = $entityManager->getConnection();
        $schemaManager = $connection->getSchemaManager();

        $tableName = 'plg_category_product_block_config';
        if ($schemaManager->tablesExist([$tableName])) {
            error_log('[CategoryProductBlock] Table already exists');
            return;
        }

        $sql = "
            CREATE TABLE IF NOT EXISTS {$tableName} (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                display_count INTEGER NOT NULL DEFAULT 10,
                columns_count INTEGER NOT NULL DEFAULT 5,
                rows_count INTEGER NOT NULL DEFAULT 2,
                show_category_tags BOOLEAN NOT NULL DEFAULT 1,
                show_product_list_button BOOLEAN NOT NULL DEFAULT 1,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )
        ";

        try {
            $connection->executeStatement($sql);
            error_log('[CategoryProductBlock] Table created successfully');
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock] Table creation failed: ' . $e->getMessage());
            throw $e;
        }
    }

    private function dropTable(ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine.orm.entity_manager');
        $connection = $entityManager->getConnection();
        $tableName = 'plg_category_product_block_config';

        try {
            $sql = "DROP TABLE IF EXISTS {$tableName}";
            $connection->executeStatement($sql);
            error_log('[CategoryProductBlock] Table dropped successfully');
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock] Table drop failed: ' . $e->getMessage());
        }
    }

    protected function createConfig(ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine.orm.entity_manager');
        
        try {
            $configRepository = $entityManager->getRepository(Config::class);
            $existingConfig = $configRepository->findOneBy([]);

            if (!$existingConfig) {
                $config = new Config();
                $config->setDisplayCount(10);
                $config->setColumnsCount(5);
                $config->setRowsCount(2);
                $config->setShowCategoryTags(true);
                $config->setShowProductListButton(true);
                
                $entityManager->persist($config);
                $entityManager->flush();
                
                error_log('[CategoryProductBlock][PluginManager] Config created');
            } else {
                error_log('[CategoryProductBlock][PluginManager] Config already exists');
            }
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock][PluginManager] Config creation error: ' . $e->getMessage());
        }
    }

    protected function createBlock(ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine.orm.entity_manager');
        $blockRepository = $entityManager->getRepository(Block::class);
        
        $block = $blockRepository->findOneBy(['file_name' => 'category_product_block']);
        if (!$block) {
            $block = new Block();
            $block->setName('カテゴリー商品ブロック');
            $block->setFileName('category_product_block');
            $block->setUseController(false);
            $block->setDeletable(false);
            
            $entityManager->persist($block);
            $entityManager->flush();
            
            error_log('[CategoryProductBlock][PluginManager] Block created: ' . $block->getId());
        }
    }

    protected function removeBlock(ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine.orm.entity_manager');
        $blockRepository = $entityManager->getRepository(Block::class);
        
        $block = $blockRepository->findOneBy(['file_name' => 'category_product_block']);
        if ($block) {
            $blockPositions = $entityManager->getRepository(BlockPosition::class)
                ->findBy(['Block' => $block]);
            
            foreach ($blockPositions as $blockPosition) {
                $entityManager->remove($blockPosition);
            }
            
            $entityManager->remove($block);
            $entityManager->flush();
            
            error_log('[CategoryProductBlock][PluginManager] Block removed');
        }
    }

    private function copyTemplate(ContainerInterface $container)
    {
        $sourceFile = __DIR__ . '/Resource/template/Block/category_product_block.twig';
        
        $pluginInternalTargets = [
            __DIR__ . '/Resource/template/',
            __DIR__ . '/Resource/template/default/',
            __DIR__ . '/Resource/template/default/Block/',
            __DIR__ . '/Block/',
        ];
        
        foreach ($pluginInternalTargets as $targetDir) {
            try {
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                
                $targetFile = $targetDir . 'category_product_block.twig';
                if (file_exists($sourceFile)) {
                    copy($sourceFile, $targetFile);
                    error_log('[CategoryProductBlock] Internal template copied to: ' . $targetFile);
                }
            } catch (\Exception $e) {
                error_log('[CategoryProductBlock] Internal template copy failed: ' . $e->getMessage());
            }
        }
    }

    protected function removeTemplate(ContainerInterface $container)
    {
        $targetFile = __DIR__ . '/../../../../app/template/default/Block/category_product_block.twig';
        
        if (file_exists($targetFile)) {
            unlink($targetFile);
            error_log('[CategoryProductBlock][PluginManager] Template removed: ' . $targetFile);
        }
    }
}