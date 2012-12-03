<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class CentroRepository extends EntityRepository
{
	public function findByMunicipio($idMunicipio)
    {
        $qb = $this->createQueryBuilder('c')
                   ->select('c')
                   ->where('c.municipio = :municipio')
                   ->setParameter('municipio', $idMunicipio);

        return $qb->getQuery()
                  ->getResult();
    }

    public function findByParroquia($idParroquia)
    {
        $qb = $this->createQueryBuilder('c')
                   ->select('c')
                   ->where('c.parroquia = :parroquia')
                   ->setParameter('parroquia', $idParroquia);

        return $qb->getQuery()
                  ->getResult();
    }
}