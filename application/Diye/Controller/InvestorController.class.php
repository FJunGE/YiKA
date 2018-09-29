<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class InvestorController extends AdminbaseController{
	
	/**
	 *加载投资者信息财务页view
	 * 
	 */
	function index(){

		$m = M('investor');
		$investorData = $m->select();
	
		$this -> assign("investorData" ,$investorData);
		$this -> display();
	}
	/**
	 *加载投资者信息财务页view
	 *
	 */
	function displays(){
		$id = I('id');
		$investorData = M("investor") ->where("id = $id") ->select();
		
		$this->assign("investorData",$investorData);
		$this->display();
	}
	/**
	 * 修改投资者页数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("investor") -> where("id = $id") -> find();
		$cate = M("investor") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_investor(){
		
			//普通字段更新
			$id = I("id");
			$data['title'] = $_POST['title'];//投资者信息页标题
			$data['content'] = $_POST['content'];//投资者信息页内容
			$data['email'] = $_POST['email'];//联系邮箱
			
			$res = M("investor") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
}





































