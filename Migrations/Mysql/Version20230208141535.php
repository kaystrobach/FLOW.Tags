<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Migrations\AbortMigrationException;

/**
 * Auto-generated Migration: Please modify to your needs! This block will be used as the migration description if getDescription() is not used.
 */
class Version20230208141535 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return '';
    }

    /**
     * @param Schema $schema
     * @return void
     * @throws AbortMigrationException
     */
    public function up(Schema $schema): void
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on "mysql".');

        $this->addSql('ALTER TABLE kaystrobach_tags_domain_model_tag ADD available TINYINT(1) NOT NULL');
        $this->addSql('UPDATE kaystrobach_tags_domain_model_tag SET available=1');
    }

    /**
     * @param Schema $schema
     * @return void
     * @throws AbortMigrationException
     */
    public function down(Schema $schema): void
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on "mysql".');

        $this->addSql('ALTER TABLE kaystrobach_tags_domain_model_tag DROP available');
    }
}
