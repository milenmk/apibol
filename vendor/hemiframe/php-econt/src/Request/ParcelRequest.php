<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 6:42 PM
 */

namespace HemiFrame\Lib\Econt\Request;


use HemiFrame\Lib\Econt\Model\Loading;

class ParcelRequest
{

    /**
     * @var boolean дали да се прави само валидация, без да се генерират товарителници
     */
    private $validate = false;

    /**
     * @var boolean прави се валидация само за ценообразуващите полета, всички останали се пропускат.
     */
    private $onlyCalculate = false;

    /**
     * @var boolean ако възникване на поне една грешка не се създават пратки; 1 – валидните пратки се създават, за останалите връща грешка
     */
    private $processAllParcels = false;

    /**
     * @var string|null ако $processAllParcels е 1 параметрите за които е върната грешка се изпращат на посочения e-mail адрес
     */
    private $emailErrorsTo;

    /**
     * @var Loading[]
     */
    private $loadings = [];


    /**
     * @return bool
     */
    public function isValidate(): bool
    {
        return $this->validate;
    }

    /**
     * @param bool $validate
     * @return ParcelRequest
     */
    public function setValidate(bool $validate): ParcelRequest
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOnlyCalculate(): bool
    {
        return $this->onlyCalculate;
    }

    /**
     * @param bool $onlyCalculate
     * @return ParcelRequest
     */
    public function setOnlyCalculate(bool $onlyCalculate): ParcelRequest
    {
        $this->onlyCalculate = $onlyCalculate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isProcessAllParcels(): bool
    {
        return $this->processAllParcels;
    }

    /**
     * @param bool $processAllParcels
     * @return ParcelRequest
     */
    public function setProcessAllParcels(bool $processAllParcels): ParcelRequest
    {
        $this->processAllParcels = $processAllParcels;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmailErrorsTo()
    {
        return $this->emailErrorsTo;
    }

    /**
     * @param null|string $emailErrorsTo
     * @return ParcelRequest
     */
    public function setEmailErrorsTo($emailErrorsTo): ParcelRequest
    {
        $this->emailErrorsTo = $emailErrorsTo;

        return $this;
    }

    /**
     * @return Loading[]
     */
    public function getLoadings(): array
    {
        return $this->loadings;
    }

    /**
     * @param Loading[] $loadings
     * @return ParcelRequest
     */
    public function setLoadings(array $loadings): ParcelRequest
    {
        $this->loadings = $loadings;

        return $this;
    }

    /**
     * @param Loading $loading
     * @return ParcelRequest
     */
    public function addLoading(Loading $loading): ParcelRequest
    {
        $this->loadings[] = $loading;

        return $this;
    }


}