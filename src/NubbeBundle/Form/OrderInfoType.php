<?php

namespace NubbeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderInfoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orderDate', 'datetime')
            ->add('goodsFee')
            ->add('shipFee')
            ->add('totalPrice')
            ->add('payType')
            ->add('receiverName')
            ->add('receiverPhone')
            ->add('receiverAdress')
            ->add('receiverCity')
            ->add('receiverEmail')
            ->add('receiverPostcode')
            ->add('isConfirmed')
            ->add('isPayed')
            ->add('isSended')
            ->add('isOver')
            ->add('state')
            ->add('envio')
            ->add('shipmode')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NubbeBundle\Entity\OrderInfo'
        ));
    }
}
