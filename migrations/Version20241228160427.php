<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241228160427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE series_book DROP FOREIGN KEY FK_2EA222F316A2B381');
        $this->addSql('ALTER TABLE series_book DROP FOREIGN KEY FK_2EA222F35278319C');
        $this->addSql('DROP TABLE series_book');
        $this->addSql('ALTER TABLE series ADD is_one_shot TINYINT(1) NOT NULL, ADD length INT DEFAULT NULL, ADD character_id INT NOT NULL, DROP type, DROP hero');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012D1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id)');
        $this->addSql('CREATE INDEX IDX_3A10012D1136BE75 ON series (character_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE series_book (series_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_2EA222F35278319C (series_id), INDEX IDX_2EA222F316A2B381 (book_id), PRIMARY KEY(series_id, book_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE series_book ADD CONSTRAINT FK_2EA222F316A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series_book ADD CONSTRAINT FK_2EA222F35278319C FOREIGN KEY (series_id) REFERENCES series (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series DROP FOREIGN KEY FK_3A10012D1136BE75');
        $this->addSql('DROP INDEX IDX_3A10012D1136BE75 ON series');
        $this->addSql('ALTER TABLE series ADD type VARCHAR(50) NOT NULL, ADD hero VARCHAR(255) DEFAULT NULL, DROP is_one_shot, DROP length, DROP character_id');
    }
}
