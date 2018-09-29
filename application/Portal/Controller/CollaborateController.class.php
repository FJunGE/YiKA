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

class CollaborateController extends HomebaseController {
	
	
	
	//保存新闻媒体信息
	function add_collabor(){
		
		//资料上传
		$config = array(
				'maxSize'    =>    0,//限制上传资料大小，0不限制
				'savePath'   =>    '/upload/collaborate/',//设置资料上传目录
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
		
		$data['xmmc'] = $_POST['xmmc'];//项目名称
		$data['zscq'] = $_POST['zscq'];//知识产权保护情况描述
		$data['xmys'] = $_POST['xmys'];//项目优势
		$data['xmjz'] = $_POST['xmjz'];//项目竞争分析
		$data['xmyf'] = $_POST['xmyf'];//项目研发/技术进度
		$data['xmjs'] = $_POST['xmjs'];//项目团队/个人介绍
		$data['yysc'] = $_POST['yysc'];//项目可应用市场
		$data['xmxq'] = $_POST['xmxq'];//项目现阶段需求
		$data['xmxqx'] = $_POST['xmxqx'];//项目下阶段需求
		$data['name'] = $_POST['name'];//负责人姓名
		$data['mobile'] = $_POST['phoneNumber'];//负责人姓名
		$data['createTime'] = Date("Y-m-d H:i:s",time());
		$data['edition'] = 1;
			
		$res = M("collaborate") -> add($data);
		if( $res ){
			$this -> success("提交成功，我们将1-3工作日内与您联系...",U('portal/Collaborate/index'),3);
		}else{
			$this -> error("提交失败！请认真完善信息");
		}
	}
	
	//接受英文版数据
	function add_collabor_en(){
		//资料上传
		$config = array(
				'maxSize'    =>    0,//限制上传资料大小，0不限制
				'savePath'   =>    '/upload/collaborate/',//设置资料上传目录
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
		
		$data['xmmc'] = $_POST['xmmc'];//项目名称
		$data['zscq'] = $_POST['zscq'];//知识产权保护情况描述
		$data['xmys'] = $_POST['xmys'];//项目优势
		$data['xmjz'] = $_POST['xmjz'];//项目竞争分析
		$data['xmyf'] = $_POST['xmyf'];//项目研发/技术进度
		$data['xmjs'] = $_POST['xmjs'];//项目团队/个人介绍
		$data['yysc'] = $_POST['yysc'];//项目可应用市场
		$data['xmxq'] = $_POST['xmxq'];//项目现阶段需求
		$data['xmxqx'] = $_POST['xmxqx'];//项目下阶段需求
		$data['name'] = $_POST['name'];//负责人姓名
		$data['mobile'] = $_POST['phoneNumber'];//负责人姓名
		$data['createTime'] = Date("Y-m-d H:i:s",time());
		$data['edition'] = 2;
			
		$res = M("collaborate") -> add($data);
		if( $res ){
			$this -> success("Submitted successfully，We will contact you within 1-3 working days...",U('portal/Collaborate/index_en'),5);
		}else{
			$this -> error("Submit failure! Please improve information carefully");
		}
	}
	
	//加载合作项目在线提交表单页面
	public function index() {
		$moldZH=1;//1是中文
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		$funds = M('funds')->where("edition=$moldZH") -> select();
		$this->assign("funds",$funds);
		
		$this -> display("/zh/tzjj");
	}
   
	//英文版
	public function index_en() {
		$moldEN=2;//2是英文
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$funds = M('funds')->where("edition=$moldEN") -> select();
		$this->assign("funds",$funds);
	
		$this -> display("/en/tzjj_en");
	}

}


