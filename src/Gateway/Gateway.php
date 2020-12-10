<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 19:02:31
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-10 19:13:05
 */

namespace Vedatbozkurt\Sms;

interface Gateway
{
    public function sendSms($phoneNumbers, $message);
    public function getBalance();
    public function getHeader();
    public function getPackage();
}
