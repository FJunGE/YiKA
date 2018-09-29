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

class InvestorController extends HomebaseController {
	

	//加载投资者信息财务页面
	function investor(){
		$moldZH = 1;//1是中文
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		
		//1.临时公告输出数据
		$cata = M('investor_xx')-> where('type = 1 AND state = 2 AND edition=1') -> order('time desc')-> limit('6') -> select();
		//echo  M('investor_xx') ->_sql();
		$this->assign("cata",$cata);
		
		//2.定期公示输出数据
		$catb = M('investor_xx')-> where('type = 2 AND state = 2 AND edition=1')-> order('time desc')-> limit('6') -> select();
		$this->assign('catb',$catb);
		
		//3.财务信息输出数据
		$catc = M('investor_xx')-> where('type = 3 AND state = 2 AND edition=1')-> order('time desc')-> limit('6') -> select();
		$this->assign('catc',$catc);
		
		//4.公司章程输出数据
		$catd = M('investor_xx')-> where('type = 4 AND state = 2 AND edition=1')-> order('time desc')-> limit('6') ->select();
		$this->assign('catd',$catd);
		
		$investorData = M('investor')->where("edition=$moldZH") -> select();
		$this->assign('investorData',$investorData);
		$this->display("/zh/investor");
	}
	
	//英文版
	function investor_en(){
		$moldEN = 2;//2是英文
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
	
		//1.临时公告输出数据
		$cata = M('investor_xx')-> where('type = 1 AND state = 2 AND edition=2') -> order('time desc')-> limit('6') -> select();
		$this->assign("catac",$catac);
	
		//2.定期公示输出数据
		$catb = M('investor_xx')->where('type = 2 AND state = 2 AND edition=2')-> order('time desc')-> limit('6') -> select();
		$this->assign('catb',$catb);
	
		//3.财务信息输出数据
		$catc = M('investor_xx')->where('type = 3 AND state = 2 AND edition=2')-> order('time desc')-> limit('6') -> select();
		$this->assign('catc',$catc);
	
		//4.公司章程输出数据
		$catd = M('investor_xx')->where('type = 4 AND state = 2 AND edition=2')-> order('time desc')-> limit('6') ->select();
		$this->assign('catd',$catd);
	
		$investorData = M('investor') ->where("edition=$moldEN") -> select();
		$this->assign('investorData',$investorData);
		$this->display("/en/investor_en");
	}
	
	//加载临时公告页面
	function  investorclass1(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$investorclass1 = M("investor_xx") ->where('type = 1 AND state = 2 AND edition=1') ->order('time desc')-> limit('15')  ->page($page.','.$pagesize) -> select();
		
		$count = M("investor_xx") ->where('state = 2') -> where('type = 1') ->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
		
		$this->assign("investorclass1",$investorclass1);
		$this->display("/zh/investorclass1");
		
	}
	
	//加载定期公示页面
	function  investorclass2(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
	
		$investorclass2 = M("investor_xx") ->where('type = 2 AND state = 2 AND edition=1') -> order('time desc')-> limit('15')  ->page($page.','.$pagesize) -> select();
	
		$count = M("investor_xx") ->where('state = 2') -> where('type = 2') ->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
	
		$this->assign("investorclass2",$investorclass2);
		$this->display("/zh/investorclass2");
	
	}
	
	//加载财务信息页面
	function  investorclass3(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
	
		$investorclass3 = M("investor_xx") ->where('type = 3 AND state = 2 AND edition=1') -> order('time desc')-> limit('15')  ->page($page.','.$pagesize) -> select();
	
		$count = M("investor_xx") ->where('state = 2') -> where('type = 3') ->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
	
		$this->assign("investorclass3",$investorclass3);
		$this->display("/zh/investorclass3");
	
	}
	
	//加载公司章程页面
	function  investorclass4(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
	
		$investorclass4 = M("investor_xx") ->where('type = 4 AND state = 2 AND edition=1') -> order('time desc')-> limit('15')  ->page($page.','.$pagesize) -> select();
	
		$count = M("investor_xx") ->where('state = 2') -> where('type = 4') ->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
	
		$this->assign("investorclass4",$investorclass4);
		$this->display("/zh/investorclass4");
	
	}
	//加载临时公告页面
	function  investorclass1_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
	
		$investorclass1 = M("investor_xx") ->where('type = 1 AND state = 2 AND edition=2') -> order('time desc')-> limit('15')  ->page($page.','.$pagesize) -> select();
	
		$count = M("investor_xx") ->where('type = 1 AND state = 2 AND edition=2') ->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
	
		$this->assign("investorclass1",$investorclass1);
		$this->display("/en/investorclass1_en");
	
	}
	
	//加载定期公示页面
	function  investorclass2_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
	
		$investorclass2 = M("investor_xx") ->where('type = 2 AND state = 2 AND edition=2') -> order('time desc')-> limit('15')  ->page($page.','.$pagesize) -> select();
	
		$count = M("investor_xx") ->where('type = 2 AND state = 2 AND edition=2') ->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
	
		$this->assign("investorclass2",$investorclass2);
		$this->display("/en/investorclass2_en");
	
	}
	
	//加载财务信息页面
	function  investorclass3_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
	
		$investorclass3 = M("investor_xx") ->where('type = 3 AND state = 2 AND edition=2') -> order('time desc')-> limit('15')  ->page($page.','.$pagesize) -> select();
	
		$count = M("investor_xx") ->where('type = 3 AND state = 2 AND edition=2') ->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
	
		$this->assign("investorclass3",$investorclass3);
		$this->display("/en/investorclass3_en");
	
	}
	
	//加载公司章程页面
	function  investorclass4_en(){
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
	
		$investorclass4 = M("investor_xx") ->where('type = 4 AND state = 2 AND edition=2') -> order('time desc')-> limit('15')  ->page($page.','.$pagesize) -> select();
	
		$count = M("investor_xx") ->where('type = 4 AND state = 2 AND edition=2') ->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
	
		$this->assign("investorclass4",$investorclass4);
		$this->display("/en/investorclass4_en");
	
	}
	
	//加载公共详细信息页面
	function investordetail1(){
		
		$id = I("id");

		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$id = I("id");
		$prodata = M("investor_xx") -> where("id = $id") -> find();
		
		//4.hits字段加一
		M("investor_xx")->where("id=$id")->setInc('hits');
		$this->assign("prodata",$prodata);
		$this->display("/zh/investordetail1");
	}
	
	//加载公共详细信息页面
	function investordetail2(){
	
		$id = I("id");
	
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
	
		$id = I("id");
		$prodata = M("investor_xx") -> where("id = $id") -> find();
	
		//4.hits字段加一
		M("investor_xx")->where("id=$id")->setInc('hits');
		$this->assign("prodata",$prodata);
		$this->display("/zh/investordetail2");
	}
	
	function investordetail3(){
	
		$id = I("id");
	
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
	
		$id = I("id");
		$prodata = M("investor_xx") -> where("id = $id") -> find();
	
		//4.hits字段加一
		M("investor_xx")->where("id=$id")->setInc('hits');
		$this->assign("prodata",$prodata);
		$this->display("/zh/investordetail3");
	}
	
	function investordetail4(){
	
		$id = I("id");
	
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
	
		$id = I("id");
		$prodata = M("investor_xx") -> where("id = $id") -> find();
	
		//4.hits字段加一
		M("investor_xx")->where("id=$id")->setInc('hits');
		$this->assign("prodata",$prodata);
		$this->display("/zh/investordetail4");
	}


	//加载公共详细信息页面
	function investordetail1_en(){
	
		$id = I("id");
	
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$id = I("id");
		$prodata = M("investor_xx") -> where("id = $id") -> find();
	
		//4.hits字段加一
		M("investor_xx")->where("id=$id")->setInc('hits');
		$this->assign("prodata",$prodata);
		$this->display("/en/investordetail1_en");
	}
	
	//加载公共详细信息页面
	function investordetail2_en(){
	
		$id = I("id");
	
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$id = I("id");
		$prodata = M("investor_xx") -> where("id = $id") -> find();
	
		//4.hits字段加一
		M("investor_xx")->where("id=$id")->setInc('hits');
		$this->assign("prodata",$prodata);
		$this->display("/en/investordetail2_en");
	}
	
	function investordetail3_en(){
	
		$id = I("id");
	
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$id = I("id");
		$prodata = M("investor_xx") -> where("id = $id") -> find();
	
		//4.hits字段加一
		M("investor_xx")->where("id=$id")->setInc('hits');
		$this->assign("prodata",$prodata);
		$this->display("/en/investordetail3_en");
	}
	
	function investordetail4_en(){
	
		$id = I("id");
	
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$id = I("id");
		$prodata = M("investor_xx") -> where("id = $id") -> find();
	
		//4.hits字段加一
		M("investor_xx")->where("id=$id")->setInc('hits');
		$this->assign("prodata",$prodata);
		$this->display("/en/investordetail4_en");
	}



































}