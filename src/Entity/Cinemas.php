<?php

namespace App\Entity;

use App\Repository\CinemasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CinemasRepository::class)]
class Cinemas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_cinema = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_gsm = null;

    #[ORM\Column]
    private array $horaires = [];

    /**
     * @var Collection<int, Salles>
     */
    #[ORM\OneToMany(targetEntity: Salles::class, mappedBy: 'cinemas')]
    private Collection $cineSalle;

    public function __construct()
    {
        $this->cineSalle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCinema(): ?string
    {
        return $this->Nom_cinema;
    }

    public function setNomCinema(string $Nom_cinema): static
    {
        $this->Nom_cinema = $Nom_cinema;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getNumeroGsm(): ?string
    {
        return $this->numero_gsm;
    }

    public function setNumeroGsm(string $numero_gsm): static
    {
        $this->numero_gsm = $numero_gsm;

        return $this;
    }

    public function getHoraires(): array
    {
        return $this->horaires;
    }

    public function setHoraires(array $horaires): static
    {
        $this->horaires = $horaires;

        return $this;
    }

    /**
     * @return Collection<int, Salles>
     */
    public function getCineSalle(): Collection
    {
        return $this->cineSalle;
    }

    public function addCineSalle(Salles $cineSalle): static
    {
        if (!$this->cineSalle->contains($cineSalle)) {
            $this->cineSalle->add($cineSalle);
            $cineSalle->setCinemas($this);
        }

        return $this;
    }

    public function removeCineSalle(Salles $cineSalle): static
    {
        if ($this->cineSalle->removeElement($cineSalle)) {
            // set the owning side to null (unless already changed)
            if ($cineSalle->getCinemas() === $this) {
                $cineSalle->setCinemas(null);
            }
        }

        return $this;
    }
}
