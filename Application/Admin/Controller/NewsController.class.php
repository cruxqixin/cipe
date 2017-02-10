<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class NewsController extends BaseController{

	public function index(){
		$article=M('article');
		
		//搜索
		$where = ' 1=1 ';
		if (isset($_GET['KEYWORD']) && trim($_GET['KEYWORD'])) {
			$where .= " AND title LIKE '%".$_GET['KEYWORD']."%'";
			$this->assign('keyword', $_GET['KEYWORD']);
		}
		if (isset($_GET['TIME_START']) && trim($_GET['TIME_START'])) {
			$time_start = strtotime($_GET['TIME_START']);
			$where .= " AND addtime>='".$time_start."'";
			$this->assign('time_start', $_GET['TIME_START']);
		}
		if (isset($_GET['TIME_END']) && trim($_GET['TIME_END'])) {
			$time_end =strtotime($_GET['TIME_END'])+60*60*24 ;
			$where .= " AND addtime<='".$time_end."'";
			$this->assign('time_end', $_GET['TIME_END']);
		}
		if (isset($_GET['CATE_ID']) && intval($_GET['CATE_ID'])) {
			$where .= " AND type=".$_GET['CATE_ID'];
			$this->assign('cate_id', $_GET['CATE_ID']);
		}
	
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
	//添加
	public function add(){

		$list=M('ThemeKinds')->order("id desc")->select();
		$this->assign("catetype",$list);
		$this->display('edit');
	}
	
	//修改
	public function edit(){
		$currentuser=getetcurrentadminuser();
		$article=M('Article');
		$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
		$list=M('ThemeKinds')->order("id desc")->select();
		$this->assign("catetype",$list);
// 		Dump($list);exit;
		if($_POST['submit']){
			
			$data=$_POST;
// 			Dump($data);exit();
			if ($id){
                		
				$resu=$article->where("id=".$id)->save($data);
				
				$this->success('修改成功',U('News/index'));
				
			}else {
			    $data['addtime']=time();
				
				
				$add=$article->add($data);
				
				$this->success('添加成功',U('News/index'));
			}
			
		}else {
            $vo=$article->where("id=".$id)->find();
			$this->assign("article",$vo);
			$this->display();

		}
	}
	
	//删除
	public function delete(){ 
		if (!isset($_GET['id'])){
			$this->error('请选择要删除的新闻！');
		}
		$del_id = $_GET['id'];
		$article = M('article');
		
		foreach ($del_id as $id){
			$article->where('id='.$id)->delete();
		}
		$this->success('删除成功！');
	}
	public function order(){
		if($_GET['orders']){
			foreach ($_GET['orders'] as $id => $ordid) {
				$data['ord'] = $ordid;
				M("article")->where('id='.$id)->save($data);
			}
			$this->success('修改成功！');
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
}
	