<?php

namespace NubbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderItem
 */
class OrderItem
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
    private $productId;

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
     * @return OrderItem
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
     * Set productId
     *
     * @param integer $productId
     * @return OrderItem
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set colorId
     *
     * @param integer $colorId
     * @return OrderItem
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
     * @return OrderItem
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
     * @return OrderItem
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
     * @var \NubbeBundle\Entity\OrderInfo
     */
    private $orderInfo;

    /**
     * @var \NubbeBundle\Entity\Product
     */
    private $product;


    /**
     * Set orderInfo
     *
     * @param \NubbeBundle\Entity\OrderInfo $orderInfo
     * @return OrderItem
     */
    public function setOrderInfo(\NubbeBundle\Entity\OrderInfo $orderInfo = null)
    {
        $this->orderInfo = $orderInfo;

        return $this;
    }

    /**
     * Get orderInfo
     *
     * @return \NubbeBundle\Entity\OrderInfo 
     */
    public function getOrderInfo()
    {
        return $this->orderInfo;
    }

    /**
     * Set product
     *
     * @param \NubbeBundle\Entity\Product $product
     * @return OrderItem
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
    /**
     * @var string
     */
    private $sizeName;


    /**
     * Set sizeName
     *
     * @param string $sizeName
     * @return OrderItem
     */
    public function setSizeName($sizeName)
    {
        $this->sizeName = $sizeName;

        return $this;
    }

    /**
     * Get sizeName
     *
     * @return string 
     */
    public function getSizeName()
    {
        return $this->sizeName;
    }
}
