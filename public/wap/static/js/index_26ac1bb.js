$(function(){new Swiper(".swiper-container-banner",{autoplay:3e3,speed:500,loop:!0,centeredSlides:!0,slidesPerView:"auto",pagination:".swiper-pagination"}),new Swiper(".swiper-container-content",{speed:500,slidesPerView:"auto",pagination:".swiper-pagination"});$("img.lazy").lazyload({effect:"fadeIn"});var a={ImoocPart:function(a){var a=a.data;bigstr="",str="";for(var s=0;s<a.length;s++){var i="",e="",c="",r="";if(4==s)break;1==a[s].is_learned&&(i=a[s].learn_rate<100?"<span>已学"+a[s].learn_rate+"</span>":"<span>已学完</span>"),2==a[s].type?1==a[s].discount_type&&1==a[s].is_show_discount?(e='<div class="small-card-price red">',e+="¥"+a[s].discount_price+' <span class="discount-price"> '+a[s].discount_name+"</span></div>"):2==a[s].discount_type?(e='<div class="small-card-price red">',e+="¥"+a[s].pay_price+' <span class="student-price">学生惠<b>¥'+a[s].discount_price+"</b></span></div>"):3==a[s].discount_type?(e='<div class="small-card-price red">',e+="¥"+a[s].discount_price,(a[s].discount_time||a[s].begin)&&(e+='<span class="discount-price"> '+a[s].discount_name+"</span>"),e+="</div>"):(e='<div class="small-card-price">',e+="¥"+a[s].pay_price+"</div>"):1==a[s].type&&(e='<div class="small-card-price">免费</div>'),str+='<div class="small-card clearfix">                                <a href="'+a[s].share+'">                                    <img src="'+a[s].pic+'" class="small-card-banner l">                                    <div class="l">                                    <p class="small-card-title">'+a[s].name+'</p>                                    <div class="small-card-info">'+i+a[s].level+" · "+a[s].numbers+"人在学</div>                                    "+e+"                                    </div>                                </a>                             </div>"}str+='<div class="big-box clearfix">';for(var s=0;s<a.length;s++)(4==s||5==s)&&(c="background: #"+a[s].skill_color+" url("+a[s].skill_pic+") no-repeat right;",r=1==a[s].type?"免费":"¥"+a[s].pay_price,str+='<div class="big-card l" style="'+c+'">                                <a href="'+a[s].share+'">                                    <h2>'+a[s].skill_name+'</h2>                                    <p class="big-card-title">'+a[s].name+'</p>                                    <div class="big-card-bottom">                                    '+r+"                                    </div>                                </a>                            </div>");str+="</div>";for(var s=6;s<a.length;s++){var i="",e="",c="",r="";1==a[s].is_learned&&(i=a[s].learn_rate<100?"<span>已学"+a[s].learn_rate+"</span>":"<span>已学完</span>"),2==a[s].type?1==a[s].discount_type&&1==a[s].is_show_discount?(e='<div class="small-card-price red">',e+="¥"+a[s].discount_price+' <span class="discount-price"> '+a[s].discount_name+"</span></div>"):2==a[s].discount_type?(e='<div class="small-card-price red">',e+="¥"+a[s].pay_price+' <span class="student-price">学生惠<b>¥'+a[s].discount_price+"</b></span></div>"):3==a[s].discount_type?(e='<div class="small-card-price red">',e+="¥"+a[s].discount_price,(a[s].discount_time||a[s].begin)&&(e+='<span class="discount-price"> '+a[s].discount_name+"</span>"),e+="</div>"):(e='<div class="small-card-price">',e+="¥"+a[s].pay_price+"</div>"):1==a[s].type&&(e='<div class="small-card-price">免费</div>'),str+='<div class="small-card clearfix">                                <a href="'+a[s].share+'">                                    <img src="'+a[s].pic+'" class="small-card-banner l">                                    <div class="l">                                    <p class="small-card-title">'+a[s].name+'</p>                                    <div class="small-card-info">'+i+a[s].level+" · "+a[s].numbers+"人在学</div>                                    "+e+"                                    </div>                                </a>                             </div>"}return str}},s=2;-1!=window.location.href.indexOf("#new")&&setTimeout(function(){var a=$(".icon-1").offset().top-$(".header-menu").height()-$("header").height()-$(".tit").height();window.scrollTo(0,a)},200),$(document).on("click",".js-load-imooc",function(){var i="",e=$(this).data("flag");i="more"==e?"/wap/api/index/changeGuess?flag="+e+"&page="+s:"/wap/api/index/changeGuess?flag="+e,$.ajax({url:i,dataType:"json",type:"get",success:function(i){s++;var c=a.ImoocPart(i);""!=c?"change"==e?$(".js-imooc-list").html(c):"more"==e&&$(".js-like-list").append(c):(alert("没有更多的课程喽！"),$(".js-load-imooc").remove())},error:function(){alert("发生错误，请稍后尝试！")}})})});