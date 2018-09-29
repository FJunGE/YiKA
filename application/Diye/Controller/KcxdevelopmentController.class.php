<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class KcxdevelopmentController extends AdminbaseController{
	
	/**
	 *加载可持续发展页view
	 * 
	 */
	function index(){
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";

		$m = M('kcxdevelopment');
		$kcxdeveData = $m ->order('createtime desc')->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
	
		$this -> assign("kcxdeveData" ,$kcxdeveData);
		$this -> display();
	}
	
	/**
	 * 加载添加可持续发展数据信息
	 */
	function add(){
		$productNav = M("kcxdevelopment") -> select();
		
		$this->assign("productNav",$productNav);
		$this -> display();
	}
	function add_kcxdeve(){
		//缩略图上传
		$config = array(
				'maxSize'	=>		0,
				'savePath'	=>		'upload/kcxdesclopment/',
				'rootPath'	=>		'data/',
				'replace'	=>		'true',
				'exts'		=>		array('jpg','gif','png','jpeg'),
				'autoSub'	=>		false,
				'saveName'	=>		array('uniqid',''),
				'subName'	=>		array('date','Ymd'),
		);
		$upload = new \Think\Upload($config);
		$info	=	$upload->upload();
			
		//图片上传
		if($info['file'] !=null ){
			$data['file'] = $info["file"]['savepath'] . $info["file"]['savename'];
		}
		

		$id = I("id");
		$data['title'] = $_POST['title'];//标题
		$data['content'] = $_POST['content'];//内容
		$data['createtime'] = date("Y-m-d H:i:s",time());//创建时间
		$data['edition'] = 1;//目前一佳门窗只有中文版
		
		$res = M("kcxdevelopment") -> add($data);
		if( $res != null ){
			$temp = array();
			$temp['recurit_id'] = $res;
			$this->success("添加成功！");
		}else{
			$this->error("添加失败，请稍后再试！");
		}
	}
	/**
	 * 修改可持续发展数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("kcxdevelopment") -> where("id = $id") -> find();
		$cate = M("kcxdevelopment") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_kcxdeve(){
			//缩略图上传
			$config = array(
					'maxSize'	=>		0,
					'savePath'	=>		'upload/kcxdesclopment/',
					'rootPath'	=>		'data/',
					'replace'	=>		'true',
					'exts'		=>		array('jpg','gif','png','jpeg'),
					'autoSub'	=>		false,
					'saveName'	=>		array('uniqid',''),
					'subName'	=>		array('date','Ymd'),	
			);
			$upload = new \Think\Upload($config);
			$info	=	$upload->upload();
			
			//图片上传
			if($info['file'] !=null ){
				$data['file'] = $info["file"]['savepath'] . $info["file"]['savename'];
			}
			
			//普通字段更新
			$id = I("id");
			$data['title'] = $_POST['title'];//标题
			$data['content'] = $_POST['content'];//内容
			$data['createtime'] = date("Y-m-d H:i:s",time());//创建时间
			$data['edition'] = 1;//目前一佳门窗只有中文版
			
			$res = M("kcxdevelopment") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$temp = array();
				$temp['recurit_id'] = $res;
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
	/**
	 * 删除信息
	 */
	function delete(){
	if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if (M('kcxdevelopment') ->where("id=$id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if (M('kcxdevelopment') ->where("id in ($ids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
}





































