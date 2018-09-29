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

class ZydevelopmentController extends HomebaseController {
	

	//加载发展历史页面
	function index(){
		$moldZH = 1;//1是中文版
		$zydeveDatb = M('zydevelopment') -> where("id=4") -> select();
		$zydeveData = M('zydevelopment') -> where("id in(1,2,3)") -> select();
		$zydeveDatc = M('zydevelopment') -> where("id in(5,6,7)") -> select();
		$this->assign('zydeveData',$zydeveData);
		$this->assign('zydeveDatb',$zydeveDatb);
		$this->assign('zydeveDatc',$zydeveDatc);
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$this->display("/zh/zyfz");
	}
	//英文版
	function index_en(){
		$moldEN = 2;//2是英文版
		
		$zydeveDatb = M('zydevelopment') -> where("id=11")  -> select();
		$zydeveData = M('zydevelopment') -> where("id in(8,9,10)") -> select();
		$zydeveDatc = M('zydevelopment') -> where("id in(12,13,14)") -> select();
		$this->assign('zydeveData',$zydeveData);
		$this->assign('zydeveDatb',$zydeveDatb);
		$this->assign('zydeveDatc',$zydeveDatc);
		
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
		
		$this->display("/en/zyfz_en");
	}
}





































