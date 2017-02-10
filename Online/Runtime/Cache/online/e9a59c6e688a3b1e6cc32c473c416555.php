<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_产品列表</title>
<link href="/css/Online/index.css" rel="stylesheet" type="text/css" />
<link href="/css/Online/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/Online/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#news li").click(function(){
	  $(this).attr("class","current").siblings().attr("class","");
	  $("#news_content .fixnone").eq($(this).index()).show().siblings().hide();	
	})
})
$(function(){
	$("#tech li").click(function(){
	  $(this).attr("class","current").siblings().attr("class","");
	  $("#tech_content .fixnone").eq($(this).index()).show().siblings().hide();	
	})
})

$(function(){
	
	$(".triumphBox").height($(document).height());
	    $(".dx_display06").click(function(){
		  $(".triumphBox").show();
	  }) 
	 $(".dx_delete img").click(function(){
		   $(".triumphBox").hide();
	   }) 
	$(".dx_delete05 .dx_btn").click(function(){
		   $(".triumphBox").hide();
	   }) 
})
</script>
</head>

<body>

<script type="text/javascript" src="/js/Online/common1.js" language="javascript"></script>


<div class="topbg">
  <div class="container">
      <div class="logo"><a href="http://www.kjtxw.com/"><img src="/images/Online/logo.jpg"></a></div>
      <div class="top_right">
          <div class="navbar">
             <div class="left">
			 <?php if($user['id'] == ''): ?><a href="/online.php/index/login?returnurl=/online.php/index/detail" target="_self">登录</a><!-- <a href="<?php echo U2('Keji/User/register');?>?url=/online.php/index/detail" target="_self">免费注册</a> --></div>
             <?php else: ?>
			  <a href="/online.php/index/detail"><?php echo ($user['nickname']); ?></a><a href="/online.php/user/logout" target="_self">退出</a></div><?php endif; ?>
			 <div class="right"></div>
             <div class="clear"></div>
          </div>
          <div class="top_list">
             <img src="/images/Online/online_banner.gif">
            
          </div>
      </div>
      <div class="clear"></div>
  </div>
</div>
 

<div class="headbg">
</div>
<div class="navBox">
	<ul>
    	<li><a href="<?php echo U('index/index');?>" class="currentA" target="_self">首页</a></li>
        <!-- <li><a href="#">会议申请</a></li>
        <li><a href="#">在线会议室</a></li> -->
    </ul>
</div>
<div class="mainBox">
    <h5>当前位置： <a href="<?php echo U('index/index');?>" target="_self">首页</a> ><span> 我的对接</span></h5>
    <div class="joint" style="height:auto;">
	<div class="index1_04">
          <ul id="news">
          <!-- 隐藏对接及日历 -->
             <!-- <li ><a href="<?php echo U('schedule/schedule_accept');?>"  target="_self">已接收预约</a></li>
          	 <li ><a href="<?php echo U('index/calendar');?>" target="_self">对接日历</a></li>
          	 <li ><a href="<?php echo U('schedule/schedule_apply');?>" target="_self">已提交预约</a></li>
          	 <li ><a href="<?php echo U('schedule/schedule_reject');?>" target="_self">被拒绝预约</a></li> -->
          	 <li ><a href="<?php echo U('index/detail');?>" target="_self">基础资料</a></li>
          	 <li class="current">产品展示</li>
          </ul>
          </div>
          <div class="index1_05" id="news_content">

              <div class="fixnone" style="display:block; height:640px;">
              	<div class="dx_display">
              	<?php foreach ($productList as $k=>$v){ ?>
                	<a href="<?php echo U('product/info/'.$v["id"]);?>"><div class="dx_display01">
                    	<img src="<?php echo $v['pic'] ? $v['pic'] : '/images/Online/bz.jpg' ; ?>">
                        <div class="dx_display02">
                        	<div class="dx_display03">
                            	<p><?php echo ($v['product_name']); ?></p>
                            </div></a>
                            <div class="dx_display04">
                            	<a href="<?php echo U('product/edit/'.$v["id"]);?>"><div class="dx_display05">
                                </div></a>
                                <div class="dx_display06">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    
                    <div class="dx_display01">
                    	<a href="<?php echo U('product/add');?>"><img src="/images/Online/dx_09.png"></a>
                    </div>
                </div>
              </div>
             <div class="dx_yeshu">
               	<div class="dx_yeshu01">
                	<ul>
                	<?php echo ($userList['html']); ?>
                    	<!-- <li><p>共有 36 个产品，当前第<span> 1</span> /4页</p></li>
                        <li><a href="">下一页</a></li>
                        <li><a href="">尾页</a></li> -->
                    </ul>
                </div>
               </div>
              
              
              
              
              
          </div>  
       </div>
    </div>
</div>



<div class="triumphBox">
  <div class="triumph">
    <div class="triumph01">
     <div class="triumph02">
      	<div class="dx_delete">
        	<div class="dx_delete01">
            	<p>删除产品</p>
                <a href="#"><img src="/images/Online/dx_11.png"></a>
            </div>
            <div class="dx_delete02">
            	<img src="/images/Online/dx_10.png">
            </div>
            <div class="dx_delete03">
            	<div class="dx_delete04">
                	<input type="button" value="确认删除" class="dx_btn" onclick="confirm_submit(<?php echo ($v['id']); ?>);">
                </div>
                <div class="dx_delete05">
                	<input type="button" value="取消返回" class="dx_btn">
                </div>
            </div>
        </div>
    </div>
    
    </div>
  </div>
</div>
<script type="text/javascript">
//删除
function confirm_submit(pid){
	$.post("<?php echo U('product/delete');?>", {pid} , function(msg){
   		//alert('操作成功');
	   	location.reload();
	});
}
</script>

<div class="footerbg">
   <div class="container">
       <div class="footer">
          <!--<div class="foot"><a href="#">关于我们</a>|<a href="#">广告咨询</a>|<a href="#">帮助信息</a>|<a href="#">联系我们</a>|<a href="#">会员服务</a>|<a href="#">网站导航</a>|<a href="#">国际站</a></div>-->
          <p>我们的网站：<a href="<?php echo U2('Keji/index/plate');?>">平台介绍</a>|
		                  <a href="<?php echo U('News/Products/index');?>">产品商贸网</a>|
						  <a href="<?php echo U2('advisory/zixun/index');?>">咨询评估</a>|
						  <a href="<?php echo U2('chxin/chxin/index');?>">创新实验平台</a>|
						    <a href="<?php echo U2('data/data/index');?>">资料库</a>|
							 <a href="http://business.kjtxw.com/business.html">招商</a>|
						 <a href="<?php echo U2('News/Activity/home');?>" >会展</a>						 
		</p>
          <p>客服热线： 022-58625029   客服传真： 022-58168885    业务：58625081 备案号：津ICP备14001671号-4 </p>
           <P>版权所有：天津宇航光电会议服务中心</P>
		   <P>技术支持：天津市阳光盛强网络科技有限公司</P>
		  <P>&nbsp;</P>
          <P>&nbsp;</P>
         

       </div>
   </div>
</div>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?bfcb489a47ef98fb35f99b36c3a1fc69";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
  
})();

</script>
<script>
$(function(){
    $("a").each(function(){
		if($(this).attr("title")=="站长统计"){
			$(this).css({"display":"block","text-align":"center"});
		}
	})
	
})
</script>
<script src="http://s4.cnzz.com/stat.php?id=1254713230&web_id=1254713230" language="JavaScript"></script>
</body>
</html>