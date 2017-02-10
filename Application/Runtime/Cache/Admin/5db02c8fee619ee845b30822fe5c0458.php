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
	$(document).ready(function(){
		$("#submit").click(function(){
			if($("#name").val()==0){
			   alert('请填写资讯分类');
			   return false;
			}
		});
	});
</script>

</head>
<div class="pad_10">
<form action="<?php echo U('Catgory/edit');?>" method="post" name="myform" id="myform" enctype="multipart/form-data" style="margin-top:10px;">
  <div class="pad-10">
  <div class="col-tab">
  <ul class="tabBut cu-li">
    <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">基本信息</li>
   
  </ul>
  <div id="div_setting_1" class="contentList pad-10">
    <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
    <tr>
      <th></th>
      <td><input type="hidden" name="id" class="input-text" value="<?php echo ($art["id"]); ?>"></td>
    </tr>
    <!--<tr>
      <th>上级分类 :</th>
      <td>
      <select name="pid" style="width:150px;">
      <option value="<?php echo ($cate_info["pid"]); ?>" selected="selected"><?php if($cate_info["pid"] == 0): ?>--顶级分类--<?php else: echo ($cate_info["pname"]); endif; ?></option>    
      </td>
      </select>
    </tr>-->
    <tr>
      <th width="100">分类 :</th>
      <td><input type="text" name="kind" id="kind" class="input-text" value="<?php echo ($art["kind"]); ?>"></td>
    </tr>
   
</table>
  </div>

  
  <div class="bk15"></div>
  <div class="btn">
    <input type="submit" value="提交" name="submit" class="button" id="submit">
  </div>

</div>
</div>
</form>
</div>
</body>
</html>