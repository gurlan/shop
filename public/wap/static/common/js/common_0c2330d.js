function launchAPP(e,a){var s,i="mukewang://"+(e||"https://m.imooc.com/static/wap/static/common/js/www.imooc.com"),o="";if(isPhone())o=applink[0],window.location.href=i;else{o=applink[1];var r=document.createElement("iframe");r.style.display="none";var t=function(){r&&(clearTimeout(s),ifr.onload=null,r.parentNode.removeChild(r),r=null)};r.onload=t,r.src=i,document.body.appendChild(r)}var n=Date.now();s=setTimeout(function(){var e=Date.now();e-n>500||(console.log(a),$(a).attr("href",o),$(a).click(),isPhone()&&(window.location.href=o))},480)}function isWeChat(){var e=navigator.userAgent.toLowerCase();return"micromessenger"==e.match(/MicroMessenger/i)?!0:!1}function isPhone(){for(var e=navigator.userAgent,a=["iPhone","ipad"],s=!1,i=0;i<a.length;i++)if(e.indexOf(a[i])>-1){s=!0;break}return s}var nativeShare=function(){var e='<div class="share-box js-share-box">      <ul>        <li>          <a href="javascript:void(0)" class="js-share-qq js-share-cancel">            <i class="imwap-qq_o"></i><span>QQ空间</span>          </a>        </li>        <li>          <a href="javascript:void(0)" class="js-share-weibo js-share-cancel">            <i class="imwap-weibo_o"></i><span>微博</span>          </a>        </li>      </ul>      <a href="javascript:void(0)" class="btn-share-cancel js-share-cancel">取消</a>    </div>    <div class="mask-view js-share-mask"></div>',a='<div class="share-box share-box-wx js-share-box">      <ul>        <li>          <a data-app="QZone"  href="javascript:void(0)" class="js-share-qq js-share-cancel">            <i class="imwap-qq_o"></i><span>QQ空间</span>          </a>        </li>        <li class="share-wechat">          <a data-app="weixin" href="javascript:void(0)" class="js-share-wechat js-share-cancel">            <i class="imwap-wechat_o"></i><span>微信</span>          </a>        </li>        <li class="share-friends">          <a data-app="weixinFriend" href="javascript:void(0)" class="js-share-friends js-share-cancel">            <i class="imwap-friends"></i><span>朋友圈</span>          </a>        </li>        <li>          <a href="javascript:void(0)"  data-app="sinaWeibo" class="js-share-weibo js-share-cancel">            <i class="imwap-weibo_o"></i><span>微博</span>          </a>        </li>      </ul>      <a href="javascript:void(0)" class="btn-share-cancel js-share-cancel">取消</a>    </div>    <div class="mask-view js-share-mask"></div>',s={lower:"../../../../../../3gimg.qq.com/html5/js/qb.js"/*tpa=http://3gimg.qq.com/html5/js/qb.js*/,higher:"http://jsapi.qq.com/get?api=app.share"},i={qq:{forbid:0,lower:1,higher:2},uc:{forbid:0,allow:1}},o=navigator.appVersion,r=o.split("MQQBrowser/").length>1?i.qq.higher:i.qq.forbid,t=o.split("UCBrowser/").length>1?i.uc.allow:i.uc.forbid,n={uc:"",qq:""},c=!1;this.ucAppList={sinaWeibo:["kSinaWeibo","SinaWeibo",11,"新浪微博"],weixin:["kWeixin","WechatFriends",1,"微信好友"],weixinFriend:["kWeixinFriend","WechatTimeline","8","微信朋友圈"],QQ:["kQQ","QQ","4","QQ好友"],QZone:["kQZone","QZone","3","QQ空间"]},this.encode=function(e){return e=e.replace(/&/g,"%26"),e=e.replace(/=/g,"%3D"),e=e.replace(/\?/g,"%3F")},this.share=function(e){var a=this.encode(shareData.title),s=this.encode(shareData.url),o=this.encode(shareData.desc),n=shareData.url,h=shareData.imgUrl;if(-1==e.indexOf("weixin")&&shareData.otherImgUrl&&(h=shareData.otherImgUrl),t)e=""==e?"":"iPhone"==platform_os?this.ucAppList[e][0]:this.ucAppList[e][1],"QZone"==e&&(B="mqqapi://share/to_qzone?src_type=web&version=1&file_type=news&req_type=1&image_url="+h+"&title="+a+"&description="+o+"&url="+s+"&app_name="+n,k=document.createElement("div"),k.style.visibility="hidden",k.innerHTML='<iframe src="'+B+'" scrolling="no" width="1" height="1"></iframe>',document.body.appendChild(k),setTimeout(function(){k&&k.parentNode&&k.parentNode.removeChild(k)},5e3)),"undefined"!=typeof ucweb?ucweb.startRequest("shell.page_share",[a,a,n,e,"","@"+n,""]):"undefined"!=typeof ucbrowser&&ucbrowser.web_share(a,a,n,e,"","@"+n,"");else if(r&&!c){e=""==e?"":this.ucAppList[e][2];var l={url:s,title:a,description:o,img_url:h,to_app:e,cus_txt:"请输入想要分享的内容"};l=""==e?"":l,"undefined"!=typeof browser?"undefined"!=typeof browser.app&&r==i.qq.higher&&browser.app.share(l):"undefined"!=typeof window.qb&&r==i.qq.lower&&window.qb.share(l)}},this.isloadqqApi=function(){if(r){var e=n.qq<5.4?s.lower:s.higher,a=document.createElement("script"),i=document.getElementsByTagName("body")[0];a.setAttribute("src",e),i.appendChild(a)}},this.getPlantform=function(){return ua=navigator.userAgent,ua.indexOf("iPhone")>-1||ua.indexOf("iPod")>-1?"iPhone":"Android"},this.is_weixin=function(){var e=o.toLowerCase();return"micromessenger"==e.match(/MicroMessenger/i)?!0:!1},this.getVersion=function(e){var a=e.split("."),s=parseFloat(a[0]+"."+a[1]);return s},this.init=function(){platform_os=this.getPlantform(),n.qq=r?this.getVersion(o.split("MQQBrowser/")[1]):0,n.uc=t?this.getVersion(o.split("UCBrowser/")[1]):0,c=this.is_weixin(),r&&n.qq<5.4&&"iPhone"==platform_os||r&&n.qq<5.3&&"Android"==platform_os?r=i.qq.forbid:r&&n.qq<5.4&&"Android"==platform_os?r=i.qq.lower:t&&(n.uc<10.2&&"iPhone"==platform_os||n.uc<9.7&&"Android"==platform_os)&&(t=i.uc.forbid);var s=this;if(r||t)this.isloadqqApi(),$(document.body).append(a),$(".js-share-box a").on("click",function(){s.share($(this).data("app"))});else{var h=shareData.otherImgUrl||shareData.imgUrl;$(document.body).append(e).on("click",".js-share-qq",function(){var e="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url="+encodeURIComponent(shareData.url)+"&title="+encodeURIComponent(shareData.title)+"&desc="+encodeURIComponent(shareData.desc)+"&summary=&site=&pics="+h;window.open(e)}).on("click",".js-share-weibo",function(){var e="http://service.weibo.com/share/share.php?url="+shareData.url+"&title="+shareData.title+"&appkey=2254855082&pic="+h+"&searchPic=true";window.open(e)})}},this.init()},urlParse=function(e){var a=[],s={};if(-1!=e.indexOf("?")){var i=e.split("?")[1];if(-1!=i.indexOf("&")){a=i.split("&");for(var o=0;o<a.length;o++)s[a[o].split("=")[0]]=a[o].split("=")[1]}else s[i.split("=")[0]]=i.split("=")[1]}return s},applink=["https://itunes.apple.com/cn/app/mu-ke-wang/id722179140?mt=8","http://www.imooc.com/mobile/mukewang.apk"];$(function(){function e(){if($(".js-search-record").is(":hidden")){var e=window.location.href;if(o("page",e),$(".header").addClass("focus"),$("header").addClass("searching"),$(".adver-con").hide(),$(".js-search-record").show(),$("#wrapper").hide(),_hmt&&_hmt.push){var a=document.location.hostname;switch(a){case"https://m.imooc.com/static/wap/static/common/js/m.imooc.com":a="首页";break;case"https://m.imooc.com/static/wap/static/common/js/class.m.imooc.com":a="路径首页"}_hmt.push(["_trackEvent","搜索框","click",a+"搜索框点击次数"])}}}function a(){$(".js-search-record").hide(),$(".adver-con").show(),$(".js-index-search")[0]&&($(".js-search-box").hide(),$(".js-index-search").show())}var s="../../../../../index.htm"/*tpa=https://m.imooc.com/*/;userInfo&&$(".js-header-avator").size()>0&&$.ajax({url:s+"/api/user/userInfo",dataType:"json",type:"get",xhrFields:{withCredentials:"true"},success:function(e){if(200==e.code){var a='<img src="'+e.data[0].pic+'" />';$(".js-header-avator").html(a),$(".js-nickname").size()>0&&$(".js-nickname").html("hi，"+e.data[0].nickname)}},error:function(){console.log("发生错误，请稍后尝试！")}}),$("header").hasClass("opacity")&&$(document).on("scroll",function(){$(document.body).scrollTop()>0?$("header").removeClass("opacity"):$("header").addClass("opacity")}),1==sessionStorage.getItem("footer-appload-hide")?($(".js-footer-appload").hide(),$("#bargain_enter").css("bottom",0)):$(".js-footer-appload").show(),$(document).on("click",".js-share",function(){if(window.isApp&&window.nativeSupport&&"function"==typeof window.nativeSupport.share){var e=shareData.otherImgUrl||shareData.imgUrl;window.nativeSupport.share(shareData.title,shareData.desc,e,shareData.url)}else $(".js-share-box").length?($(".js-share-box").show(),$(".js-share-mask").show()):nativeShare()}).on("click",".js-share-cancel",function(){$(".js-share-box").hide(),$(".js-share-mask").hide()}).on("click",".js-share-mask",function(){$(".js-share-box").hide(),$(".js-share-mask").hide()});var i=function(e){if(e.stopPropagation(),isWeChat())alert("请在浏览器中打开~");else{var a="",s=window.location.hostname;a=-1!=s.indexOf("class")?"class.imooc.com/sc/"+urlParse(window.location.href).cid:"https://m.imooc.com/static/wap/static/common/js/www.imooc.com",a&&launchAPP(a,this)}};$("#js-appload-footer").on("click",i),$("#js-appload").on("click",i);var o=function(e,a){document.cookie=e+"="+a+";path=/;domain=imooc.com"};if($(".js-search").on("input propertychange",function(){$(this).val().length>0?$(".js-clear").show():$(".js-clear").hide()}),$(".js-clear").on("click",function(e){e.stopPropagation(),$(".js-search").val(""),$(".js-search").focus(),$(this).hide()}),$(".js-footer-appload-close").on("click",function(){$(".js-footer-appload").hide(),$("#bargain_enter").css("bottom",0),sessionStorage.setItem("footer-appload-hide","1")}),$(".js-index-search").on("click",function(){$(this).hide(),console.log($(".js-search-box")[0]),$(".js-search-box").css("display","block"),e()}),$(".js-search").on("focus",function(){$(this).val().length>0?$(".js-clear").show():$(".js-clear").hide(),e()}),$(".js-search").on("click",function(e){e.stopPropagation()}),$(document).on("click",function(){$(".js-clear").hide()}),$(".js-search-box").size()>0&&$(".js-search-record").size()>0&&($(".js-cancel").on("click",function(){$(".header").removeClass("focus"),$("header").removeClass("searching"),$("#wrapper").show(),a()}),$.ajax({url:s+"/api/search/searchword",type:"get",dataType:"json",xhrFields:{withCredentials:"true"},success:function(e){if(1e3==e.errorCode){if(e.data.history.length>0){for(var a='<div class="search-history-box">                                        <p class="search-tit">搜索历史</p>                                        <dl class="clearfix">',i=0;i<e.data.history.length;i++)a+='<dd><a href="'+s+"/search/?words="+e.data.history[i].word+'">'+e.data.history[i].word+"</a></dd>";a+="</dl></div>",$(".js-search-record").append(a)}if(e.data.hotword.length>0){for(var o='<div class="search-hot-box">                                    <p class="search-tit">热门搜索</p>                                    <dl class="clearfix">',i=0;i<e.data.hotword.length;i++)o+='<dd><a href="'+s+"/search/?words="+e.data.hotword[i].name+'">'+e.data.hotword[i].name+"</a></dd>";o+="</dl></div>",$(".js-search-record").append(o)}$(".js-search-record").append('<a href="https://www.imooc.com/course/list" class="check-type-btn">查看课程分类</a>')}}})),userInfo){var r=s+"/api/user/ajaxusercheck?uid="+userInfo.uid;$.ajax({url:r,type:"get",dataType:"json",xhrFields:{withCredentials:"true"},success:function(e){0==e.result&&(alert(e.msg),window.location.href="../../../../../passport/user/logout-referer=https---m.imooc.com.htm"/*tpa=https://m.imooc.com/passport/user/logout?referer=https://m.imooc.com*/)}})}$(".js-b-close").click(function(){$("#bargain_enter").remove()})}),$(function(){isWeChat()&&($("#js-appload").remove(),$(".js-footer-appload").remove())});