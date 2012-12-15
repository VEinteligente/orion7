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

    public function getBySubcategoriasFormulario($asubcategorias)

    {
 
      if (count($asubcategorias)==0) return array();
      $qb = $this->createQueryBuilder('s');
      $qb->select('s');
      $qb->where($qb->expr()->in('s.id', $asubcategorias ));
      return $qb->getQuery()
                ->getResult();
    }

    public function listAllByIds($ids)
    {
      if (count($ids)==0) return array();

      $qb = $this->createQueryBuilder('s');
      $qb->select('s');
      $qb->where($qb->expr()->in('s.id', $ids ));

      return $qb->getQuery()
                ->getResult();
    }
}