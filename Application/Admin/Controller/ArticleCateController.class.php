<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Project_kindModel; 
use Think\Page;
class ArticleCateController extends BaseController{
	
	public function index(){
		$article_kind=new Project_kindModel('project_kind');  

		$data=$article_kind->order(' id desc')->where()->select();
		$i=0;
		foreach($data as $val)
		{
			if($val['STATE']==1)
				$data[$i]['STATE']="已审核";
			else
				$data[$i]['STATE']="未审核";
			$i++;	
		}

		$this->assign('article_kind',$data); 
		$this->display();	
	}

	//添加
	public function add(){
		$article_kind=new Project_kindModel('project_kind');  
		if ($_POST['submit']){  
			$da['CNNAME']=trim($_POST['CNname']);
			$da['ENNAME']=trim($_POST['ENname']); 
			$da['CNPROFILE']=trim($_POST['CNProfile']);
			$da['ENPROFILE']=trim($_POST['ENProfile']);
			$da['PARENTID']= $_POST['PanameID'];
			//$da['ADDTIME']=date();   
			$da['SEO_TITLE_CN']=$_POST['SEO_TITLE_CN'];
			$da['SEO_TITLE_EN']=$_POST['SEO_TITLE_EN'];
			$da['SEO_KEYWORD_CN']=$_POST['SEO_KEYS_CN'];
			$da['SEO_KEYWORD_EN']=$_POST['SEO_KEYS_EN'];
			$da['SEO_DESC_CN']=$_POST['SEO_DESC_CN'];
			$da['SEO_DESC_EN']=$_POST['SEO_DESC_EN'];
			$da['STATE']=$_POST['status']; 
			
			//$da['CNNEXTCOUNT']=$_POST['CNNEXTCOUNT'];
			//$da['ENNEXTCOUNT']=$_POST['ENNEXTCOUNT'];
			
			
			if($_POST['sort_order']!="")
		 		$da['SORT']=$_POST['sort_order'];  
			$da["ID"]=time();
			$row=$article_kind->add($da); 
			
			if ($row){ 
//			dump($row);
//				$str['ID']=$row;
//				$da11= $article_kind->where($str).find();
//				dump($row);
//				$da11['SORT']=$row;
//				$article_kind->save($da11); 
				$this->success('添加成功！',U('ArticleCate/index')); 
			}else { 
				$this->error($article_kind->getError());
			} 
		}else {			 
			$cates=$article_kind->order('id desc')->where("PARENTID=0")->select();	
			$this->assign('kind_list',$cates);
			$this->display();
		}	
	}
	
	//修改
	public function edit(){
		
		$id=$_GET['ID']?$_GET['ID']:'';		
		$article_kind=new Project_kindModel('project_kind');
		
		if ($_POST['submit']){
			$da['ID']=$_POST['ID'];
			$da['CNNAME']=trim($_POST['CNname']);
			$da['ENNAME']=trim($_POST['ENname']); 
			$da['CNPROFILE']=trim($_POST['CNProfile']);
			$da['ENPROFILE']=trim($_POST['ENProfile']);
			$da['PARENTID']= $_POST['PanameID']; 
			$da['SEO_TITLE_CN']=$_POST['SEO_TITLE_CN'];
			$da['SEO_TITLE_EN']=$_POST['SEO_TITLE_EN'];
			$da['SEO_KEYWORD_CN']=$_POST['SEO_KEYS_CN'];
			$da['SEO_KEYWORD_EN']=$_POST['SEO_KEYS_EN'];
			$da['SEO_DESC_CN']=$_POST['SEO_DESC_CN'];
			$da['SEO_DESC_EN']=$_POST['SEO_DESC_EN'];
			$da['STATE']=$_POST['status'];
		 	$da['SORT']=$_POST['sort_order'];
			
			//$da['CNNEXTCOUNT']=$_POST['CNNEXTCOUNT'];
			//$da['ENNEXTCOUNT']=$_POST['ENNEXTCOUNT'];
			$save=$article_kind->where("ID=".$_POST['ID'])->save($da);
			if($save){
				$this->success('修改成功！',U('ArticleCate/index'));
			}else { 
			//echo $article_kind->getlastsql();
				$this->error($article_kind->getError());
			}
			
		}else {
			if ($id==''){
				$this->error('请选择分类！');
			}
			
			
			$cates=$article_kind->order('ID desc')->where("PARENTID=0")->select();	
			$this->assign('kind_list',$cates);
			
			
			$cate_info=$article_kind->where('ID='.$id)->find();			
			$this->assign('kind',$cate_info);
			$this->display();	
		}		
	}
	
	//删除
	public function delete(){ 
		if (!isset($_POST['id'])){
			$this->error('请选择要删除的商品！');
		}  
		$del_id = $_POST['id'];  
		$article_kind=new Project_kindModel('project_kind'); 
		foreach ($del_id as $id){ 
			 $article_kind->where('ID='.$id)->delete();  		
		} 
				$this->success('删除成功！');
	}
	
	
	//排序
	public function order(){
		if ($_POST['order']){
			$article_cate = M('ArticleCate');
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
		$article_cate = M('ArticleCate');
		$data['id']=$id;
		$set[$type]=array('exp',"($type+1)%2");
		$article_cate->where($data)->save($set);
		$val=$article_cate->field($type)->where($data)->find();
		$this->ajaxReturn($val[$type]);
	}
	
	
	
	
	
	
	
	
	
	
	
	
}