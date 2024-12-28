<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241228155738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE series (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, type VARCHAR(50) NOT NULL, hero VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8');
        $this->addSql('CREATE TABLE series_book (series_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_2EA222F35278319C (series_id), INDEX IDX_2EA222F316A2B381 (book_id), PRIMARY KEY(series_id, book_id)) DEFAULT CHARACTER SET utf8');
        $this->addSql('ALTER TABLE series_book ADD CONSTRAINT FK_2EA222F35278319C FOREIGN KEY (series_id) REFERENCES series (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series_book ADD CONSTRAINT FK_2EA222F316A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE series_book DROP FOREIGN KEY FK_2EA222F35278319C');
        $this->addSql('ALTER TABLE series_book DROP FOREIGN KEY FK_2EA222F316A2B381');
        $this->addSql('DROP TABLE series');
        $this->addSql('DROP TABLE series_book');
    }
}
