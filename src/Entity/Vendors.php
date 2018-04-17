<?php
/**
 * Created by PhpStorm.
 * User: georgio
 * Date: 15.04.18
 * Time: 21:13
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Vendors
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="Vendors")
 */
class Vendors
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", name="vend_id")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", name="vend_name")
     */
    private $name;
    /**
     * @var string
     * @ORM\Column(type="string", name="vend_address")
     */
    private $address;
    /**
     * @var string
     * @ORM\Column(type="string", name="vend_city")
     */
    private $city;
    /**
     * @var string
     * @ORM\Column(type="string", name="vend_state")
     */
    private $state;

    /**
     * @var int
     * @ORM\Column(type="integer", name="vend_zip")
     */
    private $zip;
    /**
     * @var string
     * @ORM\Column(type="string", name="vend_country")
     */
    private $country;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="vendor")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

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
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getZip(): int
    {
        return $this->zip;
    }

    /**
     * @param int $zip
     */
    public function setZip(int $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts(): ArrayCollection
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection $products
     */
    public function setProducts(ArrayCollection $products): void
    {
        $this->products = $products;
    }



}