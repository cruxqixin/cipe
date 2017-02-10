<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class LeagueController extends BaseController{

	public function index(){
		$article=M('League');
		
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
		
		$this->display('edit');
	}
	
	//修改
	public function edit(){
		
		$article=M('League');
		$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
		
		if($_POST['submit']){
			
			$data=$_POST;
			
			if ($id){
                		
				$resu=$article->where("id=".$id)->save($data);
				
				$this->success('修改成功',U('League/index'));
				
			}else {
			    $data['addtime']=time();
				
				
				$add=$article->add($data);
				
				$this->success('添加成功',U('League/index'));
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
		$article = M('League');
		
		foreach ($del_id as $id){
			$article->where('id='.$id)->delete();
		}
		$this->success('删除成功！');
	}
	
	
	
	
	
	
	
	
	
	
	
	
}
	