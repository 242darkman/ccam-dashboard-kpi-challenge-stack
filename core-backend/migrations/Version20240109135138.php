<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240109135138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE complaints_and_returns (id INT AUTO_INCREMENT NOT NULL, delivery_id INT DEFAULT NULL, type VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', description LONGTEXT DEFAULT NULL, INDEX IDX_26B4D8B612136921 (delivery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery (id INT AUTO_INCREMENT NOT NULL, order_id_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivery_number VARCHAR(50) NOT NULL, distance DOUBLE PRECISION NOT NULL, day_time VARCHAR(50) NOT NULL, week_time VARCHAR(50) NOT NULL, status VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_3781EC10FCDAEAAA (order_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE satisfaction (id INT AUTO_INCREMENT NOT NULL, delivery_id INT NOT NULL, UNIQUE INDEX UNIQ_8A8E0C1312136921 (delivery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE complaints_and_returns ADD CONSTRAINT FK_26B4D8B612136921 FOREIGN KEY (delivery_id) REFERENCES delivery (id)');
        $this->addSql('ALTER TABLE delivery ADD CONSTRAINT FK_3781EC10FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE satisfaction ADD CONSTRAINT FK_8A8E0C1312136921 FOREIGN KEY (delivery_id) REFERENCES delivery (id)');
        $this->addSql('ALTER TABLE `order` ADD order_number VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE complaints_and_returns DROP FOREIGN KEY FK_26B4D8B612136921');
        $this->addSql('ALTER TABLE delivery DROP FOREIGN KEY FK_3781EC10FCDAEAAA');
        $this->addSql('ALTER TABLE satisfaction DROP FOREIGN KEY FK_8A8E0C1312136921');
        $this->addSql('DROP TABLE complaints_and_returns');
        $this->addSql('DROP TABLE delivery');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE satisfaction');
        $this->addSql('ALTER TABLE `order` DROP order_number');
    }
}
