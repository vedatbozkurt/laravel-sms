<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 19:02:31
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-11 21:08:15
 */

namespace Vedatbozkurt\Sms\Gateway;

interface Gateway
{
    public function sendSms($phoneNumbers=null, $message=null);
    public function getBalance();
    public function getHeader();
    public function getPackage();
    public function getReport($bulkId);
    public function setRequest($req);
}
