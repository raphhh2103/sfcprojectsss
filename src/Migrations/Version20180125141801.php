<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180125141801 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE jobs (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, name_jobs VARCHAR(50) NOT NULL, description VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_A8936DC57E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobs_sfcs (id INT AUTO_INCREMENT NOT NULL, jobs_id INT NOT NULL, sfc_id INT NOT NULL, skills_id INT NOT NULL, indicator_observable1 VARCHAR(128) NOT NULL, indicator_observable2 VARCHAR(128) NOT NULL, indicator_observable3 VARCHAR(128) NOT NULL, indicator_observable4 VARCHAR(128) NOT NULL, indicator_generic1 VARCHAR(128) NOT NULL, indicator_generic2 VARCHAR(128) NOT NULL, indicator_generic3 VARCHAR(128) NOT NULL, indicator_generic4 VARCHAR(128) NOT NULL, required_level INT NOT NULL, INDEX IDX_BF5F773848704627 (jobs_id), INDEX IDX_BF5F77389A9518EE (sfc_id), INDEX IDX_BF5F77387FF61858 (skills_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE results (id INT AUTO_INCREMENT NOT NULL, signing_id INT NOT NULL, jobs_sfc_id INT NOT NULL, value INT NOT NULL, INDEX IDX_9FA3E414399BBB2E (signing_id), INDEX IDX_9FA3E41457903FEF (jobs_sfc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sfcs (id INT AUTO_INCREMENT NOT NULL, name_sfc VARCHAR(128) NOT NULL, description VARCHAR(255) NOT NULL, date_create DATE NOT NULL, date_update DATE NOT NULL, is_valid TINYINT(1) NOT NULL, indicator_observable1 VARCHAR(128) NOT NULL, indicator_observable2 VARCHAR(128) NOT NULL, indicator_observable3 VARCHAR(128) NOT NULL, indicator_observable4 VARCHAR(128) NOT NULL, indicator_generic1 VARCHAR(128) NOT NULL, indicator_generic2 VARCHAR(128) NOT NULL, indicator_generic3 VARCHAR(128) NOT NULL, indicator_generic4 VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE signing (id INT AUTO_INCREMENT NOT NULL, user_jobs_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_F052224A107D582D (user_jobs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_jobs (id INT AUTO_INCREMENT NOT NULL, jobs_id INT NOT NULL, user_id INT NOT NULL, formateur_id INT NOT NULL, skils_id INT NOT NULL, INDEX IDX_D212210C48704627 (jobs_id), INDEX IDX_D212210CA76ED395 (user_id), INDEX IDX_D212210C155D8F51 (formateur_id), INDEX IDX_D212210C5DFF868B (skils_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC57E3C61F9 FOREIGN KEY (owner_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE jobs_sfcs ADD CONSTRAINT FK_BF5F773848704627 FOREIGN KEY (jobs_id) REFERENCES jobs (id)');
        $this->addSql('ALTER TABLE jobs_sfcs ADD CONSTRAINT FK_BF5F77389A9518EE FOREIGN KEY (sfc_id) REFERENCES sfcs (id)');
        $this->addSql('ALTER TABLE jobs_sfcs ADD CONSTRAINT FK_BF5F77387FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E414399BBB2E FOREIGN KEY (signing_id) REFERENCES signing (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E41457903FEF FOREIGN KEY (jobs_sfc_id) REFERENCES jobs_sfcs (id)');
        $this->addSql('ALTER TABLE signing ADD CONSTRAINT FK_F052224A107D582D FOREIGN KEY (user_jobs_id) REFERENCES user_jobs (id)');
        $this->addSql('ALTER TABLE user_jobs ADD CONSTRAINT FK_D212210C48704627 FOREIGN KEY (jobs_id) REFERENCES jobs (id)');
        $this->addSql('ALTER TABLE user_jobs ADD CONSTRAINT FK_D212210CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user_jobs ADD CONSTRAINT FK_D212210C155D8F51 FOREIGN KEY (formateur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user_jobs ADD CONSTRAINT FK_D212210C5DFF868B FOREIGN KEY (skils_id) REFERENCES skills (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jobs_sfcs DROP FOREIGN KEY FK_BF5F773848704627');
        $this->addSql('ALTER TABLE user_jobs DROP FOREIGN KEY FK_D212210C48704627');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E41457903FEF');
        $this->addSql('ALTER TABLE jobs_sfcs DROP FOREIGN KEY FK_BF5F77389A9518EE');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E414399BBB2E');
        $this->addSql('ALTER TABLE jobs_sfcs DROP FOREIGN KEY FK_BF5F77387FF61858');
        $this->addSql('ALTER TABLE user_jobs DROP FOREIGN KEY FK_D212210C5DFF868B');
        $this->addSql('ALTER TABLE signing DROP FOREIGN KEY FK_F052224A107D582D');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC57E3C61F9');
        $this->addSql('ALTER TABLE user_jobs DROP FOREIGN KEY FK_D212210CA76ED395');
        $this->addSql('ALTER TABLE user_jobs DROP FOREIGN KEY FK_D212210C155D8F51');
        $this->addSql('DROP TABLE jobs');
        $this->addSql('DROP TABLE jobs_sfcs');
        $this->addSql('DROP TABLE results');
        $this->addSql('DROP TABLE sfcs');
        $this->addSql('DROP TABLE signing');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE user_jobs');
        $this->addSql('DROP TABLE users');
    }
}
