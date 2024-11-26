<?php

namespace App\Entity;

use App\Enum\CommentStatusEnum;
use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(enumType: CommentStatusEnum::class)]
    private ?CommentStatusEnum $status = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'commentsChilds')]
    private ?self $parentCommentId = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parentCommentId')]
    private Collection $commentsChilds;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Media $mediaId = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userId = null;

    public function __construct()
    {
        $this->commentsChilds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getStatus(): ?CommentStatusEnum
    {
        return $this->status;
    }

    public function setStatus(CommentStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getParentCommentId(): ?self
    {
        return $this->parentCommentId;
    }

    public function setParentCommentId(?self $parentCommentId): static
    {
        $this->parentCommentId = $parentCommentId;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getCommentsChilds(): Collection
    {
        return $this->commentsChilds;
    }

    public function addCommentsChilds(self $commentsChilds): static
    {
        if (!$this->commentsChilds->contains($commentsChilds)) {
            $this->commentsChilds->add($commentsChilds);
            $commentsChilds->setParentCommentId($this);
        }

        return $this;
    }

    public function removeCommentsChilds(self $commentsChilds): static
    {
        if ($this->commentsChilds->removeElement($commentsChilds)) {
            // set the owning side to null (unless already changed)
            if ($commentsChilds->getParentCommentId() === $this) {
                $commentsChilds->setParentCommentId(null);
            }
        }

        return $this;
    }

    public function getMediaId(): ?Media
    {
        return $this->mediaId;
    }

    public function setMediaId(?Media $mediaId): static
    {
        $this->mediaId = $mediaId;

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
}
