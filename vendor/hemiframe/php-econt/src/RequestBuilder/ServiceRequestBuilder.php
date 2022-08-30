<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 6:58 PM
 */

namespace HemiFrame\Lib\Econt\RequestBuilder;


use HemiFrame\Lib\Econt\Request\AddressValidationRequest;
use HemiFrame\Lib\Econt\Request\OfficesRequest;
use HemiFrame\Lib\Econt\Request\QuartersRequest;
use HemiFrame\Lib\Econt\Request\ZonesRequest;

class ServiceRequestBuilder extends AbstractRequestBuilder
{
    private $requestMapping = [
        ZonesRequest::class => 'cities_zones',
        QuartersRequest::class => 'cities_quarters',
        AddressValidationRequest::class => 'check_address',
        OfficesRequest::class => 'offices',
    ];

    public function createSimpleXML($request)
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><request/>');
        $xml->addChild('request_type', $this->getRequestType($request));

        if ($request instanceof AddressValidationRequest) {
            $address = $xml->addChild('address');

            $address->addChild('city', $request->getAddress()->getCity());
            $address->addChild('post_code', $request->getAddress()->getPostCode());
            $address->addChild('quarter', $request->getAddress()->getQuarter());

            if ($request->getAddress()->getStreet()) {
                $address->addChild('street', $request->getAddress()->getStreet()->getName());
                $address->addChild('street_num', $request->getAddress()->getStreet()->getNumber());
                $address->addChild('street_bl', $request->getAddress()->getStreet()->getBlock());
                $address->addChild('street_vh', $request->getAddress()->getStreet()->getEntrance());
                $address->addChild('street_et', $request->getAddress()->getStreet()->getFloor());
                $address->addChild('street_ap', $request->getAddress()->getStreet()->getApartment());
                $address->addChild('street_other', $request->getAddress()->getStreet()->getOther());
            }
        }

        return $xml;
    }

    private function getRequestType($object)
    {
        return $this->requestMapping[get_class($object)];
    }
}