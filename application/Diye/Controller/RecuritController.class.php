<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController;


class RecuritController extends AdminbaseController{
	
	/**
	 *加载职位管理首页view
	 * 
	 */
	function index(){
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('recurit');
		$recuritData = $m->order('time desc')->page($page.','.$pagesize)->select();
		
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
		$this -> assign("recuritData" ,$recuritData);
		$this -> display();
	}
	
	
	/**
	 * 加载添加职位页view
	 */
	function add(){
		$recruitNav = M("recurit") -> select();
		
		$this->assign("recruitNav",$recruitNav);
		$this-> display();
	}
	
	/**
	 * 保存职位数据至数据库
	 */
	function add_recurit(){
		
		$data['name'] = $_POST['recruit_name'];//职位名称     I('product_name');
		$data['responsibilities'] = $_POST['responsibilities'];//岗位职责
		$data['require'] = $_POST['require'];//岗位要求
		$data['createTime'] = Date("Y-m-d",time());//发布职位时间
		$data['time'] = Date("Y-m-d H:i:s",time());//获取后台时间

		$data['object'] = $_POST['object'];//招聘对象
		$data['state'] = $_POST['state'];//职位状态
		$data['model'] = $_POST['model'];//职位类别
		$data['origin'] = $_POST['origin'];//工作地点
		$data['pay'] = $_POST['pay'];//职位薪资
		$data['needs'] = $_POST['needs'];//岗位需求人数
		$data['uploader'] = session('name');//产品上传者      从session中获取

		
		
		if(empty($_POST['object'])){
			$this->error("请选择岗位招聘对象");
		}else{
			$res = M("recurit") -> add($data);
			if( $res != null ){
				$temp = array();
				$temp['recurit_id'] = $res;
				$this->success("职位添加成功！");
			}else{
				$this->error("职位添加失败，请稍后再试！");
			}
		}
	}
	
	
	/**
	 * 加载修改职位页面view
	 */
	function edit(){
		$id = I("id");
		
		$data = M("recurit") -> where("id = $id") -> find();
		$cate = M("recurit") -> where("id != $id") -> select();
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
	}
	
	/**
	 *保存修改信息 
	 */
	function edit_recurit(){
		//普通字段更新
		$id = I("id");
		$data['name'] = $_POST['recruit_name'];//职位名称     I('product_name');
		$data['responsibilities'] = $_POST['responsibilities'];//岗位职责
		$data['require'] = $_POST['require'];//岗位要求
		$data['object'] = $_POST['object'];//招聘对象分类
		$data['state'] = $_POST['state'];//产品状态
		$data['model'] = $_POST['model'];//型号
		$data['origin'] = $_POST['origin'];//工作地点
		$data['pay'] = $_POST['pay'];//职位薪资
		$data['needs'] = $_POST['needs'];//岗位需求人数
		
		$res = M("recurit") -> where("id = $id") -> data($data) -> save();
		
		if( $res !== false){
			$this->success("职位修改成功！");
		}else{
			$this->error("职位修改失败！");
		}
	}
	/**
	 *查看简历信息
	 */
	function check(){
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$id = I("id");
		$data = M("opinion") -> where("id = $id") -> find();
		$cate = M("opinion") -> where("id != $id") -> select();
		
		$check = M("recurit_upl") -> where("recurit_id = $id") -> order('time desc')-> page($page.','.$pagesize) ->select();
		$checkl = M("recurit") -> where("id = $id") ->select();
		
		$count = M("recurit_upl")->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
		
		$this->assign("check",$check);
		$this->assign("checkl",$checkl);
		$this->display();
		
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
			if (M('recurit') ->where("id=$id")->delete()) {
				if(M('recurit_upl') ->where("recurit_id=$id")->delete()){
					$this->success("删除成功！");
				}
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if (M('recurit') ->where("id in ($ids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
}





































