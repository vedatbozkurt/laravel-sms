<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 18:52:47
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-10 20:04:57
 */

namespace Vedatbozkurt\Sms;

class Sms
{
    protected $sms_driver;

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

    public function getHeader()
    {
        $data = $this->sms_driver->getHeader();
        return $data;
    }

    public function getBalance()
    {
        $data = $this->sms_driver->getBalance();
        return $data;
    }

    public function sendSms($phoneNumbers=null, $message=null)
    {
        $data = $this->sms_driver->sendSms($phoneNumbers, $message);
        return $data;
    }
}
