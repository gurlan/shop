$(function () {
    var t = function () {
        for (var t = [], a = 1; 4 > a; a++)t.push($(".coupon-" + a).attr("data-marking"));
        var e = !1;
        $(document).on("click", ".js-get-btn", function () {
            if (e)return !1;
            if (!isLogin)return "false" == isApp && window.localStorage.setItem("hasClick", 1), window.location.href = "//www.imooc.com/m/web/account/login.html", !1;
            if ($(this).hasClass("hasGet"))return "false" == isApp && window.localStorage.removeItem("hasClick"), $.alert("亲已经领过优惠券了哦，请在订单中心-我的优惠券中查看"), !1;
            var a = $(this).attr("data-is_new_user");
            return "0" == a ? ($.alert("抱歉，新注册的用户才能参与此活动哦~"), e = !1, !1) : ($(this).text("正在领取...").addClass("disabled"), e = !0, void $.ajax({
                url: "/wap/coupon/get",
                type: "get",
                data: {marking: t.join(",")},
                dataType: "json",
                success: function (t) {
                    e = !1, 0 == t.result ? "true" == isApp ? $.alert("恭喜你获得优惠券3张！", {
                        callback: function () {
                            window.location.reload()
                        }
                    }) : (window.localStorage.removeItem("hasClick"), $.alert("恭喜你获得优惠券3张！请在WEB端或APP查看及使用~", {
                        callback: function () {
                            window.location.reload()
                        }
                    })) : -11 == t.result ? $("#js-signin-btn").trigger("click") : $.alert(t.msg)
                }
            }))
        }), "false" == isApp && window.localStorage.getItem("hasClick") && $(".js-get-btn").trigger("click")
    };
    t()
});