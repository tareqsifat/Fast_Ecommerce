<?php

namespace App;

class SendCode
{
    public static function sendCode($phone)
    {
        $code = rand(1111, 9999);
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to' => '+8801884717641',
            'from' => 'first deals',
            'text' => 'Verify code: ' . $code ,
        ]);
        return $code;
    }
}
