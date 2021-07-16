<?php

declare(strict_types=1);

namespace App\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210715230554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media_artist (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, cover_path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_tracks (id INT AUTO_INCREMENT NOT NULL, artist_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_9814B0F0B7970CF8 (artist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media_tracks ADD CONSTRAINT FK_9814B0F0B7970CF8 FOREIGN KEY (artist_id) REFERENCES media_artist (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_tracks DROP FOREIGN KEY FK_9814B0F0B7970CF8');
        $this->addSql('DROP TABLE media_artist');
        $this->addSql('DROP TABLE media_tracks');
    }
}
