<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>参展指南-<?php echo C('site_name');?></title>
<meta name="description" content="<?php echo C('site_description');?>">
<meta name="keywords" content="<?php echo C('site_keyword');?>">
<meta name="title" content="<?php echo C('site_title');?>">
<link rel="stylesheet" type="text/css" href="/css/index.css"/>
<script src="/Public/statics/js/jquery/jquery-1.7.2.min.js"></script>
<script src="/js/index.js"></script>
<script type="text/javascript" src="/js/common.js" language="javascript"></script>
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<link href="/Public/statics/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script src="/Public/statics/js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/Public/statics/js/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="/Public/statics/js/area.js" charset="gbk"></script>
<script type="text/javascript">
    $(function(){
		$("base").attr("target","");
		$(".nav01 ul li a").attr("target","_blank");
	})
	var s=["s_province","s_city"];//三个select的id
	var opt0 = ["省份","城市"];//初始值
	function _init_area(){  //初始化函数
		for(i=0;i<s.length-1;i++){
			document.getElementById(s[i]).onchange=new Function("change("+(i+1)+")");	
		}
		change(0);
	}
	$(function(){
		_init_area();
	});
	$(function(){
		$("form").validationEngine();
	});
	
</script>
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
  <div class="newsBoX">
  	<div class="banner01">
    	<a href="#"><img src="/images/can_022.jpg" /></a>
    </div>
  	<div class="link04 link02">
    	<ul>
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li <?php if($_GET['type'] == $val['id']): ?>class="current1"<?php endif; ?>><a <?php if($val['id'] == 4): ?>href="http://www.cipeasia.com/apply.html"
			<?php elseif($val['id'] == 5): ?>href="http://www.cipeasia.com/manual.html"<?php elseif($val['id'] == 6): ?>href="http://www.cipeasia.com/BoothMap.html"
			<?php elseif($val['id'] == 7): ?>href="http://www.cipeasia.com/directory.html"<?php elseif($val['id'] == 8): ?>href="http://www.cipeasia.com/Consultation.html"
			<?php elseif($val['id'] == 9): ?>href="http://www.cipeasia.com/Build.html"<?php endif; ?> >
			<?php echo ($val['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul><div class="clear"></div>
    </div>
    <div id="visit_content">
	<?php if($_GET['type'] == 4): ?><div class="visitBox">
         <?php echo ($art['info']); ?>
         <form action="<?php echo U('Visit/submit_b');?>" method="post">
             <table>
                <tr>
                    <td width="115px">称谓<span>*</span> </td>
                    <td  colspan="2"><input type="radio" class="radio" checked="checked" name="gender" value='M' />先生<input type="radio" class="radio" name="gender" value='F' />女士</td>
                </tr>
                <tr>
                    <td width="115px">姓名<span>*</span> </td>
                    <td width="295px"><input type="text" class="text validate[required]"   name="name"/></td>
                    <td width="598px">职位<span>*</span><input type="text" class="text validate[required]" name="position"/></td>
                </tr>
                <tr>
                    <td>部门<span>*</span> </td>
                    <td><input type="text" class="text validate[required]" name="department"/></td>
                    <td >邮编 <input type="text" class="text" name="post_code"/></td>
                </tr>
                <tr>
                    <td>单位名称<span>*</span> </td>
                    <td  colspan="2"><input type="text" class="text validate[required]" name='company' /></td>
                </tr>
                <tr>
                    <td>通讯地址<span>*</span> </td>
                    <td  colspan="2"><input type="text" class="text validate[required]" name="address"/></td>
                </tr>
                <tr>
                    <td>省份/地区<span>*</span> </td>
                    <td  colspan="2">
					<select name='province' id="s_province" va="1" class="num2 validate[required]"></select>
					</td>
                </tr>
                <tr>
                    <td>城市<span>*</span> </td>
                    <td  colspan="2">
                    	<select name="city" id="s_city" va="1" class="num2 validate[required]"></select>
                    </td>
                </tr>
                <tr>
                    <td>电话<span>*</span> </td>
                    <td  colspan="2"><input type="text" value="+86" class="txt01 validate[required]" name="tel1"/> <input type="text" class="txt02 txt01 validate[required]" name="tel2"/> <input type="text" class="txt02  validate[required]" name="tel3"/> <input type="text" class="txt03" name="tel4"/><font>(格式：国家号-区号-电话号-分机)</font></td>
                </tr>
                <tr>
                    <td>传真 </td>
                    <td  colspan="2"><input type="text" value="+86" class="txt01" name="fax1"/> <input type="text" class="txt02 txt01" name="fax2"/> <input type="text" class="txt02" name="fax3"/> <input type="text" class="txt03" name="fax4"/><font>(格式：国家号-区号-电话号-分机)</font></td>
                </tr>
                <tr>
                    <td>手机<span>*</span> </td>
                    <td  colspan="2"><input type="text" class="text validate[required,custom[shouji]]" name="mobile"/></td>
                </tr>
                <tr>
                    <td>Email<span>*</span> </td>
                    <td  colspan="2"><input type="text" class="text validate[required,custom[email]]" name="email"/></td>
                </tr>
                <tr>
                    <td>网址<span>*</span> </td>
                    <td  colspan="2"><input type="text" class="text validate[required]" name="website"/></td>
                </tr>
                <tr class="tr01">
                    <td>主要展品<span>*</span> </td>
                    <td  colspan="2"><textarea cols="85" rows="4" class=" validate[required]" name="main_product"></textarea></td>
                </tr>
                    <tr>
                    <td colspan="3">您选择的展览方案<span>*</span><input type="radio" value='1' class="radio" name="exhibit_type" />光地 <input type="radio" value="2" class="radio" checked="checked"  name="exhibit_type"/>标展</td>
                </tr>
                <tr>
                    <td>租用面积<span>*</span> </td>
                    <td  colspan="2"><select class="sel" name="area">
                      <option value="9平方米" >9平方米</option>
                      <option value="18平方米" >18平方米</option>
                      <option value="27平方米" selected="selected">27平方米</option>
                      <option value="36平方米" >36平方米</option>
                      <option value="45平方米" >45平方米</option>
                      <option value="100平方米以上" >100平方米以上</option>
                      </select></td>
                </tr>
                <tr class="tr01">
                    <td>给主办方留言<p>(500字以内)</p> </td>
                    <td  colspan="2"><textarea cols="85" rows="4" name="message"></textarea></td>
                </tr>
                <tr>
                    <td  colspan="3"><input type="submit" value="提交" class="sub"/></td>
                </tr>
             </table>
         </form>
      </div>
	  <?php elseif($_GET['type'] == 7): ?>
      <div class="visitBox">
<div style="width:999px; margin:0 auto" class="biaoii">
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
    	<tr style="background:#fbe5e5;">
        	<td width="25%"><p>参展单位名称</p></td>
            <td width="25%"><p>EXHIBITOR NAME</p></td>
            <td width="25%"><p>参展单位名称</p></td>
            <td width="25%"><p>EXHIBITOR NAME</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>长春博启光学玻璃制造有限公司</p></td>
            <td><p>Changchun Bo Qi Optical Glass Manufacturing Co.,LTD</p></td>
            <td><p>北京蓝思泰克科技有限公司</p></td>
            <td><p>Beijing Lenstech Science & Technology Co.,Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京宇桥速通科技发展有限公司</p></td>
            <td><p>Beijing UTOP Co.,Ltd</p></td>
            <td><p>北京中星时代科技有限公司</p></td>
            <td><p>BEIJING TIMES STAR TECHNOLOGY CO.LTD</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京睿光科技有限责任公司</p></td>
            <td><p>BeiJing RayLight Technology Co.,Ltd.</p></td>
            <td><p>北京驰宇空天技术发展有限公司</p></td>
            <td><p>Beijing Chiyu Aerospace Technology Development Co. Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>新乡市百合光电有限公司</p></td>
            <td><p>Xinxiang Baihe O.E. Co., Ltd.</p></td>
            <td><p>广州市固润光电科技有限公司</p></td>
            <td><p>Guangzhou Gurun Photoelectric Technology Co., LTD</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>加拿大光波系统科技</p></td>
            <td><p>Optiwave Systems Inc.</p></td>
            <td><p>北京霞文光学材料有限责任公司</p></td>
            <td><p>BEIJING XIAWEN OPTICAL MATERIALS CO.,LTD</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京霞文光学材料有限责任公司</p></td>
            <td><p>&nbsp;</p></td>
            <td><p>芬泰电子（上海）有限公司</p></td>
            <td><p>Finetech GmbH & Co. KG
</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>浙江雷邦光电技术有限公司</p></td>
            <td><p>Zhejiang Zybron Opto-Electronics co.,Ltd.</p></td>
            <td><p>注视者（北京）科技有限公司</p></td>
            <td><p>Joview (Beijing) Technology Co.,Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国无人机任务系统及技术产业联盟</p></td>
            <td><p>China UAV Mission System and Technology Industry Alliance</p></td>
            <td><p>北京星源奥特科技有限公司</p></td>
            <td><p>&nbsp;</p></td>
        </tr>
        
        
        
        
        
        
        
        
        
        
        
        
         <tr style="background:#f5f5f5">
        	<td><p>上海哈登塑料技术有限公司</p></td>
            <td><p>Shanghai L&M Plastics Technology CO.,LTD</p></td>
            <td><p>铂锐仪器（上海）有限公司</p></td>
            <td><p>Boyue Instruments (Shanghai) Co.,Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>深圳市创鑫激光股份有限公司</p></td>
            <td><p>Maxphotonics Co. Ltd.</p></td>
            <td><p>中国科学院大气物理研究所</p></td>
            <td><p>&nbsp;</p></td>
        </tr>
         <tr style="background:#f5f5f5">
        	<td><p>苏州清鑫光学设备有限公司</p></td>
            <td><p>Suzhou Qingxin Optical Equipment Co. Ltd.</p></td>
            <td><p>浙江大学</p></td>
            <td><p>Zhejiang University</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中北大学仪器与电子学院</p></td>
            <td><p>School of Instrument and Electronics，NUC</p></td>
            <td><p>北京宇航会展有限公司</p></td>
            <td><p>Beijing Aerospace exhibition CO.，LTD</p></td>
        </tr>
         <tr style="background:#f5f5f5">
        	<td><p>重庆四联特种装备材料有限公司</p></td>
            <td><p>Chongqing Silian Special Equipment Material CO., Ltd.</p></td>
            <td><p>北京航天科奥电子技术有限公司</p></td>
            <td><p>Beijing Aerospace Tech-olympic Electronics Technology Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>华夏幸福基业股份有限公司</p></td>
            <td><p>CFLD</p></td>
            <td><p>华夏幸福基业股份有限公司</p></td>
            <td><p>CFLD</p></td>
        </tr>
         <tr style="background:#f5f5f5">
        	<td><p>上海昊量光电设备有限公司</p></td>
            <td><p>Aunion Tech Co., Ltd</p></td>
            <td><p>北京尚果创想科技有限公司</p></td>
            <td><p>BEIJING SUNGO INDUSTRIAL DESIGN CO.,LTD</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京尚果创想科技有限公司</p></td>
            <td><p>&nbsp;</p></td>
            <td><p>武汉拓材科技有限公司</p></td>
            <td><p>Wuhan Tuocai Technology Co.,Ltd</p></td>
        </tr>
         <tr style="background:#f5f5f5">
        	<td><p>吉林省长光瑞思激光技术有限公司</p></td>
            <td><p>&nbsp;</p></td>
            <td><p>杭州汇睿科技有限公司</p></td>
            <td><p>HUIRUI INFRARED </p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>南京先进激光技术研究院</p></td>
            <td><p>Nanjing Institute of Advanced Laser Technology</p></td>
            <td><p>北京星源奥特科技有限公司</p></td>
            <td><p>&nbsp;</p></td>
        </tr>
         <tr style="background:#f5f5f5">
        	<td><p>浙江雷邦光电技术有限公司</p></td>
            <td><p>Zhejiang Zybron Opto-Electronics co.,Ltd.</p></td>
            <td><p>注视者（北京）科技有限公司</p></td>
            <td><p>Joview (Beijing) Technology Co.,Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国无人机任务系统及技术产业联盟</p></td>
            <td><p>China UAV Mission System and Technology Industry Alliance</p></td>
            <td><p>中国建筑材料科学研究总院</p></td>
            <td><p>CBMA</p></td>
        </tr>
         <tr style="background:#f5f5f5">
        	<td><p>法国HGH红外系统股份公司</p></td>
            <td><p>HGH SYSTEMES INFRAROUGES</p></td>
            <td><p>中锗科技有限公司</p></td>
            <td><p>China Germanium Co., Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京理工大学光电学院/光电成像技术与系统教育部重点实验室</p></td>
            <td><p>MoE Key Laboratory of Photoelectronic Imaging Technology and System, School of Optoelectronics, Beijing Institute of Technology </p></td>
            <td><p>昆明全波红外科技有限公司</p></td>
            <td><p>KUNMING VISION INFRARED CO.,LTD</p></td>
        </tr>
         <tr style="background:#f5f5f5">
        	<td><p>中国科学院物理研究所/盐城物科光电有限公司</p></td>
            <td><p>Institute Of  Physics,CAS. Yancheng Physcience Opto-electronics Company Limited </p></td>
            <td><p>复旦大学光科学与工程系\上海超精密光学制造工程技术研究中心</p></td>
            <td><p>Department of Optical Science and Engineering, Fudan University \ Shanghai Ultra-precision Optical Manufacturing Center </p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>长春长光思博光谱技术有限公司</p></td>
            <td><p>Changchun Changguang SIPO Spectrum Technology Co., Ltd</p></td>
            <td><p>长春奥普光电技术股份有限公司</p></td>
            <td><p>Changchun UP Optotech(Holding)Co.,ltd.</p></td>
        </tr>
        
        
        
        
                <tr style="background:#fbe5e5;">
        	<td><p>北京富吉瑞光电科技有限公司</p></td>
            <td><p>Beijing Fujirui(FJR) Optical-electronic Co,Ltd</p></td>
            <td><p>北京伊格诺新材料科技有限责任公司</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>上海力信测量技术有限公司</p></td>
            <td><p></p></td>
            <td><p>南京国业科技有限公司</p></td>
            <td><p>NANJING KUYEE TECHNOLOGY CO., LTD.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京红源光电技术公司</p></td>
            <td><p>Beijing Hongyuan E-O Technology Co.,Ltd</p></td>
            <td><p>成都金典真空设备有限责任公司</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京航空航天大学惯性技术国防科技重点实验室；北京泰熙沂泽科技有限公司</p></td>
            <td><p>Beihang University Key Laboratory of Inertial Technology for National Defense；TSIEZDR Technology Co., Ltd. Beijing</p></td>
            <td><p>奥普泰克亚洲有限公司</p></td>
            <td><p>OptoTech Asia Limited</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>南京英田光学工程股份有限公司</p></td>
            <td><p>Intane Optics</p></td>
            <td><p>南京利生光学机械有限责任公司</p></td>
            <td><p>Nanjing Lisheng Optics Machinery Co., Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>大连佳益光学仪器有限公司</p></td>
            <td><p>DALINA JIAYI OPTAICAL INSTRUMENT CO.,LTD</p></td>
            <td><p>苏州恒嘉晶体材料有限公司</p></td>
            <td><p>Su Zhou EverGreat Crystal Material Company Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>天津中环电子信息集团有限公司</p></td>
            <td><p>Tianjin Zhonghuan Electronic and Information(Group)Co.,Ltd.</p></td>
            <td><p>西安超凡光电设备有限公司</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京工业大学</p></td>
            <td><p>Beijing University of Technology</p></td>
            <td><p>美国理波公司</p></td>
            <td><p>Newport Corporation</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国电子科技集团公司第十六研究所</p></td>
            <td><p>HeFei Research Institute Of Cryogenics And Electronics</p></td>
            <td><p>北京东方锐镭科技有限公司</p></td>
            <td><p>Beijng Oriental Sharp Laser Technology Co.,Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>中国电子科技集团公司第五十三研究所</p></td>
            <td><p>The 53th Research Institute of China Electronics Technology Group Corporation</p></td>
            <td><p>北京瑞达恩科技股份有限公司</p></td>
            <td><p>BEIJING RUIDAEN TECHNOLOGY CO.,LTD</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京智邦国际软件技术有限公司</p></td>
            <td><p>Beijing Ligention International Software Technology Co.,Ltd</p></td>
            <td><p>北京伟开赛德科技发展有限公司</p></td>
            <td><p>Beijing Wei Kai Sai De Science and Technology Development Co</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>上海欧熠光电科技有限公司</p></td>
            <td><p>SHANGHAI OE TECHNOLOGY Co.,Ltd</p></td>
            <td><p>北京嘉贺恒德科技有限责任公司</p></td>
            <td><p>Beijing Jiahehengde Technology Co., Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京弗圣威尔科技有限公司</p></td>
            <td><p>Fashion-wire Technology Co.Ltd</p></td>
            <td><p>广州星博科仪有限公司</p></td>
            <td><p>NBL IMAGING SYSTEM LTD.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>讯技光电科技（上海）有限公司</p></td>
            <td><p>InfoTek Information Science & Technology Co., Inc.</p></td>
            <td><p>合肥知常光电科技有限公司</p></td>
            <td><p>ZC Optoelectronic Technologies.LTD</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>海德星科技有限公司</p></td>
            <td><p>Heidstar Co.,Ltd.</p></td>
            <td><p>苏州凯亚得精密仪器有限公司</p></td>
            <td><p>Suzhou Kindprecision Instrument Ltd.,</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京量拓科技有限公司</p></td>
            <td><p>ELLITOP SCIENTIFIC CO.,LTD</p></td>
            <td><p>大连桑姆泰克工业部件有限公司</p></td>
            <td><p>DALIAN SOMTEC INDUSTRY PARTS CO.,LTD.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>苏州工业园汇光科技有限公司</p></td>
            <td><p>HUIGUANG TECHNOLOGY(SUZHOU)CO.,LTD</p></td>
            <td><p>中国电科五十所</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>美国派力肯产品有限公司</p></td>
            <td><p>Pelican Products,Inc</p></td>
            <td><p>武汉优光科技有限责任公司</p></td>
            <td><p>UNION OPTIC</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京首量科技有限公司</p></td>
            <td><p>Beijing Scitlion Technology Co., Ltd</p></td>
            <td><p>普爱纳米位移技术（上海）有限公司</p></td>
            <td><p>Physik Instrumente (PI Shanghai) Co.,Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>大恒新纪元科技股份有限公司</p></td>
            <td><p>China Daheng Group, Inc.</p></td>
            <td><p>哈尔滨工业大学光电控制研究所</p></td>
            <td><p>Optoelectronic Control Technology LAB of HIT</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>上海准星光电科技有限公司</p></td>
            <td><p>Shanghai Zhunxing Opto-Electronic Technology Co., Ltd.</p></td>
            <td><p>航天长峰朝阳电源有限公司</p></td>
            <td><p>Aerospace long feng chaoyang power co., LTD</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>长春市金龙光电科技有限责任公司</p></td>
            <td><p>GoldDragon Optics Electronic Technology Co., Ltd</p></td>
            <td><p>上海联肯光电技术有限公司</p></td>
            <td><p>Oelincom Technologies Inc.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>先利士劳尔亚洲有限公司</p></td>
            <td><p>Satisloh Asia Ltd.,</p></td>
            <td><p>泰勒霍普森有限公司</p></td>
            <td><p>Taylor Hobson Limited</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>无锡中光精密仪器设备厂</p></td>
            <td><p>WUXI ZHONGGUANG PRECISE INSTRUMENT FACTORY</p></td>
            <td><p>北京欧唐科技发展有限公司</p></td>
            <td><p>Beijing Opturn Company Co., Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>天津市奥特梅尔光电科技有限公司</p></td>
            <td><p>AUTO-MEASUREMENTS & VISION  TECHNOLOGY CO., LTD.</p></td>
            <td><p>长春新产业光电技术有限公司</p></td>
            <td><p>Changchun New Industries Optoelectronics Tech.Co.,Ltd.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>成都精科实业有限责任公司</p></td>
            <td><p>Chengdu SWOC Industries Co.，Ltd.</p></td>
            <td><p>北京东方佳气科技有限公司</p></td>
            <td><p>SciStar Electronics Co.,Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>香河奥润新材料科技有限公司</p></td>
            <td><p>Xianghe orient new materials technology co., LTD</p></td>
            <td><p>北京晨晶电子有限公司</p></td>
            <td><p>BEIJING CHENJING ELECTRONIC CO.,LTD</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>润和微光科技有限公司</p></td>
            <td><p>Beijing Homolaser Science and Technology Co.，Ltd</p></td>
            <td><p>北京微纳通科技有限公司</p></td>
            <td><p>PLANT&MILL SUPPLIES PTE LTD</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京微视新纪元科技有限公司</p></td>
            <td><p>Beijing Microview Science and Technology Co.,Ltd.</p></td>
            <td><p>北京凌科朔科技发展有限公司</p></td>
            <td><p>linkshire</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>中国电子科技集团重庆声光电有限公司（44所、24所、26所）</p></td>
            <td><p></p></td>
            <td><p>武汉侨邑激光超市有限公司</p></td>
            <td><p>wuhan qy laser co.,ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>上海乾曜光学科技有限公司</p></td>
            <td><p>Shineoptics</p></td>
            <td><p>浩视（中国）有限公司</p></td>
            <td><p>Hirox China Co., Ltd.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>英科光达（北京）科技有限公司</p></td>
            <td><p>Ying Ke Guang Da（Beijing）Technology Co.,Ltd</p></td>
            <td><p>国防工业出版社</p></td>
            <td><p>National Defense Industry Press</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京协同创新研究院</p></td>
            <td><p></p></td>
            <td><p>珠海光库科技股份有限公司</p></td>
            <td><p>Advanced Fiber Resources(Zhuhai),Ltd.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京鼎信优威光子科技有限公司</p></td>
            <td><p>DYNASENSE PHOTONICS CO.，LTD</p></td>
            <td><p>北京鼎信优威光子科技有限公司</p></td>
            <td><p>DYNASENSE PHOTONICS CO.，LTD</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>三英精控（天津）科技有限公司</p></td>
            <td><p>Sanying Precision Motion Control (Tianjin) Technology Co.,Ltd</p></td>
            <td><p>北京燕京电子有限公司</p></td>
            <td><p>Beijing E-science Co.,Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>欧棣斯软件（上海）有限公司</p></td>
            <td><p>OPTIS CN LTD</p></td>
            <td><p>深圳大通激光有限公司</p></td>
            <td><p>ACCESS LASER COMPANY</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京金吉奥梦科技有限公司</p></td>
            <td><p>Beijing Jinji Aomeng Co.,Ltd</p></td>
            <td><p>同济大学电子与信息工程学院，陕西华星红外器件公司</p></td>
            <td><p>College Electronics and Information Engineering，Tongji University Huaxing Infrared Device Company</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京安伟联创科技有限公司</p></td>
            <td><p>Beijing Onway Create Technologies Co., ltd</p></td>
            <td><p>广东省微纳加工技术与装备重点实验室</p></td>
            <td><p>Guangdong Provincial Key Laboratory of Micro-Nano Manufacturing Technology and Equipment</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>深圳市得地为业科技有限公司</p></td>
            <td><p>Shenzhen Dediweiye Technology Co., Ltd.</p></td>
            <td><p>北京辰阳自动化科技有限公司</p></td>
            <td><p>Beijing Chen Yang Automation Technology Co., Ltd.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>哈尔滨和达光电精密仪器有限公司</p></td>
            <td><p>Harbin and photoelectric Precision Instrument Co.,Ltd</p></td>
            <td><p>森泉科技有限公司</p></td>
            <td><p>Sources Technologies Co.,Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>西南交通大学</p></td>
            <td><p>Southwest Jiaotong University</p></td>
            <td><p>江西省科学院  中国科学院金属研究所</p></td>
            <td><p>Jiangxi Academy of Sciences； Institute of Metal Research, Chinese Academy of Sciences</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>装备再制造技术国防科技重点实验室</p></td>
            <td><p>National Key Lab for Remanufacturing</p></td>
            <td><p>山西暗睛光电科技有限公司</p></td>
            <td><p>SHANXI ANJING PHOTOELECTRIC TECHNOLOGY CO，LTD</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京交通大学光电检测技术研究所</p></td>
            <td><p>Institute of optoelectronic measurement technology,Beijing Jiaotong University</p></td>
            <td><p>中国科学院上海技术物理研究所</p></td>
            <td><p>SHANGHAI INSTITUTE OF TECHNICAL PHYSICS OF THE CHINESE ACADEMY OF SCIENCES</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>中国科学院上海技术物理研究所</p></td>
            <td><p>SHANGHAI INSTITUTE OF TECHNICAL PHYSICS OF THE CHINESE ACADEMY OF SCIENCES</p></td>
            <td><p>中科院半导体所微波光电子团队</p></td>
            <td><p>Microwave Optoelectronics Group，Institute of Semiconductors, Chinese Academy of Sciences</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京理工大学信息光学联合实验室</p></td>
            <td><p>The Joint Laboratory for Information Optics, Beijing Institute of Technology</p></td>
            <td><p>中科院化学激光重点实验室，中科院大连化学物理研究所</p></td>
            <td><p>Key Laboratory of Chemical Lasers, Dalian Institute of Chemical Physics, Chinese academy of Sciences</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>华南师范大学</p></td>
            <td><p>South China Normal University</p></td>
            <td><p>西安理工大学光电工程技术研究中心</p></td>
            <td><p>Photoelectric Engineering Research Center , Xian University of Technology</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京信息科技大学</p></td>
            <td><p>Beijing Information Science and Technology University</p></td>
            <td><p>吉林大学工程仿生教育部重点实验室</p></td>
            <td><p>Key Laboratory of Bionic Engineering （Ministry of Education, China）, Jilin University.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>激光与物质相互作用国家重点实验室</p></td>
            <td><p>State Key Laboratory of Laser Interaction with Matter</p></td>
            <td><p>燕山大学</p></td>
            <td><p>Yanshan University</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京航空航天大学光电技术研究所</p></td>
            <td><p>Institute of Opto-Electronic Technology ，Beihang University</p></td>
            <td><p>北京市混合现实与新型显示工程技术研究中心</p></td>
            <td><p>Beijing Engineering Research Center of Mixed Reality and Advanced Display</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>首都师范大学太赫兹光电子学教育部重点实验室</p></td>
            <td><p>Key Laboratory of Terahertz Optoelectronics, Ministry of Education</p></td>
            <td><p>"北京航空航天大学仪器科学与光电工程学院
精密光机电一体化教育部重点实验室"</p></td>
            <td><p>"School of Instrumentation Science and Opto-electronics Engineering, 
Precision Opto-mechatronics Technology Key Laboratory of Education Ministry"</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国测控网</p></td>
            <td><p>www.ck365.cn</p></td>
            <td><p>北京中仪华世网络技术有限公司</p></td>
            <td><p>Beijing Zhongyi Huashi Network Technology Co., Ltd.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>激光杂志</p></td>
            <td><p>LASER JOURNAL</p></td>
            <td><p>仪器信息网</p></td>
            <td><p>www.instrument.com.cn</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>《环球科学》杂志社</p></td>
            <td><p>Global science magazine</p></td>
            <td><p>中国光电网</p></td>
            <td><p>www.optochina.net</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>南京光研软件系统有限公司</p></td>
            <td><p>Nanjing Wavelab Software System Co.,Ltd</p></td>
            <td><p>科学网</p></td>
            <td><p>ScienceNet.cn</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>科济天下网</p></td>
            <td><p>www.kjtxw.com</p></td>
            <td><p>先进光学系统设计与制造技术吉林省高校重点实验室</p></td>
            <td><p>Key Laboratory of Advanced Optical System Design &Manufacturing Technology of the Universities of Jilin Province</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京摩尔朗通科技有限公司</p></td>
            <td><p>Beijing Moore Photon Electronic Technology Co., Ltd.</p></td>
            <td><p>中国电子科技集团公司第四十六研究所</p></td>
            <td><p>China Electronics Technology Group Corporation No.46 Research Institute</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>江西飞信光纤传感器件有限公司</p></td>
            <td><p>Fibersense Devices Co., Ltd</p></td>
            <td><p>苏州南智传感科技有限公司</p></td>
            <td><p>Suzhou NanZee Sensing Technology Co.,Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>深圳中科传感科技有限公司</p></td>
            <td><p>CASSTK</p></td>
            <td><p>芬兰Optogear公司</p></td>
            <td><p>Optogear Oy</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京耐威时代科技有限公司</p></td>
            <td><p>NAV TECHNOLOGY Co.,Ltd.</p></td>
            <td><p>北京城市科学技术研究院</p></td>
            <td><p>Beijing city institute of science and technology</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>上海光纤传感产业技术创新战略联盟/上海波汇科技股份有限公司</p></td>
            <td><p></p></td>
            <td><p>徐州旭海光电科技有限公司</p></td>
            <td><p>Xuzhou Xuhai Opto-Electronic Technologies Co.,Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>上海康阔光传感技术股份有限公司</p></td>
            <td><p>Comcore Optical Sensing Technologies Co., Ltd.</p></td>
            <td><p>江苏法尔胜光电科技有限公司</p></td>
            <td><p>Jiangsu Fasten Optoelectronics Technology Co.,Ltd.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>青岛派科森光电技术股份有限公司</p></td>
            <td><p>Qingdao?PEGASUS?Photo-tech?Co.,?LTD</p></td>
            <td><p>北京迪恩康硕科技发展有限公司</p></td>
            <td><p>Distributed Sensing and Control Technology Co. ,Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京长飞优创通信技术有限公司</p></td>
            <td><p>BEIJING CFYC COMMUNICATION TECHNOLOGY CO., LTD</p></td>
            <td><p>苏州光环科技有限公司</p></td>
            <td><p>Suzhou Optoring Technology Co.,Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>捷通技术服务有限公司</p></td>
            <td><p>GTL Technology & Service Co. Ltd</p></td>
            <td><p>赛博普路光电（武汉）有限公司</p></td>
            <td><p>FIBERPRO WUHAN CO.,LTD.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国电子科技集团公司第四十一研究所</p></td>
            <td><p>The 41st Institute of China Electronics Technology Group Corporation</p></td>
            <td><p>上海普银光电科技有限公司</p></td>
            <td><p>Shanghai UniSilver Technology Ltd.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>德逸时代（天津）科技有限公司</p></td>
            <td><p>DeYi Times (TianJin)</p></td>
            <td><p>摩泰科技(深圳)有限公司</p></td>
            <td><p>Module Tek Limited</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京凌云光子技术有限公司</p></td>
            <td><p>"Luster LightTech International Co.,Limited
"</p></td>
            <td><p>中国光学工程学会</p></td>
            <td><p>Chinese Society for Optical Engineering（CSOE）</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>"中国高科技产业化研究会产学研合作协调部
中国高科技产业化研究会光电科技产业化分会"</p></td>
            <td><p></p></td>
            <td><p>上海华魏光纤传感技术有限公司</p></td>
            <td><p>Shanghai Boom Fiber Sensing Technology Co., Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京富立秦天光电科技有限公司</p></td>
            <td><p>Beijing Fuliqintian Photoelectric Technology Co., Ltd</p></td>
            <td><p>上海大学</p></td>
            <td><p>Shanghai University</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>武汉睿芯特种光纤有限责任公司</p></td>
            <td><p>Wuhan BrightCore Optical Fiber Co., Ltd.</p></td>
            <td><p>北京神州普惠科技股份有限公司</p></td>
            <td><p>Appsoft Technology Co., Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国航空工业集团公司北京长城计量测试技术研究所</p></td>
            <td><p>Aviation Industry Corporation of China</p></td>
            <td><p>广州奥鑫通讯设备有限公司</p></td>
            <td><p>ORTE Photonics Co., LTD</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>鞍山睿科光电技术有限公司</p></td>
            <td><p>Realphotonics</p></td>
            <td><p>哈尔滨工程大学</p></td>
            <td><p>Harbin Engineering University</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>浙江华安激光科技股份有限公司</p></td>
            <td><p>Zhejiang Huaan Laser Technology</p></td>
            <td><p>北京拓普光研科技发展有限公司</p></td>
            <td><p>Beijing TOP Photonics Co., Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>哈尔滨工业大学可协调（气体）激光技术重点实验室</p></td>
            <td><p></p></td>
            <td><p>哈尔滨工业大学空间光通信技术研究中心</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>燕山大学</p></td>
            <td><p>Yanshan University</p></td>
            <td><p>中自高科（苏州）光电有限公司</p></td>
            <td><p>EPhoton Co; Ltp</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>华拓光研科技（北京）有限公司</p></td>
            <td><p>Sino Point Photonics(Beijing)Ltd.</p></td>
            <td><p>武汉长盈通光电技术有限公司</p></td>
            <td><p>YOEC</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京锐扬科技有限责任公司</p></td>
            <td><p>RayionTech</p></td>
            <td><p>苏州美房云客软件科技股份有限公司</p></td>
            <td><p>MY FLYING</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>清华大学</p></td>
            <td><p>Tsinghua University</p></td>
            <td><p>北京赛四达科技股份有限公司</p></td>
            <td><p>Beijing tournament four Technology Co..Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国航天科工集团二院二部</p></td>
            <td><p>Science and Technology on Special System Simulation Laboratory / State Key Laboratory of Intelligent Manufacturing System Technology</p></td>
            <td><p>上海瀚宇光纤通信技术有限公司</p></td>
            <td><p>Connet Fiber Optics Co., Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>上海昊量光电设备有限公司</p></td>
            <td><p>Aunion Tech Co., Ltd</p></td>
            <td><p>硬见</p></td>
            <td><p>tech2real</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>武汉高思光电科技有限公司</p></td>
            <td><p>WUHAN GAUSSIAN OPTICS CO.,LT</p></td>
            <td><p>北京玻璃研究院</p></td>
            <td><p>Beijing Glass Research Institute</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>厦门彼格科技有限公司</p></td>
            <td><p>BEOGOLD TECHNOLOGY</p></td>
            <td><p>德州振飞光纤技术有限公司</p></td>
            <td><p>ZHENFEI FIBER TECHNOLOGY LTD</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>匠研光学科技（上海）有限公司</p></td>
            <td><p>Opsmith Technologies Co.,Ltd.</p></td>
            <td><p>厦门奥斯福电力系统有限公司</p></td>
            <td><p>Xiamen AOSIF Engineering Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京朗普达光电科技有限公司</p></td>
            <td><p>Light Promo Tech Co., Limited</p></td>
            <td><p>武汉华中天勤防务技术有限公司</p></td>
            <td><p>Huazhong Tianqin Defense Technology Ltd.Co</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京华安天瑞科技有限公司</p></td>
            <td><p>Beijing HATR Technologies Co.,Ltd</p></td>
            <td><p>武汉新特光电技术有限公司</p></td>
            <td><p>Wuhan Sintec Optronics Co.,LTD</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>网络电信</p></td>
            <td><p>NETWORK TELECOM</p></td>
            <td><p>上海会亚通信科技有限公司</p></td>
            <td><p>China-fiber Optics CO.,Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>普格精密系统有限公司</p></td>
            <td><p>Plugtech Precision Systems Limited</p></td>
            <td><p>新泰欣宏精密模具有限公司</p></td>
            <td><p>XTXH PRECISION TOOLING (SHEN ZHEN)CO.LTD.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京邮电大学信息通信动态新技术科普教育基地</p></td>
            <td><p></p></td>
            <td><p>青亭网</p></td>
            <td><p>www.7tin.cn</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国（南昌）虚拟现实VR产业基地</p></td>
            <td><p></p></td>
            <td><p>昆明微想智森科技有限公司</p></td>
            <td><p>OTHINK,Wisdom Blooming</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>江苏亨通光纤科技有限公司</p></td>
            <td><p>Jiangsu Hengtong Optical Fiber Technology Co.,Ltd.</p></td>
            <td><p>中国航天科技集团公司第九研究院第十三研究所</p></td>
            <td><p>Institue NO.13 of China Aerospace Academe No.9</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>武汉理工光科股份有限公司</p></td>
            <td><p>www.wutos co.,ltd</p></td>
            <td><p>武汉·中国光谷物联网产业技术创新联盟</p></td>
            <td><p>WIITA</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京世维通科技发展有限公司</p></td>
            <td><p>Beijing SWT Science&Technology Development Co.,Ltd.</p></td>
            <td><p>长飞光纤光缆股份有限公司</p></td>
            <td><p>Yangtze Optical Fibre And Cable Stock Limited Company</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京浦丹光电股份有限公司</p></td>
            <td><p>Panwoo Integrated Optoelectronic Inc.</p></td>
            <td><p>多</p></td>
            <td><p>多2</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>锐光信通科技有限公司</p></td>
            <td><p>RuiGuang Technology Co.，LTD.</p></td>
            <td><p>中国联合网络通信有限公司网络技术研究院</p></td>
            <td><p>China Unicom</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国联通</p></td>
            <td><p>China Unicom</p></td>
            <td><p>山东英特力光通信开发有限公司</p></td>
            <td><p>Shandong  Intelligent Optical Communication Development Co.,Led.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>深圳市特发信息股份有限公司</p></td>
            <td><p>Shenzhen SDG Information Co.,Ltd</p></td>
            <td><p>中天科技集团有限公司</p></td>
            <td><p>ZTT Group</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>天津大学微光机电系统技术教育部重点实验室</p></td>
            <td><p>MOEMS Education Ministry Key Laboratory, Tianjin University</p></td>
            <td><p>遥感信息与图像分析技术国家级重点实验室</p></td>
            <td><p>National key laboratory of science and technology on remote sensing information and image analysis</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>科大国盾量子技术股份有限公司</p></td>
            <td><p>QuantumCTek</p></td>
            <td><p>北京邮电大学信息光子学与光通信国家重点实验室</p></td>
            <td><p>State Key Laboratory of Information Photonics and Optical Communications(Beijing University of Posts and Telecommunications</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国科学院大气成分与光学重点实验室</p></td>
            <td><p>Key Laboratory of Atmospheric Composition and Optical Radiation(LACOR), CAS</p></td>
            <td><p>教育部光学仪器与系统工程中心</p></td>
            <td><p>Engineering Research Center of Optical Instrument and System</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>"湖北省襄阳市科协展示区
航宇救生装备有限公司"</p></td>
            <td><p></p></td>
            <td><p>"湖北省襄阳市科协展示区
湖北云川光电科技有限公司"</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>吉林省美霓灯光雕塑科技有限公司</p></td>
            <td><p>JILIN PROVINCE MEINI LIGHTING SCULPTURE SCIENCE TECHNICAL CO.  LTD.</p></td>
            <td><p>"湖北省襄阳市科协展示区
襄阳锦翔光电科技股份有限公司"</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>"湖北省襄阳市科协展示区
湖北瑞百诚电气有限公司"</p></td>
            <td><p></p></td>
            <td><p>英国安道尔科技公司</p></td>
            <td><p>Andor Technology Ltd. </p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>大连理工大学</p></td>
            <td><p>Dalian University of Technology </p></td>
            <td><p>武汉新瑞达激光工程有限责任公司</p></td>
            <td><p>Wuhan New Research & Development Laser Co.,Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京镭宝光电技术有限公司</p></td>
            <td><p>Beamtech Optronics Co., Ltd.</p></td>
            <td><p>中国科学院安徽光学精密机械研究所</p></td>
            <td><p>Anhui Institute of Optics and Fine Mechanics, Chinese Academy of Sciences  </p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>海洋光学 </p></td>
            <td><p>Ocean Optics</p></td>
            <td><p>奥普特科技（北京）有限公司</p></td>
            <td><p>Optime Technology (Beijing) Co.,Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京爱万提斯科技有限公司</p></td>
            <td><p>AVANTES CHINA</p></td>
            <td><p>山西大学</p></td>
            <td><p>Shanxi University </p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国科学院半导体研究所</p></td>
            <td><p>Institute of Semiconductors,Chinese Academy of Sciences</p></td>
            <td><p>西南技术物理研究所</p></td>
            <td><p>Southwest Institute of Technical Physics</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>天津大学光纤通信实验室</p></td>
            <td><p>Optical Fiber Communication laboratory, Tianjin University</p></td>
            <td><p>中国科学院上海光学精密机械研究所；中国科学院强激光材料重点实验室；高功率激光单元技术研发中心</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>应用光学国家重点实验室</p></td>
            <td><p>State key laboratory of applied optics</p></td>
            <td><p>先进制导控制技术国防科技重点实验室</p></td>
            <td><p>National Key Laboratory of Science and Technology on Advanced Guidance and Control</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>中国科学院沈阳自动化研究所</p></td>
            <td><p>Shenyang Institute of Automation Chinese Academy of Sciences</p></td>
            <td><p>长春新产业光电技术有限公司</p></td>
            <td><p> Changchun New Industries Optoelectronics Tech.Co.,Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>上海凯来实验设备有限公司</p></td>
            <td><p>Shanghai Chemlab Laboratory Instrument Co., Ltd.</p></td>
            <td><p>清华大学</p></td>
            <td><p>Tsinghua University</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京易科泰生态技术有限公司</p></td>
            <td><p>Beijing EcoTech Science and Technology Ltd. </p></td>
            <td><p>澳作生态仪器有限公司</p></td>
            <td><p>Aozuo Ecology Instrumentation Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>埃德比光子科技（中国）有限公司</p></td>
            <td><p>LTB Lasertechnik Berlin GmbH</p></td>
            <td><p>美国TSI公司</p></td>
            <td><p>TSI Incorporated</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>中国工程物理研究院激光聚变研究中心</p></td>
            <td><p>LASER FUSION RESEARCH CENTER</p></td>
            <td><p>中国工程物理研究院高能激光科学与技术重点实验室</p></td>
            <td><p>Key Lab on High Energy Laser Sci. & Tech, CAET</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>深圳安智视科技有限公司</p></td>
            <td><p>Shenzhen Agivision Technology Co.,Ltd</p></td>
            <td><p>南京理工大学，江苏省光谱成像与智能感知重点实验室</p></td>
            <td><p>Nanjing University of Science and Technology，Jiangsu Key Laboratory of Spectral Imaging & Intelligent Sense</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>红外探测器技术航空科技重点实验室</p></td>
            <td><p>Aviation Key Laboratory of Science and Technology on Infrared Detector</p></td>
            <td><p>深圳大学-广东省高校先进光学精密制造技术重点实验室</p></td>
            <td><p>Key Laboratory of Advanced Optical Precision Manufacturing Technology of Guangdong Higher Education Institutes</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>山西国惠光电科技有限公司</p></td>
            <td><p>Shanxi Guohui Optoelectronic Technology CO.,LTD</p></td>
            <td><p>苏州慧利仪器有限责任公司</p></td>
            <td><p>Suzhou H&L Instruments LLC.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>天瑞集思（北京）科技有限公司</p></td>
            <td><p>TR-GIS (Beijing)Technology Co.,Ltd.</p></td>
            <td><p>中科遥感科技集团有限公司</p></td>
            <td><p>China RS Geoinformatics Co.,Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京卓立汉光仪器有限公司</p></td>
            <td><p>Zolix</p></td>
            <td><p>温州高新区（浙南科技城）</p></td>
            <td><p>"Wenzhou High-tech Zone 
(Zhenan Sci-tech city) 
"</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>Quantum Design中国子公司</p></td>
            <td><p>Quantum Design China</p></td>
            <td><p>俊泰行（北京）通信技术有限公司</p></td>
            <td><p>Chuntai Communication Technology（Beijing）Co.,Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>安徽宏实紫晶光电研究所有限公司</p></td>
            <td><p>Anhui Hongshi Amethyst Optoelectroinc Research Laboratory</p></td>
            <td><p>上海华赋信息科技有限公司</p></td>
            <td><p>Shanghai Huave Info-tech CO.,Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京理加联合科技有限公司</p></td>
            <td><p>LICA United Technology Limited</p></td>
            <td><p>北京创世威纳科技有限公司</p></td>
            <td><p>Beijing Chuangshiweina Technology Co.,Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>成都太科光电技术有限责任公司</p></td>
            <td><p>Cheng Du TYGGO photoelectricity Co., Ltd</p></td>
            <td><p>江苏星宇芯联电子科技有限公司</p></td>
            <td><p>Jiangsu XinYuXinLian Electronics Technology Co.Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京神州普惠科技股份有限公司</p></td>
            <td><p>Appsoft Technology Co., Ltd.</p></td>
            <td><p>北京瓦科光电科技有限公司</p></td>
            <td><p>Beijing Wavicle-laser</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>昆明全波红外科技有限公司</p></td>
            <td><p>KUNMING VISION INFRARED CO.,LTD</p></td>
            <td><p>北京振兴计量所</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>天津津航技术物理研究所</p></td>
            <td><p>Tianjin Jinhang Technical Physics Research Institute</p></td>
            <td><p>天津津航计算技术研究所</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>北京环境特性研究所</p></td>
            <td><p>Beijing Institute of Environmental Features</p></td>
            <td><p>先进制导控制技术重点实验室</p></td>
            <td><p>National Key Laboratorg of science  Technology on Advanced Guidance and Control</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京航天计量测试技术研究所</p></td>
            <td><p>Beijing Aerospace Institute For Metrology And Measurement Technology</p></td>
            <td><p>长春长光辰芯光电技术有限公司</p></td>
            <td><p>Gpixel INC.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>上海飞博激光科技有限公司</p></td>
            <td><p>Shanghai Feibo Technologies Co.Ltd</p></td>
            <td><p>湖北捷讯光电有限公司</p></td>
            <td><p>Optoplex Technology Co.Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北方夜视科技集团有限公司</p></td>
            <td><p>NORTH NIGHT-VISION SCIENCE & TECHNOLOGY GROUP CO., LTD</p></td>
            <td><p>杭州麦乐克电子科技有限公司</p></td>
            <td><p>MULTI IR OPTOELECTRONICS CO., LTD</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>武汉华中数控股份有限公司</p></td>
            <td><p>WUHAN HUAZHONG NUMERICAL CONTROL  CO., LTD</p></td>
            <td><p>前视红外光电科技（上海）有限公司</p></td>
            <td><p>FLIR Systems (Shanghai) Co.,Ltd.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>湖北久之洋红外系统股份有限公司</p></td>
            <td><p>HUBEI JIUZHIYANG INFRARED SYSTEM CO., LTD</p></td>
            <td><p>广州飒特红外股份有限公司</p></td>
            <td><p>Guangzhou SAT Infrared Technology Co., Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>常熟国家科技园</p></td>
            <td><p></p></td>
            <td><p>中国质量认证中心</p></td>
            <td><p>China Quality Certification Centre(CQC)</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>中国光学工程学会</p></td>
            <td><p>Chinese Society for Optical Engineering</p></td>
            <td><p>吉林省光学学会</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>光电技术研发中心</p></td>
            <td><p>Opto-Electronic Technology Center of CIOMP</p></td>
            <td><p>长春富瑞光电有限公司</p></td>
            <td><p>Forerun Electro-Optics Co.,Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>洛阳微米光电技术有限公司</p></td>
            <td><p>Luoyang Optics Co.,Ltd</p></td>
            <td><p>武汉高德红外股份有限公司</p></td>
            <td><p>wuhan-guide</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国科学院半导体研究所</p></td>
            <td><p>Institute of Semiconductors, Chinese Academy of Sciences</p></td>
            <td><p>烟台艾睿光电科技有限公司</p></td>
            <td><p>Yantai Iray Technology Co., Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>宁波舜宇红外技术有限公司</p></td>
            <td><p>Ningbo Sunny Infrared Technologies Co., Ltd</p></td>
            <td><p>凌云光技术集团有限责任公司</p></td>
            <td><p>LUSTER LightTech Group</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>索雷博光电科技（上海）有限公司</p></td>
            <td><p>THORLABS</p></td>
            <td><p>泰一科技</p></td>
            <td><p>AIRace TECHNOLOGY</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>京津科技谷</p></td>
            <td><p>Jing-Jin Technology Vallay</p></td>
            <td><p>北京雅世恒源科技发展有限公司</p></td>
            <td><p>Beijing YSHY Technology Co., Ltd.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>昆明船舶设备研究试验中心</p></td>
            <td><p></p></td>
            <td><p>丸荣机械股份有限公司</p></td>
            <td><p>Acrow Machinery Mfg.Co.,Ltd.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>深圳市镭神智能系统有限公司</p></td>
            <td><p>Leishen intelligent System Co.,Ltd</p></td>
            <td><p>瑞典爱尔诺红外公司</p></td>
            <td><p>IRnova AB</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>南京波长光电科技股份有限公司</p></td>
            <td><p>Wavelength Opto-Electronic(Nanjing)Co.,Ltd</p></td>
            <td><p>北京迅天宇光电科技有限公司</p></td>
            <td><p>Skyray Opto-eletronic Technologies.Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>脉动科技有限公司</p></td>
            <td><p>PulsePower Technology Limited.</p></td>
            <td><p>苏州微纳激光光子技术有限公司</p></td>
            <td><p>Suzhou Micro-Nano Laser&Photonic Technology Co.，Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>成都贝瑞光电科技股份有限公司</p></td>
            <td><p>Z & Z Optoelectronic Tech. Co., Ltd</p></td>
            <td><p>北京全欧光学检测仪器有限公司</p></td>
            <td><p>TRIOPTICS CHINA</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>上海蓝菲光学仪器有限公司</p></td>
            <td><p>Shanghai Labsphere Optical Equipment Co.,Ltd.</p></td>
            <td><p>上海倍蓝光电科技有限公司</p></td>
            <td><p>Shanghai Ultrablue Scientific Co., Ltd</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>哈尔滨芯明天科技有限公司</p></td>
            <td><p>Harbin Core Tomorrow Science&Technology Co.,Ltd.</p></td>
            <td><p>天津欧泰激光科技有限公司</p></td>
            <td><p>Tianjin Optera Laser Co. Ltd</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京奇迹光通科技有限公司</p></td>
            <td><p>Miracle Photonics Technology Co., Ltd</p></td>
            <td><p>北京珊达兴业科技发展有限责任公司</p></td>
            <td><p>SUNDA LASER TECHNOLOGY(BEIJING)CO.,LTD.</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>山东海富光子科技股份有限公司</p></td>
            <td><p>Shandong HFB Photonics Co.Ltd</p></td>
            <td><p>保定晶泽光电技术有限公司</p></td>
            <td><p>BAODING JINGZE OPTICAL&ELECTRICAL TECHNOLOGY.,LTD.</p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>福州鑫图光电有限公司</p></td>
            <td><p>Fuzhou Tucsen Photonics CO.,Ltd</p></td>
            <td><p>台湾高明铁企业股份有限公司</p></td>
            <td><p>GMT   GLOBAL  INO</p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>哈尔滨工业大学 鞍山智恒光电仪器有限公司</p></td>
            <td><p></p></td>
            <td><p>广州日奇电子有限公司</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>武汉巨合科技有限公司</p></td>
            <td><p></p></td>
            <td><p>武汉巨合科技有限公司</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#fbe5e5;">
        	<td><p>中国科学院半导体研究所超晶格国家重点实验室</p></td>
            <td><p></p></td>
            <td><p>鞍山紫玉激光科技有限公司</p></td>
            <td><p></p></td>
        </tr>
        <tr style="background:#f5f5f5">
        	<td><p>北京茂丰光电科技有限公司</p></td>
            <td><p>beijing Exuberance Opto-electronics Technology Co.,Ltd.</p></td>
            <td><p>北京新卓仪器有限公司</p></td>
            <td><p>Beijing Sunjoy Instrument Co.,Ltd.</p></td>
        </tr>
    </table>
</div>
	  </div>
	  <?php else: ?>
      <div class="visitBox">
	  <?php echo ($art['info']); ?>
	  </div><?php endif; ?>
     
    
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