<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180106083356 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('INSERT INTO Setting(
                                            facebook,
                                            twitter, 
                                            i_tunes                             
                                            )
                          VALUES(
                                "http://facebook.com/yourusername",
                                "http://twitter.com/yourusername",
                                "http://itunes/yourpodcastlink"
                                )');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
