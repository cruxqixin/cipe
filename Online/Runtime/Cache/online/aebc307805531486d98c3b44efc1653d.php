<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_添加产品</title>
<link href="/css/Online/index.css" rel="stylesheet" type="text/css" />
<link href="/css/Online/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/Online/jquery-1.7.2.min.js"></script>
<link href="/Public/statics/js/kindeditor4/themes/default/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/statics/js/kindeditor4/kindeditor-min.js"></script>
<link href="/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script src="/js/Online/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/js/Online/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>

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
	   $("#testdiv .application-06 .title-01 input").click(function(){  
		 var temp=$(this).parent().parent().find("ul");  
		 if(temp.is(":hidden"))
		  {
			 temp.show(); 
			 $(this).val("收起");
		  }
		  else
		  {
		    temp.hide();
			$(this).val("展开");
		  }   
	   })		
     })
	$(function(){
	   $(".falg").click(function(){
		  var html=$(".search-01 .lie");
		  if(html.is(":hidden"))
		  {
			 html.show();  
		  } 
		  else
		  {
			  html.hide();  
		  }  
	   }) 
	   $(".search-01 .lie").find("a").click(function(){
		   $(".txt_bg").val($(this).html());
		   $(".search-01 .lie").hide();
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
    	<li><a href="#" class="currentA">首页</a></li>
        <!-- <li><a href="#">会议申请</a></li>
        <li><a href="#">在线会议室</a></li> -->
    </ul>
</div>
<div class="mainBox">
    <h5>当前位置： <a href="<?php echo U('index/index');?>">首页</a> ><span> <a href="<?php echo U('index/detail');?>">我的对接</a></span> ><span> <a href="<?php echo U('product/listS');?>">产品列表</a></span> ><span> 添加产品</span></h5>
    
    <div class="application" id="news_content">
    	<div class="fixnone" style="display:block;">
           <div class="dx_Productdisplay01" style="width:968px; margin:0 auto; padding-top:15px;">
              <div class="dx_Productdisplay02">
                 <p>添加产品</p>
              </div>
              <div class="dx_Productdisplay03">
                 <a href="<?php echo U('porduct/listS');?>">返回></a>
              </div>
           </div>
           <form action="<?php echo U('product/add');?>" id="form1" method="post"  target="_self" enctype="multipart/form-data" >
           <div class="dx_name">
           	<div class="dx_name01">
            	<div class="dx_name02">
            	<p>产品中文名称<span style="color:red;">*</span>：</p>
                </div>
                <div class="dx_name03">
                    <input type="text" name='product_cname' placeholder='请输入产品中文名称' value="" class="dx_text validate[required]">
                </div>
            </div>
            <div class="dx_name01">
            	<div class="dx_name02">
            	<p>产品英文名称<span style="color:red;">*</span>：</p>
                </div>
                <div class="dx_name03">
                    <input type="text" name='product_ename' placeholder='请输入产品英文名称' value="" class="dx_text validate[required]">
                </div>
            </div>
            <div class="dx_name01">
            	<div class="dx_name02">
            	<p>产品标签/关键字<span style="color:red;">*</span>：</p>
                </div>
                <div class="dx_name03">
                    <input type="text" name='tag' placeholder='请输入1-3个产品标签/关键字,以空格或逗号分隔' value="" class="dx_text validate[required]">
                </div>
            </div>
            <div class="dx_name01">
            	<div class="dx_name02">
            	<p>产品图片<span style="color:red;">*</span>：</p>
                </div>
                <div class="logobox01">
                	<img id="imgeface"  height=50 src="/images/Online/dx_12.png" />
	        		<input type="hidden" name="pic" id="pic" class=" validate[required]" size="60" value="" />
                </div>
                <div class=logobox02>
                	<label><input  type="button" id="uploadButton" value="上传图片" /></label ><label><span>（为保证显示效果，请上传360px*300px图片文件）</span></label>
                </div>
            </div>
           </div>

            <div class="dx_jieshao ">
               	<p>产品简介<span style="color:red;">*</span>：</p>
               </div>
               <div class="dx_jieshao01 application-08">
               		<dl>
                        <dd></dd>
                        <dt><input class="validate[required]" name="product_info" type="text" value="" placeholder="请填写200字以内产品简介"/></dt>
                        
                    </dl>
               </div>
            <div class="application-09">
                <div class="but-01">
                    <input type="submit" class="but-02 rad-but" value="提交" />
                    <input type="button" class="but-02" id="chongzhi" value="重置内容" />
                </div>
            </div>
            </form>
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