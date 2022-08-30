<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 7:28 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class Loading
{
    /**
     * @var Sender изпращач
     */
    private $sender;

    /**
     * @var Receiver получател
     */
    private $receiver;

    /**
     * @var Shipment товарителница
     */
    private $shipment;

    /**
     * @return Sender
     */
    public function getSender(): Sender
    {
        return $this->sender;
    }

    /**
     * @param Sender $sender
     * @return Loading
     */
    public function setSender(Sender $sender): Loading
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * @return Receiver
     */
    public function getReceiver(): Receiver
    {
        return $this->receiver;
    }

    /**
     * @param Receiver $receiver
     * @return Loading
     */
    public function setReceiver(Receiver $receiver): Loading
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * @return Shipment
     */
    public function getShipment(): Shipment
    {
        return $this->shipment;
    }

    /**
     * @param Shipment $shipment
     * @return Loading
     */
    public function setShipment(Shipment $shipment): Loading
    {
        $this->shipment = $shipment;

        return $this;
    }
}