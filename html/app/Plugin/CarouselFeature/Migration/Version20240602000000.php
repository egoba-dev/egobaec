<?php

namespace Plugin\CarouselFeature\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * カルーセル特集プラグイン用テーブル作成
 * EC-CUBE 5.x 対応版
 */
class Version20240602000000 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        // カルーセル特集テーブル作成
        if (!$schema->hasTable('dtb_carousel_feature')) {
            $table = $schema->createTable('dtb_carousel_feature');
            
            $table->addColumn('id', 'integer', [
                'autoincrement' => true,
                'notnull' => true,
                'unsigned' => true,
            ]);
            
            $table->addColumn('title', 'string', [
                'length' => 255,
                'notnull' => true,
            ]);
            
            $table->addColumn('content', 'text', [
                'notnull' => false,
            ]);
            
            $table->addColumn('status', 'string', [
                'length' => 20,
                'notnull' => true,
                'default' => 'draft',
            ]);
            
            $table->addColumn('sort_no', 'integer', [
                'notnull' => true,
                'default' => 0,
                'unsigned' => true,
            ]);
            
            $table->addColumn('link_type', 'string', [
                'length' => 20,
                'notnull' => true,
                'default' => 'none',
            ]);
            
            $table->addColumn('link_url', 'string', [
                'length' => 1024,
                'notnull' => false,
            ]);
            
            $table->addColumn('link_text', 'string', [
                'length' => 255,
                'notnull' => false,
            ]);
            
            $table->addColumn('product_id', 'integer', [
                'notnull' => false,
                'unsigned' => true,
            ]);
            
            $table->addColumn('create_date', 'datetime', [
                'notnull' => true,
            ]);
            
            $table->addColumn('update_date', 'datetime', [
                'notnull' => true,
            ]);
            
            $table->setPrimaryKey(['id']);
            
            // インデックス作成
            $table->addIndex(['status'], 'IDX_CAROUSEL_FEATURE_STATUS');
            $table->addIndex(['sort_no'], 'IDX_CAROUSEL_FEATURE_SORT_NO');
            $table->addIndex(['product_id'], 'IDX_CAROUSEL_FEATURE_PRODUCT_ID');
            
            // 外部キー制約（商品テーブルが存在する場合）
            if ($schema->hasTable('dtb_product')) {
                $table->addForeignKeyConstraint(
                    $schema->getTable('dtb_product'),
                    ['product_id'],
                    ['id'],
                    ['onDelete' => 'SET NULL']
                );
            }
        }

        // カルーセル画像テーブル作成
        if (!$schema->hasTable('dtb_carousel_image')) {
            $table = $schema->createTable('dtb_carousel_image');
            
            $table->addColumn('id', 'integer', [
                'autoincrement' => true,
                'notnull' => true,
                'unsigned' => true,
            ]);
            
            $table->addColumn('carousel_feature_id', 'integer', [
                'notnull' => true,
                'unsigned' => true,
            ]);
            
            $table->addColumn('file_name', 'string', [
                'length' => 255,
                'notnull' => false,
            ]);
            
            $table->addColumn('original_name', 'string', [
                'length' => 255,
                'notnull' => false,
            ]);
            
            $table->addColumn('alt_text', 'string', [
                'length' => 255,
                'notnull' => false,
            ]);
            
            $table->addColumn('sort_no', 'integer', [
                'notnull' => true,
                'default' => 0,
                'unsigned' => true,
            ]);
            
            $table->addColumn('webp_file_name', 'string', [
                'length' => 255,
                'notnull' => false,
            ]);
            
            $table->addColumn('file_size', 'integer', [
                'notnull' => false,
                'unsigned' => true,
            ]);
            
            $table->addColumn('width', 'integer', [
                'notnull' => false,
                'unsigned' => true,
            ]);
            
            $table->addColumn('height', 'integer', [
                'notnull' => false,
                'unsigned' => true,
            ]);
            
            $table->addColumn('create_date', 'datetime', [
                'notnull' => true,
            ]);
            
            $table->addColumn('update_date', 'datetime', [
                'notnull' => true,
            ]);
            
            $table->setPrimaryKey(['id']);
            
            // インデックス作成
            $table->addIndex(['carousel_feature_id'], 'IDX_CAROUSEL_IMAGE_FEATURE_ID');
            $table->addIndex(['sort_no'], 'IDX_CAROUSEL_IMAGE_SORT_NO');
            
            // 外部キー制約
            $table->addForeignKeyConstraint(
                $schema->getTable('dtb_carousel_feature'),
                ['carousel_feature_id'],
                ['id'],
                ['onDelete' => 'CASCADE']
            );
        }

        // カルーセル設定テーブル作成
        if (!$schema->hasTable('dtb_carousel_config')) {
            $table = $schema->createTable('dtb_carousel_config');
            
            $table->addColumn('id', 'integer', [
                'autoincrement' => true,
                'notnull' => true,
                'unsigned' => true,
            ]);
            
            $table->addColumn('display_count', 'integer', [
                'notnull' => true,
                'default' => 5,
                'unsigned' => true,
            ]);
            
            $table->addColumn('auto_play', 'integer', [
                'notnull' => true,
                'default' => 1,
            ]);
            
            $table->addColumn('auto_play_interval', 'integer', [
                'notnull' => true,
                'default' => 5000,
                'unsigned' => true,
            ]);
            
            $table->addColumn('show_navigation', 'integer', [
                'notnull' => true,
                'default' => 1,
            ]);
            
            $table->addColumn('show_indicators', 'integer', [
                'notnull' => true,
                'default' => 1,
            ]);
            
            $table->addColumn('enable_touch_swipe', 'integer', [
                'notnull' => true,
                'default' => 1,
            ]);
            
            $table->addColumn('enable_keyboard_nav', 'integer', [
                'notnull' => true,
                'default' => 1,
            ]);
            
            $table->addColumn('transition_effect', 'string', [
                'length' => 20,
                'notnull' => true,
                'default' => 'slide',
            ]);
            
            $table->addColumn('transition_duration', 'integer', [
                'notnull' => true,
                'default' => 500,
                'unsigned' => true,
            ]);
            
            $table->addColumn('create_date', 'datetime', [
                'notnull' => true,
            ]);
            
            $table->addColumn('update_date', 'datetime', [
                'notnull' => true,
            ]);
            
            $table->setPrimaryKey(['id']);
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        // テーブル削除（逆順）
        if ($schema->hasTable('dtb_carousel_image')) {
            $schema->dropTable('dtb_carousel_image');
        }
        
        if ($schema->hasTable('dtb_carousel_feature')) {
            $schema->dropTable('dtb_carousel_feature');
        }
        
        if ($schema->hasTable('dtb_carousel_config')) {
            $schema->dropTable('dtb_carousel_config');
        }
    }
}