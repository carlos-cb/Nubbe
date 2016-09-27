<?php

namespace NubbeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NubbeBundle:Default:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('NubbeBundle:Default:contact.html.twig');
    }

    public function quiensomosAction()
    {
        return $this->render('NubbeBundle:Default:quiensomos.html.twig');
    }
}
