<?php

namespace App\Entity;

use App\Repository\XpRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=XpRepository::class)
 */
class Xp
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
    private $jobDateFrom;

    /**
     * @ORM\Column(type="date")
     */
    private $jobDateTo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jobName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jobLocation;

    /**
     * @ORM\Column(type="text")
     */
    private $jobDescription;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="xps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobDateFrom(): ?\DateTimeInterface
    {
        return $this->jobDateFrom;
    }

    public function setJobDateFrom(\DateTimeInterface $jobDateFrom): self
    {
        $this->jobDateFrom = $jobDateFrom;

        return $this;
    }

    public function getJobDateTo(): ?\DateTimeInterface
    {
        return $this->jobDateTo;
    }

    public function setJobDateTo(\DateTimeInterface $jobDateTo): self
    {
        $this->jobDateTo = $jobDateTo;

        return $this;
    }

    public function getJobName(): ?string
    {
        return $this->jobName;
    }

    public function setJobName(string $jobName): self
    {
        $this->jobName = $jobName;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getJobLocation(): ?string
    {
        return $this->jobLocation;
    }

    public function setJobLocation(string $jobLocation): self
    {
        $this->jobLocation = $jobLocation;

        return $this;
    }

    public function getJobDescription(): ?string
    {
        return $this->jobDescription;
    }

    public function setJobDescription(string $jobDescription): self
    {
        $this->jobDescription = $jobDescription;

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
