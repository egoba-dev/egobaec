<?php
namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250402000000 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // レンタル商品設定テーブル
        $this->addSql('
            CREATE TABLE plg_rental_product (
                id INT UNSIGNED NOT NULL,
                product_id INT UNSIGNED DEFAULT NULL,
                rental_flg TINYINT(1) NOT NULL DEFAULT 0,
                rental_price_daily DECIMAL(12, 2) DEFAULT NULL,
                rental_price_weekly DECIMAL(12, 2) DEFAULT NULL,
                rental_price_monthly DECIMAL(12, 2) DEFAULT NULL,
                rental_max_days INT DEFAULT NULL,
                PRIMARY KEY(id),
                CONSTRAINT FK_RENTAL_PRODUCT_ID FOREIGN KEY (product_id) 
                REFERENCES dtb_product (id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin
        ');

        // レンタル注文テーブル
        $this->addSql('
            CREATE TABLE plg_rental_order (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                order_id INT UNSIGNED DEFAULT NULL,
                product_class_id INT UNSIGNED DEFAULT NULL,
                rental_start_date DATETIME NOT NULL,
                rental_end_date DATETIME NOT NULL,
                return_date DATETIME DEFAULT NULL,
                rental_status_id SMALLINT UNSIGNED NOT NULL DEFAULT 1,
                create_date DATETIME NOT NULL,
                update_date DATETIME NOT NULL,
                PRIMARY KEY(id),
                CONSTRAINT FK_RENTAL_ORDER_ORDER_ID FOREIGN KEY (order_id) 
                REFERENCES dtb_order (id),
                CONSTRAINT FK_RENTAL_ORDER_PRODUCT_CLASS_ID FOREIGN KEY (product_class_id) 
                REFERENCES dtb_product_class (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin
        ');

        // レンタル設定テーブル
        $this->addSql('
            CREATE TABLE plg_rental_config (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                rental_terms TEXT DEFAULT NULL,
                auto_approval TINYINT(1) NOT NULL DEFAULT 1,
                default_max_days INT DEFAULT NULL,
                create_date DATETIME NOT NULL,
                update_date DATETIME NOT NULL,
                PRIMARY KEY(id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin
        ');

        // レンタルステータスマスタ
        $this->addSql('
            CREATE TABLE mtb_rental_status (
                id SMALLINT UNSIGNED NOT NULL,
                name VARCHAR(255) NOT NULL,
                sort_no SMALLINT UNSIGNED NOT NULL,
                discriminator_type VARCHAR(255) NOT NULL,
                PRIMARY KEY(id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin
        ');

        // レンタルステータスの初期データ
        $this->addSql("INSERT INTO mtb_rental_status (id, name, sort_no, discriminator_type) VALUES
            (1, 'レンタル予約中', 0, 'rentalstatus'),
            (2, 'レンタル中', 1, 'rentalstatus'),
            (3, '返却済み', 2, 'rentalstatus'),
            (4, '返却遅延', 3, 'rentalstatus'),
            (5, 'キャンセル', 4, 'rentalstatus')
        ");
        
        // レンタル設定の初期データ
        $this->addSql("INSERT INTO plg_rental_config (id, rental_terms, auto_approval, default_max_days, create_date, update_date) VALUES
            (1, 'レンタル利用規約のデフォルトテキストです。必要に応じて管理画面から変更してください。', 1, 90, NOW(), NOW())
        ");
    }

    public function down(Schema $schema): void
    {
        // テーブルを削除（作成時と逆順）
        $this->addSql('DROP TABLE plg_rental_order');
        $this->addSql('DROP TABLE plg_rental_product');
        $this->addSql('DROP TABLE plg_rental_config');
        $this->addSql('DROP TABLE mtb_rental_status');
    }
}