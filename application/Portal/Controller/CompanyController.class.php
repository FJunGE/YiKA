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

class CompanyController extends HomebaseController {
	

	//公司介绍页_中文版
	function company(){
		//发布条件
		$moldZH=1;//1是中文
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		//行业解决方案头部
		$plandata = M('plan') -> where('state = 1') -> select();
		$this->assign("plandata",$plandata);
		
		$companyData = M("company")->where("company_mold = $moldZH") -> select();
		$this->assign('companyData',$companyData);
		$this->display("/zh/company");
	}
	
	//公司介绍页_英文版
	function company_en(){
		//发布条件
		$moldEN=2;//2是英文
		
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
		
		$companyData = M("company")->where("company_mold = $moldEN") -> select();
		$this->assign('companyData',$companyData);
		$this->display("/en/company_en");
	}
	
}





































