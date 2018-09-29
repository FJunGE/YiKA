<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController;


class MarkController extends AdminbaseController{
	
	/**
	 * 加载产品分类首页
	 */
	function index(){
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('mark');
		$data = $m->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
		
		$this -> assign("data",$data);
		$this -> display();
	}
	
	/**
	 * 加载添加产品分类view
	*/
	function add(){
		$data = M('mark') -> select();
		
		$this -> assign("data",$data);
		$this -> display();
	}
	
	/**
	 * 保存产品分类
	 */
	function add_post(){
		$data['name'] = $_POST['name'];
		$data['description'] = $_POST['description'];
		$res = M('mark') -> add($data);
		if( $res ){
			$this -> success("添加成功");
		}else {
			$this -> error("添加失败");
		}
	}
	
	/**
	 * 删除分类
	 */
	function delete(){
		$id = I("id");
		
		$pmr = M('product_mark_relationship') -> where("mark_id = $id" ) -> find();
		if( $pmr ){
			$this -> error("该分类下有产品，不可删除");
		}
		
		$res = M('mark') -> where("id = $id" ) -> delete();
		if( $res ){
			$this -> success("删除成功");
		}else {
			$this -> error("删除失败");
		}
	}
	
	/**
	 * 修改分类view
	 */
	function edit(){
		$id = I("id");
		$data = M('mark') -> where("id = $id" ) -> find();
		
		$this -> assign("data",$data);
		$this -> display();
	}
	
	/**
	 * 保存修改的信息
	 */
	function edit_post(){
		$id = $_POST['id'];
		$data['parent_id'] = $_POST['parent'];
		$data['name'] = $_POST['name'];
		$data['description'] = $_POST['description'];
		
		$res = M('mark') -> where("id = $id" ) -> save($data);
		if( $res ){
			$this -> success("修改成功");
		}else {
			$this -> error("修改失败");
		}
	}
	
	/**
	 * 应用市场首页
	 */
	function indexMark(){
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		$m = M('plan');
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
		
		//取得应用市场数据
		$appmark = M("appmark") -> order('createdtime desc') -> page($page.','.$pagesize)-> select();
		
		$this -> assign("appmark",$appmark);
		$this -> display();
	}
	
	/**
	 * 添加应用市场
	 */
	function addMark(){
		
		//1、取得应用市场数据
		$markdata = M('mark') -> select();
		
		$this -> assign("markdata",$markdata);
		$this -> display();
	}
	
	/**
	 * 保存数据
	 */
	function save(){
		
		if( I('markid') == -1 ){
			$this -> error("请选择应用市场");
			return;
		}
		
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
			if( "edit" == $op ){
				$tid =  I('id');
				$am = M('appmark') -> where("id = $tid") -> find();
				unlink(unlink("data/" . $am['picpath']));
			}
			$data['picpath'] = $info["pic"]['savepath'] . $info["pic"]['savename'];
		}
		
		$data['title'] = $_POST['title'];
		$data['state'] = $_POST['state'];
		$data['content'] = $_POST['content'];
		$data['markid'] = $_POST['markid'];
		$data['createdtime'] = Date("Y-m-d H:i:s",time());
		
		
		if( "edit" == $op ){
			$data['id'] = I('id');
			M('appmark') -> save($data);
		}else{
			M('appmark') -> add($data);
		}
		
		$this->success();
	}
	
	/**
	 * 删除应用市场
	 */
	function delMark(){
		$id = I('id');
		
		$appmark = M('appmark') -> where("id = $id") -> find();
		
		//1、删除表plan中的记录
		M('appmark') -> where("id = $id") -> delete();
		
		//2、删除图片文件
		unlink(unlink("data/" . $appmark['picpath']));
		
		$this -> success();
	}
	
	/**
	 * 修改应用市场
	 */
	function editMark(){
		$id = I('id');
		
		//1
		$appmark = M('appmark') -> where("id = $id") -> find();
		
		//2、取得应用市场数据
		$markdata = M('mark') -> select();
		
		$this -> assign("markdata",$markdata);
		$this -> assign("appmark",$appmark);
		$this -> display();
	}
}




























