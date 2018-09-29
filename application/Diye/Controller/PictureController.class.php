<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController;


class PictureController extends AdminbaseController{
	
	//首页
	function index(){
		
		$picdata = M("picture") -> select();
		
		$this -> assign("picdata",$picdata);
		$this -> display();
	}
	
	//修改页面
	function edit(){
		
		$id = I("id");
		$banben = I("banben");
		
		//1、所有的文章
		$post = M("posts") ->where("edition=$banben")-> field("post_title,id") -> select();
		
		//2、当前图片数据
		$picdata = M("picture") -> where("id = $id") -> find();
		
		$this -> assign("post",$post);
		$this -> assign("picdata",$picdata);
		$this -> display();
	}
	
	//保存修改信息
	function edit_picture(){
		$id = $_POST["id"];
		$postid = $_POST['postid'];
		if( $postid != '-1' ){
			$title = M('posts') -> where("id = $postid") -> field("post_title") -> find();
			$data['posttitle'] = $title['post_title'];
		}
		
		$config = array(
				'maxSize'    =>    0,
				'savePath'   =>    'upload/indexpic/',
				'rootPath'   =>    'data/',
				'replace'    =>    'true',
				'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
				'autoSub'    =>    false,
				'saveName'    =>    array('uniqid',''),
				'subName'    =>    array('date','Ymd'),
		);
		
		$upload = new \Think\Upload($config);
		$info   =   $upload->upload();
		
		if( $info ){
			$picdata = M("picture") -> where("id = $id") -> find();
			$data['imgpath'] = "data/" . $info["img"]['savepath'] . $info["img"]['savename'];
			unlink($picdata['imgpath']);
		}
		$data['state'] = I('state');
		$data['postid'] = $postid;
		$res = M("picture") -> where("id = $id") -> data($data) -> save();
		
		if( $res !== false){
			$this->success("修改成功！");
		}else{
			$this->error("修改失败！");
		}
	}
	
	
}




























