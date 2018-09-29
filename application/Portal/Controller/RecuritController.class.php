<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
use Think\Model;

class RecuritController extends HomebaseController {
	
	/**
	 * 招聘简历情况信息
	 */
	function add_recurit(){
		//资料上传
		
		 $config = array(
				'maxSize'    =>    0,//限制上传资料大小，0不限制
				'savePath'   =>    '/upload/recurit/',//设置资料上传目录
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
		 	foreach ( $info as $pic ){
		 		$resl = I("id");
		 		$uplodata['recurit_id'] = $resl;
		 		$uplodata['file'] = $pic['savepath'] . $pic['savename'];
		 		$uplodata['time'] = Date("Y-m-d H:i:s",time());
		 		M('recurit_upl') -> add($uplodata);
		 		
		 		$this->success("提交简历资料成功，请等待通知",U('portal/Recurit/recurit'),5);
		 		//4、upload字段加一
		 		M("recurit")->where("id=$resl")->setInc('upload');
		 	}
		 }else{
		 	$this -> error("提交失败！请检查提交资料格式");
		 }
		
	}
	
	
	/**
	 * 社会招聘页信息
	 */
	public function recurit(){

		$id = I("id");
		//查询条件
		//$condition['navid'] = !empty($_GET['navid']) ? $_GET['navid'] : '';
// 		$condition['recuritname'] = I("recuritname") != "" ? I("recuritname") : '';
		
// 		if( !empty($condition['recuritname']) ){
// 			$table = "dy_recurit pnr";
// 			$where = 'pnr.name like "%' . $condition['recuritname'] .'%" and pnr.object = 1 and pnr.state = 2 ';
 			//$where = 'pnr.model like  "%' . $condition['recuritname'] .'%" and pnr.object = 1 and pnr.state = 2 ';
// 		}else{
// 			$table = "dy_recurit pnr";
// 			$where = ' id = 0 and  p.state = 2 ';
// 		}
		//echo M("recurit") ->_sql($where);
		
		//hits字段加一
		//M("recurit")->where("name=$name")->setInc('hits');
		
		//查询条件zds
		$keywords= '%'.$_POST['keywords'].'%';
		$where['name|model|origin'] = array('like',$keywords);
		$map['object'] = 1;
		$map['state'] = 2;
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('recurit');
		$recuritData = $m-> where($map) -> where($where) ->limit('15') ->order('time desc') ->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this -> assign('recuritData',$recuritData);
		
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		
		$this -> assign('count',$count);
		$this -> assign('data',$data);
		$this -> assign('page',$show);// 赋值分页输出
		//end
		
		/**
		 * 加载添加产品页view
		 *
		 */
		//$recuritList = M('recurit') -> where('object=1 AND state=2') ->limit('10') ->order('createTime') ->select();//查询出为社会招聘的并且上架的，前十条语句，切根据时间倒叙排列
		//$this->assign("recuritList",$recuritList);
		$this->display("/zh/recurit");
	}
	
	public function recurit_en(){
	
		$id = I("id");
		//查询条件
		//$condition['navid'] = !empty($_GET['navid']) ? $_GET['navid'] : '';
		// 		$condition['recuritname'] = I("recuritname") != "" ? I("recuritname") : '';
	
		// 		if( !empty($condition['recuritname']) ){
		// 			$table = "dy_recurit pnr";
		// 			$where = 'pnr.name like "%' . $condition['recuritname'] .'%" and pnr.object = 1 and pnr.state = 2 ';
		//$where = 'pnr.model like  "%' . $condition['recuritname'] .'%" and pnr.object = 1 and pnr.state = 2 ';
		// 		}else{
		// 			$table = "dy_recurit pnr";
		// 			$where = ' id = 0 and  p.state = 2 ';
		// 		}
		//echo M("recurit") ->_sql($where);
	
		//hits字段加一
		//M("recurit")->where("name=$name")->setInc('hits');
	
		//查询条件zds
		$keywords= '%'.$_POST['keywords'].'%';
		$where['name|model|origin'] = array('like',$keywords);
		$map['object'] = 1;
		$map['state'] = 2;
	
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
	
		$m = M('recurit');
		$recuritData = $m-> where($map) -> where($where) ->limit('15') ->order('time desc') ->page($page.','.$pagesize)->select();
	
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this -> assign('recuritData',$recuritData);
	
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
	
		$this -> assign('count',$count);
		$this -> assign('data',$data);
		$this -> assign('page',$show);// 赋值分页输出
		//end
	
		/**
		 * 加载添加产品页view
		 *
		*/
		//$recuritList = M('recurit') -> where('object=1 AND state=2') ->limit('10') ->order('createTime') ->select();//查询出为社会招聘的并且上架的，前十条语句，切根据时间倒叙排列
		//$this->assign("recuritList",$recuritList);
		$this->display("/en/recurit_en");
	}
}


