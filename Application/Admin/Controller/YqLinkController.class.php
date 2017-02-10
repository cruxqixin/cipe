<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Page;
class YqLinkController extends BaseController{

	//列表显示
	public function index(){
	      $link=M('link');
	      $row=$link->select();
		  $this->assign("LINK",$row);
		
		 $this->display();
	
	}
	public function edit()
	{  $Project=M('link');
	  $id="";
	  if (isset($_GET['id']) && trim($_GET['id'])) {
		$id=$_GET['id'];	
		$Project=M('link');
		$vo=$Project->where("id=".$id)->find();
		$this->assign("link",$vo);
      }
      else
      {
       $id='';
      }

		//添加或编辑
		if($id=='')
		{  
			//post回传处理
			if ($_POST['submit'])
			{ 
				//添加或编辑
				if($_POST['id']=='') 
				{ 		
				
				// 添加			
					$da=$_POST;  	
					$da['addtime']=time();					
					$row=$Project->add($da);   					
					if ($row){ 
							$this->success('添加成功！',U('yqLink/index'));
					}				
				}
				else
				{	 	
					$da=$_POST;   	
					$save=$Project->where("id=".$_POST['id'])->save($da);				
					$this->success('修改成功！',U('yqLink/index'));
				}
			}
		}
	  $this->display();
	}
	
	public function delete(){
		if (!isset($_POST['id'])){
			$this->error('请选择要删除的用户！');
		}
		$user=M('Link');
		$del_id = $_POST['id'];
		foreach ($del_id as $id){
		
			$user->where("id=".$id)->delete();
		}
		$this->success('删除成功！');
	}
	public function Order(){
		if ($_POST['orders']){
			$article = M('Link');
			foreach ($_POST['orders'] as $id => $ordid) {
				$data['ord'] = $ordid;
				$article->where('id='.$id)->save($data);
			}
			$this->success('修改成功！');
		}
	}
	
}