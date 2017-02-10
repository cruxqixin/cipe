<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;

class UserController extends Controller {
    public function login(){
        $path="http://".$_SERVER['HTTP_HOST']."/online.php";
        $this->assign("path",$path);
        $user=M('passport');
        $this->assign($_GET);
        if($_POST){
            $error="";
            $data["email"]=$_POST["name"];
            $data["password"]=md5($_POST["password"]);
            $list=$user->where($data)->find();
            if($list){
                if($list['status']==2){//拒绝审核通过
                    header('location:' .U( 'User/login?type=2' ) );
                }else{
                    if($list['isyzemail']==1){
                        setcookie('nickname',$list['nickname'],time()+21600,'/');
                        setcookie('check1',md5($list['nickname'].C('login_key')),time()+21600,'/');
						setcurrentuser($list);
						
                        if(I("returnurl")){
                            header("Location:".I("returnurl"));
                        }else{
                            header("Location:login?type=1");
//                             $this->r(U('index/detail'));
                        }
                        return;
                    }else{
                        $this->success('邮箱未验证，请验证邮箱',U('User/verifyemail'));
                        return;
                    }
                }
    
    
            }else{
                $error="用户名或密码错误";
            }
            if($error!=""){
                $this->assign('error',$error);
                $this->assign('data',$_POST);
            }
        }
        $this->display();
    }
    public function logout(){
        exitcurrentuser();
        header('location:'.U('index/login').'?returnurl='.U('index/detail'));
    }
    public function register(){
        
    }
    public function verifyemail(){
    
    }
    
}