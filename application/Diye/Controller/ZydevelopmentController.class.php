<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class ZydevelopmentController extends AdminbaseController{
	
	/***-
	 *加载职业发展view
	 * 
	 */
	function index(){
		
		$m = M('zydevelopment');
		$zydeveData = $m -> select();
		
		$this -> assign("zydeveData" ,$zydeveData);
		$this -> display();
	}
	
	/**
	 * 修职业发展页面内容
	 */
	function edit(){
		$id = I("id");
		
		$data = M("zydevelopment") -> where("id = $id") -> find();
		$cate = M("zydevelopment") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	
	function edit_zydevelopment(){
		
			//普通字段更新
			$id = I("id");
			$data['title'] = $_POST['title'];//标题
			$data['content'] = $_POST['content'];//内容
			
			$res = M("zydevelopment") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
}





































