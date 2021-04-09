<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407101755 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, model INT NOT NULL, title VARCHAR(255) NOT NULL, job_cv VARCHAR(255) NOT NULL, about LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, short_url VARCHAR(255) DEFAULT NULL, INDEX IDX_B66FFE929D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hobbies (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, icon VARCHAR(255) DEFAULT NULL, hobby_name VARCHAR(255) NOT NULL, INDEX IDX_38CA341D9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, training_date_from DATE NOT NULL, training_date_to DATE NOT NULL, diploma_name VARCHAR(255) NOT NULL, school_name VARCHAR(255) NOT NULL, school_location VARCHAR(255) NOT NULL, diploma_description LONGTEXT NOT NULL, INDEX IDX_D5128A8F9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xp (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, job_date_from DATE NOT NULL, job_date_to DATE NOT NULL, job_name VARCHAR(255) NOT NULL, company_name VARCHAR(255) NOT NULL, job_location VARCHAR(255) NOT NULL, job_description LONGTEXT NOT NULL, INDEX IDX_F63A903D9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE929D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE hobbies ADD CONSTRAINT FK_38CA341D9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE xp ADD CONSTRAINT FK_F63A903D9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE hobbies');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE xp');
    }
}
