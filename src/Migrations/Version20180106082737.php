<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180106082737 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('INSERT INTO Podcast(
                                            title,
                                            description, 
                                            link,
                                            language,
                                            image, 
                                            author
                                            )
                          VALUES(
                                "The AcmePodcast",
                                "This is where your podcast description can go, please go do the admin panel to change :)",
                                 "http://yourwebsitelink", "en", "http://lorempixel.com/200/200/",
                                "Podcast Man")');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
