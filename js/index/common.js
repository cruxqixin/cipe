 
$(function(){
   	
	   $("#menu li").mouseover(function(){
		
		  $(this).find(".subnav").show(); 
		      
	    })
	     $("#menu li").mouseout(function(){
		  $(this).find(".currentA").attr("class","link");
		  $(this).find(".subnav").hide();     
	    })
	
	   $(".culture_01 ul li").click(function(){
		 $(this).attr("class","active").siblings().attr("class","normal");
		 $(".culture_03 .content").eq($(this).index()).show().siblings().hide();   
	   })
	    
})


 

$(function(){
	$(".menu-left04").click(function(){
		$(".menu-left4").show();
		})
	$("menu-left05").click(function(){
		$(".menu-left4").hide();
		})
	
	})