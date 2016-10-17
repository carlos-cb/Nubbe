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

    public function productdetailAction(Product $product, $colorId)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NubbeBundle:Category')->findAll();
        $userNow = $this->getUser();

        $colors = $product->getColors();
        $color = $colors[$colorId-1];
        
        return $this->render('NubbeBundle:Default:productdetail.html.twig', array(
            'product' => $product,
            'categories' => $categories,
            'color' => $color,
            'userNow' => $userNow,
            'colorId' => $colorId,
        ));
    }

    public function cartAction()
    {
        $em = $this->getDoctrine()->getManager();
        $userNow = $this->getUser();
        if(!$userNow)
        {
            return $this->redirectToRoute('fos_user_security_login');
        }


        $cart = $this->getUser()->getCart();
        if(!$cart) {
            $cart = new Cart();
            $cart->setCartState('buying')
                ->setCreateDate(new \DateTime('now'))
                ->setUser($this->getUser());
            $em->persist($cart);
            $em->flush();
        }
        else if($cart->getCartState() == 'over')
        {
            $cart->setCartState('buying')
                ->setCreateDate(new \DateTime('now'));
            $em->persist($cart);
            $em->flush();
        }

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

        return $this->redirectToRoute('nubbe_cart');
    }

    public function guestinfoAction()
    {
        $userNow = $this->getUser();

        return $this->render('NubbeBundle:Default:guestinfo.html.twig', array(
            'userNow' => $userNow,
        ));
    }

    public function pedidoAction()
    {
        $user = $this->getUser();

        $repository = $this->getDoctrine()->getRepository('NubbeBundle:OrderInfo');
        $orderInfos = $repository->findByUser($user, array('orderDate' => 'DESC'));

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

    public function addToCartAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cart = $this->getUser()->getCart();
        if(!$cart) {
            $cart = new Cart();
            $cart->setCartState('buying')
                ->setCreateDate(new \DateTime('now'))
                ->setUser($this->getUser());
            $em->persist($cart);
            $em->flush();
        }
        else if($cart->getCartState() == 'over')
        {
            $cart->setCartState('buying')
                ->setCreateDate(new \DateTime('now'));
            $em->persist($cart);
            $em->flush();
        }

        //获取ajax参数
        $productId = $request->get('id');
        $colorId = $request->get('color');
        $sizeName = $request->get('size');

        $repository = $this->getDoctrine()->getRepository('NubbeBundle:Product');
        $productshiti = $repository->find($productId);
        $repository = $this->getDoctrine()->getRepository('NubbeBundle:Color');
        $colorshiti = $repository->find($colorId);

        $exsiteColor = $this->getDoctrine()->getRepository('NubbeBundle:CartItem')->findOneBy(array('cart' => $cart, 'product' => $productshiti, 'colorId' => $colorId, 'sizeName' => $sizeName));

        if($exsiteColor)
        {
            $exsiteColor->setQuantity($exsiteColor->getQuantity()+1);
            $em->persist($exsiteColor);
            $em->flush();
        }
        else
        {
            $newCartItem = new CartItem();
            $newCartItem->setCart($cart)
                ->setProduct($productshiti)
                ->setQuantity(1)
                ->setColorId($colorId)
                ->setColorName($colorshiti->getColorNameEs())
                ->setFoto($colorshiti->getColorFoto())
                ->setSizeName($sizeName);
            $cart->addCartItem($newCartItem);
            $em->persist($newCartItem);
            $em->flush();
        }
        return new Response();
    }
}
