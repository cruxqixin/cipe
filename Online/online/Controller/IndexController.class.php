<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;
class IndexController extends BaseController {
    public function index(){
        $userModel = M('2017_user');
        $productModel = M('2017_product');
        $productTagModel = M('2017_product_tag');
        $industryModel = M('industry');
        $userIndustryModel = M('2017_user_industry');
        $themeModel = M('theme');
        //行业分类
        $industryList = $industryModel->where('status=1')->select();
        //展区数据
        $themeList = $themeModel->where(array('status'=>1,'year'=>2017))->select();

        //处理搜索参数
        if($_GET['sType'] != 2){
            //展商搜索
            //展区
            if($_GET['tid']>0){
                $theme_id = intval($_GET['tid']);
                $where['theme_id'] = $theme_id;
            }
            //首字母
            if($_GET['fl']!=''){
                $firstLetter = substr( $_GET['fl'], 0, 1 );
                $firstLetterNum = ord($firstLetter);
                if($firstLetterNum>64&&$firstLetterNum<91){
                    $where['first_letter'] = $firstLetter;
                }
            }
            //行业
            if($_GET['ind']>0){
                $uidList = array();
                $ind_id = intval($_GET['ind']);
                $userIndustryList = $userIndustryModel->where('ind_id='.$ind_id)->group('uid')->field('uid')->select();
                if(!empty($userIndustryList)){
                    foreach($userIndustryList as $v){
                        $uidList[] = $v['uid'];
                    }
                }
            }
            if(!empty($uidList)){
                $where[] = "uid in (". implode(',',$uidList) .") ";
            }
            //关键词
            if($_GET['keyword'] != '' && $_GET['keyword'] != '请输入查询关键词'){
                $keyword = trim($_GET['keyword']);
                $keyword = strip_tags($keyword);
                $keyword = inject_check($keyword);
                if($keyword != ''){
                    //展商关键字
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
            $where['status'] = 1;
        	$userList = $userModel->where($where)->order('id desc')->findPage(15);//公司搜索
        }else{
            //展品搜索
            //首字母
            if($_GET['fl']!=''){
                $firstLetter = substr( $_GET['fl'], 0, 1 );
                $firstLetterNum = ord($firstLetter);
                if($firstLetterNum>64&&$firstLetterNum<91){
                    $whereProd1['first_letter'] = $firstLetter;
                }
            }
            //关键词
            if($_GET['keyword'] != '' && $_GET['keyword'] != '请输入查询关键词'){
                $keyword = trim($_GET['keyword']);
                $keyword = strip_tags($keyword);
                $keyword = inject_check($keyword);
                if($keyword != ''){
                    //展品关键字
		            $tempSqlProd = "product_cname like '%".$keyword."%'";
		            $tempSqlProd .= " or product_ename like '%".$keyword."%'";
		            $tempSqlProd .= " or product_info like '%".$keyword."%'";
		            $whereProd2[] = $tempSqlProd;//product表搜索
		            
		            $tagList = $productTagModel->where("tag like '%".$keyword."%'")->group('pid')->select();//tag表搜索
		            if(!empty($tagList)){
		                $pidList = array();
		                $tagListPid = array();
		                foreach($tagList as $v){
		                    $pidList[] = $v['pid'];
		                    $tagListPid[$v['pid']][] = $v['tag']; 
		                }
		                if(!empty($pidList)){
		                	$whereProd1[] = "id in (". implode(',',$pidList) .") ";
		                }
		            }
                }
            }
            //user表begin
            //展区
            if($_GET['tid']>0){
                $theme_id = intval($_GET['tid']);
                $where['theme_id'] = $theme_id;
            }
            $where['status'] = 1;
            //行业
            if($_GET['ind']>0){
                $ind_id = intval($_GET['ind']);
                $userIndustryList = $userIndustryModel->where('ind_id='.$ind_id)->group('uid')->field('uid')->select();
                print_r($userIndustryList);
                if(!empty($userIndustryList)){
                    foreach($userIndustryList as $v){
                        $uidList[] = $v['uid'];
                    }
                }
                if(!empty($uidList)){
                    $where[] = "uid in (". implode(',',$uidList) .") ";
                }else{
                    $where[] = "1=0";
                }
            }
            $userList = $userModel->where($where)->order('id desc')->select();//用户搜索
            $uidList = array();
            $userListKV = array();
            if(!empty($userList)){
                foreach($userList as $v){
                    if(!in_array($v['uid'],$uidList)){$uidList[] = $v['uid'];}
                    $userListKV[$v['uid']] = $v;
                }
            }
            //user表end
            
            if(!empty($uidList)){
            	$whereProd1[] = "uid in (". implode(',',$uidList) .") ";	
            }else{
                $whereProd1[] = "1=0";
            }
            $whereProd1['status'] = 1;
            if(empty($whereProd2)){
                $whereProd = $whereProd1;
            }else{
	            $whereProd['_complex'] = array(
			        $whereProd1,
			        $whereProd2,
			        '_logic' => 'or'
			    );
            }
            $productList = $productModel->where($whereProd)->order('id desc')->findPage(15);//产品搜索
            if(!empty($productList['data'])){
                $pidArr = array();
                foreach($productList['data'] as $v){
                    if(!in_array($v['id'],$pidArr)){$pidArr[] = $v['id'];}
            	}
            	$whereTag[] =  "pid in (". implode(',',$pidArr) .") ";	
            	$tagList = $productTagModel->where($whereTag)->select();//tag表搜索
            	if(!empty($tagList)){
            	    $tagListPid = array();
            	    foreach($tagList as $v){
            	        $tagListPid[$v['pid']][] = $v['tag'];
            	    }
            	}
            }
        }
        $this->assign('userList',$userList);//搜展商输出
        $this->assign('productList',$productList);//搜展品输出
        $this->assign('tagListPid',$tagListPid);//搜展品输出
        $this->assign('userListKV',$userListKV);//搜展品输出
        $this->assign('industryList',$industryList);
        $this->assign('themeList',$themeList);
        $this->assign('keyword',$keyword);
        $URI = 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        $this->assign('URI',  $URI );
        
        //产品类别url
        $getArray = $_GET;
        unset($getArray['tid']);
        $this->assign('themeUrl',  U('index/index').'?'.http_build_query($getArray) );
        //首字母筛选url
        $getArray = $_GET;
        unset($getArray['fl']);
        $this->assign('flUrl',  U('index/index').'?'.http_build_query($getArray) );
        $this->display();
        //分页参数待处理?
        
    }

    /**
     * 填写申请(个人)
     */
    public function apply_c(){
        $uid = $this->kjtxLoginCheck();
//         if(!$uid){
//             $this->error("请先登录光电子·中国博览会");
//         }
        $userModel = M('2017_user');
        $categoryModel = M('category');
        $productTagModel = M('2017_product_tag');
        $tkUserModel = M('passport');
        $tkUser = $tkUserModel->where('id='.$uid)->find();
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
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/index/calendar');
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
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/index/calendar');
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
        $this->assign('tkUser',$tkUser);
        $this->display();
    }
    /**
     * 填写申请(公司)
     */
    public function apply_b(){
        $uid = $this->kjtxLoginCheck();
//         if(!$uid){
//             @header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/index/login/?returnurl='.$_SERVER['PHP_SELF']);
//         }
        $userModel = M('2017_user');
        $productTagModel = M('2017_product_tag');
        $industryModel = M('industry');
        $themeModel = M('theme');
        $userIndustryModel = M('2017_user_industry');
        $tkUserModel = M('passport');
        $tkUser = $tkUserModel->where(array('id' => $uid))->find();
        //行业分类
        $industryList = $industryModel->where('status=1')->select();
        //展区数据
        $themeList = $themeModel->where(array('status'=>1,'year'=>2017))->select();
        //表单处理
        if($_POST){
//             //暂停提交
//             $this->error("欢迎明年再次使用，期待明年再相聚!");
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
            $data['type'] = 2;//公司类型
            $data['uid'] = $uid;
            if($data['company_ename']){
                $data['first_letter'] =  strtoupper(substr($data['company_ename'],0,1));
            }
            if($_POST['id']==''){
                $existUser = $userModel->where(array('uid'=>$uid ))->find();
                if($existUser){
                    $this->error("您已经提交过信息了，请进入‘我的对接’查看");
                }
                $data['add_time'] = $data['update_time'] = time();
                $add = $userModel->add($data);
                if($add){
                    $this->saveIndustry($uid,$data['industry']);
                    $this->createCalendar($uid);
//                     header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/index/calendar');
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/product/listS');
                }else{
                    $this->error("提交失败");
                }
            }else{
                $data['update_time'] = time();
//                 $data['status'] = 0;   
                $update = $userModel->where("id=".$_POST['id'])->save($data);
                $save = $this->saveIndustry($uid,$data['industry']);
                if($update || $save){
//                     header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/index/calendar');
                    header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/index/detail');
                }else{
                    $this->error("修改失败");
                }
            }
        }
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        $userIndustryList = $userIndustryModel->where(array('uid'=>$uid ))->select();
        foreach($userIndustryList as $k=>$v){
            $userIndustryListK [] = $v['id'];
        }

        $onlineUser['industry'] = $userIndustryListK;//数组形式
        $this->assign('onlineUser',$onlineUser);
        $this->assign('industryList',$industryList);
        $this->assign('themeList',$themeList);
        $this->assign('tkUser',$tkUser);
        $this->display();
    }
    /**
     * 修改企业/个人信息
     */
    public function modify(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        if($onlineUser['type'] == 1){
            $this->redirect('Index/apply_c');
        }else{
            $this->redirect('Index/apply_b');
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
    	$industryModel = M('industry');
        $userIndustryModel = M('2017_user_industry');
        $themeModel = M('theme');
        //行业分类
        $industryList = $industryModel->where('status=1')->select();
        $userIndustryList = $userIndustryModel->where(array('uid'=>$uid ))->select();
        foreach($industryList as $k=>$v){
            $industryListKV [$v['id']] = $v['cname'];
        }
        //展区数据
        $themeList = $themeModel->where(array('status'=>1,'year'=>2017))->select();
        foreach($themeList as $k=>$v){
            $themeListKV [$v['id']] = $v['cname'];
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
        
        //产品数据
        $productModel = M('2017_product');
        $productList = $productModel->where(array('uid'=>$uid  , 'status'=>1))->order('id desc')->findPage(3);

        $this->assign('industryListKV',$industryListKV);
        $this->assign('userIndustryList',$userIndustryList);
        $this->assign('themeListKV',$themeListKV);
        $this->assign('onlineUser',$onlineUser);
        $this->assign('calendarListDay',$calendarListDay);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleListCidKV',$scheduleListCidKV);
        $this->assign('scheduleListCid',$scheduleListCid);
        $this->assign('productList',$productList);
        
        if($onlineUser['type'] == 1){
            $this->display('Index_info_c');
        }else{
            $this->display('Index_info_b');
        }
    }
    /**
     * 企业/个人基础信息（自己查看）
     */
    public function detail(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        $userModel = M('2017_user');
        $industryModel = M('industry');
        $userIndustryModel = M('2017_user_industry');
        $themeModel = M('theme');
        //行业分类
        $industryList = $industryModel->where('status=1')->select();
        $userIndustryList = $userIndustryModel->where(array('uid'=>$uid ))->select();
        foreach($industryList as $k=>$v){
            $industryListKV [$v['id']] = $v['cname'];
        }
        //展区数据
        $themeList = $themeModel->where(array('status'=>1,'year'=>2017))->select();
        foreach($themeList as $k=>$v){
            $themeListKV [$v['id']] = $v['cname'];
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
        $this->assign('industryListKV',$industryListKV);
        $this->assign('userIndustryList',$userIndustryList);
        $this->assign('themeListKV',$themeListKV);
        $this->assign('onlineUser',$onlineUser);
        $this->assign('calendarListDay',$calendarListDay);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleListCidKV',$scheduleListCidKV);
        $this->assign('scheduleListCid',$scheduleListCid);
        
        
        if($onlineUser['type'] == 1){
            $this->display('Index_detail_c');
        }else{
            $this->display('Index_detail_b');
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
            $this->redirect('Index/detail');
        }

        $this->assign('calendarListDay',$calendarListDay);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->display();
    }

    /**
     * 复制kjtxw登录页
     */
    public function login(){
        $path="http://".$_SERVER['HTTP_HOST']."/online.php";
        $this->assign("path",$path);
        $this->assign($_GET);
        //判断kjtx是否登录，已登录的跳转到首页
        if($_SESSION["currentuser"]){
            //跳转到首页
            header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php');
            return;
        }else{
            $this->display();
        }
        
    }

    private $cInputArray = array(
        'name' => '姓名',
        'company_cname' => '单位中文名称',
        'mobile' => '手机',
        'email' => 'Email',
    );
    private $bInputArray = array(
        'company_tel' => '公司电话',
        'company_email' => '公司邮箱',
        'name' => '姓名',
        'mobile' => '手机',
        'email' => 'Email',
    );
    
    
}