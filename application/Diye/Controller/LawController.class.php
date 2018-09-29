<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class LawController extends AdminbaseController{
	
	/***-
	 *加载法律声明与咨询view
	 * 
	 */
	function index(){
		$lawData1 = M('law') -> where("id in(1,2,3,4,5,6)") -> select();
		$this->assign('lawData1',$lawData1);
		
		$lawData2 = M('law') -> where("id in(7,8)") -> select();
		$this->assign('lawData2',$lawData2);
		
		$lawData3 = M('law') -> where("id in(9)") -> select();
		$this->assign('lawData3',$lawData3);
		
		$this -> display();
	}
	
	/**
	 * 修改法律声明与咨询数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("law") -> where("id = $id") -> find();
		$cate = M("law") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function editl(){
		$id = I("id");
		
		$data = M("law") -> where("id = $id") -> find();
		$cate = M("law") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_law(){
		
			//普通字段更新
			$id = I("id");
			$data['title'] = $_POST['title'];//标题
			$data['email'] = $_POST['email'];//内容
			$data['state'] = $_POST['state'];//内容
			$data['content'] = $_POST['content'];//内容
			
			$res = M("law") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if (M('law') ->where("id=$id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if (M('law') ->where("id in ($ids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
}





































