<?php

namespace App\Repository;

use App\Entity\Xp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Xp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Xp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Xp[]    findAll()
 * @method Xp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class XpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Xp::class);
    }

    // /**
    //  * @return Xp[] Returns an array of Xp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('x')
            ->andWhere('x.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('x.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Xp
    {
        return $this->createQueryBuilder('x')
            ->andWhere('x.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
