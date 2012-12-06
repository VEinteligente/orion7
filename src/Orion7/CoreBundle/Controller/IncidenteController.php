<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IncidenteController extends Controller
{
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $incidente = $em->getRepository('Orion7CoreBundle:Incidente')->find($id);

        if (!$incidente) {
            throw $this->createNotFoundException('No se pudo conseguir el incidente');
        }

        $denuncias = $em->getRepository('Orion7CoreBundle:Denuncia')
                       ->findDenunciasDeIncidente($incidente->getId());

        //TODO: hacer lo mismo con categorias y demas atributos lista? Con los nombres de las ubicaciones?
        //TODO: generar twig y ver que mas hace falta

        return $this->render('Orion7CoreBundle:Incidente:show.html.twig', array(
            'incidente'      => $incidente,
            'denuncias'  => $denuncias
        ));
    }

    public function listByCentroAction($codCentro)
    {
    	$em = $this->getDoctrine()
                   ->getEntityManager();

        $incidentes = $em->getRepository('Orion7CoreBundle:Incidente')
                    ->findByCentro($codCentro);

        return $this->render('Orion7CoreBundle:Incidente:index.html.twig', array(
            'incidentes' => $incidentes
        ));

        //TODO: hacer vista y ver caso de como mostrar que sea practico. Snippets de las denuncias?
    }

}