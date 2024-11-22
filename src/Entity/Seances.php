<?php

namespace App\Entity;

use App\Repository\SeancesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeancesRepository::class)]
class Seances
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_seance = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Heure_debut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $heure_fin = null;

    #[ORM\ManyToOne(inversedBy: 'Films')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Salles $salles = null;

    #[ORM\ManyToOne(inversedBy: 'films')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Films $Films = null;

    /**
     * @var Collection<int, Reservations>
     */
    #[ORM\OneToMany(targetEntity: Reservations::class, mappedBy: 'Seances')]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSeance(): ?\DateTimeInterface
    {
        return $this->Date_seance;
    }

    public function setDateSeance(\DateTimeInterface $Date_seance): static
    {
        $this->Date_seance = $Date_seance;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->Heure_debut;
    }

    public function setHeureDebut(\DateTimeInterface $Heure_debut): static
    {
        $this->Heure_debut = $Heure_debut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heure_fin;
    }

    public function setHeureFin(\DateTimeInterface $heure_fin): static
    {
        $this->heure_fin = $heure_fin;

        return $this;
    }

    public function getSalles(): ?Salles
    {
        return $this->salles;
    }

    public function setSalles(?Salles $salles): static
    {
        $this->salles = $salles;

        return $this;
    }

    public function getFilms(): ?Films
    {
        return $this->Films;
    }

    public function setFilms(?Films $Films): static
    {
        $this->Films = $Films;

        return $this;
    }

    /**
     * @return Collection<int, Reservations>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservations $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setSeances($this);
        }

        return $this;
    }

    public function removeReservation(Reservations $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getSeances() === $this) {
                $reservation->setSeances(null);
            }
        }

        return $this;
    }
}
