<?php
/*
 * @Author: @vedatbozkurt
 * @Email: info@wedat.org
 * @Date: 2020-12-10 19:19:14
 * @LastEditors: @vedatbozkurt
 * @LastEditTime: 2020-12-11 20:52:41
 */

/*
 * You can place your custom package configuration in here.
 */
return [
    "driver"=>env('SMS_GATEWAY', 'Netgsm'),
    "url"=>env('NETGSM_URL', null),
    "usercode"=>env('NETGSM_USERCODE', null),
    "password"=>env('NETGSM_PASSWORD', null),
    "header"=>env('NETGSM_HEADER', null),
    "language"=>env('NETGSM_LANGUAGE', null),
];
