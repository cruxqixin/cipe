<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\ReciveModel;
use Admin\Model\Rec_RemarkModel;
use Admin\Model\OrderModel;
use Think\Model;
use Think\Page;
class OrderController extends BaseController{
	public function index(){
		$order=M('usermeet');
		$sqlwhere.="1=1";
		if($_GET){
			$sqlwhere="id=".$_GET['keyword'];
			$this->assign("keyword",$_GET['keyword']);
		}
		import("ORG.Util.Page");
		  $count=$order->where($sqlwhere)->count();
		   //echo $order->getlastsql();
		   
		$page=new Page($count,10);
		$show=$page->show();
		$list=$order->where($sqlwhere)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
		foreach($list as $key=>$val){
		    $pay=userpay($val['mid']);
			$num=$this->findNum($pay)*$val['num'];
			$list[$key]['pay']=$num;
		}
		$this->assign("list",$list);
		$this->assign("page",$show);
		$this->display();
	}
	private function findNum($str){
            $str=trim($str);
            if(empty($str)){return '';}
            $temp=array('1','2','3','4','5','6','7','8','9','0');
            $result='';
            for($i=0;$i<strlen($str);$i++){
                if(in_array($str[$i],$temp)){
                    $result.=$str[$i];
                }
            }
            return $result;
        }
	public function add(){
		$meets=M('Article')->where("type=1")->select();
		$this->assign("meet",$meets);
		$user=M('User')->order('id desc')->select();
		$this->assign("user",$user);
		$rooms=M('MeetRoom')->order("id desc")->select();
		foreach($rooms as $key=>$val){
			$rooms[$key]['num']=$val['num']-$val['orernum'];
		}
		$this->assign("rmtype",$rooms);
		if($_GET['id']){
			$vo=M('usermeet')->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
			$da['meetid']=$vo['mid'];
			$da['userid']=$vo['uid'];
			$da['parentid']=$vo['id'];
			$room=M('OrderRoom')->where($da)->select();
			//echo M('OrderRoom')->getlastsql();
			foreach($room as $key=>$val){
			    $vo=M('MeetRoom')->where("id=".$val['roomid'])->find();
				$room[$key]['num']=$vo['num']-$vo['ordernum'];
			}
			$this->assign("rooms",$room);
			$users=M('MeetUser')->where($da)->select();
			$this->assign("users",$users);
		}
		if($_POST){
			$data=$_POST;
			$data['uid']=$_POST['userid'];
			$data['addtime']=time();
			M('usermeet')->add($data);
			if($_POST['uname']){
				foreach($_POST['uname'] as $key=>$val){
					$data1['userid']=$_POST['userid'];
					$data1['meetid']=$_POST['mid'];
					$data1['names']=$val;
					$data1['phone']=$_POST['phone'][$key];
					$data1['email']=$_POST['email'][$key];
					$data1['danwei']=$_POST['danwei'][$key];
					$row=M('MeetUser')->add($data1);
					
				}
			}
			if($_POST['is_zhusu']==1){
				foreach($_POST['start'] as $key=>$val){
					$data2['userid']=$_POST['userid'];
					$data2['meetid']=$_POST['mid'][$key];
					$data2['roomid']=$_POST['rmid'][$key];
					$data2['starttime']=$_POST['start'][$key];
					$data2['endtime']=$_POST['end'][$key];
					$data2['addtime']=time();
					$row=M('Order')->add($data1);
					if($row){
						$vo=M('MeetRoom')->where("id=".$_POST['mid'][$key])->find();
						$da['ordernum']=$vo['ordernum']+1;
						M('MeetRoom')->where("id=".$_POST['mid'][$key])->save($da);
					}
				}
			}
		}
		$this->assign("room",$rooms);
		$this->display();
	}
	public function delete(){
		if($_POST['id']){
			foreach($_POST['id'] as $val){
				$vo=M('usermeet')->where("id=".$val)->find();
				$list=M('OrderRoom')->where('meetid='.$vo['mid']." and userid=".$vo['uid'])->select();
				if($list){
					foreach($list as $key=>$val1){
						$vo1=M('MeetRoom')->where("id=".$val1['roomid'])->find();
						$da['ordernum']=$vo1['ordernum']-1;
						M('MeetRoom')->where("id=".$val1['roomid'])->save($da);
					}
				}
				
				M('MeetUser')->where('meetid='.$vo['mid']." and userid=".$vo['uid'])->delete();
				M('usermeet')->where("id=".$val)->delete();
			}
		}
		$this->success("操作成功");
	}
	public function cancel(){
		if($_GET['id']){
			$da['is_cancel']=1;
			M('usermeet')->where("id=".$_GET['id'])->save($da);
		}
		$this->success("操作成功");
	}
	public function submit(){
		if($_GET['id']){
			$da['status']=1;
			M('usermeet')->where("id=".$_GET['id'])->save($da);	
		}
		$this->success("参会成功");
	}
}