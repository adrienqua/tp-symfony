<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217125440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84F605D5AE6');
        $this->addSql('DROP INDEX IDX_C930B84F605D5AE6 ON playlist_media');
        $this->addSql('ALTER TABLE playlist_media CHANGE media_id_id media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_C930B84FEA9FDD75 ON playlist_media (media_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84FEA9FDD75');
        $this->addSql('DROP INDEX IDX_C930B84FEA9FDD75 ON playlist_media');
        $this->addSql('ALTER TABLE playlist_media CHANGE media_id media_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C930B84F605D5AE6 ON playlist_media (media_id_id)');
    }
}
