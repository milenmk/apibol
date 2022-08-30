<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 6:27 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class BankDetails
{
    /**
     * @var string
     */
    private $bic;

    /**
     * @var string
     */
    private $iban;

    /**
     * @return string
     */
    public function getBic(): string
    {
        return $this->bic;
    }

    /**
     * @param string $bic
     * @return BankDetails
     */
    public function setBic(string $bic): BankDetails
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * @return string
     */
    public function getIban(): string
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     * @return BankDetails
     */
    public function setIban(string $iban): BankDetails
    {
        $this->iban = $iban;

        return $this;
    }


}