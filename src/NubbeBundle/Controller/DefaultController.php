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

    public function productlistAction()
    {
        return $this->render('NubbeBundle:Default:productlist.html.twig');
    }

    public function productdetailAction()
    {
        return $this->render('NubbeBundle:Default:productdetail.html.twig');
    }

    public function productdetail22Action()
    {
        return $this->render('NubbeBundle:Default:productdetail22.html.twig');
    }

    public function cartAction()
    {
        return $this->render('NubbeBundle:Default:cart.html.twig');
    }

    public function guestinfoAction()
    {
        return $this->render('NubbeBundle:Default:guestinfo.html.twig');
    }

    public function pedidoAction()
    {
        return $this->render('NubbeBundle:Default:pedido.html.twig');
    }

    public function productlistclientAction()
    {
        return $this->render('NubbeBundle:Default:productlistclient.html.twig');
    }
}
