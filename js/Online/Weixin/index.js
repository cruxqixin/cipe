// JavaScript Document
$(function(){
 $(".branch01 ul li:last").css("border-right","none");
 $(".branch01 ul li").click(function(){
	 $(this).attr("class","current").siblings().attr("class","")
	 })
	})
$(function(){
	$(".infor ul li .text03:last").css("border-bottom","1px solid #ccc")
	
	})
$(function(){
	$(".vote03 ul li .click02").each(function() {
        $(this).click(function(){
				if($(this).find(".show02").attr("style")=="display:none"){
					$(this).find(".hide05").attr("style","display:none");
					$(this).find(".show02").attr("style","display:inline");
					}else{
						$(this).find(".hide05").attr("style","display:inline");
						$(this).find(".show02").attr("style","display:none");
						}
				
				
				})
    })
	  })
