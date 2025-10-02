<?php

namespace App\Repository;

use App\Entity\Listing;
use App\Enum\PropertyTypeEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Listing>
 */
class ListingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Listing::class);
    }

    public function findByPropertyType(PropertyTypeEnum $propertyType)
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->select('l, p')
            ->join('l.propertyType', 'p')
            ->where('p.name = :name')
            ->setParameter('name', $propertyType)
        ;

        return $qb->getQuery()->getResult();
    }
}
