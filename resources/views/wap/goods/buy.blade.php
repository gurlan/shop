<!doctype html>
<html lang="en">


<head>

    <title>慕课网</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="慕课网">
    <meta name="keywords" content="慕课网">
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Cache-Control" content="no-transform "/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <script type="text/javascript" src="{{asset('wap/static/common/js/flexible.js')}}"></script>

    <link rel="stylesheet" href="{{asset('wap/static/common/css/common_3534317.css')}}"/>
    <link rel="stylesheet" href="{{asset('wap/static/css/order/confirmorder_8b26c1d.css')}}"/>
</head>
<body>





<header>
    <div class="header clearfix">

        <!-- {*非一级目录 有返回键 可能有name字段 可能有搜索框*} -->

        <a class="goback l" href="javascript:history.go(-1)">
            <i class="imwap-arrow_l"></i>

            <span>购买课程</span>

        </a>


        <a href="" class="right-box r js-header-avator">
            <i class="imwap-Center"></i>
        </a>


    </div>
</header>


<div id="wrapper">
    <div id="middle" class="container">


        <div id="pages-container">

            <!-- goods list -->
            <div class="goods-box">
                <p class="goods-list-title">商品信息</p>

                <ul class="goods-list">


                    <li class="goods-item clearfix">
                        <div class="img-box l"
                             style="background-image: url('http://szimg.mukewang.com/5bc3f1420001abf206000338-156-88.jpg');"></div>
                        <div class="goods-desc-box l">
                            <p class="course-name">Socket网络编程进阶与实战</p>
                            <p class="course-price">￥348.00</p>
                        </div>
                    </li>


                </ul>

            </div>
            <!-- goods list end -->
            <!-- pay way -->
            <div class="pay-way-box">
                <p class="pay-way-title">支付方式</p>

                <!-- 支付宝支付在APP中苹果手机不能正常使用 暂时隐藏 -->

                <!-- alipay -->
                <div class="pay-way-item alipay-item clearfix js-pay" data-payway="alipay">
                    <div class="pay-way-icon alipay-icon l"></div>
                    <div class="pay-way-text l">支付宝</div>
                    <div class="pay-way-select imwap-radiobutton r on" data-payway="alipay"></div>
                </div>


                <!-- weixin -->
                <div class="pay-way-item weixin-item clearfix js-pay" data-payway="weixin">
                    <div class="pay-way-icon weixin-icon l"></div>
                    <div class="pay-way-text l">微信支付</div>
                    <div class="pay-way-select r imwap-radiobutton_o" data-payway="weixin"></div>
                </div>

                <!-- huabei -->


                <div class="pay-way-item huabei-item clearfix js-pay" data-payway="huabei" data-price="348.00">
                    <div class="pay-way-icon huabei-icon l"></div>
                    <div class="pay-way-text l">花呗分期</div>
                    <div class="pay-way-select imwap-radiobutton_o r" data-payway="huabei"></div>
                    <div class="stage-text r js-stage-text"></div>
                </div>


            </div>
            <!-- pay way end -->
            <a href="javascript:;" class="coupon-box" id="coupon_box" data-goodsids="1203" data-couponid="0">
                <div class="box-left">
                    <span>优惠券</span>
                    <span class="avilable-tip">0张可用</span>
                </div>
                <div class="box-right">
                    <span>-<span class="js-reducemoney">0.00</span></span>
                    <i class="imwap-arrow_r arrow-r"></i>
                </div>
            </a>
            <!-- pay detail -->
            <div class="pay-detail-box">
                <div class="item pay-price-total clearfix">
                    <span class="text l">订单金额</span>
                    <span class="price r">￥348.00</span>
                </div>
                <div class="item pay-price-discount clearfix">
                    <span class="text l">优惠抵扣</span>
                    <span class="price r">-￥0.00</span>
                </div>

            </div>
            <!-- pay detail end -->
            <!-- pay rule -->
            <!-- <div class="pay-rule-box clearfix">
                <span class="l rule-icon imwap-check_circle js-agree-rule on"></span>
                <span class="l">我已经阅读并同意</span>
                <a href="//m.imooc.com/faq/detail?type=3&t=1&id=9" class="pay-rule-link" target="_blank">《用户付费协议》</a>
            </div> -->
            <!-- pay rule end -->

        </div>

        <!-- fix bottom price & sumbit btn -->
        <div class="pay-footer-fixed clearfix">
            <div class="price-box l">实付<b>￥<span class="js-pay-price">348.00</span></b></div>
            <div class="submit-order r js-submit-btn" data-goodsids="1203" data-isweixin="">提交订单</div>
        </div>
        <!-- fix bottom price & sumbit btn end-->

        <div class="js-loading-block loading-block"></div>
        <div class="loading js-loading">
            <div class="loading-img"></div>
            <p>订单提交中</p>
        </div>

        <div class="loading js-loading-stage">
            <div class="loading-img"></div>
            <p>请求中</p>
        </div>


    </div>
</div>

@include('wap.public.foot')