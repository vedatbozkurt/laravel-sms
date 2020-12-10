<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 18:52:47
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-10 19:43:17
 */

namespace Vedatbozkurt\Sms;

class Sms
{
    private function setGateway()
    {
        $driver = config('sms.driver');
        $class = 'Vedatbozkurt\Sms\Gateway\\' . $driver;
        $sms_driver = new $class;
        return $sms_driver;
    }
    public function getPackage()
    {
        $sms_driver = $this->setGateway();
        $data = $sms_driver->getPackage();
        return $data;
    }
}
