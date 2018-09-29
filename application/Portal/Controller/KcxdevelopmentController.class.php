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

class KcxdevelopmentController extends HomebaseController {
	

	//加载可持续发展详情页
	function kcxdevelopment(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$kcxdeveData = M('kcxdevelopment') -> where('edition=1') ->select();
		$this->assign('kcxdeveData',$kcxdeveData);
		$this->display("/zh/kcxfz");
	}
	
	function kcxdevelopmentDetail(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$id = I("id");
		
		$data = M("kcxdevelopment") -> where("id = $id") -> where('edition=1') ->select();
		
		$this->assign('data',$data);
		$this->display("/zh/kcxfzdetail");
	}
	
	//加载可持续发展详情页
	function kcxdevelopment_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$kcxdeveData = M('kcxdevelopment') -> where('edition=2') ->select();
		$this->assign('kcxdeveData',$kcxdeveData);
		$this->display("/en/kcxfz_en");
	}
	
	function kcxdevelopmentDetail_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$id = I("id");
	
		$data = M("kcxdevelopment") -> where("id = $id") -> where('edition=2') ->select();
	
		$this->assign('data',$data);
		$this->display("/en/kcxfzdetail_en");
	}
}





































