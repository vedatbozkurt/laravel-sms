<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 13:18:58
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-10 19:42:14
 */

namespace Vedatbozkurt\Sms\Gateway;

use Illuminate\Support\Facades\Http;
use Vedatbozkurt\Sms\Exception\ResponseException;
use Vedatbozkurt\Sms\Exception\SmsException;

class Netgsm implements Gateway
{
    public function sendSms($phoneNumbers, $message)
    {
        $numbers = implode(',', $phoneNumbers);
        $url = config('sms.url')."/sms/send/get/?usercode=".config('sms.usercode')."&password=".config('sms.password')."&gsmno=".$numbers."&message=".$message."&msgheader=".config('sms.header')."&dil=".config('sms.language');
        $response = Http::get($url);
        if ($response->getStatusCode() == 200) {
            $data = $response->body();
            
            SmsException::checkError($data);

            $bulkId=explode(' ', $data);
            return $bulkId[1];
        } else {
            throw new ResponseException($response->getReasonPhrase());
        }
    }

    public function getBalance()
    {
        $url = config('sms.url')."balance/list/get/?usercode=".config('sms.usercode')."&password=".config('sms.password');
        $response = Http::get($url);
        if ($response->getStatusCode() == 200) {
            $data = $response->body();
            
            SmsException::checkError($data);

            $bulkId=explode(' ', $data);
            return $bulkId[1];
        } else {
            throw new ResponseException($response->getReasonPhrase());
        }
    }

    public function getHeader()
    {
        $url = config('sms.url')."sms/header/?usercode=".config('sms.usercode')."&password=".config('sms.password');
        $response = Http::get($url);
        if ($response->getStatusCode() == 200) {
            $data = $response->body();

            SmsException::checkError($data);

            return $data;
        } else {
            throw new ResponseException($response->getReasonPhrase());
        }
    }

    public function getPackage()
    {
        $url = config('sms.url')."balance/list/get/?usercode=".config('sms.usercode')."&password=".config('sms.password')."&tip=1";
        $response = Http::get($url);
        if ($response->getStatusCode() == 200) {
            $data = $response->body();

            SmsException::checkError($data);
            
            return $data;
        } else {
            throw new ResponseException($response->getReasonPhrase());
        }
    }
}
