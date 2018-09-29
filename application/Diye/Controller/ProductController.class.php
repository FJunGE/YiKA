<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController;


class ProductController extends AdminbaseController{
	
	/**
	 *加载产品管理首页view
	 * 
	 */
	function index(){
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		$m = M('product');
		$productData = $m->order('createTime desc')->page($page.','.$pagesize)->select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
		
		//产品分类信息
		$nav = M('product_nav') -> field("id,name") -> select();
		if( $nav != null ){
			$navdata = array();
			foreach( $nav as $val ){
				$navdata[$val['id']] = $val['name'];
			}
		}
		//end

		$this -> assign("productData" ,$productData);
		$this -> assign("navdata",$navdata);
		$this -> display();
	}
	
	/**
	 * 加载添加产品页view
	 * 
	 */
	function add(){
		
		$productNav = M("product_nav") -> select();
		$plan = M('plan') -> select();
		
		$this->assign("productNav",$productNav);
		$this -> assign("plan",$plan);
		$this -> display();
	}
	
	/**
	 * 保存产品至数据库
	 */
	function add_product(){
		//pdf上传
		/*$config = array(
				'maxSize'    =>    0,
				'savePath'   =>    'upload/pdf/',
				'rootPath'   =>    'data/',
				'replace'    =>    'true',
				'exts'       =>    array('PDF','xls','docx','xlsx','doc','jpg', 'gif', 'png', 'jpeg'),
				'autoSub'    =>    true,
				'saveName'    =>    array('uniqid',''),
				'subName'    =>    array('date','Ymd'),
		);
		
		$upload = new \Think\Upload($config);
		$info   =   $upload->upload();
		
		//多文件上传
		if( $info['product_pdf'] != null ){
			$data['pdfpath'] = $info["product_pdf"]['savepath'] . $info["product_pdf"]['savename'];
		}
		
		//相关认证文件的路径
		if( $info['product_rz'] != null ){
			$data['rzpath'] = $info["product_rz"]['savepath'] . $info["product_rz"]['savename'];
		}
		
		//成功案例文件的路径
		if( $info['product_al'] != null ){
			$data['alpath'] = $info["product_al"]['savepath'] . $info["product_al"]['savename'];
		}
		
		//销售指引文件的路径
		if( $info['product_zy'] != null ){
			$data['zypath'] = $info["product_zy"]['savepath'] . $info["product_zy"]['savename'];
		}
		
		//产品图片路径
		if( $info['product_pic'] != null ){
			$data['picpath'] = $info["product_pic"]['savepath'] . $info["product_pic"]['savename'];
		}
		
		//MSDS安全说明
		if( $info['product_msds'] != null ){
			$data['msds'] = $info["product_msds"]['savepath'] . $info["product_msds"]['savename'];
		}
		
		//相关技术文件
		if( $info['product_tecofile'] != null ){
			$data['tecofile'] = $info["product_tecofile"]['savepath'] . $info["product_tecofile"]['savename'];
		}*/
		
		//多文件上传 end



        $data['name'] = $_POST['product_name'];//产品名称
        $data['features'] = $_POST['features'];//产品特性
        $data['state'] = $_POST['state'];//产品状态
        $data['model'] = $_POST['model'];//型号
        $data['origin'] = $_POST['origin'];//产地
        $data['material'] = $_POST['material'];//材质
        $data['color'] = $_POST['color'];//颜色
        $data['size'] = $_POST['size'];//尺寸
        $data['telephone'] = $_POST['telephone'];//订购热线
        $data['application'] = $_POST['application'];//用途
        $data['createTime'] = date("Y-m-d H:i:s",time());//创建时间
        $data['visitor'] = $_POST['visitor'];//游客权限
        $data['uploader'] = session("name");//操作员
        $data['glass'] = $_POST['glass'];//玻璃工艺
        $data['hardware'] = $_POST['hardware'];//五金配件
        $data['hits'] = 0;//点击量

		$res = M("product") -> add($data);
		if( $res != null ){
			$temp = array();
			$temp['product_id'] = $res;
			foreach( $_POST['product_navid'] as $id ){
				$temp['nav_id'] = $id;
				M('product_nav_relationship') -> add($temp);
			}

            //-----------------junge-------------
            if($_FILES){
                $images = bathUploadImage($_FILES,$res,'product','product_pic');
                if(!is_array($images)){
                    if(strpos($images,'error')!==false){
                        //如果有错误则报错
                        echo "<script>alert('".substr($images,5)."');window.history.go(-1)</script>";
                    }
                }else{
                    //插入images表中
                    M('images')->addAll($images);

                    //获取最新的一张图片为封面插入product表中
                    $data['id'] = $res;
                    $data['picpath'] = $images[count($images)-1]['image_path'];
                    M("product") -> save($data);
                }

            }
            //-----------------junge-------------

			
			$this->success("产品添加成功！");
		}else{
			$this->error("产品添加失败，请稍后再试！");
		}
	}
	
	/**
	 * 加载修改页面view
	 */
	function edit(){
		$id = I("id");
		
		$prodata = M("product") -> where("id = $id") -> find();
		$nav = M('product_nav') -> field("id,name") -> select();
		$plan = M('plan') -> field("id,title") -> select();
		$checkNav = M('product_nav_relationship') -> field("nav_id") -> where("product_id = $id") -> select();
		
		if( $checkNav != null ){
			$navdata = array();
			foreach( $checkNav as $val ){
				$navdata[$val['nav_id']] = 'y';
			}
		}

        //-----------------junge-------------
        $where = array("data_id" => $id,'type'=>'product');
        $images = M('images')->where($where)->field('image_id,image_path')->select();
        $prodata['pictures'] = $images;
        //-----------------junge-------------

// 		echo "<pre/>";
// 		var_dump($plandata);
// 		exit;
		
		$this -> assign("productNav",$nav);
		$this -> assign("plan",$plan);
		$this -> assign("data",$prodata);
		$this -> assign("navdata",$navdata);
		$this -> display();
	}
	
	/**
	 *保存修改信息 
	 */
	function edit_product(){
		//1、普通字段更新
		$id = I("id");
		$data['name'] = $_POST['product_name'];//产品名称
		$data['features'] = $_POST['features'];//产品特性
		$data['state'] = $_POST['state'];//产品状态
		$data['model'] = $_POST['model'];//型号
		$data['origin'] = $_POST['origin'];//产地
		$data['material'] = $_POST['material'];//材质
		$data['color'] = $_POST['color'];//颜色
		$data['size'] = $_POST['size'];//尺寸
		$data['telephone'] = $_POST['telephone'];//订购热线
		$data['application'] = $_POST['application'];//用途
        $data['visitor'] = $_POST['visitor'];//用途
        $data['crateTime'] = date("Y-m-d H:i:s",time());
		
		//2、产品-所属分类表关系更新  先删除原来的数据 再插入    dy_product_nav_relationship
		$product_navid = $_POST['product_navid'];
		$pnr = M("product_nav_relationship");
		$pnr -> where("product_id = $id") -> delete();
		$tempnr = array();
		$tempnr['product_id'] = $id;
		foreach ($product_navid as $navid){
			$tempnr['nav_id'] = $navid;
			$pnr -> add($tempnr);
		}

		$res = M("product") -> where("id = $id") -> data($data) -> save();

        //-----------------junge-------------
        if($_FILES){
            $images = bathUploadImage($_FILES,$res,'product','product_pic');
            if(!is_array($images)){
                if(strpos($images,'error')!==false){
                    //如果有错误则报错
                    echo "<script>alert('".substr($images,5)."');window.history.go(-1)</script>";
                }
            }else{
                //插入images表中
                M('images')->addAll($images);
            }
        }
        //-----------------junge-------------

		if( $res !== false){
			$this->success("产品修改成功！");
		}else{
			$this->error("产品修改失败！");
		}
	}

    /**
     * ajax 处理图片
     */
	public function ajax_handle_image(){
        $data = $_POST;

        if(empty($data['operation'])) return false;

        if($data['operation'] == 'delete'){
            echo ajaxDeleteImage($data['imageId'],$data['dataID'],$data['type']);
        }elseif($data['operation'] == 'cover'){
            echo ajaxCoverImage($data['imageId'],$data['dataID'],$data['type']);
        }
    }
	/**
	 * 删除产品
	 */
	function delete(){
		$proid = I("id");
		
		if( empty($proid) ){
			$this -> error("删除失败，请稍后重试！");
		}
		
		//1、删除产品-分类关系表    dy_product_nav_relationship
		M("product_nav_relationship") -> where("product_id = $proid") -> delete();
		
		//2、删除产品-应用市场关系表   dy_product_mark_relationship
		//M("product_mark_relationship") -> where("product_id = $proid") -> delete();
		
		//4、删除产品表的记录  product
		M("product") -> where("id = $proid") -> delete();

		//5、删除图片/*----------- junge --------*/
        $images = M('images')->where("data_id = $proid")->field('image_path')->select();
        M('images')->where("data_id = $proid")->delete();
        foreach ($images as $image){
            if(file_exists("data/".$image['image_path'])){
                unlink("data/".$image['image_path']);
            }
        }
        /*----------- junge --------*/

		//6、删除成功
		$this -> success("删除成功！");
	}
	
	/**
	 * 批量删除
	 * 
	 */
	function deleteCheck(){
		$ids = I('ids');
		if( !empty($ids) ){
			foreach ( $ids as $proid ){
				
				//1、删除产品-分类关系表    dy_product_nav_relationship
				M("product_nav_relationship") -> where("product_id = $proid") -> delete();
				
				//2、删除产品-应用市场关系表   dy_product_mark_relationship
				M("product_mark_relationship") -> where("product_id = $proid") -> delete();
					
				//3、删除文件夹的pdf文件
				$p = M("product") ->field("pdfpath,rzpath,alpath,zypath,picpath") ->where("id = $proid") -> find();
				unlink("data/" . $p['pdfpath']);
				unlink("data/" . $p['rzpath']);
				unlink("data/" . $p['alpath']);
				unlink("data/" . $p['zypath']);
				unlink("data/" . $p['picpath']);
				unlink("data/" . $p['msds']);
				unlink("data/" . $p['tecofile']);
				
				//4、删除产品表的记录  product
				M("product") -> where("id = $proid") -> delete();

                //5、删除图片/*----------- junge --------*/
                $images = M('images')->where("data_id = $proid")->field('image_path')->select();
                M('images')->where("data_id = $proid")->delete();
                foreach ($images as $image){
                    if(file_exists("data/".$image['image_path'])){
                        unlink("data/".$image['image_path']);
                    }
                }
                /*----------- junge --------*/
				
			}
				$this -> success("删除成功！");
		}else{
			$this -> error();
		}
	}

    /**
     * 产品需求
     */
	public function demand(){
        //分页显示
        $page = $_GET['p'] != null ? $_GET['p'] : "0";
        $pagesize = "15";
        $m = M('product_demand');
        $demand = $m->order('create_date desc')->page($page.','.$pagesize)->select();

        $count = $m->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        //end
        $this -> assign("demand" ,$demand);
	    $this -> display();
    }

    /**
     * 修改产品状态
     */
    public function editStatus(){
        $id = intval(I('id'));
        $status = intval(I('status'));

        $sta=0;
        if ($status == 1){
            $sta = 0;
        }elseif ($status == 0){
            $sta = 1;
        }

        $demand = M("product_demand");
        $demand->status = $sta;
        $demand->where("id=$id")->save();
        $this->success('设置成功',U('Product/demand'));
    }

    /**
     * 删除产品需求
     */
    public function demandDelete(){
	    $id = intval(I('id'));
	    $result = M('product_demand')->where("id=$id")->delete();
	    if ($result){
	        $this->success('删除成功');
        }else{
	        $this->error();
        }
    }

    /**
     * 批量删除产品需求
     */
    public function batchDelete(){
        $ids = I('ids');
        if (!empty($ids)){
            foreach ($ids as $pid){
                //1、删除产品表的记录  product
                $res = M("product_demand") -> where("id = $pid") -> delete();
                if($res){
                    echo json_encode(array('state'=>'success'));
                }
            }
        }
    }
}





































