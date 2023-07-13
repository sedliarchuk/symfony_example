<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230713093220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE node_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE node_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE node (id INT NOT NULL, category_id INT NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_857FE845B548B0F ON node (path)');
        $this->addSql('CREATE INDEX IDX_857FE84512469DE2 ON node (category_id)');
        $this->addSql('CREATE TABLE node_category (id INT NOT NULL, title VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, status BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, update_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B8E10194B548B0F ON node_category (path)');
        $this->addSql('COMMENT ON COLUMN node_category.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN node_category.update_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE84512469DE2 FOREIGN KEY (category_id) REFERENCES node_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE node_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE node_category_id_seq CASCADE');
        $this->addSql('ALTER TABLE node DROP CONSTRAINT FK_857FE84512469DE2');
        $this->addSql('DROP TABLE node');
        $this->addSql('DROP TABLE node_category');
    }
}
