<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send()
    {
        Mail::raw('你好，我是PHP程序！', function ($message) {
            $to = '136911578@qq.com';
            $message ->to($to)->subject('纯文本信息邮件测试');
        });
    }



}