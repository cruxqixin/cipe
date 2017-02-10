<?php
namespace Home\Controller;
use Think\Controller;
use Think\FallPage;
class NewsController extends BaseController {
    public function index(){
	    if($_GET['type']){
			$where['type']=$_GET['type'];
		}
        $count=M('article')->where($where)->count();
		//echo $article->getlastsql();
		
		$news1=M('article')->where($where)->order("ord desc,addtime desc")->findPage(8);
		foreach($news1['data'] as $key=>$val){
			if(mb_strlen($val['title'])>15){
				$news1['data'][$key]['title1']=mb_substr($val['title'],0,15,"utf-8")."...";
			}
			$into=strip_tags($val['info']);
			if(mb_strlen($into)>100){
			    
				$news1['data'][$key]['info']=mb_substr($into,0,100,"utf-8")."...";
			}
		}
        $this->assign("news1",$news1);
	  
		$this->display();
    }
	public function details(){
		$vo=M('article')->where("id=".$_GET['id'])->find();
		$this->assign("art",$vo);
		$this->display();
	}
	
	
}
