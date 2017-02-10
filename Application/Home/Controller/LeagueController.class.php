<?php
//首页
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class LeagueController extends BaseController {
    public function index(){
	    $art=M("League");
		$list=$art->order("id desc")->findPage(5);
		$this->assign("pages",$list);
		
		$this->display();
    }
	public function details(){
	    if($_GET['id']){
			$vo=M('League')->where("id=".$_GET['id'])->find();
			$this->assign("art",$vo);
		}
		$this->display();
	}
}