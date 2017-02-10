// JavaScript Document
 var selectindex = 0;
        var selectindex2 = 0;
        var n = 0;
        var t = setInterval("showAuto()", 4000);
        function showAuto() {
            var count = $(".jspic img").length;
            n = n >= (count - 1) ? 0 : ++n;
            $(".picbtn .btn a").eq(n).trigger('click');
        }
		
        $(document).ready(function(){

            $(".picbtn .btn a").click(function () {
                var i = $(this).index();

                $(".jspic img").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
                $(".picbtn .btn a").removeClass("hover").eq(i).addClass("hover");
                $("#btntilt dd").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
                return false;
            });


            $(".picbtn .btn a").hover(function () { clearInterval(t) }, function () { t = setInterval("showAuto()", 4000); });


            $(".nav2 dl").css("display", "none");
            $("#nav1 dd").hover(function () {
                $(this).children("a").css("display", "none");
                $(".nav2 dl").css("display", "none");
                if ($(this).attr("id") == 3 || $(this).attr("id") == 2 || $(this).attr("id") == 5)
                    $("#n" + $(this).attr("id")).css("left", $(this).position().left - 8 + "px");
                else
                    $("#n" + $(this).attr("id")).css("left", $(this).position().left - 18 + "px");


                $("#n" + $(this).attr("id")).css("display", "block");
            }, function () { $(this).children("a").css("display", "block"); });
            $(".nav2 dl").hover(function () { $("#nva1") }, function () { $(this).css("display", "none") })



            $("#linkbtn").hover(function () { $(this).css("background-color", "#f3f3f3") }, function () { $(this).css("background-color", "#fff") });
            $("#linkbtn").click(function () { $("#link").slideToggle(); });
            $("#spry1ul li").removeClass('hover').eq(selectindex).addClass('hover');
            $(".spry1content div").css('display', 'none').eq(selectindex).css('display', '');

            $("#spry1 .spry1ul li").hover(function () {
                $(this).addClass(' hover');
            }, function () {
                if (selectindex != $(this).index()) $(this).removeClass(' hover')
            });

            $("#spry1 .spry1ul li").click(function () {
                selectindex = $(this).index();
                $(this).parent().children().removeClass('hover').eq(selectindex).addClass('hover');
                $(".spry1content div").css('display', 'none').eq(selectindex).css('display', '');
            });

            $("#spry2ul li").removeClass('hover').eq(selectindex2).addClass('hover');
            $(".spry2content div").css('display', 'none').eq(selectindex2).css('display', '');
            $("#spry2 .spry2ul li").hover(function () {
                $(this).addClass(' hover');
            }, function () {
                if (selectindex2 != $(this).index()) $(this).removeClass(' hover')
            });
            $("#spry2 .spry2ul li").click(function () {
                selectindex2 = $(this).index();
                $(this).parent().children().removeClass('hover').eq(selectindex2).addClass('hover');
                $(".spry2content div").css('display', 'none').eq(selectindex2).css('display', '');
            });
			$(".dl_3 dd").mouseover(function() {
        $(this).css("background-color", "#f2f2f2");
    });
    $(".dl_3 dd").mouseout(function() {
        $(this).css("background-color", "");
    });
        
        })