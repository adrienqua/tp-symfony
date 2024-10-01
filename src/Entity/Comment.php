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

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'commentsList')]
    private ?self $parentCommentId = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parentCommentId')]
    private Collection $commentsList;

    public function __construct()
    {
        $this->commentsList = new ArrayCollection();
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
    public function getCommentsList(): Collection
    {
        return $this->commentsList;
    }

    public function addCommentsList(self $commentsList): static
    {
        if (!$this->commentsList->contains($commentsList)) {
            $this->commentsList->add($commentsList);
            $commentsList->setParentCommentId($this);
        }

        return $this;
    }

    public function removeCommentsList(self $commentsList): static
    {
        if ($this->commentsList->removeElement($commentsList)) {
            // set the owning side to null (unless already changed)
            if ($commentsList->getParentCommentId() === $this) {
                $commentsList->setParentCommentId(null);
            }
        }

        return $this;
    }
}
