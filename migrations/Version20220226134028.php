<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220226134028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, price DOUBLE PRECISION NOT NULL, src VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE user_address (user_id INTEGER NOT NULL, address_id INTEGER NOT NULL, PRIMARY KEY(user_id, address_id))');
        $this->addSql('CREATE INDEX IDX_5543718BA76ED395 ON user_address (user_id)');
        $this->addSql('CREATE INDEX IDX_5543718BF5B7AF75 ON user_address (address_id)');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE customer_address');
        $this->addSql('DROP INDEX IDX_75EA56E016BA31DB');
        $this->addSql('DROP INDEX IDX_75EA56E0E3BD61CE');
        $this->addSql('DROP INDEX IDX_75EA56E0FB7336F0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__messenger_messages AS SELECT id, body, headers, queue_name, created_at, available_at, delivered_at FROM messenger_messages');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL COLLATE BINARY, headers CLOB NOT NULL COLLATE BINARY, queue_name VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO messenger_messages (id, body, headers, queue_name, created_at, available_at, delivered_at) SELECT id, body, headers, queue_name, created_at, available_at, delivered_at FROM __temp__messenger_messages');
        $this->addSql('DROP TABLE __temp__messenger_messages');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL COLLATE BINARY, last_name VARCHAR(100) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('CREATE TABLE customer_address (customer_id INTEGER NOT NULL, address_id INTEGER NOT NULL, PRIMARY KEY(customer_id, address_id))');
        $this->addSql('CREATE INDEX IDX_1193CB3FF5B7AF75 ON customer_address (address_id)');
        $this->addSql('CREATE INDEX IDX_1193CB3F9395C3F3 ON customer_address (customer_id)');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user_address');
    }
}
