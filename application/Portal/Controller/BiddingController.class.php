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

class BiddingController extends HomebaseController {
	

	//供应商行为指南
	function guide(){
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$guide = M('bidding') ->where("id=1")->select();
		$this -> assign("guide" ,$guide);
		$this -> display("/zh/cgxwzn");
	}
	//采购商行为准则
	function criterion(){
		//产品导航部分
		//$appmark = M('appmark') -> order('createdtime desc') -> select();
		$navl = M('product_nav') -> limit('12') -> order('id desc') -> select();
		//$this -> assign("appmark",$appmark);
		$this -> assign("navl",$navl);
		//行业解决方案导航部分
		$plannav = M('plan') -> where('state = 1') -> select();
		$this->assign("plannav",$plannav);
		
		//行业解决方案头部
		$plandata = M('plan') -> where('state = 1') -> select();
		$this->assign("plandata",$plandata);
		
		$criterion = M('bidding') ->where("id=2")->select();
		$this -> assign("criterion" ,$criterion);
		$this -> display("/zh/cgxwzz");
	}
	//采购免责声明
	function statement(){
		//产品导航部分
		//$appmark = M('appmark') -> order('createdtime desc') -> select();
		$navl = M('product_nav') -> limit('12') -> order('id desc') -> select();
		//$this -> assign("appmark",$appmark);
		$this -> assign("navl",$navl);
		//行业解决方案导航部分
		$plannav = M('plan') -> where('state = 1') -> select();
		$this->assign("plannav",$plannav);
		
		//行业解决方案头部
		$plandata = M('plan') -> where('state = 1') -> select();
		$this->assign("plandata",$plandata);
		
		$statement = M('bidding') ->where("id=3")->select();
		$this -> assign("statement" ,$statement);
		$this -> display("/zh/cgmzsm");
	}
}





































