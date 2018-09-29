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

class IdeaController extends HomebaseController {
	

	//帝业理念详情页
	function idea(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		//行业解决方案头部
		$plandata = M('plan') -> where('state = 1') -> select();
		$this->assign("plandata",$plandata);
		
		$ideaData = M("idea")->where("idea_mold = 1") -> select();
		$this->assign('ideaData',$ideaData);
		$this->display("/zh/dyln");
	}
	//英文版
	function idea_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
		
		$ideaData = M('Idea')->where("idea_mold = 2") -> select();
		$this->assign('ideaData',$ideaData);
		$this->display("/en/dyln_en");
	}
}





































