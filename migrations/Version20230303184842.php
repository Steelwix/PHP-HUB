<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303184842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE service_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tag_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE service (id INT NOT NULL, creator_id INT DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(5000) DEFAULT NULL, code VARCHAR(10000) DEFAULT NULL, release TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E19D9AD261220EA6 ON service (creator_id)');
        $this->addSql('CREATE TABLE service_tag (service_id INT NOT NULL, tag_id INT NOT NULL, PRIMARY KEY(service_id, tag_id))');
        $this->addSql('CREATE INDEX IDX_21D9C4F4ED5CA9E6 ON service_tag (service_id)');
        $this->addSql('CREATE INDEX IDX_21D9C4F4BAD26311 ON service_tag (tag_id)');
        $this->addSql('CREATE TABLE tag (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD261220EA6 FOREIGN KEY (creator_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_tag ADD CONSTRAINT FK_21D9C4F4ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_tag ADD CONSTRAINT FK_21D9C4F4BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD registered DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD last_connection TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE service_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tag_id_seq CASCADE');
        $this->addSql('ALTER TABLE service DROP CONSTRAINT FK_E19D9AD261220EA6');
        $this->addSql('ALTER TABLE service_tag DROP CONSTRAINT FK_21D9C4F4ED5CA9E6');
        $this->addSql('ALTER TABLE service_tag DROP CONSTRAINT FK_21D9C4F4BAD26311');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('ALTER TABLE "user" DROP registered');
        $this->addSql('ALTER TABLE "user" DROP last_connection');
    }
}
