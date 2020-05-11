<?php

declare(strict_types=1);

namespace App\Repositry\Articulos;

use App\Entity\BlogComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class ArticuloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlogComment::class);
    }


    public function saveEntity($entity): BlogComment
    {
        $entityManager = $this->getEntityManager()->persist($entity)->flush();
        return $entity;
    }
}
