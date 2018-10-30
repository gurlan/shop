<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <script src="/console/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <!--[if IE]>
    <script src="js/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="logo_box">
                <h3>欢迎你</h3>
                <form action="{{route('admin.doLogin')}}" id="form" method="post">
                    @csrf
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户" name="username" value="{{ old('username') }}">
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;" type="password" name="password" placeholder="请输入密码">
                    </div>

                    <div class="mb2"><a class="act-but submit" href="javascript:;" style="color: #FFFFFF">登录</a></div>
                    <div>
                        <p>{{$errors->all()[0]}}</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->
<script>
    $('.submit').click(function(){
        $('#form').submit();
    })
</script>
<script src="js/TweenLite.min.js"></script>
<script src="js/EasePack.min.js"></script>
<script src="js/rAF.js"></script>
<script src="js/demo-1.js"></script>
<div style="text-align:center;">


</div>
</body>
</html>

