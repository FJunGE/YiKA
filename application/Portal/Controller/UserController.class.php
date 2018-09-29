<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 俊铬修改 @JG
 */
class UserController extends HomebaseController {
	
	protected $users_model;
    //注册页面
	public function register() {
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$this -> display("/zh/register");
	}
	
	//保存用户注册信息中文版
	function add_user(){
		
		if(!sp_check_verify_code()){
			$this->error("验证码错误！");
		}
		
		$passwordAgin = $_POST['passwordAgin'].trim();
		$data['user_login'] = $_POST['username'];
		$data['user_pass'] = $_POST['password'].trim();
		$data['sex'] = $_POST['call'];
		$data['user_nicename'] = $_POST['name'];
		$data['mobile'] = $_POST['phoneNumber'];
		$data['user_email'] = $_POST['email'];
		$data['area'] = $_POST['region'];
		$data['company'] = $_POST['company'];
		$data['department'] = $_POST['department'];
		$data['user_status'] = 2;
		$data['user_type'] = 2;
		$data['create_time'] = Date("Y-m-d H:i:s",time());
		$data['last_login_time'] = "0000-00-00 00:00:00";
		$data['user_mold'] = 1;
		
		if( $data['user_pass'] != $passwordAgin ){
			$this->error("两次密码输入不相同！");
		}
		
		
		$map['user_login'] = $data['user_login'].trim(); 
		$tn = M("users") -> where($map) -> select();
		if( $tn != null ){
			$this -> error("用户名已存在！");
		}
		
		$data['user_pass'] = md5($passwordAgin);
		$res = M("users") -> add($data);
		if( $res ){
			$this -> success("注册成功，审核中...",U('portal/index/index'),3);
		}else{
			$this -> error("注册失败！");
		}
	}

	
	//登录界面
	function login(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$this -> display("/zh/login");
	}
	
	//检验用户的登录信息
	function checkuser(){
		
		if(!sp_check_verify_code()){
			$this->error("验证码错误！");
		}
		
		$data['user_login'] = I("name");
		$data['user_pass'] = md5(I("pass"));
		
		$user = M('users') -> where($data) -> find();
		
		if( $user['user_status'] == 0 ){
			
			$this->error("该账号已被禁用！");
			
		}else if($user['user_status'] == 2){
			
			$this->error("账号审核中，请耐心等待！");
			
		}
		
 		if( $user ){
 			//登录成功将用户信息保存至session中
 			session("userid",$user['id']);
 			session("user_login",$user['user_login']);
 			session("usertype","vip");
 			session("user_url",$user['user_url']);
			
 			$this->success("登录成功！",U('portal/index/index'));
 		}
		
	}
	
	//加载修改信息页面view
	function edit(){
		$id = I("id");
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
	
		
		$edit = M("users") -> where("id = $id") -> find();
		$cate = M("users") -> where("id = $id") -> select();
		$this -> assign("edit",$edit);
		$this -> assign("cate",$cate);
		$this -> display("/zh/edit");
	}
	
	//个人信息修改
	function edit_information(){
		$id = I("id");
		$datas['sex'] = $_POST['call'];
		$datas['user_nicename'] = $_POST['name'];
		$datas['mobile'] = $_POST['phoneNumber'];
		$datas['user_email'] = $_POST['email'];
		$datas['area'] = $_POST['region'];
		$datas['company'] = $_POST['company'];
		$datas['department'] = $_POST['department'];
		$datas['user_type'] = 2;
		$datas['sex'] = $_POST['call'];
		
		$res = M('users') ->where("id = $id") -> data($datas) -> save(); 
		
		if( $res !== false){
			$this->success("个人信息修改成功！");
		}else{
			$this->error("个人信息修改修改失败！");
		}
	
	}
	//密码修改
	 function password(){
		$id = I("id");
		$s = M("users") -> where("id = $id") -> getField('user_pass');
		$aa = $_POST['old_password'].trim();
		$aa2 = md5($aa);
		
		if($aa2 == $s){
			
			$repassword = $_POST['repassword'].trim();
			$aa3 = md5($_POST['password'].trim());
			$aa4 = md5($repassword);
			$data['user_pass'] = $aa3;
				
			if($aa3 !== $aa4){
				$this->error("新密码与重复密码不一致");
			}
			$res = M("users") -> where("id =$id")-> data($data) ->save();
			
			if($res !== false){
				$this->success("密码修改成功");
			}else{
				$this->error("密码修改失败，请重新检查");
			}
		}else{
			$this->error("对不起，原密码错误");
			
		}
		
	} 
	
	//修改用户头像
	function avatar(){
		$id = I("id");
		//修改图片
		$config = array(
				'maxSize'    =>    0,
				'savePath'   =>    '/upload/avatar/',
				'rootPath'   =>    'data/',
				'replace'    =>    'true',
				'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
				'autoSub'    =>    false,
				'saveName'    =>    array('uniqid',''),
				'subName'    =>    array('date','Ymd'),
		);
			
		$upload = new \Think\Upload($config);
		$info   =   $upload->upload();
		$p = M("users") ->field("user_url") ->where("id = $id") -> find();
		if( $info['user_url'] != null ){
			$data['user_url'] = $info["user_url"]['savepath'] . $info["user_url"]['savename'];
			unlink("data/" . $p['user_url']);
		}
		
		$res = M("users") -> where("id = $id") -> data($data) -> save();
		if( $res !== false){
			//修改头像成功，把头像地址传入session中
			$i = M("users") -> where("id = $id") -> find();
			session("user_url",$i['user_url']);
			//var_dump($i);exit;
			$this->success("头像修改成功！");
		}else{
			$this->error("头像修改失败！");
				
	}
    	



}
//------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------
	//英文版用户注册界面
	public function register_en() {
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$this -> display("/en/register_en");
	}
	
	//英文版信息保存
	function add_user_en(){
	
		if(!sp_check_verify_code()){
			$this->error("Verification code error!");
		}
	
		$passwordAgin = $_POST['passwordAgin'].trim();
		$data['user_login'] = $_POST['username'];
		$data['user_pass'] = $_POST['password'].trim();
		$data['sex'] = $_POST['call'];
		$data['user_nicename'] = $_POST['name'];
		$data['mobile'] = $_POST['phoneNumber'];
		$data['user_email'] = $_POST['email'];
		$data['area'] = $_POST['region'];
		$data['company'] = $_POST['company'];
		$data['department'] = $_POST['department'];
		$data['user_status'] = 2;
		$data['user_type'] = 2;
		$data['create_time'] = Date("Y-m-d H:i:s",time());
		$data['last_login_time'] = "0000-00-00 00:00:00";
		$data['user_mold'] = "2";
		
		if( $data['user_pass'] != $passwordAgin ){
			$this->error("Two password input is not the same! ");
		}
	
	
		$map['user_login'] = $data['user_login'].trim();
		$tn = M("users") -> where($map) -> select();
		if( $tn != null ){
			$this -> error("User name already exists!");
		}
	
		$data['user_pass'] = md5($passwordAgin);
		$res = M("users") -> add($data);
		if( $res ){
			$this -> success("Registration is successful, waiting for audit",U('portal/index/index_en'),5);
		}else{
			$this -> error("Registration failed!");
		}
	}

	//英文登录界面
	function login_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$this -> display("/en/login_en");
	}
	
	//检验英文版用户的登录信息
	function checkuser_en(){
	
		if(!sp_check_verify_code()){
			$this->error("Verification code error!");
		}
	
		$data['user_login'] = I("name");
		$data['user_pass'] = md5(I("pass"));
	
		$user = M('users') -> where($data) -> find();
	
		if( $user['user_status'] == 0 ){
				
			$this->error("This account has been disabled!");
				
		}else if($user['user_status'] == 2){
				
			$this->error("waiting for audit, please be patient!");
				
		}
	
		if( $user ){
			//登录成功将用户信息保存至session中
			session("userid",$user['id']);
			session("user_login",$user['user_login']);
			session("usertype","vip");
			session("user_url",$user['user_url']);
				
			$this->success("Login successful！",U('portal/index/index_en'));
		}
	
	}
}