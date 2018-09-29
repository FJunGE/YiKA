<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController;


class InvestorxxController extends AdminbaseController{
	
	/**
	 *加载投资者信息财务公共栏view
	 * 
	 */
	function index(){
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('investor_xx');
		$investorData = $m->order('time desc')->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
		
		//产品分类信息
		/* $nav = M('product_nav') -> field("id,name") -> select();
		if( $nav != null ){
			$navdata = array();
			foreach( $nav as $val ){
				$navdata[$val[id]] = $val[name];
			}
		} */
		//end
		$this -> assign("investorData" ,$investorData);
		$this -> display();
	}
	
	
	/**
	 * 加载添加投资者信息财务公共栏view
	 */
	function add(){
		$investorNav = M("investor_xx") -> select();
		
		$this->assign("investorNav",$investorNav);
		$this-> display();
	}
	
	/**
	 * 保存数据至数据库
	 */
	function add_investor(){
		
		$data['title'] = $_POST['title'];//标题
		$data['content'] = $_POST['content'];//内容
		$data['createtime'] = Date("Y-m-d",time());//发布时间
		$data['time'] = Date("Y-m-d H:i:s",time());//后台准确时间
		$data['type'] = $_POST['type'];//对象
		$data['state'] = $_POST['state'];//状态
		$data['edition'] = 1;//发布版本一佳门窗现在发布中文版
		
		if(empty($_POST['type'])){
			$this->error("请选择发布信息对象");
		}else{
			$res = M("investor_xx") -> add($data);
			if( $res != null ){
				$this->success("信息添加成功！");
			}else{
				$this->error("信息添加失败，请稍后再试！");
			}
		}
	}
	
	
	/**
	 * 加载修改公告信息页view
	 */
	function edit(){
		$id = I("id");
		
		$data = M("investor_xx") -> where("id = $id") -> find();
		$cate = M("investor_xx") -> where("id != $id") -> select();
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
	}
	
	/**
	 *保存修改信息 
	 */
	function edit_investor(){
		//普通字段更新
		$id = I("id");
		$data['title'] = $_POST['title'];//标题
		$data['content'] = $_POST['content'];//内容
		$data['type'] = $_POST['type'];//对象
		$data['state'] = $_POST['state'];//状态
		$data['edition'] = 1;//发布版本
		
		$res = M("investor_xx") -> where("id = $id") -> data($data) -> save();
		
		if( $res !== false){
			$this->success("信息修改成功！");
		}else{
			$this->error("信息修改失败！");
		}
	}
	
	/**
	 * 删除职位
	 */
	function delete(){
		/* $id = I("id");
		$res = M('recurit') -> where("id = $id") -> delete();
		if($res){
			$this->success("职位删除成功");
		}else{
			$this->error("职位删除失败");
		} */
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if (M('investor_xx') ->where("id=$id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if (M('investor_xx') ->where("id in ($ids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
}

































