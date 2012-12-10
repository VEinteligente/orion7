<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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

    public function selectByEstadoAction($estado)
    {
              $em = $this->getDoctrine()
                         ->getEntityManager();
              $municipios = $em->getRepository('Orion7CoreBundle:Municipio')
                          ->findByEstado($estado);
        $html = '<option value="">Municipio</option>';
        foreach($municipios as $municipio)
        {
            $html = $html . sprintf("<option value=\"%d\">%s</option>",$municipio->getId(), mb_convert_case($municipio->getNombre(), MB_CASE_TITLE, "UTF-8"));
        }
        return new Response($html);
    }
}