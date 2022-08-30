<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 6:29 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class Shipment
{

    const SHIPMENT_TYPE_PACK = 'PACK';
    const SHIPMENT_TYPE_DOCUMENT = 'DOCUMENT';
    const SHIPMENT_TYPE_PALLET = 'PALLET';
    const SHIPMENT_TYPE_CARGO = 'CARGO';
    const SHIPMENT_TYPE_DOCUMENT_PALLET = 'DOCUMENTPALLET';
    const SHIPMENT_TYPE_SMALL_ENVELOPE = 'SMALL_ENVELOPE';
    const SHIPMENT_TYPE_BIG_ENVELOPE = 'BIG_ENVELOPE';
    const SHIPMENT_TYPE_POST_PACK = 'POST_PACK';
    const SHIPMENT_TYPE_PRESS = 'PRESS';
    const SHIPMENT_TYPE_ADV = 'ADV';
    const SHIPMENT_TYPE_SECOGRAM = 'SECOGRAM';
    const SHIPMENT_TYPE_MONEY_TRANSFER = 'MONEY_TRANSFER';
    const TARIFF_SUB_CODE_DOOR_DOOR = 'DOOR_DOOR';
    const TARIFF_SUB_CODE_OFFICE_DOOR = 'OFFICE_DOOR';
    const TARIFF_SUB_CODE_DOOR_OFFICE = 'DOOR_OFFICE';
    const TARIFF_SUB_CODE_OFFICE_OFFICE = 'OFFICE_OFFICE';
    const TARIFF_SUB_CODE_DOOR_BANK = 'DOOR_BANK';
    const TARIFF_SUB_CODE_OFFICE_BANK = 'OFFICE_BANK';
    private static $shipmentTypes = [
        self::SHIPMENT_TYPE_PACK,
        self::SHIPMENT_TYPE_DOCUMENT,
        self::SHIPMENT_TYPE_PALLET,
        self::SHIPMENT_TYPE_CARGO,
        self::SHIPMENT_TYPE_DOCUMENT_PALLET,
        self::SHIPMENT_TYPE_SMALL_ENVELOPE,
        self::SHIPMENT_TYPE_BIG_ENVELOPE,
        self::SHIPMENT_TYPE_POST_PACK,
        self::SHIPMENT_TYPE_PRESS,
        self::SHIPMENT_TYPE_ADV,
        self::SHIPMENT_TYPE_SECOGRAM,
        self::SHIPMENT_TYPE_MONEY_TRANSFER,
    ];
    private static $tariffSubCodes = [
        self::TARIFF_SUB_CODE_DOOR_DOOR,
        self::TARIFF_SUB_CODE_OFFICE_DOOR,
        self::TARIFF_SUB_CODE_DOOR_OFFICE,
        self::TARIFF_SUB_CODE_OFFICE_OFFICE,
        self::TARIFF_SUB_CODE_DOOR_BANK,
        self::TARIFF_SUB_CODE_OFFICE_BANK,
    ];

    /**
     * @var string|null опционално поле за номер на пратка;
     */
    private $loadingNumber;

    /**
     * @var string|null номер на използваната опаковка;
     */
    private $envelopeNumber;

    /**
     * @var string тип на пратката. PACK – колет, DOCUMENT - документи, PALLET – палет, CARGO – карго експрес, DOCUMENTPALLET – палет + документи;За пощенски пратки: SMALL_ENVELOPE – малко писмо, BIG_ENVELOPE – голямо писмо, POST_PACK - колет, PRESS – печатни произведения, ADV – пряка пощенска реклама, SECOGRAM – секограма; MONEY_TRANSFER – паричен превод;
     */
    private $shipmentType;

    /**
     * @var string|null описание на пратката;
     */
    private $description;

    /**
     * @var int брой пакети
     */
    private $packCount;

    /**
     * @var string тегло (кг)
     */
    private $weight;

    /**
     * @var string начин на доставка възможни стойности: DOOR_DOOR, OFFICE_DOOR, DOOR_OFFICE, OFFICE_OFFICE; за парични преводи по банка: DOOR_BANK, OFFICE_BANK
     */
    private $tariffSubCode;

    /**
     * @var boolean разрешава се преглед на пратката преди събиране на наложения платеж
     */
    private $payAfterAccept = false;

    /**
     * @var boolean пратката да се прегледа от получателя и да плати наложения платеж само ако приеме стоката ми.
     */
    private $invoiceBeforePayCashOnDelivery = false;

    /**
     * @var boolean - пратката да се прегледа и тества от получателя и да плати наложения платеж само ако приеме стоката ми.
     */
    private $payAfterTest = false;

    /**
     * @var \DateTime|null дата на изпращане на пратката – по подразбиране текущата;
     */
    private $sendDate;

    /**
     * @var string|null Дата за доставка на пратката - възможните стойности са: - work_day – първия работен ден, half_day – първия работен ден или ден с дежурства; или някоя датите върнати от запитване „информация кои са дните за разнос по дадена дата”. По подразбиране се взема първата възможна дата за доставка
     */
    private $deliveryDate;

    /**
     * @var boolean дали пратката е с размери под 60 см
     */
    private $sizeUnder60cm = true;

    /**
     * @var string|null Номер на поръчка
     */
    private $orderNumber;

    /**
     * @return null|string
     */
    public function getLoadingNumber()
    {
        return $this->loadingNumber;
    }

    /**
     * @param null|string $loadingNumber
     * @return Shipment
     */
    public function setLoadingNumber($loadingNumber)
    {
        $this->loadingNumber = $loadingNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEnvelopeNumber()
    {
        return $this->envelopeNumber;
    }

    /**
     * @param null|string $envelopeNumber
     * @return Shipment
     */
    public function setEnvelopeNumber($envelopeNumber)
    {
        $this->envelopeNumber = $envelopeNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentType(): string
    {
        return $this->shipmentType;
    }

    /**
     * @param string $shipmentType
     * @return Shipment
     * @throws \InvalidArgumentException
     */
    public function setShipmentType(string $shipmentType): Shipment
    {
        if (!in_array($shipmentType, self::$shipmentTypes)) {
            throw new \InvalidArgumentException(sprintf('%s is not allowed value for %s', $shipmentType, __METHOD__));
        }
        $this->shipmentType = $shipmentType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return Shipment
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getPackCount(): int
    {
        return $this->packCount;
    }

    /**
     * @param int $packCount
     * @return Shipment
     */
    public function setPackCount(int $packCount): Shipment
    {
        $this->packCount = $packCount;

        return $this;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     * @return Shipment
     */
    public function setWeight(string $weight): Shipment
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return string
     */
    public function getTariffSubCode(): string
    {
        return $this->tariffSubCode;
    }

    /**
     * @param string $tariffSubCode
     * @return Shipment
     * @throws \InvalidArgumentException
     */
    public function setTariffSubCode(string $tariffSubCode): Shipment
    {
        if (!in_array($tariffSubCode, self::$tariffSubCodes)) {
            throw new \InvalidArgumentException(sprintf('%s is not allowed value for %s', $tariffSubCode, __METHOD__));
        }
        $this->tariffSubCode = $tariffSubCode;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPayAfterAccept(): bool
    {
        return $this->payAfterAccept;
    }

    /**
     * @param bool $payAfterAccept
     * @return Shipment
     */
    public function setPayAfterAccept(bool $payAfterAccept): Shipment
    {
        $this->payAfterAccept = $payAfterAccept;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInvoiceBeforePayCashOnDelivery(): bool
    {
        return $this->invoiceBeforePayCashOnDelivery;
    }

    /**
     * @param bool $invoiceBeforePayCashOnDelivery
     * @return Shipment
     */
    public function setInvoiceBeforePayCashOnDelivery(bool $invoiceBeforePayCashOnDelivery): Shipment
    {
        $this->invoiceBeforePayCashOnDelivery = $invoiceBeforePayCashOnDelivery;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPayAfterTest(): bool
    {
        return $this->payAfterTest;
    }

    /**
     * @param bool $payAfterTest
     * @return Shipment
     */
    public function setPayAfterTest(bool $payAfterTest): Shipment
    {
        $this->payAfterTest = $payAfterTest;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getSendDate(): ?\DateTime
    {
        return $this->sendDate;
    }

    /**
     * @param \DateTime|null $sendDate
     * @return Shipment
     */
    public function setSendDate(\DateTime $sendDate)
    {
        $this->sendDate = $sendDate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }

    /**
     * @param null|string $deliveryDate
     * @return Shipment
     */
    public function setDeliveryDate(string $deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSizeUnder60cm(): bool
    {
        return $this->sizeUnder60cm;
    }

    /**
     * @param bool $sizeUnder60cm
     * @return Shipment
     */
    public function setSizeUnder60cm(bool $sizeUnder60cm): Shipment
    {
        $this->sizeUnder60cm = $sizeUnder60cm;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param null|string $orderNumber
     * @return Shipment
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }
}