<?php

namespace App\Entity;

use App\Repository\AdoptionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdoptionsRepository::class)
 */
class Adoptions
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
    private $id_animaux;

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

    public function getIdAnimaux(): ?int
    {
        return $this->id_animaux;
    }

    public function setIdAnimaux(int $id_animaux): self
    {
        $this->id_animaux = $id_animaux;

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
