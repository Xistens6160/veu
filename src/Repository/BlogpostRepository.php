<?php

namespace App\Repository;

use App\Entity\Blogpost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Blogpost|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blogpost|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blogpost[]    findAll()
 * @method Blogpost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogpostRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Blogpost::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('b')
            ->where('b.something = :value')->setParameter('value', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
