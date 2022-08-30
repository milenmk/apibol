<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/12/17
 * Time: 5:44 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class Address
{

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $postCode;

    /**
     * @var string|null
     */
    private $quarter;

    /**
     * @var Street|null
     */
    private $street;

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     * @return Address
     */
    public function setPostCode(string $postCode): Address
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getQuarter(): ?string
    {
        return $this->quarter;
    }

    /**
     * @param null|string $quarter
     * @return Address
     */
    public function setQuarter($quarter): Address
    {
        $this->quarter = $quarter;

        return $this;
    }

    /**
     * @return null|Street
     */
    public function getStreet(): ?Street
    {
        return $this->street;
    }

    /**
     * @param null|Street $street
     * @return Address
     */
    public function setStreet($street): Address
    {
        $this->street = $street;

        return $this;
    }
}