<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployerRepository")
 */
class Employer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateneS;

    /**
     * @ORM\Column(type="integer")
     */
    private $salair;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="employers")
     */
    private $Service;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMat(): ?string
    {
        return $this->mat;
    }

    public function setMat(string $mat): self
    {
        $this->mat = $mat;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateneS(): ?\DateTimeInterface
    {
        return $this->dateneS;
    }

    public function setDateneS(\DateTimeInterface $dateneS): self
    {
        $this->dateneS = $dateneS;

        return $this;
    }

    public function getSalair(): ?int
    {
        return $this->salair;
    }

    public function setSalair(int $salair): self
    {
        $this->salair = $salair;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->Service;
    }

    public function setService(?Service $Service): self
    {
        $this->Service = $Service;

        return $this;
    }
}
