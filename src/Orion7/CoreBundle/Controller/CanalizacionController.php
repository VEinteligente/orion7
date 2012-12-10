<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Orion7\CoreBundle\Entity\Canalizacion;
use Orion7\CoreBundle\Form\CanalizacionType;


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

    public function newAction($incidenteId)
    {
        $canalizacion = new Canalizacion();
        //$canalizacion -> setIncidente($incidenteId);

        $form = $this->createForm(new CanalizacionType(), $canalizacion);

        //TODO: Debe ser el show de Incidente?
        return $this->render('Orion7CoreBundle:Canalizacion:new.html.twig', array(
            'incidenteId' => $incidenteId,
            'form' => $form->createView()
        ));
    }

     public function createAction($incidenteId)
    {
        $incidente = $this->getIncidente($incidenteId);

        $canalizacion  = new Canalizacion();
        $canalizacion->setIncidente($incidente);

        $user = $this->getUser();
        $canalizacion -> setUsuario($user);

        $request = $this->getRequest();
        $form    = $this->createForm(new CanalizacionType(), $canalizacion);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                       ->getEntityManager();
            $em->persist($canalizacion);
            $em->flush();

            //TODO: debe ser el show de Incidente
            return $this->redirect($this->generateUrl('Orion7CoreBundle_canalizaciones', array(
                'incidenteId' => $incidenteId)) .
                '#canalizacion-' . $canalizacion->getId()
            );
        }

        //TODO: Debe ser el show de Incidente
        return $this->render('Orion7CoreBundle:Canalizacion:new.html.twig', array(
            'incidenteId' => $incidenteId,
            'form'    => $form->createView()
        ));
    }


    //Es lo mismo que en DenunciaController: refactor?
    protected function getIncidente($incidenteId)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();

        $incidente = $em->getRepository('Orion7CoreBundle:Incidente')
                    ->find($incidenteId);

        if (!$incidente) {
            throw $this->createNotFoundException('No se puede conseguir el incidente especificado');
        }

        return $incidente;
    }
}