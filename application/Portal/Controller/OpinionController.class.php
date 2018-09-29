<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 

class OpinionController extends HomebaseController {
	
	
	
	//保存意见反馈信息
	function add_data(){
		
		$data['type'] = $_POST['type'];//意见类型
		$data['name'] = $_POST['name'];//反馈者姓名
		$data['email'] = $_POST['email'];//反馈者邮箱
		$data['phone'] = $_POST['phone'];//反馈者联系方式
		$data['companyname'] = $_POST['companyname'];//反馈者公司名称
		$data['content'] = $_POST['content'];//反馈内容
		$data['createtime'] = Date("Y-m-d H:i:s",time());
					
		$res = M("opinion") -> add($data);
		echo M("opinion")->_sql();
		if( $res ){
			$this -> success("提交成功，我们将尽快处理...",U('portal/index/index'),5);
		}else{
			$this -> error("提交失败！请认真完善信息");
		}
	}
	
	//意见反馈表单页面
	public function index() {
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$this -> display("/zh/yjfk");
	}
   

}


