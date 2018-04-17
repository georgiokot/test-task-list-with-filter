<?php
/**
 * Created by PhpStorm.
 * User: georgio
 * Date: 15.04.18
 * Time: 20:29
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * Class Customers
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="Customers")
 */
class Customers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="cust_id")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", name="cust_name")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", name="cust_address")
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(type="string", name="cust_city")
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(type="string", name="cust_state")
     */
    private $state;

    /**
     * @var integer
     * @ORM\Column(type="integer",  name="cust_zip")
     */
    private $zip;

    /**
     * @var string
     * @ORM\Column(type="string", name="cust_country")
     */
    private $country;

    /**
     * @var string
     * @ORM\Column(type="string", name="cust_contact")
     */
    private $contact;

    /**
     * @var string
     * @ORM\Column(type="string", name="cust_email")
     */
    private $email;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Orders", mappedBy="customer")
     */
    private $orders;


    public function __construct()
    {
        $this->orders = new ArrayCollection();
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
     * @return string
     */
    public function getContact(): string
    {
        return $this->contact;
    }

    /**
     * @param string $contact
     */
    public function setContact(string $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param ArrayCollection $orders
     */
    public function setOrders(ArrayCollection $orders): void
    {
        $this->orders = $orders;
    }


}