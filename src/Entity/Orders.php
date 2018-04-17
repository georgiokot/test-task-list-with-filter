<?php
/**
 * Created by PhpStorm.
 * User: georgio
 * Date: 15.04.18
 * Time: 21:23
 */

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class Orders
 * @package App\Entity
 * @ORM\Table(name="Orders")
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="order_num")
     */
    private $id;
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="order_date")
     */
    private $date;

    /**
     * @var Customers
     * @ORM\ManyToOne(targetEntity="App\Entity\Customers", inversedBy="orders")
     * @ORM\JoinColumn(referencedColumnName="cust_id", name="cust_id")
     */
    private $customer;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\OrderItems", mappedBy="order")
     */
    private $ordersItem;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Customers
     */
    public function getCustomer(): Customers
    {
        return $this->customer;
    }

    /**
     * @param Customers $customer
     */
    public function setCustomer(Customers $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrdersItem()
    {
        return $this->ordersItem;
    }

    /**
     * @param ArrayCollection $ordersItem
     */
    public function setOrdersItem(ArrayCollection $ordersItem): void
    {
        $this->ordersItem = $ordersItem;
    }


    public function getSum(){
        $ordersItem = $this->getOrdersItem();
        $sum = 0;
        /** @var OrderItems $item */
        foreach ($ordersItem as $item) {
            $sum += ($item->getPrice() * $item->getQuantity());
        }
        return $sum;
    }



}