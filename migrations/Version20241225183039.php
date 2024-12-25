<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241225183039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_book (character_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_DC19B7A91136BE75 (character_id), INDEX IDX_DC19B7A916A2B381 (book_id), PRIMARY KEY(character_id, book_id)) DEFAULT CHARACTER SET utf8');
        $this->addSql('ALTER TABLE character_book ADD CONSTRAINT FK_DC19B7A91136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_book ADD CONSTRAINT FK_DC19B7A916A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_book DROP FOREIGN KEY FK_DC19B7A91136BE75');
        $this->addSql('ALTER TABLE character_book DROP FOREIGN KEY FK_DC19B7A916A2B381');
        $this->addSql('DROP TABLE character_book');
    }
}
