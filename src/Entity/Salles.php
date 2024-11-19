<?php

namespace App\Entity;

use App\Repository\SallesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SallesRepository::class)]
class Salles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Nb_places = null;


    #[ORM\Column]
    private array $Qualite_Projection = [];

    #[ORM\ManyToOne(inversedBy: 'cineSalle')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cinemas $cinemas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPlaces(): ?int
    {
        return $this->Nb_places;
    }

    public function setNbPlaces(int $Nb_places): static
    {
        $this->Nb_places = $Nb_places;

        return $this;
    }


    public function getQualiteProjection(): array
    {
        return $this->Qualite_Projection;
    }

    public function setQualiteProjection(array $Qualite_Projection): static
    {
        $this->Qualite_Projection = $Qualite_Projection;

        return $this;
    }

    public function getCinemas(): ?Cinemas
    {
        return $this->cinemas;
    }

    public function setCinemas(?Cinemas $cinemas): static
    {
        $this->cinemas = $cinemas;

        return $this;
    }
}
