<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class ContactController extends AdminbaseController{
	
	/***-
	 *加载联系我们view
	 * 
	 */
	function index(){
		
		$contactDatb = M('contact_add') -> select();
		$contactData = M('contact') -> select();
		$contactImg = M('contact_img') -> select();
		
		$this -> assign("contactImg"  ,$contactImg);
		$this -> assign("contactDatb" ,$contactDatb);
		$this -> assign("contactData" ,$contactData);
		$this -> display();
	}
	
	/**
	 * 修改联系我们数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("contact") -> where("id = $id") -> find();
		$cate = M("contact") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_a(){
		$id = I("id");
	
		$data = M("contact_add") -> where("id = $id") -> find();
		$cate = M("contact_add") -> where("id != $id") -> select();
	
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
	
	}
	function edit_img(){
		$id = I("id");
		$data = M("contact_img")->where("id = $id") ->find();
		$cate = M("contact_img")->where("id!=$id") ->select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
	}
	function edit_contact(){
		
			//普通字段更新
			$id = I("id");
			$data['title'] = $_POST['title'];//
			$data['name'] = $_POST['name'];//
			$data['email'] = $_POST['email'];//
			$data['telephone'] = $_POST['telephone'];//
			$data['stateemail'] = $_POST['stateemail'];//
			$data['statetele'] = $_POST['statetele'];//
			$data['statephone'] = $_POST['statephone'];//
			$data['phone'] = $_POST['phone'];//
			$data['edition'] = 1;//目前为只为中文版一佳门窗
			
			$res = M("contact") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
	
	function edit_contacta(){
		$id = I("id");
		$datac['title'] = $_POST['title'];//
		$datac['address'] = $_POST['address'];
		$datac['edition'] = 1;//目前为只为中文版一佳门窗
		
		$res_a = M("contact_add") -> where("id = $id") -> data($datac) -> save();
		
		if( $res_a !== false){
			$this->success("修改成功！");
		}else{
			$this->error("修改失败！");
		}
	}
	
	function edit_image(){
		$id = I("id");
		$config = array(
				'masSize'		=>		0,
				'savePath'		=>		'/upload/lxfs/',
				'rootPath'		=>		'data/',
				'replace'		=>		'true',
				'exts'			=>		array('jpg','gif','png','jpge'),
				'autoSub'		=>		false,
				'saveName'		=>		array('uniqid',''),
				'subName'		=>		array('data','Ymd'),
		);
		$upload = new \Think\Upload($config);
		$info	=	$upload->upload();
		$psd = M("contact_img")->field("imgsrc")->where("id=$id")->find();
		if ($info['imgsrc'] !=null){
			$data['imgsrc'] = $info["imgsrc"]['savepath'] . $info["imgsrc"]['savename'];
			unlink("data/" . $psd['imgsrc']);
		}
		 $reveid = M("contact_img") ->where("id = $id") ->data($data) ->save();
		
		if($reveid !== false){
			$this->success("修改成功！");
		}else{
			$this->error("修改失败");
		} 
	}
	/**
	 * 加载添加页面信息页view
	 */
	function add(){
		$contactNav = M("contact") -> select();
		$this->assign("contactNav",$contactNav);
		$this-> display();
	}
	
	/**
	 * 保存数据至数据库
	 */
	function add_Contact(){
			$data['title'] = $_POST['title'];//
			$data['name'] = $_POST['name'];//
			$data['email'] = $_POST['email'];//
			$data['telephone'] = $_POST['telephone'];//
			$data['phone'] = $_POST['phone'];//
			$data['stateemail'] = $_POST['stateemail'];//
			$data['statetele'] = $_POST['statetele'];//
			$data['statephone'] = $_POST['statephone'];//
			$data['edition'] = 1;//目前为只为中文版一佳门窗
		
			$res = M("contact") -> add($data);
			if( $res != null ){
				$this->success("添加成功！");
			}else{
				$this->error("添加失败，请稍后再试！");
			}
	}
	function add_a(){
		$contactNav = M("contact_add") -> select();
		$this->assign("contactNav",$contactNav);
		$this-> display();
	}
	
	function add_Contactd(){
		$datad['title'] = $_POST['title'];//
		$datad['address'] = $_POST['address'];//
		$datad['edition'] = 1;//目前为只为中文版一佳门窗
		
		$res = M("contact_add") -> add($datad);
		if( $res != null ){
			$this->success("添加成功！");
		}else{
			$this->error("添加失败，请稍后再试！");
		}
	}
	
	//删除联系信息
	function delete(){
		
		
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if (M('contact') ->where("id=$id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_GET['ida'])){
			$ida = intval(I("get.ida"));
			if (M('contact_add') ->where("id=$ida")->delete()) {
				$this->success("删除地址成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if (M('contact') ->where("id in ($ids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}

}
