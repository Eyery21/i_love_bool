<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250119144904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_of_character (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, fonded_at DATETIME DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, alignment VARCHAR(255) DEFAULT NULL, headquarters VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8');
        $this->addSql('CREATE TABLE groupe_of_character_character (groupe_of_character_id INT NOT NULL, character_id INT NOT NULL, INDEX IDX_4507DDCC78D7B187 (groupe_of_character_id), INDEX IDX_4507DDCC1136BE75 (character_id), PRIMARY KEY(groupe_of_character_id, character_id)) DEFAULT CHARACTER SET utf8');
        $this->addSql('CREATE TABLE groupe_of_character_groupe_of_character (groupe_of_character_source INT NOT NULL, groupe_of_character_target INT NOT NULL, INDEX IDX_89BC3A56A8F03EA0 (groupe_of_character_source), INDEX IDX_89BC3A56B1156E2F (groupe_of_character_target), PRIMARY KEY(groupe_of_character_source, groupe_of_character_target)) DEFAULT CHARACTER SET utf8');
        $this->addSql('ALTER TABLE groupe_of_character_character ADD CONSTRAINT FK_4507DDCC78D7B187 FOREIGN KEY (groupe_of_character_id) REFERENCES groupe_of_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_of_character_character ADD CONSTRAINT FK_4507DDCC1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_of_character_groupe_of_character ADD CONSTRAINT FK_89BC3A56A8F03EA0 FOREIGN KEY (groupe_of_character_source) REFERENCES groupe_of_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_of_character_groupe_of_character ADD CONSTRAINT FK_89BC3A56B1156E2F FOREIGN KEY (groupe_of_character_target) REFERENCES groupe_of_character (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe_of_character_character DROP FOREIGN KEY FK_4507DDCC78D7B187');
        $this->addSql('ALTER TABLE groupe_of_character_character DROP FOREIGN KEY FK_4507DDCC1136BE75');
        $this->addSql('ALTER TABLE groupe_of_character_groupe_of_character DROP FOREIGN KEY FK_89BC3A56A8F03EA0');
        $this->addSql('ALTER TABLE groupe_of_character_groupe_of_character DROP FOREIGN KEY FK_89BC3A56B1156E2F');
        $this->addSql('DROP TABLE groupe_of_character');
        $this->addSql('DROP TABLE groupe_of_character_character');
        $this->addSql('DROP TABLE groupe_of_character_groupe_of_character');
    }
}
