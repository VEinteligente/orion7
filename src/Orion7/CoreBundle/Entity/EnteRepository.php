<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class EnteRepository extends EntityRepository
{
	public function findByMunicipio($idMunicipio)
    {
        $qb = $this->createQueryBuilder('e')
                   ->select('e')
                   ->where('e.municipio = :municipio')
                   ->setParameter('municipio', $idMunicipio);

        return $qb->getQuery()
                  ->getResult();
    }

    public function findByEstado($codEstado)
    {
        $qb = $this->createQueryBuilder('e')
                   ->select('e')
                   ->where('e.estado = :estado')
                   ->setParameter('estado', $codEstado);

        return $qb->getQuery()
                  ->getResult();
    }

}