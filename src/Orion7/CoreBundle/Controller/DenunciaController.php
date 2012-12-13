<?php
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Orion7\CoreBundle\Entity\Denuncia;
use Orion7\CoreBundle\Form\DenunciaType;

use Orion7\CoreBundle\Entity\Incidente;

use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DenunciaController extends Controller
{
    public function indexAction()
    {
        return $this->render('Orion7CoreBundle:Denuncia:index.html.twig', array(
            'denuncias' => array()
        ));
    }

    public function newAction()
    {
    	$denuncia = new Denuncia();
        $form = $this->createForm(new DenunciaType(), $denuncia);

        return $this->render('Orion7CoreBundle:Denuncia:new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    

    //ESQUELETO NO FUNCIONAL
    /*public function createAction($incidenteId)
    {
        $denuncia = new Denuncia();

        $request = $this->getRequest();
        $form    = $this->createForm(new DenunciaType(), $denuncia);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                       ->getEntityManager();
            if ($incidenteId) {
                $incidente = this -> getIncidente($incidenteId);
            }
            else {
                //Caso id = 0, indicando que se quiere un incidente nuevo
                //TODO: sacar los datos de estado-parroquia-municipio-centro del form
                // $estadoId = ;
                // $parroquiaId = ;
                // $municipioId = ;
                // $centroId = ;
                //$incidente = this -> newIncidente();
                //$em->persist($incidente);
            }
            $denuncia -> setIncidente($incidente);

            $user = $this->getUser();
            $denuncia -> setUsuarioRegistro($user);

            //TODO: ver caso responsables

            //TODO: ver caso subcategorias

            $em->persist($denuncia);
            $em->flush();

            return $this->redirect($this->generateUrl('BloggerBlogBundle_blog_show', array(
                'id' => $comment->getBlog()->getId())) .
                '#comment-' . $comment->getId()
            );
        }

        return $this->render('BloggerBlogBundle:Comment:create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));


        // 

        // return $this->render('Orion7CoreBundle:Denuncia:new.html.twig', array(
        //     'form' => $form->createView()
        // ));
    }*/

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

    protected function newIncidente($estadoId, $municipioId, $parroquiaId, $centroId)
    {
         $em = $this->getDoctrine()
                   ->getEntityManager();

        $incidente = new Incidente();

        $estado = $em->getRepository('Orion7CoreBundle:Estado')
                    ->find($estadoID);
        $incidente -> setEstado($estado);

        $municipio = $em->getRepository('Orion7CoreBundle:Municipio')
                    ->find($parroquiaID);
        $incidente -> setMunicipio($municipio);

        $parroquia = $em->getRepository('Orion7CoreBundle:Parroquia')
                    ->find($parroquiaID);
        $incidente -> setParroquia($parroquia);

        $centro = $em->getRepository('Orion7CoreBundle:Centro')
                    ->find($centroID);
        $incidente -> setCentro($centro);

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

        $denuncias = $em->getRepository('Orion7CoreBundle:Denuncia')
                     ->findByIncidentesAsignados($incidentesCentrosAsignados);

        return $this->render('Orion7CoreBundle:Denuncia:index.html.twig', array(
            'denuncias' => $denuncias
        ));
    }

    //TODO: refactor para evitar duplicidad con CanalizacionController
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

    //TODO: refactor para evitar duplicidad con CanalizacionController
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