<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class UserController extends BaseController{

	//列表显示
	public function index(){
		 $user_mod=M("User");
		 import("ORG.Util.Page");
		 $where=' 1=1 ';
		 if($_GET['keyword']){
			 $keyword = $_GET['keyword'];
			 $where.=" and nickname like '%$keyword%'";
		 }
	   
		
		
		 $count = $user_mod->where($where)->count();
		
		 $page = new Page($count,20);
		 $show = $page->show();
		 $list=$user_mod->where($where)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
		
			 foreach ($list as $key=>$val){
			 $list[$key]['key']=++$page->firstRow;
		 }
		 
		 $this->assign('list',$list);
		 $this->assign('page',$show);
		 $this->display();
	
	}
	
	//批量添加
	public function add(){
		$user_mod = M('users');
		if (isset($_POST['submit'])) {
			$name=explode(',', $_POST['name']);
			
			$data['add_time']=time();
			$data['last_time']=time();
			if($_POST['passwd']){
				$data['passwd'] = md5($_POST['passwd']);
			}
			$data['is_sys']=$_POST['is_sys'];
			
			foreach ($name as $val){
				$val=trim($val);
				if (!$val){
					continue;
				}
				$where['name']=$val;
				$where['is_del']=0;
				$result = $user_mod->where($where)->find();
				if (!$result){
					if ($_POST['sex'] == '2'){
						$data['sex']=mt_rand(0,1);
					}else {
						$data['sex']=$_POST['sex'];
					}
					$data['name']=$val;
					$user_mod->add($data);
				}
				unset($where);
				unset($result);
			}
			$this->success('任务完成！',U('User/index'));
		} else {
			$this->display();
		}
	}
	
	//修改用户信息
	public function edit(){
		$user_mod = M('user');
		if (isset($_POST['submit'])) {
			$data=$_POST;
			$result = $user_mod->where("id=" .$_POST['id'])->save($data);
			$this->success('修改成功！',U('User/index'));
			
		} else {

			if (!isset($_GET['id'])){
				$this->error('请选择要修改的用户！');
			}
			$id=$_GET['id'];
			$info = $user_mod->where('id='.$id)->find();
			$this->assign('user', $info);
			$this->display();
		}	
	}
	
	//修改uc配置
	public function uc(){
		if ($_POST){
			$file = './api/config.inc.php';
			if (get_magic_quotes_gpc()) {
				$uc_config = stripslashes($_POST['uc_config']);
			}else {
				$uc_config = $_POST['uc_config'];
			}
			$uc_config = "<?php\r\n".$uc_config;
			file_put_contents($file,$uc_config);

			$config = $_POST["con"];
			if ($_POST['uc_config'] == ''){
				$config['uc_status'] = 0;
			}
			$config['uc_status']=intval($config['uc_status']);
			$this->updateconf($config);
		}else {
			$file = './api/config.inc.php';
			$uc_config = str_replace('<?php','',file_get_contents($file));
			$this->assign('uc_config',$uc_config);
			$this->display();	
		}
	}
	
	//删除用户
	public function delete(){
		if (!isset($_POST['id'])){
			$this->error('请选择要删除的用户！');
		}
		$user=M("User");
		$del_id = $_POST['id'];
		foreach ($del_id as $id){
			$user->where("id=$id")->delete();
		}
		$this->success('删除成功！');
	}
	
	//修改状态
	function status() {
	
		$id = $_GET['id'];
		$type = $_GET['type'];

		$user=new UsersModel("Users");
			
		$data['id']=$id;
		
		
		$res=$user->where($data)->find();
			
		$res["REVIEW"]=($res["REVIEW"]+1)%2;
		$res["ID"]=$id;
		$user->save($res);
			
		$this->ajaxReturn($res["REVIEW"]);
		
	}
	private function delete_item($id){
	
		$items = M('Items');
		$items_cate = M('ItemsCate');
		$items_site = M('ItemsSite');
		$items_tags = M('ItemsTags');
		$items_tags_item = M('ItemsTagsItem');
	
		//分类中item_nums减1
		$cid=$items->field('cid')->where("id='".$id."'")->find();
		$items_cate->where("id='".$cid['cid']."'")->setDec('item_nums');
		//标签中item_nums减1
		$data['item_id']=$id;
		$old_tag=$items_tags_item->field('tag_id')->where($data)->select();
		foreach ($old_tag as $tag){
			$items_tags->where("id='".$tag['tag_id']."'")->setDec('item_nums');
		}
		//用户的likes_num减1，删除山品和用户喜欢关系
		$user_mod=M("User");
		$itemslikes_mod=M("ItemsLikes");
		$items_likes_list=$itemslikes_mod->field("uid")->where("items_id=$id and is_del=0")->select();
		$itemslikes_mod->where("items_id=$id")->setField("is_del",1);
		foreach($items_likes_list as $val){
			$uid=$val['uid'];
			$user_mod->where("id=$uid and is_del=0")->setDec("likes_num");
		}
		//删除商品信息及商品和标签关系
		$save['is_del']=1;
		$row = $items->where("id='".$id."'")->save($save);
		$items_tags_item->where($data)->delete();
		//删除用户评论信息
		$itemscommengs=M('ItemsComments');
		$itemscommengs->where("items_id=$id and is_del=0")->setField("is_del",1);
		//删除商品和专辑关系
		$albumitems=M('AlbumItems');
		$albumitems->where("items_id=$id")->delete();
		if (!$row){
			$this->error('删除失败！');
			exit();
		}
	}
	//修改个人信息
	public function userpersonal(){
		$users=M("UsersPersonal");
		
		if($_POST["submit"]){
			$data=$_POST;
			
			//保存
			$users->save($data);	
			//print_R($data);
			//return;
			header('location:'.U('Admin/User/index'));
			$this->display();
			return;
		}		
		
		
		$where["userid"]=$_GET["id"];
		
		
		
		$data=$users->where($where)->find();
		$this->assign('data',$data);
		$this->display();	
	}
	//修改企业信息
	public function company(){
		$users=M("UsersCompany");
		$com=M('CompanyKind');
		 $date=$com->order("ID desc")->where("TYPE=0")->select();
		 $this->assign("xz",$date);
		 $da=$com->order("ID desc")->where("TYPE=1")->select();
		 $this->assign("hy",$da);
		if($_POST["submit"]){
			$data=$_POST;
			
			$data["PINYIN"]=strtoupper(getpinyin($data["CNAME"],true));
			$data["PINYINSHORT"]=strtoupper(getpinyin($data["CNAME"],false));
			
			//保存
			$result=$users->where("USERID=".$_POST['userid'])->save($data);	
			
			header('location:'.U('Admin/User/index'));
			$this->display();
			return;
		}		
		
		
		$where["userid"]=$_GET["id"];
		
		
		
		$data=$users->where($where)->find();
		$this->assign('data',$data);
		$this->display();	
	}
	//修改学校信息
	public function school(){
		$users=M("UsersSchoole");
		
		if($_POST["submit"]){
			$data=$_POST;
			
			$data["PINYIN"]=strtoupper(getpinyin($data["CNAME"],true));
			$data["PINYINSHORT"]=strtoupper(getpinyin($data["CNAME"],false));
			//保存
			$result=$users->save($data);	
			
			//print_R($data);
			//return;
			header('location:'.U('Admin/User/index'));
			$this->display();
			return;
		}		
		
		
		$where["userid"]=$_GET["id"];
		
		
		
		$data=$users->where($where)->find();
		$this->assign('data',$data);
		$this->display();	
	}
	//修改政府机关信息
	public function gov(){
		$users=M("UsersGov");
		
		if($_POST["submit"]){
			$data=$_POST;
			
			$data["PINYIN"]=strtoupper(getpinyin($data["CNAME"],true));
			$data["PINYINSHORT"]=strtoupper(getpinyin($data["CNAME"],false));
			//保存
			$result=$users->save($data);	
			
			//print_R($data);
			//return;
			header('location:'.U('Admin/User/index'));
			$this->display();
			return;
		}		
		
		
		$where["userid"]=$_GET["id"];
		
		
		
		$data=$users->where($where)->find();
		$this->assign('data',$data);
		$this->display();	
	}
	//修改社会团体及服务信息
	public function caste(){
		$users=M("UserCaste");
		
		if($_POST["submit"]){
			$data=$_POST;
			
			//保存
			$result=$users->save($data);	
			
			//print_R($data);
			//return;
			header('location:'.U('Admin/User/index'));
			$this->display();
			return;
		}		
		
		
		$where["userid"]=$_GET["id"];
		
		
		
		$data=$users->where($where)->find();
		$this->assign('data',$data);
		$this->display();	
	}
	public function industry(){
		$list=M("UserIndustry");
		$page=new Page();
		
		$count=$list->count();
		//echo $com->getlastsql();
		$page=new Page($count,10);
		$show=$page->show();
		$data=$list->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		
		//$this->assign("type",$type);
		
		$this->assign("page",$show);
		$this->assign("manu",$data);
		$this->display();
		
	}
	public function industryedit(){
		$list=M("UserIndustry");
		if($_GET['id']){
			$vo=$list->where("id=".$_GET['id'])->find();
			$this->assign('manu',$vo);
		}
		if($_POST){
			$data=$_POST;
			if($_POST['id']==''){
				$data['id']=time();
				$add=$list->add($data);
				$this->success("添加成功！");
			}else{
				$save=$list->where('id='.$_POST['id'])->save($data);
				if($save){
					$this->success("修改成功！");
				}
			}
		}
		$this->display();
	}
}