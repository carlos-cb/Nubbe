<?php

namespace NubbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Color
 */
class Color
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $colorFoto;

    /**
     * @var string
     */
    private $colorNameEs;

    /**
     * @var string
     */
    private $colorNameEn;


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
     * Set colorFoto
     *
     * @param string $colorFoto
     * @return Color
     */
    public function setColorFoto($colorFoto)
    {
        if(!empty($colorFoto)) {
            $this->colorFoto = $colorFoto;
        }

        return $this;
    }

    /**
     * Get colorFoto
     *
     * @return string 
     */
    public function getColorFoto()
    {
        return $this->colorFoto;
    }

    /**
     * Set colorNameEs
     *
     * @param string $colorNameEs
     * @return Color
     */
    public function setColorNameEs($colorNameEs)
    {
        $this->colorNameEs = $colorNameEs;

        return $this;
    }

    /**
     * Get colorNameEs
     *
     * @return string 
     */
    public function getColorNameEs()
    {
        return $this->colorNameEs;
    }

    /**
     * Set colorNameEn
     *
     * @param string $colorNameEn
     * @return Color
     */
    public function setColorNameEn($colorNameEn)
    {
        $this->colorNameEn = $colorNameEn;

        return $this;
    }

    /**
     * Get colorNameEn
     *
     * @return string 
     */
    public function getColorNameEn()
    {
        return $this->colorNameEn;
    }
    /**
     * @var \NubbeBundle\Entity\Product
     */
    private $product;


    /**
     * Set product
     *
     * @param \NubbeBundle\Entity\Product $product
     * @return Color
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $fotodetalles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fotodetalles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fotodetalles
     *
     * @param \NubbeBundle\Entity\Fotodetalle $fotodetalles
     * @return Color
     */
    public function addFotodetalle(\NubbeBundle\Entity\Fotodetalle $fotodetalles)
    {
        $this->fotodetalles[] = $fotodetalles;

        return $this;
    }

    /**
     * Remove fotodetalles
     *
     * @param \NubbeBundle\Entity\Fotodetalle $fotodetalles
     */
    public function removeFotodetalle(\NubbeBundle\Entity\Fotodetalle $fotodetalles)
    {
        $this->fotodetalles->removeElement($fotodetalles);
    }

    /**
     * Get fotodetalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFotodetalles()
    {
        return $this->fotodetalles;
    }
}
