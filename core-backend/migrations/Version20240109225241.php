<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240109225241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE complaints_and_returns (id INT AUTO_INCREMENT NOT NULL, delivery_id INT DEFAULT NULL, type VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', description LONGTEXT DEFAULT NULL, INDEX IDX_26B4D8B612136921 (delivery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT NOT NULL, name VARCHAR(255) NOT NULL, customer_number VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery (id INT AUTO_INCREMENT NOT NULL, order_id_id INT NOT NULL, delivered_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivery_number VARCHAR(50) NOT NULL, distance DOUBLE PRECISION NOT NULL, day_time VARCHAR(50) NOT NULL, week_time VARCHAR(50) NOT NULL, status VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_3781EC10FCDAEAAA (order_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, ordered_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', amount DOUBLE PRECISION NOT NULL, order_number VARCHAR(50) NOT NULL, INDEX IDX_F52993989395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE response (id INT AUTO_INCREMENT NOT NULL, question_id INT DEFAULT NULL, delivery_id INT NOT NULL, value DOUBLE PRECISION NOT NULL, INDEX IDX_3E7B0BFB1E27F6BF (question_id), INDEX IDX_3E7B0BFB12136921 (delivery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(180) NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE complaints_and_returns ADD CONSTRAINT FK_26B4D8B612136921 FOREIGN KEY (delivery_id) REFERENCES delivery (id)');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE delivery ADD CONSTRAINT FK_3781EC10FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE response ADD CONSTRAINT FK_3E7B0BFB1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE response ADD CONSTRAINT FK_3E7B0BFB12136921 FOREIGN KEY (delivery_id) REFERENCES delivery (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE complaints_and_returns DROP FOREIGN KEY FK_26B4D8B612136921');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09BF396750');
        $this->addSql('ALTER TABLE delivery DROP FOREIGN KEY FK_3781EC10FCDAEAAA');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989395C3F3');
        $this->addSql('ALTER TABLE response DROP FOREIGN KEY FK_3E7B0BFB1E27F6BF');
        $this->addSql('ALTER TABLE response DROP FOREIGN KEY FK_3E7B0BFB12136921');
        $this->addSql('DROP TABLE complaints_and_returns');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE delivery');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE response');
        $this->addSql('DROP TABLE user');
    }
}
