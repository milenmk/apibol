<?php

namespace HemiFrame\Lib\Econt\RequestBuilder;

use HemiFrame\Lib\Econt\Model\Receiver;
use HemiFrame\Lib\Econt\Model\Sender;
use HemiFrame\Lib\Econt\Model\Shipment;
use HemiFrame\Lib\Econt\Request\ParcelRequest;

class ParcelRequestBuilder extends AbstractRequestBuilder
{
    public function createSimpleXML($request)
    {
        /** @var ParcelRequest $request */


        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><parcels/>');
        $system = $xml->addChild('system');
        $system->addChild('validate', $request->isValidate());
        $system->addChild('response_type', 'XML');
        $system->addChild('only_calculate', $request->isOnlyCalculate());
        $system->addChild('process_all_parcels', $request->isProcessAllParcels());
        $system->addChild('email_errors_to', $request->getEmailErrorsTo());

        $loadings = $xml->addChild('loadings');

        foreach ($request->getLoadings() as $loading) {
            $row = $loadings->addChild('row');

            $this->addSender($row, $loading->getSender());
            $this->addReceiver($row, $loading->getReceiver());
            $this->addShipment($row, $loading->getShipment());
        }


        return $xml;
    }

    private function addSender(\SimpleXMLElement $row, Sender $sender)
    {
        $row = $row->addChild('sender');

        $row->addChild('country_code', $sender->getCountryCode());
        $row->addChild('city', $sender->getCity());
        $row->addChild('post_code', $sender->getPostCode());
        $row->addChild('name', $sender->getName());
        $row->addChild('name_person', $sender->getNamePerson());
        $row->addChild('email', $sender->getEmail());
        $row->addChild('quarter', $sender->getQuarter());

        if ($sender->getStreet()) {
            $row->addChild('street', $sender->getStreet()->getName());
            $row->addChild('street_num', $sender->getStreet()->getNumber());
            $row->addChild('street_bl', $sender->getStreet()->getBlock());
            $row->addChild('street_vh', $sender->getStreet()->getEntrance());
            $row->addChild('street_et', $sender->getStreet()->getFloor());
            $row->addChild('street_ap', $sender->getStreet()->getApartment());
            $row->addChild('street_other', $sender->getStreet()->getOther());
        }
        $row->addChild('phone_num', $sender->getPhoneNumber());
        $row->addChild('email_on_delivery', $sender->isEmailOnDelivery());
    }

    private function addReceiver(\SimpleXMLElement $row, Receiver $receiver)
    {
        $row = $row->addChild('receiver');

        $row->addChild('country_code', $receiver->getCountryCode());
        $row->addChild('city', $receiver->getCity());
        $row->addChild('post_code', $receiver->getPostCode());
        $row->addChild('name', $receiver->getName());
        $row->addChild('name_person', $receiver->getNamePerson());
        $row->addChild('email', $receiver->getEmail());
        $row->addChild('quarter', $receiver->getQuarter());

        if ($receiver->getStreet()) {
            $row->addChild('street', $receiver->getStreet()->getName());
            $row->addChild('street_num', $receiver->getStreet()->getNumber());
            $row->addChild('street_bl', $receiver->getStreet()->getBlock());
            $row->addChild('street_vh', $receiver->getStreet()->getEntrance());
            $row->addChild('street_et', $receiver->getStreet()->getFloor());
            $row->addChild('street_ap', $receiver->getStreet()->getApartment());
            $row->addChild('street_other', $receiver->getStreet()->getOther());
        }
        $row->addChild('phone_num', $receiver->getPhoneNumber());
        $row->addChild('sms_no', $receiver->getSmsNumber());
        if ($receiver->getBankDetails()) {
            $row->addChild('bic', $receiver->getBankDetails()->getBic());
            $row->addChild('iban', $receiver->getBankDetails()->getIban());
        }
        $row->addChild('provider_id', $receiver->getProviderId());
    }

    private function addShipment(\SimpleXMLElement $row, Shipment $shipment)
    {
        $row = $row->addChild('shipment');

        $row->addChild('loading_num', $shipment->getLoadingNumber());
        $row->addChild('envelope_num', $shipment->getEnvelopeNumber());
        $row->addChild('shipment_type', $shipment->getShipmentType());
        $row->addChild('description', $shipment->getDescription());
        $row->addChild('pack_count', $shipment->getPackCount());
        $row->addChild('weight', $shipment->getWeight());
        $row->addChild('tariff_sub_code', $shipment->getTariffSubCode());
        $row->addChild('pay_after_accept', $shipment->isPayAfterAccept());
        $row->addChild('pay_after_test', $shipment->isPayAfterTest());
        $row->addChild('invoice_before_pay_CD', $shipment->isInvoiceBeforePayCashOnDelivery());
        $row->addChild('send_date', $shipment->getSendDate());
        $row->addChild('delivery_day', $shipment->getDeliveryDate());
        $row->addChild('size_under_60cm', $shipment->isSizeUnder60cm());
    }
}