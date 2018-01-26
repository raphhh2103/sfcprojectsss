<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SigningRepository")
 */
class Signing
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
     * @ORM\ManyToOne(targetEntity="App\Entity\UserJobs", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserJobs;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    private $date;

    // add your own fields
}
