<!doctype html>
<html lang="en">


<head>

    <title>{{$goods->goods_name}}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Cache-Control" content="no-transform "/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="shortcut icon" href="{{asset('wap/static/favicon.ico')}}"/>

    <script type="text/javascript" src="{{asset('wap/static/common/js/flexible.js')}}"></script>
    <script type="text/javascript">
        var userInfo = "";
    </script>

    <link rel="stylesheet" href="{{asset('wap/static/common/css/common_3534317.css')}}"/>
    <link rel="stylesheet" href="{{asset('wap/static/css/learn/index_33d1e84.css')}}"/>
    <link rel="stylesheet" href="{{asset('wap/static/css/learn/chapter_b3b840c.css')}}"/>
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

        <!-- {*非一级目录 有返回键 可能有name字段 可能有搜索框*} -->

        <a class="goback l" href="../course/list.htm" tppabs="https://m.imooc.com/course/list">
            <i class="imwap-arrow_l"></i>

            <span>课程介绍</span>

        </a>


        <a href="../account/login.htm" class="right-box r js-header-avator">
            <i class="imwap-Center"></i>
        </a>


        <a class="header-share r js-share" href="javascript:void(0);">
            <i class="imwap-share"></i>
        </a>


    </div>
</header>