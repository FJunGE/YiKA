<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class ProfessionalController extends AdminbaseController{
	
	/***-
	 *加载专业人士view
	 * 
	 */
	function index(){

		$m = M('professional');
		$profData = $m ->page($page.','.$pagesize)->select();
	
		$this -> assign("profData" ,$profData);
		$this -> display();
	}
	
	/**
	 * 查看专业人士数据信息
	 */
	function displays(){
		$id = I("id");
		$data = M("professional") ->where("id = $id")->select();
		
		$this->assign("data",$data);
		$this->display();
	}
	/**
	 * 修改专业人士数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("professional") -> where("id = $id") -> find();
		$cate = M("professional") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_professional(){
		
			//普通字段更新
			$id = I("id");
			$data['email'] = $_POST['email'];//邮箱
			$data['content'] = $_POST['content'];//内容
			
			$res = M("professional") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
}





































