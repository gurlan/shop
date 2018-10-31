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


    <link rel="stylesheet" href="{{asset('wap/static/common/css/common_3534317.css')}}"
    />
    <link rel="stylesheet" href="{{asset('wap/static/lib/swiper/swiper-3.4.2.min_c1e7355.css')}}"
    />
    <link rel="stylesheet" href="{{asset('wap/static/css/index_b531f54.css')}}"
    />
</head>
<body>


<!-- {*
公共头部使用规则：
1、分为一级目录，二级目录，三级目录  根据PAGE_CONFIG.directory 1 2 3来区分
（1）一级目录包括底部导航的 首页 课程 实战 路径 我的共5个栏目，其中除掉‘我的’ 其他四个栏目均有logo 搜索框
（2）二级目录包括banner下方的导航 （除掉与底部导航重复的实战和路径） 猿问和手记共两个栏目  返回键 名称 搜索框 头像
（3）剩下的均为三级目录 返回键 名称 收藏 分享 头像
2、进一步说明
（1）PAGE_CONFIG.directory == 1  判断是否是首页，首页显示logo，无名称，有搜索框；非首页显示logo，名称，有搜索框
（2）PAGE_CONFIG.directory == 2  无特殊判断
（3）PAGE_CONFIG.directory == 3	 其中是否显示分享和收藏图标 由share和collection字段控制
3、总结：当为一级或者二级目录时，才会有搜索框和显示搜索历史记录

*} -->


<header>
    <div class="header clearfix">

        <a href="{{route('wap.index.index')}}" class="logo l">
            <img src="data:image/png;base64,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"/>
        </a>
        <!-- 当显示logo时，同时显示活动入口 -->
        <!-- <a href="//m.imooc.com/act/share" class="share-enter">
            <img src="../static/common/img/share-enter-wap.png"/>
        </a> -->


 {{--       <div id="wap_global_banner" class="adver-con"
             style="display:inline-block;margin-left:0.3rem;margin-top: -0.07rem;height:0.96rem;max-width: 2.13333333rem;min-width: 0.96rem;overflow: hidden;">

        </div>--}}





        <a href="account/login.htm" class="right-box r js-header-avator">
            <i class="imwap-Center"></i>
        </a>


        <i class='imwap-search index-search js-index-search'></i>


        <form class="search-box r clearfix js-search-box  " style=" display: none;"
              action="https://m.imooc.com/search/">
            <div class="l search-input ">
                <input type="text" class="search js-search" name="words" value="" placeholder="请输入搜索关键词">
                <div class="search-action l">
                    <a href="javascript:void(0);" class="imwap-close js-clear" style="display: none;"></a>
                    <button class="imwap-search"></button>
                </div>
            </div>
            <a href="javascript:void(0);" class="r cancel js-cancel">取消</a>
        </form>


    </div>
</header>
