<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200514144640 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_61312863FB0D0145');
        $this->addSql('CREATE TABLE multimedia_type (id INT AUTO_INCREMENT NOT NULL, m_type VARCHAR(80) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prueba (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE multimedia_types');
        $this->addSql('ALTER TABLE user_profile CHANGE user_dni user_dni VARCHAR(24) NOT NULL');
        $this->addSql('ALTER TABLE user_profile RENAME INDEX user_role TO IDX_D95AB4052DE8C6A3');
        $this->addSql('ALTER TABLE articles RENAME INDEX id_cat TO IDX_BFDD3168FAABF2');
        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_61312863FB0D0145');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_61312863FB0D0145 FOREIGN KEY (id_tipo) REFERENCES multimedia_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_61312863FB0D0145');
        $this->addSql('CREATE TABLE multimedia_types (id INT AUTO_INCREMENT NOT NULL, m_type VARCHAR(80) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE multimedia_type');
        $this->addSql('DROP TABLE prueba');
        $this->addSql('ALTER TABLE articles RENAME INDEX idx_bfdd3168faabf2 TO id_cat');
        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_61312863FB0D0145');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_61312863FB0D0145 FOREIGN KEY (id_tipo) REFERENCES multimedia_types (id)');
        $this->addSql('ALTER TABLE user_profile CHANGE user_dni user_dni VARCHAR(24) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user_profile RENAME INDEX idx_d95ab4052de8c6a3 TO user_role');
    }
}
