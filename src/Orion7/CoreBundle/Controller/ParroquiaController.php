<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
    public function selectByMunicipioAction()
    {
        $request = $this->getRequest();
              $municipio = $request->request->get('municipio');
              $em = $this->getDoctrine()
                         ->getEntityManager();
              $parroquias = $em->getRepository('Orion7CoreBundle:Parroquia')
                          ->findByMunicipio($municipio);
        $html = '<option value="">Parroquia</option>';
        foreach($parroquias as $parroquia)
        {
            $html = $html . sprintf("<option value=\"%d\">%s</option>",$parroquia->getId(), $parroquia->getNombre());
        }
        return new Response($html);
    }
}