<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_基础资料</title>
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
          <ul id="news">
          <!-- 隐藏对接及日历 -->
             <!-- <li ><a href="<?php echo U('schedule/schedule_accept');?>"  target="_self">已接收预约</a></li>
          	 <li ><a href="<?php echo U('index/calendar');?>" target="_self">对接日历</a></li>
          	 <li ><a href="<?php echo U('schedule/schedule_apply');?>" target="_self">已提交预约</a></li>
          	 <li ><a href="<?php echo U('schedule/schedule_reject');?>" target="_self">被拒绝预约</a></li>-->
          	 <li class="currentLi" ><a >基础资料</a></li>
          	 <li ><a href="<?php echo U('product/lists');?>" target="_self">产品展示</a></li>
          </ul>
          <div class="index1_05" id="news_content">
              <div class="fixnone">
       	        <div class="company-01" style="margin:0 auto;">
		       	  <img src="<?php echo $onlineUser['pic']?$onlineUser['pic']:'/images/Online/bz.jpg'; ?>" ><h1><?php echo ($onlineUser['company_cname']); ?></h1>
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
		                        	<td width="262" colspan="2">公司中文名称：<a ><?php echo ($onlineUser['company_cname']); ?></a></td>
		                            <td>审核状态：<a ><?php echo ($onlineUser['status']==0?'未审核':'已审核'); ?> </a></td>
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
		                        	<td width="262" colspan="2">网站：<a ><?php echo ($onlineUser['company_website']); ?></a></td>
		                            <td>邮政编码：<a ><?php echo ($onlineUser['company_post_code']); ?></a></td>
		                        </tr>
		                        
		                        <tr>
		                        	<td width="262">电话：<a ><?php echo ($onlineUser['company_tel']); ?></a></td>
		                            <td width="242">传真：<a ><?php echo ($onlineUser['company_fax']); ?> </a></td>
		                            <td>EMAIL：<a ><?php echo ($onlineUser['company_email']); ?></a></td>
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
		                        <tr>
		                        	<td>手机：<a ><?php echo ($onlineUser['mobile']); ?></a></td>
		                            <td colspan="2">直拨电话：<a ><?php echo ($onlineUser['tel']); ?></a></td>
		                        </tr>
		                        <tr>
		                        	<td>传真：<a ><?php echo ($onlineUser['fax']); ?> </a></td>
		                            <td colspan="2">电子信箱：<a ><?php echo ($onlineUser['email']); ?></a></td>
		                        </tr>
		                    </tbody>
		                </table>
		            </div>
		            
		        </div>
               <div class="company-03" style="margin:20px auto;">
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
                        <div class="company-08">
                            <!-- 隐藏对接及日历 -->
                            <!-- <h1>对接时间表（红色表示当前已确定预约，黄色表示有待定预约，绿色表示无预约）</h1> -->
                            <div class="company-07">
                                <!-- <?php
 foreach($dayConfig as $day_k => $day_v){ ?>
			                        <dl>
			                            <dd><?php echo ($day_v); ?></dd>
			                            <dt>
			                            <?php
 foreach($timeConfig as $time_k => $time_v){ if(in_array($calendarListDay[$day_k][$time_k]['id'],$scheduleListCid) || $calendarListDay[$day_k][$time_k]['status']==0){ $pic = $scheduleListCidKV[$calendarListDay[$day_k][$time_k]['id']] == 1 ? 'yellow' : 'red'; $checkable = 0; }else{ $pic = 'green'; $checkable = 1; } ?>
			                            	<a class="time_block">
			                            	<img src="/images/Online/icon_<?php echo ($pic); ?>.jpg" />
			                            	&nbsp;&nbsp;<?php echo ($time_v); ?>
			                            	</a>
			                            <?php
 } ?>
			                            </dt>
			                        </dl>
			                    <?php
 } ?> -->
<style>
.but-box a {
    background-color: #990033;
    border: medium none;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    height: 38px;
    width: 120px;
}
</style>
                                <div class="but-box">
                                	<a href="<?php echo U('index/modify');?>"  target="_self"><input type="button" value="修改资料" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
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