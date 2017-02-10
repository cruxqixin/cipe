<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class ThemeController extends BaseController {
    public function index(){	
		$article_cate=M('Theme');
		$list=M('ThemeKinds')->order("id desc")->select();
		$this->assign("catetype",$list);
		
		if($_GET['CATE_ID'] && trim($_GET['CATE_ID'])){
			$where['type']=$_GET['CATE_ID'];
			$this->assign("cate_id",$_GET['CATE_ID']);
		}
		if($_GET['KEYWORD']){
			$where['title']=array("exp","like '%".$_GET['KEYWORD']."%'");
			$this->assign("KEYWORD",$_GET['KEYWORD']);
		}
		$count=$article_cate->where($where)->count();
		$page=new Page($count,10);
		$show=$page->show();
		$data=$article_cate->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		
		$this->assign("manu",$data);
		$this->display();
    }
	public function edit(){
		$list=M('ThemeKinds')->order("id desc")->select();
		$this->assign("catetype",$list);
		if($_GET['id']){
			$vo=M('Theme')->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
		}
		if($_POST){
			$data=$_POST;
			if($_POST['id']==''){
			    $data['addtime']=time();
				M('Theme')->add($data);
			}else{
				M('Theme')->where("id=".$_POST['id'])->save($data);
			}
			$this->success("操作成功",U('Theme/index'));
		}
		$this->display();
	}
	public function delete(){
		
		$del_id = $_GET['id'];
		
		
		foreach ($del_id as $id){
			M('Theme')->where('id='.$id)->delete();
			
		}
		$this->success('删除成功！');
	}
}