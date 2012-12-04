<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CanalizacionController extends Controller
{
    //para prueba, esta diseñado para ser render en otro twig (el show del incidente) y no pasar por este controlador
    public function indexAction($idIncidente)
    {
    	$em = $this->getDoctrine()
                   ->getEntityManager();

        $canalizaciones = $em->getRepository('Orion7CoreBundle:Canalizacion')
                    ->findByIncidente($idIncidente);

        return $this->render('Orion7CoreBundle:Canalizacion:index.html.twig', array(
            'canalizaciones' => $canalizaciones
         ));


        return $this->render('Orion7CoreBundle:Denuncia:index.html.twig');
    }

}