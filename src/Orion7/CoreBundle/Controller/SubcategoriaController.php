<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SubcategoriaController extends Controller
{
    
    public function selectByCategoriaAction()
    {
        $request = $this->getRequest();
              $categoria = $request->request->get('categoria');
              $em = $this->getDoctrine()
                         ->getEntityManager();
              $subcategorias = $em->getRepository('Orion7CoreBundle:Subcategoria')
                          ->findByCategoria($categoria);
        $html = '';
        foreach($subcategorias as $subcategoria)
        {
            $html = $html . sprintf("<option value=\"%d\">%s</option>",$subcategoria->getId(), $subcategoria->getNombre());
        }
        return new Response($html);
    }
}