<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理_<?php echo C('site_name');?></title>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<script language="javascript" type="text/javascript" src="/Public/statics/js/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/Public/statics/js/common.js"></script>
<link rel='stylesheet' type='text/css' href='/Public/statics/css/admin_style.css'>
<link rel='stylesheet' type='text/css' href='/Public/statics/css/admin_index.css'> 
<link rel='stylesheet' type='text/css' href='/Public/statics/css/admin_top.css'>
<link rel='stylesheet' type='text/css' href='/Public/statics/css/dialog.css'>

<script type="text/javascript">if(self!=top){top.location=self.location;}</script> 
<script type="text/javascript">
	$(document).ready(function(){
		$("#delcache").click(function(){
			$.post("<?php echo u('Index/delcache');?>", null, function(data){
				$("#cache").show();
				$("#cache").html(' <font color=#ff0000>'+data.data+'</font>');
				window.setTimeout(function(){
					$("#cache").hide();
				},2000);
			},"json");
			return false;			
		});

		if("<?php echo C('new_visit');?>" == "1"){
			window.open("<?php echo U('Setting/index');?>",target="main");
		}
		
		$('.leftnav ul li').click(function(){
			$('.leftnav ul li').removeClass('thisclass');
			$(this).addClass('thisclass');
			var str = $(this).text()+' >';
			$('#current').html(str);
		})
	});
</script>

</head>
<body scroll='no'>
<div class="topnav">
  <div class="sitenav">
    <div class="welcome">您好：<span class="username"><?php echo ($user_name); ?> </span>，欢迎使用<?php echo C('site_name');?>。 </div>
 
   </div>
   <div style=" clear:both;"></div>
  </div> 
<div style=" clear:both;"></div>
  <div class="leftnav">
    <ul>
      <li class="navleft"></li>
      <li style="margin-left: -1px"><a href="<?php echo U('Config/base');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>config));?>');">系统设置</a></li>
     <!-- <li><a href="<?php echo U('Items/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>detail));?>');">商品管理</a></li>
      <li><a href="<?php echo U('Shop/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>shop));?>');">店铺管理</a></li> -->
      <li style="display:none"><a href="<?php echo U('Project/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>article));?>');">项目管理</a></li>
      <li style="display:none"><a href="<?php echo U('Experts/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>experts));?>');">专家管理</a></li>
       <li style="display:none"><a href="<?php echo U('User/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>user));?>');">用户管理</a></li>
	   <li style="display:none"><a href="<?php echo U('Rongzi/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>rz));?>');">融资管理</a></li>
	  <li><a href="<?php echo U('News/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>News));?>');">新闻维护</a></li>
	  <li><a href="<?php echo U('Theme/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>hy));?>');">主题管理</a></li>
	  <li><a href="<?php echo U('Media/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>media));?>');">合作媒体</a></li>
	  <li><a href="<?php echo U('Travel/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>tra));?>');">商旅中心</a></li>
	  <li><a href="<?php echo U('Visit/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>visit));?>');">参观指南</a></li>
	  <li><a href="<?php echo U('YqLink/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>link));?>');">友情链接</a></li>
	  <li><a href="<?php echo U('Ad/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>ad));?>');">Banner图</a></li>
     <li><a href="<?php echo U('Down/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>down));?>');">下载中心</a></li>
     <li><a href="<?php echo U('Activity/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>act));?>');">活动列表</a></li>
     <li><a href="<?php echo U('League/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>Lea));?>');">产业联盟</a></li>
	 <li style="display:none"><a href="<?php echo U('Business/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>zs));?>');">招商管理</a></li>
	
	   <li style="display:none"><a href="<?php echo U('Tiyi/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>ly));?>');">留言管理</a></li>
	   <li style="display:none"><a href="<?php echo U('Service/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>xq));?>');">需求管理</a></li>
	    <li style="display:none"><a href="<?php echo U('Conference/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>lh));?>');">联合办会</a></li>
	   
	   
	   <li style="display:none"><a href="<?php echo U('sugges/index?type=3');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>sugges));?>');">咨询管理</a></li>
		<li style="display:none"><a href="<?php echo U('Datae/video');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>date));?>');">资料管理</a></li>
	   
	    <li style="display:none"><a href="<?php echo U('Manuscript/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>gj));?>');">稿件管理</a></li>
	   <li style="display:none"><a href="<?php echo U('JDreport/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>jd));?>');">监督举报</a></li>
	   
	   <li style="display:none"><a href="<?php echo U('Special/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>sp));?>');">专题管理</a></li>
	   <li style="display:none"><a href="<?php echo U('Special/zthy');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>ad));?>');">广告管理</a></li>
    <!--  <li><a href="<?php echo U('Theme/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>tpl));?>');">模板管理</a></li> -->
<!--      <li><a href="<?php echo U('Link/index');?>" target="main" onClick="left('<?php echo U('Index/left',array('id'=>extend));?>');">扩展管理</a></li> -->
      <li style="margin-right: -1px"><a href="<?php echo U('Login/logout');?>" target="_parent">注销登录</a></li>
      <li class="navright"></li>
    </ul>
  </div>
</div>
<div id="Maincontent" style="margin: auto; clear:both;">
  <div id="leftMenu">
  <iframe src="<?php echo U('Index/left');?>" id="leftfra" name="leftfra" frameborder="0" scrolling="no"  style="border:none" width="100%" height="100%" ></iframe>
  </div>
  <div id="mainNav">
  <div class="cur_position"><div class="cur">当前位置：<span id='current'></span></div></div>
  <div class="mframe" style="position:relative; overflow:hidden">
 <iframe name="main" id="main" src="<?php echo U('Index/main');?>" frameborder="false" scrolling="auto" style="border:none; margin-bottom:10px;"  width="100%" height="100%" ></iframe>
  </div>
 </div> 
</div> 
<script type="text/javascript"> 
//clientHeight-0; 空白值 iframe自适应高度
function windowW(){
	if($(window).width()<980){
			$('#Maincontent').css('width',980+'px');
            $('.topnav').css('width',980+'px');
			$('body').attr('scroll','');
			$('body').css('overflow','');
	}
}
windowW();

$(window).resize(function(){
	if($(window).width()<980){
		windowW();
	}else{
        $('.topnav').css('width','');
		$('#Maincontent').css('width',100+'%');
		$('body').attr('scroll','no');
		$('body').css('overflow','hidden');

	}
});

window.onresize = function(){
	var heights = document.documentElement.clientHeight-150;document.getElementById('main').height = heights;
	var openClose = $("#main").height()+39;
}
window.onresize();
</script>
</body>
</html>