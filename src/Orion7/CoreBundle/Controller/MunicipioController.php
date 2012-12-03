<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MunicipioController extends Controller
{
    public function listByEstadoAction($estado)
    {
    	$em = $this->getDoctrine()
                   ->getEntityManager();

        $municipios = $em->getRepository('Orion7CoreBundle:Municipio')
                    ->findByEstado($estado);

        return $this->render('Orion7CoreBundle:Municipio:index.html.twig', array(
            'municipios' => $municipios
        ));
    }
}