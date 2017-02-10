<?php
//首页
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class Theme2Controller extends BaseController {
    public function index(){
        $list=M('ThemeKinds')->order("ord desc,id asc")->select();
		$this->assign("kinds",$list);
		
		 if($_GET['id']==''){
			$where['type']=$list[0]['id'];
			$id=$list[0]['id'];
		}else{
             
			$where['type']=$_GET['id'];
			$id=$_GET['id'];
		}
		
        $theme=M('Theme')->where($where)->find();
		$Ehibition=M('Exhibition')->where($where)->select();
		$light=M('light')->where($where)->select();
		$this->assign("light",$light);
		$infos=M('infos')->where($where)->select();
		$this->assign("infos",$infos);
		$act=M('act')->where($where)->select();
		foreach ($act as $k=>$v)
		{
			$act[$k]['bbs']=M('bbs')->where("type=".$v['id'])->select();
		}
		$this->assign("act",$act);
		$news2=M('article')->where("type=2 and theme='$id'")->order('ord desc,addtime desc')->limit(7)->select();
        $this->assign("news2",$news2);	
		$this->assign("theme",$theme);
		$this->assign("Exhibition",$Ehibition);
		$this->display();
    }
}