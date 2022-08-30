<?php

namespace HemiFrame\Lib\Econt\Model;

class Zone
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
     * @var boolean
     */
    private $national;

    /**
     * @var boolean
     */
    private $isEe;

    /**
     * @var \DateTime|null
     */
    private $updatedOn;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Zone
     */
    public function setId(int $id): Zone
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
     * @return Zone
     */
    public function setName(string $name): Zone
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
     * @return Zone
     */
    public function setNameEnglish(string $nameEnglish): Zone
    {
        $this->nameEnglish = $nameEnglish;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNational(): bool
    {
        return $this->national;
    }

    /**
     * @param bool $national
     * @return Zone
     */
    public function setNational(bool $national): Zone
    {
        $this->national = $national;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEe(): bool
    {
        return $this->isEe;
    }

    /**
     * @param bool $isEe
     * @return Zone
     */
    public function setIsEe(bool $isEe): Zone
    {
        $this->isEe = $isEe;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * @param \DateTime|null $updatedOn
     * @return Zone
     */
    public function setUpdatedOn($updatedOn)
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }
}