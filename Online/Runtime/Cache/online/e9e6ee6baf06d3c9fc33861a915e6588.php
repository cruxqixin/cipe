<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_展商信息录入</title>
<script type="text/javascript" src="/js/Online/jquery-1.7.2.min.js"></script>
<link href="/css/Online/index.css" rel="stylesheet" type="text/css" />
<link href="/css/Online/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/statics/js/kindeditor4/themes/default/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/statics/js/kindeditor4/kindeditor-min.js"></script>


<script type="text/ecmascript" src="/js/Online/index.js"></script>
<link href="/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script src="/js/Online/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/js/Online/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="/js/Online/common.js?1231" language="javascript"></script>
<script type="text/javascript">

$(function(){
	$("#news li").click(function(){
	  $(this).attr("class","current").siblings().attr("class","");
	  $("#news_content .fixnone").eq($(this).index()).show().siblings().hide();	
	})
})
$(function(){
	$("#testdiv input[type=checkbox]").click(function(){
		if($("#testdiv input[type=checkbox]:checked").size()>3)
		{
			$(this).removeAttr("checked");
			return;
		}
	})
	$("#btndui").click(function(){
		  $(".showboxbg").show();
		  $(".showboxbg").height($(document).height());
	  }) 
	  $("#closebox").click(function(){
		   $(".showboxbg").hide();
	   }) 
})
$(function(){
	 
	$("[id=1]").each(function(){
		 var defaultVal=$(this).val();//将各个input的默认值都保存出来。
		  $(this).focus(function(){
			if($(this).val()==defaultVal)
			  {
				  $(this).val("");//获得焦点时进行判断，如果当前的value值是默认的才进行清空
			  } 
		  })
		  $(this).blur(function(){
			if($(this).val().length==0)
			 {
				 $(this).val(defaultVal);  //失去焦点时进行判断，如果value值的长度等于0（也就是空的时候，//没有输入内容的清空下），将原先保存的value值写入
			 }
		  })
		 
	  })
	  

   
})
$(function(){
	$("form").validationEngine();
	var uploadbutton = KindEditor.uploadbutton({
		button : $('#uploadButton')[0],
		fieldName : 'imgFile',
		url : '/Public/statics/js/kindeditor4/php/upload_json.php?dir=image',
		afterUpload : function(data) {
			if (data.error === 0) {
				var url = KindEditor.formatUrl(data.url, 'absolute');
				$('#pic').val(url);
				$("#imgeface").attr("src",url);
			} else {
				alert(data.message);
			}
		},
		afterError : function(str) {
			alert('网速不给力！');
		}
	})
	uploadbutton.fileBox.change(function(e) {
		uploadbutton.submit();
	});
	   
})
function chooseOne(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("stage");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne1(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("channelsm");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne2(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("rzchannel");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne3(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("ispatent");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	  function chooseOne4(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("technique");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	  function chooseOne5(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("stateplan");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne6(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("fundxm");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne7(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("otherdemand");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }


$(function(){
   	if($("#val").val()){
		$(".showboxbg").show();
		$(".showboxbg").height($(document).height());
	}
	  
	  $("[id=closebox]").each(function(){
			$(this).click(function(){
				$(".showboxbg").hide();
			})
	  })
	    $("#center_product li").click(function(){
		    $(this).attr("class","current").siblings().attr("class","");
			$("#neirong .content").eq($(this).index()).show().siblings().hide();	
	    })
	 $("#chongzhi").click(function(){
		$(".txt").val("");
		
	 })
	 	if($("#val").val()){
		$(".showboxbg").show();
		$(".showboxbg").height($(document).height());
	}
})

</script>
<!--[if lte IE 6]>
<script type="text/javascript" src="/js/PNG.js"></script>
<script type="text/javascript" src="/js/PNGS.js"></script>
<![endif]-->
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
    	<li><a href="<?php echo U('index');?>" class="currentA" target="_self">首页</a></li>
        <!-- <li><a href="#">会议申请</a></li>
        <li><a href="#">在线会议室</a></li> -->
    </ul>
</div>
<div class="mainBox">
    <h5>当前位置： <a href="<?php echo U('index');?>" target="_self">首页</a> ><span> 我的对接</span></h5>
    <div class="top-text">
    	<h1>展商信息录入</h1>
        <!-- <ul id="news">
        	<a style="color: #fff;" href="<?php echo U('index/apply_c');?>" target="_self"><li  style="margin-left:0;">专家/观众（个人）对接申请</li></a>
            <a style="color: #fff;" href="<?php echo U('index/apply_b');?>" target="_self"><li class="current" >参展单位对接申请</li></a>
        </ul> -->
    </div>
    <div class="application">
	<div class="fixnone" style="display:block;">
    	<!-- <h1>在线对接申请表</h1> -->

        <form action="<?php echo U('index/apply_b');?>" id="form1" method="post"  target="_self" enctype="multipart/form-data" >
            <div class="application-01">
            	<div class="application-03">注：单位中英文名称、单位中英文简介、电话，电子信箱，单位网站为展商手册必备信息。</div>
                <div class="application-02">
                    <h2 style="width: 105px;">单位中文名称<span style="color:red;">*</span></h2>
                    <div class="textBox-01" style="width:375px;">
                        <input class="text1 " style="width:370px;" type='text' name='company_cname' value="<?php echo $onlineUser ? $onlineUser['company_cname'] : $tkUser['companyname'];?>"/>
                    </div>
                    <h2>单位英文名称</h2>
                    <div class="textBox-01" style="width:380px;">
                        <input class="text1 " style="width:370px;" type='text' name='company_ename' value="<?php echo $onlineUser['company_ename'];?>"/>
                    </div>
                    
                </div>
                <div class="application-02">
                    <h2>地址</h2>
                    <div class="textBox-03" style="width:550px;">
                        <input class="" style="width:540px;" type='text' name='company_address' value="<?php echo ($onlineUser ? $onlineUser['company_address'] : $tkUser['address']); ?>"/>
                    </div>
                    <h2 style="width:162px;">展位号</h2>
                    <div class="textBox-06" style="width:150px;">
                        <input class="text8 " style="width:140px;" type='text' name='exhibition_number' value="<?php echo ($onlineUser['exhibition_number']); ?>"/>
                    </div>
                </div>
                <div class="application-02">
                    <h2>电话<span style="color:red;">*</span></h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='company_tel' value="<?php echo ($onlineUser ? $onlineUser['company_tel'] : $tkUser['lxrtelphone']); ?>"/>
                    </div>
                    <h2>传真</h2>
                    <div class="textBox-05">
                        <input  type='text' name='company_fax' value="<?php echo ($onlineUser['company_fax']); ?>"/>
                    </div>
                    <h2>电子信箱<span style="color:red;">*</span></h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='company_email' value="<?php echo ($onlineUser ? $onlineUser['company_email'] : $tkUser['email']); ?>"/>
                    </div>
                    <h2>单位网站</h2>
                    <div class="textBox-04">
                        <input class="" type='text' name='company_website' value="<?php echo ($onlineUser['company_website']); ?>"/>
                    </div>
                </div>
                <div class="application-03" style="height:60px; background:#f5f5f5;">
	                <div class="dx_name01">
		            	<div class="dx_name02" style="padding-left:15px;">
		            	<p style="font-size:16px; color:#4c4c4c; line-height:60px; display:block;">单位Logo：</p>
		                </div>
		                <div class="logobox01" style="padding-top:5px; padding-bottom:5px; overflow:hidden;">
			                <img id="imgeface"  height=50 src="<?php echo $onlineUser['pic']?$onlineUser['pic']:'/images/Online/bz.jpg'; ?>" />
	        				<input type="hidden" name="pic" id="pic" class=" validate[required]" size="60" value="<?php echo ($onlineUser['pic']); ?>" />
        				</div>
        				<div class="logobox02" style="margin-top:11px;">
        				<label ><input  type="button" id="uploadButton" value="上传图片" /></label>
			            	<!-- <span id="uploadButton">上传图片</span><input id="uploadButton"  type="button"  value="上传图片" /></label> -->
			            </div>
            	</div>
                </div>
                <div class="application-08">
                    <dl>
                        <dd>▪ 单位中文简介：<span style="color:red;">*</span></dd>
                        <dt><textarea class="validate[required]"  name="company_cinfo" style="width:940px;font-family: '微软雅黑';"><?php echo ($onlineUser['company_cinfo']); ?></textarea></dt>
                        <dd>▪ 单位英文简介：</dd>
                        <dt><textarea  name="company_einfo" style="width:940px;font-family: '微软雅黑';"><?php echo ($onlineUser['company_einfo']); ?></textarea></dt>
                    </dl>
                </div>
                <div class="application-03">单位联系人详细资料</div>
                <div class="application-02">
                    <h2>性别</h2>
                    <div class="textBox-05">
                        <input name="gender" type="radio" value="M" class="radio" <?php if($onlineUser['gender']=='M' || !isset($onlineUser['gender'])){ echo 'checked="checked"';} ?>/><p>男</p>
                        <input name="gender" type="radio" value="F" class="radio" <?php if($onlineUser['gender']=='F'){ echo 'checked="checked"';} ?>/><p>女</p>
                    </div>
                    <h2>姓名<span style="color:red;">*</span></h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='name' value="<?php echo ($onlineUser ? $onlineUser['name'] : $tkUser['lxrname']); ?>"/>
                    </div>
                    <h2>职位</h2>
                    <div class="textBox-05">
                        <input type='text' name='position' value="<?php echo ($onlineUser ? $onlineUser['position'] : $tkUser['position']); ?>"/>
                    </div>
                    <h2>手机<span style="color:red;">*</span></h2>
                    <div class="textBox-04">
                        <input class="validate[required]" type='text' name='mobile' value="<?php echo ($onlineUser ? $onlineUser['mobile'] : $tkUser['lxrtelphone']); ?>"/>
                    </div>
                </div>
                <div class="application-02">
                    <h2>直拨电话</h2>
                    <div class="textBox-05">
                        <input class="" type='text' name='tel' value="<?php echo ($onlineUser ? $onlineUser['tel'] : $tkUser['phone']); ?>"/>
                    </div>
                    <h2>传真</h2>
                    <div class="textBox-05">
                        <input type='text' name='fax' value="<?php echo ($onlineUser['fax']); ?>"/>
                    </div>
                    <h2>电子信箱<span style="color:red;">*</span></h2>
                    <div class="textBox-07">
                        <input class="validate[required]" type='text' name='email' value="<?php echo ($onlineUser ? $onlineUser['email'] : $tkUser['email']); ?>"/>
                    </div>
                </div>
                
                <div class="application-10" id='testdiv'>
                	<h3 style="height:306px;">所属行业<span style="color:red;">*</span><br/><span>（最多三个）</span></h3>
                	
                    <ul>
                    <?php foreach ($industryList as $v){ ?>
                    	<li><input name="industry[]" type="checkbox" value="<?php echo ($v['id']); ?>" <?php if(in_array($v['id'], $onlineUser['industry']) ){ echo "checked='checked'";} ?> /><?php echo ($v['cname']); ?></li>
					<?php } ?>
                    </ul>
                </div>
                <div class="application-10" >
                	<h3 style="height:140px;">主题展区<span style="color:red;">*</span></h3>
                	
                    <ul>
                    <?php foreach ($themeList as $v){ ?>
                    	<li><input class="validate[required]" name="theme" type="radio" value="<?php echo ($v['id']); ?>" <?php if($v['id']==$onlineUser['theme_id']){ echo "checked='checked'";} ?> /><?php echo ($v['cname']); ?></li>
					<?php } ?>
                    </ul>
                </div>
				
                <div class="application-03">B2B 商务洽谈</div>
                <div class="application-08">
                    <h1>请认真填写贵单位的合作需求（如希望在展会约见相关展商或关键人，请在此处详细列出，组委会将尽力为您实现）：</h1>
                    <dl>
                        <dd>▪ 能提供的核心产品及技术合作：<span style="color:red;">*</span></dd>
                        <dt><input class="validate[required]" name="cooperation_offer" type="text" value="<?php echo ($onlineUser['cooperation_offer']); ?>"/></dt>
                        <dd>▪ 已实现的应用：</dd>
                        <dt><input class="" name="implemented_application" type="text" value="<?php echo ($onlineUser['implemented_application']); ?>"/></dt>
                        <dd>▪ 需要何种合作或帮助：<span style="color:red;">*</span></dd>
                        <dt><input class="validate[required]" name="cooperation_need" type="text" value="<?php echo ($onlineUser['cooperation_need']); ?>"/></dt>
                        <dd>▪ 是否有投融资需求（如有需求组委会会尽力为您安排与投融资机构面谈）： 
                            <lable><input style="float:none;" name="fund_demand" type="radio" value="1" <?php if($onlineUser['fund_demand']==1 || !isset($onlineUser['fund_demand'])){ echo 'checked="checked"';} ?> class="radio2" />是 </lable>
                            <lable><input style="float:none;" name="fund_demand" type="radio" value="0" <?php if($onlineUser['fund_demand']==0){ echo 'checked="checked"';} ?> class="radio2" />否 </lable>
                            <input class="text6" style="float:none" name="fund_amount" type="text" value="<?php echo ($onlineUser['fund_amount']); ?>"/>万元（RMB）
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="application-09">
                <div class="but-01">
		    		<input type='hidden' name='id' value="<?php echo ($onlineUser['id']); ?>"/>
                    <input type="submit" class="but-02 rad-but" value="下一步" />
                    <input type="button" class="but-02" id="chongzhi" value="重置内容" />

                </div>
            </div>
	</form>
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
<div class="showboxbg">
	<div class="show">
        <div class="show-03">
            <h1>提示信息</h1>
            <a href="#" id="closebox">关闭</a>
        </div>
        <div class="show-01">
            <p>内容为空,不可提交</p>
        </div>
        <div class="show-02">
            <input name="" type="button" class="but" value="确定"/>
        </div>
     </div>
</div>
</body>
</html>