<?php

namespace Saleka\BibliothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SalekaBibliothequeBundle:Default:index.html.twig');
    }
}
