<?php

namespace HemiFrame\Lib\Econt\Parser;

use HemiFrame\Lib\Econt\Model\AddressValidation;
use HemiFrame\Lib\Econt\Model\Street;
use HemiFrame\Lib\Econt\Response\AddressValidationResponse;

class AddressValidationResponseParser implements Parser
{

    public function parse(\SimpleXMLElement $xml)
    {
        $response = new AddressValidationResponse();

        $address = $xml->address;

        $addressValidation = new AddressValidation();
        $addressValidation->setCity($address->city);
        $addressValidation->setPostCode($address->post_code);
        $addressValidation->setQuarter($address->quarter);

        $street = new Street();
        $street->setName($address->street);
        $street->setNumber($address->street_num);
        $street->setBlock($address->street_bl);
        $street->setEntrance($address->street_vh);
        $street->setFloor($address->street_et);
        $street->setApartment($address->street_ap);
        $street->setOther($address->street_other);
        $addressValidation->setStreet($address->city);
        $addressValidation->setValidationStatus($address->validation_status);
        $addressValidation->setError($address->error);

        $response->setAddress($addressValidation);

        return $response;
    }
}