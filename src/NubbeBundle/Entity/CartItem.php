<?php

namespace NubbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CartItem
 */
class CartItem
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var int
     */
    private $colorId;

    /**
     * @var string
     */
    private $colorName;

    /**
     * @var string
     */
    private $foto;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return CartItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set colorId
     *
     * @param integer $colorId
     * @return CartItem
     */
    public function setColorId($colorId)
    {
        $this->colorId = $colorId;

        return $this;
    }

    /**
     * Get colorId
     *
     * @return integer 
     */
    public function getColorId()
    {
        return $this->colorId;
    }

    /**
     * Set colorName
     *
     * @param string $colorName
     * @return CartItem
     */
    public function setColorName($colorName)
    {
        $this->colorName = $colorName;

        return $this;
    }

    /**
     * Get colorName
     *
     * @return string 
     */
    public function getColorName()
    {
        return $this->colorName;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return CartItem
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }
    /**
     * @var \NubbeBundle\Entity\Cart
     */
    private $cart;

    /**
     * @var \NubbeBundle\Entity\Product
     */
    private $product;


    /**
     * Set cart
     *
     * @param \NubbeBundle\Entity\Cart $cart
     * @return CartItem
     */
    public function setCart(\NubbeBundle\Entity\Cart $cart = null)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return \NubbeBundle\Entity\Cart 
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set product
     *
     * @param \NubbeBundle\Entity\Product $product
     * @return CartItem
     */
    public function setProduct(\NubbeBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \NubbeBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    public function __toString() {
        return strval($this->id);
    }
}
