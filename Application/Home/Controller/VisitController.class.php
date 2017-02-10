<?php
//首页
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class VisitController extends BaseController {
    public function index(){
	    $list=M('guide')->where('type=2')->order("id desc")->select();
		$this->assign("list",$list);
	    $id=$_GET['type'];
        $vo=M('guide')->where("id=".$id)->find();
		$this->assign("art",$vo);
		
		$this->display();
    }
	
	public function apply(){
	    $list=M('guide')->where('type=1')->order("id asc")->select();
		$this->assign("list",$list);
	    $id=$_GET['type'];
        $vo=M('guide')->where("id=".$id)->find();
		$this->assign("art",$vo);
		$this->display();
	}

	public function submit_c(){

	    $visitCModel = M('visit_c');
	    //表单处理
	    if($_POST){
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
	        $data['tel'] = implode('-',array($data['tel1'],$data['tel2'],$data['tel3'],$data['tel4']));
	        $data['fax'] = implode('-',array($data['fax1'],$data['fax2'],$data['fax3'],$data['fax4']));
            $data['add_time'] = time();
            $add = $visitCModel->add($data);
            if($add){
                $this->success('您已成功注册，请凭手机号到现场领取入场券');
//                 header("Location:http://".$_SERVER['HTTP_HOST'].'/index.php/Home/Visit/success_c');
            }else{
                $this->error("提交失败");
            }

	    }
	}
	public function submit_m(){

	    $visitCModel = M('visit_m');
	    //表单处理
	    if($_POST){
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
	        $data['tel'] = implode('-',array($data['tel1'],$data['tel2'],$data['tel3'],$data['tel4']));
	        $data['fax'] = implode('-',array($data['fax1'],$data['fax2'],$data['fax3'],$data['fax4']));
            $data['add_time'] = time();
            $add = $visitCModel->add($data);
            if($add){
                $this->success('您已成功注册，请凭手机号到现场领取入场券');
//                 header("Location:http://".$_SERVER['HTTP_HOST'].'/index.php/Home/Visit/success_c');
            }else{
                $this->error("提交失败");
            }

	    }
	}
	public function submit_b(){
	    $visitBModel = M('visit_b');
	    //表单处理
	    if($_POST){
	        $inputArray = $this->bInputArray;
	        foreach($inputArray as $k => $v){
	            if(empty($_POST[$k]) && $k !='message'){
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
	        $data['tel'] = implode('-',array($data['tel1'],$data['tel2'],$data['tel3'],$data['tel4']));
	        $data['fax'] = implode('-',array($data['fax1'],$data['fax2'],$data['fax3'],$data['fax4']));
	        $data['main_product'] = mb_substr($data['main_product'],500);
	        $data['message'] = mb_substr($data['message'],500);
	        $data['add_time'] = time();
	        $add = $visitBModel->add($data);
	        if($add){
	            $this->success('您已成功提交信息，后续工作人员会和您电话联系，谢谢。');
// 	            header("Location:http://".$_SERVER['HTTP_HOST'].'/index.php/Home/Visit/success_b');
	        }else{
	            $this->error("提交失败");
	        }
	
	    }
	}
	public function submit_ce(){
	
	    $visitCEModel = M('visit_ce');
	    //表单处理
	    if($_POST){
	        $inputArray = $this->ceInputArray;
	        foreach($inputArray as $k => $v){
	            if(empty($_POST[$k])){
	                $this->error($v." required");
	            }
	        }
	        foreach($_POST as $k => $v){
	            if(is_string($v)){
	                $data[$k] = strip_tags($v);
	            }else{
	                $data[$k] = $v;
	            }
	             
	        }
            if($data['gender'] == 'Mr'){
                $data['gender'] = 'M';
            }elseif($data['gender'] == 'Miss'){
                $data['gender'] = 'F';
            }
            $data['tel'] = implode('-',array($data['tel1'],$data['tel2'],$data['tel3']));
            $data['fax'] = implode('-',array($data['fax1'],$data['fax2'],$data['fax3']));
            $data['department'] = $data['deparment'];
            $data['mobile'] = $data['mobilephone'];
            $data['post_code'] = $data['postcode'];
            $data['address'] = $data['companyaddress'];
	        $data['tel'] = $data['mobilephone'];
	        $data['add_time'] = time();
	        $add = $visitCEModel->add($data);
	        if($add){
	            $this->success('您已成功注册，请凭手机号到现场领取入场券' , 'http://www.cipeasia.com/en/visitreg.html');
// 	            header("Location:http://www.cipeasia.com/en/visitreg.html");
	        }else{
	            $this->error("failed");
	        }
	
	    }
	}
	public function submit_be(){
	    $visitBEModel = M('visit_be');
	    //表单处理
	    if($_POST){
	        $inputArray = $this->beInputArray;
	        foreach($inputArray as $k => $v){
	            if(empty($_POST[$k]) && $k !='message'){
	                $this->error($v." required");
	            }
	        }
	        foreach($_POST as $k => $v){
	            if(is_string($v)){
	                $data[$k] = strip_tags($v);
	            }else{
	                $data[$k] = $v;
	            }
	
	        }
	        if($data['gender'] == 'Mr'){
	            $data['gender'] = 'M';
	        }elseif($data['gender'] == 'Miss'){
	            $data['gender'] = 'F';
	        }
	        $data['department'] = $data['deparment'];
	        $data['mobile'] = $data['mobilephone'];
	        $data['tel'] = implode('-',array($data['tel1'],$data['tel2'],$data['tel3']));
	        $data['fax'] = implode('-',array($data['fax1'],$data['fax2'],$data['fax3']));
	        $data['post_code'] = $data['postcode'];

	        $data['address'] = $data['companyaddress'];
	        $data['main_product'] = substr($data['mainproduct'],0,500);
	        if($data['rawtype1'] == 'Island Standard'){
	            $data['exhibit_type'] = 1;
	        }elseif($data['rawtype1'] == 'Standard Booth(3m*3m)'){
	            $data['exhibit_type'] = 2;
	        }
	        $data['area'] = '9 square meters';
	        $data['message'] = substr($data['message'],0,500);
	        $data['add_time'] = time();
	        $add = $visitBEModel->add($data);
	        if($add){
	            $this->success('您已成功提交信息，后续工作人员会和您电话联系，谢谢。' , 'http://www.cipeasia.com/en/reg.html');
// 	            header("Location:http://www.cipeasia.com/en/reg.html");
	        }else{
	            $this->error("提交失败");
	        }
	
	    }
	}
// 	public function success_c(){
// 	    $this->display();
// 	}
// 	public function success_b(){
// 	    $this->display();
// 	}
	private $cInputArray = array(
	    'name' => '姓名',
	    'gender' => '姓别',
	    'position' => '称谓',
	    'department' => '部门',
	    'company' => '单位名称',
	    'address' => '通讯地址',
	    'province' => '省份/地区',
	    'city' => '城市',
	    'tel1' => '电话',
	    'tel2' => '电话',
	    'tel3' => '电话',
	    'mobile' => '手机',
	    'email' => 'Email',
	    'website' => '网址',
	);
	private $ceInputArray = array(
	    'name' => 'name',
	    'gender' => 'gender',
	    'position' => 'position',
	    'deparment' => 'department',
	    'company' => 'company',
	    'companyaddress' => 'company address',
	    'country' => 'country',
	    'city' => 'city',
	    'tel1' => 'Telephone',
	    'tel2' => 'Telephone',
	    'tel3' => 'Telephone',
	    'mobilephone' => 'mobile',
	    'email' => 'Email',
	    'website' => 'website',
	);
	private $bInputArray = array(
	    'name' => '姓名',
	    'gender' => '姓别',
	    'position' => '称谓',
	    'department' => '部门',
	    'company' => '单位名称',
	    'address' => '通讯地址',
	    'province' => '省份/地区',
	    'city' => '城市',
	    'tel1' => '电话',
	    'tel2' => '电话',
	    'tel3' => '电话',
	    'mobile' => '手机',
	    'email' => 'Email',
	    'website' => '网址',
	    'main_product' => '主要展品',
	    'area' => '租用面积',
	    'exhibit_type' => '参展方案',
	    'message' => '给主办方留言'
	);
	private $beInputArray = array(
	    'name' => 'name',
	    'gender' => 'gender',
	    'position' => 'position',
	    'deparment' => 'department',
	    'company' => 'company',
	    'companyaddress' => 'company address',
	    'country' => 'country',
	    'city' => 'city',
	    'tel1' => 'Telephone',
	    'tel2' => 'Telephone',
	    'tel3' => 'Telephone',
	    'mobilephone' => 'mobile',
	    'email' => 'Email',
	    'website' => 'website',
	    'mainproduct' => 'Main Product',
	    'rawtype1' => 'Select Booth',
	    'message' => 'Message to Organizer'
	);
}