jQuery.extend({msg:function(s,a,i,p){var e="",p=p||2e3;e="success"==s?"imwap-check_circle":"imwap-error";var c='<div class="tips-box js-tips-box">						<span class="small-tips">							<i class="'+e+" "+s+'"></i><span>'+a+"</span>						</span>					</div>";$("body").append(c),$(".js-tips-box").fadeOut(p,function(){$(".js-tips-box").remove(),i&&i()})}});