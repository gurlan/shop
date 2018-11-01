<?php

$routeAttr = config('laravel-sms.route', []);
unset($routeAttr['enable']);

$attributes = array_merge([
    'prefix' => 'laravel-sms',
], $routeAttr);

Route::group($attributes, function () {
    Route::get('info', 'Toplan\Sms\SmsController@getInfo');
    Route::get('verify-code', 'Toplan\Sms\SmsController@postSendCode');
    Route::get('voice-verify', 'Toplan\Sms\SmsController@postVoiceVerify');
});
