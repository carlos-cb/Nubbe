<?php

namespace NubbeBundle\Controller;

use NubbeBundle\Entity\OrderInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NubbeBundle\Entity\Category;
use NubbeBundle\Entity\Product;
use NubbeBundle\Entity\Cart;
use NubbeBundle\Entity\CartItem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NubbeBundle:Category')->findAll();
        $userNow = $this->getUser();

        return $this->render('NubbeBundle:Default:index.html.twig', array(
            'categories' => $categories,
            'userNow' => $userNow,
        ));
}

    public function contactAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NubbeBundle:Category')->findAll();
        $userNow = $this->getUser();

        return $this->render('NubbeBundle:Default:contact.html.twig', array(
            'categories' => $categories,
            'userNow' => $userNow,
        ));
    }

    public function quiensomosAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NubbeBundle:Category')->findAll();
        $userNow = $this->getUser();

        return $this->render('NubbeBundle:Default:quiensomos.html.twig', array(
            'categories' => $categories,
            'userNow' => $userNow,
        ));
    }

    public function productlistAction(Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NubbeBundle:Category')->findAll();
        $userNow = $this->getUser();

        $query = $em->createQuery("SELECT p FROM NubbeBundle:Product p WHERE p.category=$category and p.isShow=1");
        $products = $query->getResult();
        
        return $this->render('NubbeBundle:Default:productlist.html.twig', array(
            'products' => $products,
            'categories' => $categories,
            'userNow' => $userNow,
        ));
    }

    public function productlistNewAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NubbeBundle:Category')->findAll();
        $userNow = $this->getUser();

        $query = $em->createQuery("SELECT p FROM NubbeBundle:Product p WHERE p.isNew=1 and p.isShow=1");
        $products = $query->getResult();

        return $this->render('NubbeBundle:Default:productlist.html.twig', array(
            'products' => $products,
            'categories' => $categories,
            'userNow' => $userNow,
        ));
    }

    public function productdetailAction(Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NubbeBundle:Category')->findAll();
        $userNow = $this->getUser();

        $colors = $product->getColors();
        $color = $colors[0];
        
        return $this->render('NubbeBundle:Default:productdetail.html.twig', array(
            'product' => $product,
            'categories' => $categories,
            'color' => $color,
            'userNow' => $userNow,
        ));
    }

    public function productdetail22Action()
    {
        return $this->render('NubbeBundle:Default:productdetail22.html.twig');
    }

    public function cartAction()
    {
        $userNow = $this->getUser();
        if(!$userNow)
        {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $cart = $this->getUser()->getCart();
        $cartItems = $cart->getCartItems();

        return $this->render('NubbeBundle:Default:cart.html.twig', array(
            'cartItems' => $cartItems,
            'userNow' => $userNow,
        ));
    }

    public function ajaxUpdateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $isAdd = $request->get('val1');
        $cartItemId = $request->get('val2');
        $repository = $this->getDoctrine()->getRepository('NubbeBundle:CartItem');
        $cartItem = $repository->find($cartItemId);
        $cartItem->setQuantity($cartItem->getQuantity()+$isAdd);
        $em->persist($cartItem);
        $em->flush();
        return new Response();
    }

    /**
     * Deletes a CartItem entity in Cart.
     *
     */
    public function cartdeleteAction(CartItem $cartItem)
    {
        $cart = $this->getUser()->getCart();
        $cart->removeCartItem($cartItem);

        $em = $this->getDoctrine()->getManager();
        $em->remove($cartItem);
        $em->flush();

        return $this->redirectToRoute('chisnbal_carrito');
    }

    public function guestinfoAction()
    {
        return $this->render('NubbeBundle:Default:guestinfo.html.twig');
    }

    public function pedidoAction()
    {
        $user = $this->getUser();

        $repository = $this->getDoctrine()->getRepository('NubbeBundle:OrderInfo');
        $orderInfos = $repository->findByUser($user);

        return $this->render('NubbeBundle:Default:pedido.html.twig', array(
            'orderInfos' => $orderInfos,
            'userNow' => $user,
        ));
    }

    public function productlistclientAction(OrderInfo $orderInfo)
    {
        $em = $this->getDoctrine()->getManager();
        $userNow = $this->getUser();

        $query = $em->createQuery("SELECT p FROM NubbeBundle:OrderItem p WHERE p.orderInfo=$orderInfo");
        $orderItems = $query->getResult();
        
        return $this->render('NubbeBundle:Default:productlistclient.html.twig', array(
            'orderItems' => $orderItems,
            'orderInfo' => $orderInfo,
            'userNow' => $userNow,
        ));
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
