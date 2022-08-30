<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/12/17
 * Time: 2:30 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class ParcelResult
{
    /**
     * @var string|null
     */
    private $loadingId;

    /**
     * @var string|null
     */
    private $loadingNumber;

    /**
     * @var string|null
     */
    private $courierRequestId;

    /**
     * @var \DateTime
     */
    private $deliveryDate;

    /**
     * @var LoadingPrice
     */
    private $loadingPrice;

    /**
     * @var string|null
     */
    private $loadingDiscount;

    /**
     * @var Error|null
     */
    private $error;

    /**
     * @var string|null
     */
    private $pdfUrl;

    /**
     * @var string|null
     */
    private $returnReason;

    /**
     * @var string|null
     */
    private $previousParcelNumber;

    /**
     * @var string|null
     */
    private $nextParcels;

    /**
     * @return null|string
     */
    public function getLoadingId(): ?string
    {
        return $this->loadingId;
    }

    /**
     * @param null|string $loadingId
     * @return ParcelResult
     */
    public function setLoadingId($loadingId): ParcelResult
    {
        $this->loadingId = $loadingId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLoadingNumber()
    {
        return $this->loadingNumber;
    }

    /**
     * @param null|string $loadingNumber
     * @return ParcelResult
     */
    public function setLoadingNumber($loadingNumber): ParcelResult
    {
        $this->loadingNumber = $loadingNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCourierRequestId(): ?string
    {
        return $this->courierRequestId;
    }

    /**
     * @param null|string $courierRequestId
     * @return ParcelResult
     */
    public function setCourierRequestId($courierRequestId): ParcelResult
    {
        $this->courierRequestId = $courierRequestId;

        return $this;
    }

    /**
     * @return LoadingPrice
     */
    public function getLoadingPrice(): LoadingPrice
    {
        return $this->loadingPrice;
    }

    /**
     * @param LoadingPrice $loadingPrice
     * @return ParcelResult
     */
    public function setLoadingPrice(LoadingPrice $loadingPrice): ParcelResult
    {
        $this->loadingPrice = $loadingPrice;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLoadingDiscount(): ?string
    {
        return $this->loadingDiscount;
    }

    /**
     * @param null|string $loadingDiscount
     * @return ParcelResult
     */
    public function setLoadingDiscount($loadingDiscount): ParcelResult
    {
        $this->loadingDiscount = $loadingDiscount;

        return $this;
    }

    /**
     * @return null|Error
     */
    public function getError(): ?Error
    {
        return $this->error;
    }

    /**
     * @param null|Error $error
     * @return ParcelResult
     */
    public function setError($error): ParcelResult
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasError(): bool
    {
        return $this->error !== null;
    }

    /**
     * @return null|string
     */
    public function getPdfUrl()
    {
        return $this->pdfUrl;
    }

    /**
     * @param null|string $pdfUrl
     * @return ParcelResult
     */
    public function setPdfUrl($pdfUrl): ParcelResult
    {
        $this->pdfUrl = $pdfUrl;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getReturnReason(): ?string
    {
        return $this->returnReason;
    }

    /**
     * @param null|string $returnReason
     * @return ParcelResult
     */
    public function setReturnReason($returnReason): ParcelResult
    {
        $this->returnReason = $returnReason;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPreviousParcelNumber(): ?string
    {
        return $this->previousParcelNumber;
    }

    /**
     * @param null|string $previousParcelNumber
     * @return ParcelResult
     */
    public function setPreviousParcelNumber($previousParcelNumber): ParcelResult
    {
        $this->previousParcelNumber = $previousParcelNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNextParcels(): ?string
    {
        return $this->nextParcels;
    }

    /**
     * @param null|string $nextParcels
     * @return ParcelResult
     */
    public function setNextParcels($nextParcels): ParcelResult
    {
        $this->nextParcels = $nextParcels;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeliveryDate(): \DateTime
    {
        return $this->deliveryDate;
    }

    /**
     * @param \DateTime $deliveryDate
     * @return ParcelResult
     */
    public function setDeliveryDate(\DateTime $deliveryDate): ParcelResult
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }
}