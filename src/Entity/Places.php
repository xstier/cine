<?php

namespace App\Entity;

use App\Repository\PlacesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlacesRepository::class)]
class Places
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Salles $salle = null;

    #[ORM\Column]
    private ?bool $Handicap = null;

    #[ORM\Column]
    private ?bool $Defaillant = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $rangee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalle(): ?Salles
    {
        return $this->salle;
    }

    public function setSalle(?Salles $salle): static
    {
        $this->salle = $salle;

        return $this;
    }

    public function isHandicap(): ?bool
    {
        return $this->Handicap;
    }

    public function setHandicap(bool $Handicap): static
    {
        $this->Handicap = $Handicap;

        return $this;
    }

    public function isDefaillant(): ?bool
    {
        return $this->Defaillant;
    }

    public function setDefaillant(bool $Defaillant): static
    {
        $this->Defaillant = $Defaillant;

        return $this;
    }

    public function getRangee(): ?int
    {
        return $this->rangee;
    }

    public function setRangee(int $rangee): static
    {
        $this->rangee = $rangee;

        return $this;
    }
}
