<?php
//首页
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class DownloadController extends BaseController {
    public function index(){
	    $list=M('Down')->order("id desc")->findPage(5);
		$this->assign("pages",$list);
		$path="http://".$_SERVER['HTTP_HOST'].'/index.php';
		$this->assign("path",$path);
		$this->display();
    }
	public function apply(){
	    
		$this->display();
	}
}