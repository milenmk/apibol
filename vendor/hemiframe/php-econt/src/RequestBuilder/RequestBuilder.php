<?php
/**
 * Created by PhpStorm.
 * User: bozhidar.hristov
 * Date: 6/9/17
 * Time: 6:56 PM
 */

namespace HemiFrame\Lib\Econt\RequestBuilder;


interface RequestBuilder
{
    public function setUsername($username);

    public function setPassword($password);

    public function build($request);
}