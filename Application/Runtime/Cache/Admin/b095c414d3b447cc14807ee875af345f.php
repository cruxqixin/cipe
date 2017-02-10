<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理_<?php echo C('site_name');?></title>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<script language="javascript" type="text/javascript" src="/Public/statics/js/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/Public/statics/js/common.js"></script>
<link rel='stylesheet' type='text/css' href='/Public/statics/css/admin_left.css'>
<script type="text/javascript">
	$(document).ready(function(){
		$('li').click(function(){
			$('li').find('a').removeClass('cur');
			$(this).find('a').addClass('cur');
		})
	});
</script>

</head>
<body>
<div class="menu">
<?php if($_GET['id'] == 'config'): ?><dl>
    <dt><a onClick="showHide('#config');" href="#" target="_self">系统设置</a></dt>
    <dd>
      <ul id="config">
      	<li><a class="cur" href="<?php echo U('Config/base');?>" target="main">网站信息设置</a></li>
      	<!--<li><a href="<?php echo U('Config/url');?>" target="main">访问路径设置</a></li> -->
      	<!--<li><a href="<?php echo U('Config/cache');?>" target="main">网站缓存设置</a></li>
      	<li><a href="<?php echo U('Config/appkey');?>" target="main">AppKey设置</a></li> -->
      <!--	<li><a href="<?php echo U('Config/attention');?>" target="main">关注我们设置</a></li>
      	<li><a href="<?php echo U('Push/index');?>" target="main">数据推送设置</a></li> -->
      </ul>
    </dd>	
  </dl>

<?php elseif($_GET['id'] == 'media'): ?>
  <dl>
    <dt><a onClick="showHide('#items');" href="#" target="_self">合作媒体</a></dt>
    <dd>
      <ul id="items">
        <li><a class="cur" href="<?php echo U('Media/index');?>" target="main">合作媒体列表</a></li>
        <li><a href="<?php echo U('Media/edit');?>" target="main">添加合作媒体</a></li>
       
      </ul>
    </dd>
  </dl>
  
  <dl>
    <dt><a onClick="showHide('#items_cate');" href="#" target="_self">媒体分类管理</a></dt>
    <dd>
      <ul id="items_cate">
        <li><a href="<?php echo U('Media/cate');?>" target="main">分类列表</a></li>
        <li><a href="<?php echo U('Media/cateEdit');?>" target="main">添加分类</a></li>
      </ul>
    </dd>
  </dl>

<?php elseif($_GET['id'] == 'tra'): ?>
  <dl>
    <dt><a onClick="showHide('#tra');" href="#" target="_self">商旅管理</a></dt>
    <dd>
      <ul id="tra">
        <li><a class="cur" href="<?php echo U('Travel/index');?>" target="main">商旅列表</a></li>
        <li><a href="<?php echo U('Travel/edit');?>" target="main">添加</a></li>     
      </ul>
    </dd>
  </dl> 
  <?php elseif($_GET['id'] == 'visit'): ?>
  <dl>
    <dt><a onClick="showHide('#vis');" href="#" target="_self">参观指南</a></dt>
    <dd>
      <ul id="vis">
        <li><a class="cur" href="<?php echo U('Visit/index');?>" target="main">参观指南</a></li>
        <li><a  href="<?php echo U('Visit/list_b');?>" target="main">展商报名列表</a></li>
        <li><a  href="<?php echo U('Visit/list_c');?>" target="main">观众报名列表</a></li>
        <li><a  href="<?php echo U('Visit/list_m');?>" target="main">媒体报名列表</a></li>
        <li><a  href="<?php echo U('Visit/list_be');?>" target="main">英文展商报名列表</a></li>
        <li><a  href="<?php echo U('Visit/list_ce');?>" target="main">英文观众报名列表</a></li>
        <li style="display:none"><a href="<?php echo U('Visit/edit');?>" target="main">添加参观指南</a></li>     
      </ul>
    </dd>
  </dl>
  <?php elseif($_GET['id'] == 'link'): ?>
  <dl>
    <dt><a onClick="showHide('#vis');" href="#" target="_self">友情链接</a></dt>
    <dd>
      <ul id="vis">
        <li><a class="cur" href="<?php echo U('YqLink/index');?>" target="main">友情链接</a></li>
        <li><a href="<?php echo U('YqLink/edit');?>" target="main">添加友情链接</a></li>
      </ul>
    </dd>
  </dl>
  <?php elseif($_GET['id'] == 'ad'): ?>
  <dl>
    <dt><a onClick="showHide('#ad');" href="#" target="_self">banner</a></dt>
    <dd>
      <ul id="vis">
        <li><a class="cur" href="<?php echo U('Ad/index');?>" target="main">头部banner列表</a></li>
        <li><a href="<?php echo U('Ad/edit');?>" target="main">添加头部banner</a></li>
		<li><a class="cur" href="<?php echo U('Ad/bottom');?>" target="main">底部banner列表</a></li>
        <li><a href="<?php echo U('Ad/editbot');?>" target="main">添加底部banner</a></li>		
      </ul>
    </dd>
  </dl>
<?php elseif($_GET['id'] == 'user'): ?>
  <dl>
    <dt><a onClick="showHide('#user');" href="#" target="_self">用户管理</a></dt>
    <dd>
	 
      <ul id="admin">
        <li><a href="<?php echo U('Admin/index');?>" target="main">管理员列表</a></li>
        <li style="display:none"><a href="<?php echo U('Admin/add');?>" target="main">添加管理员</a></li>      
      </ul>
   
    </dd>
  </dl> 
 

  <?php elseif($_GET['id'] == 'ly'): ?>
 <dl>
    <dt><a onClick="showHide('#ly');" href="#" target="_self">留言管理</a></dt>
    <dd>
      <ul id="ly">
        <li><a href="<?php echo U('Tiyi/index');?>" target="main">提议有礼</a></li>
        <li><a href="<?php echo U('Tiyi/QT');?>" target="main">意见反馈</a></li>
      </ul>
    </dd>
  </dl>
   <?php elseif($_GET['id'] == 'xq'): ?>
 <dl>
    <dt><a onClick="showHide('#xq');" href="#" target="_self">需求管理</a></dt>
    <dd>
      <ul id="ly">
        <li><a href="<?php echo U('Service/index');?>" target="main">需求列表</a></li>
        <li style="display:none"><a href="<?php echo U('Service/edit');?>" target="main">添加需求</a></li>
      </ul>
    </dd>
  </dl>
  <dl>
    <dt><a onClick="showHide('#xq');" href="#" target="_self">需求类型</a></dt>
    <dd>
      <ul id="ly">
        <li><a href="<?php echo U('Servicekind/index');?>" target="main">需求类型列表</a></li>
        <li><a href="<?php echo U('Servicekind/edit');?>" target="main">添加需求类型</a></li>
      </ul>
    </dd>
  </dl>
   <?php elseif($_GET['id'] == 'jd'): ?>
 <dl>
    <dt><a onClick="showHide('#jd');" href="#" target="_self">监督举报</a></dt>
    <dd>
      <ul id="jd">
      <!--  <li><a href="<?php echo U('Experts/indexx');?>" target="main">专家列表</a></li>-->
        <li><a href="<?php echo U('JDreport/index');?>" target="main">监督列表</a></li>
      </ul>
    </dd>
  </dl>

   <?php elseif($_GET['id'] == 'ad'): ?>
  <dl>
   <dt><a onClick="showHide('#ad');" href="#" target="_self">广告管理</a></dt>
    <dd>
      <ul id="ad">
        <li><a href="<?php echo U('Special/zthy');?>" target="main">广告列表</a></li>
        <li><a href="<?php echo U('Special/zthyedit');?>" target="main">广告维护</a></li>
      </ul>
    </dd>
	
 </dl>
  <?php elseif($_GET['id'] == 'order'): ?>
   <dl>
   <dt><a onClick="showHide('#ad');" href="#" target="_self">参会管理</a></dt>
    <dd>
      <ul id="ad">
        <li><a href="<?php echo U('Order/index');?>" target="main">参会列表</a></li>
		<li><a href="<?php echo U('Order/add');?>" target="main">添加参会</a></li>
      </ul>
    </dd>
	
 </dl>

 <?php elseif($_GET['id'] == 'hy'): ?>
   <dl>
   <dt><a onClick="showHide('#wd');" href="#" target="_self">主题管理</a></dt>
    <dd>
      <ul id="wd">
         <li><a href="<?php echo U('Theme/index');?>" target="main">主题列表</a></li>
		 <li><a href="<?php echo U('Theme/edit');?>" target="main">添加主题</a></li>
		
      </ul>
    </dd>
	<dt><a onClick="showHide('#hylx');" href="#" target="_self">主题类型</a></dt>
    <dd>
      <ul id="hylx">
         <li><a href="<?php echo U('Catgory/index');?>" target="main">主题类型</a></li>
		 <li><a href="<?php echo U('Catgory/edit');?>" target="main">添加主题类型</a></li>
		  
      </ul>
    </dd>
	<dt><a onClick="showHide('#hylx');" href="#" target="_self">展出范围</a></dt>
    <dd>
      <ul id="hylx">
         <li><a href="<?php echo U('Catgory/Exhibition');?>" target="main">展出范围</a></li>
		 <li><a href="<?php echo U('Catgory/ExhibitionEdit');?>" target="main">添加展出范围</a></li>
		  
      </ul>
    </dd>
	<dt><a onClick="showHide('#lig');" href="#" target="_self">大会亮点</a></dt>
    <dd>
      <ul id="lig">
         <li><a href="<?php echo U('Catgory/light');?>" target="main">大会亮点</a></li>
		 <li><a href="<?php echo U('Catgory/lightEdit');?>" target="main">添加亮点</a></li>
		  
      </ul>
    </dd>
	<dt><a onClick="showHide('#act');" href="#" target="_self">同期活动</a></dt>
    <dd>
      <ul id="act">
         <li><a href="<?php echo U('Catgory/act');?>" target="main">同期活动</a></li>
		 <li><a href="<?php echo U('Catgory/actEdit');?>" target="main">添加活动</a></li>
		  
      </ul>
    </dd>
	<dt><a onClick="showHide('#infos');" href="#" target="_self">往期回顾</a></dt>
    <dd>
      <ul id="infos">
         <li><a href="<?php echo U('Catgory/infos');?>" target="main">回顾列表</a></li>
		 <li><a href="<?php echo U('Catgory/infosEdit');?>" target="main">添加回顾</a></li>
		 
      </ul>
    </dd>
 </dl>
 <?php elseif($_GET['id'] == 'down'): ?>
   <dl>
   <dt><a onClick="showHide('#down');" href="#" target="_self">下载中心</a></dt>
      <dd>
      <ul id="hylx">
        <li><a href="<?php echo U('Down/index');?>"  class="cur" target="main">下载列表</a></li>
        <li><a href="<?php echo U('Down/edit');?>" target="main">添加文件</a></li>   
      </ul>
    </dd>
  </dl>
  <?php elseif($_GET['id'] == 'act'): ?>
   <dl>
   <dt><a onClick="showHide('#wd');" href="#" target="_self">活动管理</a></dt>
      <dd>
      <ul id="hylx">
        <li><a href="<?php echo U('Activityy/index');?>" target="main">活动列表</a></li>
		<li><a href="<?php echo U('Activityy/edit');?>" target="main">添加活动</a></li>
      </ul>
    </dd>
 </dl>
 <?php elseif($_GET['id'] == 'News'): ?> 

  <dl>
    <dt><a onClick="showHide('#article');" href="#" target="_self">文章管理</a></dt>
    <dd>
      <ul id="article">
        <li><a class="cur" href="<?php echo U('News/index');?>" target="main">文章列表</a></li>
        <li><a href="<?php echo U('News/add');?>" target="main">添加文章</a></li>
       
      </ul>
    </dd>
 </dl>
<?php elseif($_GET['id'] == 'Lea'): ?> 

  <dl>
    <dt><a onClick="showHide('#article');" href="#" target="_self">文章管理</a></dt>
    <dd>
      <ul id="article">
        <li><a class="cur" href="<?php echo U('League/index');?>" target="main">文章列表</a></li>
        <li><a href="<?php echo U('League/edit');?>" target="main">添加文章</a></li>
       
      </ul>
    </dd>
 </dl>
<?php elseif($_GET['id'] == 'tr'): ?>
   <dl>
   <dt><a onClick="showHide('#wd');" href="#" target="_self">培训认证管理</a></dt>
   <dd>
      <ul id="wd">
         <li><a href="<?php echo U('Train/index');?>" target="main">培训列表</a></li>
		  <li><a href="<?php echo U('Train/edit');?>" target="main">添加培训</a></li>
		 </ul>
    </dd>
	
	
 </dl>
 <?php elseif($_GET['id'] == 'gx'): ?>
   <dl>
   <dt><a onClick="showHide('#wd');" href="#" target="_self">共享仪器管理</a></dt>
   <dd>
      <ul id="wd">
         <li><a href="<?php echo U('Share/index');?>" target="main">共享仪器列表</a></li>
		 </ul>
    </dd>
	
 </dl>
  <?php elseif($_GET['id'] == 'zs'): ?>
   <dl>
   <dt><a onClick="showHide('#wd');" href="#" target="_self">招商管理</a></dt>
   <dd>
      <ul id="wd">
         <li class="cur"><a href="<?php echo U('Business/qy');?>" target="main">招商企业</a></li>
		 <li><a href="<?php echo U('Business/qyedit');?>" target="main">添加招商企业</a></li>
		 <li><a href="<?php echo U('Business/index');?>" target="main">招商政策</a></li>
		 <li><a href="<?php echo U('Business/edit');?>" target="main">添加招商政策</a></li>
		 </ul>
    </dd>
	
 </dl>
 <?php elseif($_GET['id'] == 'lh'): ?>
   <dl>
   <dt><a onClick="showHide('#wd');" href="#" target="_self">联合办会管理</a></dt>
   <dd>
      <ul id="wd">
         <li><a href="<?php echo U('Conference/index');?>" target="main">联合办会列表</a></li>
		 </ul>
    </dd>
	
 </dl>
<?php else: ?>
  <dl>
    <dt><a onClick="showHide('#article');" href="#" target="_self">文章管理</a></dt>
    <dd>
      <ul id="article">
        <li><a class="cur" href="<?php echo U('News/index');?>" target="main">文章列表</a></li>
        <li><a href="<?php echo U('News/add');?>" target="main">添加文章</a></li>
       
      </ul>
    </dd>
 </dl>
  
   <!--<dl>
    <dt><a onClick="showHide('#template');" href="#" target="_self">模板管理</a></dt>
    <dd>
      <ul id="template">
        <li><a href="<?php echo U('Theme/index');?>" target="main">网站模板管理</a></li>
      </ul>
    </dd>
  </dl>
--><?php endif; ?>
</div>
</body>
</html>