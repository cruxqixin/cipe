// JavaScript Document
$(document).ready(function () {
        $(".nav2 dl").css("display", "none");
        $("#nav1 dd").hover(function () {
            $(this).children("a").css("display", "none");
            $(".nav2 dl").css("display", "none");
            if ($(this).attr("id") == 3)
                $("#n" + $(this).attr("id")).css("left", $(this).position().left + "px");
            else
                $("#n" + $(this).attr("id")).css("left", $(this).position().left - 18 + "px");

            $("#n" + $(this).attr("id")).css("display", "block");
        }, function () { $(this).children("a").css("display", "block"); });
        $(".nav2 dl").hover(function () { $("#nva1") }, function () { $(this).css("display", "none") })

    });