<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 7:54 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class LoadingPrice
{
    /**
     * @var string
     */
    private $total;

    /**
     * @var string
     */
    private $senderTotal;

    /**
     * @var string
     */
    private $receiverTotal;

    /**
     * @var string
     */
    private $otherTotal;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * @return string
     */
    public function getTotal(): string
    {
        return $this->total;
    }

    /**
     * @param string $total
     * @return LoadingPrice
     */
    public function setTotal(string $total): LoadingPrice
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return string
     */
    public function getSenderTotal(): string
    {
        return $this->senderTotal;
    }

    /**
     * @param string $senderTotal
     * @return LoadingPrice
     */
    public function setSenderTotal(string $senderTotal): LoadingPrice
    {
        $this->senderTotal = $senderTotal;

        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverTotal(): string
    {
        return $this->receiverTotal;
    }

    /**
     * @param string $receiverTotal
     * @return LoadingPrice
     */
    public function setReceiverTotal(string $receiverTotal): LoadingPrice
    {
        $this->receiverTotal = $receiverTotal;

        return $this;
    }

    /**
     * @return string
     */
    public function getOtherTotal(): string
    {
        return $this->otherTotal;
    }

    /**
     * @param string $otherTotal
     * @return LoadingPrice
     */
    public function setOtherTotal(string $otherTotal): LoadingPrice
    {
        $this->otherTotal = $otherTotal;

        return $this;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency $currency
     * @return LoadingPrice
     */
    public function setCurrency(Currency $currency): LoadingPrice
    {
        $this->currency = $currency;

        return $this;
    }
}