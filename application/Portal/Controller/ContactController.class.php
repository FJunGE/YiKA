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

class ContactController extends HomebaseController {
	

	//加载联系我们页面
	function index(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$contactDatb = M('contact_add') ->where('edition=1') ->  select();
		$contactData = M('contact') ->where('edition=1') ->  select();
		$this->assign('contactDatb',$contactDatb);
		$this->assign('contactData',$contactData);
		$this->display("/zh/lxfs");
	}
	//加载联系我们页面
	function index_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$contactDatb = M('contact_add') ->where('edition=2') ->  select();
		$contactData = M('contact') ->where('edition=2') ->  select();
		$contactimg = M('contact_img') ->select();
		$this->assign('contactimg',$contactimg);
		$this->assign('contactDatb',$contactDatb);
		$this->assign('contactData',$contactData);
		$this->display("/en/lxfs_en");
	}
}





































