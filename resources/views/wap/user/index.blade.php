<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <title>慕课网</title>
    <meta name="Description"
          content="慕课网（IMOOC）是国内最大的IT技能学习平台。慕课网提供了丰富的移动端开发、php开发、web前端、android开发以及html5等视频教程资源公开课。并且富有交互性及趣味性，你还可以和朋友一起编程。">

    <link type="text/css" rel="stylesheet" media="all" href="{{asset('m/fonts/style.css')}}"/>
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('m/css/amazeui.touch.min.css')}}"/>
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('m/css/share.css')}}"/>

    <script type="text/javascript">

        var shuping = 'onorientationchange' in window ? 'orientationchange' : 'resize';
        var isAndorid = /(Android)/i.test(navigator.userAgent);
        var timer = null;

        //设置字体

        function setFontSize() {
            var w = window.innerWidth;
            document.documentElement.style.fontSize = 40 * w / 750 + 'px';
        }

        setFontSize();

        //手机横竖屏时 改变大小，Andorid手机切换有延迟 故开定时器
        window.addEventListener(shuping, function () {
            clearTimeout(timer);
            timer = setTimeout(setFontSize, isAndorid ? 300 : 0);
        }, false);

    </script>

    <link type="text/css" rel="stylesheet" media="all" href="{{asset('m/less/user/usercenter.css')}}"/>

</head>

<body id="body" class=" wap ">
<script type="text/javascript" src="{{asset('m/lib/zepto/zepto.js')}}"></script>

<script type="text/javascript">

    function getCookie(c_name) {
        if (document.cookie.length > 0) {
            c_start = document.cookie.indexOf(c_name + "=")
            if (c_start != -1) {
                c_start = c_start + c_name.length + 1
                c_end = document.cookie.indexOf(";", c_start)
                if (c_end == -1) c_end = document.cookie.length
                return unescape(document.cookie.substring(c_start, c_end))
            }
        }
        return ""
    }

    function setCookie(c_name, value, expiredays) {
        var exdate = new Date()
        exdate.setDate(exdate.getDate() + expiredays)
        document.cookie = c_name + "=" + escape(value) +
            ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString())
    }
</script>
<div id="headers" style="background:red">
    <header data-reactroot="">
        <div class="newheader"><a href="//m.imooc.com/" class="logo l"><img
                        src="http://m.imooc.com/static/wap/static/common/img/logo.png"></a><span
                    class="js-header-name header-name l">个人中心</span><a href="/m/web/user/usercenter.html"
                                                                       class="right-box r js-header-avator"><img
                        src="//img2.mukewang.com/images/unknow-160.png"></a></div>
    </header>
</div>

<div class="pages">
    <div class="box">
        <img class="userheard" src=//img2.mukewang.com/images/unknow-160.png/>
        <div class="info">
            <p>HOPE丶0</p>
            <p class="gray">学习时长 19小时55分 | 经验 2119</p>
        </div>
    </div>
    <div class="group">
        <a href="https://m.imooc.com/u/courses">
            <div><i class="imwap-I-of-course"></i>
                <p>我的课程</p>
            </div>
        </a>
        <a href="https://m.imooc.com/u/szcourses">
            <div><i class="imwap-I-practice"></i>
                <p>我的实战</p>
            </div>
        </a>
        <a href="/m/web/wenda/wendaListmine.html?uid=6443341">
            <div><i class="imwap-my-question"></i>
                <p>我的猿问</p>
            </div>
        </a>
        <a href="/m/web/article/mineArticles.html?uid=6443341">
            <div><i class="imwap-My-article"></i>
                <p>我的手记</p>
            </div>
        </a>
    </div>

    <div class="list">
        <a href="https://m.imooc.com/myorder">
            <div class="box2">
                <i class="imwap-My-article"></i>我的订单
            </div>
        </a>
        <a href="//m.imooc.com/ucenter/collector">
            <div class="box2">
                <i class="imwap-album"></i>我的专栏
            </div>
        </a>
        <a href="//m.imooc.com/coupon/mycoupon">
            <div class="box2">
                <i class="imwap-uniE940"></i>优惠券
            </div>
        </a>
        <a href="https://m.imooc.com/newfaq">
            <div class="box2">
                <i class="imwap-help"></i>帮助中心
            </div>
        </a>
        <a href="https://m.imooc.com/feedback">
            <div class="box2">
                <i class="imwap-feedback"></i>意见反馈
            </div>
        </a>
    </div>
    <a class="btnlogout" href="{{route('wap.account.logout')}}">退出登录</a>

</div>


<div id="footer"></div>



@include('wap.user.foot')