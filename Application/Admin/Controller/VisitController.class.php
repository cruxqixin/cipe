<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class visitController extends BaseController{

	public function index(){
		$article=M('guide');
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
		
		$article=M('guide');
		$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
		//echo 123;
		if($_POST['submit']){
			
			$data=$_POST;
			
			if ($id){
                		
				$resu=$article->where("id=".$id)->save($data);
				
				$this->success('修改成功',U('visit/index'));
				
			}else {
			    $data['addtime']=time();

				$add=$article->add($data);
				
				$this->success('添加成功',U('visit/index'));
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
	
	public function list_c(){
	    $visitCModel=M('visit_c');
	    //分页   1456288481
	    import("ORG.Util.Page");
		if($_COOKIE['status']==1)
		{
	    $where = array('status' => 1);
		}else{
		$where['status'] = 1;
		//$where['add_time'] = array('elt',1456288481);
		}
	    $count=$visitCModel->where($where)->count();
	    //echo $article->getlastsql();
	    $page=new Page($count,10);
	    $show=$page->show();
	    $data=$visitCModel->where($where)->order('add_time desc')->limit($page->firstRow.','.$page->listRows)->select();
	    $this->assign('list',$data);
	    $this->assign('page',$show);
	    $this->assign('count',$count);
	    $this->display();
	}
	
		
	public function list_m(){
	    $visitCModel=M('visit_m');
	    //分页   1456288481
	    import("ORG.Util.Page");
		if($_COOKIE['status']==1)
		{
	    $where = array('status' => 1);
		}else{
		$where['status'] = 1;
		//$where['add_time'] = array('elt',1456288481);
		}
	    $count=$visitCModel->where($where)->count();
	    //echo $article->getlastsql();
	    $page=new Page($count,10);
	    $show=$page->show();
	     
	    $data=$visitCModel->where($where)->order('add_time desc')->limit($page->firstRow.','.$page->listRows)->select();
		//dump($data);
	    $this->assign('list',$data);
	    $this->assign('page',$show);
	    $this->assign('count',$count);
	    $this->display();
	}
	
	public function list_b(){
	    $visitBModel=M('visit_b');
	    //分页
	    import("ORG.Util.Page");
	    if($_COOKIE['status']==1)
		{
	    $where = array('status' => 1);
		}else{
		$where['status'] = 1;
		$where['add_time'] = array('elt',1456288481);
		}
	    $count=$visitBModel->where($where)->count();
	    //echo $article->getlastsql();
	    $page=new Page($count,10);
	    $show=$page->show();
	    $data=$visitBModel->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
	    $this->assign('list',$data);
	    $this->assign('page',$show);
	    $this->assign('count',$count);
	    $this->display();
	}
	public function ceshi(){
		if($_POST){
			$data=$_POST;
		$arr=M("visit_c")->add($data);
		if($arr){
			//echo 123;exit;
		}else{
			echo 456;exit;
		}
		}
		
		$this->display();
	}
	
	public function list_ce(){
	    $visitCModel=M('visit_ce');
	    //分页
	    import("ORG.Util.Page");
	    //$where = array('status' => 1);
		if($_COOKIE['status']==1)
		{
	    $where = array('status' => 1);
		}else{
		$where['status'] = 1;
		$where['add_time'] = array('elt',1456288481);
		}
	    $count=$visitCModel->where($where)->count();
	    //echo $article->getlastsql();
	    $page=new Page($count,10);
	    $show=$page->show();
	    $data=$visitCModel->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
	    $this->assign('list',$data);
	    $this->assign('page',$show);
	    $this->assign('count',$count);
	    $this->display();
	}
	public function list_be(){
	    $visitBModel=M('visit_be');
	    //分页
	    import("ORG.Util.Page");
	   // $where = array('status' => 1);
	   if($_COOKIE['status']==1)
		{
	    $where = array('status' => 1);
		}else{
		$where['status'] = 1;
		$where['add_time'] = array('elt',1456288481);
		}
	    $count=$visitBModel->where($where)->count();
	    //echo $article->getlastsql();
	    $page=new Page($count,10);
	    $show=$page->show();
	    $data=$visitBModel->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
	    $this->assign('list',$data);
	    $this->assign('page',$show);
	    $this->assign('count',$count);
	    $this->display();
	}
	public function info_c(){
	    $id = intval($_GET['id']);
	    if(!$id){
	        $this->error('缺少报名id');
	    }
	    $visitCModel = M('visit_c');
	    $info = $visitCModel->where(array('Id'=>$id ))->find();
	    $this->assign("user",$info);
	    $this->display();
	}
	public function info_m(){
	    $id = intval($_GET['id']);
	    if(!$id){
	        $this->error('缺少报名id');
	    }
	    $visitCModel = M('visit_m');
	    $info = $visitCModel->where(array('Id'=>$id ))->find();
	    $this->assign("user",$info);
	    $this->display();
	}
	public function info_ce(){
	    $id = intval($_GET['id']);
	    if(!$id){
	        $this->error('缺少报名id');
	    }
	    $visitCModel = M('visit_ce');
	    $info = $visitCModel->where(array('Id'=>$id ))->find();
	    $this->assign("user",$info);
	    $this->display();
	}
	public function info_b(){
	    $id = intval($_GET['id']);
	    if(!$id){
	        $this->error('缺少报名id');
	    }
	    $visitBModel = M('visit_b');
	    $info = $visitBModel->where(array('Id'=>$id ))->find();
	    $this->assign("user",$info);
	    $this->display();
	}
	public function info_be(){
	    $id = intval($_GET['id']);
	    if(!$id){
	        $this->error('缺少报名id');
	    }
	    $visitBModel = M('visit_be');
	    $info = $visitBModel->where(array('Id'=>$id ))->find();
	    $this->assign("user",$info);
	    $this->display();
	}
	public function delete_visit(){
	    if(!$_POST['id'] || !$_POST['type']){
	        $this->error("缺少参数");
	    }
	    $del_id=$_POST['id'];
	    $del_type=$_POST['type'];
	    $data['status'] = 0;
	    $model=M('visit_'.$del_type);
	    $update = $model->where("id=".$del_id)->save($data);

	    $this->success("删除成功");
	}
	public function export_c()
	{
	    $visitCModel = M('visit_c');
	    $data = $visitCModel->field("name,gender,position,department,post_code,company,address,province,city,tel,fax,mobile,email,website,visitor_num")->select();
	    foreach ($data as $k=>$one){
	        $xmcx[$k]=$one;
	    }
		ob_clean();
	    exportexcel($xmcx,array('姓名','称谓','职位','部门','邮编','单位名称','地址','省份/地区','城市','电话','传真','手机','邮箱','网站','参观人数'),'观众注册导出');
	}
	public function export_b()
	{
	    $visitBModel = M('visit_b');
	    $data = $visitBModel->field("name,gender,position,department,post_code,company,address,province,city,tel,fax,mobile,email,website,main_product,exhibit_type,area,message")->select();
	    foreach ($data as $k=>$one){
	        if($one['exhibit_type'] == 1){
	            $one['exhibit_type'] = '光地';
	        }elseif($one['exhibit_type'] == 2){
	            $one['exhibit_type'] = '标展';
	        }
	        $xmcx[$k]=$one;
	    }
		ob_clean();
	    exportexcel($xmcx,array('姓名','称谓','职位','部门','邮编','单位名称','地址','省份/地区','城市','电话','传真','手机','邮箱','网站','主要展品','参展方案','租用面积','给主办方留言'),'展商注册导出');
	}
	public function export_ce()
	{
	    $visitCModel = M('visit_ce');
	    $data = $visitCModel->field("name,gender,position,department,post_code,company,address,country,city,tel,fax,mobile,email,website")->select();
	    foreach ($data as $k=>$one){
	        $xmcx[$k]=$one;
	    }
		ob_clean();
	    exportexcel($xmcx,array('姓名','称谓','职位','部门','邮编','单位名称','地址','国家','城市','电话','传真','手机','邮箱','网站'),'英文观众注册导出');
	}
	public function export_be()
	{
	    $visitBModel = M('visit_be');
	    $data = $visitBModel->field("name,gender,position,department,post_code,company,address,country,city,tel,fax,mobile,email,website,main_product,exhibit_type,area,message")->select();
	    foreach ($data as $k=>$one){
	        if($one['exhibit_type'] == 1){
	            $one['exhibit_type'] = '光地';
	        }elseif($one['exhibit_type'] == 2){
	            $one['exhibit_type'] = '标展';
	        }
	        $xmcx[$k]=$one;
	    }
		ob_clean();
	    exportexcel($xmcx,array('姓名','称谓','职位','部门','邮编','单位名称','地址','国家','城市','电话','传真','手机','邮箱','网站','主要展品','参展方案','租用面积','给主办方留言'),'英文展商注册导出');
	}
}
	