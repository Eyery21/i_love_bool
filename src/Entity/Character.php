<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $realName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alias = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alignment = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $espece = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $baseOfOperations = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nemesys = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $occupation = null;

    #[ORM\Column(nullable: true)]
    private ?array $affiliations = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $originStory = null;

    #[ORM\Column(nullable: true)]
    private ?array $power = null;

    #[ORM\Column(nullable: true)]
    private ?array $equipement = null;

    /**
     * @var Collection<int, Book>
     */
    #[ORM\ManyToMany(targetEntity: Book::class, mappedBy: 'personnage')]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRealName(): ?string
    {
        return $this->realName;
    }

    public function setRealName(string $realName): static
    {
        $this->realName = $realName;

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(?string $alias): static
    {
        $this->alias = $alias;

        return $this;
    }

    public function getAlignment(): ?string
    {
        return $this->alignment;
    }

    public function setAlignment(?string $alignment): static
    {
        $this->alignment = $alignment;

        return $this;
    }

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(?string $espece): static
    {
        $this->espece = $espece;

        return $this;
    }

    public function getBaseOfOperations(): ?string
    {
        return $this->baseOfOperations;
    }

    public function setBaseOfOperations(?string $baseOfOperations): static
    {
        $this->baseOfOperations = $baseOfOperations;

        return $this;
    }

    public function getNemesys(): ?string
    {
        return $this->nemesys;
    }

    public function setNemesys(?string $nemesys): static
    {
        $this->nemesys = $nemesys;

        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(?string $occupation): static
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function getAffiliations(): ?array
    {
        return $this->affiliations;
    }

    public function setAffiliations(?array $affiliations): static
    {
        $this->affiliations = $affiliations;

        return $this;
    }

    public function getOriginStory(): ?string
    {
        return $this->originStory;
    }

    public function setOriginStory(?string $originStory): static
    {
        $this->originStory = $originStory;

        return $this;
    }

    public function getPower(): ?array
    {
        return $this->power;
    }

    public function setPower(?array $power): static
    {
        $this->power = $power;

        return $this;
    }

    public function getEquipement(): ?array
    {
        return $this->equipement;
    }

    public function setEquipement(?array $equipement): static
    {
        $this->equipement = $equipement;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): static
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->addPersonnage($this);
        }

        return $this;
    }

    public function removeBook(Book $book): static
    {
        if ($this->books->removeElement($book)) {
            $book->removePersonnage($this);
        }

        return $this;
    }
}
