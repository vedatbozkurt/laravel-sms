<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 14:24:24
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-10 19:25:46
 */

namespace VedatBozkurt\Sms\Exception;

use Vedatbozkurt\Sms\Exception\AuthException;
use Vedatbozkurt\Sms\Exception\HeaderException;
use Vedatbozkurt\Sms\Exception\MessageException;
use Vedatbozkurt\Sms\Exception\ParameterException;
use Vedatbozkurt\Sms\Exception\ResponseException;
use Vedatbozkurt\Sms\Exception\SearchException;
use Vedatbozkurt\Sms\Exception\TimeoutException;

class SmsException
{
    public static function checkError($data)
    {
        if ($data == '20') {
            throw new MessageException('Hata kodu:20 - Mesaj hatalı veya karakter sınırını geçiyor', 20);
        } elseif ($data=='30') {
            throw new AuthException('Hata kodu:30 - Api erişimi yok veya kullanıcı adı ve şifre hatalı.', 30);
        } elseif ($data=='40') {
            throw new HeaderException('Hata kodu:40 - Başlık hatalı veya arama kriterlerinize göre listelenecek kayıt bulunamadı.', 40);
        } elseif ($data=='70') {
            throw new ParameterException('Hata kodu:70 - Gönderi parametreleri hatalı', 70);
        } elseif ($data=='100') {
            throw new TimeoutException('Hata kodu:100 - Sistem hatası, sınır aşımı.(dakikada en fazla 5 kez sorgulanabilir.)', 100);
        }
    }
}
