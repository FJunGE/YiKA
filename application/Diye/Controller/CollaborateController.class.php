<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class CollaborateController extends AdminbaseController{
	
	/**
	 *加载合作项目页view
	 * 
	 */
	function index(){
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('collaborate');
		$collaborateData = $m-> limit('15') ->order('createTime desc') ->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		
		$this -> assign('count',$count);
		$this -> assign('page',$show);// 赋值分页输出
		//end
		
		$this -> assign("collaborateData" ,$collaborateData);
		$this -> display();
	}
	
	/**
	 * 查看具体合作项目数据信息
	 */
	function check(){
		$id = I("id");
		
		$data = M("collaborate") -> where("id = $id") -> find();
		$cate = M("collaborate") -> where("id != $id") -> select();
		
		$collaborateCheck = M('collaborate') -> where("id = $id") -> select();
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> assign('collaborateCheck',$collaborateCheck);
		$this -> display();
		
	}
	/**
	 * 删除合作项目信息
	 */
	function delete(){
		/* $id = I("id");
		$res = M('collaborate') -> where("id = $id") -> delete();
		if($res){
			$this->success("合作信息删除成功");
		}else{
			$this->error("合作信息删除失败");
		} */
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if (M('collaborate') ->where("id=$id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if (M('collaborate') ->where("id in ($ids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	/**
	 *加载
	 *
	 */
}





































