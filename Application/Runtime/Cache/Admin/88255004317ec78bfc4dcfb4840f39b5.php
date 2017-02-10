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


<script type="text/javascript" src="/Public/statics/js/common.js"></script>
<script type="text/javascript">
$(function(){
	var items='{"items":["uploadJson","wordpaste","selectall","justifyleft","justifycenter","image","justifyright","justifyfull","insertorderedlist","insertunorderedlist","formatblock","fontname","fontsize","forecolor","hilitecolor","bold","italic","fullscreen"]}';
	items=eval("("+items+")");
	KindEditor.create('[name=info]');
	
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
	});
	uploadbutton.fileBox.change(function(e) {
		uploadbutton.submit();
	});
	
})

</script>
</head>
<form action="<?php echo U('League/edit');?>" method="post" name="myform" id="myform" enctype="multipart/form-data" style="margin-top:10px;">
  <div class="pad-10">
  <div class="col-tab">
  <ul class="tabBut cu-li">
    <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">基本信息</li>
    <li id="tab_setting_2" style="display:none" onclick="SwapTab('setting','on','',2,2);">SEO设置</li>
  </ul>
  <div id="div_setting_1" class="contentList pad-10">
    <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	  
      <tr>
        <th width="100">标题名称 :</th>
        <td><input type="text" name="title" id="title" class="input-text validate[required]" size="60" value="<?php echo ($article["title"]); ?>"></td>
      </tr>
	  
      <tr>
        <th>详细内容 :</th>
        <td><textarea name="info" id="text" style="width:70%;height:350px; "><?php echo ($article["info"]); ?></textarea></td>
      </tr>
	 
      <tr><td>
		<input type="hidden" name="id" value="<?php echo ($article["id"]); ?>" id="article_id"/>
		
	  </td></tr>
    </table>
  </div>
  <div class="bk15"></div>
  <div class="btn">
    <input type="submit" value="提交" name="submit" class="button" id="submit">
  </div>

</div>
</div>
</form>
</body>
</html>