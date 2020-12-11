<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 14:24:24
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-11 21:14:03
 */

namespace VedatBozkurt\Sms\Exception;

use Vedatbozkurt\Sms\Exception\AuthException;
use Vedatbozkurt\Sms\Exception\HeaderException;
use Vedatbozkurt\Sms\Exception\MessageException;
use Vedatbozkurt\Sms\Exception\ParameterException;
use Vedatbozkurt\Sms\Exception\TimeoutException;

class SmsException
{
    public static function checkError($data)
    {
        if ($data == '20') {
            throw new MessageException(trans('sms::message.error20'), 20);
        } elseif ($data=='30') {
            throw new AuthException(trans('sms::message.error30'), 30);
        } elseif ($data=='40') {
            throw new HeaderException(trans('sms::message.error40'), 40);
        } elseif ($data=='60') {
            throw new ParameterException(trans('sms::message.error60'), 60);
        } elseif ($data=='70') {
            throw new ParameterException(trans('sms::message.error70'), 70);
        } elseif ($data=='100') {
            throw new TimeoutException(trans('sms::message.error100'), 100);
        }
    }
}
