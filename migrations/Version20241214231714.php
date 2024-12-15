<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241214231714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book_character (book_id INT NOT NULL, character_id INT NOT NULL, INDEX IDX_81D4A67216A2B381 (book_id), INDEX IDX_81D4A6721136BE75 (character_id), PRIMARY KEY(book_id, character_id)) DEFAULT CHARACTER SET utf8');
        $this->addSql('ALTER TABLE book_character ADD CONSTRAINT FK_81D4A67216A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_character ADD CONSTRAINT FK_81D4A6721136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book_character DROP FOREIGN KEY FK_81D4A67216A2B381');
        $this->addSql('ALTER TABLE book_character DROP FOREIGN KEY FK_81D4A6721136BE75');
        $this->addSql('DROP TABLE book_character');
    }
}
