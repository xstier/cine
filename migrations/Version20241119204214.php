<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119204214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cinemas (id INT AUTO_INCREMENT NOT NULL, nom_cinema VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, numero_gsm VARCHAR(255) NOT NULL, horaires JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE salles ADD cinemas_id INT NOT NULL');
        $this->addSql('ALTER TABLE salles ADD CONSTRAINT FK_799D45AAC5C76018 FOREIGN KEY (cinemas_id) REFERENCES cinemas (id)');
        $this->addSql('CREATE INDEX IDX_799D45AAC5C76018 ON salles (cinemas_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salles DROP FOREIGN KEY FK_799D45AAC5C76018');
        $this->addSql('DROP TABLE cinemas');
        $this->addSql('DROP INDEX IDX_799D45AAC5C76018 ON salles');
        $this->addSql('ALTER TABLE salles DROP cinemas_id');
    }
}
