<?php
namespace Admin\Controller;
use Think\Controller;
Use Think\Page;
class CatgoryController extends BaseController{
	public function index(){
	     $article_cate=M('ThemeKinds');
		
		$count=$article_cate->where($where)->count();
		$page=new Page($count,10);
		$show=$page->show();
		$data=$article_cate->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("article_cate",$data);
		$this->display();
	}
	public function edit(){
		if($_GET['id']){
			$vo=M('ThemeKinds')->where("id=".$_GET['id'])->find();
			$this->assign("art",$vo);
		}
		if($_POST){
			$data=$_POST;
			if($_POST['id']==''){
				M('ThemeKinds')->add($data);
			}else{
				M('ThemeKinds')->where("id=".$_POST['id'])->save($data);
			}
			$this->success("操作成功",U('Catgory/index'));
		}
		$this->display();
	}
	public function Exhibition(){
	    $article_cate=M('Exhibition');
		$list=M('ThemeKinds')->order("id desc")->select();
        //dump($list);
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
		$this->assign("page",$show);
		$this->display("Exhibition");
	}
	public function ExhibitionEdit(){
	    $list=M('ThemeKinds')->order("id desc")->select();
		$this->assign("catetype",$list);
		if($_GET['id']){
			$vo=M('Exhibition')->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
		}
		if($_POST){
			$data=$_POST;
			if($_POST['id']==''){
				M('Exhibition')->add($data);
			}else{
				M('Exhibition')->where("id=".$_POST['id'])->save($data);
			}
			$this->success("操作成功",U('Catgory/Exhibition'));
		}
		
		$this->display("ExhibitionEdit");
	}
	public function Exhdelete(){
		if($_GET['id']){
			foreach($_GET['id'] as $val){
				M('Exhibition')->where("id=".$val)->delete();
			}
			$this->success("操作成功",U('Catgory/Exhibition'));
		}
	}
	public function delete(){
		if($_GET['id']){
			foreach($_GET['id'] as $val){
				M('ThemeKinds')->where("id=".$val)->delete();
			}
			$this->success("操作成功",U('Catgory/index'));
		}
	}
	public function order(){
		if ($_POST['orders']){
			$article = M('ThemeKinds');
			foreach ($_POST['orders'] as $id => $ordid) {
				$data['ord'] = $ordid;
				$article->where('id='.$id)->save($data);
			}
			$this->success('修改成功！');
		}
	}
}