<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class HistoryController extends AdminbaseController{
	
	/***-
	 *加载发展历史view
	 * 
	 */
	function index(){
		
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('history');
		$historyData = $m->order('year desc')->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this -> assign('page',$show);// 赋值分页输出
		
		$this -> assign("historyData" ,$historyData);
		$this -> display();
	}
	
	/**
	 * 加载添加历史信息view
	 */
	function add(){
		$historyAdd = M("history") -> select();
	
		$this->assign("historyAdd",$historyAdd);
		$this-> display();
	}
	
	/**
	 * 保存数据至数据库
	 */
	function add_history(){
	
		$data['year'] = $_POST['year'];//历史年份
		$data['content'] = $_POST['content'];//对应年份发生的事情
		$data['edition'] = $_POST['edition'];//发布版本
		$data['createtime'] = Date("Y-m-d H:i:s",time());//获取后台时间
		
		
		if(empty($_POST['year'])){
			$this->error("请输入发展历史年份");
		}else if(empty($_POST['content'])){
			$this->error("请输入发展该年份发生的历史事件");
		}else{
			$res = M("history") -> add($data);
			if( $res != null ){
				$this->success("添加成功！");
			}else{
				$this->error("添加失败，请稍后再试！");
			}
		}
	}
	
	/**
	 * 修改发展历史数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("history") -> where("id = $id") -> find();
		$cate = M("history") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_history(){
		
			//普通字段更新
			$id = I("id");
			$data['year'] = $_POST['year'];//历史年份
			$data['content'] = $_POST['content'];//对应年份发生的事情
			$data['createtime'] = Date("Y-m-d",time());//创建事件时间
			$data['edition'] = $_POST['edition'];//发布版本
			
			$res = M("history") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if (M('history') ->where("id=$id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if (M('history') ->where("id in ($ids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
}





































