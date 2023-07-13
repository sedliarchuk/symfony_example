<?php

namespace App\Repository;

use App\Entity\NodeCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NodeCategory>
 *
 * @method NodeCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method NodeCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method NodeCategory[]    findAll()
 * @method NodeCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NodeCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NodeCategory::class);
    }

//    /**
//     * @return NodeCategory[] Returns an array of NodeCategory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NodeCategory
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
