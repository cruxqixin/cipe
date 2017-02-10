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
	function status(id,type){
	    $.get("<?php echo U('NewsCate/status');?>", { id: id, type: type }, function(data){
			$("#"+type+"_"+id+" img").attr('src', '/Public/statics/images/status_'+data.data+'.gif')
		},"json"); 
	}
$(function(){
	$("[name=delete]").click(function(){
		$("form").attr("action","<?php echo U('Catgory/actdelete');?>");
		$("form").submit();
	})
})
</script>

</head>
<div class="pad-lr-10" >
   <form id="myform" name="myform" action="<?php echo U('Catgory/act');?>" method="get" >
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
            <tr>
            <td>
            <div class="explain-col">
              &nbsp;类型 :
			  <select name="CATE_ID">
			     <option value="">--请选择--</option>
			     <?php if(is_array($catetype)): $i = 0; $__LIST__ = $catetype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>" <?php if($cate_id == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo ($val['kind']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			  </select>
                &nbsp;关键字 :
                <input name="KEYWORD" type="text" class="input-text" size="25" value="<?php echo ($KEYWORD); ?>" />
                <input type="submit" name="search" class="button" value="搜索" />
        	</div>
            </td>
            </tr>
        </tbody>
    </table>
   
    <div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
			    <th width="6%">序号</th>
                <th width="61"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
              	<th width="200">活动名称</th>
               <th width="200">所属主题</th>
                <th width="467">操作</th>
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($manu)): $i = 0; $__LIST__ = $manu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
		    <td align="center"><?php echo ($val["id"]); ?></td>
            <td align="center"><input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]"></td>
            <td align="center"><?php echo ($val["title"]); ?></td>
           <td align="center"><?php echo (themekind($val["type"])); ?></td>
            <td align="center"><a class="blue" href="<?php echo U('Catgory/actEdit',array('id'=>$val['id']));?>">编辑</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>

    <div class="btn">
    <label for="check_box">全选/取消</label>
    <input type="button"  class="button" name="delete" value="删除" style="margin:0px 10px;" onclick="return check();"/>
   
    </div>

    </div>
    </form>
	<div id="pages"><?php echo ($page); ?></div>
</div>

</body>
</html>