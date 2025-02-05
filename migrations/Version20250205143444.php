<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration pour supprimer la colonne 'roles'.
 */
final class Version20250205143444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Suppression de la colonne roles dans la table user';
    }

    public function up(Schema $schema): void
    {
        // Suppression de la colonne 'roles' de la table 'user'
        $this->addSql('ALTER TABLE user DROP COLUMN roles');
    }

    public function down(Schema $schema): void
    {
        // Si on a besoin de revenir en arrière, on peut recréer la colonne 'roles'
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
