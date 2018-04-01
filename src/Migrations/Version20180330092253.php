<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180330092253 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, date_ajout VARCHAR(255) NOT NULL, idEleve INT DEFAULT NULL, idTuteur INT DEFAULT NULL, INDEX IDX_C27C9369FB6546EA (idEleve), INDEX IDX_C27C936935508AF2 (idTuteur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369FB6546EA FOREIGN KEY (idEleve) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C936935508AF2 FOREIGN KEY (idTuteur) REFERENCES tuteur (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stage');
    }
}
