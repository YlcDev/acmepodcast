<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180106090859 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_DDAA1CDA12469DE2');
        $this->addSql('DROP INDEX IDX_DDAA1CDA786136AB');
        $this->addSql('CREATE TEMPORARY TABLE __temp__episode AS SELECT id, podcast_id, category_id, title, description, media_file_url, link, image, published_date FROM episode');
        $this->addSql('DROP TABLE episode');
        $this->addSql('CREATE TABLE episode (id INTEGER NOT NULL, podcast_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, media_file_url VARCHAR(255) NOT NULL COLLATE BINARY, link VARCHAR(255) NOT NULL COLLATE BINARY, image VARCHAR(255) NOT NULL COLLATE BINARY, published_date DATETIME NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_DDAA1CDA786136AB FOREIGN KEY (podcast_id) REFERENCES podcast (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DDAA1CDA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO episode (id, podcast_id, category_id, title, description, media_file_url, link, image, published_date) SELECT id, podcast_id, category_id, title, description, media_file_url, link, image, published_date FROM __temp__episode');
        $this->addSql('DROP TABLE __temp__episode');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA12469DE2 ON episode (category_id)');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA786136AB ON episode (podcast_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_DDAA1CDA786136AB');
        $this->addSql('DROP INDEX IDX_DDAA1CDA12469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__episode AS SELECT id, podcast_id, category_id, title, description, media_file_url, link, image, published_date FROM episode');
        $this->addSql('DROP TABLE episode');
        $this->addSql('CREATE TABLE episode (id INTEGER NOT NULL, podcast_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, media_file_url VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, published_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO episode (id, podcast_id, category_id, title, description, media_file_url, link, image, published_date) SELECT id, podcast_id, category_id, title, description, media_file_url, link, image, published_date FROM __temp__episode');
        $this->addSql('DROP TABLE __temp__episode');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA786136AB ON episode (podcast_id)');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA12469DE2 ON episode (category_id)');
    }
}
