<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_对接日历</title>
<link href="/css/Online/index.css" rel="stylesheet" type="text/css" />
<link href="/css/Online/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/Online/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/Online/index.js"></script>
<script>
	$(function(){
	   $(".falg").click(function(){
		  var html=$(".search-01 .lie");
		  if(html.is(":hidden"))
		  {
			 html.show();  
		  } 
		  else
		  {
			  html.hide();  
		  }  
	   }) 
	   $(".search-01 .lie").find("a").click(function(){
		   $(".txt_bg").val($(this).html());
		   $(".search-01 .lie").hide();
		}) 
	})
	$(function(){
		$("#name-0").click(function(){
			$(".show").show();
			})
		$(".time_block").click(function(){
			$(".show").hide();
			})	
	})
	$(function(){
            var $timeBox = $(".time_block");
            $timeBox.click(function(){
                $(this).toggleClass("on");
                if($(this).find("input")[0].value == 0){
                	$(this).find("input")[0].value = 1;
                }else{
                	$(this).find("input")[0].value = 0;
                }
            });  
        });
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
    <div class="joint" style="height:670px;">
        <ul  id="nTabs2">
            <li ><a href="<?php echo U('schedule/schedule_accept');?>" target="_self">已接收预约</a></li>
            <li class="currentLi" ><a >对接日历</a></li>
            <li ><a href="<?php echo U('schedule/schedule_apply');?>" target="_self">已提交预约</a></li>
            <li ><a href="<?php echo U('schedule/schedule_reject');?>" target="_self">被拒绝预约</a></li>
            <li ><a href="<?php echo U('index/detail');?>" target="_self">基础资料</a></li>
            <li ><a href="<?php echo U('product/lists');?>" target="_self">产品展示</a></li>
        </ul>
        <style>
    .ta{
        display:none;
    }
    .on .ta{
        display: inline;
    }
    .on .me{
        display: none;
    }
</style>
        <div class="list">
            <div id="nTabs2_Content1" >
            	<div class="company-08 joint-01">
                    <div class="company-07">
	                    <form action="<?php echo U('index/calendar');?>" id="form1" method="post"  target="_self">
	                    <h1  style="margin-left: -12px;">请确定对接时间（红色为不可预约时间，绿色为可预约时间）</h1>
	                    <?php
 foreach($dayConfig as $day_k => $day_v){ ?>
	                        <dl>
	                            <dd><?php echo ($day_v); ?></dd>
	                            <dt>
	                            <?php
 foreach($timeConfig as $time_k => $time_v){ ?>
	                            	<a href="javascript:void(0);" class="time_block" target="_self">
	                            	<img class="me" src="/images/Online/icon_<?php echo ($calendarListDay[$day_k][$time_k]['status']==1? 'green' : 'red'); ?>.jpg" />
	                            	<img class="ta" src="/images/Online/icon_<?php echo ($calendarListDay[$day_k][$time_k]['status']==1? 'red' : 'green'); ?>.jpg" />
	                            	&nbsp;&nbsp;<?php echo ($time_v); ?>
	                            	<input name="calendar_<?php echo ($calendarListDay[$day_k][$time_k]['id']); ?>" type='hidden' value="<?php echo ($calendarListDay[$day_k][$time_k]['status']); ?>"/>
	                            	</a>
	                            <?php
 } ?>
	                            </dt>
	                        </dl>
	                    <?php
 } ?>
	                        <div class="but-box">
	                        	<input type="submit" value="保存修改" />
	                        </div>
	                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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