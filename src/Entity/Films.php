<?php

namespace App\Entity;

use App\Repository\FilmsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmsRepository::class)]
class Films
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $age_mini = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $note = null;

    #[ORM\Column]
    private ?bool $coup_coeur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_sortie = null;

    #[ORM\Column]
    private array $genre = [];

    #[ORM\Column(length: 255)]
    private ?string $affiche = null;

    #[ORM\Column]
    private ?int $duree = null;

    /**
     * @var Collection<int, Seances>
     */
    #[ORM\OneToMany(targetEntity: Seances::class, mappedBy: 'Films')]
    private Collection $films;

    public function __construct()
    {
        $this->films = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAgeMini(): ?int
    {
        return $this->age_mini;
    }

    public function setAgeMini(int $age_mini): static
    {
        $this->age_mini = $age_mini;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function isCoupCoeur(): ?bool
    {
        return $this->coup_coeur;
    }

    public function setCoupCoeur(bool $coup_coeur): static
    {
        $this->coup_coeur = $coup_coeur;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(\DateTimeInterface $date_sortie): static
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    public function getGenre(): array
    {
        return $this->genre;
    }

    public function setGenre(array $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getAffiche(): ?string
    {
        return $this->affiche;
    }

    public function setAffiche(string $affiche): static
    {
        $this->affiche = $affiche;

        return $this;
    }

    //emplacement des images

    public function getAffichePath(): string
    {
        return $this->affiche ? '/affiches/' . $this->affiche : '/affiches/default.jpg';
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection<int, Seances>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Seances $film): static
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
            $film->setFilms($this);
        }

        return $this;
    }

    public function removeFilm(Seances $film): static
    {
        if ($this->films->removeElement($film)) {
            // set the owning side to null (unless already changed)
            if ($film->getFilms() === $this) {
                $film->setFilms(null);
            }
        }

        return $this;
    }
}
