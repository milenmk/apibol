PHP Component to integrate with ECONT Courier

So far only calculation is possible.

```php
$guzzle = new \GuzzleHttp\Client();
$client = new \VM5\Econt\Client($guzzle, true, 'demo', 'demo');

$parcelRequest = new \VM5\Econt\Request\ParcelRequest();
$parcelRequest->setOnlyCalculate(true);


$loading = new \VM5\Econt\Model\Loading();

$sender = new \VM5\Econt\Model\Sender();
$sender->setCountryCode('BRG');
$sender->setCity('София');
$sender->setPostCode('1000');
$loading->setSender($sender);


$receiver = new \VM5\Econt\Model\Receiver();
$receiver->setCountryCode('BRG');
$receiver->setCity('Бургас');
$receiver->setPostCode('80001');
$loading->setReceiver($receiver);


$shipment = new \VM5\Econt\Model\Shipment();
$shipment->setShipmentType(\VM5\Econt\Model\Shipment::SHIPMENT_TYPE_PACK);
$shipment->setPackCount(1);
$shipment->setWeight(1);
$shipment->setTariffSubCode(\VM5\Econt\Model\Shipment::TARIFF_SUB_CODE_DOOR_DOOR);
$loading->setShipment($shipment);

$parcelRequest->addLoading($loading);

/** @var \VM5\Econt\Response\ParcelResponse $response */
$response = $client->execute($parcelRequest);

foreach ($response->getParcelResults() as $parcelResult) {
    if ($parcelResult->hasError()) {
        echo 'Грешка: ';
        foreach ($parcelResult->getError()->getMessages() as $errorMsg) {
            echo $errorMsg;
        }

    } else {
        echo 'Цена за доставка '.$parcelResult->getLoadingPrice()->getTotal().' '.$parcelResult->getLoadingPrice()->getCurrency()->getName();
    }
}
```

Example output with error:

```text
Грешка: получател: Не е намерено населено място с пощенски код 80001
```

Example output without error:

```text
Цена за доставка 7.8 лв
```