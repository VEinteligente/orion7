<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class SubcategoriaRepository extends EntityRepository
{
    public function findByCategoria($idCategoria)
    {
        $qb = $this->createQueryBuilder('c')
                   ->select('c')
                   ->where('c.categoria = :categoria')
                   ->setParameter('categoria', $idCategoria);

        return $qb->getQuery()
                  ->getResult();
    }
}