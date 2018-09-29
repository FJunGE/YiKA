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

class JoindiyeController extends HomebaseController {
	

	//加载为什么加入我们页面
	function joinus(){
		$moldZH = 1;//1是中文
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$joindiyeData = M('joindiye')->where("joindiye_mold=$moldZH") -> select();
		$this->assign('joindiyeData',$joindiyeData);
		$this->display("/zh/joinus");
	}
	function joinus_en(){
		$moldEN = 2;//2是英文版
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
		
		$joindiyeData = M("joindiye")->where("joindiye_mold=$moldEN") -> select();
		$this->assign('joindiyeData',$joindiyeData);
		$this->display("/en/joinus_en");
	}
}





































