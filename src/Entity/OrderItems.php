<?php
/**
 * Created by PhpStorm.
 * User: georgio
 * Date: 15.04.18
 * Time: 21:26
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class OrderItems
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="OrderItems")
 */
class OrderItems
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", name="order_num")
     */
    private $id;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", name="order_item")
     */
    private $id_order;


    /**
     * @var int
     * @ORM\Column(type="integer", name="quantity")
     */
    private $quantity;

    /**
     * @var float
     * @ORM\Column(type="float", name="item_price")
     */
    private $price;

    /**
     * @var Products
     * @ORM\ManyToOne(targetEntity="App\Entity\Products", inversedBy="ordersItem")
     * @ORM\JoinColumn(referencedColumnName="prod_id", name="prod_id")
     */
    private $product;

    /**
     * @var Orders
     * @ORM\ManyToOne(targetEntity="App\Entity\Orders", inversedBy="ordersItem")
     * @ORM\JoinColumn(referencedColumnName="order_num", name="order_num")
     */
    private $order;

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
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Products
     */
    public function getProduct(): Products
    {
        return $this->product;
    }

    /**
     * @param Products $product
     */
    public function setProduct(Products $product): void
    {
        $this->product = $product;
    }

    /**
     * @return Orders
     */
    public function getOrder(): Orders
    {
        return $this->order;
    }

    /**
     * @param Orders $order
     */
    public function setOrder(Orders $order): void
    {
        $this->order = $order;
    }


}