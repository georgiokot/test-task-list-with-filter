<?php
/**
 * Created by PhpStorm.
 * User: georgio
 * Date: 15.04.18
 * Time: 20:44
 */

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Products
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="Products")
 */
class Products
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="prod_id")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", name="prod_name")
     */
    private $name;

    /**
     * @var float
     * @ORM\Column(type="float", name="prod_price")
     */
    private $price;

    /**
     * @var string
     * @ORM\Column(type="string", name="prod_desc")
     */
    private $desc;

    /**
     * @var Vendors
     * @ORM\ManyToOne(targetEntity="App\Entity\Vendors", inversedBy="products")
     * @ORM\JoinColumn(referencedColumnName="vend_id", name="vend_id")
     */
    private $vendor;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\OrderItems", mappedBy="product")
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
    }

    /**
     * @return Vendors
     */
    public function getVendor(): Vendors
    {
        return $this->vendor;
    }

    /**
     * @param Vendors $vendor
     */
    public function setVendor(Vendors $vendor): void
    {
        $this->vendor = $vendor;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrdersItem(): ArrayCollection
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



}