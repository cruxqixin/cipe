<?php
//首页
namespace online\Controller;
use Think\COntroller;

use Think\Image;
use ORG\Util\Sstring;
class BaseController extends Controller {
	public $p_cate_list;
	public $p_cate_index_list;
	public function _initialize() {
		header("Content-Type:text/html; charset=UTF-8");
		get_active_plugins();
		$file = './Public/Install/install.lock';
		if (!file_exists($file)){
			$url='install';
			header("Location:$url");
			exit();
		}
		if(C('site_status')==0){
			echo '<div style="whdth:100%;height:100%;font-size:60;color:#5FAA92;">网站维护中...</div>';
			exit();
		}
		
		//替换模板title的值
		$seo['title']=C("site_title");
		$seo['keys']=C("site_keyword");
		$seo['desc']=C("site_description");
		$this->assign("seo",$seo);	
		//底部文章信息		
		$currentuser=getetcurrentuser();	
		$this->assign("user",$currentuser);

	}
	public function verify() {
		import ( "ORG.Util.Image" );
		import ( "ORG.Util.String" );
		Image::buildImageVerify ( 4, 3 );
	}
	// 验证码
	public function verify_test() {
		header ( 'Content-type:text/html;charset=utf-8' );
		session_start ();
		
		$verify = md5 ( $_GET ['fieldValue'] );
		if ($_SESSION ['verify'] == $verify) {
			echo '["'.$_GET ['fieldId'].'",true]';
		} else {
			echo '["'.$_GET ['fieldId'].'",false]';
		}
	}
	
	//推广信息
	public function item_spread(){
		$post_fields['union_id'] = C('union_id');
		
		$url=C('official_website')."push/item_spread";
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, http_build_query ( $post_fields ) );
		$result=curl_exec ( $ch );
		curl_close ( $ch );

		return $result;
	}
	
	//用户相关信息包括共享，评论
	public function items_list($items_list){
		$user_mod=M("User");
		$album_items_mod=M("Album_items");
		$album_mod=M("Album");
		$items_comments_mod=M("Items_comments");
		$items_likes_mod=M("Items_likes");
		foreach($items_list as $ky=>$vl){
			$uid=$vl['uid'];
			$id=$vl['id'];
			$user_info=$user_mod->where("id=$uid")->find();
			$items_list[$ky]['username']=$user_info['name'];
			$items_list[$ky]['userimg']=$user_info['img'];

			$album_join_items=" ".C("db_prefix")."album_items as ai on ".C("db_prefix")."album.id=ai.pid";
			$album_join_user=" ".C("db_prefix")."user as u on ".C("db_prefix")."album.uid=u.id";
			$album_where="ai.items_id=".$vl['id']." and ".C("db_prefix")."album.is_del =0 and u.is_del=0 and u.status=1 and ".C("db_prefix")."album.status=1";
			$album_user_info=$album_mod->join($album_join_user)->join($album_join_items)->where($album_where)->field(C("db_prefix")."album.id,".C("db_prefix")."album.title,".C("db_prefix")."album.uid,u.name as uname,u.img,".C("db_prefix")."album.title")->order("ai.add_time desc")->find();
			$items_list[$ky]['ablum_info']=$album_user_info;
			
			$commnets_join_user=" ".C("db_prefix")."user as u on ".C("db_prefix")."items_comments.uid=u.id";
			$comments_where=C("db_prefix")."items_comments.items_id=$id and ".C("db_prefix")."items_comments.is_del=0 and u.is_del=0 and u.status=1";
			$commnets_info=$items_comments_mod->join($commnets_join_user)->where($comments_where)->field(C("db_prefix")."items_comments.info,u.id as uid,u.name,u.img")->order(C("db_prefix")."items_comments.add_time desc")->find();
			$items_list[$ky]['commnets_info']=$commnets_info;
		}
		$uid=$_COOKIE['id'];
		if($uid){
			foreach($items_list as $kil=>$vil){
				$likeItemId[] = $vil['id'];
			}
			$itemIdstr = implode(',',$likeItemId);
			//获取用户喜欢
			$items_likes_mod=M("Items_likes");
			$likesarr = $items_likes_mod->where("items_id in (".$itemIdstr.") and uid = ".$uid)->select();
			if(is_array($likesarr)){
				foreach ($likesarr as $kla => $vla){
					$likes[$vla['items_id']] = 1;
				}
			}
			$this->assign('likes',$likes);
		}
		$this->assign("items_list",$items_list);
	}
	//专辑列表页（包括导航专辑及会员个人专辑）
	public function album_list($album_list){
		$items_mod=M("Items");
		$album_items_mod=M("Album_items");
		$items_tags_mod=M("Items_tags"); 
		$items_tags_item_mod=M('Items_tags_item');
		foreach($album_list as $key=>$val){
			$album_id=$val['id'];
			$album_items_list=$album_items_mod->where("pid=$album_id")->select();
			$items_id_arr=array();
			foreach($album_items_list as $keys=>$vals){
				$items_id_arr[]=$vals["items_id"];
			}
			if($items_id_arr){
				$items_id_str=implode(",",$items_id_arr);
			}else{
				$items_id_str=-1;
			}
			$field="id,img";
			$album_items_cover=$album_items_mod->where("pid=$album_id and is_cover=1")->find();
			if($album_items_cover){
				$album_cover_item=$items_mod->where("id=".$album_items_cover['items_id']." and status=1 and is_del=0")->field($field)->find();
			}else{
				$album_cover_item=$items_mod->where("id in ($items_id_str) and status=1 and is_del=0")->field($field)->order("add_time desc")->find();
			}
			$items_list=$items_mod->where("id in ($items_id_str) and status=1 and is_del=0 and id<>".$album_cover_item['id'])->field($field)->order("add_time desc")->limit(8)->select();
			$album_list[$key]['cover']=$album_cover_item;
			$album_list[$key]['items']=$items_list;
			$items_count=$items_mod->where("id in ($items_id_str) and status=1 and is_del=0")->count();
			$album_list[$key]['items_count']=$items_count;
			
			$items_tags_item_mod=M('Items_tags_item');
			$items_tags_item=$items_tags_item_mod->where("item_id in ($items_id_str)")->select();//根据该商品id获取商品与标签的对应关系信息表数据
			$tag_id_arr=array();
			foreach($items_tags_item as $val){
				$tag_id_arr[]=$val['tag_id'];
			}
			$sql_tid=implode(",",$tag_id_arr);
			$tags=$items_tags_mod->where("id IN ($sql_tid) and is_del=0")->limit(4)->select();
			$album_list[$key]['tags']=$tags;
		}
		$this->assign("album_list",$album_list);
	}
	public function album_items_list(){
		$items_likes_mod=M("Items_likes");
		$user_mod=M("User");
		$items_tags_item_mod=M('Items_tags_item');
		$items_tags_mod=M("Items_tags"); 
		$user_mod=M("User");
		$items_mod=M("Items");
		$album_items_mod=M("Album_items");
		$aid=$_GET['id'];//获取专辑id
		$album_items_list=$album_items_mod->where("pid=$aid")->select();
		$items_id_arr=array();
		foreach($album_items_list as $ky=>$vl){
			$items_id_arr[]=$vl['items_id'];
		}
		if($items_id_arr){
			$items_id_str=implode(",",$items_id_arr);
		}else{
			$items_id_str=-1;
		}
		$field="id,title,add_time,img,comments,likes,uid,price";
		import("ORG.Util.Page"); 
		$count=$items_mod->where("id in ($items_id_str) and status=1 and is_del=0")->count();
		$Page= new Page($count,10);
		$show =$Page->show(); 
		$items_list=$items_mod->where("id in ($items_id_str) and status=1 and is_del=0")->order("add_time desc")->field($field)->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($items_list as $keys=>$vals){
			$item_id=$vals['id'];
			$items_tags_item=$items_tags_item_mod->where("item_id=$item_id")->select();
			$tag_id_arr=Array();
			foreach($items_tags_item as $valT){
				$tag_id_arr[]=$valT['tag_id'];
			}
			if($tag_id_arr){
				$sql_tid=implode(",",$tag_id_arr);
			}else{
				$sql_tid=-1;
			}
			$tags=$items_tags_mod->where("id IN ($sql_tid) and is_del=0")->limit(4)->select();
			$items_list[$keys]['tags']=$tags;
			$items_list[$keys]['aid']=$aid;
			$is_cover=$album_items_mod->where("items_id=$item_id and pid=$aid")->getField("is_cover");
			$items_list[$keys]['is_cover']=$is_cover;
		}
		$this->items_list($items_list);
		$this->assign("count",$count);
		$this->assign('page',$show);
		$this->assign("items_id_str",$items_id_str);
	}
	
	//一周内喜欢数和评论数排行
	public function items_paiHang(){
		Load('extend');//中文字串截取扩展
		$oneWeekAgoTime=time()-3600*24*7;//一周之前的时间戳
		$items_mod=M("Items");
		$items_by_likes=$items_mod->where("add_time>$oneWeekAgoTime and is_del=0 and status=1")->field("id,img,title,likes")->order("likes desc")->limit(12)->select();
		$items_by_comments=$items_mod->where("add_time>$oneWeekAgoTime and is_del=0  and status=1")->field("id,img,title,comments")->order("comments desc")->limit(12)->select();
		$this->assign("items_by_likes",$items_by_likes);
		$this->assign("items_by_comments",$items_by_comments);
	}
	
	//关键词过滤
	public function filter($source){
		$pattern=array();
		$replacement=array();
		$file = C('filter');
		$filter = explode(',', $file);
		foreach ($filter as $val){
			$val=trim($val);
			if ($val){
				$pattern[] = '/'.$val.'/';
				$replacement[] = '***';
			}
		}
		return preg_replace($pattern,$replacement,$source);
	}
	
	//分割标题获得标签方法
	public function get_tags($title){
	
		Vendor('pscws4.pscws4', '' ,'.class.php');
		$pscws = new PSCWS4();
		$pscws->set_dict('./Public/statics/js/scws/dict.utf8.xdb');
		$pscws->set_rule('./Public/statics/js/scws/rules.utf8.ini');
		$pscws->set_ignore(true);
		$pscws->send_text($title);
		$words = $pscws->get_tops(10);
		$tags = array();
		foreach ($words as $val) {
			$tags[] = $val['word'];
		}
		$pscws->close();
		return $tags;
	}
	
	//上传方法
	public function _upload($savePath,$thumb=array()) {
	
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize  = 2097152;// 设置附件上传大小
		$upload->savePath = $savePath;// 设置附件上传目录
		$upload->saveRule = uniqid;
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	
		if ($thumb) {
			$upload->thumb = true;
			$upload->thumbMaxWidth = $thumb['width'];
			$upload->thumbMaxHeight = $thumb['height'];
			$upload->thumbPrefix = '';
			$upload->thumbSuffix = '';
			$upload->thumbRemoveOrigin = true;
		}
	
		if(!$upload->upload()) {
			// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{
			// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		return $info;
	}

	//下载远程图片
	public function down_item($img,$name){
		$dir=date("Ymd");
		mkdir('./Uploads/LocalItems/'.$dir);
		$type = end(explode( '.', $img ));
		import("ORG.Net.Http");
		$http=new Http();
		$http->curlDownload($img.'_100x1000.jpg','Uploads/LocalItems/'.$dir.'/'.$name.'_100x1000.'.$type);
		$http->curlDownload($img.'_210x1000.jpg','Uploads/LocalItems/'.$dir.'/'.$name.'_210x1000.'.$type);
		$http->curlDownload($img.'_350x1000.jpg','Uploads/LocalItems/'.$dir.'/'.$name.'_350x1000.'.$type);
		$http->curlDownload($img.'_500x1000.jpg','Uploads/LocalItems/'.$dir.'/'.$name.'_500x1000.'.$type);
		return C('web_path').'Uploads/LocalItems/'.$dir.'/'.$name;
	}
	
	//商品图片
	public function upload_item($img,$name){
		$dir=date("Ymd");
		mkdir('./Uploads/LocalItems/'.$dir);
		$type = end(explode( '.', $img ));
		import("ORG.Util.Image");
		$image=new Image();
		$image->thumb($img,'Uploads/LocalItems/'.$dir.'/'.$name.'_100x1000.'.$type,'',100,10000);
		$image->thumb($img,'Uploads/LocalItems/'.$dir.'/'.$name.'_210x1000.'.$type,'',210,10000);
		$image->thumb($img,'Uploads/LocalItems/'.$dir.'/'.$name.'_350x1000.'.$type,'',350,10000);
		$image->thumb($img,'Uploads/LocalItems/'.$dir.'/'.$name.'_500x1000.'.$type,'',500,10000);
	}
	
	//连接用户中心
	public function ucenter(){
		import("@.ORG.Ucenter");
		$ucenter=new Ucenter();
		return $ucenter;
	}
	
	//店铺信息
	public function shop_list(){
		$shop_mod=M("Shop");
		$shop_list=$shop_mod->where("is_del=0")->order("ord desc")->field("id,name,img,url")->limit(30)->select();
		$this->assign("shop_list",$shop_list);
	}
	
	public function kjtxLoginCheck(){
	    //判断kjtx是否登录，否则返回登录页面
	    if(!$_SESSION["currentuser"]){
	        //跳转到登录
	        header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/index/login/?returnurl='.$_SERVER['PHP_SELF']);
	        return;
	    }else{
	        return $_SESSION["currentuser"]['uid'];
	    }
	}
	public function onlineLoginCheck($uid){
	    //获取当前登录uid，判断online_user是否已经有数据
	    $userModel = M('2017_user');
	    $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
	    if(!$onlineUser){
	        $this->redirect('Index/apply_b');
	    }
	    return $onlineUser;
	}
	
	public function saveTag($uid,$pid,$tags){
	    $productTagModel = M('2017_product_tag');
	    $productTagModel->where('pid='.$pid)->delete();
	    foreach($tags as $tag){
	        $dataList[] = array('uid'=>$uid, 'pid'=>$pid, 'tag'=>$tag);
	    }
	    return $productTagModel->addAll($dataList);
	}
	public function saveIndustry($uid,$ids){
	    $userIndustryModel = M('2017_user_industry');
	    $userIndustryModel->where('uid='.$uid)->delete();
	    foreach($ids as $id){
	        $dataList[] = array('uid'=>$uid, 'ind_id'=>$id);
	    }
	    return $userIndustryModel->addAll($dataList);
	}
	public function createCalendar($uid){
	    $calendarModel = M('2017_calendar');
	    $dataList[] = array('time_id'=>1 ,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>2 ,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>3 ,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>4 ,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>5 ,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>6 ,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>7 ,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>8 ,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>9 ,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>10,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>11,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>12,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>13,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>14,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>15,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>16,'day_id'=>'1','uid'=>$uid);
	    $dataList[] = array('time_id'=>1 ,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>2 ,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>3 ,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>4 ,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>5 ,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>6 ,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>7 ,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>8 ,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>9 ,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>10,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>11,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>12,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>13,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>14,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>15,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>16,'day_id'=>'2','uid'=>$uid);
	    $dataList[] = array('time_id'=>1 ,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>2 ,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>3 ,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>4 ,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>5 ,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>6 ,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>7 ,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>8 ,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>9 ,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>10,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>11,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>12,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>13,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>14,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>15,'day_id'=>'3','uid'=>$uid);
	    $dataList[] = array('time_id'=>16,'day_id'=>'3','uid'=>$uid);
	    return $calendarModel->addAll($dataList);
	}
	public $dayConfig = array(
	    '1' => '2017-06-06',
	    '2' => '2017-06-07',
	    '3' => '2017-06-08'
	);
	public $timeConfig = array(
	    '1'=>'09:00-09:30',
	    '2'=>'09:30-10:00',
	    '3'=>'10:00-10:30',
	    '4'=>'10:30-11:00',
	    '5'=>'11:00-11:30',
	    '6'=>'11:30-12:00',
	    '7'=>'12:00-12:30',
	    '8'=>'12:30-13:00',
	    '9'=>'13:00-13:30',
	    '10'=>'13:30-14:00',
	    '11'=>'14:00-14:30',
	    '12'=>'14:30-15:00',
	    '13'=>'15:00-15:30',
	    '14'=>'15:30-16:00',
	    '15'=>'16:00-16:30',
	    '16'=>'16:30-17:00'
	);
}