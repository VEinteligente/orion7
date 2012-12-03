<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ParroquiaController extends Controller
{
    public function listByMunicipioAction($municipio)
    {
    	$em = $this->getDoctrine()
                   ->getEntityManager();

        $parroquias = $em->getRepository('Orion7CoreBundle:Parroquia')
                    ->findByMunicipio($municipio);

        return $this->render('Orion7CoreBundle:Parroquia:index.html.twig', array(
            'parroquias' => $parroquias
        ));
    }
}