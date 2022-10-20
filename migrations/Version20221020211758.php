<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221020211758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE api_clients (id INT AUTO_INCREMENT NOT NULL, client_id VARCHAR(255) NOT NULL, client_secret VARCHAR(255) NOT NULL, client_name VARCHAR(255) NOT NULL, client_mail VARCHAR(255) NOT NULL, active VARCHAR(255) NOT NULL, short_description VARCHAR(255) DEFAULT NULL, full_description VARCHAR(255) DEFAULT NULL, logo_url VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, dpo VARCHAR(255) NOT NULL, technical_contact VARCHAR(255) NOT NULL, commercial_contact VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE api_clients_grants (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, install_id INT NOT NULL, active VARCHAR(255) NOT NULL, perms VARCHAR(255) NOT NULL, branch_id INT NOT NULL, UNIQUE INDEX UNIQ_85DCB18FDC2902E0 (client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE api_install_perm (id INT AUTO_INCREMENT NOT NULL, install_id_id INT NOT NULL, branch_id VARCHAR(255) NOT NULL, client_id VARCHAR(255) NOT NULL, members_read INT NOT NULL, members_write INT NOT NULL, members_add INT NOT NULL, members_payment_schedules_read INT NOT NULL, members_statistiques_read INT NOT NULL, members_subscription_read INT NOT NULL, payment_schedules_read INT NOT NULL, payment_schedules_write INT NOT NULL, payment_day_read INT NOT NULL, INDEX IDX_E8DCE66E1BE7EDD8 (install_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE api_clients_grants ADD CONSTRAINT FK_85DCB18FDC2902E0 FOREIGN KEY (client_id_id) REFERENCES api_clients (id)');
        $this->addSql('ALTER TABLE api_install_perm ADD CONSTRAINT FK_E8DCE66E1BE7EDD8 FOREIGN KEY (install_id_id) REFERENCES api_clients_grants (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE api_clients_grants DROP FOREIGN KEY FK_85DCB18FDC2902E0');
        $this->addSql('ALTER TABLE api_install_perm DROP FOREIGN KEY FK_E8DCE66E1BE7EDD8');
        $this->addSql('DROP TABLE api_clients');
        $this->addSql('DROP TABLE api_clients_grants');
        $this->addSql('DROP TABLE api_install_perm');
    }
}
