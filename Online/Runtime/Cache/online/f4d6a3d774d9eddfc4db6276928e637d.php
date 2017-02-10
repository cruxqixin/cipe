<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_已接收预约</title>
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
	$(".show").click(function(){
		$(".show").hide();
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
    <div class="joint">
        <ul  id="nTabs2">
            <li class="currentLi"><a >已接收预约</a></li>
            <li ><a href="<?php echo U('index/calendar');?>" target="_self">对接日历</a></li>
            <li ><a href="<?php echo U('schedule/schedule_apply');?>" target="_self">已提交预约</a></li>
            <li ><a href="<?php echo U('schedule/schedule_reject');?>" target="_self">被拒绝预约</a></li>
            <li ><a href="<?php echo U('index/detail');?>" target="_self">基础资料</a></li>
            <li ><a href="<?php echo U('product/lists');?>" target="_self">产品展示</a></li>
        </ul>
        <div class="list">
            <div id="nTabs2_Content0">
                <table width="974" border="1" bordercolor="#f5f5f5" cellspacing="0">
                    <tbody>
                        <tr class="top-tab">
                            <td width="235">预约时间</td>
                            <td width="460">对接人</td>
                            <td>操作</td>
                        </tr>
                        <?php
 $i = 0; foreach($scheduleList as $k => $v){ $i++; ?>
                        <tr class="top-tab<?php echo ($i%2+1); ?>">
                            <td ><?php echo ($dayConfig[$calendarListKV[$v['calendar_id']]['day_id']]); ?>  <?php echo ($timeConfig[$calendarListKV[$v['calendar_id']]['time_id']]); ?></td>
                            <td ><a href="<?php echo U('index/info/'.$v['uid']);?>"><?php echo ($v['uname']); ?></a></td>
                            <?php if($v['status'] == 0){ ?>
                            <td><input type="button" class="but2" value="已拒绝" /></td>
                            <?php }elseif($v['status'] == 1){ ?>
                            <td>
                            	<input type="button" value="确  认" class="but2 green-but" onclick="confirm_submit(<?php echo ($v['id']); ?>,2);">&nbsp;&nbsp;&nbsp;&nbsp;
                            	<input type="button" value="拒绝预约" class="but2" onclick="confirm_submit(<?php echo ($v['id']); ?>,0);">
                            </td>
                            <?php }else{ ?>
                            <td><input type="button" class="but2 green-but" value="已确认" /></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="page">
				<?php echo ($page); ?>
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
<script type="text/javascript">
//删除
function confirm_submit(schedule_id,action_type){
	$.post("<?php echo U('schedule/handleSchedule');?>", {schedule_id : schedule_id, action_type : action_type} , function(msg){
   		alert('操作成功');
	   	location.reload();
	});
}
</script>
</body>
</html>