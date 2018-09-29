<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 应用市场
 * @author MR_PC
 * 2016/8/6
 */
class AppMarkController extends HomebaseController {
	
	/**
	 * index
	 */
	function index(){
		$id = I('id');
		
		//1、取得数据
		$appmarkl = M('appmark') -> find();
		
		//2、取得该应用市场下的产品
		$productdata = M('product') ->
		 table('dy_appmark da,dy_product_mark_relationship dpmr,dy_product dp') ->
		 where('da.markid = dpmr.mark_id and dpmr.product_id = dp.id') -> 
		 field("features,name,dp.id") -> 
		 select();
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);

		$this -> assign("appmarkl",$appmarkl);
		$this -> assign("productdata",$productdata);
		$this -> display('/zh/market');
	}
	
}


