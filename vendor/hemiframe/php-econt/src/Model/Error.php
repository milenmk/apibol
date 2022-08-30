<?php

namespace HemiFrame\Lib\Econt\Model;


class Error
{
    /**
     * @var array
     */
    private $messages = [];

    /**
     * @var string
     */
    private $code;

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     * @return Error
     */
    public function setMessages(array $messages): Error
    {
        $this->messages = $messages;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Error
     */
    public function setCode(string $code): Error
    {
        $this->code = $code;

        return $this;
    }
}