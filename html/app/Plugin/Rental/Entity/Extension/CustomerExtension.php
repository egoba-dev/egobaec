<?php
namespace Plugin\Rental\Entity\Extension;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;
use Eccube\Entity\Customer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Plugin\Rental\Entity\RentalOrder;

/**
 * @EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerExtension
{
    /**
     * @var Collection|RentalOrder[]
     *
     * @ORM\OneToMany(targetEntity="Plugin\Rental\Entity\RentalOrder", mappedBy="Customer", cascade={"remove"})
     */
    private $RentalOrders;

    /**
     * @return Collection|RentalOrder[]
     */
    public function getRentalOrders()
    {
        if (null === $this->RentalOrders) {
            $this->RentalOrders = new ArrayCollection();
        }
        
        return $this->RentalOrders;
    }

    /**
     * @param RentalOrder $RentalOrder
     * @return $this
     */
    public function addRentalOrder(RentalOrder $RentalOrder)
    {
        if (null === $this->RentalOrders) {
            $this->RentalOrders = new ArrayCollection();
        }
        
        if (!$this->RentalOrders->contains($RentalOrder)) {
            $this->RentalOrders->add($RentalOrder);
            $RentalOrder->setCustomer($this);
        }
        
        return $this;
    }

    /**
     * @param RentalOrder $RentalOrder
     * @return $this
     */
    public function removeRentalOrder(RentalOrder $RentalOrder)
    {
        if (null === $this->RentalOrders) {
            $this->RentalOrders = new ArrayCollection();
        }
        
        if ($this->RentalOrders->contains($RentalOrder)) {
            $this->RentalOrders->removeElement($RentalOrder);
            $RentalOrder->setCustomer(null);
        }
        
        return $this;
    }
}