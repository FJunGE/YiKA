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
use Think\Model;
/**
 * 首页
 */
class CampusrecruitController extends HomebaseController {
	
	/**
	 * 校园招聘页信息
	 */
	public function campusrecruit(){

		$id = I("id");
		
		//查询条件zds
		$keywords= '%'.$_POST['keywords'].'%';
		$where['name|model|origin'] = array('like',$keywords);
		$map['object'] = 2;
		$map['state'] = 2;
		
		
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('recurit');
		$campusrecruitData = $m-> where($map) -> where($where) ->limit('5') ->order('time desc') ->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this -> assign('campusrecruitData',$campusrecruitData);
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$this -> assign('count',$count);
		$this -> assign('data',$data);
		$this -> assign('page',$show);// 赋值分页输出
		//end
		
		/**
		 * 加载添加产品页view
		 *
		 */
		//$recuritList = M('recurit') -> where('object=1 AND state=2') ->limit('10') ->order('createTime') ->select();//查询出为社会招聘的并且上架的，前十条语句，切根据时间倒叙排列
		//$this->assign("recuritList",$recuritList);
		$this->display("/zh/campusrecruit");
	}
	
	public function campusrecruit_en(){
		$id = I("id");
		
		//查询条件zds
		$keywords= '%'.$_POST['keywords'].'%';
		$where['name|model|origin'] = array('like',$keywords);
		$map['object'] = 2;
		$map['state'] = 2;
		
		
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('recurit');
		$campusrecruitData = $m-> where($map) -> where($where) ->limit('5') ->order('time desc') ->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this -> assign('campusrecruitData',$campusrecruitData);
		
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
		
		$this -> assign('count',$count);
		$this -> assign('data',$data);
		$this -> assign('page',$show);// 赋值分页输出
		//end
		
		/**
		 * 加载添加产品页view
		 *
		*/
		//$recuritList = M('recurit') -> where('object=1 AND state=2') ->limit('10') ->order('createTime') ->select();//查询出为社会招聘的并且上架的，前十条语句，切根据时间倒叙排列
		//$this->assign("recuritList",$recuritList);
		$this->display("/en/campusrecruit_en");
	}
	
}


