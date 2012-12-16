<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IncidenteController extends Controller
{
    public function showAction($incidenteId)
    {
         $em = $this->getDoctrine()->getEntityManager();

         $incidente = $em->getRepository('Orion7CoreBundle:Incidente')->find($incidenteId);

         if (!$incidente) {
             throw $this->createNotFoundException('No se pudo conseguir el incidente');
         }

         return $this->render('Orion7CoreBundle:Incidente:show.html.twig', array(
             'incidente'      => $incidente
         ));
    }

    public function listByCentroAction($codCentro)
    {
    	$em = $this->getDoctrine()
                   ->getEntityManager();

        $incidentes = $em->getRepository('Orion7CoreBundle:Incidente')
                    ->findByCentro($codCentro);

        return $this->render('Orion7CoreBundle:Incidente:listByCentro.html.twig', array(
            'incidentes' => $incidentes
        ));
    }

    public function buscarIncidentesAction($centro)
    {
        // $request = $this->getRequest();
        // $codCentro = $request->request->get('centro');

        $em = $this->getDoctrine()
                   ->getEntityManager();

        $incidentes = $em->getRepository('Orion7CoreBundle:Incidente')
                    ->findByCentro($centro);

        return $this->render('Orion7CoreBundle:Incidente:listaDenuncia.html.twig', array(
            'incidentes' => $incidentes
        ));
    }

}
