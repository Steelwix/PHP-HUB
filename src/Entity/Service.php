<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $language = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 10000, nullable: true)]
    private ?string $code = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    private ?User $creator = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $release = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $update = null;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'services')]
    private Collection $tag;

    public function __construct()
    {
        $this->tag = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCreator(): ?User
    {
        return $this->creator;
    }

    public function setCreator(?User $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    public function getRelease(): ?\DateTimeInterface
    {
        return $this->release;
    }

    public function setRelease(\DateTimeInterface $release): self
    {
        $this->release = $release;

        return $this;
    }

    public function getUpdate(): ?\DateTimeInterface
    {
        return $this->update;
    }

    public function setUpdate(\DateTimeInterface $update): self
    {
        $this->update = $update;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tag->contains($tag)) {
            $this->tag->add($tag);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        $this->tag->removeElement($tag);

        return $this;
    }
}
