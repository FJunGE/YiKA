<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class StatementController extends AdminbaseController{
	
	/**
	 * 供应商行为指南
	 */
	function index(){
		$guideData = M('bidding') ->where("id=3")->select();
	
		$this -> assign("guideData" ,$guideData);
		$this -> display();
	}
	
	/**
	 * 修改为什么加入我们数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("bidding") -> where("id = $id") -> find();
		$cate = M("bidding") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_guide(){
		
			//普通字段更新
			$id = I("id");
			$data['content'] = $_POST['content'];//为什么加入我们页内容
			
			$res = M("bidding") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
}





































