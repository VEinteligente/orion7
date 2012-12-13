<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Orion7\CoreBundle\Entity\Canalizacion;
use Orion7\CoreBundle\Form\CanalizacionType;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CanalizacionController extends Controller
{
    //para prueba, esta diseñado para ser render en otro twig (el show del incidente) y no pasar por este controlador
    public function listByIncidenteAction($incidenteId)
    {
    	$em = $this->getDoctrine()
                   ->getEntityManager();

        $canalizaciones = $em->getRepository('Orion7CoreBundle:Canalizacion')
                    ->findByIncidente($incidenteId);

        return $this->render('Orion7CoreBundle:Canalizacion:listByIncidente.html.twig', array(
            'canalizaciones' => $canalizaciones,
            'incidenteId' => $incidenteId
         ));


        return $this->render('Orion7CoreBundle:Denuncia:listByIncidente.html.twig');
    }

    public function newAction($incidenteId)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_CANALIZADOR')) {
            throw new AccessDeniedException();
        }

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
        if (false === $this->get('security.context')->isGranted('ROLE_CANALIZADOR')) {
            throw new AccessDeniedException();
        }

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

        public function listNewByRoleAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_FILTRO'))
        {
            throw new AccessDeniedException();
        }

        if ($this->get('security.context')->isGranted('ROLE_FILTRO1')) 
        {
            $terminales[] = 0;
            $terminales[] = 9;
        }

        if ($this->get('security.context')->isGranted('ROLE_FILTRO2')) 
        {
            $terminales[] = 1;
            $terminales[] = 8;
        }

        if ($this->get('security.context')->isGranted('ROLE_FILTRO3')) 
        {
            $terminales[] = 2;
            $terminales[] = 7;
        }

        if ($this->get('security.context')->isGranted('ROLE_FILTRO4')) 
        {
            $terminales[] = 3;
            $terminales[] = 6;
        }
        if ($this->get('security.context')->isGranted('ROLE_FILTRO5')) 
        {
            $terminales[] = 4;
            $terminales[] = 5;
        }

        $em = $this->getDoctrine()
                    ->getEntityManager();

        $incidentesCentrosAsignados = $this->getIncidentesTerminalesCodcentro($terminales);

        //$this->get('session')->getFlashBag()->add('notice', '' . var_export($incidentesCentrosAsignados));

        $incidentes = $em->getRepository('Orion7CoreBundle:Incidente')
                     ->findAllById($incidentesCentrosAsignados);

        return $this->render('Orion7CoreBundle:Canalizacion:filtro.html.twig', array(
            'incidentes' => $incidentesCentrosAsignados
        ));

    }

    //TODO: refactor para evitar duplicidad con DenunciaController
    //Feo (salta Doctrine) pero necesario, la manera correcta implica mas tiempo de implementacion
    protected function getIncidentesTerminalesCodcentro($terminales)
    {
        $sql = "SELECT i.id FROM incidente i ";
        $sql = $sql . "WHERE RIGHT(i.centro,1) = $terminales[0]";

        for ($i=1; $i < count($terminales); $i++) { 
            $sql .= " OR RIGHT(i.centro,1) = $terminales[$i]";
        }

        $conn = $this->get('database_connection');
        $statement = $conn->prepare($sql);
        $statement->execute();
        $arr = $statement->fetchAll();
        return $this->getFlatArray($arr);
    }

    //TODO: refactor para evitar duplicidad con DenunciaController
    protected function getFlatArray($array)
    {
        $ret_array = array();
        foreach(new \RecursiveIteratorIterator(new \RecursiveArrayIterator($array)) as $value)
        {
            $ret_array[] = $value;
        }
        return $ret_array;
    }
}