<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class FundsController extends AdminbaseController{
	
	/***-
	 *加载投资基金内容信息view
	 * 
	 */
	function index(){

		$m = M('funds');
		$fundsData = $m ->select();
	
		$this -> assign("fundsData" ,$fundsData);
		$this -> display();
	}
	/**
	 *输出显示页view
	 *
	 */
	function displays(){
		$id = I("id");
		$fundsData = M("funds") -> where("id = $id") ->select();
			
		$this -> assign("fundsData",$fundsData);
		$this -> display();
	}
	/**
	 * 修改投资基金数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("funds") -> where("id = $id") -> find();
		$cate = M("funds") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_funds(){
		
			//普通字段更新
			$id = I("id");
			$data['email'] = $_POST['email'];//投资基金联系邮箱
			$data['content'] = $_POST['content'];//投资基金内存
			$data['introduce'] = $_POST['introduce'];//投资基金简介
			
			$res = M("funds") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
}





































