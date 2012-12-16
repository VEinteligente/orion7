<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Orion7\CoreBundle\Entity\Mensaje;
use Orion7\CoreBundle\Form\MensajeType;

use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;

class MensajeController extends Controller
{
    public function newAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_COORDINADOR')) {
            throw new AccessDeniedException();
        }

        $mensaje = new Mensaje();

        $form = $this->createForm(new MensajeType(), $mensaje);

        return $this->render('Orion7CoreBundle:Mensaje:new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function createAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_COORDINADOR'))
        {
            throw new AccessDeniedException();
        }
  
        $mensaje  = new Mensaje();
        $mensaje->setRolDestinado($this->getRolDestinado());

        $user = $this->getUser();
        $mensaje -> setUsuario($user);

        $request = $this->getRequest();
        $form    = $this->createForm(new MensajeType(), $mensaje);
        $form->bindRequest($request);

        //if ($form->isValid()) {
            $em = $this->getDoctrine()
                       ->getEntityManager();
            $em->persist($mensaje);
            $em->flush();

            return $this->redirect($this->generateUrl('Orion7CoreBundle_mensajes_index'));
        //}
    }

    public function indexAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_COORDINADOR'))
        {
            throw new AccessDeniedException();
        }

        $em = $this->getDoctrine()
           ->getEntityManager();

        $mensajes = $em->getRepository('Orion7CoreBundle:Mensaje')
                    ->findByUsuario($this->getUser());

        return $this->render('Orion7CoreBundle:Mensaje:index.html.twig', array(
            'mensajes' => $mensajes
        ));
    }

    public function getMensajesAction()
    {
        $em = $this->getDoctrine()
           ->getEntityManager();

        $mensajeGlobal = $em->getRepository('Orion7CoreBundle:Mensaje')
                    ->findLatestByRolDestinado("ROLE_USER");

        $mensajeRol = $em->getRepository('Orion7CoreBundle:Mensaje')
                    ->findLatestByRolDestinado($this->getRolBase());

        return $this->render('Orion7CoreBundle:Mensaje:mensaje.html.twig', array(
            'mensajeGlobal' => $mensajeGlobal,
            'mensajeRol' => $mensajeRol
        ));
    }

    protected function getRolDestinado()
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            return "ROLE_USER";
        }
        if ($this->get('security.context')->isGranted('ROLE_COORD_CALLCENTER')) 
        {
            return "ROLE_REGISTRADOR_CALLCENTER";
        }

        if ($this->get('security.context')->isGranted('ROLE_COORD_TWITTER')) 
        {
            return "ROLE_REGISTRADOR_TWITTER";
        }

        if ($this->get('security.context')->isGranted('ROLE_COORD_FILTRO')) 
        {
            return "ROLE_FILTRO";
        }
        if ($this->get('security.context')->isGranted('ROLE_COORD_CANALIZACION')) 
        {
            return "ROLE_CANALIZADOR";
        }
        return "";
    }

        protected function getRolBase()
    {
        if ($this->get('security.context')->isGranted('ROLE_REGISTRADOR_CALLCENTER')) 
        {
            return "ROLE_REGISTRADOR_CALLCENTER";
        }
        if ($this->get('security.context')->isGranted('ROLE_REGISTRADOR_TWITTER')) 
        {
            return "ROLE_REGISTRADOR_TWITTER";
        }
        if ($this->get('security.context')->isGranted('ROLE_FILTRO')) 
        {
            return "ROLE_FILTRO";
        }
        if ($this->get('security.context')->isGranted('ROLE_CANALIZADOR')) 
        {
            return "ROLE_CANALIZADOR";
        }
        return "";
    }
}