<?php

namespace Plugin\LeftTextBlock;

use Eccube\Plugin\AbstractPluginManager;
use Eccube\Common\EccubeConfig;
use Doctrine\DBAL\Schema\Schema;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;

class PluginManager extends AbstractPluginManager
{
    public function install(array $meta, ContainerInterface $container)
    {
        // テーブル作成
        $this->createTable($container);
    }

    public function uninstall(array $meta, ContainerInterface $container)
    {
        // テーブル削除
        $this->dropTable($container);
        
        // ブロック削除
        $this->removeAllBlocks($container);
    }

    public function enable(array $meta, ContainerInterface $container)
    {
        try {
            // 有効化時の処理
            // テーブル作成（既存テーブルがない場合）
            $this->createTable($container);
            
            // デフォルトデータの作成（必要に応じて）
            $this->createDefaultData($container);
            
            error_log('LeftTextBlock: Plugin enabled successfully');
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Plugin enable failed - ' . $e->getMessage());
            // エラーが発生しても例外は投げない
        }
    }

    public function disable(array $meta, ContainerInterface $container)
    {
        // EC-CUBE 5でのトランザクションエラーを回避するため、処理を行わない
        // 必要に応じて手動でデータベースを操作
    }

    public function update(array $meta, ContainerInterface $container)
    {
        // アップデート時の処理
        $this->createTable($container);
    }

    /**
     * プラグイン用テーブル作成
     */
    private function createTable(ContainerInterface $container)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get('doctrine.orm.entity_manager');
        $connection = $entityManager->getConnection();
        $dbPlatform = $connection->getDatabasePlatform();
        
        // テーブル存在確認
        $tableExists = false;
        try {
            $sql = $dbPlatform->getListTablesSQL();
            $tables = $connection->executeQuery($sql)->fetchAllAssociative();
            foreach ($tables as $table) {
                if (in_array('plg_left_text_block', $table)) {
                    $tableExists = true;
                    break;
                }
            }
        } catch (\Exception $e) {
            // エラー時は存在しないと仮定
        }
        
        // すでにテーブルが存在する場合は作成しない
        if ($tableExists) {
            // 既存テーブルの更新
            $this->updateExistingTable($container);
            return;
        }

        // 直接SQLでテーブル作成（SQLite対応）
        try {
            $sql = "
                CREATE TABLE plg_left_text_block (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title VARCHAR(255) NOT NULL,
                    content TEXT NOT NULL,
                    font_size INTEGER DEFAULT 16,
                    font_family VARCHAR(500) DEFAULT 'inherit',
                    sort_no INTEGER DEFAULT 0,
                    visible INTEGER DEFAULT 1,
                    show_content INTEGER DEFAULT 1,
                    deleted_at TEXT DEFAULT NULL,
                    create_date TEXT NOT NULL,
                    update_date TEXT NOT NULL
                )
            ";
            
            $connection->executeStatement($sql);
            
            // インデックスの作成
            $connection->executeStatement("CREATE INDEX idx_sort_no ON plg_left_text_block (sort_no)");
            $connection->executeStatement("CREATE INDEX idx_visible ON plg_left_text_block (visible)");
            $connection->executeStatement("CREATE INDEX idx_create_date ON plg_left_text_block (create_date)");
            $connection->executeStatement("CREATE INDEX idx_deleted_at ON plg_left_text_block (deleted_at)");
            
            error_log('LeftTextBlock: Table created successfully');
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Table creation failed - ' . $e->getMessage());
        }
    }

    /**
     * プラグイン用テーブル削除
     */
    private function dropTable(ContainerInterface $container)
    {
        try {
            /** @var EntityManagerInterface $entityManager */
            $entityManager = $container->get('doctrine.orm.entity_manager');
            $connection = $entityManager->getConnection();

            $tableName = 'plg_left_text_block';
            $connection->executeStatement("DROP TABLE IF EXISTS {$tableName}");
            
            error_log('LeftTextBlock: Table dropped successfully');
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Table drop failed - ' . $e->getMessage());
        }
    }

    /**
     * 特定のテキストブロックに対応するブロックを作成
     */
    public function createBlockForTextBlock(ContainerInterface $container, $textBlockId, $title)
    {
        try {
            /** @var EntityManagerInterface $entityManager */
            $entityManager = $container->get('doctrine.orm.entity_manager');
            $connection = $entityManager->getConnection();
            
            // 個別のファイル名を生成（ID付き）
            $fileName = "left_text_block_" . $textBlockId;
            $blockName = "左寄せテキスト: " . $title;
            
            // 既存ブロックの確認
            $existing = $connection->fetchOne(
                'SELECT COUNT(*) FROM dtb_block WHERE file_name = ?',
                [$fileName]
            );
            
            if ($existing == 0) {
                // 最大IDを取得
                $maxId = $connection->fetchOne('SELECT COALESCE(MAX(id), 0) FROM dtb_block') + 1;
                
                // ブロック登録
                $blockData = [
                    'id' => $maxId,
                    'device_type_id' => 10, // PC用
                    'block_name' => $blockName,
                    'file_name' => $fileName,
                    'use_controller' => 1, // コントローラーを使用
                    'deletable' => 1,
                    'create_date' => date('Y-m-d H:i:s'),
                    'update_date' => date('Y-m-d H:i:s'),
                    'discriminator_type' => 'block',
                ];
                
                $connection->insert('dtb_block', $blockData);
                error_log("LeftTextBlock: Individual block created for text block ID {$textBlockId}");
                return $maxId;
            }
            return null;
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Block creation failed - ' . $e->getMessage());
            return null;
        }
    }

    /**
     * ブロックファイル名とテキストブロックIDの関連付けを保存
     */
    private function saveBlockMapping(ContainerInterface $container, $fileName, $textBlockId)
    {
        try {
            /** @var EntityManagerInterface $entityManager */
            $entityManager = $container->get('doctrine.orm.entity_manager');
            $connection = $entityManager->getConnection();
            
            // plg_left_text_blockテーブルにfile_nameカラムを追加する必要があります
            // または、file_nameからIDを抽出する方法を使用
            $connection->executeStatement(
                'UPDATE plg_left_text_block SET file_name = ? WHERE id = ?',
                [$fileName, $textBlockId]
            );
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Block mapping failed - ' . $e->getMessage());
        }
    }

    /**
     * テキストブロック削除時にブロックも削除
     */
    public function removeBlockForTextBlock(ContainerInterface $container, $textBlockId)
    {
        try {
            /** @var EntityManagerInterface $entityManager */
            $entityManager = $container->get('doctrine.orm.entity_manager');
            $connection = $entityManager->getConnection();
            
            $fileName = "left_text_block_" . $textBlockId;
            
            $connection->executeStatement(
                'DELETE FROM dtb_block WHERE file_name = ?',
                [$fileName]
            );
            
            error_log("LeftTextBlock: Block removed for text block ID {$textBlockId}");
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Block removal failed - ' . $e->getMessage());
        }
    }

    /**
     * ブロック名を更新
     */
    public function updateBlockName(ContainerInterface $container, $textBlockId, $title)
    {
        try {
            /** @var EntityManagerInterface $entityManager */
            $entityManager = $container->get('doctrine.orm.entity_manager');
            $connection = $entityManager->getConnection();
            
            $fileName = "left_text_block_" . $textBlockId;
            $blockName = "左寄せテキスト: " . $title;
            
            $connection->executeStatement(
                'UPDATE dtb_block SET block_name = ?, update_date = ? WHERE file_name = ?',
                [$blockName, date('Y-m-d H:i:s'), $fileName]
            );
            
            error_log("LeftTextBlock: Block name updated for text block ID {$textBlockId}");
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Block name update failed - ' . $e->getMessage());
        }
    }

    /**
     * 全ブロック削除
     */
    private function removeAllBlocks(ContainerInterface $container)
    {
        try {
            /** @var EntityManagerInterface $entityManager */
            $entityManager = $container->get('doctrine.orm.entity_manager');
            $connection = $entityManager->getConnection();
            
            // 左寄せテキストブロック関連のブロックを全て削除
            $connection->executeStatement(
                'DELETE FROM dtb_block WHERE file_name LIKE ?',
                ['left_text_block_%']
            );
            
            error_log('LeftTextBlock: All blocks removed successfully');
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Block removal failed - ' . $e->getMessage());
        }
    }

    /**
     * 既存テーブルの更新（font_familyとdeleted_atカラム追加）
     */
    private function updateExistingTable(ContainerInterface $container)
    {
        try {
            /** @var EntityManagerInterface $entityManager */
            $entityManager = $container->get('doctrine.orm.entity_manager');
            $connection = $entityManager->getConnection();
            
            // 現在のカラム構成を確認
            $columns = $connection->executeQuery("PRAGMA table_info(plg_left_text_block)")->fetchAllAssociative();
            $columnNames = array_column($columns, 'name');
            
            $hasDeletedAt = in_array('deleted_at', $columnNames);
            $hasFontFamily = in_array('font_family', $columnNames);
            
            // SQLiteの場合は新しいテーブルを作成して移行
            $connection->executeStatement("
                CREATE TABLE plg_left_text_block_new (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title VARCHAR(255) NOT NULL,
                    content TEXT NOT NULL,
                    font_size INTEGER DEFAULT 16,
                    font_family VARCHAR(500) DEFAULT 'inherit',
                    sort_no INTEGER DEFAULT 0,
                    visible INTEGER DEFAULT 1,
                    show_content INTEGER DEFAULT 1,
                    deleted_at TEXT DEFAULT NULL,
                    create_date TEXT NOT NULL,
                    update_date TEXT NOT NULL
                )
            ");
            
            // データをコピー（show_contentとdeleted_atとfont_familyの有無に応じて）
            $hasShowContent = in_array('show_content', $columnNames);
            
            if ($hasDeletedAt && $hasFontFamily && $hasShowContent) {
                $sql = "INSERT INTO plg_left_text_block_new 
                        SELECT id, title, content, font_size, font_family, 
                               sort_no, visible, show_content, deleted_at, create_date, update_date 
                        FROM plg_left_text_block";
            } elseif ($hasDeletedAt && $hasFontFamily) {
                $sql = "INSERT INTO plg_left_text_block_new 
                        SELECT id, title, content, font_size, font_family, 
                               sort_no, visible, 1 as show_content, deleted_at, create_date, update_date 
                        FROM plg_left_text_block";
            } elseif ($hasFontFamily) {
                $sql = "INSERT INTO plg_left_text_block_new 
                        SELECT id, title, content, font_size, font_family, 
                               sort_no, visible, 1 as show_content, NULL as deleted_at, create_date, update_date 
                        FROM plg_left_text_block";
            } else {
                $sql = "INSERT INTO plg_left_text_block_new 
                        SELECT id, title, content, font_size, 
                               COALESCE(font_family, 'inherit') as font_family,
                               sort_no, visible, 1 as show_content, NULL as deleted_at, create_date, update_date 
                        FROM plg_left_text_block";
            }
            
            $connection->executeStatement($sql);
            
            // 古いテーブルを削除して新しいテーブルをリネーム
            $connection->executeStatement("DROP TABLE plg_left_text_block");
            $connection->executeStatement("ALTER TABLE plg_left_text_block_new RENAME TO plg_left_text_block");
            
            // インデックスを再作成
            $connection->executeStatement("CREATE INDEX idx_sort_no ON plg_left_text_block (sort_no)");
            $connection->executeStatement("CREATE INDEX idx_visible ON plg_left_text_block (visible)");
            $connection->executeStatement("CREATE INDEX idx_create_date ON plg_left_text_block (create_date)");
            $connection->executeStatement("CREATE INDEX idx_deleted_at ON plg_left_text_block (deleted_at)");
            
            error_log('LeftTextBlock: Table updated successfully with deleted_at column');
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Table update failed - ' . $e->getMessage());
        }
    }
    private function createDefaultData(ContainerInterface $container)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get('doctrine.orm.entity_manager');
        $connection = $entityManager->getConnection();
        
        try {
            // 既存データがあるかチェック
            $count = $connection->fetchOne('SELECT COUNT(*) FROM plg_left_text_block');
            
            // データが存在しない場合のみデフォルトデータを作成
            if ($count == 0) {
                $now = new \DateTime();
                $defaultData = [
                    'title' => 'サンプルテキストブロック',
                    'content' => 'これは左寄せテキストブロックのサンプルです。<br>管理画面から自由に編集できます。',
                    'font_size' => 16,
                    'font_family' => 'inherit',
                    'sort_no' => 1,
                    'visible' => 1,
                    'create_date' => $now->format('Y-m-d H:i:s'),
                    'update_date' => $now->format('Y-m-d H:i:s'),
                ];
                
                $connection->insert('plg_left_text_block', $defaultData);
                error_log('LeftTextBlock: Default data created successfully');
            }
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Default data creation failed - ' . $e->getMessage());
        }
    }
}