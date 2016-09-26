<?php

namespace NubbeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NubbeBundle:Default:index.html.twig');
    }
}
