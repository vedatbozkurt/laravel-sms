[![Total Downloads](https://img.shields.io/packagist/dt/vedatbozkurt/sms.svg?style=flat-square)](https://packagist.org/packages/vedatbozkurt/sms)

# Laravel SMS Gateway

Laravel Sms Management Package based on multi sms providers.

## Supported Gateways

[NetGsm](https://www.netgsm.com.tr/dokuman/#api-dokümanı)

## Installation

You can install the package via composer:

```bash
composer require vedatbozkurt/sms
```

Edit .env file:

```bash
SMS_GATEWAY=Netgsm

NETGSM_URL=provider_sms_api_url
NETGSM_USERCODE=your_usercode
NETGSM_PASSWORD=your_password
NETGSM_HEADER=your_header
NETGSM_LANGUAGE=sms_lang
```


## Usage

```php
use Vedatbozkurt\Sms\SmsFacade as Sms;

Route::get('/test-sms', function () {
    $sms = Sms::getHeader();  
    dd($sms);
});

```

#### Available Requests and Response


```php
getPackage();
/* Response (paket bilgisi <BR> ile ayrıştırılmıştır.)
1000 | Adet Flash Sms | <BR>953 | Adet OTP Sms | <BR>643 | Adet | SMS<BR>
*/
```

```php
getHeader();
/*
   850346xxxx<br>MesajBaslik1<br>
*/

```

```php
getBalance();
/*
Hesabınızda bulunan 2.7 TL kredi için servisten dönen yanıt:
 00 2,7
*/

```

```php
sendSms($phoneNumbers=null, $message=null);

// 00 347022009 
// 00: No error
// 347022009: Sms bulk id 
```

```php
getReport($bulkId=null);
 // 53545	0505550000000	0	10	1	01.05.2014 22:24:00	102
    
    /*
    53545 -> GörevID
    0505550000000 -> Cep Telefon
    0 -> Mesaj Durumu
    10 -> Operatör Kodu
    1 -> Mesaj Boyu
    01.05.2014 22:24:00 -> İletim Tarihi
    102 -> Dönen Hata Kodu

    Servisten Dönen Yanıt
        Parametre = durum;
        Kod	Anlamı
        0	İletilmeyi bekleyenler
        1	İletilmiş olanlar
        2	Zaman aşımına uğramış olanlar
        3	Hatalı veya kısıtlı numara
        4	Operatöre gönderilemedi
        11	Operatör tarafından kabul edilmemiş olanlar
        12	Gönderim hatası olanlar
        13	Mükerrer olanlar
        100	Tüm mesaj durumları
        103	Başarısız Görev (Bu görevin tamamı başarısız olmuştur.)

        Parametre = operator;
        Kod	Anlamı
        10	Vodafone
        20	Avea
        30	Turkcell
        40	Netgsm
        50	TTNET Mobil
        60	Türktelekom
        70	Diğer Operatörler

        Hata Kodu Açıklamaları;
        0	Hata Yok
        101	Mesaj Kutusu Dolu
        102	Kapalı yada Kapsama Dışında
        103	Meşgul
        104	Hat Aktif Değil
        105	Hatalı Numara
        106	SMS red, Karaliste
        111	Zaman Aşımı
        112	Mobil Cihaz Sms Gönderimine Kapalı
        113	Mobil Cihaz Desteklemiyor
        114	Yönlendirme Başarısız
        115	Çağrı Yasaklandı
        116	Tanımlanamayan Abone
        117	Yasadışı Abone
        119	Sistemsel Hata
    */

```



## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.


## Security Vulnerabilities

If you would like to report an error, ask a question or offer a suggestion, please e-mail me at [info@wedat.org](info@wedat.org). All security vulnerabilities will be promptly addressed.

## License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).