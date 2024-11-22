<?php

namespace App\Entity;

use App\Repository\QualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualiteRepository::class)]
class Qualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Qualite_projection = null;

    /**
     * @var Collection<int, Salles>
     */
    #[ORM\OneToMany(targetEntity: Salles::class, mappedBy: 'QualiteProjection', orphanRemoval: true)]
    private Collection $salles;

    public function __construct()
    {
        $this->salles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQualiteProjection(): ?string
    {
        return $this->Qualite_projection;
    }

    public function setQualiteProjection(string $Qualite_projection): static
    {
        $this->Qualite_projection = $Qualite_projection;

        return $this;
    }

    /**
     * @return Collection<int, Salles>
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salles $salle): static
    {
        if (!$this->salles->contains($salle)) {
            $this->salles->add($salle);
            $salle->setQualiteProjection($this);
        }

        return $this;
    }

    public function removeSalle(Salles $salle): static
    {
        if ($this->salles->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getQualiteProjection() === $this) {
                $salle->setQualiteProjection(null);
            }
        }

        return $this;
    }
}
