<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>参观指南-<?php echo C('site_name');?></title>
<meta name="description" content="<?php echo C('site_description');?>">
<meta name="keywords" content="<?php echo C('site_keyword');?>">
<meta name="title" content="<?php echo C('site_title');?>">
<link rel="stylesheet" type="text/css" href="/css/index.css"/>
<script src="/js/jquery.js"></script>
<script src="/Public/statics/js/jquery/jquery-1.7.2.min.js"></script>
<script src="/js/index.js"></script>
<link href="/Public/statics/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script src="/Public/statics/js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/Public/statics/js/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="/js/common.js" language="javascript"></script>
<script type="text/javascript" src="/Public/statics/js/area.js" charset="gbk"></script>
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
		$("base").attr("target","");
		$(".nav01 ul li a").attr("target","_blank");
	})
	var s=["s_province","s_city"];//三个select的id
	var s1=["s1_province","s1_city"];
	var s2=["s2_province","s2_city"];
	var opt0 = ["省份","城市"];//初始值
	function _init_area(){  //初始化函数
		for(i=0;i<s.length-1;i++){
			document.getElementById(s[i]).onchange=new Function("change("+(i+1)+")");	
		}
		change(0);
	}
	function change1(v){
		var str="0";
		for(i=0;i<v;i++){
			str+=("_"+(document.getElementById(s1[i]).selectedIndex-1));
		};
		var ss1=document.getElementById(s1[v]);
		with(ss1){
			length = 0;
			options[0]=new Option(opt0[v],opt0[v]);
			if(v && document.getElementById(s1[v-1]).selectedIndex>0 || !v){
				if(dsy.Exists(str)){
					ar = dsy.Items[str];
					for(i=0;i<ar.length;i++){
						options[length]=new Option(ar[i],ar[i]);
					}//end for
					if(v){ options[0].selected = true; }
				}
			}//end if v
			if(++v<s1.length){change(v);}
		}//End with
	}
	
	function change2(v){
		var str="0";
		for(i=0;i<v;i++){
			str+=("_"+(document.getElementById(s2[i]).selectedIndex-1));
		};
		var ss2=document.getElementById(s2[v]);
		with(ss2){
			length = 0;
			options[0]=new Option(opt0[v],opt0[v]);
			if(v && document.getElementById(s2[v-1]).selectedIndex>0 || !v){
				if(dsy.Exists(str)){
					ar = dsy.Items[str];
					for(i=0;i<ar.length;i++){
						options[length]=new Option(ar[i],ar[i]);
					}//end for
					if(v){ options[0].selected = true; }
				}
			}//end if v
			if(++v<s2.length){change(v);}
		}//End with
	}
	function _init_area1(){  //初始化函数
		for(i=0;i<s1.length-1;i++){
			document.getElementById(s1[i]).onchange=new Function("change1("+(i+1)+")");	
		}
		change1(0);
	}
	function _init_area2(){  //初始化函数
		for(i=0;i<s2.length-1;i++){
			document.getElementById(s2[i]).onchange=new Function("change2("+(i+1)+")");	
		}
		change2(0);
	}
	$(function(){
		_init_area();
		_init_area1();
		_init_area2();
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
    	<a href="#"><img src="/images/can_02.jpg" /></a>
    </div>
  	<div class="link02">
    	<ul style="width:500px;">
		   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li <?php if($_GET['type'] == $val['id']): ?>class="current1"<?php endif; ?>>
			<a <?php if($val['id'] == 1): ?>href="http://www.cipeasia.com/register.html"
			<?php elseif($val['id'] == 2): ?>href="http://www.cipeasia.com/LaunchTime.html"
			<?php elseif($val['id'] == 3): ?>href="http://www.cipeasia.com/TrafficGuidance.html"<?php endif; ?>><?php echo ($val['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul><div class="clear"></div>
    </div>
    <div id="new_content">
	<?php if($_GET['type'] != 1): ?><div class="visitBox">
         <?php echo ($art['info']); ?>
    </div>
	<?php else: ?>
	<div class="visitBox">
		<dl>
            <?php echo ($art['info']); ?>
         </dl>
         <div class="onlineBox">
           <div class="onlineNav">
             <ul id="online">
               <li class="current">在线预登记</li>
               <li >团队预登记</li>
               <li >媒体预登记</li>
             </ul>
           </div>
           <div id="online_content" >
             <div class="online">
               <form action="<?php echo U('Visit/submit_c');?>" method="post" id="person_form">
                 <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>称谓<span>*</span> </td>
                        <td  colspan="2"><input type="radio" class="radio" name="gender" value='M' checked="checked"/>先生<input type="radio" class="radio" name="gender" value='F' />女士</td>
                    </tr>
                    <tr>
                        <td width="115px">姓名<span>*</span> </td>
                        <td width="295px"><input type="text" class="text validate[required]" name='name' /></td>
                        <td width="598px">职位<span>*</span><input type="text" class="text validate[required]" name='position'/></td>
                    </tr>
                     <tr>
                        <td>部门<span>*</span> </td>
                        <td><input type="text" class="text validate[required]" name='department' /></td>
                        <td>邮编 <input type="text" class="text" name='post_code' /></td>
                    </tr>
                    <tr>
                        <td>单位名称<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required]" name='company' /></td>
                    </tr>
                     <tr>
                        <td>通讯地址<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required]" name='address' /></td>
                    </tr>
                    <input type="hidden" name="is_group" value="0">
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
                        <td  colspan="2"><input type="text" value="+86" class="text text-01 validate[required]" name='tel1'/> 
                          <input type="text" class="text text-01 validate[required]" name='tel2'/> 
                          <input type="text" class="text text-02 validate[required]" name='tel3'/> 
                          <input type="text" class="text text-01" name='tel4'/>
                          <font>(格式：国家号-区号-电话号-分机)</font>
                        </td>
                    </tr>
                     <tr>
                        <td>传真 </td>
                        <td  colspan="2"><input type="text" value="+86" class="text text-01" name='fax1'/> 
                          <input type="text" class="text text-01" name='fax2'/> 
                          <input type="text" class="text text-02" name='fax3'/> 
                          <input type="text" class="text text-01" name='fax4'/>
                        <font>(格式：国家号-区号-电话号-分机)</font>
                        </td>
                    </tr>
                    <tr>
                        <td>手机<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required,custom[shouji]]" name='mobile'/></td>
                    </tr>
                    <tr>
                        <td>Email<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required,custom[email]]" name='email'/></td>
                    </tr>
                   <tr>
                        <td>网址<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required]" name='website'/></td>
                    </tr>
                    <tr>
                        <td  colspan="3"><input type="submit" value="提交" class="sub"/></td>
                    </tr>
                 </table>
             </form>
           </div>
           <div class="online" style="display:none;">
               <form action="<?php echo U('Visit/submit_c');?>" method="post" id="group_form">
                 <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>称谓<span>*</span> </td>
                        <td  colspan="2"><input type="radio" class="radio" name="gender" value='M' checked="checked"/>先生<input type="radio" class="radio" name="gender" value='F' />女士</td>
                    </tr>
                    <tr>
                        <td width="115px">姓名<span>*</span> </td>
                        <td width="295px"><input type="text" class="text validate[required]" name="name" /></td>
                        <td width="598px">职位<span>*</span><input type="text" class="text validate[required]" name="position"/></td>
                    </tr>
                     <tr>
                        <td>部门<span>*</span> </td>
                        <td><input type="text" class="text validate[required]" name="department"/></td>
                        <td>邮编 <input type="text" class="text" name="post_code" /></td>
                    </tr>
                    <tr>
                        <td>单位名称<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required]" name="company"/></td>
                    </tr>
                     <tr>
                        <td>通讯地址<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required]" name="address"/></td>
                    </tr>
                    <tr>
                        <td>团队人数<span>*</span> </td>
                        <input type="hidden" name="is_group" value="1">
                        <td  colspan="2"><input type="text" class="text validate[required]" name="visitor_num"/></td>
                    </tr>
                     <tr>
                        <td>省份/地区<span>*</span> </td>
                        <td  colspan="2">
                        	<select name='province' id="s1_province" va="1" class="num2 validate[required]"></select>
                        </td>
                    </tr>
                     <tr>
                        <td>城市<span>*</span> </td>
                        <td  colspan="2">
                        <!-- <select name="city"><option selected="selected">==请选择城市==</option></select> -->
                        <select name="city" id="s1_city" va="1" class="num2 validate[required]"></select>
                        </td>
                    </tr>
                      <tr>
                        <td>电话<span>*</span> </td>
                        <td  colspan="2"><input type="text" value="+86" class="text text-01 validate[required]" name="tel1"/> 
                          <input type="text" class="text text-01 validate[required]" name="tel2"/> 
                          <input type="text" class="text text-02 validate[required]" name="tel3"/> 
                          <input type="text" class="text text-01" name="tel4"/>
                          <font>(格式：国家号-区号-电话号-分机)</font>
                        </td>
                    </tr>
                     <tr>
                        <td>传真 </td>
                        <td  colspan="2"><input type="text" value="+86" class="text text-01" name="fax1"/> 
                          <input type="text" class="text text-01" name="fax2"/> 
                          <input type="text" class="text text-02" name="fax3"/> 
                          <input type="text" class="text text-01" name="fax4"/>
                        <font>(格式：国家号-区号-电话号-分机)</font>
                        </td>
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
                    <tr>
                        <td  colspan="3"><input type="submit" value="提交" class="sub"/></td>
                    </tr>
                 </table>
             </form>
           </div>
		   
		   <div class="online" style="display:none;">
               <form action="<?php echo U('Visit/submit_m');?>" method="post" id="meiti_form">
                 <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>称谓<span>*</span> </td>
                        <td  colspan="2"><input type="radio" class="radio" name="gender" value='M' checked="checked"/>先生<input type="radio" class="radio" name="gender" value='F' />女士</td>
                    </tr>
                    <tr>
                        <td width="115px">姓名<span>*</span> </td>
                        <td width="295px"><input type="text" class="text validate[required]" name='name' /></td>
                        <td width="598px">职位<span>*</span><input type="text" class="text validate[required]" name='position'/></td>
                    </tr>
                     <tr>
                        <td>部门<span>*</span> </td>
                        <td><input type="text" class="text validate[required]" name='department' /></td>
                        <td>邮编 <input type="text" class="text" name='post_code' /></td>
                    </tr>
                    <tr>
                        <td>单位名称<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required]" name='company' /></td>
                    </tr>
                     <tr>
                        <td>通讯地址<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required]" name='address' /></td>
                    </tr>
                    <input type="hidden" name="is_group" value="2">
                     <tr>
                        <td>省份/地区<span>*</span> </td>
                        <td  colspan="2">
                        	<select name='province' id="s2_province" va="1" class="num2 validate[required]"></select>
                        </td>
                    </tr>
                     <tr>
                        <td>城市<span>*</span> </td>
                        <td  colspan="2">
                        	<select name="city" id="s2_city" va="1" class="num2 validate[required]"></select>
                        </td>
                    </tr>
                     <tr>
                        <td>电话<span>*</span> </td>
                        <td  colspan="2"><input type="text" value="+86" class="text text-01 validate[required]" name='tel1'/> 
                          <input type="text" class="text text-01 validate[required]" name='tel2'/> 
                          <input type="text" class="text text-02 validate[required]" name='tel3'/> 
                          <input type="text" class="text text-01" name='tel4'/>
                          <font>(格式：国家号-区号-电话号-分机)</font>
                        </td>
                    </tr>
                     <tr>
                        <td>传真 </td>
                        <td  colspan="2"><input type="text" value="+86" class="text text-01" name='fax1'/> 
                          <input type="text" class="text text-01" name='fax2'/> 
                          <input type="text" class="text text-02" name='fax3'/> 
                          <input type="text" class="text text-01" name='fax4'/>
                        <font>(格式：国家号-区号-电话号-分机)</font>
                        </td>
                    </tr>
                    <tr>
                        <td>手机<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required,custom[shouji]]" name='mobile'/></td>
                    </tr>
                    <tr>
                        <td>Email<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required,custom[email]]" name='email'/></td>
                    </tr>
                   <tr>
                        <td>网址<span>*</span> </td>
                        <td  colspan="2"><input type="text" class="text validate[required]" name='website'/></td>
                    </tr>
                    <tr>
                        <td  colspan="3"><input type="submit" value="提交" class="sub"/></td>
                    </tr>
                 </table>
             </form>
           </div>
		   
         </div>
       </div>
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