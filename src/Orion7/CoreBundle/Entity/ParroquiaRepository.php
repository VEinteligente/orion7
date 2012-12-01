<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class ParroquiaRepository extends EntityRepository
{
	public function findByMunicipio($idMunicipio)
    {
        $qb = $this->createQueryBuilder('p')
                   ->select('p')
                   ->where('p.municipio = :municipio')
                   ->setParameter('municipio', $idMunicipio);

        return $qb->getQuery()
                  ->getResult();
    }
}