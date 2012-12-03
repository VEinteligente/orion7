<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class EstadoRepository extends EntityRepository
{
	public function findAll()
    {
        $qb = $this->createQueryBuilder('e')
                   ->select('e');

        return $qb->getQuery()
                  ->getResult();
    }
}