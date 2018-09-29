<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class JoindiyeController extends AdminbaseController{
	
	/***-
	 *加载为什么加入我们view
	 * 
	 */
	function index(){

		$m = M('joindiye');
		$joindiyeData = $m ->page($page.','.$pagesize)->select();
	
		$this -> assign("joindiyeData" ,$joindiyeData);
		$this -> display();
	}
	
	/**
	 *输出显示帝业理念范文页view
	 *
	 */
	function displays(){
		$id = I("id");
		$data = M("joindiye") -> where("id = $id") ->select();
			
		$this -> assign("data",$data);
		$this -> display();
	}
	
	/**
	 * 修改为什么加入我们数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("joindiye") -> where("id = $id") -> find();
		$cate = M("joindiye") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_joindiye(){
		
			//普通字段更新
			$id = I("id");
			$data['title'] = $_POST['title'];//为什么加入我们页标题
			$data['content'] = $_POST['content'];//为什么加入我们页内容
			
			$res = M("joindiye") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
}





































