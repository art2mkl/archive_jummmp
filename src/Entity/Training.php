<?php

namespace App\Entity;

use App\Repository\TrainingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrainingRepository::class)
 */
class Training
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $trainingDateFrom;

    /**
     * @ORM\Column(type="date")
     */
    private $trainingDateTo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diplomaName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $schoolName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $schoolLocation;

    /**
     * @ORM\Column(type="text")
     */
    private $diplomaDescription;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="trainings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrainingDateFrom(): ?\DateTimeInterface
    {
        return $this->trainingDateFrom;
    }

    public function setTrainingDateFrom(\DateTimeInterface $trainingDateFrom): self
    {
        $this->trainingDateFrom = $trainingDateFrom;

        return $this;
    }

    public function getTrainingDateTo(): ?\DateTimeInterface
    {
        return $this->trainingDateTo;
    }

    public function setTrainingDateTo(\DateTimeInterface $trainingDateTo): self
    {
        $this->trainingDateTo = $trainingDateTo;

        return $this;
    }

    public function getDiplomaName(): ?string
    {
        return $this->diplomaName;
    }

    public function setDiplomaName(string $diplomaName): self
    {
        $this->diplomaName = $diplomaName;

        return $this;
    }

    public function getSchoolName(): ?string
    {
        return $this->schoolName;
    }

    public function setSchoolName(string $schoolName): self
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    public function getSchoolLocation(): ?string
    {
        return $this->schoolLocation;
    }

    public function setSchoolLocation(string $schoolLocation): self
    {
        $this->schoolLocation = $schoolLocation;

        return $this;
    }

    public function getDiplomaDescription(): ?string
    {
        return $this->diplomaDescription;
    }

    public function setDiplomaDescription(string $diplomaDescription): self
    {
        $this->diplomaDescription = $diplomaDescription;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
