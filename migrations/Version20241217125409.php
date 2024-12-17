<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217125409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84FDC588714');
        $this->addSql('DROP INDEX IDX_C930B84FDC588714 ON playlist_media');
        $this->addSql('ALTER TABLE playlist_media CHANGE playlist_id_id playlist_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('CREATE INDEX IDX_C930B84F6BBD148 ON playlist_media (playlist_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84F6BBD148');
        $this->addSql('DROP INDEX IDX_C930B84F6BBD148 ON playlist_media');
        $this->addSql('ALTER TABLE playlist_media CHANGE playlist_id playlist_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FDC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C930B84FDC588714 ON playlist_media (playlist_id_id)');
    }
}
