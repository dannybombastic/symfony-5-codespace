<?php

namespace App\Repository;

use App\Entity\Articulos\MultimediaType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MultimediaType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MultimediaType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MultimediaType[]    findAll()
 * @method MultimediaType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MultimediaTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MultimediaType::class);
    }

    // /**
    //  * @return MultimediaType[] Returns an array of MultimediaType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MultimediaType
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
