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
			$("[name=searchform]").attr("action","<?php echo U('News/delete');?>");
		    $("[name=searchform]").submit();
		})
})
</script>

</head>
<div class="pad-10" >
    <form name="searchform" action="<?php echo U('News/index');?>" method="get" >
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
            <tr>
            <td>
            <div class="explain-col">
            	发布时间：
            	<input type="text" name="TIME_START" id="TIME_START" class="date" size="12" value="<?php echo ($time_start); ?>">
				<script language="javascript" type="text/javascript">
                    Calendar.setup({
                        inputField     :    "TIME_START",
                        ifFormat       :    "%Y-%m-%d",
                        showsTime      :    'true',
                        timeFormat     :    "24"
                    });
                </script>
                -
                <input type="text" name="TIME_END" id="TIME_END" class="date" size="12" value="<?php echo ($time_end); ?>">
				<script language="javascript" type="text/javascript">
                    Calendar.setup({
                        inputField     :    "TIME_END",
                        ifFormat       :    "%Y-%m-%d",
                        showsTime      :    'true',
                        timeFormat     :    "24"
                    });
              </script>
              &nbsp;类型 :
			  <select name="CATE_ID">
				  <option value="">--请选择--</option>
				  <option value="1" <?php if($cate_id == 1): ?>selected="selected"<?php endif; ?>>展会新闻</option>
				  <option value="2" <?php if($cate_id == 2): ?>selected="selected"<?php endif; ?>>展商速递</option>
				  <option value="3" <?php if($cate_id == 3): ?>selected="selected"<?php endif; ?>>视频报道</option>
			  </select>
                &nbsp;关键字 :
                <input name="KEYWORD" type="text" class="input-text" size="25" value="<?php echo ($keyword); ?>" />
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
                <th width="60">序号</th>
                <th width="33" ><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
                <th width=445 >标题名称</th>
                <th width=259>发布时间</th>
				 <th width=241>所属分类</th>
               
                 <th width=173>操作</th>
               <!-- <th width=30>推荐</th>
                <th width=30>状态</th> -->
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        	<td align="center"><?php echo ($val["id"]); ?></td>
            <td  align="center">
            <input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]"></td>
            <td align="center"><a href="<?php echo U('News/edit',array('id'=>$val['id']));?>"><em style="color:black;"><?php echo ($val["title"]); ?></em></a>&nbsp;&nbsp;</td>
           
            <td align="center"><?php echo (date("Y-m-d H:i:s",$val["addtime"])); ?></td>
			<td align="center"><?php if($val['type'] == 1): ?>展会新闻<?php elseif($val['type'] == 2): ?>媒体新闻<?php else: ?>视频新闻<?php endif; ?></td>
           
           <td align="center" style="padding-left:50px;"><a href="<?php echo U('News/edit',array('id'=>$val['id']));?>">修改</a>&nbsp;&nbsp;</td><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>

    <div class="btn">
    	<label for="check_box" style="float:left;">全选/取消</label>
    	<input type="submit" class="button" name="delete" value="删除" style="float:left;margin:0px 10px;"  onclick="return check();"/>
    	<input type="submit" class="button" name="order" onclick="document.myform.action='<?php echo U('News/order');?>'" value="排序" style="float:left;"/>
    	
		
    </div>

    </div>
    </form>
	<div id="pages"><?php echo ($page); ?></div>
</div>
</body>
</html>