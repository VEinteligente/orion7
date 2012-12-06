<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class DenunciaRepository extends EntityRepository
{
	public function findDenunciasDeIncidente($idIncidente)
    {
        $qb = $this->createQueryBuilder('d')
                   ->select('d')
                   ->where('d.incidente = :incidente')
                   ->setParameter('incidente', $idIncidente);

        return $qb->getQuery()
                  ->getResult();
    }
}