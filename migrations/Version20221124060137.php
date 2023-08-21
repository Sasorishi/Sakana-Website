<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124060137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, lead VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, thumbnail VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, subtitle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date VARCHAR(255) NOT NULL, main_image VARCHAR(255) DEFAULT NULL, address LONGTEXT NOT NULL COMMENT \'(DC2Type:object)\', main TINYINT(1) DEFAULT NULL, free_access TINYINT(1) DEFAULT NULL, limited TINYINT(1) NOT NULL, date_end DATETIME DEFAULT NULL, recurrence VARCHAR(255) DEFAULT NULL, ref VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, verified TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playground (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, location VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, zipcode VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, courts VARCHAR(255) DEFAULT NULL, buckets VARCHAR(255) DEFAULT NULL, typologie VARCHAR(255) DEFAULT NULL, rate INT DEFAULT NULL, users_in LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', gallery LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', new TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE playground');
        $this->addSql('DROP TABLE user');
    }
}
