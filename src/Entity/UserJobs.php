<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserJobsRepository")
 */
class UserJobs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Jobs",inversedBy="id")
     * @ORM\Joincolumn(nullable=false)
     */
    private $Jobs;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Users",inversedBy="id")
     * @ORM\Joincolumn(nullable=false)
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Users",inversedBy="id")
     * @ORM\Joincolumn(nullable=false)
     */
    private $formateur;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Skills",inversedBy="id")
     * @ORM\Joincolumn(nullable=false)
     */
    private $skils;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $Jobs
     * @return UserJobs
     */
    public function setJobs(int $Jobs): UserJobs
    {
        $this->Jobs = $Jobs;
        return $this;
    }

    /**
     * @return int
     */
    public function getJobs(): int
    {
        return $this->Jobs;
    }

    /**
     * @param int $user
     * @return UserJobs
     */
    public function setUser(int $user): UserJobs
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return int
     */
    public function getUser(): int
    {
        return $this->user;
    }

    /**
     * @param int $formateur
     * @return UserJobs
     */
    public function setFormateur(int $formateur): UserJobs
    {
        $this->formateur = $formateur;
        return $this;
    }

    /**
     * @return int
     */
    public function getFormateur(): int
    {
        return $this->formateur;
    }

    /**
     * @param int $skils
     * @return UserJobs
     */
    public function setSkils(int $skils): UserJobs
    {
        $this->skils = $skils;
        return $this;
    }

    /**
     * @return int
     */
    public function getSkils(): int
    {
        return $this->skils;
    }
    // add your own fields
}
