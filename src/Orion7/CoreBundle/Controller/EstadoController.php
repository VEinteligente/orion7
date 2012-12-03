<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EstadoController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()
                   ->getEntityManager();

        $estados = $em->getRepository('Orion7CoreBundle:Estado')
                    ->findAll();

        return $this->render('Orion7CoreBundle:Estado:index.html.twig', array(
            'estados' => $estados
        ));
    }
}