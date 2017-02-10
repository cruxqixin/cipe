<?php
//首页
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class ActivityController extends BaseController {
    public function index(){
	    $list=M('Actkind')->where("id in (1,2)")->order("id desc")->select();
		foreach($list as $key=>$val){
			$vo=M("Activity")->where("type=".$val['id'])->select();
			$list[$key]['child']=$vo;
		}
		$this->assign("pages",$list);
		
		 $list1=M('Actkind')->where("id=3")->order("id desc")->find();
		 $vo=M("Activity")->where("type=3")->find();
		 $list1['child']=$vo;
		$this->assign("pages1",$list1);
		$list2=M('Actkind')->where("id in (4,5,6,7)")->order("id desc")->select();
		foreach($list2 as $key=>$val){
			$vo=M("Activity")->where("type=".$val['id'])->select();
			$list2[$key]['child']=$vo;
		}
		$this->assign("pages2",$list2);
		
		$this->display();
    }
	public function apply(){
	    
		$this->display();
	}
}