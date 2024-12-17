<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217125311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D04915DDBA');
        $this->addSql('DROP INDEX IDX_54AF90D04915DDBA ON subscription_history');
        $this->addSql('ALTER TABLE subscription_history CHANGE subcription_id_id subcription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D02D5A078E FOREIGN KEY (subcription_id) REFERENCES subscription (id)');
        $this->addSql('CREATE INDEX IDX_54AF90D02D5A078E ON subscription_history (subcription_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D02D5A078E');
        $this->addSql('DROP INDEX IDX_54AF90D02D5A078E ON subscription_history');
        $this->addSql('ALTER TABLE subscription_history CHANGE subcription_id subcription_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D04915DDBA FOREIGN KEY (subcription_id_id) REFERENCES subscription (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_54AF90D04915DDBA ON subscription_history (subcription_id_id)');
    }
}
