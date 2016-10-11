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

    public function backEndAction()
    {
        $em = $this->getDoctrine()->getManager();

        $numUser = $em->getRepository('NubbeBundle:User')->createQueryBuilder('a')->select('COUNT(a.id)')->getQuery()->getSingleScalarResult();
        $numOrder = $em->getRepository('NubbeBundle:OrderInfo')->createQueryBuilder('b')->select('COUNT(b.id)')->getQuery()->getSingleScalarResult();
        $numProduct = $em->getRepository('NubbeBundle:Product')->createQueryBuilder('c')->select('COUNT(c.id)')->getQuery()->getSingleScalarResult();

        $queryU = $em->createQuery("SELECT p FROM NubbeBundle:User p WHERE 1=1 order by p.id DESC")->setMaxResults(10);
        $users = $queryU->getResult();

        $queryO = $em->createQuery("SELECT t FROM NubbeBundle:OrderInfo t WHERE 1=1 order by t.id DESC")->setMaxResults(10);
        $orders = $queryO->getResult();

        return $this->render('NubbeBundle:BackEnd:overview.html.twig', array(
            'numUser' => $numUser,
            'numOrder' => $numOrder,
            'numProduct' => $numProduct,
            'users' => $users,
            'orders' => $orders
        ));
    }

    public function loginAction()
    {
        return $this->render('NubbeBundle:Default:login.html.twig');
    }
}
