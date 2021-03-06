<?php

namespace NubbeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NubbeBundle\Entity\OrderInfo;
use NubbeBundle\Entity\OrderItem;

class OrderController extends Controller
{
    public function cartToOrderinfoAction(Request $request)
    {
        $priceAll = $this->countAll();
        $priceIni = $priceAll;
        $yunfei = 3.95;
        $shipmode = "Estándar";
        if($request->get('radio-group') == '2')
        {
            $yunfei = 3.95;
            $shipmode = "Estándar";
            $priceAll= $priceAll + $yunfei;
        }
        if($request->get('radio-group') == '3')
        {
            $yunfei = 5.95;
            $shipmode = "Express";
            $priceAll= $priceAll + $yunfei;
        }
        //超过30欧免普通运费
        if($priceIni >= 30 && $yunfei == 3.95)
        {
            $yunfei = 0;
            $priceAll = $priceAll - 3.95;
        }
        //根据用户填写的表格新建订单
        if($request->getMethod() == 'POST' && ($priceIni!=0) ){
            //订单信息录入
            $orderInfo = new OrderInfo();
            $orderInfo->setUser($this->getUser())
                ->setOrderDate(new \DateTime('now'))
                ->setGoodsFee(round($priceIni, 2))
                ->setShipFee($yunfei)
                ->setPayType('Online')
                ->setTotalPrice(round($priceAll, 2))
                ->setReceiverName($request->get('name'))
                ->setReceiverFamilyName($request->get('familyname'))
                ->setReceiverPhone($request->get('phonenumber'))
                ->setReceiverAdress($request->get('address'))
                ->setReceiverCity($request->get('city'))
                ->setReceiverProvince($request->get('province'))
                ->setReceiverEmail($request->get('email'))
                ->setReceiverPostcode($request->get('postcode'))
                ->setShipmode($shipmode)
                ->setIsConfirmed(false)
                ->setIsSended(false)
                ->setIsOver(false)
                ->setState("pagando");

            $em = $this->getDoctrine()->getManager();
            $em->persist($orderInfo);
            $em->flush();

            //将购物车商品全部倒入订单中
            $cleanCart = $this->itemToOrder($orderInfo);

            //清空购物车的所有商品并且状态改为已生成订单
            $this->clearCarrito();

            $cart = $this->getUser()->getCart();
            $cart->setCartState('over');
            $em->flush();

        }else{
            return $this->redirectToRoute('nubbe_cart');
        }

        return $this->redirectToRoute('nubbe_orderpay', array(
            'orderInfo' => $orderInfo,
        ));
    }

    private function itemToOrder(OrderInfo $orderInfo)
    {
        $user = $this->getUser();
        $cartItems = $user->getCart()->getCartItems();
        $em = $this->getDoctrine()->getManager();

        foreach($cartItems as $cartItem)
        {
            $orderItem = new OrderItem();
            $orderItem->setQuantity($cartItem->getQuantity())
                ->setOrderInfo($orderInfo)
                ->setSizeName($cartItem->getSizeName())
                ->setColorId($cartItem->getColorId())
                ->setColorName($cartItem->getColorName())
                ->setFoto($cartItem->getFoto())
                ->setProduct($cartItem->getProduct());
            $orderInfo->addOrderItem($orderItem);

            $em->persist($orderItem);
        }
        $em->flush();
    }

    public function clearCarrito()
    {
        $cart = $this->getUser()->getCart();
        $cartItems = $cart->getCartItems();

        $em = $this->getDoctrine()->getManager();
        foreach($cartItems as $cartItem){
            $cart->removeCartItem($cartItem);
            $em->remove($cartItem);
        }
        $em->flush();
    }

    private function countAll()
    {
        $user = $this->getUser();
        $cartItems = $user->getCart()->getCartItems();
        $priceall = 0;

        foreach($cartItems as $cartItem)
        {
            $priceall += ($cartItem->getQuantity() * $cartItem->getProduct()->getPrice());
        }
        return $priceall;
    }

    public function orderpayAction(OrderInfo $orderInfo)
    {
        $userNow = $this->getUser();
        if(!$userNow)
        {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $cart = $this->getUser()->getCart();
        $cartItems = $cart->getCartItems();

        return $this->render('NubbeBundle:Payment:orderpay.html.twig', array(
            'orderInfo' => $orderInfo,
            'cartItems' => $cartItems,
            'userNow' => $userNow,
        ));
    }
}
