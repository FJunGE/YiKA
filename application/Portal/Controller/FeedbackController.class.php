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

class FeedbackController extends HomebaseController {
	

	//加载投诉反馈
	function feedback(){
		$productData = M('product') -> limit('8') -> order('createTime desc') -> select();
		$nav = M('product_nav') -> limit('15') -> order('id desc') -> select();
		
		$this -> assign("productData",$productData);
		$this -> assign("nav",$nav);
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$feedbackData = M('feedback') -> where('edition=1')->select();
		$this->assign('feedbackData',$feedbackData);
		$this->display("/zh/feedback");
	}
	
	function feedback_en(){
		$productData = M('product') -> limit('8') -> order('createTime desc') -> select();
		$nav = M('product_nav') -> limit('15') -> order('id desc') -> select();
	
		$this -> assign("productData",$productData);
		$this -> assign("nav",$nav);
	
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$feedbackData = M('feedback') -> where('edition=2')->select();
		$this->assign('feedbackData',$feedbackData);
		$this->display("/en/feedback_en");
	}
}





































