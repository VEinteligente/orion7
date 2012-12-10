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
    public function selectByParroquiaAction($parroquia)
    {
              $em = $this->getDoctrine()
                         ->getEntityManager();
              $centros = $em->getRepository('Orion7CoreBundle:Centro')
                          ->findByParroquia($parroquia);
        $html = '<option value="">Centro de votación</option>';
        foreach($centros as $centro)
        {
            $html = $html . sprintf("<option value=\"%d\">%s</option>",$centro->getCodigo(), mb_convert_case($centro->getNombre(), MB_CASE_TITLE, "UTF-8"));
        }
        return new Response($html);
    }
    public function selectByCodigoCentroAction($codigo_centro)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();
        $centro = $em->getRepository('Orion7CoreBundle:Centro')
                     ->find($codigo_centro);
        $html = '';

        if (!$centro) {
          $html = $html . 'esta vacio, no consegui centro'; 
        }
        else {
          $datos = array(
              'prueba' => true,
              'estado' => $centro -> getEstado() -> getCodigo(),
              'municipio' => $centro -> getMunicipio() -> getId(),
              'parroquia' => $centro -> getParroquia() -> getId()
          );
        }

      return new Response(json_encode($datos));
      // return new Response($html);
    }
    public function selectByCedulaElectorAction($cedula_elector)
    {
              $em = $this->getDoctrine()
                         ->getEntityManager();
              $centro_elector = $em->getRepository('Orion7CoreBundle:Elector')
                           ->find($cedula_elector);
              $em2 = $this->getDoctrine()
                         ->getEntityManager();
              $centro = $em2->getRepository('Orion7CoreBundle:Centro')
                           ->find($centro_elector->getCentro()-> getCodigo());
          // $html = '';

          if (!$centro_elector) {
            $html = $html . 'esta vacio, no consegui centro'; 
          }
          else {
            $datos = array(
                'prueba' => true,
                'estado' => $centro -> getEstado() -> getCodigo(),
                'municipio' => $centro -> getMunicipio() -> getId(),
                'parroquia' => $centro -> getParroquia() -> getId(),
                'centro' => $centro_elector -> getCentro()-> getCodigo(),
                'nombre' => $centro_elector -> getPrimerNombre().' '.$centro_elector -> getPrimerApellido()
            );
          }

        return new Response(json_encode($datos));
        // return new Response($html);
    }
}