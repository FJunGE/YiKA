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

class ResearchController extends HomebaseController {
	

	//加载帝业理念详情页
	function research(){
		$moldZH = 1;//1代表中文版
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$researchData = M('research') ->where("research_mold = $moldZH") -> select();
		$this->assign('researchData',$researchData);
		$this->display("/zh/yf");
	}
	function research_en(){
		$moldEN=2;//2代表英文版
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
		
		$researchData = M('research') -> where("research_mold = $moldEN") -> select();
		$this->assign('researchData',$researchData);
		$this->display("/en/yf_en");
	}
}





































