<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124235115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE id id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE event ADD max_places INT DEFAULT NULL, CHANGE id id VARCHAR(255) NOT NULL, CHANGE address address LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:object)\', CHANGE limited limited TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE firstname firstname VARCHAR(255) DEFAULT NULL, CHANGE lastname lastname VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE event DROP max_places, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE address address LONGTEXT NOT NULL COMMENT \'(DC2Type:object)\', CHANGE limited limited TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE firstname firstname VARCHAR(255) NOT NULL, CHANGE lastname lastname VARCHAR(255) NOT NULL');
    }
}
