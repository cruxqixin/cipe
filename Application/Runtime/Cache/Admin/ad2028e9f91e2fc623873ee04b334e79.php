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
function checkco(doa,controid,status){
	var sucin = 0;
	$("input[name='id[]']:checked").each(function(i, n){
		sucin = 1;
	});
	if(sucin == 0){
		alert("请选择要"+doa+"的ID");
		return false;
	}else{
		$("#myform").attr("action",$("#"+controid).val());
		$("#tostatus").val(status);
		return confirm('确认'+doa+'？');
		return true;		
	}
}
</script>

</head>
<div class="pad-10" >
     <input type="hidden" id="delete" value="<?php echo U('Ad/delete');?>" />
	
    <form id="myform" name="myform" action="" method="post"><input type="hidden" name="tostatus"  id="tostatus"/>
    <div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">序号</th>
                <th width="1%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
                 <th width=100>Banner图</th>
				<th width=100>链接地址</th>
               <th width=100>操作</th>
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        	<td align="center"><?php echo ($val["id"]); ?></td>
            <td align="center">
            <input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]"></td>
           
            <td align="center"><img src="<?php echo ($val['adimg']); ?>" style="width:200px;height:100px"></td>
           
			 <td align="center"><?php echo ($val["adurl"]); ?></td>
			
        	<td align="center"><a href="<?php echo U('Ad/edit?id='.$val['id']);?>">修改</a></td><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>

    <div class="btn">
    	<label for="check_box" style="float:left;">全选/取消</label>
    	<input type="submit" class="button" name="delete" value="删除" style="float:left;margin:0px 10px;"  onclick="return checkco('删除','delete',0);"/>
    	
    </div>

    </div>
    </form>
</div>
</body>
</html>