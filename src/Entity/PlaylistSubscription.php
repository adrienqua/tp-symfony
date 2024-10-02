<?php

namespace App\Entity;

use App\Repository\PlaylistSubscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistSubscriptionRepository::class)]
class PlaylistSubscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $subscribedAt = null;

    #[ORM\ManyToOne(inversedBy: 'playlistSubscriptions')]
    private ?User $userId = null;

    #[ORM\ManyToOne(inversedBy: 'playlistSubscriptions')]
    private ?Playlist $playlistId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubscribedAt(): ?\DateTimeImmutable
    {
        return $this->subscribedAt;
    }

    public function setSubscribedAt(\DateTimeImmutable $subscribedAt): static
    {
        $this->subscribedAt = $subscribedAt;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getPlaylistId(): ?Playlist
    {
        return $this->playlistId;
    }

    public function setPlaylistId(?Playlist $playlistId): static
    {
        $this->playlistId = $playlistId;

        return $this;
    }
}
