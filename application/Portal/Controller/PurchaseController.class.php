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

class PurchaseController extends HomebaseController {
	
	
	
	//
	function add_user(){
	
		//资料上传
		 $config = array(
				'maxSize'    =>    0,//限制上传资料大小，0不限制
				'savePath'   =>    '/upload/purchase/',//设置资料上传目录
				'rootPath'   =>    'data',//设置文件上传保存的根路径
				'replace'    =>    'true',//同名文件覆盖
				'exts'       =>    array('rar','zip','7-zip'),//允许上传文件后缀
				'autoSub'    =>    true,//自动使用子目录保存上传文件
				'saveName'    =>    array('uniqid',''),//文件上传保存的根路径
				'subName'    =>    array('date','Ymd'),//子目录创建方式
		);
		
		$upload = new \Think\Upload($config);
		$info   =   $upload->upload();
		if( $info['file'] != null ){
			$data['file']= $info["file"]['savepath'] . $info["file"]['savename'];
		}
		
		
		$data['companyName'] = $_POST['companyName'];//
		$data['address'] = $_POST['address'];//
		$data['fax'] = $_POST['fax'];//
		$data['tel'] = $_POST['tel'];//
		$data['time'] = $_POST['time'];//
		$data['capital'] = $_POST['capital'];//
		$data['listed'] = $_POST['listed'];//
		$data['website'] = $_POST['website'];//
		$data['numberCount'] = $_POST['numberCount'];//
		$data['adminCount'] = $_POST['adminCount'];//
		$data['contact'] = $_POST['contact'];//
		$data['product'] = $_POST['product'];//
		$data['companyIntroduction'] = $_POST['companyIntroduction'];//负责人姓名
		$data['createTime'] = Date("Y-m-d H:i:s",time());
					
		$res = M("purchase") -> add($data);
		//echo M("purchase")->_sql();
		if( $res ){
			$this -> success("提交成功，我们将1-3工作日内与您联系...",U('portal/Purchase/index'),5);
		}else{
			$this -> error("提交失败！请认真完善信息");
		}
	}
	
	//加载合作项目在线提交表单页面
	public function index() {
		$res = M("purchase1") ->select();
		$this->assign("res",$res);
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$this -> display("/zh/purchase");
	}
   

}


