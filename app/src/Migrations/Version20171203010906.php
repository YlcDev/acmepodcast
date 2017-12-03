<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171203010906 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE episode ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA12469DE2 ON episode (category_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA12469DE2');
        $this->addSql('DROP INDEX IDX_DDAA1CDA12469DE2 ON episode');
        $this->addSql('ALTER TABLE episode DROP category_id');
    }
}
