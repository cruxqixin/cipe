<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\UsersModel;
use Admin\Controller\AdModel;
class AdController extends BaseController{
	
	//列表显示
	public function index(){
		$ad = M('Ad');
		$list=$ad->order("id desc")->select();
		$this->assign("list",$list);
		$this->display();
	}
	
	
	//修改
	public function edit(){
		$ad=M('Ad');
		$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
		if ($_POST['submit']){
			$data=$_POST;
			if ($id){
				$ad->where('id='.$id)->save($data);
				$this->success('修改成功',U('Ad/index'));
			}else {
				$ad->add($data);
				$this->success('添加成功',U('Ad/index'));
			}			
		}else {
		    if($id){
				$vo=$ad->where("id=".$id)->find();
				$this->assign("art",$vo);
			}
			
			$this->display();
		}
	}
	
	//删除
	public function delete(){
		if (!isset($_POST['id'])){
			$this->error('请选择要删除的商品！');
		}
		$del_id = $_POST['id'];
		$ad=M('Ad');
		foreach ($del_id as $id){
			$ad->where('id='.$id)->delete();
		}
		$this->success('删除成功！');
	}
	public function bottom()
	{
		$ad = M('Bot');
		$list=$ad->order("id desc")->select();
		$this->assign("list",$list);
		$this->display();
	}
	public function editbot()
	{
		$ad=M('Bot');
		$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
		if ($_POST['submit']){
			$data=$_POST;
			if ($id){
				$ad->where('id='.$id)->save($data);
				$this->success('修改成功',U('Ad/bottom'));
			}else {
				$ad->add($data);
				$this->success('添加成功',U('Ad/bottom'));
			}			
		}else {
		    if($id){
				$vo=$ad->where("id=".$id)->find();
				$this->assign("art",$vo);
			}
			
			$this->display();
		}
	}
	//删除
	public function deletebot(){
		if (!isset($_POST['id'])){
			$this->error('请选择要删除的商品！');
		}
		$del_id = $_POST['id'];
		$ad=M('Bot');
		foreach ($del_id as $id){
			$ad->where('id='.$id)->delete();
		}
		$this->success('删除成功！');
	}
}