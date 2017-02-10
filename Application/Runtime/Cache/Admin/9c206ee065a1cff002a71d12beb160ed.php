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
		$("#down").click(function(){
			if(confirm('消耗资源较多，请在网络环境良好时进行该操作!')){
				$("#down").hide();
				$("#loading").show();
			}else{
				return false;
			}
		});
	});
</script>
	
</head>
<form id="myform" name="myform" action="<?php echo U('Config/base');?>" enctype="multipart/form-data" method="post">

  <div class="pad-10">
    <div class="col-tab">
      <ul class="tabBut cu-li">
        <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">基本信息</li>
       <!-- <li id="tab_setting_2" onclick="SwapTab('setting','on','',2,2);">功能设置</li>
 -->
      </ul>
      
      <div id="div_setting_1" class="contentList pad-10">
          <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
            <tr>
              <th width="100">网站名称 :</th>
              <td><input type="text" name="con[site_name]" class="input-text" size="80" value="<?php echo C('site_name');?>"></td>
            </tr>
            <tr>
              <th width="100">网站域名 :</th>
              <td><input type="text" name="con[site_domain]" class="input-text" size="80" value="<?php echo C('site_domain');?>"></td>
            </tr>
            <tr>
              <th width="100">网站路径 :</th>
              <td><input type="text" name="con[web_path]" class="input-text" size="80" value=<?php if(C('web_path') != ''): ?>"<?php echo C('web_path');?>"<?php else: ?>"/"<?php endif; ?>></td>
            </tr>
            <tr>
              <th width="100">网站标题 :</th>
              <td><input type="text" name="con[site_title]" class="input-text" size="80" value="<?php echo C('site_title');?>"></td>
            </tr>
            <tr>
              <th width="100">网站关键字 :</th>
              <td><input type="text" name="con[site_keyword]" class="input-text" size="80" value="<?php echo C('site_keyword');?>"></td>
            </tr>
            <tr>
              <th width="100">网站描述 :</th>
              <td><textarea rows="3" cols="80" name="con[site_description]"><?php echo C('site_description');?></textarea></td>
            </tr>
            <tr>
              <th width="100">默认搜索关键字 :</th>
              <td><input type="text" name="con[default_kw]" id="site_icp" class="input-text" value="<?php echo C('default_kw');?>"></td>
            </tr>
            <tr>
              <th width="100">ICP证书号 :</th>
              <td><input type="text" name="con[site_icp]" id="site_icp" class="input-text" value="<?php echo strclean(C('site_icp')); ?>"></td>
            </tr>
            <tr>
              <th width="100">统计代码 :</th>
              <td><textarea rows="3" cols="80" name="con[statistics_code]" id="statistics_code"><?php echo strclean(C('statistics_code')); ?></textarea></td>
            </tr>
            <tr>
              <th width="100">网站声明 :</th>
              <td><textarea rows="3" cols="80" name="con[record]" id="record"><?php echo C('record');?></textarea></td>
            </tr>
            <tr>
              <th width="100">敏感词过滤:<br><b style="color:red;">注：以逗号隔开,如：xx,xx</b></th>
              <td><textarea rows="3" cols="80" name="con[filter]" id="record"><?php echo C('filter');?></textarea></td>
            </tr>
        </table>
      </div>
      
      <div id="div_setting_2" class="contentList pad-10 hidden">
      	<table width="100%" cellpadding="2" cellspacing="1" class="table_form">       
            <tr>
              <th width="100">网站状态 :</th>
              <td>
                <input type="radio" <?php if(C('site_status') == '1'): ?>checked="checked"<?php endif; ?> onclick="" value="1" name="con[site_status]"> 开启 &nbsp;&nbsp;
                <input type="radio" <?php if(C('site_status') == '0'): ?>checked="checked"<?php endif; ?> onclick="" value="0" name="con[site_status]"> 关闭 &nbsp;&nbsp;
              </td>
            </tr>
                   
            <tr>
              <th width="100">评论审核 :</th>
              <td>
                <input type="radio" <?php if(C('comments_status') == '1'): ?>checked="checked"<?php endif; ?> onclick="" value="1" name="con[comments_status]"> 开启 &nbsp;&nbsp;
                <input type="radio" <?php if(C('comments_status') == '0'): ?>checked="checked"<?php endif; ?> onclick="" value="0" name="con[comments_status]"> 关闭 &nbsp;&nbsp;
              </td>
            </tr>

            <tr>
              <th width="100">商品审核 :</th>
              <td>
                <input type="radio" <?php if(C('items_status') == '1'): ?>checked="checked"<?php endif; ?> onclick="" value="1" name="con[items_status]"> 开启 &nbsp;&nbsp;
                <input type="radio" <?php if(C('items_status') == '0'): ?>checked="checked"<?php endif; ?> onclick="" value="0" name="con[items_status]"> 关闭 &nbsp;&nbsp;
              </td>
            </tr>
            
            <tr>
              <th width="100">专辑审核 :</th>
              <td>
                <input type="radio" <?php if(C('album_status') == '1'): ?>checked="checked"<?php endif; ?> onclick="" value="1" name="con[album_status]"> 开启 &nbsp;&nbsp;
                <input type="radio" <?php if(C('album_status') == '0'): ?>checked="checked"<?php endif; ?> onclick="" value="0" name="con[album_status]"> 关闭 &nbsp;&nbsp;
              </td>
            </tr>
            
            <tr>
              <th width="100">图片自动下载 :</th>
              <td>
                <input type="radio" <?php if(C('down_status') == '1'): ?>checked="checked"<?php endif; ?> onclick="" value="1" name="con[down_status]"> 开启 &nbsp;&nbsp;
                <input type="radio" <?php if(C('down_status') == '0'): ?>checked="checked"<?php endif; ?> onclick="" value="0" name="con[down_status]"> 关闭 &nbsp;&nbsp;
              </td>
            </tr>

			<tr>
              <th width="100">文章显示 :</th>
              <td>
                <input type="radio" <?php if(C('article_show') == '1'): ?>checked="checked"<?php endif; ?> onclick="" value="1" name="con[article_show]"> 开启 &nbsp;&nbsp;
                <input type="radio" <?php if(C('article_show') == '0'): ?>checked="checked"<?php endif; ?> onclick="" value="0" name="con[article_show]"> 关闭 &nbsp;&nbsp;
              </td>
            </tr>
            
            <tr>
              <th width="100">远程图片下载 :</th>
              <td>
 			  <a id="down" href="<?php echo U('Down/index',array('start'=>0));?>">下载</a> 
 			  <img id="loading" src="/Public/statics/images/ajax_loading.gif" style="display:none;" />
              <b style="color:red;">每次下载1000个商品图片到本地</b>  
			</td>
            </tr>
            <tr>
              <th width="100">网站地图(xml) :</th>
              <td>
 			  <a id="down" href="<?php echo U('Sitemap/xml');?>">生成sitemap.xml</a> 
			</td>
            </tr>
            <tr>
              <th width="100">网站地图(html) :</th>
              <td>
 			  <a id="down" href="<?php echo U('Sitemap/html');?>">生成sitemap.html</a> 
			</td>
            </tr>
            <tr>
          	<th width="100">
          	替换LOGO :
          	</th>
            <td>
            	<input type="file" name="upload" id="upload" class="input-text" size=21 style="height:25px;"/>
            	<a id="down" href="<?php echo U('Config/logo');?>">恢复默认LOGO</a>
            </td>
          </tr>
         </table>      
      </div>

      <div class="bk15"></div>

      <div class="btn"><input type="submit" value="提交" name="submit" class="button" id="submit"></div>

    </div>

  </div>

</form>
</body>
</html>