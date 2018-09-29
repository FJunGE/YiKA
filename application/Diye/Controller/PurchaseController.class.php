<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class PurchaseController extends AdminbaseController{
	
	
	/**
	 *加载合作项目页view
	 * 
	 */
	function index(){
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('purchase');
		$purchaseData = $m-> limit('15') ->order('createTime desc') ->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		
		$this -> assign('count',$count);
		$this -> assign('page',$show);// 赋值分页输出
		//end
		
		$this -> assign("purchaseData" ,$purchaseData);
		$this -> display();
	}
	
	function index1(){
		
		$m = M('purchase1');
		$purchaseData1 = $m-> limit('15')->select();
		//end
	
		$this -> assign("purchaseData1" ,$purchaseData1);
		$this -> display();
	}
	
	/**
	 * 修改../Public/diye/css/范文
	 */
	function edit(){
		$id = I("id");
	
		$data = M("purchase1") -> where("id = $id") -> find();
		$cate = M("purchase1") -> where("id != $id") -> select();
	
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
	
	}
	
	function edit_pur(){
		$id = I("id");
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		$data['introduce'] = $_POST['introduce'];

		$res = M('purchase1') ->where("id=$id") ->data($data) ->save();
		if($res !== false){
			$this -> success("修改信息成功");
		}else{
			$this->error("修改信息失败");
		}
	}
	
	/**
	 * 查看具体合作项目数据信息
	 */
	function check(){
		$id = I("id");
		
		$data = M("purchase") -> where("id = $id") -> find();
		$cate = M("purchase") -> where("id != $id") -> select();
		
		$purchaseCheck = M('purchase') -> where("id = $id") -> select();
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> assign('purchaseCheck',$purchaseCheck);
		$this -> display();
		
	}
	/**
	 * 删除合作项目信息
	 */
	function delete(){
		/* $id = I("id");
		$res = M('purchase') -> where("id = $id") -> delete();
		if($res){
			$this->success("供应商信息删除成功");
		}else{
			$this->error("供应商信息删除失败");
		}
	 */
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if (M('purchase') ->where("id=$id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if (M('purchase') ->where("id in ($ids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
	}
}




































