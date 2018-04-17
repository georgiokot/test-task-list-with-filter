<?php
/**
 * Created by PhpStorm.
 * User: georgio
 * Date: 15.04.18
 * Time: 23:19
 */

namespace App\Util;



use App\Entity\Customers;
use App\Entity\Vendors;

class Filter
{
    /**
     * @var float
     */
    private $priceMin;

    /**
     * @var Float
     */
    private $priceMax;

    /**
     * @var \DateTime
     */
    private $dateStart;

    /**
     * @var \DateTime
     */
    private $dateEnd;

    /**
     * @var Vendors
     */
    private $vendors;

    /**
     * @var Customers
     */
    private $country;

    /**
     * @return float
     */
    public function getPriceMin()
    {
        return (empty($this->priceMin))? null : $this->priceMin;
    }

    /**
     * @param float $priceMin
     */
    public function setPriceMin($priceMin)
    {
        $this->priceMin = $priceMin;
    }

    /**
     * @return Float
     */
    public function getPriceMax()
    {
        return (empty($this->priceMax))? null : $this->priceMax;
    }

    /**
     * @param Float $priceMax
     */
    public function setPriceMax($priceMax)
    {
        $this->priceMax = $priceMax;
    }



    /**
     * @return \DateTime
     * @param $format
     */
    public function getDateEnd($format = 'Y-m-d'): string
    {
        if($this->dateEnd === null){
            $date  = new \DateTime('2037-01-01');
            return $date->format($format);
        };
        return $this->dateEnd->format($format);
    }

    /**
     * @param \DateTime $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }


    /**
     * @return string
     */
    public function getCountry()
    {
        return (empty($this->country))? null : $this->country->getCountry();
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return Vendors
     */
    public function getVendors()
    {
        return (empty($this->vendors))? null : $this->vendors;
    }

    /**
     * @param Vendors $vendors
     */
    public function setVendors($vendors)
    {
        $this->vendors = $vendors;
    }

    /**
     * @return \DateTime
     * @param string Date format
     */
    public function getDateStart($format = 'Y-m-d'): string
    {
        if($this->dateStart === null){
            $date = new \DateTime('1970-01-01');
            return $date->format($format);
        };
        return $this->dateStart->format($format);
    }

    /**
     * @param \DateTime $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }





}