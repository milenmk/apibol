<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 7:05 PM
 */

namespace HemiFrame\Lib\Econt\RequestBuilder;


abstract class AbstractRequestBuilder implements RequestBuilder
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->username = $password;
    }

    public function build($request)
    {
        $xml = $this->createSimpleXML($request);

        $client = $xml->addChild('client');
        $client->addChild('username', $this->username);
        $client->addChild('password', $this->password);

        return $xml->saveXML();
    }

    /**
     * @param $request
     * @return \SimpleXMLElement
     */
    abstract public function createSimpleXML($request);
}