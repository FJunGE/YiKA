<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController;

/**
 * 展会与发布管理后台控制器
 * @author 杨铭瑞
 * 2016/7/29
 */
class ExpoController extends AdminbaseController{
	
	/**
	 * 展会首页
	 */
	function index(){
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		$m = M('expo');
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
		
		//取得展会数据
		$expo = M("expo") -> order('createdtime desc') -> page($page.','.$pagesize)-> select();
		
		$this -> assign("expo",$expo);
		$this->display();
	}
	
	/**
	 * 新增展会view
	 */
	function add(){
		
		$news = M("posts") -> select();
		$this->assign("news",$news);
		$this->display();
	}
	
	/**
	 * 保存展会数据
	 */
	function add_expo(){
		$op = I("op");
		$data['title'] = $_POST['title'];
		$data['address'] = $_POST['address'];
		$data['content'] = $_POST['content'];
		$data['state'] = $_POST['state'];
		$data['expotime'] = $_POST['expotime'];
		$data['createdtime'] = Date("Y-m-d H:i:s",time());
		
		$config = array(
				'maxSize'    =>    0,
				'savePath'   =>    'upload/expo/',
				'rootPath'   =>    'data/',
				'replace'    =>    'true',
				'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
				'autoSub'    =>    false,
				'saveName'    =>    array('uniqid',''),
				'subName'    =>    array('date','Ymd'),
		);
		
		$upload = new \Think\Upload($config);
		$info   =   $upload->upload();
		
		//1、保存基本信息到dy_expo
		if( $op == "edit" ){
			$data['id'] = I("id");
			M("expo") -> save($data);
			$res = $data['id'];
		}else{
			$res = M("expo") -> add($data);
		}
		
		//2、保存展会   图片地址   到dy_expo_relation_pic
		if( $res != null ){
			foreach ( $info as $pic ){
				$picdata['picpath'] = $pic['savepath'] . $pic['savename'];
				$picdata['expo_id'] = $res;
				M('expo_relation_pic') -> add($picdata);
			}
		}
		
		//3、保存展会关联得  新闻   id到dy_expo_relation_news
		if( $res != null ){
			if( $op == "edit" ){
				M('expo_relation_news') -> where("expo_id = $res") -> delete();
			}
			foreach ( $_POST['newsid'] as $id ){
				$newsdata['expo_id'] = $res;
				$newsdata['news_id'] = $id;
				M("expo_relation_news") -> add($newsdata);
			}
		}
		$this -> success();
	}
	
	/**
	 * 删除展会
	 */
	function del(){
		$id = I('id');
		
		//1、删除基本信息dy_expo
		M("expo") -> where("id = $id") -> delete();
		
		//2、删除展会   图片地址   dy_expo_relation_pic
		$picdata = M("expo_relation_pic") -> where("expo_id = $id") -> select();
		if( $picdata != null ){
			foreach ($picdata as $pic){
					unlink("data/" . $pic['picpath']);
			}
		}
		M("expo_relation_pic") -> where("expo_id = $id") -> delete();
		
		//3、删除展会关联的  新闻   dy_expo_relation_news
		M("expo_relation_news") -> where("expo_id = $id") -> delete();
		
		$this -> success();
	}
	
	/**
	 * 编辑展会
	 */
	function edit(){
		$id = I('id');
		
		//1、获取基本信息dy_expo
		$expo = M('expo') -> where("id = $id") -> find();
		
		//2、展会   图片地址   dy_expo_relation_pic
		$picdata = M('expo_relation_pic') -> where("expo_id = $id") -> select();
		
		//3、展会关联的  新闻   dy_expo_relation_news
		$data = M('expo_relation_news') -> where("expo_id = $id") -> select();
	
		//4、新闻数据
		$news = M("posts") -> select();
		
		
		//5、新闻信息回显
		if( $data != null ){
			$newsdata = array();
			foreach( $data as $val ){
				$newsdata[$val[news_id]] = "aa";
			}
		}
		
		$this -> assign("expo",$expo);
		$this -> assign("picdata",$picdata);
		$this -> assign("newsdata",$newsdata);
		$this->assign("news",$news);
		
		$this -> display();
	}
	
	/**
	 * 删除展会图片
	 */
	function delpic(){
		$path = I('picpath');
		if( $path != null ){
			unlink("data/" . $path);
			M("expo_relation_pic") -> where("picpath = '$path'") -> delete();
			$this -> success();
			return;
		}
		$this -> error();
	}
	
	/**
	 * 批量删除
	 */
	function deleteCheck(){
		$ids = I('ids');
// 		echo "<pre/>";
// 		var_dump($ids);
// 		exit;
		if( !empty($ids) ){
			foreach ($ids as $id){
				//1、删除基本信息dy_expo
				M("expo") -> where("id = $id") -> delete();
				
				//2、删除展会   图片地址   dy_expo_relation_pic
				$picdata = M("expo_relation_pic") -> where("expo_id = $id") -> select();
				if( $picdata != null ){
					foreach ($picdata as $pic){
						unlink("data/" . $pic['picpath']);
					}
				}
				M("expo_relation_pic") -> where("expo_id = $id") -> delete();
				
				//3、删除展会关联的  新闻   dy_expo_relation_news
				M("expo_relation_news") -> where("expo_id = $id") -> delete();
				
			}
			$this -> success();
		}else{
			$this -> error();
		}
	}
}




























