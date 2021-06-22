<?php

namespace App\Entity;

use App\Repository\AchatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AchatsRepository::class)
 */
class Achats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_boutiques;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_utilisateurs;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBoutiques(): ?int
    {
        return $this->id_boutiques;
    }

    public function setIdBoutiques(int $id_boutiques): self
    {
        $this->id_boutiques = $id_boutiques;

        return $this;
    }

    public function getIdUtilisateurs(): ?int
    {
        return $this->id_utilisateurs;
    }

    public function setIdUtilisateurs(int $id_utilisateurs): self
    {
        $this->id_utilisateurs = $id_utilisateurs;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
