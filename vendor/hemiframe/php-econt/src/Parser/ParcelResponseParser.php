<?php

namespace HemiFrame\Lib\Econt\Parser;

use HemiFrame\Lib\Econt\Exception\InvalidArgumentException;
use HemiFrame\Lib\Econt\Model\Currency;
use HemiFrame\Lib\Econt\Model\Error;
use HemiFrame\Lib\Econt\Model\LoadingPrice;
use HemiFrame\Lib\Econt\Model\ParcelResult;
use HemiFrame\Lib\Econt\Response\ParcelResponse;

class ParcelResponseParser implements Parser
{
    public function parse(\SimpleXMLElement $xml)
    {
        $response = new ParcelResponse();


        foreach ($xml->result->e as $row) {
            $parcelResult = new ParcelResult();


            $parcelResult->setLoadingId($row->loading_id);
            $parcelResult->setLoadingNumber($row->loading_num);
            $parcelResult->setCourierRequestId($row->courier_request_id);
            $parcelResult->setDeliveryDate(new \DateTime($row->delivery_date));
            $parcelResult->setLoadingPrice($this->getLoadingPrice($row->loading_price));

            $error = (string)$row->error;
            $errorCode = (string)$row->error_code;

            if (!empty($error)) {
                $errorModel = new Error();
                $errorModel->setMessages(explode(';', $error));
                $errorModel->setCode($errorCode);
                $parcelResult->setError($errorModel);
            }

            $response->addParcelResult($parcelResult);
        }

        return $response;
    }

    private function getLoadingPrice(\SimpleXMLElement $price)
    {
        $loadingPrice = new LoadingPrice();
        $loadingPrice->setTotal($price->total);
        $loadingPrice->setSenderTotal($price->sender_total);
        $loadingPrice->setReceiverTotal($price->receiver_total);
        $loadingPrice->setOtherTotal($price->other_total);

        $currency = new Currency();
        $currency->setName($price->currency);
        $currency->setCode($price->currency_code);
        $loadingPrice->setCurrency($currency);

        return $loadingPrice;
    }

}