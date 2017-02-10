<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;

define("WEIXIN_TOKEN", "kjtxw8358weixin");
define("APPID", "wxbbb31e87cd757990");
define("APPSECRET", "bfbfe96dfe8324f50343b7a57a45d357");

class WeixinController extends Controller {
    /**
     * 首页，完成微信端改造
     */
    public function index()
    {
        $userModel = M('2017_user');
        $categoryModel = M('category');
        $productTagModel = M('2017_product_tag');
        //行业分类
        $categoryList = $categoryModel->where('status=1')->select();
        foreach($categoryList as $k => $v){
            if($v['level'] == 1){
                $fatherList[] = $v;
            }
            if($v['level'] == 2){
                $childList[$v['father']][] = $v;
            }
        }
        if($_GET['fid']>0 || $_GET['cid']>0){
            if($_GET['cid']>0){
                $cid = intval($_GET['cid']);
                $productTagList = $productTagModel->where('cid='.$cid)->select();
            }else{
                $fid = intval($_GET['fid']);
                $cidArray = $categoryModel->where('father='.$fid)->select();
                if(!empty($cidArray)){
                    foreach($cidArray as $k => $v){
                        $cidList[] = $v['id'];
                    }
                    $productTagList = $productTagModel->where('cid in ('.implode(',',$cidList).') ')->select();
                }
            }
            if(!empty($productTagList)){
                foreach($productTagList as $k => $v){
                    $uidList[] = $v['uid'];
                }
            }
            if(!empty($uidList)){
    //         $this->assign('chosenCid',$_GET['cid']);
    //         $this->assign('chosenfid',$_GET['fid']);
                $where[] = 'uid in ('.implode(',',$uidList).') ';
            }else{
                $where[] = 'uid = 0';
            }
        }
        
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
        //是否是已登录企业用户，可以查看看全部列表，专家身份只能看企业列表type=2 功能暂停
//         if($_SESSION["currentuser"]){
//             $uid = $_SESSION["currentuser"]['id'];
//             $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
//             if($onlineUser['type'] == 1){
//                 $where['type'] = 2;
//             }
//         }else{
//             $where['type'] = 2;
//         }
        $where['status'] = 1;
        $count = $userModel->where($where)->count();
        $page = new FallPage($count,10);
        $show = $page->show_1();
        $userList = $userModel->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();

        //隐藏列表
        $count = 0;
        $page = new FallPage($count,10);
        $show = $page->show();
        $userList = array();
        
        $this->assign('page',$show);
        $this->assign('userList',$userList);
        $this->assign('count',$count);
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
        $this->assign('keyword',$keyword);
        $this->display();
    }
    /**
     * 填写申请(个人)
     */
    public function apply_c(){
        $uid = $this->kjtxLoginCheck();
        if(!$uid){
            $this->error("请先登录科济天下网");
        }
        $userModel = M('2017_user');
        $categoryModel = M('category');
        $productTagModel = M('2017_product_tag');
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
        //表单处理
        if($_POST){
            //暂停提交
                        $this->error("欢迎明年再次使用，期待明年再相聚!");
            $inputArray = $this->cInputArray;
            foreach($inputArray as $k => $v){
                if(empty($_POST[$k])){
                    $this->error($v."不能为空");
                }
            }
            foreach($_POST as $k => $v){
                if(is_string($v)){
                    $data[$k] = strip_tags($v);
                }else{
                    $data[$k] = $v;
                }
    
            }
            $data['category'] = explode(',',$data['category']);
            if($_POST['id']==''){
                $existUser = $userModel->where(array('uid'=>$uid ))->find();
                if($existUser){
                    $this->error("您已经提交过信息了，请进入‘我的对接’查看");
                }
                $data['type'] = 1;//个人类型
                $data['uid'] = $uid;
                $data['add_time'] = $data['update_time'] = time();
                $add = $userModel->add($data);
                if($add){
                    $this->saveCategory($uid,$data['category']);
                    $this->createCalendar($uid);
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/weixin/calendar');
                }else{
                    $this->error("提交失败");
                }
            }else{
                $data['type'] = 1;//个人类型
                $data['uid'] = $uid;
                $data['update_time'] = time();
                $data['status'] = 0;//修改后需要重新审核资料
                $update = $userModel->where("id=".$_POST['id'])->save($data);
                $save = $this->saveCategory($uid,$data['category']);
                if($update || $save){
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/weixin/calendar');
                }else{
                    $this->error("修改失败");
                }
            }
        }
        //组织已选择的category数据
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        if($onlineUser){
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
        }
        $this->assign('onlineUser',$onlineUser);
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
    
        $this->display();
    }
    /**
     * 填写申请(公司)
     */
    public function apply_b(){
        $uid = $this->kjtxLoginCheck();
        if(!$uid){
            $this->error("请先登录科济天下网");
        }
        $userModel = M('2017_user');
        $categoryModel = M('category');
        $productTagModel = M('2017_product_tag');
    
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
    
        //表单处理
        if($_POST){
            //暂停提交
                        $this->error("欢迎明年再次使用，期待明年再相聚!");
            
            $inputArray = $this->bInputArray;
            foreach($inputArray as $k => $v){
                if(empty($_POST[$k])){
                    $this->error($v."不能为空");
                }
    
            }
            foreach($_POST as $k => $v){
                if(is_string($v)){
                    $data[$k] = strip_tags($v);
                }else{
                    $data[$k] = $v;
                }
    
            }
            $data['category'] = explode(',',$data['category']);
            if($_POST['id']==''){
                $existUser = $userModel->where(array('uid'=>$uid ))->find();
                if($existUser){
                    $this->error("您已经提交过信息了，请进入‘我的对接’查看");
                }
                $data['type'] = 2;//公司类型
                $data['uid'] = $uid;
                $data['add_time'] = $data['update_time'] = time();
                $add = $userModel->add($data);
                if($add){
                    $this->saveCategory($uid,$data['category']);
                    $this->createCalendar($uid);
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/weixin/calendar');
                }else{
                    $this->error("提交失败");
                }
            }else{
                $data['type'] = 2;//公司类型
                $data['uid'] = $uid;
                $data['update_time'] = time();
                $data['status'] = 0;
                $update = $userModel->where("id=".$_POST['id'])->save($data);
                $save = $this->saveCategory($uid,$data['category']);
                if($update || $save){
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/weixin/calendar');
                }else{
                    $this->error("修改失败");
                }
            }
        }
        //组织已选择的category数据
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        if($onlineUser){
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
        }
        $this->assign('onlineUser',$onlineUser);
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
    
        $this->display();
    }
    /**
     * 修改企业/个人信息
     */
    public function modify(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        if($onlineUser['type'] == 1){
            $this->redirect('Weixin/apply_c');
        }else{
            $this->redirect('Weixin/apply_b');
        }
    }
    /**
     * 企业/个人资料（他人查看,可以预约）
     */
    public function info(){
        $uid = intval($_GET['uid']);
        if(!$uid){
            $this->error('缺少用户id');
        }
        $userModel = M('2017_user');
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        if($onlineUser['status'] != 1){
            $this->error('用户待审核');
        }
        $categoryModel = M('category');
        $productTagModel = M('2017_product_tag');
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
    
        //日历数据
        $calendarModel = M('2017_calendar');
        $calendarList = $calendarModel->where(array('uid'=>$uid))->order('day_id,time_id')->getField('id,day_id,time_id,status');
        foreach($calendarList as $k => $v){
            $calendarListDay[$v['day_id']][$v['time_id']] = $v; //按day_id聚合用于输出模板
            $calendarListBefore[] = $k.'_'.$v['status']; //id=>status 数组用于比较修改数据
        }
    
        //预约数据
        $scheduleModel = M('2017_schedule');
        $scheduleList = $scheduleModel->where('accept_uid='.$uid.' and status>0')->select();
        foreach($scheduleList as $k => $v){
            $scheduleListCidKV[$v['calendar_id']] = $v['status']; //按calendar_id聚合用于输出模板,判断按钮状态
            $scheduleListCid[] = $v['calendar_id']; //按calendar_id聚合用于输出模板,判断按钮状态
        }
    
        $this->assign('cidList',$cidList);
        $this->assign('choosenFatherList',$choosenFatherList);
        $this->assign('choosenList',$choosenList);
    
        $this->assign('onlineUser',$onlineUser);
        $this->assign('calendarListDay',$calendarListDay);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleListCidKV',$scheduleListCidKV);
        $this->assign('scheduleListCid',$scheduleListCid);
    
        if($onlineUser['type'] == 1){
            $this->display('Weixin_info_c');
        }else{
            $this->display('Weixin_info_b');
        }
    }
    /**
     * 提交对接预约
     */
    public function setSchedule(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        if($onlineUser['status'] != 1){
            $this->error('您的用户信息尚未通过审核，请耐心等待');
        }
        $userModel = M('2017_user');
        if($_POST){
            //暂停提交
                        $this->error("欢迎明年再次使用，期待明年再相聚!");
    
            if(!$_POST['accept_uid']){
                $this->error('目标用户未找到');
            }
            $onlineAcceptUser = $userModel->where(array('uid'=>intval($_POST["accept_uid"]) ))->find();
            if(!$onlineAcceptUser){
                $this->error('目标用户未找到');
            }
            if($onlineUser['type'] == 1 && $onlineAcceptUser['type'] == 1){
                $this->error('只有企业身份用户才可与专家观众预约');
            }
            //检查日历
            $calendarModel = M('2017_calendar');
            $calendarInfo = $calendarModel->where('id='.intval($_POST['calendar_id']).' and status=1')->find();
    
            if(!$calendarInfo){
                $this->error('目标用户未开放该时间点');
            }
            //检查预约数据
            $scheduleModel = M('2017_schedule');
            $scheduleInfo = $scheduleModel->where('uid='.$uid.' and accept_uid='.intval($_POST["accept_uid"]).' and status>0')->find();
            if($scheduleInfo){
                $this->error('您已经预约过了');
            }
            //保存数据
            $data['uid'] = $uid;
            $data['uname'] = $onlineUser['type'] == 1 ? $onlineUser['name'] : $onlineUser['company_cname'];
            $data['umobile'] = $onlineUser['mobile'];
            $data['calendar_id'] = intval($_POST['calendar_id']);
            $data['accept_uid'] = intval($_POST["accept_uid"]);
            $data['accept_name'] = $onlineAcceptUser['type'] == 1 ? $onlineAcceptUser['name'] : $onlineAcceptUser['company_cname'];
            $data['accept_mobile'] = $onlineAcceptUser['mobile'];
            $data['umobile'] = $onlineUser['mobile'];
            $data['status'] = 1;
            $data['add_time'] = time();
            $add = $scheduleModel->add($data);
            if($add){
                header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/weixin/info/'.$_POST["accept_uid"]);
                $url_pc = 'http://'.$_SERVER['HTTP_HOST'].'/online.php/schedule/schedule_accept';
                SendMail($onlineAcceptUser["email"],"您有新的在线对接会预约申请","请点击链接 {$url_pc} 继续操作");
            }else{
                $this->error("提交失败");
            }
        }
    }
    /**
     * 处理预约
     * 确认：action=2
     * 拒绝：action=0
     * action  action_type  schedule_id
     */
    public function handleSchedule(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        $userModel = M('2017_user');
    
        if($_POST){
            //暂停提交
                        $this->error("欢迎明年再次使用，期待明年再相聚!");
    
            //检查预约数据
            $scheduleModel = M('2017_schedule');
            $scheduleInfo = $scheduleModel->where('id='.intval($_POST["schedule_id"]).' and accept_uid='.$uid.' and status=1')->find();
            if(!$scheduleInfo){
                echo '该预约不存在或该预约不是待处理状态';die();
            }
            //申请人信息
            $applyUser = $userModel->where('uid='.$scheduleInfo['uid'])->find();
            //保存数据
            $data['status'] = intval($_POST['action_type']);
            $data['update_time'] = time();
            $update = $scheduleModel->where("id=".intval($_POST['schedule_id']))->save($data);
            if($update){
                $url_pc = 'http://'.$_SERVER['HTTP_HOST'].'/online.php/schedule/schedule_apply';
                SendMail($applyUser["email"],"您提交的在线对接会预约已被对方处理","请点击链接 {$url_pc} 查看");
                echo json_encode($data);die();
            }else{
                echo '操作失败';die();
            }
        }
    }
    /**
     * 企业/个人基础信息（自己查看）
     */
    public function detail()
    {
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        $userModel = M('2017_user');
    
        $categoryModel = M('category');
        $productTagModel = M('2017_product_tag');
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
    
        //日历数据
        $calendarModel = M('2017_calendar');
        $calendarList = $calendarModel->where(array('uid'=>$uid ))->order('day_id,time_id')->getField('id,day_id,time_id,status');
        foreach($calendarList as $k => $v){
            $calendarListDay[$v['day_id']][$v['time_id']] = $v; //按day_id聚合用于输出模板
            $calendarListBefore[] = $k.'_'.$v['status']; //id=>status 数组用于比较修改数据
        }
    
        //预约数据
        $scheduleModel = M('2017_schedule');
        $scheduleList = $scheduleModel->where('accept_uid='.$uid.' and status>0')->select();
        foreach($scheduleList as $k => $v){
            $scheduleListCidKV[$v['calendar_id']] = $v['status']; //按calendar_id聚合用于输出模板,判断按钮状态
            $scheduleListCid[] = $v['calendar_id']; //按calendar_id聚合用于输出模板,判断按钮状态
        }
    
        $this->assign('cidList',$cidList);
        $this->assign('choosenFatherList',$choosenFatherList);
        $this->assign('choosenList',$choosenList);
    
        $this->assign('onlineUser',$onlineUser);
        $this->assign('calendarListDay',$calendarListDay);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleListCidKV',$scheduleListCidKV);
        $this->assign('scheduleListCid',$scheduleListCid);

        
        if($onlineUser['type'] == 1){
            $this->display('Weixin_detail_c');
        }else{
            $this->display('Weixin_detail_b');
        }
    
    }
    /**
     * 日历表,提交申请表单后进入本页确认日历
     */
    public function calendar(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        $userModel = M('2017_user');
        //日历数据
        $calendarModel = M('2017_calendar');
        $calendarList = $calendarModel->where(array('uid'=>$uid ))->order('day_id,time_id')->getField('id,day_id,time_id,status');
        foreach($calendarList as $k => $v){
            $calendarListDay[$v['day_id']][$v['time_id']] = $v; //按day_id聚合用于输出模板
            $calendarListBefore[] = $k.'_'.$v['status']; //id=>status 数组用于比较修改数据
        }
        //表单处理
        if($_POST){
            //暂停提交
                        $this->error("欢迎明年再次使用，期待明年再相聚!");
    
            foreach($_POST as $k => $v){
                $id = str_replace('calendar_','',$k);
                $calendarListAfter[] = $id.'_'.$v ;
            }
            $dataDiff = array_diff($calendarListAfter,$calendarListBefore);
            foreach($dataDiff as $diffStr){
                $diffArr = explode('_',$diffStr);
                $data['status'] = $diffArr[1];
                $calendarModel->where("id=".$diffArr[0])->setField($data);
            }
            //跳转到用户基础资料页
            $this->redirect('Weixin/detail');
        }
        $this->assign('calendarListDay',$calendarListDay);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->display();
    }
    /**
     * 接收到的预约日程表
     */
    public function schedule_accept(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        //预约数据
        $scheduleModel = M('2017_schedule');
        $count = $scheduleModel->where('accept_uid='.$uid)->count();
        $page = new FallPage($count,3);
        $show = $page->show();
        $scheduleList = $scheduleModel->where('accept_uid='.$uid)->order('calendar_id')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('scheduleList',$scheduleList);
        $this->assign('count',$count);
    
        foreach($scheduleList as $k => $v){
            $cidList[] = $v['calendar_id'];
        }
        //日历数据
        if($count>0){
            $calendarModel = M('2017_calendar');
            $calendarList = $calendarModel->where('id in ('.implode(',',$cidList).')')->select();
            foreach($calendarList as $k => $v){
                $calendarListKV[$v['id']]= $v;
            }
            $this->assign('calendarListKV',$calendarListKV);
        }
    
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleList',$scheduleList);
    
        $this->display();
    }
    /**
     * 发出的预约日程表
     */
    public function schedule_apply(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        //预约数据
        $scheduleModel = M('2017_schedule');
        $count = $scheduleModel->where('uid='.$uid.' and status>0')->count();
        $page = new FallPage($count,3);
        $show = $page->show();
        $scheduleList = $scheduleModel->where('uid='.$uid.' and status>0')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('scheduleList',$scheduleList);
        $this->assign('count',$count);
    
        foreach($scheduleList as $k => $v){
            $cidList[] = $v['calendar_id'];
        }
        //日历数据
        if($count>0){
            $calendarModel = M('2017_calendar');
            $calendarList = $calendarModel->where('id in ('.implode(',',$cidList).')')->select();
            foreach($calendarList as $k => $v){
                $calendarListKV[$v['id']]= $v;
            }
            $this->assign('calendarListKV',$calendarListKV);
        }
    
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleList',$scheduleList);
        $this->display();
    }
    /**
     * 登录页，完成微信端改造
     */
    public function login()
    {
        if($_POST){
            $error="";
            $data["NICKNAME"]=$_POST["name"];
            $data["PASSWORD"]=md5($_POST["password"]);
            $data1['EMAIL']=$_POST["name"];
            $data1["PASSWORD"]=md5($_POST["password"]);
            $user = M('passport');
            $list=$user->where($data)->find();
            $list1=$user->where($data1)->find();
            if($list||$list1){
                setcookie('nickname',$_POST['name'],time()+21600,'/');
                setcookie('check1',md5($_POST['name'].C('login_key')),time()+21600,'/');
                if($list){
                    setcurrentuser($list);
                }else{
                    setcurrentuser($list1);
                }
                if(I("returnurl")){
                    header("Location:".I("returnurl"));
                }else{
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/weixin/detail');
                }
                return;
            }else{
                $error="用户名或密码错误";
            }
            if($error!=""){
                $this->assign('error',$error);
                $this->assign('data',$_POST);
            }
        }
        $this->assign('appid',APPID);
        $this->assign('redirect_uri','http://'.$_SERVER['HTTP_HOST'].'/online.php/weixin/entrance');
        $this->display();
    
    }
    
    /**
     * 微信授权用户入口，完成
     */
    public function entrance()
    {
        //根据回调页code获取用户open_id和access_token
        $code = $_GET['code'];
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . APPID . '&secret=' . APPSECRET . '&code=' . $code . '&grant_type=authorization_code';
        $result = $this->curl ( $url );
        $url_info = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $result['access_token'] . '&openid=' . $result['openid'] . '&lang=zh_CN';
        $result_info = $this->curl ( $url_info );
//         $result_info = '{"openid":"o45ezjsI_LRBfqQJqAXMq89qQWE4","nickname":"齐欣","sex":1,"language":"zh_CN","city":"","province":"天津","country":"中国","headimgurl":"http:\/\/wx.qlogo.cn\/mmopen\/PiajxSqBRaEKkXcC7xibJcqVXiab42HkZBhQFRmx28jHL9eOooEzrqias5je3FmW0OI3ibJsSdKmDalOdfJPnBrfICw\/0","privilege":[]}';
//         $result_info = json_decode($result_info,true);
        //查询weixin_user数据库，判断当前用户是否已绑定
        if(!empty($result_info) && !isset($result_info['errcode'])){
            $weixin_user = $this->checkWeixinUser($result_info);
            if(!$weixin_user['uid']){
                //如果是新用户，创建user，weixin_user
                $uid = $this->addTkUser($result_info);
                if($uid){
                    $add = $this->addWeixinUser($uid,$result_info);
                    if(!$add){
                        $this->error("创建用户失败，请重试");
                    }
                }else{
                    $this->error("创建用户失败，请重试");
                }
            }else{
                //已微信授权用户，直接登录
                $tk_userModel = M('passport');
                $tk_user = $tk_userModel->where('id='.$weixin_user['uid'])->find();
                //设置cookie\session
                setcookie('nickname',$tk_user['nickname'],time()+21600,'/');
                setcookie('check1',md5($tk_user['nickname'].C('login_key')),time()+21600,'/');
                setcurrentuser($tk_user);
            }
        }else{
                $this->error("微信数据获取失败，请重试");
        }
        //跳转到个人中心页
        header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/weixin/detail');
    }
    /**
     * 定义微信菜单
     */
    public function weixinSetMenu()
    {
        $param = array(
            'button' => array(
                array(
                    'type' => 'view',
                    'name' => '大会日程',
                    'url' => 'http://cipeasia.kuaizhan.com/pc/?url=/53/83/p329479002d3e45',
                ),
                array(
                    'type' => 'view',
                    'name' => '我要参观',
                    'url' => 'http://cipeasia.kuaizhan.com/25/11/p315190575610cb',
                ),
                array(
                    'type' => 'view',
                    'name' => '掌上展会',
                    'url' => 'http://m.cipeasia.com',
                ),
            ),
        );
    
        $result = $this->curl ( $this->set_menu_url . $this->getAccessToken (), $param );
        print_r($param);
        echo "<br/>";
        echo $result['errmsg'] ;
        exit();
    }
    
    private function kjtxLoginCheck(){
        //判断kjtx是否登录，否则返回登录页面
        if(!$_SESSION["currentuser"]){
            //跳转到登录
            header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/weixin/login');
            return;
        }else{
            return $_SESSION["currentuser"]['id'];
        }
    }
    private function onlineLoginCheck($uid){
        //获取当前登录uid，判断online_user是否已经有数据
        $userModel = M('2017_user');
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        if(!$onlineUser){
            $this->redirect('Weixin/apply_b');
        }
        return $onlineUser;
    }
    
    /**
     * 判断是否绑定,如果绑定返回uid，如果未绑定，先保存open_id信息，生成kjtxw账号，再返回user信息
     */
    private function checkWeixinUser($result_info)
    {
        $weixinUserModel = M('2017_weixin_user');
        //查询weixin_user数据库，判断当前用户是否已绑定
        $weiXinUser = $weixinUserModel->where(array('open_id'=>$result_info['openid'] ))->find();
        return $weiXinUser;
    }
    private function addWeixinUser($uid,$result_info)
    {
        $weixinUserModel = M('2017_weixin_user');
        $data['uid'] = (int)$uid;
        $data['open_id'] = $result_info['openid'];
        $data['nickname'] = $result_info['nickname'];
        $data['sex'] = $result_info['sex'];
        $data['language'] = $result_info['language'];
        $data['city'] = $result_info['city'];
        $data['province'] = $result_info['province'];
        $data['country'] = $result_info['country'];
        $data['headimgurl'] = $result_info['headimgurl'];
        $data['add_time'] = time();
        return $weixinUserModel->add($data);
    }
    private function addTkUser($result_info)
    {
        //随机生成6位密码
        $pwd=array_merge(range('a', 'z'),range(0, 9));
        shuffle($pwd);
        $pass='';
        for ($i=0;$i<6;$i++){
            $pass .= $pwd[$i];
        }
        //将数据存入到数据库
        $time = time();
        $nickname = 'wx_'.$result_info['nickname'].'_'.$time;
        $da['ID']=$time;
        $da['UADDTIME']=$time;
        $da['IS_PERFECT']=0;
        $da['ISYZEMAIL']=0;
        $da['STATUS']=1;
        $da['NICKNAME']=$nickname;
        $da['SEX']=$result_info['sex'];
        $da['PASSWORD']=md5($pass);
        $da['PWDMING']=$pass;
        $tk_user = M('passport');
        $add=$tk_user->add($da);
        if($add){
            $data = $tk_user->where('nickname="'.$nickname.'"')->find();
            return $data['id'];
        }else{
            return false;
        }
    }
    private function saveCategory($uid,$cids){
        $productTagModel = M('2017_product_tag');
        $productTagModel->where('uid='.$uid)->delete();
        foreach($cids as $cid){
            if($cid > 0){
                $dataList[] = array('uid'=>$uid, 'cid'=>$cid);
            }
        }
        return $productTagModel->addAll($dataList);
    }
    private function createCalendar($uid){
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
    /**
     * 微信公众号域名验证入口
     */
    public function valid()
    {
        if ($this->checkSignature () === true)
        {
            echo $_GET ['echostr'];
        }
        // 获取access_token
        if (! empty ( $GLOBALS ["HTTP_RAW_POST_DATA"] ))
        {
            $postObj = simplexml_load_string ( $GLOBALS ["HTTP_RAW_POST_DATA"], 'SimpleXMLElement', LIBXML_NOCDATA );
        }
        else
        {
            exit ();
        }
        exit ();
    }
    private function checkSignature()
    {
        $signature = $_GET ["signature"];
        $timestamp = $_GET ["timestamp"];
        $nonce = $_GET ["nonce"];
    
        $token = WEIXIN_TOKEN;
        $tmpArr = array (
            $token,
            $timestamp,
            $nonce
        );
        sort ( $tmpArr, SORT_STRING );
        $tmpStr = implode ( $tmpArr );
        $tmpStr = sha1 ( $tmpStr );
    
        if ($tmpStr == $signature)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    private function getAccessToken()
    {
        if (! $this->access_token)
        {
            // 获取access token api地址
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . APPID . '&secret=' . APPSECRET;
            // 请求数据获取token
            $result = $this->curl ( $url );
            $this->access_token = $result ['access_token'];
        }
        return $this->access_token;
    }
    private function curl($url, $param = array())
    {
        $ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE; // 判断是否为ssl
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    
        if ($ssl)
        {
            curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 1);
            curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        if ($param)
        {
            curl_setopt ( $ch, CURLOPT_POST, 1 );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode ( $param, JSON_UNESCAPED_UNICODE ) );
        }
        $data = curl_exec ( $ch );
        curl_close ( $ch );
        return json_decode ( $data, true );
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
    private $cInputArray = array(
        'name' => '姓名',
        'company_cname' => '单位中文名称',
        'mobile' => '手机',
        'email' => 'Email',
        'industry' => '所属行业',
        'category' => '技术服务类别',
        'cooperation_need' => '需要何种合作或帮助',
    );
    private $bInputArray = array(
        'company_tel' => '公司电话',
        'company_email' => '公司邮箱',
        'name' => '姓名',
        'mobile' => '手机',
        'email' => 'Email',
        'category' => '技术服务类别',
        'cooperation_offer' => '能提供的核心产品及技术合作',
        'cooperation_need' => '需要何种合作或帮助',
    );
    
    private $set_menu_url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=';
    private $access_token = '';
}

