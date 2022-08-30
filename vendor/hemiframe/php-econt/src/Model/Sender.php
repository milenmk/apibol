<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 6:19 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class Sender
{
    /**
     * @var string|null
     */
    private $countryCode;

    /**
     * @var string|null
     */
    private $city;

    /**
     * @var string|null
     */
    private $postCode;

    /**
     * @var string|null
     */
    private $officeCode;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $namePerson;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $quarter;

    /**
     * @var Street|null
     */
    private $street;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var boolean
     */
    private $emailOnDelivery = false;

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return Sender
     */
    public function setCountryCode(string $countryCode): Sender
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Sender
     */
    public function setCity(string $city): Sender
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     * @return Sender
     */
    public function setPostCode(string $postCode): Sender
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOfficeCode(): ?string
    {
        return $this->officeCode;
    }

    /**
     * @param string $officeCode
     * @return Sender
     */
    public function setOfficeCode(string $officeCode): Sender
    {
        $this->officeCode = $officeCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Sender
     */
    public function setName(string $name): Sender
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNamePerson(): ?string
    {
        return $this->namePerson;
    }

    /**
     * @param string $namePerson
     * @return Sender
     */
    public function setNamePerson(string $namePerson): Sender
    {
        $this->namePerson = $namePerson;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Sender
     */
    public function setEmail(string $email): Sender
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuarter(): ?string
    {
        return $this->quarter;
    }

    /**
     * @param string $quarter
     * @return Sender
     */
    public function setQuarter(string $quarter): Sender
    {
        $this->quarter = $quarter;

        return $this;
    }

    /**
     * @return Street|null
     */
    public function getStreet(): ?Street
    {
        return $this->street;
    }

    /**
     * @param Street $street
     * @return Sender
     */
    public function setStreet(Street $street): Sender
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Sender
     */
    public function setPhoneNumber(string $phoneNumber): Sender
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmailOnDelivery(): bool
    {
        return $this->emailOnDelivery;
    }

    /**
     * @param bool $emailOnDelivery
     * @return Sender
     */
    public function setEmailOnDelivery(bool $emailOnDelivery): Sender
    {
        $this->emailOnDelivery = $emailOnDelivery;

        return $this;
    }
}