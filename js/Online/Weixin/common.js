$(function(){
	$(".member04 ul li:last").css("border-bottom","none")
	$(".information01 ul li .text03:last").css("border-bottom","none")
})
$(function(){
	$(".address ul li:last").css("border-bottom","none")
 $(".goodNews ul li").click(function(){
	 $(this).attr("class","current").siblings().attr("class","")
	 })
	 
	 
/*	 $(".task-content li .picon").click(function(){
				if($(this).find(".show").attr("style")=="display:none"){
					$(this).find(".hiden").attr("style","display:none");
					$(this).find(".show").attr("style","display:inline");
					
					}else{
						
						$(this).find(".hiden").attr("style","display:inline");
						$(this).find(".show").attr("style","display:none");
						}
				
				
				})*/
				
				
		$(".pop-upBox").height($(document).height());
	    $(".but01").click(function(){
		  $(".pop-upBox").show();
		  $(".pop-upBox").height($(document).height());
	  }) 
	 $(".close").click(function(){
		   $(".pop-upBox").hide();
	   }) 
})


$(function(){
	$(".link01").click(function(){
		$(this).css("background-color","#ededed");
		$(this).html("已签到");
		$(this).css("color","#949494");
		})
})

/*======================*/
$(function(){
	$(".basicBox dl dt .icon04").each(function() {
        $(this).click(function(){
				if($(this).find(".show02").attr("style")=="display:none"){
					$(this).find(".hide02").attr("style","display:none");
					$(this).find(".show02").attr("style","display:inline");
                      $(this).find("p").css("color","#595959");  
           
					
					}else{
						$(this).find(".hide02").attr("style","display:inline");
						$(this).find(".show02").attr("style","display:none");
                           $(this ).find("p").css("color","#21292b");
                 
						}
				
				
				})
    })
	
	});
$(function(){
	$(".basicBox ul li .cash02-content").each(function() {
        $(this).click(function(){
				if($(this).find(".show03").attr("style")=="display:none"){
					$(this).find(".hide03").attr("style","display:none");
					$(this).find(".show03").attr("style","display:inline");
                   
           
					
					}else{
						$(this).find(".hide03").attr("style","display:inline");
						$(this).find(".show03").attr("style","display:none");
                          
                 
						}
				
				
				})
    })
	
	});



$(function(){
		$(".basicBox dl dt .box01 .search04 .but07").click(function(){
		  var html=$(".search04 .line");
		  if(html.is(":hidden"))
		  {
			 html.show();  
		  } 
		  else
		  {
			  html.hide();  
		  }  
	   }) 
	   $(".search04 .line").find("a").click(function(){
		   $(".search04 span").val($(this).html());
		   $(".search04 .line").hide();
		})   

})

        
$(function(){
	$("#counterdui").click(function(){
		  $(".counterShow").show();
		  $(".counterShow").height($(document).height());
	  }) 
	  $("#closeBut").click(function(){
		   $(".counterShow").hide();
	   }) 
})

$(function(){
	$("#counterdui-01").click(function(){
		  $(".counterShow").show();
		  $(".counterShow").height($(document).height());
	  }) 
	  $("#closeBut").click(function(){
		   $(".counterShow").hide();
	   }) 
})
$(function(){
	$("#btndui").click(function(){
		  $(".bank-card").show();
		  $(".bank-card").height($(document).height());
	  }) 
	  $("#closebox").click(function(){
		   $(".bank-card").hide();
	   }) 
})
$(function(){
	   $(".bank-card").find("a").click(function(){
		   $(".txt_bg").val($(this).html());
		   $(".bank-card").hide();
		}) 
	 
	})


$(function(){
 $(".redPaper01").height($(document).height());
$(".redPaper").height($(document).height());

	})


$(function(){
 $(".detail").each(function(i){
	  $(this).click(function(){
		  
			var html=$("[class=text01]").eq(i);
			 if(html.is(":hidden"))
		  {
			 html.show();
			  $(".menu01").eq(i).show();
			   $(".menu").eq(i).hide();
			 $(".packet-content").eq(i).css("border-bottom","1px solid #999999");
		  } 
		  else
		  {
			  html.hide();
			  $(".menu").eq(i).show();
			  $(".menu01").eq(i).hide();
			  $(".packet-content").eq(i).css("border-bottom","none");
		  } 
		  })
	 })
 
	})




/*===========================zhj==================*/
$(function(){
		$(".all .butt01").click(function(){
		  var html=$(".all .line02");
		  if(html.is(":hidden"))
		  {
			 html.show();  
		  } 
		  else
		  {
			  html.hide();  
		  }  
	   }) 
	   $(".all .line02").find("a").click(function(){
		   $(".all .p").val($(this).html());
		   $(".all .line02").hide();
		})   

})
$(function(){
     $(".steel01 ul li:last").css("border-bottom","none");
	$(".activity02 ul li:first").css("border-top","none");
 $(".activity ul li").click(function(){
	 $(this).attr("class","current").siblings().attr("class","")
	 })
 })
 
 $(function(){
  $(".footer table tr td a").mouseover(function(){
	  $(this).find(".pich").show();
	  $(this).find(".pic").hide();
	  $(this).attr("class","cur");   
   })
   $(".footer table tr td a").mouseout(function(){
	  $(this).find(".pich").hide();
	  $(this).find(".pic").show();
	  $(this).attr("class","");   
	  
        })

    })
	
$(function(){
 $(".city01 ul li").click(function(){
	 $(this).attr("class","current").siblings().attr("class","")
	 })	
	 })	
	 
 $(function(){
		 $(".clickBox").height($(document).height());
	    $(".download05").click(function(){
		  $(".clickBox").show();
		  $(".clickBox").height($(document).height());
	  }) 
	 $(".close").click(function(){
		   $(".pop-upBox").hide();
	   }) 

		 
		 
		 })
		 
		 
		 
		 
		 
		 
$(function(){
   
 $(".activitytt ul li").click(function(){
	 $(this).attr("class","current").siblings().attr("class","")
	 })
 })		 
		 
		 
		 
		 
		 
		 
		 
$(function(){
		$(".Telephone-right04").click(function(){
		 $(".Telephone-right05").show();
		
	   }) 
	 
	   $(".Telephone-right05").click(function(){
		  
		   $(".Telephone-right04").show();
		   $(".Telephone-right05").hide();
		   
		
		}) 

}) 


$(function(){
		$(".Telephone-right06").click(function(){
		 $(".Telephone-right07").show();
		
	   }) 
	 
	   $(".Telephone-right07").click(function(){
		  
		   $(".Telephone-right06").show();
		   $(".Telephone-right07").hide();
		   
		
		}) 

}) 

$(function(){
		$(".Telephone-right08").click(function(){
		 $(".Telephone-right09").show();
		
	   }) 
	 
	   $(".Telephone-right09").click(function(){
		  
		   $(".Telephone-right08").show();
		   $(".Telephone-right09").hide();
		   
		
		}) 

}) 

$(function(){
		$(".Telephone-right10").click(function(){
		 $(".Telephone-right11").show();
		
	   }) 
	 
	   $(".Telephone-right11").click(function(){
		  
		   $(".Telephone-right10").show();
		   $(".Telephone-right11").hide();
		   
		
		}) 

}) 









$(function(){
		$(".dianji").click(function(){
		  var html=$(".postt");
		  if(html.is(":hidden"))
		  {
			 html.show();  
		  } 
		  else
		  {
			  html.hide();  
		  }  
	   }) 
	   
	
	  
})





$(function(){
		$(".bianji03").click(function(){
		  var html=$(".anniu");
		  if(html.is(":hidden"))
		  {
			 html.show();  
		  } 
		  else
		  {
			  html.hide();  
		  }  
	   }) 
	  

})



$(function(){
		$(".answer09tt").click(function(){
		 $(".huifuttcc").show();
		 $(".answer09tt").hide();
		 $(".hidettcc").show();
		
	   }) 
	 
	   $(".hidettcc").click(function(){
		  
		   $(".answer09tt").show();
		   $(".huifuttcc").hide();
		    $(".hidettcc").hide();
		   
		
		}) 

})




 
	 
/*******************************************************************************************************首页*/
$(function(){
   
 $(".pos02 ul li").click(function(){
	 $(this).attr("class","guang").siblings().attr("class","");
	  $(".pos03 .pos04").eq($(this).index()).show().siblings().hide();
	 })
 })		 
	
	 
	
$(function(){
   
 $(".time01 ul li").click(function(){
	 if($(this).data("status") == 1){
		 $(this).attr("class","red").siblings().attr("class","");
		 var t=$(this).data("value");
		 $("#calendar_id").val(t) ;

 	 }
 })

})
$(function(){
   
 $(".appointment-right01 ul li").click(function(){
	 $(this).attr("class","red").siblings().attr("class","")
	 })
 })

$(function(){
   
 $(".booking02 ul li").click(function(){
	 $(this).attr("class","red").siblings().attr("class","");
	 var tab = $(this).attr("title");
	 $("#" + tab).show().siblings().hide();
	 })
 })
	

$(function(){
		$(".leibie01").click(function(){
		 $(".pos").show();
		 $(".dakuang").hide();
		  $(".leibie01").hide();
		  $(".leibie01vv").show();
		
	   }) 
	 
	   $(".leibie01vv").click(function(){
		  
		  $(".pos").hide();
		 $(".dakuang").show();
		  $(".leibie01").show();
		  $(".leibie01vv").hide();
		   
		
		}) 

})



$(function(){
 $(".branch01 ul li:last").css("border-right","none");
 $(".branch01 ul li").click(function(){
	 $(this).attr("class","current").siblings().attr("class","")
	 })
	})
	
$(function(){
 $(".branch01tt ul li:last").css("border-right","none");
 $(".branch01tt ul li").click(function(){
	 $(this).attr("class","current").siblings().attr("class","")
	 })
	})
	
	
$(function(){
		$(".search05 .but10").click(function(){
		  var html=$(".search05 .line");
		  if(html.is(":hidden"))
		  {
			 html.show();  
		  } 
		  else
		  {
			  html.hide();  
		  }  
	   }) 
	   $(".search05 .line").find("a").click(function(){
		   $(".search05 span").val($(this).html());
		   $(".search05 .line").hide();
		})   
		
		

})    










   
  $(function(){
		$(".pos02 ul .guang").click(function(){
		 $(".pos02 ul li ul").show();
		 
		
	   }) 
	 
	   
})



$(function(){
$(".fangzu02").click(function(){
				if($(this).find(".show02tt").attr("style")=="display:none"){
					$(this).find(".hide01tt").attr("style","display:none");
					$(this).find(".show02tt").attr("style","display:inline");
           
           
					
					}else{
						$(this).find(".hide01tt").attr("style","display:inline");
						$(this).find(".show02tt").attr("style","display:none");
                         
						}
	});

});








$(function(){
	$("[chose_a=1]").each(function(){
		$(this).attr("src",$(this).data("b"));
	})
	$(".submit02gg").click(function(){
		var img=$(this).find("[name=chose_a]");
		
		if($("[chose_a=1]").size()>29&&img.attr("chose_a")=="0"){
			alert("超过30个了");
			return;
		}else{
			
			if(img.attr("chose_a")=="1"){
				img.attr("chose_a","0").attr("src",img.data("a"));
			}else{
				img.attr("chose_a","1").attr("src",img.data("b"));
			}
			var html='';
			$("[chose_a=1]").each(function(){
				html+=$(this).data("value")+','
			})
			$("#category").val( html);
		}	
	});

});


$(function(){
	 
	 $(".pos04 ul li").click(function(){
		 $(this).attr("class","youse").siblings().attr("class","")
		 })
		})
		
		
		
	$(function(){
	 
	 $(".pagination01 ul a").click(function(){
		 $(this).attr("class","yi").siblings().attr("class","")
		 })
		})

$(function() {
	$(".shijian ul li").click(function(){
			$(this).attr("class","red").siblings().attr("class","");
			var tab = $(this).attr("title");
			$("#" + tab).show().siblings().hide();
		})
})
			

$(function(){
   
 $(".shijiantt ul li").click(function(){
	 $(this).attr("class","red").siblings().attr("class","");
	 var tab = $(this).attr("title");
	 $("#" + tab).show().siblings().hide();
	 })
 })
$(function(){
		
	   $(".unfold04").click(function(){
		  
		   $(this).siblings(".unfold0401").show();
		   $(this).hide();
		   $(this).parents().siblings(".xiangmu").show();
		})  
	$(".unfold0401").click(function(){
		  
		   $(this).siblings(".unfold04").show();
		   $(this).hide();
		    $(this).parents().siblings(".xiangmu").hide();
		})    
		
		

})  