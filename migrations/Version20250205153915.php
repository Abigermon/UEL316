<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250205153915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Supprime la colonne "roles" de la table "user"';
    }

    public function up(Schema $schema): void
    {
      
        $this->addSql('ALTER TABLE user DROP COLUMN roles');

 
        $this->addSql('DROP INDEX uniq_identifier_email ON user');

        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');

   
        $this->addSql('DROP INDEX uniq_8d93d649e7927c74 ON user');

        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }
}
