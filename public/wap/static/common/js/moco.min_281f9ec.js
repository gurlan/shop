function Boxy(e,t){this.WRAPPER='<div class="moco-modal-layer" >                    <div class="moco-modal-title"></div>                    <div class="moco-modal-inner"></div>            </div>',this.DEFAULTS={title:null,closeable:!0,draggable:!0,clone:!1,actuator:null,center:!0,show:!0,modal:!1,fixed:!0,unloadOnHide:!1,clickToFront:!1,behaviours:function(){},afterDrop:function(){},afterShow:function(){},afterHide:function(){},beforeUnload:function(){}},this.DEFAULT_X=50,this.DEFAULT_Y=50,this.boxy=$(this.WRAPPER),$.data(this.boxy[0],"boxy",this),this.visible=!1,this.options=$.extend({},this.DEFAULTS,t||{}),this.options.modal&&(this.options=$.extend(this.options,{center:!0,draggable:!1})),this.options.actuator&&$.data(this.options.actuator,"https://m.imooc.com/static/wap/static/common/js/active.boxy",this),this.setContent(e||"<div></div>"),this._setupTitleBar(),this.boxy.css("display","none").appendTo(document.body),this.toTop(),this.options.fixed&&(Boxy.browser.msie&&Boxy.browser.version<7?this.options.fixed=!1:this.boxy.addClass("fixed")),this.options.center&&Boxy._u(this.options.x,this.options.y)?this.center():this.moveTo(Boxy._u(this.options.x)?this.options.x:this.DEFAULT_X,Boxy._u(this.options.y)?this.options.y:this.DEFAULT_Y),this.options.show&&this.show()}Boxy.zIndex=900,Boxy.dragConfigured=!1,Boxy.resizeConfigured=!1,Boxy.dragging=null,Boxy.browser={mozilla:/firefox/.test(navigator.userAgent.toLowerCase()),webkit:/webkit/.test(navigator.userAgent.toLowerCase()),opera:/opera/.test(navigator.userAgent.toLowerCase()),msie:/msie/.test(navigator.userAgent.toLowerCase())},Boxy.isModalVisible=function(){return $(".moco-modal-blackout").length>0},Boxy._u=function(){for(var e=0;e<arguments.length;e++)if("undefined"!=typeof arguments[e])return!1;return!0},Boxy._handleResize=function(){var e=$(document);$(".moco-modal-blackout").css("display","none").css({width:e.width(),height:e.height()}).css("display","block")},Boxy._handleDrag=function(e){var t;if(t=Boxy.dragging){var i=$(window).width()-t[0].boxy.width(),o=$(window).height()-t[0].boxy.height(),r=e.pageX-t[1],n=e.pageY-t[2];0>=r&&(r=0),0>=n&&(n=0),r>=i&&(r=i),n>=o&&(n=o),t[0].boxy.stop().animate({left:r+"px",top:n+"px"},10)}},Boxy._nextZ=function(){return Boxy.zIndex++},Boxy._viewport=function(){var e=document.documentElement,t=document.body,i=window;return $.extend(Boxy.browser.msie?{left:t.scrollLeft||e.scrollLeft,top:t.scrollTop||e.scrollTop}:{left:i.pageXOffset,top:i.pageYOffset},Boxy._u(i.innerWidth)?Boxy._u(e)||Boxy._u(e.clientWidth)||0==e.clientWidth?{width:t.clientWidth,height:t.clientHeight}:{width:e.clientWidth,height:e.clientHeight}:{width:i.innerWidth,height:i.innerHeight})},Boxy.prototype={estimateSize:function(){this.boxy.css({visibility:"hidden",display:"block"});var e=this.getSize();return this.boxy.css("display","none").css("visibility","visible"),e},getSize:function(){return[this.boxy.width(),this.boxy.height()]},getContentSize:function(){var e=this.getContent();return[e.width(),e.height()]},getPosition:function(){var e=this.boxy[0];return[e.offsetLeft,e.offsetTop]},getCenter:function(){var e=this.getPosition(),t=this.getSize();return[Math.floor(e[0]+t[0]/2),Math.floor(e[1]+t[1]/2)]},getInner:function(){return $(".moco-modal-inner",this.boxy)},getTInner:function(){return $(".moco-modal-title",this.boxy)},getContent:function(){return this.boxy},setContent:function(e){return e=$(e).css({display:"block"}),this.options.clone&&(e=e.clone(!0)),this.getInner().append(e),this._setupDefaultBehaviours(e),this.options.behaviours.call(this,e),this},moveTo:function(e,t){return this.moveToX(e).moveToY(t),this},moveToX:function(e){return"number"==typeof e?this.boxy.css({left:e}):this.centerX(),this},moveToY:function(e){return"number"==typeof e?this.boxy.css({top:e}):this.centerY(),this},centerAt:function(e,t){var i=this[this.visible?"getSize":"estimateSize"]();return"number"==typeof e&&this.moveToX(e-i[0]/2),"number"==typeof t&&this.moveToY(t-i[1]/2),this},centerAtX:function(e){return this.centerAt(e,null)},centerAtY:function(e){return this.centerAt(null,e)},center:function(e){var t=Boxy._viewport(),i=this.options.fixed?[0,0]:[t.left,t.top];return e&&"x"!=e||this.centerAt(i[0]+t.width/2,null),e&&"y"!=e||this.centerAt(null,i[1]+t.height/2),this},centerX:function(){return this.center("x")},centerY:function(){return this.center("y")},resize:function(e){if(this.visible){e=e||{};var t=e.width||this.boxy.width(),i=e.height||this.boxy.height(),o=this._getBoundsForResize(t,i);return this.boxy.css({left:o[0],top:o[1]}),this.getContent().css({width:o[2],height:o[3]}),e.after&&e.after(this),this}},tween:function(e,t,i){if(this.visible){var o=this._getBoundsForResize(e,t),r=this;return this.boxy.stop().animate({left:o[0],top:o[1]}),this.getContent().stop().animate({width:o[2],height:o[3]},function(){i&&i(r)}),this}},isVisible:function(){return this.visible},show:function(){if(!this.visible){if(this.options.modal){var e=this;Boxy.resizeConfigured||(Boxy.resizeConfigured=!0,$(window).resize(function(){Boxy._handleResize()})),this.modalBlackout=$('<div class="moco-modal-blackout js-moco-modal-cancel"></div>').css({zIndex:Boxy._nextZ(),opacity:.7,width:$(document).width(),height:$(document).height()}).appendTo(document.body),this.toTop(),this.options.closeable&&$(document.body).bind("https://m.imooc.com/static/wap/static/common/js/keypress.boxy",function(t){var i=t.which||t.keyCode;27==i&&(e.hide(),$(document.body).unbind("https://m.imooc.com/static/wap/static/common/js/keypress.boxy"))})}return this.boxy.stop().css({opacity:1}).show(),this.visible=!0,this._fire("afterShow"),this}},hide:function(e){if(this.visible){var t=this;return this.options.modal&&($(document.body).unbind("https://m.imooc.com/static/wap/static/common/js/keypress.boxy"),this.modalBlackout.animate({opacity:0},function(){$(this).remove()})),this.boxy.stop().animate({opacity:0},300,function(){t.boxy.css({display:"none"}),t.visible=!1,$(t.boxy).remove(),t._fire("afterHide"),e&&e(t),t.options.unloadOnHide&&t.unload()}),t.options.closeCallback&&t.options.closeCallback(),this}},toggle:function(){return this[this.visible?"hide":"show"](),this},hideAndUnload:function(e){return this.options.unloadOnHide=!0,this.hide(e),this},unload:function(){this._fire("beforeUnload"),this.boxy.remove(),this.options.actuator&&$.data(this.options.actuator,"https://m.imooc.com/static/wap/static/common/js/active.boxy",!1)},toTop:function(){return this.boxy.css({zIndex:Boxy._nextZ()}),this},getTitle:function(){return $("> .moco-modal-title span",this.getInner()).html()},setTitle:function(e){return $("> .moco-modal-title span",this.getTInner()).html(e),this},_getBoundsForResize:function(e,t){var i=this.getContentSize(),o=[e-i[0],t-i[1]],r=this.getPosition();return[Math.max(r[0]-o[0]/2,0),Math.max(r[1]-o[1]/2,0),e,t]},_setupTitleBar:function(){if(this.options.title){var e=this,t=$("<div></div>").html("<span>"+this.options.title+"</span>");this.options.closeable&&t.append($("<a href='javascript:void(0)' class='moco-icon-close moco-modal-close js-modal-close'></a>").html(this.options.closeText)),this.options.draggable&&(t.addClass("moco-modal-draggable"),t[0].onselectstart=function(){return!1},t[0].unselectable="on",t[0].style.MozUserSelect="none",Boxy.dragConfigured||($(document).mousemove(Boxy._handleDrag),Boxy.dragConfigured=!0),t.mousedown(function(t){e.toTop(),Boxy.dragging=[e,t.pageX-e.boxy[0].offsetLeft,t.pageY-e.boxy[0].offsetTop],$(this).addClass("dragging")}),$(document).mouseup(function(){$(this).removeClass("dragging"),Boxy.dragging=null,e._fire("afterDrop")})),this.getTInner().prepend(t),this._setupDefaultBehaviours(t)}else this.getTInner().remove()},_setupDefaultBehaviours:function(e){var t=this;this.options.clickToFront&&e.click(function(){t.toTop()}),$(".js-modal-close",e).click(function(){return t.hide(),!1}).mousedown(function(e){e.stopPropagation()})},_fire:function(e){this.options[e].call(this)}},!function(e){"function"==typeof define&&"function"!=typeof jQuery?define(["jquery"],e):e(jQuery)}(function(e){e.extend({dialog:function(e,t){var i=$.extend({title:"提示",timeout:0,modal:!1,draggable:!0,callback:function(){}},t),o='<div class="moco-modal-dialog">'+e+"</div>",r=new Boxy(o,{title:i.title,modal:i.modal,draggable:i.draggable,closeCallback:i.callback});return 0!=i.timeout&&setTimeout(function(){r.hide(),i.callback()},i.timeout),(i.width||i.height)&&r.resize({width:i.width,height:i.height}),r},alert:function(e,t){var i='<div class="moco-modal-wrap">                    <p class="moco-modal-content js-modal-content">$content</p>                    $info                    <div class="moco-modal-btns">                        <a class="moco-btn moco-btn-blue js-modal-submit" onclick="return false" href="javascript:void(0)"><span>$submit</span></a>                    </div>                </div>',o=$.extend({submit:"确定",timeout:0,modal:!0,callback:function(){}},t),r=i.replace("$content"https://m.imooc.com/static/wap/static/common/js/,e);r=o.info?r.replace("$info",'<p class="moco-modal-info js-modal-info">'+o.info+"</p>"):r.replace("$info",""),r=r.replace("$submit",o.submit);var n=new Boxy(r,{modal:o.modal,draggable:!1,closeCallback:o.callback});return $(n.boxy).find("a.js-modal-submit").click(function(){n.hide(),o.callback()}),$(n.modalBlackout).click(function(){n.hide(),o.callback()}),0!=o.timeout&&setTimeout(function(){n.hide(),o.callback()},o.timeout),n},confirm:function(e,t){var i='<div class="moco-modal-wrap" node-type="outer">                        <p class="moco-modal-content js-modal-content">$content</p>                        $info                    <div class="moco-modal-btns">                        <a class="moco-btn moco-btn-normal js-modal-cancel" onclick="return false" href="javascript:void(0)"><span>$cancel</span></a><a class="moco-btn moco-btn-blue js-modal-submit" onclick="return false" href="javascript:void(0)"><span>$submit</span></a>                    </div>                </div>',o=$.extend({submit:"确定",cancel:"取消",modal:!0,callback:function(){},cancelcallback:function(){}},t),r=i.replace("$content"https://m.imooc.com/static/wap/static/common/js/,e);r=o.info?r.replace("$info",'<p class="moco-modal-info js-modal-info">'+o.info+"</p>"):r.replace("$info",""),r=r.replace("$submit",o.submit).replace("$cancel",o.cancel);var n=new Boxy(r,{modal:o.modal,draggable:!1,closeCallback:o.CancelCallback});return $(n.boxy).find("a.js-modal-submit").click(function(){n.hide(),o.callback()}),$(n.boxy).find("a.js-modal-cancel").click(function(){n.hide(),o.cancelcallback()}),$(n.modalBlackout).click(function(){n.hide(),o.cancelcallback()}),n},prompt:function(e,t){var i=($(window).width(),$(window).height(),$(".moco-tip-layer").remove(),{success:"moco-icon-tick-revert",error:"moco-icon-point-revert",question:"moco-icon-ques-revert"}),t=$.extend({icon:"success",timeout:1e3,modal:!0,callback:function(){}},t),o="<div class='moco-prompt-layer'><i class='"+i[t.icon]+"'></i>                <span >"+e+"</span></div>",r=new Boxy(o,{modal:t.modal,draggable:!1,closeCallback:t.callback});return setTimeout(function(){r.hide()},t.timeout),r},tipAlert:function(e,t){var i=$(".moco-tip-layer").remove();i=$('<div class="moco-modal-layer moco-tip-layer">').appendTo($("body"));var o={success:"moco-icon-tick-revert",error:"moco-icon-point-revert",question:"moco-icon-ques-revert"},t=$.extend({icon:"success",info:"",timeout:1e3},t),r="<i class='"+o[t.icon]+"'></i>                <span>"+t.info+"</span>";i.hide().html(r).css({top:$(e).offset().top-30,left:$(e).offset().left-15}),i.animate({top:$(e).offset().top-45,left:$(e).offset().left-15,opacity:"show"},300),setTimeout(function(){i.animate({opacity:"hide"},300)},t.timeout)},tipConfirm:function(e,t){var i=$(".moco-tip-layer").remove();i=$('<div class="moco-modal-layer moco-tip-layer moco-tipconfirm-layer">').appendTo($("body"));var o={success:"moco-icon-tick-revert",error:"moco-icon-point-revert",question:"moco-icon-ques-revert"},t=$.extend({icon:"question",info:"",callback:function(){},cancelcallback:function(){}},t),r='<i class="'+o[t.icon]+'"></i>                <span class="moco-tipconfirm-info">'+t.info+'</span>                <a class="moco-btn moco-btn-blue js-modal-submit" onclick="return false" href="javascript:void(0)"><i class="moco-icon-check"></i></a><a class="moco-btn moco-btn-normal js-modal-cancel" onclick="return false" href="javascript:void(0)"><i class="moco-icon-close"></i></a>';i.hide().html(r).css({top:$(e).offset().top-30,left:$(e).offset().left-15}),i.animate({top:$(e).offset().top-45,left:$(e).offset().left-15,opacity:"show"},300),i.find(".js-modal-cancel").click(function(){i.hide(),t.cancelcallback()}),i.find(".js-modal-submit").click(function(){i.hide(),t.callback()})}})}),!function(){var e=window.moco||(window.moco={}),t=function(e){return"[object Array]"===Object.prototype.toString.apply(e)},i=new RegExp("[\\u4E00-\\u9FFF]+","g"),o=function(e){this.Parent=e,this.init()};o.prototype={init:function(){var e=this;$(e.Parent).find("img").css("cursor","pointer"),$(e.Parent).on("click","img",function(){if(!$(this).hasClass("nopreview")){i.test($(this).attr("data-src"))&&$(this).attr("data-src",$(this).attr("src"));var t=["<div id='imgPreview' class='imgPreview'>","<img class='nopreview' />","</div>","<div id='imgPreviewMake' class='imgPreview-make'></div>","<div id='imgPreviewHandle' class='imgPreviewHandle'>","<a target='_blank' class='viewOriginalImg' href=''>","<span class='viewOriginalImgText'>查看原图</span>","</a>","<span class='imgPreview-btn next moco-icon-right'></span>","<span class='imgPreview-btn prev moco-icon-left'></span>","<i title='关闭' class='imgPreview-close moco-icon-close2'></i>","</div>"].join("");return $("body").append(t),e.Preview(this),!1}})},currentimg:null,Preview:function(e,t){var i=this;i.currentimg=e,$("#imgPreview img").attr("src","");var o=$(e).attr("data-src");o||(o=$(e).attr("src")),o=this.imageSrc(o,$(e).attr("src")),$("#imgPreviewHandle .viewOriginalImg").attr("href",o);var r=new Image;r.onload=function(){var e=$(window).width(),t=$(window).height(),r=this.width,n=this.height,a=e/t,s=r/n;a>s?n>t&&(n=parseInt(t-100),r=parseInt(n*s)):r>e&&(r=parseInt(e-100),n=parseInt(r/s));var c="height: "+n+"px; width: "+r+"px; margin-left: "+-r/2+"px; margin-top: "+-n/2+"px; display: block;";$("#imgPreview").show(),i.Switch("btn"),setTimeout(function(){$("#imgPreview").attr("style",c),$("#imgPreview img").attr("src",o)},300)},t||i.bindEvent(),r.src=o},imageSrc:function(e,t){if(e&&-1!=e.indexOf("http")||(e=t),-1!=e.indexOf("https://m.imooc.com/static/wap/static/common/js/mukewang.com")||-1!=e.indexOf("https://m.imooc.com/static/wap/static/common/js/imooc.com")){var i=e.substr(e.lastIndexOf("."));return e=e.split(i)[0],-1!=e.indexOf("-")&&(e=e.slice(0,e.indexOf("-"))),e+""+i}return e},bindEvent:function(){var e=this,t=function(){$("#imgPreview").remove(),$("#imgPreviewMake").remove(),$("#imgPreviewHandle").remove()};$("#imgPreviewHandle .imgPreview-close").on("click",function(e){t(),e.stopPropagation()}),$("#imgPreviewHandle .next").on("click",function(t){e.Switch("next"),t.stopPropagation()}),$("#imgPreviewHandle .prev").on("click",function(t){e.Switch("prev"),t.stopPropagation()}),$("#imgPreviewHandle").on("click",function(){t()}),$("#imgPreviewHandle .viewOriginalImg").on("click",function(e){e.stopPropagation()})},Switch:function(e){var t=this,i=($(t.Parent).find("img"),$(t.Parent).find("img:not(.nopreview)"));i.length>1?($("#imgPreviewHandle .imgPreview-btn").show(),i.each(function(o){if(t.currentimg==this){if("next"==e){if(o<i.length-1){var r=i[o+1];t.Preview(r,!0)}}else if("prev"==e&&0!=o){var r=i[o-1];t.Preview(r,!0)}return"btn"==e&&(o==i.length-1&&$("https://m.imooc.com/static/wap/static/common/js/.imgPreview-btn.next").hide(),0==o&&$("https://m.imooc.com/static/wap/static/common/js/.imgPreview-btn.prev").hide()),!1}})):$("#imgPreviewHandle .imgPreview-btn").hide()}},e.imagePreview={init:function(e){if(!t(e))return new o(e);for(var i=e,r=0;r<i.length;r++)new o(e[r])}}}(window),!function(){function e(){this.position={},this.hashow=!1,this.forword="top",this.timer=null,this.initialize(),this._bindEvent(),this.forceForword=!1,this.mocoUsercardDialog=$(".moco-usercard-dialog")}e.prototype={initialize:function(){$("body").append("<div class='moco-usercard-dialog js-moco-usercard-modal'></div>")},render:function(e){this.mocoUsercardDialog.empty(),this.mocoUsercardDialog.append(e.domtext),this.mocoUsercardDialog.show();var t=($(document).scrollTop(),$(window).height(),this.position.top-$(document).scrollTop()),i=($(document).scrollLeft(),$(window).width(),this.position.left-$(document).scrollLeft());this.forword=this.forceForword?this.forceForword:t<e.height?i>e.width&&t>e.height/2?"right":"bottom":"top","top"==this.forword&&(this.mocoUsercardDialog.css("top",this.position.top-e.height-20),this.mocoUsercardDialog.css("left",this.position.left-e.width/2+e.headWidth/2)),"bottom"==this.forword&&(this.mocoUsercardDialog.css("top",this.position.top+e.headHeight+20),this.mocoUsercardDialog.css("left",this.position.left-e.width/2+e.headWidth/2)),"right"==this.forword&&(this.mocoUsercardDialog.css("top",this.position.top-e.height/2),this.mocoUsercardDialog.css("left",this.position.left+e.headWidth+20)),"left"==this.forword&&(this.mocoUsercardDialog.css("top",this.position.top-e.height/2),this.mocoUsercardDialog.css("left",this.position.left-e.width-20)),this.mocoUsercardDialog.css("width",e.width),this.mocoUsercardDialog.css("height",e.height),this.hashow=!0,this.forceForword=!1},culPosition:function(e){this.position.top=e.top,this.position.left=e.left},show:function(e,t){this.hashow||(this.culPosition($(e.currentTarget).offset()),this.render(t))},hide:function(){$("body").find(".moco-usercard-dialog").hide(),this.hashow=!1},setForceForword:function(e){this.forceForword=e},_bindEvent:function(){var e=this;$(document).delegate(".js-moco-usercard-modal","mouseover",function(){clearTimeout(e.timer)}),$(document).delegate(".js-moco-usercard-modal","mouseleave",function(){e.hide()})}},window.usersInfoCache=[];var t=this,i="",o=!1,r=!1;this.usercardDialogDom=function(e){var t={dialogbk:"user_dialogbk",signature:"",is_follows:"关注Ta",icon:"icon-group_add",roleText:"",detailNum:"",sexClass:"",cssClass:"moco-usercard-mc-btn-success js-usercard-add-attention",_funsDom:'<a href="https://m.imooc.com/u/'+e.uid+'/fans">							<div class="moco-usercard-detail-right bold">粉丝								<span>'+e.fans_num+"</span>							</div>						</a>"},i=$.extend(t,i);i.signature=e.sign,i.detailNum='<a href="https://m.imooc.com/u/'+e.uid+'/follows">								<div class="moco-usercard-detail-left bold">关注									<span>'+e.follows_num+"</span>									</div>								</a>								"+i._funsDom,2==e.user_type?(i.dialogbk="teacher_dialogbk",i.roleText+='<span class="moco-usercard-signicon moco-usercard-teacher"></span>',i.detailNum='<a href="https://m.imooc.com/u/'+e.uid+'/courses?sort=publish">									<div class="moco-usercard-detail-left bold">课程										<span>'+e.course_num+"</span>									</div>								</a>								"+i._funsDom,i.signature=e.aboutme,1==e.is_author&&(i.roleText+='<span class="moco-usercard-signicon moco-usercard-author"></span>'),1==e.is_mustar&&(i.roleText+='<span class="moco-usercard-signicon moco-usercard-mxr"></span>')):(1==e.is_author&&(i.dialogbk="author_dialogbk",i.roleText+='<span class="moco-usercard-signicon moco-usercard-author"></span>',i.detailNum='<a href="https://m.imooc.com/u/'+e.uid+'/articles">										<div class="moco-usercard-detail-left bold">手记											<span>'+e.article_num+'</span>										</div>									</a>									<a href="https://m.imooc.com/u/'+e.uid+'/articles?type=praise">										<div class="moco-usercard-detail-right bold">推荐											<span class="ml10">'+e.article_recommend_num+"</span>										</div>									</a>"),1==e.is_mustar&&(i.roleText+='<span class="moco-usercard-signicon moco-usercard-mxr"></span>'),1e4==e.uid&&(i.detailNum='<a href="javascript:void(0);">										<div class="moco-usercard-detail-left bold">关注											<span class="ml10">'+e.follows_num+"</span>										</div>									</a>									"https://m.imooc.com/static/wap/static/common/js/+i._funsDom)),i.sexClass=2==e.sex?"moco-usercard-girl":1==e.sex?"moco-usercard-boy":"moco-usercard-secret",1==e.is_follows&&(i.is_follows="发消息",i.icon="icon-mail",i.cssClass="moco-usercard-mc-btn-primary js-usercard-send-message"),""==i.signature?i.signature="这位同学很懒，木有签名的说～":i.signature.length>45&&(i.signature=i.signature.slice(0,45)+"...");var o='<div class="moco-usercard-headialog js-usercard-headialog" style="background: url(/static/img/u/'+i.dialogbk+'.png) no-repeat 0 0;">						<a href="https://m.imooc.com/u/'+e.uid+'" target="_blank">							<img src="http://img.mukewang.com/'+e.portrait+'-40-40.jpg" class="moco-usercard-head" width="40" height="40">						</a>						<p class="fs16 bold mt0">							<a href="https://m.imooc.com/u/'+e.uid+'" target="_blank"><span>'+e.nickname+"</span> </a>"+i.roleText+'</p>						<p class="fs12 moco-usercard-job-title">							<span class="moco-usercard-gender mr10 '+i.sexClass+'"></span>							'+e.job_title+'						</p>						<p class="fs12 moco-usercard-signature">'+i.signature+"</p>						<div> "+i.detailNum+'</div>						<span class="moco-usercard-mc-btn '+i.cssClass+' pl30 pr30 mt20 " dataid='+e.uid+'>							<i class="'+i.icon+' moco-usercard-btn-icon"> </i>'+i.is_follows+' 						</span>						<p class="moco-usercard-add-attention-error"></p>					</div>';return o},$(".js-usercard-box").delegate(".js-usercard-dialog","mouseover",function(n){var a=$(this),s=a.data("userid");-1==location.hostname.indexOf("https://m.imooc.com/static/wap/static/common/js/10.96.141.76")&&0!=isLogin&&OP_CONFIG.userInfo.uid==s||(i||(i=new e),r=!1,setTimeout(function(){if(!r){var e=a.width(),c=a.height();if(void 0===usersInfoCache[s]){if(-1!=location.hostname.indexOf("https://m.imooc.com/static/wap/static/common/js/10.96.141.76")){var l={uid:1e4,nickname:"慕女神",portrait:"57a322f00001e4ae02560256",sign:"各位亲，我真不是机器人，好伐",aboutme:"2048源代码征集活动火爆进行中，欢迎大家参加！",user_type:"2",sex:"2",job_title:"全栈工程师",is_follows:1,is_fans:1,follows_num:99,fans_num:9999999,is_mustar:0,is_author:1,course_num:0,article_num:"10",article_recommend_num:"16",mp:"631",credit:"22",n_learn:"38小时47分钟"};usersInfoCache[s]=l;var d=t.usercardDialogDom(l),u=$(".js-usercard-headialog");return u.css("background","url(images/teacher_dialogbk.png)"),u.find(".moco-usercard-head").attr("src","images/imoocGril.jpg"/*tpa=https://m.imooc.com/static/wap/static/common/js/images/imoocGril.jpg*/),u.find(".moco-usercard-teacher").css("background","url(images/user-info-icon-little.png) 0 -18px"),u.find(".moco-usercard-author").css("background","url(images/user-info-icon-little.png) 0 -40px"),u.find(".moco-usercard-girl").css("background","url(images/gender.png) 0 -16px"),void i.show(n,{width:340,height:308,domtext:d,headWidth:e,headHeight:c})}o||(o=!0,$.ajax({type:"GET",url:"/u/gethoveruser?uid="+s,dataType:"json",success:function(o){if(1==o.result){usersInfoCache[s]=o.data;var r=t.usercardDialogDom(o.data);i.show(n,{width:340,height:308,domtext:r,headWidth:e,headHeight:c})}},complete:function(){o=!1}}))}else{var d=t.usercardDialogDom(usersInfoCache[s]);i.show(n,{width:340,height:308,domtext:d,headWidth:e,headHeight:c})}}},200))}),$(document).on("click",".js-usercard-send-message",function(e){if($(".moco-usercard-add-attention-error").text(""),OP_CONFIG.userInfo){var t=$(e.currentTarget).attr("dataid");window.open("/u/"+OP_CONFIG.userInfo.uid+"/messages?uid="+t)}else seajs.use("login_sns",function(e){e.init()})}),$(document).on("click",".js-usercard-add-attention",function(e){if($(".moco-usercard-add-attention-error").text(""),OP_CONFIG.userInfo){var t=$(e.currentTarget).attr("dataid");$.ajax({type:"POST",url:"/u/"+OP_CONFIG.userInfo.uid+"/ajaxfollows?uid="+t+"x&type=1",dataType:"json",success:function(e){1101==e.result&&($(".js-usercard-add-attention").html('<i class="icon-mail moco-usercard-btn-icon"> </i>发消息'),$(".js-usercard-add-attention").removeClass("moco-usercard-mc-btn-success js-usercard-add-attention").addClass(" moco-usercard-mc-btn-primary js-usercard-send-message")),1103==e.result&&$(".moco-usercard-add-attention-error").text("已经是好友"),1100==e.result&&$(".moco-usercard-add-attention-error").text("关注失败"),usersInfoCache[t].is_follows=1},error:function(){$(".moco-usercard-add-attention-error").html("服务错误，稍后重试")},complete:function(){}})}else seajs.use("login_sns",function(e){e.init()})}),$(".js-usercard-box").delegate(".js-usercard-dialog","mouseleave",function(){i.timer=setTimeout(function(){i.hide()},50),r=!0})}(),!function(e,t){moco.validateCallback={},W={},W.ValidaterClass=function(){this.validateRules={"require-word":{type:"regex",extract:"value",regex:/^[^._$]+$/g,errorHint:'格式不正确，请输入除".","_"和"$"以外的字符'},"require-letter":{type:"regex",extract:"value",regex:/^[a-zA-Z0-9_]+$/g,errorHint:"格式不正确，请输入字母、数字、下划线"},"require-int":{type:"regex",extract:"value",regex:/^-?\d+$/g,errorHint:"格式不正确，请输入整数"},"require-positive-int":{type:"regex",extract:"value",regex:/^[1-9][0-9]*$/g,errorHint:"格式不正确，请输入正整数"},"require-nonnegative":{type:"regex",extract:"value",regex:/^\d+$/g,errorHint:"请输入非负整数"},"require-float":{type:"regex",extract:"value",regex:/^\d{1,5}(\.\d{1,2})?$/g,errorHint:"格式不正确，请输入'https://m.imooc.com/static/wap/static/common/js/3.14'或'5'这样的数字"},"require-float-three":{type:"regex",extract:"value",regex:/^\d{1,5}(\.\d{1,3})?$/g,errorHint:"格式不正确，请输入'https://m.imooc.com/static/wap/static/common/js/3.147'或'5'这样的数字"},"require-float-one":{type:"regex",extract:"value",regex:/^\d{1,5}(\.\d{0,1})?$/g,errorHint:"格式不正确，请输入'https://m.imooc.com/static/wap/static/common/js/3.147'或'5'这样的数字"},"require-price":{type:"regex",extract:"value",regex:/^\d+(\.\d{0,2})?$/g,errorHint:"价格不正确，请输入0-999999999之间的价格"},"require-date":{type:"regex",extract:"value",regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/g,errorHint:"输入格式为2013-01-01的日期"},"require-percent":{type:"regex",extract:"value",regex:/^([1-9]|[1-9]\d|100)$/g,errorHint:"格式不正确，请输入1-100的整数"},"require-tel-phone":{type:"regex",extract:"value",regex:/^(([0\+]\d{2,3}-)?(0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/g,errorHint:"输入的电话号码有错误。区号和电话号码之间请用-分割"},"require-email":{type:"regex",extract:"value",regex:/^[a-zA-Z0-9]+([._\-]*[a-zA-Z0-9]+)*@([a-zA-Z0-9]+([._\-][a-zA-Z0-9]+))+$/,errorHint:"邮箱格式错误"},"require-mobile-phone":{type:"regex",extract:"value",regex:/^(13[0-9]|14[56789]|15[012356789]|16[6]|17[12345678]|18[0-9]|19[89])[0-9]{8}$/g,errorHint:"手机号格式错误"},"require-password":{type:"regex",extract:"value",regex:/^[\w~`!@#$%&*.,()_+<>?:"'+*\/\-\^\\\][{}]{6,16}$/,errorHint:"请输入6-16位密码，区分大小写，不能使用空格！"},"require-nick":{type:"regex",extract:"value",regex:/^[\w\u4E00-\u9FA5]{2,18}$/,errorHint:"昵称2-18位中英文、数字及下划线！"},"require-notempty":{type:"function",extract:"element",check:function(t){var i=e.trim(t.val());return 0!=i.length||(this.errorHint="内容不能为空",!1)},errorHint:""},"require-element-exist":{type:"function",extract:"element",check:function(e){var t=e.data("selector");return e.find(t).length>0}},"require-string":{type:"function",extract:"element",check:function(t){var i=e.trim(t.val());"true"==t.attr("contenteditable")&&(i=t.attr("value"));var o=t.data("minlength")||t.data("min-length")||1,r=t.data("maxlength")||t.data("max-length")||9999999,n=i.length;return!(o>n||n>r)||(this.errorHint=9999999==r?"输入值长度必须大于等于"+o:"请输入长度在"+o+"到"+r+"之间的字符串",!1)},errorHint:""},"require-select":{type:"function",extract:"value",check:function(t){var i=e.trim(t);return 0!=i.length&&"-1"!==i},errorHint:"请选择一个选项"},"require-select-positive-option":{type:"function",extract:"value",check:function(e){var e=parseInt(e);return!(0>e)},errorHint:"请选择一个选项"},"require-custom-function":{type:"function",extract:"element",check:function(e){var t=e.attr("data-validate-function"),i=window[t](e);return this.errorHint=i.errorHint,i.isValidate||this.errorHint||(this.errorHint="请在data-validate-function函数中返回errorHint"),i.isValidate}},"require-file":{type:"function",extract:"value",check:function(e){return 0!=e.length},errorHint:"请选择一份文件"},"require-length":{type:"function",extract:"element",check:function(t){var i=e.trim(t.val());"true"==t.attr("contenteditable")&&(i=t.attr("value"));var o=parseInt(t.attr("strlength"))||parseInt(t.attr("str-length")),r=i.length;return r===o||(this.errorHint="请输入长度为"+o+"的字符串",!1)},errorHint:""}},this.getRule=function(e){return this.validateRules[e]}},W.Validater=new W.ValidaterClass,W.validate=function(t){var i=[];i.push(t?t.attr("data-validate")?t:t.find("[data-validate]"):e("[data-validate]"));for(var o=!1,r=i.length,n=null,a=0;r>a;++a){var s=i[a];s.each(function(){var t=e(this);if(!(t.is(":visible")&&"hidden"!=t.css("visibility")||t.data("forceValidate")))return void W.validate.toggleErrorHint(t,!0);var i=t.val(),r=t.attr("data-validate");if(r)for(var a=r.split(",,"),s=a.length,c=0;s>c;++c){var l=e.trim(a[c]);if("norequire"==l&&0==i.length){W.validate.toggleErrorHint(t,!0);break}var d=l.split("::"),u=null,h=null,m=null;2===d.length?(u=d[0],m=d[1]):u=d[0];var f=u.indexOf("(");-1!==f&&(d=u.split("("),u=d[0],h=d[1].substring(0,d[1].length-1).split(","));var g=W.Validater.getRule(u);if(g)if("function"===g.type){var p=i,v=t;if("element"==g.extract&&(p=t),!g.check.call(g,p,h))return o=!0,n=m?m:g.errorHint,W.validate.toggleErrorHint(v,!1,n),!0;var b=t.attr("data-callback");if(b&&moco.validateCallback&&moco.validateCallback[b]){var x=t.val();if(moco.validateCallback.errorHint="",moco.validateCallback[b](x),!moco.validateCallback.rel)return o=!0,W.validate.toggleErrorHint(v,!1,moco.validateCallback.errorHint,!0),!0;W.validate.toggleErrorHint(v,!0),o=!1}else o=!1,W.validate.toggleErrorHint(v,!0)}else if("regex"===g.type){var v=t;if(!i.match(g.regex))return o=!0,n=m?m:g.errorHint,W.validate.toggleErrorHint(v,!1,n),!0;var b=t.attr("data-callback");if(b&&moco.validateCallback&&moco.validateCallback[b]){var x=t.val();if(moco.validateCallback.errorHint="",moco.validateCallback[b](x),!moco.validateCallback.rel)return o=!0,W.validate.toggleErrorHint(v,!1,moco.validateCallback.errorHint,!0),!0;W.validate.toggleErrorHint(v,!0),o=!1}else o=!1,W.validate.toggleErrorHint(v,!0);if(o)return!1}}})}return!o},W.validate.toggleErrorHint=function(i,o,r,n){if(i){var a=i.siblings(".errorHint");if(0==a.length){var s=i.parent();a=s.find(".errorHint")}if(0==a.length&&(a=i.parents(".xa-errorHintContainer").find(".errorHint")),0==a.length&&(a=i.parents(".x-errorHintContainer").find(".errorHint")),0==a.length){var c=i.data("errorHintTarget");c&&(a=e(c))}if(a.length>0)if(o)a.html("");else{var l=a.data("errorHint");n||l&&(r=l),a.html(r).show()}o||i.attr("errorhint-value")==t||i.attr("errorhint-value",r);var d=i.parent(),u="input"===i.get(0).tagName.toLowerCase();u&&(o?d.removeClass("has-error"):d.addClass("has-error"))}},e(document).delegate("input[data-validate]","blur",function(t){W.validate(e(t.currentTarget).parent())})}(jQuery);