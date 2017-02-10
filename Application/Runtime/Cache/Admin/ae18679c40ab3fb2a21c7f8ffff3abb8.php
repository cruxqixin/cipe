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
$(function(){
	$("[name=export]").click(function(){
		$("#searchform").attr("action","<?php echo U('Visit/export_ce');?>");
		$("#searchform").submit();
	})
})
</script>

</head>
<body>
    <form id="searchform" action="" method="get" >
  
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
            <tr>
            <td>
				<input type="submit" name="export" class="button" value="导出"/>
            </td>
            <td>
				报名总数 ：<?php echo ($count); ?>
            </td>
            </tr>
        </tbody>
    </table>
    </form>
<div class="pad-10" >
    <div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">序号</th>
                <th width=100 align="center">姓名</th>
				<th width=100>单位名称</th>
                <th width=100>时间</th>
				 <th width=100 align="center">手机</th>
				 <th width=100 align="center">电话</th>
				 <th width=100 align="center">邮箱</th>
                 <th width=40>操作</th>
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        	<td align="center"><?php echo ($val["id"]); ?></td>
			<td align="center"><?php echo ($val["name"]); ?> <?php echo $val['gender']== 'M' ? '先生' : '女士' ;?></td>
			<td align="center"><?php echo ($val["company"]); ?></td>
            <td align="center"><?php echo (date("Y-m-d",$val["add_time"])); ?></td>
            <td align="center"><?php echo ($val["tel"]); ?></td>
            <td align="center"><?php echo ($val["mobile"]); ?></td>
            <td align="center"><?php echo ($val["email"]); ?></td>
            <td align="center">
            <a href="<?php echo U('Visit/info_ce?id='.$val['id']);?>">查看</a>
            <a onclick="delete_confirm(<?php echo ($val["id"]); ?>);" href="">删除</a>
            </td><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>

    </div>
	<div id="pages"><?php echo ($page); ?></div>
</div>
<script type="text/javascript">
//删除确认
function delete_confirm(agency_id){
	  var r=confirm("确认删除？")
	  if (r==true){
		  delete_confirm_submit(agency_id);
	  }
}
function delete_confirm_submit(agency_id){
	$.post("<?php echo U('Visit/delete_visit');?>", {action: "post" , type : "ce" , id : agency_id},function(msg){
		alert('操作成功');
	   	location.reload();
	});
}
</script>
</body>
</html>