<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 7:24 PM
 */

namespace HemiFrame\Lib\Econt\Response;


use HemiFrame\Lib\Econt\Model\ParcelResult;

class ParcelResponse
{
    /**
     * @var ParcelResult[]
     */
    private $parcelResults = [];

    /**
     * @param ParcelResult $parcelResult
     */
    public function addParcelResult(ParcelResult $parcelResult)
    {
        $this->parcelResults[] = $parcelResult;
    }

    /**
     * @return ParcelResult[]
     */
    public function getParcelResults(): array
    {
        return $this->parcelResults;
    }

    /**
     * @param ParcelResult[] $parcelResults
     * @return ParcelResponse
     */
    public function setParcelResults(array $parcelResults): ParcelResponse
    {
        $this->parcelResults = $parcelResults;

        return $this;
    }


}