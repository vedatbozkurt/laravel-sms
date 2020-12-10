<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 14:24:24
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-10 17:19:04
 */

namespace VedatBozkurt\Netgsm\Exception;

use Vedatbozkurt\Netgsm\Exception\AuthException;
use Vedatbozkurt\Netgsm\Exception\HeaderException;
use Vedatbozkurt\Netgsm\Exception\MessageException;
use Vedatbozkurt\Netgsm\Exception\ParameterException;
use Vedatbozkurt\Netgsm\Exception\ResponseException;
use Vedatbozkurt\Netgsm\Exception\SearchException;
use Vedatbozkurt\Netgsm\Exception\TimeoutException;

class NetgsmException
{
    public static function checkError($data)
    {
        if ($data == '20') {
            throw new MessageException('Hata kodu:20 - Mesaj hatalı veya karakter sınırını geçiyor', 20);
        } elseif ($data=='30') {
            throw new AuthException('Hata kodu:30 s- Api erişimi yok veya kullanıcı adı ve şifre hatalı.', 30);
        } elseif ($data=='40') {
            throw new HeaderException('Hata kodu:40 - Başlık hatalı veya arama kriterlerinize göre listelenecek kayıt bulunamadı.', 40);
        } elseif ($data=='70') {
            throw new ParameterException('Hata kodu:70 - Gönderi parametreleri hatalı', 70);
        } elseif ($data=='100') {
            throw new TimeoutException('Hata kodu:100 - Sistem hatası, sınır aşımı.(dakikada en fazla 5 kez sorgulanabilir.)', 100);
        }
    }
}
