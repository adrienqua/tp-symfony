<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217124730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA68756988');
        $this->addSql('DROP INDEX IDX_DDAA1CDA68756988 ON episode');
        $this->addSql('ALTER TABLE episode CHANGE season_id_id season_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA4EC001D1 ON episode (season_id)');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940CDC588714');
        $this->addSql('DROP INDEX IDX_832940CDC588714 ON playlist_subscription');
        $this->addSql('ALTER TABLE playlist_subscription CHANGE playlist_id_id playlist_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('CREATE INDEX IDX_832940C6BBD148 ON playlist_subscription (playlist_id)');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8605D5AE6');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD89D86650F');
        $this->addSql('DROP INDEX IDX_DE44EFD89D86650F ON watch_history');
        $this->addSql('DROP INDEX IDX_DE44EFD8605D5AE6 ON watch_history');
        $this->addSql('ALTER TABLE watch_history ADD user_id INT DEFAULT NULL, ADD media_id INT DEFAULT NULL, DROP user_id_id, DROP media_id_id');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8A76ED395 ON watch_history (user_id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8EA9FDD75 ON watch_history (media_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8A76ED395');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8EA9FDD75');
        $this->addSql('DROP INDEX IDX_DE44EFD8A76ED395 ON watch_history');
        $this->addSql('DROP INDEX IDX_DE44EFD8EA9FDD75 ON watch_history');
        $this->addSql('ALTER TABLE watch_history ADD user_id_id INT DEFAULT NULL, ADD media_id_id INT DEFAULT NULL, DROP user_id, DROP media_id');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD89D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_DE44EFD89D86650F ON watch_history (user_id_id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8605D5AE6 ON watch_history (media_id_id)');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C6BBD148');
        $this->addSql('DROP INDEX IDX_832940C6BBD148 ON playlist_subscription');
        $this->addSql('ALTER TABLE playlist_subscription CHANGE playlist_id playlist_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940CDC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_832940CDC588714 ON playlist_subscription (playlist_id_id)');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('DROP INDEX IDX_DDAA1CDA4EC001D1 ON episode');
        $this->addSql('ALTER TABLE episode CHANGE season_id season_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA68756988 FOREIGN KEY (season_id_id) REFERENCES season (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA68756988 ON episode (season_id_id)');
    }
}
