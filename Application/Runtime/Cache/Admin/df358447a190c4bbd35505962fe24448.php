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
//操作
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
		return confirm('确认'+doa+'？');
		return true;		
	}
}


</script>
</head>
<div class="pad-10" >
   <input type="hidden" value="<?php echo U('Media/delete');?>" id="delete">
    <form name="myform" id="myform" action="<?php echo U('Media/index');?>" method="get" >
  
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
            <tr>
            <td>
            <div class="explain-col">
            	添加时间：
            	<input type="text" name="time_start" id="time_start" class="date" size="12" value="<?php echo ($time_start); ?>">
				<script language="javascript" type="text/javascript">
                    Calendar.setup({
                        inputField     :    "time_start",
                        ifFormat       :    "%Y-%m-%d",
                        showsTime      :    'true',
                        timeFormat     :    "24"
                    });
                </script>
                -
                <input type="text" name="time_end" id="time_end" class="date" size="12" value="<?php echo ($time_end); ?>">
				<script language="javascript" type="text/javascript">
                    Calendar.setup({
                        inputField     :    "time_end",
                        ifFormat       :    "%Y-%m-%d",
                        showsTime      :    'true',
                        timeFormat     :    "24"
                    });
                </script>
            	
             
                分类 :
				<select name="type">
				<option value="">--全部--</option>
				<?php if(is_array($catetype)): $i = 0; $__LIST__ = $catetype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>" <?php if($type == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo ($val['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                 </select>
                
                
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
                <th width="5%">序号</th>
                <th width="1%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
                <th width=100 >
                所属分类</th>
				
				<th width=100>图片</th>
               
                <th width=100>广告地址</th>
				<th width="100">排序值</th>
                 <th width=100>操作</th>
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
		
        	<td align="center"><?php echo ($val['id']); ?></td>
            <td align="center">
            <input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]"></td>
            <td align="center"><b>
            <?php echo ($val["type"]); ?>
            </b></td>
			
            <td align="center"><b><img src="<?php echo ($val["pic"]); ?>" width="90px" height="90px" /></b></td>
            <td align="center"><b><?php echo ($val["url"]); ?></b></td>
			 <td align="center"><input  type="text" class="input-text-c input-text" value="<?php echo ($val["ord"]); ?>" size="4" name="orders[<?php echo ($val["id"]); ?>]"></td>
            <td align="center"><a class="blue" href="<?php echo u('Media/edit?id='.$val['id']);?>">查看</a></td><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>

    <div class="btn">
    	<label for="check_box" style="float:left;">全选/取消</label>
		<td align="center"></td>
    	<input type="submit" class="button" name="delete" value="删除" style="float:left;margin:0px 10px;"  onclick="return checkco('删除','delete',0);"/>
		<input type="submit" class="button" name="order" onclick="document.myform.action='<?php echo U('Media/Order');?>'" value="排序" style="float:left;"/>
        <div id="pages"><?php echo ($page); ?></div>
    </div>

    </div>
    </form>
</div>
</body>
</html>