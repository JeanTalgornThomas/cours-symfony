<?php

namespace App\Entity;

use App\Repository\DonsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DonsRepository::class)
 */
class Dons
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $montants;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_utilisateurs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontants(): ?float
    {
        return $this->montants;
    }

    public function setMontants(float $montants): self
    {
        $this->montants = $montants;

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

    public function getIdUtilisateurs(): ?int
    {
        return $this->id_utilisateurs;
    }

    public function setIdUtilisateurs(int $id_utilisateurs): self
    {
        $this->id_utilisateurs = $id_utilisateurs;

        return $this;
    }
}
