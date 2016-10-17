<?php

namespace NubbeBundle\Controller;

use NubbeBundle\Entity\OrderInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Payum\Core\Request\GetHumanStatus;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends Controller
{
    public function prepareStripeAction(OrderInfo $orderInfo)
    {
        $gatewayName = 'stripe_js';

        $storage = $this->get('payum')->getStorage('NubbeBundle\Entity\Payment');

        $payment = $storage->create();
        $payment->setNumber($orderInfo->getId());
        $payment->setCurrencyCode('EUR');
        $payment->setTotalAmount($orderInfo->getTotalPrice() * 100); // 1.23 EUR
        $payment->setClientId($orderInfo->getUser());

        $storage->update($payment);

        $captureToken = $this->get('payum')->getTokenFactory()->createCaptureToken(
            $gatewayName,
            $payment,
            'payment_paymentDone' // the route to redirect after capture
        );

        return $this->redirect($captureToken->getTargetUrl());
    }

    public function doneAction(Request $request)
    {
        $token = $this->get('payum')->getHttpRequestVerifier()->verify($request);
        $gateway = $this->get('payum')->getGateway($token->getGatewayName());

        $gateway->execute($status = new GetHumanStatus($token));
        $payment = $status->getFirstModel();

        $paymentStatus = false;
        if ($token->getGatewayName() === 'stripe_js'&& $status->isCaptured())
        {
            if ($status->getValue() === 'captured')
            {
                $paymentStatus = true;
            }
        }

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $orderInfoId = $payment->getNumber();
        $orderInfo = $em->getRepository('NubbeBundle:OrderInfo')->findOneById($orderInfoId);
        
        if ($paymentStatus === true)
        {
            //修改订单状态

            $orderInfo->setIsConfirmed(true)->setState('preparando');
            $em->persist($orderInfo);
            $em->flush();

            return $this->render('NubbeBundle:Payment:successpayment.html.twig', array(
                'status' => $status->getValue(),
                'orderInfo' => $orderInfo,
                'userNow' => $user,
            ));
        } else {
            return $this->render('NubbeBundle:Payment:errorpayment.html.twig', array(
                'orderInfo' => $orderInfo,
            ));
        }
    }
}