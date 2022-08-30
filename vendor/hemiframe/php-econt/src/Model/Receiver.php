<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 6:19 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class Receiver
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
    private $addressZip;

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
     * @var string|null
     */
    private $smsNumber;

    /**
     * @var BankDetails|null
     */
    private $bankDetails;

    /**
     * @var string|null
     */
    private $providerId;

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return Receiver
     */
    public function setCountryCode(string $countryCode): Receiver
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
     * @return Receiver
     */
    public function setCity(string $city): Receiver
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
     * @return Receiver
     */
    public function setPostCode(string $postCode): Receiver
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressZip(): ?string
    {
        return $this->addressZip;
    }

    /**
     * @param string $addressZip
     * @return Receiver
     */
    public function setAddressZip(string $addressZip): Receiver
    {
        $this->addressZip = $addressZip;

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
     * @return Receiver
     */
    public function setOfficeCode(string $officeCode): Receiver
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
     * @return Receiver
     */
    public function setName(string $name): Receiver
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
     * @return Receiver
     */
    public function setNamePerson(string $namePerson): Receiver
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
     * @return Receiver
     */
    public function setEmail(string $email): Receiver
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
     * @return Receiver
     */
    public function setQuarter(string $quarter): Receiver
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
     * @return Receiver
     */
    public function setStreet(Street $street): Receiver
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
     * @return Receiver
     */
    public function setPhoneNumber(string $phoneNumber): Receiver
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSmsNumber(): ?string
    {
        return $this->smsNumber;
    }

    /**
     * @param string $smsNumber
     * @return Receiver
     */
    public function setSmsNumber(string $smsNumber): Receiver
    {
        $this->smsNumber = $smsNumber;

        return $this;
    }

    /**
     * @return BankDetails
     */
    public function getBankDetails(): ?BankDetails
    {
        return $this->bankDetails;
    }

    /**
     * @param BankDetails $bankDetails
     * @return Receiver
     */
    public function setBankDetails(BankDetails $bankDetails): Receiver
    {
        $this->bankDetails = $bankDetails;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProviderId(): ?string
    {
        return $this->providerId;
    }

    /**
     * @param string $providerId
     * @return Receiver
     */
    public function setProviderId(string $providerId): Receiver
    {
        $this->providerId = $providerId;

        return $this;
    }
}