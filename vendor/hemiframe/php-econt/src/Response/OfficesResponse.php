<?php

namespace HemiFrame\Lib\Econt\Response;

use HemiFrame\Lib\Econt\Model\Office;

class OfficesResponse
{
    /**
     * @var Office[]
     */
    private $offices = [];

    /**
     * @return Office[]
     */
    public function getOffices(): array
    {
        return $this->offices;
    }

    /**
     * @param Office $office
     * @return OfficesResponse
     */
    public function addOffice(Office $office): OfficesResponse
    {
        $this->offices[] = $office;

        return $this;
    }
}