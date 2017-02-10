<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($theme['title']); ?>-<?php echo C('site_name');?></title>
<meta name="description" content="<?php echo C('site_description');?>">
<meta name="keywords" content="<?php echo C('site_keyword');?>">
<meta name="title" content="<?php echo C('site_title');?>">
<link rel="stylesheet" type="text/css" href="/css/index.css"/>
<link rel="stylesheet" type="text/css" href="/css/amazeui.min.css"/>
<script src="/js/jquery.js"></script>
<script src="/js/index.js"></script>
<script type="text/javascript" src="/js/common.js" language="javascript"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/amazeui.js"></script>
<script>
$(function(){
	$("base").attr("target","");
	$(".nav01 ul li a").attr("target","_blank");
	$(".detail").click(function(){
		$("#desc").height($(document).height());
		$("#desc").width($(document).width());
		$("#desc").show();
	})
	$("#detail1").click(function(){
		$("#info").height($(document).height());
		$("#info").width($(document).width());
		$("#info").show();
	})
	$("[id=close]").click(function(){
		$(".showboxbg").hide();
	})
})
</script>
<meta name="baidu-tc-verification" content="9b4be3a86e3975c1dfb2fd4dec931ac0" />

</head>

<body>
  <base target='_blank'/>
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="http://m.cipeasia.com/"/>
<script src="http://kzcdn.itc.cn/res/skin/js/uaredirect.js?v=4.7" type="text/javascript"></script>
<script type="text/javascript">KZ.redirect("http://m.cipeasia.com/");</script>
<div class="header">
     <div class="headerTop">
     	<div class="headerTOP01" style="width:1200px">
			<div class="logo">
             	<a href="/" target="_blank"><img src="/images/LOGO(tt01).png" /></a>
                <p style="color:#c7000a;font-size:14px; margin-left: 52px; margin-top:15px;">2017年6月6日-8日  北京•中国国际展览中心 北京顺义区天竺地区裕翔路88号 </p>
                <p style="color:#c7000a;font-size:14px; margin-left: 173px">Jun 6-8   China International Exhibition Center Beijing</p>
            </div>
			
			<!--
        	<div class="logo">
             	<a href="/" target="_blank"><img src="/images/logo_02.jpg" /></a>
            </div>			
			<div class="logo" style="margin-top:70px;margin-left:100px;">
             	<a href="/" target="_blank"><img src="/images/LO.png" /></a>
            </div>-->
            <div class="link01">
            	<ul>
                	<li>
					<a href="#" id="weixin"><img src="/images/2_05.jpg" /></a>	
					</li>
                    <li><a href="http://weibo.com/u/3921420614?from=myfollow_all
"><img src="/images/2_07.jpg" /></a></li>
                    <li><a href="#">中文</a>|<a href="http://www.cipeasia.com/en/" target="_blank">English</a></li>
                </ul><div class="clear"></div>
                <!--<a href="http://www.cipeasia.com/News/8114.html"><img src="/images/BANNERSMALL.jpg" style="width: 280px; height: 99px; margin-left: 105px;"></a>-->
				<img id="wei" class="wei" src="/images/weixin.jpg">
				<div>
					<img src="/images/dx_06.png">
				</div>
            </div>
        </div>
		<div class="clear"></div>
     </div>
     <div class="navBox">

        	<ul id="menu">
            	<li><a href="/">首页</a></li>
                <li><a href="http://www.cipeasia.com/theme/1.html">主题会展</a>
                    <div class="subnav">
                        <div class="min">
                            <div>
                                <ul>
                                    <li><a style="margin:9px  26px;" href="http://www.cipeasia.com/theme/1.html">▪&nbsp;激光制造展</a></li>
                                    <li><a  style="margin:9px  26px;"href="http://www.cipeasia.com/theme/2.html">▪&nbsp;红外微光展</a></li>
                                    <li><a style="margin:9px  26px;" href="http://www.cipeasia.com/theme/3.html">▪&nbsp;光学仪器展</a></li>
                                    <li><a style="margin:9px  26px;" href="http://www.cipeasia.com/theme/4.html">▪&nbsp;光学制造展</a></li>
                                    <li><a  style="margin:9px  26px;"href="http://www.cipeasia.com/theme/5.html">▪&nbsp;机器视觉展</a></li>
                                   <!-- <li><a href="http://www.cipeasia.com/theme/6.html">▪&nbsp;无人系统设备展</a></li>-->
                                    <li><a  style="margin:9px  26px;"href="http://www.cipeasia.com/opticalfiber.html">▪&nbsp;光通信光传感物联网展</a></li>
                                    <li><a  style="margin:9px  26px;"href="http://www.cipeasia.com/theme/9.html">▪&nbsp;智能制造展</a></li>
                                    <li><a  style="margin:9px  26px;"href="http://www.cipeasia.com/theme/14.html">▪&nbsp;智能安防展</a></li>
                                    <!--<li><a style="margin:9px  26px;" href="http://www.cipeasia.com/VR">▪&nbsp;虚拟现实展</a></li>-->
                                    <li><a style="margin:9px  26px;" href="http://www.cipeasia.com/theme/16.html">▪&nbsp;创新技术展</a></li>
                                    <li><a style="margin:9px  26px;" href="http://www.cipeasia.com/theme/18.html">▪&nbsp;智能电网展</a></li>
									 <li><a style="margin:9px  26px;" href="http://www.cipeasia.com/theme/19.html">▪&nbsp;3D打印展</a></li>
									<li><a style="margin:9px  26px;" href="http://www.cipeasia.com/theme/20.html">▪&nbsp;云计算与大数据展</a></li>
									<li><a  style="margin:9px  26px;"href="http://www.cipeasia.com/theme/21.html">▪&nbsp;可穿戴设备与虚拟现实主题展</a></li>
									<li><a style="margin:9px  26px;" href="http://www.cipeasia.com/theme/22.html">▪&nbsp;数控机床高端应用展</a></li>
                                    <li><a  style="margin:9px  26px;"href="http://www.cipeasia.com/theme/23.html">▪&nbsp;LED与半导体展</a></li>
									 
<li><a  style="margin:9px  26px;"href="http://www.cipeasia.com/theme/24.html">▪&nbsp;国防光电子展</a></li>
                                   
                                    
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="http://www.cipeasia.com/register.html">参观指南</a>
                    <div class="subnav">
                        <div class="min">
                            <div>
                                <ul>
                                    <li><a href="http://www.cipeasia.com/TrafficGuidance.html">▪&nbsp;交通指引</a></li>
                                    <li><a href="http://www.cipeasia.com/LaunchTime.html">▪&nbsp;开展时间</a></li>
                                    <li><a href="http://www.cipeasia.com/register.html">▪&nbsp;在线预登记</a></li>
                                </ul>
                            </div>
                        </div>
                    </div></li>
                <li><a href="http://www.cipeasia.com/apply.html">参展指南</a>
                    <div class="subnav">
                        <div class="min">
                            <div>
                                <ul>
                                    <li><a href="http://www.cipeasia.com/apply.html">▪&nbsp;申请参展</a></li>
                                    <li><a href="http://www.cipeasia.com/manual.html">▪&nbsp;展商手册</a></li>
                                    <li><a href="http://www.cipeasia.com/BoothMap.html">▪&nbsp;展位图</a></li>
                                    <li><a href="http://www.cipeasia.com/directory.html">▪&nbsp;展商名录</a></li>
                                    <li><a href="http://www.cipeasia.com/Consultation.html">▪&nbsp;广告咨询</a></li>
                                    <li><a href="http://www.cipeasia.com/Build.html">▪&nbsp;搭建与租赁</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
				<li><a href="http://www.cipeasia.com/Activity.html">精彩活动</a></li>
                <li><a href="http://www.cipeasia.com/Download.html">下载中心</a></li>
                <li><a href="http://online.kjtxw.com/online.php">对接系统</a></li>
                <li><a href="http://www.cipeasia.com/medias.html">合作媒体</a></li>
                <li><a href="http://www.cipeasia.com/business.html">商旅中心</a></li>
                <li><a href="http://www.cipeasia.com/about.html">关于我们</a></li>
            </ul><div class="clear"></div>
        </div>
     
  </div>
  <div class="themeBox">
	<div class="showboxbg" id="desc">
		<div class="slogin">
		    <div style="height:72px;margin-right:20px;"><div class="titles"><?php echo ($theme['title']); ?></div><span id="close" style="float:right;cursor:pointer;margin-top:-20px;">关闭</span></div>
			<div class="content" >
				<?php echo ($theme['desc']); ?>
			</div>
		</div>
	</div>
	<div class="showboxbg" id="info">
		<div class="slogin">
		    <div style="height:72px;margin-right:20px;"><div class="titles"><?php echo ($theme['title']); ?></div><span id="close" style="float:right;cursor:pointer;margin-top:-20px;">关闭</span></div>
			<div class="content" >
				<?php echo ($theme['content']); ?>
			</div>
		</div>
	</div>
	
    <div id="menu_content">
      <div class="manufactureBox">
        <div style="height:220px;" class="banner">
          <img style="height:210px" src="<?php echo ($theme['img']); ?>" />
        </div>
		</div>
		</div>
		<div>
			<div class="Exhibition_01">
					<div class="Exhibition_02">
						<div class="Exhibition_03">
							<div class="Exhibition_04" id="zhanhui">
								<h1><?php echo ($theme['title']); ?></h1>
							</div>
							<div class="Exhibition_05">
								<p><?php echo (msubstr(strip_tags($theme['desc']),0,542,'utf-8',false)); ?>...</p>
							</div>
							<div class="Exhibition_06">
								<a href="#" id="detail" class="detail">查看更多</a>
							</div>
						</div>
						<div class="Exhibition_07">
							<img src="<?php echo ($theme['descimg']); ?>" />
						</div>
					</div>
            <div class="theme">
                <ul id="theme">
                    <li>
                      <div class="show"><a href="<?php echo U('Visit/index?type=1');?>"><img src="/images/6_03.jpg" /></a></div>
                      <div class="activeimg"><a href="<?php echo U('Visit/index?type=1');?>"><span>参观</span></a></div>
                    </li>
                    <li>
                      <div class="show"><a href="<?php echo U('Visit/apply?type=4');?>"><img src="/images/6_06.jpg" /></a></div>
                      <div class="activeimg"><a href="<?php echo U('Visit/apply?type=4');?>"><span>参展</span></a></div>
                    </li>
                    <li>
                      <div class="show"><a href="<?php echo U('Activity/index');?>"><img src="/images/6_08.jpg" /></a></div>
                      <div class="activeimg"><a href="<?php echo U('Activity/index');?>"><span>活动</span></a></div>
                    </li>
                    <li>
                      <div class="show"><a href="http://www.cipeasia.com/Consultation.html"><img src="/images/link_11.jpg" /></a></div>
                      <div class="activeimg"><a href="http://www.cipeasia.com/Consultation.html">广告赞助</a></div>
                    </li>
                    <li>
                      <div class="show"><a href="http://online.kjtxw.com/online.php"><img src="/images/6_12.jpg" /></a></div>
                      <div class="activeimg"><a href="http://online.kjtxw.com/online.php"><span>对接</span></a></div>
                    </li>
                    <li>
                      <div class="show"><a href="http://consultant.kjtxw.com/consultant.html"><img src="/images/6_14.jpg" /></a></div>
                      <div class="activeimg"><a href="http://consultant.kjtxw.com/consultant.html">科技服务</a></div>
                    </li>
                </ul>
            </div>
        </div>
        <!--<div class="exhibitBox">
            <div class="exhibit">
              <h1>展品范围</h1>
              <ul>
			    <?php if(is_array($Exhibition)): $i = 0; $__LIST__ = $Exhibition;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                    <a href="#"><img src="<?php echo ($val['pic']); ?>" /></a>
                    <h2><?php echo ($val['title']); ?></h2>
                    <P><?php echo ($val['info']); ?></P>
                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
               </ul>
            </div>
        </div>-->
		<div class="Exhibits_01">
    	<div class="Exhibits_02" id="zhanpin">
        	<p>展品范围</p>
        </div>
        <?php if(is_array($Exhibition)): $i = 0; $__LIST__ = $Exhibition;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="Exhibits_03">
        	<div class="Exhibits_04">
            	<img width="100" height="100" src="<?php echo ($val['pic']); ?>" />
            </div>
			<div class="dx_01"></div>
            <div class="Exhibits_05">
            	<p><?php echo ($val['title']); ?></p>
            </div>
            <div class="Exhibits_06">
            	<P><?php echo ($val['info']); ?></P>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
	<div class="Concurrent_01">
    	<div class="Concurrent_02" id="tongqi">
        	<p>同期活动 · 精彩纷呈</p>
        </div>
        <?php if(is_array($act)): $i = 0; $__LIST__ = $act;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ac): $mod = ($i % 2 );++$i;?><div class="Concurrent_03">
        	<div class="Concurrent_04">
            	<img width="150" height="150" src="<?php echo ($ac["pic"]); ?>">
				</div>
            <div class="Concurrent_05">
            	<h1><?php echo ($ac["title"]); ?></h1>
                <p><?php echo ($ac["info"]); ?></p>
            </div>
        </div>
		<div style="width:1003px; overflow:hidden;">
        <div class="Forum_01">
        	<h1><?php if($ac["bbs"] != ''): ?>分论坛：<?php endif; ?></h1>
        </div>
        <div class="Forum_02">
        	<ul>
        	<?php if(is_array($ac["bbs"])): $i = 0; $__LIST__ = $ac["bbs"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bb): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($bb["bbslink"]); ?>"><?php echo ($bb["bbsname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	  
       
        </div>
    </div>
    <div class="Exhibits_01">
    	<div class="Exhibits_02" id="liangdian">
        	<p>大会亮点</p>
        </div>
        <div class="highlights_01">
        <?php if(is_array($light)): $i = 0; $__LIST__ = $light;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="highlights_02">
            	<div class="highlights_03">
                	<img width="60" height="60" src="<?php echo ($val["pic"]); ?>">
                </div>
                <div class="highlights_04">
                	<h1><?php echo ($val["title"]); ?></h1>
                	<p><?php echo ($val["info"]); ?></p>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="Exhibits_01">
    	<div class="Exhibits_02tt" id="zhongdian">
        	<p>部分重点展商</p>
        </div>
        <div class="exhibitors_01">
        	<div class="exhibitors_02">
            	<?php echo ($theme["union"]); ?>
            </div>
        </div>
     </div>
     <div class="Exhibits_01">
    	<div class="Exhibits_02" id="lijie">
        	<p>历届回顾</p>
        </div>
        <div class="exhibitors_01">
		<div style="width:1003px; margin:0 auto;" class="kuang">
		<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
		  
		  <?php if(is_array($infos)): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
				<div class="am-gallery-item">
					<a href="<?php echo ($val["pic"]); ?>" class="">
						<img width=200 height=200 src="<?php echo ($val["pic"]); ?>"/>
						
					</a>
				</div>
			</li><?php endforeach; endif; else: echo "" ;endif; ?> 
		</ul>

		</div>
        </div>
      </div>
	  <?php if($theme['id'] == 25): ?><p>111</p>
	  <?php else: ?>
       <div class="Exhibits_01">
    	<div class="Exhibits_02" id="xiangguan">
        	<p>相关新闻</p>
        </div>
        <div class="Forum_02">
        	<ul>
			  <?php if(is_array($news2)): $i = 0; $__LIST__ = $news2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="http://www.cipeasia.com/News/<?php echo ($val['id']); ?>.html"><?php echo ($val['title']); ?></a><font><?php echo (date("Y-m-d",$val['addtime'])); ?></font></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
       </div><?php endif; ?>
       <div class="Exhibits_01">
    	<div class="Exhibits_02" id="canyu">
        	<p>参与方式</p>
        </div>
	  <div class="unitBox">
		  	<?php echo ($theme['part']); ?>
        </div>
      <div class="Exhibits_01">
    	<div class="Exhibits_02" id="lianxi">
        	<p>联系方式</p>
        </div>
        <div class="Contact_01">
        	<p>中国光学工程学会</p>
        </div>
        <div class="Contact_02">
        	<div class="Contact_03">
            	<div class="Contact_04">
                	<img src="/images/z_51.png">
                </div>
                <div class="Contact_05">
                	<p>联系人</p>
                    <p><?php echo ($theme["person"]); ?></p>
                    <p><?php echo ($theme["person1"]); ?></p>
                    <p><?php echo ($theme["person2"]); ?></p>
                </div>
            </div>
            <div class="Contact_03">
            	<div class="Contact_04">
                	<img src="/images/z_52.png">
                </div>
                <div class="Contact_05">
                	<p>电话</p>
                    <p><?php echo ($theme["phone"]); ?></p>
                    <p><?php echo ($theme["phone1"]); ?></p>
                    <p><?php echo ($theme["phone2"]); ?></p>
                </div>
            </div>
            <div class="Contact_03">
            	<div class="Contact_04">
                	<img src="/images/z_53.png">
                </div>
                <div class="Contact_05">
                	<p>邮箱</p>
                    <p><?php echo ($theme["emile"]); ?></p>
                    <p><?php echo ($theme["emile1"]); ?></p>
                    <p><?php echo ($theme["emile2"]); ?></p>
                </div>
            </div>
        </div>
     </div>
    
    
   
</div>
	
</div> 
        </div>
  <div class="zhanhuitt" style="float:left;right:120px;">
	<ul id="zhanhuitt">
    	<li class="red"><a href="#zhanhui"><p>展会<font>介绍</font></p></a></li>
        <li><a href="#zhanpin"><p>展品范围</p></a></li>
        <li><a href="#tongqi"><p>同期活动</p></a></li>
        <li><a href="#liangdian"><p>大会亮点</p></a></li>
        <li><a href="#zhongdian"><p>重点展商</p></a></li>
        
        
    </ul>

    </div>
<div class="zhanhuitt" style="float:left;right:60px;">
	<ul id="zhanhuitt">
    	
        <li><a href="#lijie"><p>历届回顾</p></a></li>
        <li><a href="#xiangguan"><p>相关新闻</p></a></li>
        <li><a href="#canyu"><p>参与方式</p></a></li>
        <li><a href="#lianxi"><p>联系方式</p></a></li>
        
    </ul>

    </div>
  </div>
  </div>
  <div class="footer">
     <div class="copyright">
	    <!--<p>【主办单位】</p>
		<ul style="width:313px; overflow:hidden;margin:0 auto;">
			<li >中国光学工程学会</li>
			<li style="margin-left:0px;">中国高科技产业化研究会</li>
		</ul>
		<p>【承办单位】</p>
		<ul style="width:1050px;margin-left:30px;">
			<li>中国高科技产业化研究会产学研合作协调部</li>
			<li>中国高科技产业化研究会光电科技产业化分会</li>
			<li>中国宇航学会光电技术专业委员会</li>
			<li>国际高新技术交流中心</li>
			<li style="margin-left:0px;">北京宇航会展有限公司</li>
		</ul>
		<div class="clear"></div>
		<div class="left">
			<p>【海外联办】</p>
			<ul>
				<li>国际光学工程学会</li>
				<li>法国国际商务展会公司</li>
				<li>美国光学学会</li>
				<li>英国南安普顿大学</li>
				<li>英国伯明翰大学</li>
				<li>英中贸易协会</li>
				<li>意大利皮埃蒙特大区航空航天协会</li>
				<li>法国企业国际发展局</li>
				<li>芬兰国家技术创新局</li>
				<li>德国夫琅禾费应用研究促进协会</li>
				<li>德国Adlershof 高科技产业园</li>
				<li>西班牙国家技术创新联盟</li>
				<li>俄罗斯技术转移网络</li>
				<li>新加坡国立大学</li>
				<li>韩国创新促进协会</li>
				<li>加拿大中国工商业委员会</li>
				<li>美中商务与文化交流中心</li>
			</ul>
		</div>
		<div class="right">
			<p>【支持单位】</p>
			<ul>
				<li>中国航天科技集团公司</li>
				<li class="li1">中国航空工业集团公司</li>
				<li>中国船舶重工集团公司</li>
				<li class="li1">中国兵器工业集团公司</li>
				<li>中国电子科技集团公司</li>
				<li class="li1">中国工程物理研究院</li>
				<li>中科院长春光机所</li>
				<li class="li1">中科院上海光学精密机械研究所</li>
				<li>中科院西安光学精密机械研究所</li>
				<li class="li1">中国科学院上海技术物理研究所</li>
				<li>清华大学</li>
				<li class="li1">浙江大学</li>
				<li>哈尔滨工业大学</li>
				<li class="li1">北京航空航天大学</li>
				<li>北京理工大学</li>
				<li class="li1">南京理工大学</li>
				<li>长春理工大学</li>
			</ul>
		</div>-->
		<div class="clear"></div>
		<p style="padding-bottom:0px;">北京宇航会展有限公司版权所有  京ICP备12003248号<br> 指定新闻稿发布机构——美通社</p>
		<div style="display:none"><script src="http://s95.cnzz.com/stat.php?id=3619382&web_id=3619382" language="JavaScript"></script></div>
		<script type="text/javascript"> var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://"); document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F69b881bbc7306a0854f469c324c8f6c2' type='text/javascript'%3E%3C/script%3E")) </script>
		<!--<p style="padding-top:0px;">技术支持：<a href="http://www.sysmile.com" style="color:#fff">天津市阳光盛强网络科技有限公司</a></p>-->
     </div>
  </div>
  

</body>
</html>