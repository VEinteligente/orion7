<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
    public function selectByParroquiaAction()
    {
        $request = $this->getRequest();
              $parroquia = $request->request->get('parroquia');
              $em = $this->getDoctrine()
                         ->getEntityManager();
              $centros = $em->getRepository('Orion7CoreBundle:Centro')
                          ->findByParroquia($parroquia);
        $html = '<option value="">Centro de votación</option>';
        foreach($centros as $centro)
        {
            $html = $html . sprintf("<option value=\"%d\">%s</option>",$centro->getCodigo(), $centro->getNombre());
        }
        return new Response($html);
    }
}