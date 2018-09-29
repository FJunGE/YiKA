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
 * 首页
 */
class VisitorController extends HomebaseController {
	
	
	//显示新闻媒体信息
	
	//保存新闻媒体信息
	//中文版页面
	function add_visitor(){
		
		$data['name'] = $_POST['username'];
		$data['sex'] = $_POST['sex'];
		$data['unit'] = $_POST['unit'];
		$data['mobile'] = $_POST['phoneNumber'];
		$data['email'] = $_POST['email'];
		$data['createTime'] = Date("Y-m-d H:i:s",time());
		$data['content'] =$_POST['content'];
		$data['edition'] =1;
		$res = M("visitor") -> add($data);
		if( $res ){
			$this -> success("提交成功，我们将1-3工作日内与您联系...",U('portal/Visitor/visitor'),4);
		}else{
			$this -> error("提交失败！请认真完善信息");
		}
	}
	//英文版页面
	function add_visitor_en(){
		$data['name'] = $_POST['username'];
		$data['sex'] = $_POST['sex'];
		$data['unit'] = $_POST['unit'];
		$data['mobile'] = $_POST['phoneNumber'];
		$data['email'] = $_POST['email'];
		$data['createTime'] = Date("Y-m-d H:i:s",time());
		$data['content'] =$_POST['content'];
		$data['edition'] =2;
		$res = M("visitor") -> add($data);
		if( $res ){
			echo  M('visitor') ->_sql();
			$this -> success("Submitted successfully，We will contact you within 1-3 working days...",U('portal/Visitor/visitor_en'),5);
		}else{
			$this -> error("Submit failure! Please improve information carefully");
		}	
	}
	//加载媒体联系在线提交表单页面
	public function visitor() {
		//产品导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//产品导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$this -> display("/zh/mtlx");
	}
   	
	//加载英文版媒体联系在线提交表单页面
	function visitor_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
		
		$this -> display("/en/mtlx_en");
	}
}


