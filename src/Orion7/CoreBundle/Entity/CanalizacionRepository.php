<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class CanalizacionRepository extends EntityRepository
{
	public function findByIncidente($idIncidente)
    {
        $qb = $this->createQueryBuilder('c')
                   ->select('c')
                   ->where('c.incidente = :incidente')
                   ->addOrderBy('c.hora_registro')
                   ->setParameter('incidente', $idIncidente);

        return $qb->getQuery()
                  ->getResult();
    }
}