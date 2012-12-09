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
    public function selectByCodigoCentroAction()
    {
        $request = $this->getRequest();
              $codigo_centro = $request->request->get('codigo_centro');
              $em = $this->getDoctrine()
                         ->getEntityManager();
              $centro = $em->getRepository('Orion7CoreBundle:Centro')
                           ->find($codigo_centro);
          $html = '';

          if (!$centro) {
            $html = $html . 'esta vacio, no consegui centro'; 
          }
          else {
            // $html = $html . sprintf("estado = %d \n municipio = %s",$centro->getEstado(), $centro->getMunicipio());
            //$html = $html . $centro -> getParroquia() -> getId();
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
    public function selectByCedulaElectorAction()
    {
        $request = $this->getRequest();
              $cedula_elector = $request->request->get('cedula_elector');
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
            // $html = $html . sprintf("estado = %d \n municipio = %s",$centro->getEstado(), $centro->getMunicipio());
            //$html = $html . $centro -> getParroquia() -> getId();
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