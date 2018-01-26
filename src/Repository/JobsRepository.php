<?php

namespace App\Repository;

use App\Entity\Jobs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class JobsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Jobs::class);
    }


    public function findBySomething($value)
    {
        $qb = $this->createQueryBuilder('metier')
            ->join("metier.decription", "description")
            ->leftJoin("metier.nameJobs", "name")
            ->where('metier.id = :value')
            ->setParameter(':id', $value)
            ->select("jobs");

            return $qb->getQuery()->getResult()

        ;
    }

}
