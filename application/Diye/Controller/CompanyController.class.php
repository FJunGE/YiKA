<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class CompanyController extends AdminbaseController{
	
	/**
	 *加载公司介绍范文页view
	 * 
	 */
	function index(){
		$m = M('company');
		$companyData = $m ->select();
		
		$this -> assign("companyData" ,$companyData);
		$this -> display();
	}
	
	/**
	 *输出显示公司介绍页view
	 *
	 */
    function displays(){
    	$id = I("id");
    	$data = M("company") -> where("id = $id") ->select();
 		
   		$this -> assign("data",$data);
    	$this -> display();
    }

	
	/**
	 * 修改公司介绍范文
	 */
	function edit(){
		$id = I("id");
		
		$data = M("company") -> where("id = $id") -> find();
		$cate = M("company") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_company(){
		
			//普通字段更新
			$id = I("id");
			$data['content'] = $_POST['content'];//公司介绍范文修改
			$data['title'] = $_POST['title'];//标题修改
			$data['abstract'] = $_POST['abstract'];//介绍简介
			
			//修改图片
			$config = array(
					'maxSize'    =>    0,
					'savePath'   =>    '/upload/company/',
					'rootPath'   =>    'data/',
					'replace'    =>    'true',
					'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
					'autoSub'    =>    true,
					'saveName'    =>    array('uniqid',''),
					'subName'    =>    array('date','Ymd'),
			);
			
			$upload = new \Think\Upload($config);
			$info   =   $upload->upload();
			$p = M("company") ->field("imgpath") ->where("id = $id") -> find();
			if( $info['imgpath'] != null ){
				$data['imgpath'] = $info["imgpath"]['savepath'] . $info["imgpath"]['savename'];
				unlink("data/" . $p['imgpath']);
			}
		
			$res = M("company") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
}





































