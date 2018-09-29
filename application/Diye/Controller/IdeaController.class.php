<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class IdeaController extends AdminbaseController{
	
	/**
	 *加载帝业理念范文页view
	 * 
	 */
	function index(){
		
		$m = M('idea');
		$ideaData = $m ->select();
		
		$this -> assign("ideaData" ,$ideaData);
		$this -> display();
	}
	
	/**
	 *输出显示帝业理念范文页view
	 *
	 */
	function displays(){
		$id = I("id");
		$data = M("idea")->where("id=$id") ->find();
		$this->assign("data",$data);
		$this->display();
	}
	/**
	 * 修改帝业理念信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("idea") -> where("id = $id") -> find();
		$cate = M("idea") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_idea(){
		
			//普通字段更新
			$id = I("id");
			$data['content'] = $_POST['content'];//帝业理念范文修改
			
			$res = M("idea") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
}





































