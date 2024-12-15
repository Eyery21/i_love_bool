<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241214230324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, real_name VARCHAR(50) NOT NULL, alias VARCHAR(255) DEFAULT NULL, alignment VARCHAR(255) DEFAULT NULL, espece VARCHAR(255) DEFAULT NULL, base_of_operations VARCHAR(255) DEFAULT NULL, nemesys VARCHAR(255) DEFAULT NULL, occupation VARCHAR(255) DEFAULT NULL, affiliations JSON DEFAULT NULL, origin_story LONGTEXT DEFAULT NULL, power JSON DEFAULT NULL, equipement JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `character`');
    }
}
