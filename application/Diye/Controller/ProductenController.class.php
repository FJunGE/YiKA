<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController;


class ProductenController extends AdminbaseController{
	
	/**
	 *首页
	 */
	function index(){
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		$m = M('plan');
		
		$count = $m->where("edition = 2")->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
		
		//取得展会数据
		$plan = M("plan")->where("edition = 2") -> order('createdtime desc') -> page($page.','.$pagesize)-> select();
		
		
		$this -> assign("plan",$plan);
		$this -> display();
	}
	
	/**
	 * 添加
	 */
	function add(){
		
		$prodata = M('product')->where("edition = 2") -> where("state = 2") -> select();
		
		$this -> assign("prodata",$prodata);
		$this -> display();
	}
	
	/**
	 * 保存数据
	 */
	function add_plan(){
		$op = I("op");
		
		$config = array(
				'maxSize'    =>    0,
				'savePath'   =>    'upload/plan/',
				'rootPath'   =>    'data/',
				'replace'    =>    'true',
				'exts'       =>    array('jpg', 'gif', 'png', 'jpeg','rar','zip'),
				'autoSub'    =>    false,
				'saveName'    =>    array('uniqid',''),
				'subName'    =>    array('date','Ymd'),
		);
		
		$upload = new \Think\Upload($config);
		$info   =   $upload->upload();
		
		if( $info['pic'] != null ){
			$data['picpath'] = $info["pic"]['savepath'] . $info["pic"]['savename'];
		}
		
		if( $info['planfile'] != null ){
			$data['filepath'] = $info["planfile"]['savepath'] . $info["planfile"]['savename'];
		}
		
		$data['title'] = $_POST['title'];
		$data['state'] = $_POST['state'];
		$data['plan_content'] = $_POST['plan_content'];
		$data['pro_content'] = $_POST['pro_content'];
		$data['edition'] = 2;		
		//1、保存解决方案信息
		if( $op == "edit" ){
			$data['id'] = I('id');
			M("plan") -> save($data);
			$res = $data['id'];
			
		}else{
			$data['createdtime'] = Date("Y-m-d H:i:s",time());
			$res = M('plan') -> add($data);
		}
		
		//2、保存关联的产品
		if( $res != null ){
			if( $op == "edit" && $_POST['proid'] != null ){
				M('plan_relation_product') -> where("plan_id = $res") -> delete();
			}
			foreach ( $_POST['proid'] as $proid ){
				$plan_pro['plan_id'] = $res;
				$plan_pro['pro_id'] = $proid;
				M('plan_relation_product') -> add($plan_pro);
			}
		}
		
		$this -> success();
	}
	
	/**
	 * 删除
	 */
	function del(){
		$id = I("id");
		
		$plan = M('plan') -> where("id = $id") -> find();
		
		//1、删除表plan中的记录，删除表dy_plan_relation_product中的记录
		M('plan') -> where("id = $id") -> delete();
		M('plan_relation_product') -> where("id = $id") -> delete();
		
		//2、删除图片文件
		unlink(unlink("data/" . $plan['picpath']));
		
		//3、删除附件文件
		unlink(unlink("data/" . $plan['filepath']));
		
		$this->success();
	}
	
	/**
	 * 修改
	 */
	function edit(){
		$id = I('id');
		
		//1、取得解决方案数据
		$plan = M('plan') -> where("id = $id") -> find();
		
		//2、产品数据
		$prodata = M('product') -> where("state = 2") -> select();
		
		//3、关联的产品数据
		$data = M('plan_relation_product') -> where("plan_id = $id") -> select();
		if( $data != null ){
			$cdata = array();
			foreach( $data as $val ){
				$cdata[$val['pro_id']] = "aa";
			}
		}
// 		echo "<pre>";
// 		var_dump($cdata);
// 		exit;
		
		$this -> assign("cdata",$cdata);
		$this -> assign("prodata",$prodata);
		$this -> assign("plan",$plan);
		$this -> display();
		
	}
	
	/**
	 * 批量删除
	 */
	function deleteCheck(){

		$ids = I('ids');
		if( !empty($ids) ){
			foreach ($ids as $id){
				$plan = M('plan') -> where("id = $id") -> find();
				
				//1、删除表plan中的记录
				M('plan') -> where("id = $id") -> delete();
				
				//2、删除图片文件
				unlink(unlink("data/" . $plan['picpath']));
				
				//3、删除附件文件
				unlink(unlink("data/" . $plan['filepath']));
				
			}
			$this -> success();
		}else{
			$this -> error();
		}
	}
}





























