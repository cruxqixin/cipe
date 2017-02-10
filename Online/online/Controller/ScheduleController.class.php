<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;
class ScheduleController extends BaseController {
    public function index(){
        
        $this->display();
        //分页参数待处理
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
                header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/index/info/'.$_POST["accept_uid"]);
                $url = 'http://'.$_SERVER['HTTP_HOST'].'/online.php/schedule/schedule_accept';
                SendMail($onlineAcceptUser["email"],"您有新的在线对接会预约申请","请点击链接 {$url} 继续操作");
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
                if($_POST['action_type'] == 2){
                    $url = 'http://'.$_SERVER['HTTP_HOST'].'/online.php/schedule/schedule_apply';
                }else{
                    $url = 'http://'.$_SERVER['HTTP_HOST'].'/online.php/schedule/schedule_reject';
                }
                SendMail($applyUser["email"],"您提交的在线对接会预约已被对方处理","请点击链接 {$url} 查看");
                echo json_encode($data);die();
            }else{
                echo '操作失败';die();
            }
        }
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
        $page = new FallPage($count,10);
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
        $page = new FallPage($count,10);
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
     * 被拒的预约日程表
     */
    public function schedule_reject(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];

        //预约数据
        $scheduleModel = M('2017_schedule');
        $count = $scheduleModel->where('uid='.$uid.' and status=0')->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $scheduleList = $scheduleModel->where('uid='.$uid.' and status=0')->limit($page->firstRow.','.$page->listRows)->select();
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

 
}