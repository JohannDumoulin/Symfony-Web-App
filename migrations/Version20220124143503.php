<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124143503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, country VARCHAR(255) NOT NULL, zipcode VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, address_line_first VARCHAR(255) NOT NULL, address_line_second VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE customer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE customer_address (customer_id INTEGER NOT NULL, address_id INTEGER NOT NULL, PRIMARY KEY(customer_id, address_id))');
        $this->addSql('CREATE INDEX IDX_1193CB3F9395C3F3 ON customer_address (customer_id)');
        $this->addSql('CREATE INDEX IDX_1193CB3FF5B7AF75 ON customer_address (address_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE customer_address');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
