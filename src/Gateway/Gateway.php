<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 19:02:31
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-10 20:04:21
 */

namespace Vedatbozkurt\Sms\Gateway;

interface Gateway
{
    public function sendSms($phoneNumbers=null, $message=null);
    public function getBalance();
    public function getHeader();
    public function getPackage();
}
