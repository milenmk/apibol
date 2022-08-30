<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/12/17
 * Time: 5:20 PM
 */

namespace HemiFrame\Lib\Econt\Model;


class Quarter
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $nameEnglish;

    /**
     * @var string
     */
    private $cityPostCode;

    /**
     * @var int
     */
    private $cityId;

    /**
     * @var \DateTime
     */
    private $updatedTime;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Quarter
     */
    public function setId(int $id): Quarter
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Quarter
     */
    public function setName(string $name): Quarter
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameEnglish(): string
    {
        return $this->nameEnglish;
    }

    /**
     * @param string $nameEnglish
     * @return Quarter
     */
    public function setNameEnglish(string $nameEnglish): Quarter
    {
        $this->nameEnglish = $nameEnglish;

        return $this;
    }

    /**
     * @return string
     */
    public function getCityPostCode(): string
    {
        return $this->cityPostCode;
    }

    /**
     * @param string $cityPostCode
     * @return Quarter
     */
    public function setCityPostCode(string $cityPostCode): Quarter
    {
        $this->cityPostCode = $cityPostCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
    }

    /**
     * @param int $cityId
     * @return Quarter
     */
    public function setCityId(int $cityId): Quarter
    {
        $this->cityId = $cityId;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedTime(): \DateTime
    {
        return $this->updatedTime;
    }

    /**
     * @param \DateTime $updatedTime
     * @return Quarter
     */
    public function setUpdatedTime(\DateTime $updatedTime): Quarter
    {
        $this->updatedTime = $updatedTime;

        return $this;
    }
}