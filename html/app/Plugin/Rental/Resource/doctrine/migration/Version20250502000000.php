<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * レンタルプラグインのテーブル拡張マイグレーション
 */
final class Version20250502000000 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // plg_rental_orderテーブルに新しい列を追加
        $this->addSql('ALTER TABLE plg_rental_order 
            ADD COLUMN product_id INT UNSIGNED DEFAULT NULL AFTER id,
            ADD COLUMN customer_id INT UNSIGNED DEFAULT NULL AFTER order_id,
            ADD COLUMN rental_period INT UNSIGNED NOT NULL DEFAULT 1 AFTER rental_status_id,
            ADD COLUMN quantity INT UNSIGNED NOT NULL DEFAULT 1 AFTER rental_period,
            ADD COLUMN price DECIMAL(12, 2) NOT NULL DEFAULT 0 AFTER quantity,
            ADD COLUMN payment_method VARCHAR(255) DEFAULT NULL AFTER price,
            ADD COLUMN options_json TEXT DEFAULT NULL AFTER payment_method,
            ADD COLUMN name01 VARCHAR(255) DEFAULT NULL,
            ADD COLUMN name02 VARCHAR(255) DEFAULT NULL,
            ADD COLUMN kana01 VARCHAR(255) DEFAULT NULL,
            ADD COLUMN kana02 VARCHAR(255) DEFAULT NULL,
            ADD COLUMN postal_code VARCHAR(8) DEFAULT NULL,
            ADD COLUMN pref VARCHAR(255) DEFAULT NULL,
            ADD COLUMN addr01 VARCHAR(255) DEFAULT NULL,
            ADD COLUMN addr02 VARCHAR(255) DEFAULT NULL,
            ADD COLUMN phone_number VARCHAR(14) DEFAULT NULL,
            ADD COLUMN email VARCHAR(255) DEFAULT NULL');
            
        // 外部キー制約の追加
        $this->addSql('ALTER TABLE plg_rental_order
            ADD CONSTRAINT FK_RENTAL_ORDER_PRODUCT_ID FOREIGN KEY (product_id) 
            REFERENCES dtb_product (id),
            ADD CONSTRAINT FK_RENTAL_ORDER_CUSTOMER_ID FOREIGN KEY (customer_id) 
            REFERENCES dtb_customer (id)');
            
        // インデックスの追加
        $this->addSql('CREATE INDEX IDX_RENTAL_ORDER_PRODUCT_ID ON plg_rental_order (product_id)');
        $this->addSql('CREATE INDEX IDX_RENTAL_ORDER_CUSTOMER_ID ON plg_rental_order (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // 外部キー制約の削除
        $this->addSql('ALTER TABLE plg_rental_order 
            DROP FOREIGN KEY FK_RENTAL_ORDER_PRODUCT_ID,
            DROP FOREIGN KEY FK_RENTAL_ORDER_CUSTOMER_ID');
            
        // インデックスの削除
        $this->addSql('DROP INDEX IDX_RENTAL_ORDER_PRODUCT_ID ON plg_rental_order');
        $this->addSql('DROP INDEX IDX_RENTAL_ORDER_CUSTOMER_ID ON plg_rental_order');
        
        // 追加した列の削除
        $this->addSql('ALTER TABLE plg_rental_order 
            DROP COLUMN product_id,
            DROP COLUMN customer_id,
            DROP COLUMN rental_period,
            DROP COLUMN quantity,
            DROP COLUMN price,
            DROP COLUMN payment_method,
            DROP COLUMN options_json,
            DROP COLUMN name01,
            DROP COLUMN name02,
            DROP COLUMN kana01,
            DROP COLUMN kana02,
            DROP COLUMN postal_code,
            DROP COLUMN pref,
            DROP COLUMN addr01,
            DROP COLUMN addr02,
            DROP COLUMN phone_number,
            DROP COLUMN email');
    }
}