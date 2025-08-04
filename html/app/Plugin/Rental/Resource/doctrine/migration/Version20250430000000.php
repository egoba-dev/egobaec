<?php

namespace Plugin\Rental\Resource\doctrine\migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * レンタル注文に住所情報フィールドを追加
 */
class Version20250430000000 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema) : void
    {
        // このマイグレーションは EC-CUBE 4.0.x 向けに記述されています
        $this->addSql('ALTER TABLE plg_rental_order ADD name01 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE plg_rental_order ADD name02 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE plg_rental_order ADD kana01 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE plg_rental_order ADD kana02 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE plg_rental_order ADD postal_code VARCHAR(8) DEFAULT NULL');
        $this->addSql('ALTER TABLE plg_rental_order ADD pref VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE plg_rental_order ADD addr01 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE plg_rental_order ADD addr02 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE plg_rental_order ADD phone_number VARCHAR(14) DEFAULT NULL');
        $this->addSql('ALTER TABLE plg_rental_order ADD email VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema) : void
    {
        // このマイグレーションは EC-CUBE 4.0.x 向けに記述されています
        $this->addSql('ALTER TABLE plg_rental_order DROP name01');
        $this->addSql('ALTER TABLE plg_rental_order DROP name02');
        $this->addSql('ALTER TABLE plg_rental_order DROP kana01');
        $this->addSql('ALTER TABLE plg_rental_order DROP kana02');
        $this->addSql('ALTER TABLE plg_rental_order DROP postal_code');
        $this->addSql('ALTER TABLE plg_rental_order DROP pref');
        $this->addSql('ALTER TABLE plg_rental_order DROP addr01');
        $this->addSql('ALTER TABLE plg_rental_order DROP addr02');
        $this->addSql('ALTER TABLE plg_rental_order DROP phone_number');
        $this->addSql('ALTER TABLE plg_rental_order DROP email');
    }
}