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
$(function(){

})
function show(i){
	if(i==3){
		$("[id=url]").hide();
	}else{
		$("[id=url]").show();
	}
}
</script>
	
</head>
<form id="myform" name="myform" action="<?php echo U('Activityy/edit');?>" enctype="multipart/form-data" method="post">

  <div class="pad-10">
    <div class="col-tab">
      <ul class="tabBut cu-li">
        <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',1,1);">信息</li>
      </ul>
      
      <div id="div_setting_1" class="contentList pad-10">
          <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
            <tr>
			<th width="100">所属分类 :</th>
			<td><select name="type" onchange="show(this.value)">
			  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>" <?php if($art['type'] == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo ($val['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select></td>
		  </tr>
            <tr>
              <th width="15%">标题:</th>
              <td><textarea type="text" name="title" style="width:70%;height:145px;" value=""><?php echo ($art["title"]); ?></textarea></td>
            </tr>
            <tr id="url">
              <th width="15%">链接地址:</th>
              <td><input type="text" name="url" class="input-text" size="100" value="<?php echo ($art["url"]); ?>"></td>
            </tr>
         </table>      
      </div>

      <div class="bk15"></div>

      <div class="btn"><input type="submit" value="提交" name="submit" class="button" id="submit">
	  <input type="hidden" name="id" value="<?php echo ($art["id"]); ?>" id="id" />
	  </div>

    </div>

  </div>

</form>
</body>
</html>