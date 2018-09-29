<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class VisitorController extends AdminbaseController{
	
	/**
	 *加载媒体联系页view
	 * 
	 */
	function index(){
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('visitor');
		$visitorData = $m-> limit('15') ->order('createTime desc') ->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		
		$this -> assign('count',$count);
		$this -> assign('page',$show);// 赋值分页输出
		//end
		
		$this -> assign("visitorData" ,$visitorData);
		$this -> display();
	}
	
	/**
	 * 查看具体采访者数据信息
	 */
	function check(){
		$id = I("id");
		
		$data = M("visitor") -> where("id = $id") -> find();
		$cate = M("visitor") -> where("id != $id") -> select();
		
		$visitorCheck = M('visitor') -> where("id = $id") -> select();
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> assign('visitorCheck',$visitorCheck);
		$this -> display();
		
	}
	/**
	 * 删除媒体联系信息
	 */
	function delete(){
		/* $id = I("id");
		$res = M('visitor') -> where("id = $id") -> delete();
		if($res){
			$this->success("媒体信息删除成功");
		}else{
			$this->error("媒体信息删除失败");
		} */
		
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if (M('visitor') ->where("id=$id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if (M('visitor') ->where("id in ($ids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
}





































