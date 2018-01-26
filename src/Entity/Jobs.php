<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
/**
 * @ORM\Entity(repositoryClass="App\Repository\JobsRepository")
 */
class Jobs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50,)
     */
    private $nameJobs;

    /**
     * @var string
     *
     * @ORM\Column(type="string",length=50, nullable=true)
     */
    private $description;
    /**
     *
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Users", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $Owner;


    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getNameJobs(): ?string
    {
        return $this->nameJobs;
    }

    /**
     * @param string $nameJobs
     */
    public function setNameJobs(string $nameJobs)
    {
        $this->nameJobs = $nameJobs;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->Owner;
    }

    /**
     * @param mixed $Owner
     */
    public function setOwner($Owner)
    {
        $this->Owner = $Owner;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    // add your own fields
}
