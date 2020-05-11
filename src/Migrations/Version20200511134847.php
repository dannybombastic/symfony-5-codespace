<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200511134847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, id_art INT DEFAULT NULL, id_user VARCHAR(24) DEFAULT NULL, art_comment VARCHAR(250) NOT NULL, is_active TINYINT(1) NOT NULL, INDEX id_user (id_user), INDEX id_art (id_art), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multimedia_type (id INT AUTO_INCREMENT NOT NULL, m_type VARCHAR(80) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, id_cat INT DEFAULT NULL, art_title VARCHAR(80) NOT NULL, art_desc VARCHAR(400) NOT NULL, art_evalu CHAR(5) NOT NULL, visited_cnt INT NOT NULL, visited_at DATETIME NOT NULL, create_at DATETIME NOT NULL, is_active TINYINT(1) NOT NULL, INDEX id_cat (id_cat), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, image VARCHAR(80) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_profile (user_dni VARCHAR(24) NOT NULL, user_role INT DEFAULT NULL, user_name VARCHAR(24) NOT NULL, user_addr VARCHAR(60) NOT NULL, user_email VARCHAR(60) NOT NULL, user_password VARCHAR(150) NOT NULL, gender VARCHAR(255) NOT NULL, create_at DATETIME NOT NULL, is_active TINYINT(1) NOT NULL, INDEX user_role (user_role), PRIMARY KEY(user_dni)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multimedia (id INT AUTO_INCREMENT NOT NULL, id_tipo INT DEFAULT NULL, id_art INT NOT NULL, src VARCHAR(2000) NOT NULL, home TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, INDEX id_tipo (id_tipo), INDEX id_art (id_art), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_comment (id BIGINT AUTO_INCREMENT NOT NULL, post_id BIGINT DEFAULT NULL, author VARCHAR(20) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX blog_comment_post_id_idx (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_post (id BIGINT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_roles (id INT AUTO_INCREMENT NOT NULL, user_role VARCHAR(25) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, id_menu INT NOT NULL, href VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A62913E0E FOREIGN KEY (id_art) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A6B3CA4B FOREIGN KEY (id_user) REFERENCES user_profile (user_dni)');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168FAABF2 FOREIGN KEY (id_cat) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB4052DE8C6A3 FOREIGN KEY (user_role) REFERENCES user_roles (id)');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_61312863FB0D0145 FOREIGN KEY (id_tipo) REFERENCES multimedia_type (id)');
        $this->addSql('ALTER TABLE blog_comment ADD CONSTRAINT FK_7882EFEF4B89032C FOREIGN KEY (post_id) REFERENCES blog_post (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_61312863FB0D0145');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A62913E0E');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168FAABF2');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A6B3CA4B');
        $this->addSql('ALTER TABLE blog_comment DROP FOREIGN KEY FK_7882EFEF4B89032C');
        $this->addSql('ALTER TABLE user_profile DROP FOREIGN KEY FK_D95AB4052DE8C6A3');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE multimedia_type');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE user_profile');
        $this->addSql('DROP TABLE multimedia');
        $this->addSql('DROP TABLE blog_comment');
        $this->addSql('DROP TABLE blog_post');
        $this->addSql('DROP TABLE user_roles');
        $this->addSql('DROP TABLE menu');
    }
}
