<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title>科济天下网_在线对接会_首页</title>
<link href="/css/Online/index.css" rel="stylesheet" type="text/css" />
<link href="/css/Online/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/Online/jquery-1.7.2.min.js"></script>
<script src="/js/Online/index.js"></script>
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
	$(".ABC p").click(function(){
      var index = $(this).parents('td').index();
	  $(this).parent().attr("class","red").siblings().attr("class","");

	  $(".Radios td").eq(index).find(".dx_radio").prop("checked",true);
	 
	})
	$(".dx_radio").click(function(){
		var index = $(this).parents('td').index();
		$(".ABC td").eq(index).attr("class","red").siblings().attr("class","");
		
	});
	
})
</script>
<script>
/* 
 * url 目标url 
 * arg 需要替换的参数名称 
 * arg_val 替换后的参数的值 
 * return url 参数替换后的url 
 */ 
 function changeURLArg(url,arg,arg_val){ 
     var pattern=arg+'=([^&]*)'; 
     var replaceText=arg+'='+arg_val; 
     if(url.match(pattern)){ 
         var tmp='/('+ arg+'=)([^&]*)/gi'; 
         tmp=url.replace(eval(tmp),replaceText); 
         return tmp; 
     }else{ 
         if(url.match('[\?]')){ 
             return url+'&'+replaceText; 
         }else{ 
             return url+'?'+replaceText; 
         } 
     } 
     return url+'\n'+arg+'\n'+arg_val; 
 } 
</script>
</head>
<style>
.main-left-01 table	p{
	padding:0;
	margin:0;}
.main-left-01 table{
	margin:0;}
.techlist_04{
	margin-top:10px;
	margin-left:10px;}
.main-left-02 dl dd img{
	float:left;
	display:block;
	height:50px;}
.main-left-02 dd h1	a{
	line-height:50px;}
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
 

<div class="HH"></div>
 <div class="searchBox">
  <form action="" method="get" target="_self">
    <div class="search2">
        <div class="logo" style="width:750px;">
            <div class="logoImg">
                <img src="/images/Online/logo_40.jpg">
            </div>
            <div class="search-01" style="border:2px solid #990032;width:67px;margin-top: 5px;">
            	<select name='type' class="txt_bg ">
				  <option value ="1" selected="selected">展商</option>
				  <option value ="2">展品</option>
				</select>
            </div>
            <div class="logoMain">
                <p>
                    <input class="text" style="width:370px;" name="keyword" value="<?php echo ($keyword); ?>" placeholder="请输入查询关键词">
					<input name="" type="submit" class="but" value="搜  索">
                </p>
            </div>
        </div>
    </div>
  </form>
</div>
<div class="navBox">
	<ul>
    	<li><a href="<?php echo U('index/index');?>" class="currentA" target="_self">首页</a></li>
        <!-- <li><a href="<?php echo U('index/index_c');?>">会议申请</a></li>
        <li><a href="<?php echo U('index/index_c');?>">在线会议室</a></li> -->
    </ul>
</div>
<div class="mainBox">
    <div class="main-left">
    	<div class="main-left-01" style="height:auto;">
        	<h1>在线对接列表</h1>
<div class="dx_xuanze">
            	<table cellpadding="0" cellspacing="0" border="0">
                	<tr class="ABC">
                    	<td <?php if(!$_GET['fl']){ echo 'class="red"';} ?> ><p onclick="self.location.href='<?php echo ($flUrl); ?>&fl='">all</p></td>
                        <?php
 for($i=65;$i<91;$i++){ ?>
							<td <?php if($_GET['fl'] == chr($i)){ echo 'class="red"';} ?>><p onclick="self.location.href='<?php echo ($flUrl); ?>&fl=<?php echo chr($i); ?>'"><?php echo chr($i);?></p></td>
						<?php } ?>
                        
                    </tr>
                    <tr class="Radios">
                    	<td><font><input type="radio" class="dx_radio" name="weiyi" <?php if(!$_GET['fl']){ echo 'checked=checked';} ?> onclick="self.location.href='<?php echo ($flUrl); ?>&fl='"></font></td>
                        <?php
 for($i=65;$i<91;$i++){ ?>
                        <td><font><input type="radio" class="dx_radio" name="weiyi" <?php if($_GET['fl'] == chr($i)){ echo 'checked=checked';} ?> onclick="self.location.href='<?php echo ($flUrl); ?>&fl=<?php echo chr($i); ?>'"></font></td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
            <div class="techlist_04">
<!--<style>
.userType ul {
    margin-bottom: -5px;
    overflow: hidden;
}
.userType ul li {
    float: left;
    margin: 0 5px 5px 0;
    white-space: nowrap;
}
.userType ul li a {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ddd;
    float: left;
    height: 28px;
    line-height: 28px;
    padding: 0 8px;
    position: relative;
}
.userType ul li a:hover {
    border-color: #f90;
    text-decoration: none;
}
.userType ul li a i {
    background: rgba(0, 0, 0, 0) url("images/icons-2.png?v=2016020101") no-repeat scroll 0 -33px;
    bottom: -2px;
    display: none;
    height: 11px;
    position: absolute;
    right: -2px;
    width: 11px;
}
.userType ul li.selected a {
    border: 2px solid #f90;
    height: 26px;
    line-height: 26px;
    padding: 0 7px;
}
</style>
			<div class="userType">
				<ul>
	          		<li  class="selected"><a href="#" target="_self">搜全部<i></i></a></li>   
	          		<li  class=""><a href="?type=<?php echo ($type); ?>" target="_self">搜企业<i></i></a></li>   
	          		<li  class=""><a href="?type=<?php echo ($type); ?>" target="_self">搜专家<i></i></a></li>   
	            </ul>
            </div>-->
          <table cellpadding="0" cellspacing="0" border="0">
              <tr valign="top">
                 <td width="60"><span style="padding-top:10px; display:block;">主题展区</span></td>
                 <td>
                     <div class="techlist_05">
                         <ul id="list">
                         	<?php  foreach($themeList as $k => $v){ ?>
                            <li>
                               <div class="normal"  style="background:none;"><span <?php if($v['id'] == $_GET['tid']){?>class="curr"<?php }?>></span><a href="<?php echo ($themeUrl); ?>&tid=<?php echo ($v['id']); ?>"  class="sub-link" target="_self" >&nbsp;&nbsp;<?php echo mb_substr($v['cname'],0,24); ?></a></div>
                            </li>
                            <?php  } ?>
                         </ul>
                     </div>
                 </td>
             </tr>
             <tr >
             	<td>
                	<span style="padding-top:3px; display:block;">行业分类</span>
                </td>
                <td>
                	<select class="xiala" style="margin-top:15px; margin-bottom:15px;" name='industrySelect' onchange="self.location.href=changeURLArg('<?php echo ($URI); ?>', 'ind', options[selectedIndex].value  )" > 
                    <option value="0" <?php if($_GET['ind'] == 0){ echo "selected='selected'";} ?>>所有</option>
                    <?php foreach ($industryList as $k => $v){ ?>
                    <option value="<?php echo ($v['id']); ?>" <?php if($_GET['ind'] == $v['id']){ echo "selected='selected'";} ?> ><?php echo ($v['cname']); ?></option>                    
                    <?php } ?>
                   </select>
                </td>
             </tr>
          </table>
       </div>
        </div>
        <!-- <div style="margin: 20px;"><h3 style="color:red;">欢迎明年再次使用，期待明年再相聚!</h3></div> -->
        <?php if($_GET['type'] != 2){ ?>
        <div class="main-left-02">
        	<?php foreach($userList['data'] as $k => $v){ if($v['type'] == 2){ ?>
        	<dl>
            	<dd>
                	<img src="<?php echo ($v['pic']); ?>" height="105" ><h1><a href="<?php echo U('index/info/'.$v['uid']);?>">【<?php echo ($v['exhibition_number']); ?>】<?php echo ($v['company_cname']); ?></a></h1>
                    <span>发布时间：<?php echo date('Y-m-d',$v['add_time']);?></span>
                </dd>
                <dt><span>能提供的核心产品及技术合作：</span><?php echo ($v['cooperation_offer']); ?>
                </dt>
                <dt><span>已实现的应用：</span><?php echo ($v['implemented_application']); ?>
                </dt>
                <dt><span>需要何种合作或帮助：</span><?php echo ($v['cooperation_need']); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('index/info/'.$v['uid']);?>">详细信息>></a>
                </dt>
            </dl>
            <?php }else{ ?>
            <dl>
            	<dd>
                	<h1><a href="<?php echo U('index/info/'.$v['uid']);?>"> <?php echo ($v['name']); ?> </a></h1>
                    <span>发布时间：<?php echo date('Y-m-d',$v['add_time']);?></span>
                </dd>
                <dt><span>所属行业：</span><?php echo ($v['industry']); ?>
                </dt>
                <dt><span>需要何种合作或帮助：</span><?php echo ($v['cooperation_need']); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('index/info/'.$v['uid']);?>">详细信息>></a>
                </dt>
            </dl>
            <?php } } ?>
            
            <div class="numBox" style="width:500px;">
            	<?php echo ($userList['html']); ?>
            </div>
        </div>
        <?php }else{ ?>
        展品列表
        <?php } ?>
    </div>
    <div class="main-right">
    	<!-- <div class="iconBox">
        	<div class="icon">
            	<img src="/images/Online/icon_07.jpg" />
                <div class="icon-text">
                	<h1><a href="<?php echo U('index/apply_b');?>">申请对接</a></h1>
                    <p>Apply docking</p>
                </div>
                <span></span>
            </div>
        </div> -->
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