$(function(){var o=function(){},i=function(){var o=document.location.href.split("backurl=");return o[1]?o[1]:document.referrer||"/"},e=function(){$(".verify-img").attr("src",imoocSSO.verifyCodeUrl+"?t="+(new Date).getTime()),$(".js-input-verify").val("")},t=function(){"none"==$(".js-verify-row").css("display")&&($(".js-verify-row").show(),$(".verify-wrap").append($('<img class="verify-img"/>'))),e()},n={checkName:function(){var o=$(this);/^[0-9]*$/.test(o.val())?o.attr("data-validate","require-mobile-phone"):-1==o.val().indexOf("+")?o.attr("data-validate","require-email"):o.attr("data-validate","")},login:function(){var o=this;if($(".js-error").hide(),!$(this).hasClass("disabled")&&W.validate($(".js-input-name"))&&W.validate($(".js-input-password"))&&W.validate($(".js-input-verify"))){var i={username:$(".js-input-name").val(),password:$(".js-input-password").val(),verify:$(".js-input-verify").val(),pwencode:1};$(this).html("正在登录...").attr("disabled","disabled").addClass("disabled"),imoocSSO.login({data:i,success:function(o){if(o.data={userInfo:""},10001==o.status)return void __fireLogined();if(900001==o.status)return void(window.location.href="http://m.imooc.com/user/userfrozen");if(10005==o.status||10007==o.status||90003==o.status)t();else if(10024==o.status)return void(window.location.href="http://www.imooc.com/user/checkemail");$(".js-error").show().html(o.msg),zhuge.track("登录失败",{"平台":"wap"})},error:function(){$(".js-error").show().html("服务错误，稍后重试"),zhuge.track("登录失败",{"平台":"wap"})},complete:function(){$(o).html("登录").removeAttr("disabled").removeClass("disabled")}})}}},a=function(){function o(){for(var o in e)o.indexOf("/user")>-1&&(e[o].close&&e[o].close(),e[o]=null,delete e[o])}var e={};return{open:function(t){var n,a;return e[t]&&e[t].closed===!1?void(e[t].focus&&e[t].focus()):(o(),n=(screen.width-600)/2,a=(screen.height-400)/2,void(e[t]=window.open(t+"&referer="+window.location.protocol+"//"+window.location.hostname+"&backurl="+encodeURIComponent(i()),"toolbar=no, directories=no, status=no, menubar=no, width=600, height=500, top="+a+", left="+n)).focus())},clear:o}}(),r=function(){window.__fireLogined=function(){var o=i();window.location.replace(o)},navigator.userAgent.indexOf("MicroMessenger")>-1?($(".js-login-wx").show(),$("a[data-login-sns]").off("click").each(function(){$(this).attr("href",$(this).attr("data-login-sns")+"&referer="+window.location.protocol+"//"+window.location.hostname+"&backurl="+encodeURIComponent(i()))})):navigator.userAgent.indexOf("SQ")>-1?($(".js-login-qq").show(),$(".js-login-qq-s").hide(),$("a[data-login-sns]").off("click").each(function(){$(this).attr("href",$(this).attr("data-login-sns")+"&referer="+window.location.protocol+"//"+window.location.hostname+"&backurl="+encodeURIComponent(i()))})):$("a[data-login-sns]").click(function(){a.open($(this).attr("data-login-sns"))}),$(".js-showpw").on("click",function(){var o=$(this).prev("input");"password"==o.attr("type")?(o.attr("type","text"),$(this).removeClass("imwap-visibility_off")):(o.attr("type","password"),$(this).addClass("imwap-visibility_off"))}),$(".js-input-name").on("keyup",function(){n.checkName.call(this)}),$(".js-btn-login").on("click",n.login),$(".account-form").on("click",".verify-img",e),$(".js-register").on("click",function(){window.location.href="http://m.imooc.com/static/wap/static/js/account/register?backurl="+i()}),$(document).on("click",".js-modal-close",function(){$(".js-warn").remove(),o()})},s=function(){imoocSSO.preLogin({error:function(){setTimeout(imoocSSO.preLogin,2e3)}}),r(),$.dialog=function(i,e){i=i.replace("//www.imooc.com/help/detail/81","//m.imooc.com/newfaq?id=101"),i=i.replace("//www.imooc.com/help/detail/101","//m.imooc.com/newfaq?id=101");var t='<div class="warn-overlay js-warn"><div class="warn-title"><i class="imwap-close"></i></div><div class="warn-wrap">'+i+"</div></div>";$(document.body).append(t),$(".js-btn-login").html("登录").removeAttr("disabled").removeClass("disabled"),o=e.callback||function(){}}};s()});