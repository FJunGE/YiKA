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

class LawController extends HomebaseController {
	

	//加载法律声明与咨询
	function index(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
 		$lawData1 = M('law')-> where($state) -> where("state = 2 and id in(1,2,3,4,5,6)") ->select();
		$this->assign('lawData1',$lawData1);
		
		$lawData2 = M('law') -> where("state = 2 and id in(7,8)")->  select();
		$this->assign('lawData2',$lawData2);
		
		$lawData3 = M('law') -> where("state = 2 and id in(9)")->  select();
		$this->assign('lawData3',$lawData3);
		
		$this->display("/zh/flsm");
	}
}





































