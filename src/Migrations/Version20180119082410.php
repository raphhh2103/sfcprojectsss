<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180119082410 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_jobs (id INT AUTO_INCREMENT NOT NULL, jobs_id INT NOT NULL, user_id INT NOT NULL, formateur_id INT NOT NULL, skils_id INT NOT NULL, INDEX IDX_D212210C48704627 (jobs_id), INDEX IDX_D212210CA76ED395 (user_id), INDEX IDX_D212210C155D8F51 (formateur_id), INDEX IDX_D212210C5DFF868B (skils_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_jobs ADD CONSTRAINT FK_D212210C48704627 FOREIGN KEY (jobs_id) REFERENCES jobs (id)');
        $this->addSql('ALTER TABLE user_jobs ADD CONSTRAINT FK_D212210CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user_jobs ADD CONSTRAINT FK_D212210C155D8F51 FOREIGN KEY (formateur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user_jobs ADD CONSTRAINT FK_D212210C5DFF868B FOREIGN KEY (skils_id) REFERENCES skills (id)');
        $this->addSql('DROP TABLE users_jobs');
        $this->addSql('ALTER TABLE jobs ADD owner_id INT DEFAULT NULL, ADD name_jobs VARCHAR(50) NOT NULL, ADD description VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC57E3C61F9 FOREIGN KEY (owner_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A8936DC57E3C61F9 ON jobs (owner_id)');
        $this->addSql('ALTER TABLE jobs_sfcs ADD jobs_id INT NOT NULL, ADD sfc_id INT NOT NULL, ADD skills_id INT NOT NULL, ADD indicator_observable1 VARCHAR(128) NOT NULL, ADD indicator_observable2 VARCHAR(128) NOT NULL, ADD indicator_observable3 VARCHAR(128) NOT NULL, ADD indicator_observable4 VARCHAR(128) NOT NULL, ADD indicator_generic1 VARCHAR(128) NOT NULL, ADD indicator_generic2 VARCHAR(128) NOT NULL, ADD indicator_generic3 VARCHAR(128) NOT NULL, ADD indicator_generic4 VARCHAR(128) NOT NULL, ADD required_level INT NOT NULL');
        $this->addSql('ALTER TABLE jobs_sfcs ADD CONSTRAINT FK_BF5F773848704627 FOREIGN KEY (jobs_id) REFERENCES jobs (id)');
        $this->addSql('ALTER TABLE jobs_sfcs ADD CONSTRAINT FK_BF5F77389A9518EE FOREIGN KEY (sfc_id) REFERENCES sfcs (id)');
        $this->addSql('ALTER TABLE jobs_sfcs ADD CONSTRAINT FK_BF5F77387FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id)');
        $this->addSql('CREATE INDEX IDX_BF5F773848704627 ON jobs_sfcs (jobs_id)');
        $this->addSql('CREATE INDEX IDX_BF5F77389A9518EE ON jobs_sfcs (sfc_id)');
        $this->addSql('CREATE INDEX IDX_BF5F77387FF61858 ON jobs_sfcs (skills_id)');
        $this->addSql('ALTER TABLE results ADD signing_id INT NOT NULL, ADD jobs_sfc_id INT NOT NULL, ADD value INT NOT NULL');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E414399BBB2E FOREIGN KEY (signing_id) REFERENCES signing (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E41457903FEF FOREIGN KEY (jobs_sfc_id) REFERENCES jobs_sfcs (id)');
        $this->addSql('CREATE INDEX IDX_9FA3E414399BBB2E ON results (signing_id)');
        $this->addSql('CREATE INDEX IDX_9FA3E41457903FEF ON results (jobs_sfc_id)');
        $this->addSql('ALTER TABLE sfcs ADD name_sfc VARCHAR(128) NOT NULL, ADD description VARCHAR(255) NOT NULL, ADD date_create DATE NOT NULL, ADD date_update DATE NOT NULL, ADD is_valid TINYINT(1) NOT NULL, ADD indicator_observable1 VARCHAR(128) NOT NULL, ADD indicator_observable2 VARCHAR(128) NOT NULL, ADD indicator_observable3 VARCHAR(128) NOT NULL, ADD indicator_observable4 VARCHAR(128) NOT NULL, ADD indicator_generic1 VARCHAR(128) NOT NULL, ADD indicator_generic2 VARCHAR(128) NOT NULL, ADD indicator_generic3 VARCHAR(128) NOT NULL, ADD indicator_generic4 VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE signing ADD user_jobs_id INT NOT NULL, ADD date DATE NOT NULL');
        $this->addSql('ALTER TABLE signing ADD CONSTRAINT FK_F052224A107D582D FOREIGN KEY (user_jobs_id) REFERENCES user_jobs (id)');
        $this->addSql('CREATE INDEX IDX_F052224A107D582D ON signing (user_jobs_id)');
        $this->addSql('ALTER TABLE skills ADD name VARCHAR(150) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_D5428AEDF85E0677 ON users');
        $this->addSql('ALTER TABLE users RENAME INDEX uniq_d5428aede7927c74 TO UNIQ_1483A5E9E7927C74');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE signing DROP FOREIGN KEY FK_F052224A107D582D');
        $this->addSql('CREATE TABLE users_jobs (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE user_jobs');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC57E3C61F9');
        $this->addSql('DROP INDEX UNIQ_A8936DC57E3C61F9 ON jobs');
        $this->addSql('ALTER TABLE jobs DROP owner_id, DROP name_jobs, DROP description');
        $this->addSql('ALTER TABLE jobs_sfcs DROP FOREIGN KEY FK_BF5F773848704627');
        $this->addSql('ALTER TABLE jobs_sfcs DROP FOREIGN KEY FK_BF5F77389A9518EE');
        $this->addSql('ALTER TABLE jobs_sfcs DROP FOREIGN KEY FK_BF5F77387FF61858');
        $this->addSql('DROP INDEX IDX_BF5F773848704627 ON jobs_sfcs');
        $this->addSql('DROP INDEX IDX_BF5F77389A9518EE ON jobs_sfcs');
        $this->addSql('DROP INDEX IDX_BF5F77387FF61858 ON jobs_sfcs');
        $this->addSql('ALTER TABLE jobs_sfcs DROP jobs_id, DROP sfc_id, DROP skills_id, DROP indicator_observable1, DROP indicator_observable2, DROP indicator_observable3, DROP indicator_observable4, DROP indicator_generic1, DROP indicator_generic2, DROP indicator_generic3, DROP indicator_generic4, DROP required_level');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E414399BBB2E');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E41457903FEF');
        $this->addSql('DROP INDEX IDX_9FA3E414399BBB2E ON results');
        $this->addSql('DROP INDEX IDX_9FA3E41457903FEF ON results');
        $this->addSql('ALTER TABLE results DROP signing_id, DROP jobs_sfc_id, DROP value');
        $this->addSql('ALTER TABLE sfcs DROP name_sfc, DROP description, DROP date_create, DROP date_update, DROP is_valid, DROP indicator_observable1, DROP indicator_observable2, DROP indicator_observable3, DROP indicator_observable4, DROP indicator_generic1, DROP indicator_generic2, DROP indicator_generic3, DROP indicator_generic4');
        $this->addSql('DROP INDEX IDX_F052224A107D582D ON signing');
        $this->addSql('ALTER TABLE signing DROP user_jobs_id, DROP date');
        $this->addSql('ALTER TABLE skills DROP name');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D5428AEDF85E0677 ON users (username)');
        $this->addSql('ALTER TABLE users RENAME INDEX uniq_1483a5e9e7927c74 TO UNIQ_D5428AEDE7927C74');
    }
}
