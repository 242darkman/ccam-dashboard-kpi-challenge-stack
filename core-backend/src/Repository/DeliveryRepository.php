<?php

namespace App\Repository;

use App\Entity\Delivery;
use DateInterval;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Delivery>
 *
 * @method Delivery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Delivery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Delivery[]    findAll()
 * @method Delivery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliveryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Delivery::class);
    }

    //    /**
    //     * @return Delivery[] Returns an array of Delivery objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Delivery
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    // Méthode pour récupérer la liste des retard 
    public function findByDelay()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.deliveredAt > d.deliveryExpected')
            ->getQuery()
            ->getResult()
        ;
    }


    // Méthode pour récupérer la liste des avances 
    public function findByAdvance()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.deliveredAt < d.deliveryExpected')
            ->getQuery()
            ->getResult()
        ;
    }

    // Méthode pour récupérer la liste des livraisons a temps 
    public function findByOnTime()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.deliveredAt = d.deliveryExpected')
            ->getQuery()
            ->getResult()
        ;
    }
}
