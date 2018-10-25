<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="js/jquery.js"></script>
<script src="layer/layer.js"></script>
<script src="js/verificationNumbers.js"></script>
<script src="js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });

});
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
    <form action="{{route('admin.doLogin')}}" method="post">
        @csrf
        <dd class="user_icon">
            <input type="text" placeholder="账号" value="{{ old('username') }}" name="username" class="login_txtbx"/>
        </dd>

        <dd class="pwd_icon">
            <input type="password" placeholder="密码" name="password" class="login_txtbx"/>
        </dd>
        <dd class="val_icon">
            <div class="checkcode">
                <input type="text" id="J_codetext" placeholder="验证码" maxlength="5" name="captcha" class="login_txtbx">
{{--
                <canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
--}}
                <img src="{{captcha_src()}}" style="cursor: pointer;position: absolute;margin-left: 53px" onclick="this.src='{{captcha_src()}}'+Math.random()">
            </div>
        </dd>

        <dd>
            <input type="submit" value="立即登录" class="submit_btn"/>
        </dd>
        <dd>
            <p>{{$errors->all()[0]}}</p>
        </dd>
    </form>




 <dd>
  <p>© 2015-2016 DeathGhost 版权所有</p>
  <p>陕B2-20080224-1</p>
 </dd>
</dl>
</body>
</html>
