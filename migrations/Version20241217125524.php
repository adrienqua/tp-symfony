<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217125524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C9D86650F');
        $this->addSql('DROP INDEX IDX_832940C9D86650F ON playlist_subscription');
        $this->addSql('ALTER TABLE playlist_subscription CHANGE user_id_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940CA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_832940CA76ED395 ON playlist_subscription (user_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940CA76ED395');
        $this->addSql('DROP INDEX IDX_832940CA76ED395 ON playlist_subscription');
        $this->addSql('ALTER TABLE playlist_subscription CHANGE user_id user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_832940C9D86650F ON playlist_subscription (user_id_id)');
    }
}
