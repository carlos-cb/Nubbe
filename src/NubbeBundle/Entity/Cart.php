<?php

namespace NubbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 */
class Cart
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $cartState;

    /**
     * @var \DateTime
     */
    private $createDate;


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
     * Set cartState
     *
     * @param string $cartState
     * @return Cart
     */
    public function setCartState($cartState)
    {
        $this->cartState = $cartState;

        return $this;
    }

    /**
     * Get cartState
     *
     * @return string 
     */
    public function getCartState()
    {
        return $this->cartState;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     * @return Cart
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime 
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }
    /**
     * @var \NubbeBundle\Entity\User
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cartItems;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cartItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \NubbeBundle\Entity\User $user
     * @return Cart
     */
    public function setUser(\NubbeBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \NubbeBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add cartItems
     *
     * @param \NubbeBundle\Entity\CartItem $cartItems
     * @return Cart
     */
    public function addCartItem(\NubbeBundle\Entity\CartItem $cartItems)
    {
        $this->cartItems[] = $cartItems;

        return $this;
    }

    /**
     * Remove cartItems
     *
     * @param \NubbeBundle\Entity\CartItem $cartItems
     */
    public function removeCartItem(\NubbeBundle\Entity\CartItem $cartItems)
    {
        $this->cartItems->removeElement($cartItems);
    }

    /**
     * Get cartItems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCartItems()
    {
        return $this->cartItems;
    }

    public function __toString() {
        return strval($this->id);
    }
}
