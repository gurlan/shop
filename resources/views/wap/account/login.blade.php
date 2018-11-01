<!doctype html>
<html lang="en">


<head>

    <title>慕课网-程序员的梦工厂</title>

    <meta charset=utf-8"utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="慕课网（IMOOC）是IT技能学习平台。慕课网(IMOOC)提供了丰富的移动端开发、php开发、web前端、android开发以及html5等视频教程资源公开课。并且富有交互性及趣味性，你还可以和朋友一起编程。">
    <meta name="keywords" content="慕课网">
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Cache-Control" content="no-transform "/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="shortcut icon" href="{{asset('wap/static/favicon.ico')}}"/>

    <script type="text/javascript" src="{{asset('wap/static/common/js/flexible.js')}}"
    ></script>
    <script type="text/javascript">
        var userInfo = "";
    </script>


    <link rel="stylesheet" href="{{asset('wap/static/common/css/common_3534317.css')}}"/>

    <link rel="stylesheet" href="{{asset('wap/static/css/account/main.css')}}"/>
</head>
<body>


<div id="wrapper">
    <div id="middle" class="container">


        <div class="logo"></div>
        <div class="account-form">
            <div class="account-form-group">
                <div class="account-form-areacode js-code-btn">+<span>86</span><i class="imwap-arrow_d"></i></div>
                <input type="tel" class="account-form-control account-form-phone js-input-name" onpaste="return false"
                       data-callback="checkusername" placeholder="手机号">
                <div class="account-form-tip errorHint"></div>
            </div>
            <div class="account-form-group">
                <input type="text" maxlength="4" class="account-form-control verify js-phone-verify" data-maxlength="4"
                       data-minlength="4" placeholder="请输入手机验证码">
                <div class="account-form-send js-btn-send">
                    <a href="javascript:void(0)" class="btn-send-verify js-btn-next disabled">获取验证码</a>
                </div>
                <div class="account-form-tip errorHint" data-error-hint="请输入正确验证码"></div>
            </div>
            <p class="account-form-intro">注册即同意《慕课网注册协议》</p>
            <div class="account-form-group button-row">
                <div class="account-form-tip js-error"></div>
                <a href="javascript:void(0)" class="account-form-btn js-btn-submit">登录</a>
            </div>
            <div class="account-form-group button-row login-wx js-login-wx">
                <a href="javascript:void(0)" class="account-form-btn"
                   data-login-sns="//m.imooc.com/passport/user/tplogin?tp=weixinapp">微信登录</a>
            </div>
            <div class="account-form-group button-row login-wx js-login-qq">
                <a href="javascript:void(0)" class="account-form-btn"
                   data-login-sns="//m.imooc.com/passport/user/tplogin?tp=qq">QQ登录</a>
            </div>
            <div class="mask-view js-verify-mask"></div>
            <div class="verify-box">
                <div class="account-form-group">
                    <div class="verify-img-wrap"></div>
                    <input type="text" maxlength="4" class="account-form-control verify js-verify" data-maxlength="4"
                           data-minlength="4" placeholder="请输入图片验证码">
                    <div class="account-form-tip errorHint" data-error-hint="请输入正确验证码"></div>
                    <a href="javascript:void(0)" class="account-form-btn js-btn-verify">提交</a>
                </div>

            </div>
            <div class="account-phone-login"><a href="otherlogin.htm" tppabs="https://m.imooc.com/account/otherlogin">账号密码登录</a>
            </div>
        </div>
        <div class="areacode-box js-code-box">
            <div class="areacode-box-hd">
                <a href="javascript:void(0)" class="js-code-close"><i class="imwap-arrow_l"></i></a>选择国家和地区
            </div>
            <div class="areacode-box-bd">
                <div class="areacode-list js-code-list">

                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="{{asset('wap/static/common/js/jquery-2.1.0.min_ac9f840.js')}}" ></script>

<script type="text/javascript" src="{{asset('wap/static/js/account/register_dfa0107.js')}}" ></script>

@include('wap.public.foot')