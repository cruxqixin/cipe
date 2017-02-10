<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_用户详情_<?php echo ($onlineUser['company_cname']); ?></title>
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
    $(".company-07 a").click(function(){
    	if($(this).find("img").attr("src")=="/images/Online/icon_green.jpg"){
    		$(".company-07 a").css("color","#4c4c4c");
    		$(this).css("color","red").find("input").attr("checked","checked");
    	}
    })
    
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
    <div class="main-left">
    	<h5>当前位置： <a href="<?php echo U('index/index');?>" target="_self">首页</a> ><span> 企业用户详情</span></h5>
        <div class="company-01">
			<div style="margin-bottom:10px; overflow:hidden; border-bottom: 1px solid #d7d7d7;">
				<img src="<?php echo $onlineUser['pic']?$onlineUser['pic']:'/images/Online/bz.jpg'; ?>"><h1 style="border-bottom:none;"><?php echo ($onlineUser['company_cname']); ?></h1>
			</div>
            <div class="company-02">
            	<table width="746" border="0" cellspacing="0">
                	<tbody>
                    	<tr class="top-tab">
                        	<td colspan="3"><p><span><?php echo date('Y-m-d',$onlineUser['add_time']);?></span> 发布</p>
                            				<h2>展位号/项目发布会：<span>【<?php echo ($onlineUser['exhibition_number']); ?>】</span></h2>
                            				<h2>主题展区：<span>【<?php echo ($themeListKV[$onlineUser['theme_id']]); ?>】</span></h2>
                            </td>
                        </tr>
                        <tr>
                        	<td width="262" colspan="3">公司中文名称：<a ><?php echo ($onlineUser['company_cname']); ?></a></td>
                            
                        </tr>
                        <tr>
                        	<td width="262" colspan="3">公司英文名称：<a ><?php echo ($onlineUser['company_ename']); ?></a></td>
                            
                        </tr>
                        <tr>
                        	<td width="262" colspan="3">公司中文简介：<a ><?php echo ($onlineUser['company_cinfo']); ?></a></td>
                            
                        </tr>
                        <tr>
                        	<td width="262" colspan="3">公司英文简介：<a ><?php echo ($onlineUser['company_einfo']); ?></a></td>
                            
                        </tr>
                        
                        <tr>
                        	<td width="262" colspan="3">网站：<a ><?php echo ($onlineUser['company_website']); ?></a></td>
                        </tr>
                        
                        <tr>
                        	<td width="262" colspan="3">地址：<a ><?php echo ($onlineUser['company_address']); ?></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="company-02">
            	<table width="746" border="0" cellspacing="0">
                	<tbody>
                    	<tr class="top-tab">
                        	<td colspan="3"><h3>企业联系人详细资料</h3></td>
                        </tr>
                        <tr>
                        	<td width="262">性别：<a ><?php echo ($onlineUser['gender']); ?> </a></td>
                            <td width="242">姓名：<a ><?php echo ($onlineUser['name']); ?> </a></td>
                            <td>职位：<a ><?php echo ($onlineUser['position']); ?> </a></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="company-03">
            <ul id="tech">
                <li class="current">产品技术及服务</li>
                <li>B2B 商务洽谈</li>
            </ul>
            <div class="company-06">
            	<div id="tech_content">
                    <div class="fixnone company-04">
                    	<?php
 foreach($userIndustryList as $k=>$v){ ?>
                        <div class="company-05">
                            <h1>▪ <?php echo $industryListKV[$v['ind_id']]; ?></h1>
                        </div>
                        <?php
 } ?>
                    </div>
                    <div class="fixnone company-04" style="display:none;">
                        <div class="company-05">
	                        <p><strong>能提供的核心产品及技术合作：</strong><?php echo ($onlineUser['cooperation_offer']); ?></p>
	                        <p><strong>已实现的应用：</strong><?php echo ($onlineUser['implemented_application']); ?></p>
                            <p><strong>需要何种合作或帮助：</strong><?php echo ($onlineUser['cooperation_need']); ?></p>
                            <p><strong>是否有投融资需求：</strong><?php echo ($onlineUser['fund_demand']==1 ? '是' : '否'); ?></p>
                            
                        </div>
                    </div>
                </div>
                <div class="dx_Productdisplay">
                	<div class="dx_Productdisplay01">
                    	<div class="dx_Productdisplay02">
                        	<p>产品展示</p>
                        </div>
                        <div class="dx_Productdisplay03">
                        	<a href="<?php echo U('product/listo/'.$onlineUser['uid']);?>">更多></a>
                        </div>
                    </div>
                    <div class="dx_Productdisplay04">
                    <?php foreach ($productList['data'] as $k=>$v){ ?>
                    	<a href="<?php echo U('product/info/'.$v["id"]);?>"><div class="dx_Productdisplay05">
                        	<img src="<?php echo $v['pic'] ? $v['pic'] : '/images/Online/bz.jpg' ; ?>"">
                            <div class="dx_Productdisplay06">
                            	<p><?php echo ($v['product_name']); ?></p>
                            </div>
                        </div></a>
                    <?php } ?>
                       
                    </div>
                </div>
                <!-- 隐藏对接及日历 -->
                <!-- <div class="company-08">
                	<h1>选择对接时间（红色表示当前已预约，黄色表示待定中，请选择绿色时间点）</h1>
                    <div class="company-07">
                        <form action="<?php echo U('schedule/setSchedule');?>" id="form1" method="post"  target="_self">
	                    <?php
 foreach($dayConfig as $day_k => $day_v){ ?>
	                        <dl>
	                            <dd><?php echo ($day_v); ?></dd>
	                            <dt>
	                            <?php
 foreach($timeConfig as $time_k => $time_v){ if(in_array($calendarListDay[$day_k][$time_k]['id'],$scheduleListCid) || $calendarListDay[$day_k][$time_k]['status']==0){ $pic = $scheduleListCidKV[$calendarListDay[$day_k][$time_k]['id']] == 1 ? 'yellow' : 'red'; $checkable = 0; }else{ $pic = 'green'; $checkable = 1; } ?>
	                            	<a class="time_block">
	                            	<img src="/images/Online/icon_<?php echo ($pic); ?>.jpg" />
	                            	&nbsp;&nbsp;<?php echo ($time_v); ?>
	                            	<?php if($checkable == 1){ ?>
	                            	<input name="calendar_id" type='radio' value="<?php echo ($calendarListDay[$day_k][$time_k]['id']); ?>"/>
	                            	<?php } ?>
	                            	</a>
	                            <?php
 } ?>
	                            </dt>
	                        </dl>
	                    <?php
 } ?>
	                        <div class="but-box">
	                        	<input name="accept_uid" type='hidden' value="<?php echo ($_GET['uid']); ?>"/>
	                        	<input type="submit" value=" 提交对接时间" />
	                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <div class="main-right">

        <div class="iconBox" style="margin-top: 10px;">
            <div class="icon">
            	<img src="/images/Online/icon_myduijie.jpg" />
                <div class="icon-text">
                	<h1><a href="<?php echo U('index/detail');?>" target="_self">我的对接</a></h1>
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