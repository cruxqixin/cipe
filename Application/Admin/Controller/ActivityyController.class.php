<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

class ActivityyController extends BaseController{
	
	//列表显示
	public function index(){
	    $kind = M('Actkind');
		$list=$kind->order("id desc")->select();
		$this->assign("type",$list);
		if($_GET){
			if($_GET['type']){
				$where['type']=$_GET['type'];
				$this->assign("types",$_GET['type']);
			}
		}
		$article = M('Activity');
		//分页
		import("ORG.Util.Page");
		$count=$article->where($where)->count();
		//echo $article->getlastsql();
		$page=new Page($count,10);
		$show=$page->show();
		$data=$article->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		foreach($data as $key=>$val){
			$vo=M('Actkind')->where("id=".$val['type'])->find();
			$data[$key]['type']=$vo['title'];
		}
		$this->assign('articles',$data); 
		
		$this->assign('page',$show);
	$list=$kind->order("id desc")->select();
		$this->assign("type",$list);
		$this->display();
	}
	
	
	//修改
	public function edit(){
		$art=M('Activity');
		$kind = M('Actkind');
		$list=$kind->order("id desc")->select();
		$this->assign("list",$list);
		$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
		if ($_POST['submit']){
			$data=$_POST;
			
			if ($id){
				$art->where('id='.$id)->save($data);
				$this->success('修改成功',U('Activityy/index'));
			}else {
				$art->add($data);
				$this->success('添加成功',U('Activityy/index'));
			}			
		}else {
		    if($id){
				$vo=$art->where("id=".$id)->find();
				$this->assign("art",$vo);
			}
			
			$this->display();
		}
	}
	
	//删除
	public function delete(){
		if (!isset($_GET['id'])){
			$this->error('请选择要删除的商品！');
		}
		$del_id = $_GET['id'];
		$ad=M('Activity');
		foreach ($del_id as $id){
			$ad->where('id='.$id)->delete();
		}
		$this->success('删除成功！');
	}
}