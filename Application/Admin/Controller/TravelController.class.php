<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class TravelController extends BaseController{

	public function index(){
		$article=M('Travel');
		//分页
		import("ORG.Util.Page");
		$count=$article->where($where)->count();
		//echo $article->getlastsql();
		$page=new Page($count,10);
		$show=$page->show();
		$data=$article->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('articles',$data); 
		
		$this->assign('page',$show);
		
		$this->display();
	}
	
	
	//修改
	public function edit(){
		
		$article=M('Travel');
		$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
		
		if($_POST['submit']){
			
			$data=$_POST;
			
			if ($id){
                		
				$resu=$article->where("id=".$id)->save($data);
				
				$this->success('修改成功',U('Travel/index'));
				
			}else {
			    $data['addtime']=time();

				$add=$article->add($data);
				
				$this->success('添加成功',U('Travel/index'));
			}
			
		}else {
		   if($id){
				$vo=$article->where("id=".$id)->find();
			    $this->assign("article",$vo);
		   }
            
			$this->display();
		}
	}
	
	//删除
	public function delete(){ 
		if (!isset($_GET['id'])){
			$this->error('请选择要删除的新闻！');
		}
		$del_id = $_GET['id'];
		$article = M('Media');
		
		foreach ($del_id as $id){
			$article->where('id='.$id)->delete();
		}
		$this->success('删除成功！');
	}
	public function cate(){
		 $article_cate=M('MediaKind');
		
		$count=$article_cate->where($where)->count();
		$page=new Page($count,10);
		$show=$page->show();
		$data=$article_cate->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("article_cate",$data);
		$this->display();
	}
	public function cateEdit(){
		if($_GET['id']){
			$vo=M('MediaKind')->where("id=".$_GET['id'])->find();
			$this->assign("art",$vo);
		}
		if($_POST){
			$data=$_POST;
			if($_POST['id']==''){
				M('MediaKind')->add($data);
			}else{
				M('MediaKind')->where("id=".$_POST['id'])->save($data);
			}
			$this->success("操作成功",U('Media/cate'));
		}
		$this->display();
	}
	public function cateDelete(){ 
		if (!isset($_GET['id'])){
			$this->error('请选择要删除的新闻！');
		}
		$del_id = $_GET['id'];
		$article = M('MediaKind');
		
		foreach ($del_id as $id){
			$article->where('id='.$id)->delete();
		}
		$this->success('删除成功！');
	}
}
	