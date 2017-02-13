<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;
class ProductController extends BaseController {
    public function index(){
		echo index;die();
        $this->display();
    }
    public function add(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $productModel = M('2017_product');
        $productTagModel = M('2017_product_tag');
        
        //表单处理
        if($_POST){
//             //暂停提交
//             $this->error("欢迎明年再次使用，期待明年再相聚!");
            $inputArray = $this->productInputArray;
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
            $data['uid'] = $uid;
            if($data['product_ename']){
                $data['first_letter'] =  strtoupper(substr($data['product_ename'],0,1));
            }
            
            //处理1-3个tag关键字
            $tagArray = $this->strToTag($data['tag']);
            
            $data['add_time'] = $data['update_time'] = time();
            $data['status'] = 1;

            $pid = $productModel->add($data);
            if($pid){
                $this->saveTag($uid,$pid,$tagArray);
                header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/product/listS');
            }else{
                $this->error("提交失败");
            }   
        }
        $this->display();
    }
    // 需pid参数
    public function edit(){
        $pid = intval($_GET['pid']);
        if(!$pid){
            $this->error('缺少产品id');
        }
        $productModel = M('2017_product');
        $productInfo = $productModel->where(array('Id'=>$pid))->find();
        if(!$productInfo || $productInfo['status'] == 0){
            $this->error('该产品不存在');
        }
        $userModel = M('2017_user');
        $onlineUser = $userModel->where(array('uid'=>$productInfo['uid'] ))->find();
        if(!$onlineUser || $onlineUser['uid'] != $productInfo['uid']){
            $this->error('该产品不属于你');
        }

        //已选tag   $listKV = array('tag1','tag2','tag3')
        $productTagModel = M('2017_product_tag');
        $productTagList = $productTagModel->where(array('pid' => $pid))->select();
        foreach($productTagList as $k => $v){
            $productInfo['tag'] .= ' '.$v['tag'];
        }
        $productInfo['tag'] = ltrim($productInfo['tag']);
        //表单处理
        if($_POST){
            //             //暂停提交
            //             $this->error("欢迎明年再次使用，期待明年再相聚!");
            $inputArray = $this->productInputArray;
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
            if($data['product_ename']){
                $data['first_letter'] =  strtoupper(substr($data['product_ename'],0,1));
            }
            //处理1-3个tag关键字
            $tagArray = $this->strToTag($data['tag']);
            
            $data['update_time'] = time();
            
            $update = $productModel->where("Id=".$productInfo['id'])->save($data);
            if($update){
                $this->saveTag($productInfo['uid'],$pid,$tagArray);
                header("Location:http://".$_SERVER['HTTP_HOST'].'/online.php/product/listS');
            }else{
                $this->error("提交失败");
            }
        }

        $this->assign('onlineUser',$onlineUser);
        $this->assign('productInfo',$productInfo);
        
        
        $this->display();
    }
    // 需pid参数
    public function delete(){
    	$pid = intval($_POST['pid']);
        if(!$pid){
            $this->error('缺少产品id');
        }
        $productModel = M('2017_product');
        $productInfo = $productModel->where(array('Id'=>$pid))->find();
        if(!$productInfo || $productInfo['status'] == 0){
            $this->error('该产品不存在');
        }
        $userModel = M('2017_user');
        $onlineUser = $userModel->where(array('uid'=>$productInfo['uid'] ))->find();
        if(!$onlineUser || $onlineUser['uid'] != $productInfo['uid']){
            $this->error('该产品不属于你');
        }
        //表单处理
        if($_POST){
            //保存数据
            $data['status'] = 0;
            $data['update_time'] = time();
            $update = $productModel->where("Id=".intval($_POST['pid']))->save($data);
            if($update){
                echo json_encode($data);die();
            }else{
                echo '操作失败';die();
            }
        }
        $this->display();
    }
    //其他用户的产品列表，需uid参数
    public function listO(){
        $uid = intval($_GET['uid']);
        if(!$uid){
            $this->error('缺少用户id');
        }
        $userModel = M('2017_user');
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        if($onlineUser['status'] != 1){
            $this->error('用户待审核');
        }

        $productModel = M('2017_product');
        $productList = $productModel->where(array('uid'=>$uid , 'status'=>1))->order('id desc')->findPage(9);

        $this->assign('onlineUser',$onlineUser);
        $this->assign('productList',$productList);

        $this->display();
    }
    //用户自己的产品列表
    public function listS(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $productModel = M('2017_product');
        $productList = $productModel->where(array('uid'=>$uid  , 'status'=>1))->select();
        $this->assign('productList',$productList);
        $this->display();
    }
    // 需pid参数
    public function info(){
        $pid = intval($_GET['pid']);
        if(!$pid){
            $this->error('缺少产品id');
        }
        $productModel = M('2017_product');
        $productInfo = $productModel->where(array('Id' => $pid) )->find();
        if(!$productInfo || $productInfo['status'] == 0){
            $this->error('该产品不存在');
        }
        $userModel = M('2017_user');
        $onlineUser = $userModel->where(array('uid'=>$productInfo['uid'] ))->find();
        
        if($onlineUser['status'] != 1){
            $this->error('该产品所属用户待审核');
        }
        
        //已选tag   $listKV = array('tag1','tag2','tag3')
        $productTagModel = M('2017_product_tag');
        $productTagList = $productTagModel->where(array('pid' => $productInfo['id']))->select();
        foreach($productTagList as $k => $v){
            $productInfo['tag'] .= ' '.$v['tag'];
        }
        $productInfo['tag'] = ltrim($productInfo['tag']);
        $this->assign('onlineUser',$onlineUser);
        $this->assign('productInfo',$productInfo);
        $this->display();
    }
    
    private $productInputArray = array(
        'product_cname' => '产品中文名称',
        'product_ename' => '产品英文名称',
//         'pic' => '产品图片',
        'tag' => '产品关键字/标签',
        'product_info' => '产品简介',
//         'product_id' => '产品ID',
    );

}