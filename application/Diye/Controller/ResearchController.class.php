<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class ResearchController extends AdminbaseController{
	
	/**
	 *加载创新与页view
	 * 
	 */
	function index(){
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('research');
		$researchData = $m ->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		
		$this -> assign('count',$count);
		$this -> assign('page',$show);// 赋值分页输出
		//end
		
		$this -> assign("researchData" ,$researchData);
		$this -> display();
	}
	function displays(){
		$id = I("id");
		$data = M("research") ->where("id = $id") ->select();
		$this->assign("data",$data);
		$this->display();
	}
	/**
	 * 查看具体媒体联系数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("research") -> where("id = $id") -> find();
		$cate = M("research") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_idea(){
		
			//普通字段更新
			$id = I("id");
			$data['content'] = $_POST['content'];//研发与创新顶部简介
			$data['cxcontent'] = $_POST['cxcontent'];//创新简介
			$data['yfcontent'] = $_POST['yfcontent'];//研发简介
			$data['hzcontent'] = $_POST['hzcontent'];//合作创新简介
			
			$res = M("research") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("研发与创新简介更新成功！");
			}else{
				$this->error("研发与创新简介修改失败！");
			}
	}
}





































