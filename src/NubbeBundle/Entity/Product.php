<?php

namespace NubbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 */
class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $productNameEs;

    /**
     * @var string
     */
    private $productNameEn;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $foto;

    /**
     * @var bool
     */
    private $isNew;

    /**
     * @var bool
     */
    private $isShow;


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
     * Set productNameEs
     *
     * @param string $productNameEs
     * @return Product
     */
    public function setProductNameEs($productNameEs)
    {
        $this->productNameEs = $productNameEs;

        return $this;
    }

    /**
     * Get productNameEs
     *
     * @return string 
     */
    public function getProductNameEs()
    {
        return $this->productNameEs;
    }

    /**
     * Set productNameEn
     *
     * @param string $productNameEn
     * @return Product
     */
    public function setProductNameEn($productNameEn)
    {
        $this->productNameEn = $productNameEn;

        return $this;
    }

    /**
     * Get productNameEn
     *
     * @return string 
     */
    public function getProductNameEn()
    {
        return $this->productNameEn;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Product
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Product
     */
    public function setFoto($foto)
    {
        if(!empty($foto)){
            $this->foto = $foto;
        }
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
     * Set isNew
     *
     * @param boolean $isNew
     * @return Product
     */
    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;

        return $this;
    }

    /**
     * Get isNew
     *
     * @return boolean 
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * Set isShow
     *
     * @param boolean $isShow
     * @return Product
     */
    public function setIsShow($isShow)
    {
        $this->isShow = $isShow;

        return $this;
    }

    /**
     * Get isShow
     *
     * @return boolean 
     */
    public function getIsShow()
    {
        return $this->isShow;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $colors;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sizes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $fotodetalles;

    /**
     * @var \NubbeBundle\Entity\Category
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->colors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sizes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fotodetalles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add colors
     *
     * @param \NubbeBundle\Entity\Color $colors
     * @return Product
     */
    public function addColor(\NubbeBundle\Entity\Color $colors)
    {
        $this->colors[] = $colors;

        return $this;
    }

    /**
     * Remove colors
     *
     * @param \NubbeBundle\Entity\Color $colors
     */
    public function removeColor(\NubbeBundle\Entity\Color $colors)
    {
        $this->colors->removeElement($colors);
    }

    /**
     * Get colors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Add sizes
     *
     * @param \NubbeBundle\Entity\Size $sizes
     * @return Product
     */
    public function addSize(\NubbeBundle\Entity\Size $sizes)
    {
        $this->sizes[] = $sizes;

        return $this;
    }

    /**
     * Remove sizes
     *
     * @param \NubbeBundle\Entity\Size $sizes
     */
    public function removeSize(\NubbeBundle\Entity\Size $sizes)
    {
        $this->sizes->removeElement($sizes);
    }

    /**
     * Get sizes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSizes()
    {
        return $this->sizes;
    }

    /**
     * Add fotodetalles
     *
     * @param \NubbeBundle\Entity\Fotodetalle $fotodetalles
     * @return Product
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

    /**
     * Set category
     *
     * @param \NubbeBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\NubbeBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \NubbeBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function __toString() {
        return strval($this->id);
    }
}
