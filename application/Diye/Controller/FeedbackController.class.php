<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController; 

class FeedbackController extends AdminbaseController{
	
	/***-
	 *投诉与反馈渠道加载view
	 * 
	 */
	function index(){

		$m = M('feedback');
		$feedbackData = $m ->page($page.','.$pagesize)->select();
	
		$this -> assign("feedbackData" ,$feedbackData);
		$this -> display();
	}
	
	function displays(){
		$id = I("id");
		$data = M("feedback") -> where("id = $id") ->select();
			
		$this -> assign("data",$data);
		$this -> display();
	}
	/**
	 * 修改为什么加入我们数据信息
	 */
	function edit(){
		$id = I("id");
		
		$data = M("feedback") -> where("id = $id") -> find();
		$cate = M("feedback") -> where("id != $id") -> select();
		
		$this -> assign("data",$data);
		$this -> assign("cate",$cate);
		$this -> display();
		
	}
	function edit_feedback(){
		
			//普通字段更新
			$id = I("id");
			$data['qctit'] = $_POST['qctit'];//
			$data['cntit'] = $_POST['cntit'];//
			$data['content'] = $_POST['content'];//
			$data['qccontent'] = $_POST['qccontent'];//
			$data['cncontent'] = $_POST['cncontent'];//
			$data['stateemail'] = $_POST['stateemail'];//
			$data['statephone'] = $_POST['statephone'];//
			$data['statefax'] = $_POST['statefax'];//
			$data['email'] = $_POST['email'];//
			$data['phone'] = $_POST['phone'];//
			$data['fax'] = $_POST['fax'];//
			
			$res = M("feedback") -> where("id = $id") -> data($data) -> save();
		
			if( $res !== false){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
	}
}





































