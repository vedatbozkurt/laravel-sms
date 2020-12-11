<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 13:18:58
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-11 20:54:16
 */

namespace Vedatbozkurt\Sms\Gateway;

use Illuminate\Support\Facades\Http;
use Vedatbozkurt\Sms\Exception\ResponseException;
use Vedatbozkurt\Sms\Exception\SmsException;

class Netgsm implements Gateway
{
    public function sendSms($phoneNumbers=null, $message=null)
    {
        $numbers = implode(',', $phoneNumbers);
        $req = config('sms.url')."/sms/send/get/?usercode=".config('sms.usercode')."&password=".config('sms.password')."&gsmno=".$numbers."&message=".$message."&msgheader=".config('sms.header')."&dil=".config('sms.language');
        return $this->setRequest($req);
    }

    public function getBalance()
    {
        $req = config('sms.url')."balance/list/get/?usercode=".config('sms.usercode')."&password=".config('sms.password');
        return $this->setRequest($req);
    }

    public function getHeader()
    {
        $req = config('sms.url')."sms/header/?usercode=".config('sms.usercode')."&password=".config('sms.password');
        return $this->setRequest($req);
    }

    public function getPackage()
    {
        $req = config('sms.url')."balance/list/get/?usercode=".config('sms.usercode')."&password=".config('sms.password')."&tip=1";
        return $this->setRequest($req);
    }

    public function setRequest($req)
    {
        $response = Http::get($req);
        if ($response->getStatusCode() == 200) {
            $data = $response->body();

            SmsException::checkError($data);
            
            return $data;
        } else {
            throw new ResponseException($response->getReasonPhrase());
        }
    }
}
