<?php
//首页
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class ThemeController extends BaseController {
    public function index(){
        $list=M('ThemeKinds')->order("ord desc,id asc")->select();
		$this->assign("kinds",$list);
		
		 if($_GET['id']==''){
			$where['type']=$list[0]['id'];
		}else{
             
			$where['type']=$_GET['id'];
		}
		
        $theme=M('Theme')->where($where)->find();
		$Ehibition=M('Exhibition')->where($where)->select();
		$this->assign("theme",$theme);
		$this->assign("Exhibition",$Ehibition);
		$this->display();
    }
}