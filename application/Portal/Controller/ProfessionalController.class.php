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

class ProfessionalController extends HomebaseController {
	

	//加载专业人士页面
	function index(){
		$moldZH = 1;//1是中文版
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$professionalData = M('professional') ->where("pro_mold=$moldZH") -> select();
		$this->assign('professionalData',$professionalData);
		$this->display("/zh/zyrs");
	}
	
	function index_en(){
		$moldEN = 2;//2是英文版
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$professionalData = M('professional') ->where("pro_mold = $moldEN") -> select();
		$this->assign('professionalData',$professionalData);
		$this->display("/en/zyrs_en");
	}
}





































