<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 首页
 */
class ExpoController extends HomebaseController {
	
	function index(){
		
		//1，获取近期展会信息
		$jqexpo = M('expo') -> limit("3") -> order("createdtime desc") -> where("state = 1") -> select();
		
		//2、获取往期展会信息
		$wqexpo = M('expo') -> limit('3,6') -> order("createdtime desc") -> where("state = 1") -> select();
		
		//3、更多展会信息
		$moreexpo = M('expo') -> limit('9,100000') -> order("createdtime desc") -> where("state = 1") -> select();
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$this->assign("moreexpo",$moreexpo);
		$this->assign("wqexpo",$wqexpo);
		$this->assign("jqexpo",$jqexpo);
		$this->display("/zh/zhyfb");
	}
	
	function detail(){
		$id = I('id');
		
		//1、获取 展会基本信息
		$expo = M('expo') -> where("id = $id") -> find();
		
		//2、获取展会新闻信息
		$news = M('posts') -> table("dy_posts dp, dy_expo_relation_news de") ->
				where("de.expo_id = $id and de.news_id = dp.id") ->
				field("dp.post_title,dp.id") -> 
				select();
		
		//3、获取展会展台图片
		$picdata = M('expo_relation_pic') -> where("expo_id = $id") -> select();
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		
		$this->assign("picdata",$picdata);
		$this->assign("news",$news);
		$this->assign("expo",$expo);
		$this -> display("/zh/zhyfbxx");
	}
}


