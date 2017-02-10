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


</head>
<div class="pad-lr-10">
    <form id="myform" name="myform" action="<?php echo u('Admin/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">序号</th>
                <th width="1%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
                <!--<th width=100>编号</th> -->
                <th width=100>帐号昵称</th>
      			
                <th width=100>上次登陆</th>
                <th width=100>操作</th>
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($admin_list)): $i = 0; $__LIST__ = $admin_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        	<td align="center"><?php echo ($val["id"]); ?></td>
            <td align="center"><input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]" <?php if($val['id'] == '1'): ?>disabled="disabled"<?php endif; ?>></td>
            <!--<td align="center"><a href="<?php echo U('Admin/edit',array('id'=>$val['ID']));?>"><em style="color:green;"><?php echo ($val["ID"]); ?></em></a></td>
            --> <td align="center"><a href="<?php echo U('Admin/edit',array('id'=>$val['id']));?>"><em style="color:black;"><?php echo ($val["user_name"]); ?></em></a></td>
     		
            <td align="center"><?php echo (date('Y-m-d H:i:s',$val["last_time"])); ?></td>
            <td align="center"><a class="blue" href="<?php echo U('Admin/edit',array('id'=>$val['id']));?>">编辑</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>

    <div class="btn">
		<label for="check_box" style="float:left;">全选/取消</label>
		<input  type="submit" class="button" name="dosubmit" value="删除" style="float:left;margin:0 10px 0 10px;display:none"/>
		
    </div>
    </div>
    </form>
	<div id="pages"><?php echo ($page); ?></div>
</div>
</body>
</html>