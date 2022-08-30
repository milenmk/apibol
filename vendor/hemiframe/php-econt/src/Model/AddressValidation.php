<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/12/17
 * Time: 5:52 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class AddressValidation
{

    const STATUS_VALID = 'normal';
    const STATUS_VALID_AFTER_PROCESS = 'processed';
    const STATUS_INVALID = 'invalid';

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $postCode;

    /**
     * @var string
     */
    private $officeCode;

    /**
     * @var string
     */
    private $quarter;

    /**
     * @var Street|null
     */
    private $street;

    /**
     * @var string “normal” – адреса е валиден; “processed” – адреса е валиден след обработка; “invalid” – адреса не е валиден
     */
    private $validationStatus;

    /**
     * @var string|null – текст на грешката ако адреса не е валиден;
     */
    private $error;

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return AddressValidation
     */
    public function setCity(string $city): AddressValidation
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
     * @return AddressValidation
     */
    public function setPostCode(string $postCode): AddressValidation
    {
        $this->postCode = $postCode;

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
     * @return AddressValidation
     */
    public function setOfficeCode(string $officeCode): AddressValidation
    {
        $this->officeCode = $officeCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuarter(): string
    {
        return $this->quarter;
    }

    /**
     * @param string $quarter
     * @return AddressValidation
     */
    public function setQuarter(string $quarter): AddressValidation
    {
        $this->quarter = $quarter;

        return $this;
    }

    /**
     * @return null|Street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param null|Street $street
     * @return AddressValidation
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param null|string $error
     * @return AddressValidation
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    public function isValid()
    {
        return $this->getValidationStatus() == self::STATUS_VALID;
    }

    /**
     * @return string
     */
    public function getValidationStatus(): string
    {
        return $this->validationStatus;
    }

    /**
     * @param string $validationStatus
     * @return AddressValidation
     */
    public function setValidationStatus(string $validationStatus): AddressValidation
    {
        $this->validationStatus = $validationStatus;

        return $this;
    }

    public function isValidAfterProcessed()
    {
        return $this->getValidationStatus() == self::STATUS_VALID_AFTER_PROCESS;
    }

    public function isInvalid()
    {
        return $this->getValidationStatus() == self::STATUS_INVALID;
    }
}