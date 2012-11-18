<?php
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DenunciaController extends Controller
{
    public function indexAction()
    {
        return $this->render('Orion7CoreBundle:Denuncia:index.html.twig');
    }
}