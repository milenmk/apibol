<?php

namespace HemiFrame\Lib\Econt\Response;

use HemiFrame\Lib\Econt\Model\Zone;

class ZonesResponse
{
    /**
     * @var Zone[]
     */
    private $zones = [];

    /**
     * @return Zone[]
     */
    public function getZones(): array
    {
        return $this->zones;
    }

    /**
     * @param Zone $zone
     * @return ZonesResponse
     */
    public function addZone(Zone $zone): ZonesResponse
    {
        $this->zones[] = $zone;

        return $this;
    }
}