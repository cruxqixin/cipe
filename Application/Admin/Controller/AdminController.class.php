<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AdminModel; 

use Think\Model;
use Think\Page;
class AdminController extends BaseController{

	//管理员列表
	public function index(){

		$admin_mod = M('Admin');
		
		import("ORG.Util.Page");
		
		$count = $admin_mod->count();
		$page = new Page($count,20);
		$admin_list = $admin_mod->limit($page->firstRow.','.$page->listRows)->select();
		
		$page = $page->show();
		$this->assign('page',$page);
		$this->assign('admin_list',$admin_list);
		$this->display();
	}
	
	//添加管理员
	public function add(){
		
		$admin_mod =M('Admin');
		$role_mod = M('Role');
		
		if(isset($_POST['submit'])){
			if(!isset($_POST['USER_NAME'])||($_POST['USER_NAME']=='')){
				$this->error('用户名不能为空');
			}
			if($_POST['PASSWORD'] != $_POST['REPASSWORD']){
				$this->error('两次输入的密码不相同');
			}
			$result = $admin_mod->where("USER_NAME='".$_POST['USER_NAME']."'")->count();
			if($result){
				$this->error('管理员'.$_POST['USER_NAME'].'已经存在');
			}
			unset($_POST['REPASSWORD']);
			$_POST['PASSWORD'] = md5($_POST['PASSWORD']);
			$data=$_POST;
			$data['ADD_TIME'] = time();
			$data['LAST_TIME'] = time();
			$data['IS_DEL']=0;
			$data['ID'] = time();
			$result = $admin_mod->data($data)->add();
			if($result){
				$this->success('添加成功！',U('Admin/index'));
			}else{
				$this->error('添加失败！',U('Admin/add'));
			}
		
		}else{

			$role_list = $role_mod->where('status=1')->select();
			$this->assign('role_list',$role_list);
			$this->display();
		}

	}
	
	//修改管理员信息
	public function edit(){
		
		$admin_mod =M('Admin');
		
		
		if(isset($_POST['submit'])){

			/*$count=$admin_mod->where("id!=".$_POST['id']." and user_name='".$_POST['user_name']."'")->count();
			echo $admin_mod->getlastsql();
			exit();
			if($count>0){
				$this->error('用户名已经存在！');
			}*/
			//print_r($count);exit;
			if ($_POST['password']) {
				if($_POST['password'] != $_POST['repassword']){
					$this->error('两次输入的密码不相同');
				}
				//$_POST['password'] = md5($_POST['password']);
			} else {
				unset($_POST['password']);
			}
			unset($_POST['repassword']);
			//if (false === $admin_mod->create()) {
			//	$this->error($admin_mod->getError());
			//}
		    $data['user_name']=$_POST['user_name'];
			$data['password']=md5($_POST['password']);
			$data['pwdming']=$_POST['password'];
			
			$result = $admin_mod->where("id=".$_POST['id'])->save($data);
			if(false !== $result){
				$this->success('修改成功！',U('Admin/index'));
			}else{
				$this->error('修改失败！',U('Admin/index'));
			}
		}else{
			if( isset($_GET['id']) ){
				$id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('参数错误');
			}

			
			$admin_mod = M('admin');
			$admin_info = $admin_mod->where('id='.$id)->find();
			$this->assign('admin_info', $admin_info);
			$this->assign('show_header', false);
			$this->display();
		}
	}
		
	//删除
	public function delete(){
		if (!isset($_POST['id'])){
			$this->error('请选择要删除的商品！');
		}
		$del_id = $_POST['id'];
		$admin_mod=M('Admin');
		$data['is_del']=1;
		foreach ($del_id as $id){
			$admin_mod->where('id='.$id)->save($data);
		}
		$this->success('删除成功！');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}