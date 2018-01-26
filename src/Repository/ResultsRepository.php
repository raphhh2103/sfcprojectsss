<?php

namespace App\Repository;

use App\Entity\Results;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ResultsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Results::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('r')
            ->where('r.something = :value')->setParameter('value', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
