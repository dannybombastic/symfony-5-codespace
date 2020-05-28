<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200527153049 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE comments (id SERIAL NOT NULL, id_art INT DEFAULT NULL, id_user VARCHAR(24) DEFAULT NULL, art_comment VARCHAR(250) NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX id_art ON comments (id_art)');
        $this->addSql('CREATE INDEX id_user ON comments (id_user)');
        $this->addSql('CREATE TABLE user_profile (user_dni VARCHAR(24) NOT NULL, user_role INT DEFAULT NULL, user_name VARCHAR(24) NOT NULL, user_addr VARCHAR(60) NOT NULL, user_email VARCHAR(60) NOT NULL, user_password VARCHAR(150) NOT NULL, gender VARCHAR(255) NOT NULL, create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(user_dni))');
        $this->addSql('CREATE INDEX IDX_D95AB4052DE8C6A3 ON user_profile (user_role)');
        $this->addSql('CREATE TABLE user_roles (id SERIAL NOT NULL, user_role VARCHAR(25) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE multimedia_type (id SERIAL NOT NULL, m_type VARCHAR(80) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE articles (id SERIAL NOT NULL, id_cat INT DEFAULT NULL, art_title VARCHAR(80) NOT NULL, art_desc VARCHAR(400) NOT NULL, art_evalu CHAR(5) NOT NULL, visited_cnt INT NOT NULL, visited_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BFDD3168FAABF2 ON articles (id_cat)');
        $this->addSql('CREATE TABLE categories (id SERIAL NOT NULL, name VARCHAR(80) NOT NULL, image VARCHAR(80) NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE multimedia (id SERIAL NOT NULL, id_tipo INT DEFAULT NULL, id_art INT NOT NULL, src VARCHAR(2000) NOT NULL, home BOOLEAN NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX id_tipo ON multimedia (id_tipo)');
        $this->addSql('CREATE TABLE menu (id SERIAL NOT NULL, id_menu INT NOT NULL, href VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A62913E0E FOREIGN KEY (id_art) REFERENCES articles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A6B3CA4B FOREIGN KEY (id_user) REFERENCES user_profile (user_dni) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB4052DE8C6A3 FOREIGN KEY (user_role) REFERENCES user_roles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168FAABF2 FOREIGN KEY (id_cat) REFERENCES categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_61312863FB0D0145 FOREIGN KEY (id_tipo) REFERENCES multimedia_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE comments DROP CONSTRAINT FK_5F9E962A6B3CA4B');
        $this->addSql('ALTER TABLE user_profile DROP CONSTRAINT FK_D95AB4052DE8C6A3');
        $this->addSql('ALTER TABLE multimedia DROP CONSTRAINT FK_61312863FB0D0145');
        $this->addSql('ALTER TABLE comments DROP CONSTRAINT FK_5F9E962A62913E0E');
        $this->addSql('ALTER TABLE articles DROP CONSTRAINT FK_BFDD3168FAABF2');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE user_profile');
        $this->addSql('DROP TABLE user_roles');
        $this->addSql('DROP TABLE multimedia_type');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE multimedia');
        $this->addSql('DROP TABLE menu');
    }
}
