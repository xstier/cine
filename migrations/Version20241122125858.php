<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241122125858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salles ADD qualite_projection_id INT NOT NULL');
        $this->addSql('ALTER TABLE salles ADD CONSTRAINT FK_799D45AA1D9E94B8 FOREIGN KEY (qualite_projection_id) REFERENCES qualite (id)');
        $this->addSql('CREATE INDEX IDX_799D45AA1D9E94B8 ON salles (qualite_projection_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salles DROP FOREIGN KEY FK_799D45AA1D9E94B8');
        $this->addSql('DROP INDEX IDX_799D45AA1D9E94B8 ON salles');
        $this->addSql('ALTER TABLE salles DROP qualite_projection_id');
    }
}
