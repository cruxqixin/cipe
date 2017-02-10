<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends BaseController {
    public function index(){
        //展会新闻
        $news1=M('article')->where("type=1")->order('ord desc,addtime desc')->limit(6)->select();
		foreach($news1 as $key=>$val){
		     $into=strip_tags($val['info']);
			if(mb_strlen($into,'utf8')>70){
				$news1[$key]['info']=mb_substr($into,0,70,"utf-8")."...";
			}
			if(mb_strlen($val['title'],'utf8')>20){
				$news1[$key]['title']=mb_substr($val['title'],0,20,"utf-8")."...";
			}
		}
		
        $this->assign("news1",$news1);	
		
		$news2=M('article')->where("type=2")->order('ord desc,addtime desc')->limit(7)->select();
        $this->assign("news2",$news2);	
		
		$news3=M('article')->where("type=3")->order('ord desc,addtime desc')->limit(1)->find();
        $this->assign("news3",$news3);

		//重要展商
		$buss=M('Media')->order("ord desc,id desc")->limit(24)->select();
		$this->assign("buss",$buss);
		//友链
		$link=M('Link')->order("ord desc,id desc")->select();
		$this->assign("link",$link);
		//Banner图
		$ad=M("Ad")->order("id desc")->select();
		$num=M("Ad")->order("id desc")->count();
		$this->assign('num',$num);
		$this->assign("Ad",$ad);
		//底部banner图
		$bot=M('Bot')->order("id desc")->select();
		$this->assign("bot",$bot);
		$this->display();
    }
	public function media(){
		$list=M('MediaKind')->order("ord desc,id desc")->select();
		foreach($list as $key=>$val){
			$list1=M('Media')->where("type=".$val['id'])->order("ord desc,id desc")->select();
			$list[$key]['child']=$list1;
		}
		$this->assign("list",$list);
		$this->display();
	}
	public function business(){
	    $vo=M('travel')->where("id=1")->find();
		$this->assign("art",$vo);
		$vo=M('travel')->where("id=2")->find();
		$this->assign("art1",$vo);
		$vo=M('travel')->where("id=3")->find();
		$this->assign("art2",$vo);
		$this->display();
	}
	public function about(){
		$vo=M('travel')->where("id=4")->find();
		$this->assign("art",$vo);
		$this->display();
	}
	
}
