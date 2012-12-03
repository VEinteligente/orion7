<?php
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Orion7\CoreBundle\Entity\Denuncia;
use Orion7\CoreBundle\Form\DenunciaType;

class DenunciaController extends Controller
{
    public function indexAction()
    {
        return $this->render('Orion7CoreBundle:Denuncia:index.html.twig');
    }

    public function newAction()
    {
    	$denuncia = new Denuncia();
        $form = $this->createForm(new DenunciaType(), $denuncia);

        return $this->render('Orion7CoreBundle:Denuncia:new.html.twig', array(
            'form' => $form->createView()
        ));
    }

}