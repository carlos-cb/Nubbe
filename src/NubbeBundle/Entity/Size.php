<?php

namespace NubbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Size
 */
class Size
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $sizeName;


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
     * Set sizeName
     *
     * @param string $sizeName
     * @return Size
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
    /**
     * @var \NubbeBundle\Entity\Product
     */
    private $product;


    /**
     * Set product
     *
     * @param \NubbeBundle\Entity\Product $product
     * @return Size
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
