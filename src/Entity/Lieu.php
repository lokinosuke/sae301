<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuRepository::class)]
class Lieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column(length: 255)]
    private ?string $capacite = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\OneToMany(mappedBy: 'derouler', targetEntity: Manif::class)]
    private Collection $manifs;

    public function __construct()
    {
        $this->manifs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getCapacite(): ?string
    {
        return $this->capacite;
    }

    public function setCapacite(string $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, Manif>
     */
    public function getManifs(): Collection
    {
        return $this->manifs;
    }

    public function addManif(Manif $manif): self
    {
        if (!$this->manifs->contains($manif)) {
            $this->manifs->add($manif);
            $manif->setDerouler($this);
        }

        return $this;
    }

    public function removeManif(Manif $manif): self
    {
        if ($this->manifs->removeElement($manif)) {
            // set the owning side to null (unless already changed)
            if ($manif->getDerouler() === $this) {
                $manif->setDerouler(null);
            }
        }

        return $this;
    }
}
