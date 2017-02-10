<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;
class AdminController extends Controller {
    public function index(){
        $this->adminCheck();
        $status = intval(I('param.id')) == 1 ? 1 : 0;
        //待审核列表
        $userModel = M('user');
        if($_GET['keyword'] != '' && $_GET['keyword'] != '请输入查询关键词'){
            $keyword = trim($_GET['keyword']);
            $keyword = strip_tags($keyword);
            $keyword = inject_check($keyword);
            if($keyword != ''){
                $tempSql = "name like '%".$keyword."%'";
                $tempSql .= " or exhibition_number like '%".$keyword."%'";
                $tempSql .= " or company_cname like '%".$keyword."%'";
                $tempSql .= " or company_ename like '%".$keyword."%'";
                $tempSql .= " or company_cinfo like '%".$keyword."%'";
                $tempSql .= " or company_einfo like '%".$keyword."%'";
                $tempSql .= " or cooperation_offer like '%".$keyword."%'";
                $tempSql .= " or implemented_application like '%".$keyword."%'";
                $tempSql .= " or cooperation_need like '%".$keyword."%'";
                $where[] = $tempSql;
            }
        }
        if($_GET['type'] != ''){
            $type = intval($_GET['type']);
            if(in_array($type, array(1,2))){
                $where['type'] = $type;
            }
        }
        
        $where['status'] = $status;
        $order_str = $status == 1 ? 'add_time desc,update_time desc' : 'update_time desc,add_time desc';
        $userList = $userModel->where($where)->order($order_str)->findPage(15);

//         $this->assign('page',$show);
        $this->assign('userList',$userList);
//         $this->assign('count',$count);
        $this->assign('status',$status);
        if($status == 1){
            $nav_status = 'audited';
        }else{
            $nav_status = 'audit';
        }
        $this->assign('nav_status',$nav_status);
        $this->display('Admin_audit_list');
    }
    public function audit_add_c(){
        $this->adminCheck();
        $categoryModel = M('category');
        //行业分类
        $categoryList = $categoryModel->where('status=1')->select();
        foreach($categoryList as $k => $v){
            if($v['level'] == 1){
                $fatherList[] = $v;
            }
            if($v['level'] == 2){
                $childList[$v['father']][] = $v;
            }
            $categoryListKV[$v['id']] = $v;
        }
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
        $this->display('Admin_audit_info_c');
    }
    public function audit_add_b(){
        $this->adminCheck();
        $categoryModel = M('category');
        //行业分类
        $categoryList = $categoryModel->where('status=1')->select();
        foreach($categoryList as $k => $v){
            if($v['level'] == 1){
                $fatherList[] = $v;
            }
            if($v['level'] == 2){
                $childList[$v['father']][] = $v;
            }
            $categoryListKV[$v['id']] = $v;
        }
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
        $this->display('Admin_audit_info_b');
    }
    public function audit_modify_c(){
        $this->adminCheck();
        $userModel = M('user');
        //表单处理
        if($_POST){
            //暂停提交
            //             $this->error("欢迎明年再次使用，期待明年再相聚!");
    
            $inputArray = $this->cInputArray;
            foreach($inputArray as $k => $v){
                if(empty($_POST[$k])){
                    $this->error($v."不能为空");
                }
                if(empty($_POST['uid'])){
                    $this->error("uid不能为空");
                }
            }
            foreach($_POST as $k => $v){
                if(is_string($v)){
                    $data[$k] = strip_tags($v);
                }else{
                    $data[$k] = $v;
                }
            }
            if($_POST['id']==''){
                //后台新增信息  表单新增uid输入项
                $existUser = $userModel->where(array('uid'=>$data['uid'] ))->find();
                if($existUser){
                    $this->error("系统存在该用户信息");
                }
                $data['type'] = 1;//个人类型
                $data['add_time'] = $data['update_time'] = time();
                $add = $userModel->add($data);
                if($add){
                    $this->saveCategory($data['uid'],$data['category']);
                    $this->createCalendar($data['uid']);
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/admin/index');
                }else{
                    $this->error("提交失败");
                }
            }else{
                //后台修改信息
                $data['type'] = 1;//个人类型
                $data['update_time'] = time();
                //$data['status'] = 0;//管理员修改，无需重新审核资料

                $update = $userModel->where("id=".$_POST['id'])->save($data);
                $save = $this->saveCategory($data['uid'],$data['category']);
                if($update || $save){
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/admin/index');
                }else{
                    $this->error("修改失败");
                }
            }
        }
    }
    
    public function audit_modify_b(){
        $this->adminCheck();
        $userModel = M('user');
    
        //表单处理
        if($_POST){
            //暂停提交
            //             $this->error("欢迎明年再次使用，期待明年再相聚!");
            $inputArray = $this->bInputArray;
            foreach($inputArray as $k => $v){
                if(empty($_POST[$k])){
                    $this->error($v."不能为空");
                }
                if(empty($_POST['uid'])){
                    $this->error("uid不能为空");
                }
    
            }
            foreach($_POST as $k => $v){
                if(is_string($v)){
                    $data[$k] = strip_tags($v);
                }else{
                    $data[$k] = $v;
                }
    
            }
    
            if($_POST['id']==''){
                //后台新增信息  表单新增uid输入项
                $existUser = $userModel->where(array('uid'=>$data['uid'] ))->find();
                if($existUser){
                    $this->error("系统存在该用户信息");
                }
                $data['type'] = 2;//公司类型
                $data['add_time'] = $data['update_time'] = time();
                $add = $userModel->add($data);
                if($add){
                    $this->saveCategory($data['uid'],$data['category']);
                    $this->createCalendar($data['uid']);
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/admin/index');
                }else{
                    $this->error("提交失败");
                }
            }else{
                //后台修改信息
                $data['type'] = 2;//公司类型
                $data['update_time'] = time();
               
                //$data['status'] = 0;//管理员修改，无需重新审核资料
                $update = $userModel->where("id=".$_POST['id'])->save($data);
                $save = $this->saveCategory($data['uid'],$data['category']);
                if($update || $save){
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/admin/index');
                }else{
                    $this->error("修改失败");
                }
            }
        }
    }
    
    public function audit_info(){
        $this->adminCheck();
        $uid = I('get.uid',0,'intval');
        if(!$uid){
            $this->error('缺少用户id');
        }
        $userModel = M('user');
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        $categoryModel = M('category');
        $productTagModel = M('user_category');
        //行业分类
        $categoryList = $categoryModel->where('status=1')->select();
        foreach($categoryList as $k => $v){
            if($v['level'] == 1){
                $fatherList[] = $v;
            }
            if($v['level'] == 2){
                $childList[$v['father']][] = $v;
            }
            $categoryListKV[$v['id']] = $v;
        }
        //组织已选择的category数据
        $productTagList = $productTagModel->where(array('uid'=>$uid ))->select();
        foreach($productTagList as $k=>$v){
            $cidList[] = $v['cid'];
            if(!in_array($categoryListKV[$categoryListKV[$v['cid']]['father']],$choosenFatherList)){
                $choosenFatherList[] = $categoryListKV[$categoryListKV[$v['cid']]['father']];
            }
        }
        foreach($productTagList as $k=>$v){
            if(!in_array($categoryListKV[$v['cid']]['father'],$choosenFatherList)){
                $choosenList[$categoryListKV[$v['cid']]['father']][] = $categoryListKV[$v['cid']];
            }
        }
        $this->assign('cidList',$cidList);
        $this->assign('choosenFatherList',$choosenFatherList);
        $this->assign('choosenList',$choosenList);
        $this->assign('onlineUser',$onlineUser);
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
        
        if($onlineUser['type'] == 1){
            $this->display('Admin_audit_info_c');
        }else{
            $this->display('Admin_audit_info_b');
        }
    }
    public function audit_pass(){
        $this->adminCheck();
        if($_POST){
            $uid = I('post.uid',0,'intval');
            $status = I('post.status',0,'intval');
            if(!$uid){
                echo '缺少目标uid';die();
            }
            if($status !== 0 && $status !== 1){
                echo '缺少审核标示';die();
            }
            //检查预约数据
            $userModel = M('user');
            $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
            if(!$onlineUser){
                echo '该用户不存在';die();
            }
            if($onlineUser['status'] == $status){
                echo '已完成该操作';die();
            }

            //保存数据
            $data['status'] = $status;
            $data['update_time'] = time();
            $update = $userModel->where("uid=".$uid)->save($data);
            if($update){
                echo json_encode($data);die();
            }else{
                echo '操作失败';die();
            }
        }else{
            echo '操作失败';die();
        }
    }
    public function reg_list(){
        $this->adminCheck();
        $regUserModel = M('reg_user');
        $count = $regUserModel->where()->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $userList = $regUserModel->where()->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('userList',$userList);
        $this->assign('count',$count);
        $this->assign('nav_status','reg_list');
        $this->display('Admin_reg_list');
    }
    public function schedule_list(){
        $this->adminCheck();
        $scheduleModel = M('schedule');


        $scheduleList = $scheduleModel->where('status>0')->order('id desc')->findPage(15);
//         print_r($scheduleList);die();
        foreach($scheduleList['data'] as $k => $v){
            $cidList[] = $v['calendar_id'];
        }
        $calendarModel = M('calendar');
        if($scheduleList['count']>0){
            $calendarList = $calendarModel->where('id in ('.implode(',',$cidList).')')->select();
            foreach($calendarList as $k => $v){
                $calendarListKV[$v['id']]= $v;
            }
        }

        $this->assign('calendarListKV',$calendarListKV);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);

        $this->assign('scheduleList',$scheduleList);

        $this->assign('nav_status','schedule_list');
        $this->display('Admin_schedule_list');
    }
    private function adminCheck(){
        //判断kjtx是否登录，否则返回登录页面
        if(!$_SESSION["currentuser"]){
            //跳转到登录
            header("Location:http://".$_SERVER['HTTP_HOST'].'/index.php/Keji/User/Login/?returnurl='.$_SERVER['PHP_SELF']);
            return;
        }
        $uid = $_SESSION["currentuser"]['id'];

        if(!in_array($uid ,array(1419066834,1427168251,1427167469,1427676216))){
            $this->error("此账号没有权限");
        }else{
            return true;
        }
    }
    private function saveCategory($uid,$cids){
        $productTagModel = M('user_category');
        $productTagModel->where('uid='.$uid)->delete();
        foreach($cids as $cid){
            $dataList[] = array('uid'=>$uid, 'cid'=>$cid);
        }
        return $productTagModel->addAll($dataList);
    }
    private function createCalendar($uid){
        $calendarModel = M('calendar');
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
    private $dayConfig = array(
        '1' => '2016-05-09',
        '2' => '2016-05-10',
        '3' => '2016-05-11'
    );
    private $timeConfig = array(
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