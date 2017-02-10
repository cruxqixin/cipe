$(function(){
	$("#tab1 tr:odd").css("background","none");
	$("#table01 tr:odd").css("background-color","#fbe5e4");
	$("#table01 tr:even").css("background-color","#f5f5f5");
	$("#table01 tr:first").css("background-color","#fff");
	$("#table01 tr td:first").css("padding-left","0");
	$("#table02 tr td:first").css("padding-left","0");
	$("#table03 tr td:first").css("padding-left","0");
	$("#table02 tr:odd").css("background-color","#fbe5e4");
	$("#table02 tr:even").css("background-color","#f5f5f5");
	$("#table02 tr:first").css("background-color","#fff");
	$("#table03 tr:odd").css("background-color","#fbe5e4");
	$("#table03 tr:even").css("background-color","#f5f5f5");
	$("#table03 tr:first").css("background-color","#fff");
	$('#table03 tr:eq(1)').css("background-color","#c7000a");
	$('#table02 tr:eq(1)').css("background-color","#c7000a");
	$('#table01 tr:eq(1)').css("background-color","#c7000a");
	$('#table01 tr:eq(0)').css("height","80px");
	$('#table02 tr:eq(0)').css("height","80px");
	$('#table03 tr:eq(0)').css("height","80px");
	
	$("#menu li").click(function(){
		  $(this).attr("class","current").siblings().attr("class","");
		  $("#menu_content .foodBox").eq($(this).index()).show().siblings().hide();	
	    })
		
	$("#new li").click(function(){
		  $(this).attr("class","current1").siblings().attr("class","");
		  $("#new_content .visitBox").eq($(this).index()).show().siblings().hide();	
	    })
	$("#visit li").click(function(){
		  $(this).attr("class","current1").siblings().attr("class","");
		  $("#visit_content .visitBox").eq($(this).index()).show().siblings().hide();	
	    })
	$("#busine li").click(function(){
		  $(this).attr("class","current1").siblings().attr("class","");
		  $("#busine_content .BusinessBox").eq($(this).index()).show().siblings().hide();	
	    })
	})
$(function(){ 
	$(window).scroll(function(){
		 var scrolltop=$(window).scrollTop();
		 $("[class=theme]").stop().animate({top:scrolltop-700});  
	   })
	$("#weixin").hover(function(){
		$("#wei").show();
	},function(){
		$("#wei").hide();
	})
	$("#tab1 tr:odd").css("background","none");
	$("#menu1 li:odd").css("padding-right","0");
	$("#menu1 ul li").mousemove(function(){
		  $(this).attr("class","current2").siblings().attr("class","");
		  $(".active").hide();
		  $(".showLi").show();
		  $(this).find(".active").show(); 
		  $(this).find(".showLi").hide(); 
		  $(".server_07 .con").eq($(this).index()).show().siblings().hide();  
		})
	$(".title a").hover(function() {
		$(this).css({'color' : '#c7000a'});
		} , function() {
			$(this).css({'color' : '#4c4c4c'});
		})
	})

$(function(){
	$('#logistics tr:even').css("background-color","#fbe5e4");
	$('#online li:last').css("margin-right","0px");
	$("#online li").click(function(){
		  $(this).attr("class","current").siblings().attr("class","");
		  $("#online_content .online").eq($(this).index()).show().siblings().hide();	
	    })
	$("#logistics tr:first").css({
		  "background-color": "#e84a3f",
		  "font-weight":"bold",
		  "color":"#fff",
		  "text-align":"center",
		  "text-indent":"0px"
	  });
	$('#logistics1 tr:even').css("background-color","#fbe5e4");
	$("#logistics1 tr:first").css({
		  "background-color": "#e84a3f",
		  "font-weight":"bold",
		  "color":"#fff",
		  "text-align":"center",
		  "text-indent":"0px"
	  });
	$('#logistics2 tr:even').css("background-color","#fbe5e4");
	$("#logistics2 tr:first").css({
		  "background-color": "#e84a3f",
		  "font-weight":"bold",
		  "color":"#fff",
		  "text-align":"center",
		  "text-indent":"0px"
	  });
	$('#logistics4 tr:even').css("background-color","#fbe5e4");
	$("#logistics4 tr:first").css({
		  "background-color": "#e84a3f",
		  "font-weight":"bold",
		  "color":"#fff",
		  "text-align":"center",
		  "text-indent":"0px"
	  });
        $('.detailBox li').each(function(){
            $(this).hover(function(){
                $(this).children('.detailBox li .active').stop(true).animate({top:'0px'});
            },function(){
                $(this).children('.detailBox li .active').stop(true).animate({top:'-188px'});
            })
        })  
		$('#theme li').each(function(){
            $(this).hover(function(){
                $(this).children('.theme .activeimg').stop(true).animate({top:'0px'});
            },function(){
                $(this).children('.theme li .activeimg').stop(true).animate({top:'-70px'});
            })
        })        
    })

$(document).ready(function(){
//Larger thumbnail preview 
	$(".menuBox li").hover(function() {
		$(this).css({'z-index' : '10'});
		$(this).find(".icon").addClass("hover").stop().animate({
			marginTop: '0px', 
			marginLeft: '0px', 
			top: '0', 
			left: '0', 
			width: '130px', 
			height: '130px'
		})
		},function() {
		$(this).css({'z-index' : '0'});
		$(this).find('.icon').removeClass("hover").stop()
		.animate({
			marginTop: '30px', 
			marginLeft: '30px',
			top: '0', 
			left: '0', 
			width: '70px', 
			height: '70px' 
		})
	})
//Swap Image on Click
})






