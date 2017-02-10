<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class NewsCateController extends BaseController{
	
	public function index(){
		$article_cate=M('article_cate');
		$data=$article_cate->where("parentid=0")->select();
		
		foreach($data as $key=>$value){
			$data[$key]["childs"]=$article_cate->where("parentid=".$value["id"])->select();
		}
		
		$this->assign('article_cate',$data);
		//分页
		import("ORG.Util.Page");
		$count=$article_cate->where($where)->count();
		$page=new Page($count,10);
		$show=$page->show();
		$data=$article_cate->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$i=0;
		foreach ($data as $val){
			$map['id']=$val['ID'];
			$map['is_del']=0;
			$articles[$i]=$val;
			$cate=$article_cate->field('name')->where($map)->find();
			$articles[$i]['NAME']=$cate['NAME'];
			$articles[$i]['KEY']=$page->firstRow+$i+1;
			$i++;
		}
		$this->display();	
	}
	
	//添加
	public function add(){
		$article_cate=M('ArticleCate'); 
		if ($_POST['submit']){
			$data=$_POST; 
			
			$row=$article_cate->add($data);
			
			if ($row){
				$this->success('添加成功！',U('NewsCate/index'));
			}else {
				$this->error($article_cate->getError());
			}
			
		}else {
			$article_cate=M('article_cate');
			
			$cates=$article_cate->order('id desc')->where("parentid=0")->select();	
			$this->assign('cate_list',$cates);
			$this->display();
		}	
	}
	
	//修改
	public function edit(){
		
		$id=$_GET['id']?$_GET['id']:'';		
		$article_cate=M('article_cate');
		
		if ($_POST['submit']){
			$data=$_POST;
			$save=$article_cate->where("id=".$_POST['id'])->save($data);
			$this->success('修改成功！',U('NewsCate/index'));
			
		}else {
			if ($id==''){
				$this->error('请选择分类！');
			}
			$cate_info=$article_cate->where('id='.$id)->find();			
			$this->assign('cate_info',$cate_info);
			
			
			$cates=$article_cate->order('id desc')->where("parentid=0")->select();	
			$this->assign('cate_list',$cates);
			$this->display();	
		}		
	}
	
	//删除
	public function delete(){
		if (!isset($_POST['id'])){
			$this->error('请选择要删除的分类！');
		}
		$del_id = $_POST['id'];
		$article_cate =M('article_cate');
		$article_mod=M('article');
		foreach ($del_id as $id){
			
			$article_cate->where("id=".$id)->delete();
			$data2["type"]=$id;
			$article_mod->where($data2)->delete();
			
		}
		$this->success('删除成功！');
	}
	
	
	//排序
	public function order(){
		if ($_POST['order']){
			$article_cate = new ArticleCateModel('article_cate');
			foreach ($_POST['orders'] as $id => $ordid) {
				$data['ord'] = $ordid;
				$article_cate->where('id='.$id." and is_del=0")->save($data);
			}
			$this->success('修改成功！');
		}
	}
	
	//修改状态
	public function status() {
		$id = $_GET['id'];
		$type = $_GET['type'];
		$article_cate = new ArticleCateModel('article_cate');
		$data['ID']=$id;
		$set[$type]=array('exp',"($type+1)%2");
		$article_cate->where($data)->save($set);
		$val=$article_cate->field($type)->where($data)->find();
		$this->ajaxReturn($val[$type]);
	}
	
	
	
	
	
	
	
	
	
	
	
	
}