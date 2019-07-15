//AJAX 无限加载
$("#next").click(function () {
	$("#next a").text("loading...");
	var url = $("#next a").attr("href");
    $.ajax({
        type: "POST",
        url: url,
        success: function(data) {
            result = $(data).find(".lis");
            nextHref = $(data).find(".next").attr("href");
            $("#coos").append(result.fadeIn(500));

            if (nextHref != undefined) {
                $("#next a").attr("href", nextHref);
                $("#next a").text("加载更多");
            } else {
                $("#next").html("<span>没有了 ~</span>");
            }
        }
    });
    return false;
})

obj = $('#footer');//元素

h = obj.height();//元素高度

obj.offset().top;//元素距离顶部高度



wh = $(window).height();//浏览器窗口高度

$(document).scrollTop();//滚动条高度



xh=wh-(h+obj.offset().top-$(document).scrollTop());//元素到浏览器底部的高度
if (xh>5){
    $('#footer').css("position","absolute");
    $('#footer').css("bottom","0px");
}

function GetQueryString(name)
{
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);//search,查询？后面的参数，并匹配正则
    if(r!=null)return  unescape(r[2]); return null;
}

var re = GetQueryString("replyTo");
if (re!=undefined){
	var niconame = $("#comment-"+re+">.comment-author>cite").text();
	$("#comment").text("@"+niconame+" ");
}


for(var i = 0 ; i < $("time").length ; i++){
    var date = new Date((( $("time").eq(i).attr("datetime")).replace("T"," ")).replace("+00:00",""));
    $("time").eq(i).text(date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate()+" "+date.getHours()+":"+(date.getMinutes()>9?date.getMinutes():(0+""+date.getMinutes())))
}

$("a").attr("target","_blank");
$("#nav a").attr("target","");
$("#title a").attr("target","");