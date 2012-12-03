<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CentroController extends Controller
{
    public function listByParroquiaAction($parroquia)
    {
    	$em = $this->getDoctrine()
                   ->getEntityManager();

        $centros = $em->getRepository('Orion7CoreBundle:Centro')
                    ->findByParroquia($parroquia);

        return $this->render('Orion7CoreBundle:Centro:index.html.twig', array(
            'centros' => $centros
        ));
    }
}