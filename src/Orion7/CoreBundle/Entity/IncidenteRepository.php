<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class IncidenteRepository extends EntityRepository
{
	public function findByCentro($codCentro)
    {
        $qb = $this->createQueryBuilder('i')
                   ->select('i')
                   ->where('i.centro = :centro')
                   ->setParameter('centro', $codCentro);

        return $qb->getQuery()
                  ->getResult();
    }
}