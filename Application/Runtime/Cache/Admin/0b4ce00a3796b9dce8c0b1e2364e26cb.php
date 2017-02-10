<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C('site_name');?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<link rel="stylesheet" type="text/css" href="/Public/statics/css/style.css"/>
<link rel="stylesheet" type="text/css" href="/Public/statics/js/calendar/calendar-blue.css"/>
<link rel="stylesheet" type="text/css" href="/Public/statics/js/kindeditor4/themes/default/default.css"/>

<link href="/Public/statics/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/statics/css/content.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#pages {font-family:宋体; width:800px; text-align:right; float:right;}
</style>
<script type="text/javascript" src="/Public/statics/js/kindeditor4/kindeditor-min.js"></script>

<script type="text/javascript" src="/Public/statics/js/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/Public/statics/js/jquery/plugins/formvalidator.js"></script>
<script type="text/javascript" src="/Public/statics/js/jquery/plugins/formvalidatorregex.js"></script>
<script type="text/javascript" src="/Public/statics/js/jquery/plugins/jquery.imagePreview.js"></script>
<script type="text/javascript" src="/Public/statics/js/kindeditor4/kindeditor-min.js"></script>
<script type="text/javascript" src="/Public/statics/js/calendar/calendar.js"></script>
<script type="text/javascript" src="/Public/statics/js/common.js"></script>

<link href="/Public/statics/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script src="/Public/statics/js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/Public/statics/js/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">
$(function(){
	$("form").validationEngine();
})
</script>


<script type="text/javascript">
	function status(id,type,value){
	    $.get("<?php echo U('News/status');?>", { id: id, type: type, value: value }, function(data){
			$("#"+type+"_"+id+" img").attr('src', '/Public/statics/images/status_'+data.data+'.gif')
		},"json");  
	}
$(function(){
	$("[name=delete]").click(function(){
			$("[name=searchform]").attr("action","<?php echo U('Travel/delete');?>");
		    $("[name=searchform]").submit();
		})
})
</script>
</head>
<body>
  <div class="pad-10">
  <div class="col-tab">
  <ul class="tabBut cu-li">
    <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">基本信息</li>
    <li id="tab_setting_2" style="display:none" onclick="SwapTab('setting','on','',2,2);">SEO设置</li>
  </ul>
  <div id="div_setting_1" class="contentList pad-10">
    <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	  
	   <tr>
           <td>称谓<span>*</span> </td>
           <td  colspan="2"><?php echo $user['gender']== 'M' ? '先生' : '女士' ;?></td>
       </tr>
       <tr>
           <td width="115px">姓名<span>*</span> </td>
           <td width="295px"><?php echo ($user['name']); ?></td>
       </tr>
       <tr>
           <td>职位<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['position']); ?></td>
       </tr>
        <tr>
           <td>部门<span>*</span> </td>
           <td><?php echo ($user['department']); ?></td>
       </tr>
       <tr>
           <td>邮编<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['post_code']); ?></td>
       </tr>
       <tr>
           <td>单位名称<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['company']); ?></td>
       </tr>
        <tr>
           <td>通讯地址<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['address']); ?></td>
       </tr>
        <tr>
           <td>省份/地区<span>*</span> </td>
           <td  colspan="2">
           	<?php echo ($user['province']); ?>
           </td>
       </tr>
        <tr>
           <td>城市<span>*</span> </td>
           <td  colspan="2">
           	<?php echo ($user['city']); ?>
           </td>
       </tr>
        <tr>
           <td>电话<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['tel']); ?>
             <font>(格式：国家号-区号-电话号-分机)</font>
           </td>
       </tr>
        <tr>
           <td>传真 </td>
           <td  colspan="2"><?php echo ($user['fax']); ?>
           <font>(格式：国家号-区号-电话号-分机)</font>
           </td>
       </tr>
       <tr>
           <td>手机<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['mobile']); ?></td>
       </tr>
       <tr>
           <td>Email<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['email']); ?></td>
       </tr>
      <tr>
           <td>网址<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['website']); ?></td>
       </tr>
       <tr>
           <td>主要展品<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['main_product']); ?></td>
       </tr>
       <tr>
           <td>参展方案<span>*</span> </td>
           <td  colspan="2"><?php echo $user['exhibit_type']== 2 ? '标展' : '光地' ;?></td>
       </tr>
       <tr>
           <td>租用面积<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['area']); ?></td>
       </tr>
       <tr>
           <td>给主办方留言<span>*</span> </td>
           <td  colspan="2"><?php echo ($user['message']); ?></td>
       </tr>
       <tr>
           <td>报名时间<span>*</span> </td>
           <td  colspan="2"><?php echo (date("Y-m-d",$user['add_time'])); ?></td>
       </tr>
    </table>
  </div>

  
  <div class="bk15"></div>
  <div class="btn">
    <a href="<?php echo U('Visit/list_b');?>"><input type="button" value="返回" name="submit" class="button" id="submit"></a>
  </div>

</div>
</div>
</body>
</html>
</body>
</html>