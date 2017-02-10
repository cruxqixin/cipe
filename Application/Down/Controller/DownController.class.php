<?php
namespace Down\Controller;
use Think\Controller;
use Think\Page;
class DownController extends Controller{
	 public function down(){
		$filepath=dirname(dirname(dirname(dirname( __FILE__ ))));//文件目录
		$file=$_GET['file'];
		
		
	    $filepath=iconv("utf-8","gbk",$filepath);  
        $file=iconv("utf-8","gbk",$file);
		
	    download($filepath,$file);
	  }
}