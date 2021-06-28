<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210627162027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_details ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD adress2 VARCHAR(255) DEFAULT NULL, ADD country VARCHAR(255) NOT NULL, ADD postalcode VARCHAR(255) NOT NULL, ADD payment_method VARCHAR(255) NOT NULL, ADD shipping_method VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD status VARCHAR(255) DEFAULT NULL, ADD paid DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_details DROP firstname, DROP lastname, DROP email, DROP address, DROP adress2, DROP country, DROP postalcode, DROP payment_method, DROP shipping_method, DROP phone, DROP status, DROP paid');
    }
}
