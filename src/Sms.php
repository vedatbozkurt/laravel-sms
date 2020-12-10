<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 18:52:47
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-10 19:51:28
 */

namespace Vedatbozkurt\Sms;

class Sms
{
    public $sms_driver;

    public function __construct()
    {
        $driver = config('sms.driver');
        $class = 'Vedatbozkurt\Sms\Gateway\\' . $driver;
        $this->sms_driver = new $class;
    }

    public function getPackage()
    {
        $data = $this->sms_driver->getPackage();
        return $data;
    }

    public function getHeaders()
    {
        $data = $this->sms_driver->getHeader();
        return $data;
    }

    public function getBalance()
    {
        $data = $this->sms_driver->getBalance();
        return $data;
    }

    public function sendSms($phoneNumbers, $message)
    {
        $data = $this->sms_driver->sendSms($phoneNumbers, $message);
        return $data;
    }
}
