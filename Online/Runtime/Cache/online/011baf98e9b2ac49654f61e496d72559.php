<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_产品详情</title>
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
</script>
</head>
<style>
.company-01 h1{
	border-bottom:none;}
</style>

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
    	<li><a href="<?php echo U('index/index');?>" class="currentA">首页</a></li>
        <!-- <li><a href="#">会议申请</a></li>
        <li><a href="#">在线会议室</a></li> -->
    </ul>
</div>
<div class="mainBox">
    <div class="main-left">
    	<h5>当前位置： <a href="<?php echo U('index/index');?>">首页</a> ><span> <a href="<?php echo U('index/info/'.$onlineUser['uid']);?>">企业用户详情</a></span> ><span> <a href="<?php echo U('product/listo/'.$onlineUser['uid']);?>">产品列表</a></span> ><span> 产品详情</span></h5>
       
       
           
           
                <div class="dx_Productdisplay">
                	<div class="dx_Productdisplay01">
                    	<div class="dx_Productdisplay02">
                        	<p>产品详情</p>
                        </div>
                        <div class="dx_Productdisplay03">
                        	<a href="<?php echo U('product/listO/'.$onlineUser['uid']);?>">返回></a>
                        </div>
                    </div>
                    <div class="dx_Productdisplay04">
                    	<div class="dx_details">
                        	<div class="dx_details01">
                            	<img src="<?php echo $onlineUser['pic']?$onlineUser['pic']:'/images/Online/bz.jpg'; ?>">
                            </div>
                            <div class="dx_details02">
                            	<div class="dx_details03">
                                	<ul>
                                    	<li><h1><?php echo ($onlineUser['company_cname']); ?></h1></li>
                                        <li><p>产品ID：<span> NO.<?php echo ($productInfo['id']); ?></span> </p></li>
                                        <li><p>产品名称<span>：<?php echo ($productInfo['product_name']); ?></span></p></li>
                                        <li><p>产品类别：</p></li>
                                        <?php foreach($productTagList as $k => $v){ ?>
                                        <li><font><?php echo ($fatherList[$categoryListKV[$v['cid']]['father']]['cname']); ?>—— <?php echo ($categoryListKV[$v['cid']]['cname']); ?></font></li>
                                        <?php } ?>
                                        <?php if($productInfo['other_category']){ ?>
                                        <li><font>其他 —— <?php echo ($productInfo['other_category']); ?></font></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dx_photo">
                        	<img src="<?php echo $productInfo['pic']?$productInfo['pic']:'/images/Online/bz.jpg'; ?>">
                        </div>
                        <div class="dx_introduction">
                        	<div class="dx_introduction01">
                            	<p>产品简介</p>
                            </div>
                            <div class="dx_introduction02">
                            	<p><?php echo ($productInfo['product_info']); ?></p>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
                
               
           
     
    </div>
    <div class="main-right">
    	<div class="iconBox">
        	<div class="icon">
            	<img src="/images/Online/icon_07.jpg" />
                <div class="icon-text">
                	<h1><a href="#">申请对接</a></h1>
                    <p>Apply docking</p>
                </div>
                <span></span>
            </div>
        </div>
        <!-- <div class="news-text">
        	<h1>推荐企业</h1>
            <ul>
            	<li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li class="currentLi"><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
            </ul>
        </div> -->
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