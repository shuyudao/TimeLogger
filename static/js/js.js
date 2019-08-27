//AJAX 无限加载
function ajaxGetMore() {
    if($("#next").html()=="<span>没有了 ~</span>"||$("#next .next").text()=="loading..."){
        return false;
    }
    $("#next .next").text("loading...");
    var url = $("#next a").attr("href");
    $.ajax({
        type: "POST",
        url: url,
        async: true,
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
}


//下拉到底部自动加载下一页
$(window).scroll(function(){
　　var scrollTop = $(this).scrollTop();
　　var scrollHeight = $(document).height();
　　var windowHeight = $(this).height();
　　if(Math.abs((scrollTop + windowHeight) - scrollHeight)<1){

　　　　ajaxGetMore();
　　}
});

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

function replacepos(text,start,stop,replacetext){
   	 mystr = text.substring(0,stop-1)+replacetext+text.substring(stop+1);
   	 return mystr;
 }

function UrlSearch(url) {
   var name,value;
   var str=url;
   var num=str.indexOf("?")
   str=str.substr(num+1); //取得所有参数   stringvar.substr(start [, length ]
   var arr=str.split("&"); //各个参数放到数组里
   for(var i=0;i < arr.length;i++){
        num=arr[i].indexOf("=");
        if(num>0){
             name=arr[i].substring(0,num);
             value=arr[i].substr(num+1);
             this[name]=value;
        }
   }
  return arr;
}


for(var i = 0 ; i < $("time").length ; i++){
    var date = new Date((( $("time").eq(i).attr("datetime")).replace("T"," ")).replace("+00:00",""));
    $("time").eq(i).text(date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate()+" "+date.getHours()+":"+(date.getMinutes()>9?date.getMinutes():(0+""+date.getMinutes())))
}

$("#post a").attr("target","_blank");
$(".comment-reply a").click(function(){
	var url = $(this).attr("href");
    var parms = UrlSearch(url);
    var parma =  parms[0];
    var jindex = parma.indexOf("#");
    var result = parma.slice(0,jindex);
    var retonum = result.replace("replyTo=","");
    $("form").attr("action",$("form").attr("action")+"?parent="+retonum);
    var niconame = $("#comment-"+retonum+">.comment-author>cite").text();
	$("#comment").text("@"+niconame+" ");
    
  	var comment_top = $("#comments").offset().top;
    $(window).scrollTop(comment_top);
  
    return false;
})