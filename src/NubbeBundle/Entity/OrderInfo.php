<?php

namespace NubbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderInfo
 */
class OrderInfo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $orderDate;

    /**
     * @var float
     */
    private $goodsFee;

    /**
     * @var float
     */
    private $shipFee;

    /**
     * @var float
     */
    private $totalPrice;

    /**
     * @var string
     */
    private $payType;

    /**
     * @var string
     */
    private $receiverName;

    /**
     * @var string
     */
    private $receiverPhone;

    /**
     * @var string
     */
    private $receiverAdress;

    /**
     * @var string
     */
    private $receiverCity;

    /**
     * @var string
     */
    private $receiverEmail;

    /**
     * @var string
     */
    private $receiverPostcode;

    /**
     * @var bool
     */
    private $isConfirmed;

    /**
     * @var bool
     */
    private $isPayed;

    /**
     * @var bool
     */
    private $isSended;

    /**
     * @var bool
     */
    private $isOver;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $envio;

    /**
     * @var string
     */
    private $shipmode;


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
     * Set orderDate
     *
     * @param \DateTime $orderDate
     * @return OrderInfo
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get orderDate
     *
     * @return \DateTime 
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set goodsFee
     *
     * @param float $goodsFee
     * @return OrderInfo
     */
    public function setGoodsFee($goodsFee)
    {
        $this->goodsFee = $goodsFee;

        return $this;
    }

    /**
     * Get goodsFee
     *
     * @return float 
     */
    public function getGoodsFee()
    {
        return $this->goodsFee;
    }

    /**
     * Set shipFee
     *
     * @param float $shipFee
     * @return OrderInfo
     */
    public function setShipFee($shipFee)
    {
        $this->shipFee = $shipFee;

        return $this;
    }

    /**
     * Get shipFee
     *
     * @return float 
     */
    public function getShipFee()
    {
        return $this->shipFee;
    }

    /**
     * Set totalPrice
     *
     * @param float $totalPrice
     * @return OrderInfo
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return float 
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set payType
     *
     * @param string $payType
     * @return OrderInfo
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;

        return $this;
    }

    /**
     * Get payType
     *
     * @return string 
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Set receiverName
     *
     * @param string $receiverName
     * @return OrderInfo
     */
    public function setReceiverName($receiverName)
    {
        $this->receiverName = $receiverName;

        return $this;
    }

    /**
     * Get receiverName
     *
     * @return string 
     */
    public function getReceiverName()
    {
        return $this->receiverName;
    }

    /**
     * Set receiverPhone
     *
     * @param string $receiverPhone
     * @return OrderInfo
     */
    public function setReceiverPhone($receiverPhone)
    {
        $this->receiverPhone = $receiverPhone;

        return $this;
    }

    /**
     * Get receiverPhone
     *
     * @return string 
     */
    public function getReceiverPhone()
    {
        return $this->receiverPhone;
    }

    /**
     * Set receiverAdress
     *
     * @param string $receiverAdress
     * @return OrderInfo
     */
    public function setReceiverAdress($receiverAdress)
    {
        $this->receiverAdress = $receiverAdress;

        return $this;
    }

    /**
     * Get receiverAdress
     *
     * @return string 
     */
    public function getReceiverAdress()
    {
        return $this->receiverAdress;
    }

    /**
     * Set receiverCity
     *
     * @param string $receiverCity
     * @return OrderInfo
     */
    public function setReceiverCity($receiverCity)
    {
        $this->receiverCity = $receiverCity;

        return $this;
    }

    /**
     * Get receiverCity
     *
     * @return string 
     */
    public function getReceiverCity()
    {
        return $this->receiverCity;
    }

    /**
     * Set receiverEmail
     *
     * @param string $receiverEmail
     * @return OrderInfo
     */
    public function setReceiverEmail($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;

        return $this;
    }

    /**
     * Get receiverEmail
     *
     * @return string 
     */
    public function getReceiverEmail()
    {
        return $this->receiverEmail;
    }

    /**
     * Set receiverPostcode
     *
     * @param string $receiverPostcode
     * @return OrderInfo
     */
    public function setReceiverPostcode($receiverPostcode)
    {
        $this->receiverPostcode = $receiverPostcode;

        return $this;
    }

    /**
     * Get receiverPostcode
     *
     * @return string 
     */
    public function getReceiverPostcode()
    {
        return $this->receiverPostcode;
    }

    /**
     * Set isConfirmed
     *
     * @param boolean $isConfirmed
     * @return OrderInfo
     */
    public function setIsConfirmed($isConfirmed)
    {
        $this->isConfirmed = $isConfirmed;

        return $this;
    }

    /**
     * Get isConfirmed
     *
     * @return boolean 
     */
    public function getIsConfirmed()
    {
        return $this->isConfirmed;
    }

    /**
     * Set isPayed
     *
     * @param boolean $isPayed
     * @return OrderInfo
     */
    public function setIsPayed($isPayed)
    {
        $this->isPayed = $isPayed;

        return $this;
    }

    /**
     * Get isPayed
     *
     * @return boolean 
     */
    public function getIsPayed()
    {
        return $this->isPayed;
    }

    /**
     * Set isSended
     *
     * @param boolean $isSended
     * @return OrderInfo
     */
    public function setIsSended($isSended)
    {
        $this->isSended = $isSended;

        return $this;
    }

    /**
     * Get isSended
     *
     * @return boolean 
     */
    public function getIsSended()
    {
        return $this->isSended;
    }

    /**
     * Set isOver
     *
     * @param boolean $isOver
     * @return OrderInfo
     */
    public function setIsOver($isOver)
    {
        $this->isOver = $isOver;

        return $this;
    }

    /**
     * Get isOver
     *
     * @return boolean 
     */
    public function getIsOver()
    {
        return $this->isOver;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return OrderInfo
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set envio
     *
     * @param string $envio
     * @return OrderInfo
     */
    public function setEnvio($envio)
    {
        $this->envio = $envio;

        return $this;
    }

    /**
     * Get envio
     *
     * @return string 
     */
    public function getEnvio()
    {
        return $this->envio;
    }

    /**
     * Set shipmode
     *
     * @param string $shipmode
     * @return OrderInfo
     */
    public function setShipmode($shipmode)
    {
        $this->shipmode = $shipmode;

        return $this;
    }

    /**
     * Get shipmode
     *
     * @return string 
     */
    public function getShipmode()
    {
        return $this->shipmode;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $orderItems;

    /**
     * @var \NubbeBundle\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add orderItems
     *
     * @param \NubbeBundle\Entity\OrderItem $orderItems
     * @return OrderInfo
     */
    public function addOrderItem(\NubbeBundle\Entity\OrderItem $orderItems)
    {
        $this->orderItems[] = $orderItems;

        return $this;
    }

    /**
     * Remove orderItems
     *
     * @param \NubbeBundle\Entity\OrderItem $orderItems
     */
    public function removeOrderItem(\NubbeBundle\Entity\OrderItem $orderItems)
    {
        $this->orderItems->removeElement($orderItems);
    }

    /**
     * Get orderItems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * Set user
     *
     * @param \NubbeBundle\Entity\User $user
     * @return OrderInfo
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

    public function __toString() {
        return strval($this->id);
    }
}
