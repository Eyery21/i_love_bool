<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241214210317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD author VARCHAR(50) DEFAULT NULL, ADD illustrator VARCHAR(50) DEFAULT NULL, ADD price DOUBLE PRECISION DEFAULT NULL, ADD serie VARCHAR(50) DEFAULT NULL, ADD volum_number INT DEFAULT NULL, ADD page_count INT DEFAULT NULL, ADD rating DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP author, DROP illustrator, DROP price, DROP serie, DROP volum_number, DROP page_count, DROP rating');
    }
}
