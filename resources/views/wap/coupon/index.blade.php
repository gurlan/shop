<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv=Content-Type content='text/html; charset=utf-8'>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>新人专享大礼包-慕课网</title>
    <meta name="Keywords" content="新人专享大礼包"/>
    <meta name="description" content="新人专享大礼包"/>
    <meta http-equiv="Cache-Control" content="no-transform "/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <script type="text/javascript" src="{{asset('wap/static/common/js/jquery-2.1.0.min_ac9f840.js')}}"></script>

    <script type="text/javascript" src="{{asset('wap/static/common/js/flexible.js')}}"></script>
    <script type="text/javascript" src="{{asset('wap/js/common/moco.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('wap/static/css/act/newcomer/wap_6c0de2f.css')}}"/>
    <link rel="stylesheet" href="{{asset('wap/static/css/act/newcomer/moco.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('wap/static/common/css/common_3534317.css')}}"/>
</head>
<script>
    var isLogin = {{\Illuminate\Support\Facades\Auth::id()}};
    var isApp = false;
</script>
<body>
<div class='header'>
    <div class='clearfix top' >
        <a class='logo' title='慕课网' href='https://www.imooc.com'><img src='' /></a>
        <a href='https://www.imooc.com' class='return clearfix'>返回首页</a>
    </div>


    <div class="share-box-wrap clearfix">
        <a href="javascript:void(0);" class="js-share-btn share-btn imwap-share" title="分享"></a>
    </div>

</div>

<div class="get-btn js-get-btn " data-is_new_user="{{$flag}}">一键领取优惠券</div>

<div class="js-moco-getcoupon" style="display: none;"></div>

<div class="coupon_con">


    <div class='coupon  coupon-1' data-marking='xrzx_5'></div>



    <div class='coupon  coupon-2' data-marking='xrzx_10'></div>



    <div class='coupon  coupon-3' data-marking='xrzx_20'></div>


</div>


<div class='rule'>
    <h2>活动规则详情</h2>
    <div class='box'>
        1、新人礼包仅限从未在慕课网下单的新用户领取，每个用户仅限领取1次；<br>
        2、使用范围：慕课网的全站课程（组合套餐除外），每张面额的优惠券每人限领1张；<br>
        3、领取优惠券成功后，可在“订单中心—我的优惠券”查看。优惠券的使用期限以页面显示为准。请在规定的时间内使用过期将自动作废；<br>
        4、订单金额满足优惠券满减条件的，系统会自动替你选择减免金额最多的一张优惠券，你也可以取消或使用其他优惠券；<br>
        5、若订单未支付，仅提交订单后取消或关闭订单，订单中所使用的优惠券将返还回个人账户；<br>
        6、一张优惠券仅限于单笔订单消费抵用，不可叠加使用。使用后的优惠券不找零，不兑换；<br>
        7、活动时间：即日起至2018年12月31日24:00。
    </div>
</div>
<div class='footer'>Copyright © 2018 imooc.com All Rights Reserved | 京ICP备 13046642号-2</div>
<script type="text/javascript" src="{{asset('wap/static/js/act/wap_newcomer_a91b79f.js')}}"></script>
</body>


</html>