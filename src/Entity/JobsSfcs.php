<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobsSfcsRepository")
 */
class JobsSfcs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="App\Entity\Jobs", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $jobs;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="App\Entity\Sfcs", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Sfc;


    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     *
     */
    private $indicatorObservable1;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     *
     */
    private $indicatorObservable2;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     *
     */
    private $indicatorObservable3;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     *
     */
    private $indicatorObservable4;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    private $indicatorGeneric1;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    private $indicatorGeneric2;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    private $indicatorGeneric3;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    private $indicatorGeneric4;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $requiredLevel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Skills", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skills;

    /**
     * @param mixed $id
     * @return JobsSfcs
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $jobs
     * @return JobsSfcs
     */
    public function setJobs(int $jobs): JobsSfcs
    {
        $this->jobs = $jobs;
        return $this;
    }

    /**
     * @return int
     */
    public function getJobs(): int
    {
        return $this->jobs;
    }

    /**
     * @param int $Sfc
     * @return JobsSfcs
     */
    public function setSfc(int $Sfc): JobsSfcs
    {
        $this->Sfc = $Sfc;
        return $this;
    }

    /**
     * @return int
     */
    public function getSfc(): int
    {
        return $this->Sfc;
    }

    /**
     * @param string $indicatorObservable1
     * @return JobsSfcs
     */
    public function setIndicatorObservable1(string $indicatorObservable1): JobsSfcs
    {
        $this->indicatorObservable1 = $indicatorObservable1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndicatorObservable1(): string
    {
        return $this->indicatorObservable1;
    }

    /**
     * @param string $indicatorObservable2
     * @return JobsSfcs
     */
    public function setIndicatorObservable2(string $indicatorObservable2): JobsSfcs
    {
        $this->indicatorObservable2 = $indicatorObservable2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndicatorObservable2(): string
    {
        return $this->indicatorObservable2;
    }

    /**
     * @param string $indicatorObservable3
     * @return JobsSfcs
     */
    public function setIndicatorObservable3(string $indicatorObservable3): JobsSfcs
    {
        $this->indicatorObservable3 = $indicatorObservable3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndicatorObservable3(): string
    {
        return $this->indicatorObservable3;
    }

    /**
     * @param string $indicatorObservable4
     * @return JobsSfcs
     */
    public function setIndicatorObservable4(string $indicatorObservable4): JobsSfcs
    {
        $this->indicatorObservable4 = $indicatorObservable4;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndicatorObservable4(): string
    {
        return $this->indicatorObservable4;
    }

    /**
     * @param string $indicatorGeneric1
     * @return JobsSfcs
     */
    public function setIndicatorGeneric1(string $indicatorGeneric1): JobsSfcs
    {
        $this->indicatorGeneric1 = $indicatorGeneric1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndicatorGeneric1(): string
    {
        return $this->indicatorGeneric1;
    }

    /**
     * @param string $indicatorGeneric2
     * @return JobsSfcs
     */
    public function setIndicatorGeneric2(string $indicatorGeneric2): JobsSfcs
    {
        $this->indicatorGeneric2 = $indicatorGeneric2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndicatorGeneric2(): string
    {
        return $this->indicatorGeneric2;
    }

    /**
     * @param string $indicatorGeneric3
     * @return JobsSfcs
     */
    public function setIndicatorGeneric3(string $indicatorGeneric3): JobsSfcs
    {
        $this->indicatorGeneric3 = $indicatorGeneric3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndicatorGeneric3(): string
    {
        return $this->indicatorGeneric3;
    }

    /**
     * @param string $indicatorGeneric4
     * @return JobsSfcs
     */
    public function setIndicatorGeneric4(string $indicatorGeneric4): JobsSfcs
    {
        $this->indicatorGeneric4 = $indicatorGeneric4;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndicatorGeneric4(): string
    {
        return $this->indicatorGeneric4;
    }

    /**
     * @param int $requiredLevel
     * @return JobsSfcs
     */
    public function setRequiredLevel(int $requiredLevel): JobsSfcs
    {
        $this->requiredLevel = $requiredLevel;
        return $this;
    }

    /**
     * @return int
     */
    public function getRequiredLevel(): int
    {
        return $this->requiredLevel;
    }

    /**
     * @param mixed $skills
     * @return JobsSfcs
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }
    // add your own fields
}
