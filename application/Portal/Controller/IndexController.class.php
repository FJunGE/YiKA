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
/**
 * 首页
 */
class IndexController extends HomebaseController {
	
    //首页
	public function index() {
	    ini_set("memory_limit","-1");
		//发布条件
		$moldZH=1;//1是中文
		
		//社会招聘条件
		$map['object'] = 1;
		$map['state'] = 2;
		//校园招聘条件
		$mapl['object'] = 2;
		$mapl['state'] = 2;
		
		//最新资讯数据
		$information = M('posts')->where("edition=$moldZH") -> limit("8") -> order('post_date desc') -> select();
		//最新招聘信息
		$newRecurit = M('recurit') -> where($map)-> limit('5') -> order('time desc') -> select();
		$newCampusrecruit = M('recurit') -> where($mapl)-> limit('5') -> order('time desc') -> select();
		//公司简介
		$companyDate = M('company')->where("company_mold =$moldZH") -> select();
		//获取首页轮播图片信息
		$picdata = M('picture')->where("edition = $moldZH")-> table("dy_posts dp,dy_picture pic") -> where("pic.postid = dp.id")-> select();
		//发展历史
		$histdata = M('history')->where("edition = $moldZH") -> limit('4') -> order('year desc') -> select();
		//产品
        $products = M('product')->field('name,features,id,picpath')->where("state = 2") -> order('createTime desc') ->limit('9') -> select();
        $regex = "/\ |\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\、|\一|\二|\●|\�|\.|\/|\;|\'|\`|\-|\=|\\\|\|/";
        foreach ($products as $key => $val){
            $products[$key]['features'] = preg_replace($regex,"",substr(strip_tags($val['features']),0,120));
        }

		foreach ($information as $key => $val){
			//定义个P函数，对smeta数据
			$p = json_decode($val['smeta'],true);
			$smetas[$key] = "data/upload/" . $p['thumb'];
				
		}
		foreach ( $smetas as $key => $val ){
			//强行将数据库中的“smeta”数据转化成路径格式
			$information[$key]['smeta'] = $val;
			
		}
		$funds = M('funds')->where("edition=$moldZH") -> select();
		$this->assign("funds",$funds);

		$this -> assign("information",$information);
		$this -> assign("product",$products);
		$this -> assign("newRecurit",$newRecurit);
		$this -> assign("newCampusrecruit",$newCampusrecruit);
		$this -> assign("companyDate",$companyDate);
		$this -> assign("histdata",$histdata);
		$this -> assign("picdata", $picdata);
		
		//交互传给index.php模块当中
    	$this -> display("/zh/index");
    }
    
    //产品中心页
    public function product(){
    	//产品导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//产品导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
    	
    	//产品分类数据
    	$nav = M('product_nav') -> select();
    	
    	//产品信息数据
    	$productData = M('product') -> limit("15") -> select();
    	
    	$this -> assign("productData",$productData);
    	$this -> assign("nav",$nav);
    	$this -> display("/zh/product");
    }
    
    //新闻中心页
	public function news(){
		//产品导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//产品导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$moldZH['edition']=1;//1是中文
		$moldEN['edition']=2;//2是英文
		
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "8";
		
		$m = M('posts');
		$newList = $m->where($moldZH)->order('post_date desc') ->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		
		//新闻标题
		$newClick = $m->where($moldZH)-> limit('8') ->order('post_hits desc') ->select();
		foreach ($newList as $key => $val){
			$p = json_decode($val['smeta'],true);
			$a[$key] = "data/upload/" . $p['thumb'];
		}
		
		foreach ($a as $key => $val){
			$newList[$key]['smeta'] = $val;
		}

		$this -> assign('page',$show);// 赋值分页输出
		$this -> assign("newList",$newList);
		$this -> assign("newClick",$newClick);
		$this -> display("/zh/news");
		
	}
	
    //英文版
    function index_en(){
    	//发布条件
    	$moldEN=2;//2是英文
    	//社会招聘条件
    	$map['object'] = 1;
    	$map['state'] = 2;
    	//校园招聘条件
    	$mapl['object'] = 2;
    	$mapl['state'] = 2;
    	
    	//最新资讯数据
    	$information = M('posts')->where("edition=$moldEN") -> limit("8") -> order('post_date desc') -> select();
    	//最新招聘信息
    	$newRecurit = M('recurit') -> where($map)-> limit('5') -> order('time desc') -> select();
    	$newCampusrecruit = M('recurit') -> where($mapl)-> limit('5') -> order('time desc') -> select();
    	//公司简介
    	$companyDate = M('company')->where("company_mold = $moldEN") -> select();
    	//获取首页轮播图片信息
    	$picdata = M('picture')->where("edition = $moldEN")-> table("dy_posts dp,dy_picture pic") -> where("pic.postid = dp.id")-> select();
    	//发展历史
    	$histdata = M('history')->where("edition = $moldEN") -> limit('2') -> order('year desc') -> select();
    	//行业解决方案
    	$plandata = M('plan') -> where('state = 1')  ->where('edition=2')-> limit("8") -> order('id desc') -> select();
    	//账号信息查询
    	$cate = M('users') -> select();
    	$this->assign("plandata",$plandata);
    	
    	foreach ($information as $key => $val){
    		//定义个P函数，对smeta数据
    		$p = json_decode($val['smeta'],true);
    		// 			echo($p['thumb']);
    		$smetas[$key] = "data/upload/" . $p['thumb'];
    	
    	}
    	foreach ( $smetas as $key => $val ){
    		//强行将数据库中的“smeta”数据转化成路径格式
    		$information[$key]['smeta'] = $val;
    			
    	}
    	
    	$funds = M('funds')->where("edition=$moldEN") -> select();
    	$this->assign("funds",$funds);
    	
    	//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
    	//定义个“information”传值给$information
    	$this -> assign("information",$information);
    	$this -> assign("newRecurit",$newRecurit);
    	$this -> assign("newCampusrecruit",$newCampusrecruit);
    	$this -> assign("companyDate",$companyDate);
    	$this -> assign("histdata",$histdata);
    	$this -> assign("picdata", $picdata);
    	$this -> assign("cate", $cate);
    	
    	//交互传给index.php模块当中
    	$this -> display("/en/index_en");
    }
    
    function  news_en(){
    	//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
    	
    	$moldZH['edition']=1;//1是中文
		$moldEN['edition']=2;//2是英文
    	
//     	1.分页
    	$page = $_GET['p'] != null ? $_GET['p'] : "0";
    	$pagesize = "8";

    	$m = M('posts');
    	$newList = $m->where($moldEN)->order('post_date desc') ->page($page.','.$pagesize)->select();
    	
    	$count = $m->count();// 查询满足要求的总记录数
    	$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
    	$show = $Page->show();// 分页显示输出
    	
    	//新闻标题
    	$newClick = $m->where($moldEN)-> limit('8') ->order('post_hits desc') ->select();
    	foreach ($newList as $key => $val){
    		$p = json_decode($val['smeta'],true);
    		$a[$key] = "data/upload/" . $p['thumb'];
    	}
    	
    	foreach ($a as $key => $val){
    		$newList[$key]['smeta'] = $val;
    	}
    	
    	$this -> assign('page',$show);// 赋值分页输出
    	$this -> assign("newList",$newList);
    	$this -> assign("newClick",$newClick);
    	$this -> display("/en/news_en");
    }
    
    //退出登录
	public function logout(){
		session('[destroy]');
		$this->redirect('Index/index');
	}
	
	
}


