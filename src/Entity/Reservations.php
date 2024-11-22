<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'emails')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Email = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Seances $Seances = null;

    #[ORM\Column]
    private ?int $nb_places = null;

    #[ORM\Column]
    private ?float $Prix_total = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $QR_code = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?User
    {
        return $this->Email;
    }

    public function setEmail(?User $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getSeances(): ?Seances
    {
        return $this->Seances;
    }

    public function setSeances(?Seances $Seances): static
    {
        $this->Seances = $Seances;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nb_places;
    }

    public function setNbPlaces(int $nb_places): static
    {
        $this->nb_places = $nb_places;

        return $this;
    }

    public function getPrixTotal(): ?float
    {
        return $this->Prix_total;
    }

    public function setPrixTotal(float $Prix_total): static
    {
        $this->Prix_total = $Prix_total;

        return $this;
    }

    public function getQRCode(): ?string
    {
        return $this->QR_code;
    }

    public function setQRCode(string $QR_code): static
    {
        $this->QR_code = $QR_code;

        return $this;
    }
}
