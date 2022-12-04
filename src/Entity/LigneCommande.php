<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneCommandeRepository::class)]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Manif $manif_id = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande_id = null;

    #[ORM\Column]
    private ?int $nb_place = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManifId(): ?Manif
    {
        return $this->manif_id;
    }

    public function setManifId(?Manif $manif_id): self
    {
        $this->manif_id = $manif_id;

        return $this;
    }

    public function getCommandeId(): ?Commande
    {
        return $this->commande_id;
    }

    public function setCommandeId(?Commande $commande_id): self
    {
        $this->commande_id = $commande_id;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->nb_place;
    }

    public function setNbPlace(int $nb_place): self
    {
        $this->nb_place = $nb_place;

        return $this;
    }
}
