<?php

/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/13/17
 * Time: 3:54 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class Office
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $nameEnglish;

    /**
     * @var string
     */
    private $officeCode;

    /**
     * @var boolean
     */
    private $isMachine;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var int
     */
    private $cityId;

    /**
     * @var string
     */
    private $postCode;

    /**
     * @var string
     */
    private $cityName;

    /**
     * @var string
     */
    private $cityNameEnglish;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $addressEnglish;

    /**
     * @var int
     */
    private $quarterId;

    /**
     * @var string
     */
    private $quarterName;

    /**
     * @var string
     */
    private $quarterNameEnglish;

    /**
     * @var int
     */
    private $streetId;

    /**
     * @var Street
     */
    private $street;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $workBegin;

    /**
     * @var \DateTime
     */
    private $workEnd;

    /**
     * @var \DateTime
     */
    private $workBeginSaturday;

    /**
     * @var \DateTime
     */
    private $workEndSaturday;

    /**
     * @var \DateTime
     */
    private $timePriority;

    /**
     * @var \DateTime
     */
    private $updatedOn;

    /**
     * @var string
     */
    private $hubCode;

    /**
     * @var string
     */
    private $hubName;

    /**
     * @var string
     */
    private $hubNameEnglish;

    /**
     * @var bool
     */
    private $isCourier;

    /**
     * @var bool
     */
    private $isPost;

    /**
     * @var bool
     */
    private $isCargo;

    /**
     * @var bool
     */
    private $isCargoExpress;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Office
     */
    public function setId(int $id): Office
    {
        $this->id = $id;

        return $this;
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
     * @return Office
     */
    public function setName(string $name): Office
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameEnglish(): string
    {
        return $this->nameEnglish;
    }

    /**
     * @param string $nameEnglish
     * @return Office
     */
    public function setNameEnglish(string $nameEnglish): Office
    {
        $this->nameEnglish = $nameEnglish;

        return $this;
    }

    /**
     * @return string
     */
    public function getOfficeCode(): string
    {
        return $this->officeCode;
    }

    /**
     * @param string $officeCode
     * @return Office
     */
    public function setOfficeCode(string $officeCode): Office
    {
        $this->officeCode = $officeCode;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMachine(): bool
    {
        return $this->isMachine;
    }

    /**
     * @param bool $isMachine
     * @return Office
     */
    public function setIsMachine(bool $isMachine): Office
    {
        $this->isMachine = $isMachine;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return Office
     */
    public function setCountryCode(string $countryCode): Office
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
    }

    /**
     * @param int $cityId
     * @return Office
     */
    public function setCityId(int $cityId): Office
    {
        $this->cityId = $cityId;

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
     * @return Office
     */
    public function setPostCode(string $postCode): Office
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

    /**
     * @param string $cityName
     * @return Office
     */
    public function setCityName(string $cityName): Office
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCityNameEnglish(): string
    {
        return $this->cityNameEnglish;
    }

    /**
     * @param string $cityNameEnglish
     * @return Office
     */
    public function setCityNameEnglish(string $cityNameEnglish): Office
    {
        $this->cityNameEnglish = $cityNameEnglish;

        return $this;
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
     * @return Office
     */
    public function setAddress(string $address): Office
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressEnglish(): string
    {
        return $this->addressEnglish;
    }

    /**
     * @param string $addressEnglish
     * @return Office
     */
    public function setAddressEnglish(string $addressEnglish): Office
    {
        $this->addressEnglish = $addressEnglish;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuarterId(): int
    {
        return $this->quarterId;
    }

    /**
     * @param int $quarterId
     * @return Office
     */
    public function setQuarterId(int $quarterId): Office
    {
        $this->quarterId = $quarterId;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuarterName(): string
    {
        return $this->quarterName;
    }

    /**
     * @param string $quarterName
     * @return Office
     */
    public function setQuarterName(string $quarterName): Office
    {
        $this->quarterName = $quarterName;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuarterNameEnglish(): string
    {
        return $this->quarterNameEnglish;
    }

    /**
     * @param string $quarterNameEnglish
     * @return Office
     */
    public function setQuarterNameEnglish(string $quarterNameEnglish): Office
    {
        $this->quarterNameEnglish = $quarterNameEnglish;

        return $this;
    }

    /**
     * @return int
     */
    public function getStreetId(): int
    {
        return $this->streetId;
    }

    /**
     * @param int $streetId
     * @return Office
     */
    public function setStreetId(int $streetId): Office
    {
        $this->streetId = $streetId;

        return $this;
    }

    /**
     * @return Street
     */
    public function getStreet(): Street
    {
        return $this->street;
    }

    /**
     * @param Street $street
     * @return Office
     */
    public function setStreet(Street $street): Office
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Office
     */
    public function setPhoneNumber(string $phoneNumber): Office
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getWorkBegin(): \DateTime
    {
        return $this->workBegin;
    }

    /**
     * @param \DateTime $workBegin
     * @return Office
     */
    public function setWorkBegin(\DateTime $workBegin): Office
    {
        $this->workBegin = $workBegin;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getWorkEnd(): \DateTime
    {
        return $this->workEnd;
    }

    /**
     * @param \DateTime $workEnd
     * @return Office
     */
    public function setWorkEnd(\DateTime $workEnd): Office
    {
        $this->workEnd = $workEnd;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getWorkBeginSaturday(): \DateTime
    {
        return $this->workBeginSaturday;
    }

    /**
     * @param \DateTime $workBeginSaturday
     * @return Office
     */
    public function setWorkBeginSaturday(\DateTime $workBeginSaturday): Office
    {
        $this->workBeginSaturday = $workBeginSaturday;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getWorkEndSaturday(): \DateTime
    {
        return $this->workEndSaturday;
    }

    /**
     * @param \DateTime $workEndSaturday
     * @return Office
     */
    public function setWorkEndSaturday(\DateTime $workEndSaturday): Office
    {
        $this->workEndSaturday = $workEndSaturday;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimePriority(): \DateTime
    {
        return $this->timePriority;
    }

    /**
     * @param \DateTime $timePriority
     * @return Office
     */
    public function setTimePriority(\DateTime $timePriority): Office
    {
        $this->timePriority = $timePriority;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedOn(): \DateTime
    {
        return $this->updatedOn;
    }

    /**
     * @param \DateTime $updatedOn
     * @return Office
     */
    public function setUpdatedOn(\DateTime $updatedOn): Office
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * @return string
     */
    public function getHubCode(): string
    {
        return $this->hubCode;
    }

    /**
     * @param string $hubCode
     * @return Office
     */
    public function setHubCode(string $hubCode): Office
    {
        $this->hubCode = $hubCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getHubName(): string
    {
        return $this->hubName;
    }

    /**
     * @param string $hubName
     * @return Office
     */
    public function setHubName(string $hubName): Office
    {
        $this->hubName = $hubName;

        return $this;
    }

    /**
     * @return string
     */
    public function getHubNameEnglish(): string
    {
        return $this->hubNameEnglish;
    }

    /**
     * @param string $hubNameEnglish
     * @return Office
     */
    public function setHubNameEnglish(string $hubNameEnglish): Office
    {
        $this->hubNameEnglish = $hubNameEnglish;

        return $this;
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
     * @return Office
     */
    public function setEmail(string $email): Office
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of isCourier
     *
     * @return  bool
     */
    public function getIsCourier()
    {
        return $this->isCourier;
    }

    /**
     * Set the value of isCourier
     *
     * @param bool $isCourier
     *
     * @return  self
     */
    public function setIsCourier(bool $isCourier)
    {
        $this->isCourier = $isCourier;

        return $this;
    }

    /**
     * Get the value of isPost
     *
     * @return  bool
     */
    public function getIsPost()
    {
        return $this->isPost;
    }

    /**
     * Set the value of isPost
     *
     * @param bool $isPost
     *
     * @return  self
     */
    public function setIsPost(bool $isPost)
    {
        $this->isPost = $isPost;

        return $this;
    }

    /**
     * Get the value of isCargo
     *
     * @return  bool
     */
    public function getIsCargo()
    {
        return $this->isCargo;
    }

    /**
     * Set the value of isCargo
     *
     * @param bool $isCargo
     *
     * @return  self
     */
    public function setIsCargo(bool $isCargo)
    {
        $this->isCargo = $isCargo;

        return $this;
    }

    /**
     * Get the value of isCargoExpress
     *
     * @return  bool
     */
    public function getIsCargoExpress()
    {
        return $this->isCargoExpress;
    }

    /**
     * Set the value of isCargoExpress
     *
     * @param bool $isCargoExpress
     *
     * @return  self
     */
    public function setIsCargoExpress(bool $isCargoExpress)
    {
        $this->isCargoExpress = $isCargoExpress;

        return $this;
    }

    /**
     * Get the value of latitude
     *
     * @return  float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set the value of latitude
     *
     * @param float $latitude
     *
     * @return  self
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get the value of longitude
     *
     * @return  float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set the value of longitude
     *
     * @param float $longitude
     *
     * @return  self
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }
}
