<?php
namespace Diye\Controller;
use Common\Controller\AdminbaseController;


class CategoryController extends AdminbaseController{
	/*
	 * 加载产品分类首页
	 */
	function index(){
		$data = M('product_nav') -> select();
		
		//分页显示
		$page = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "15";
		
		$m = M('product_nav');
		$data = $m -> page($page.','.$pagesize) -> select();
		
		$count = $m->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		//end
		
		$this -> assign("data",$data);
		$this -> display();
	}
	
	/*
	 * 加载添加产品分类view
	*/
	function add(){
		$data = M('product_nav') -> select();
		
		$this -> assign("data",$data);
		$this -> display();
	}
	
	/*
	 * 保存产品分类
	 */
	function add_post(){
		$data['parent_id'] = $_POST['parent'];
		$data['name'] = $_POST['name'];
		$data['description'] = $_POST['description'];
		$res = M('product_nav') -> add($data);
		$fid = M('product_nav')->getLastInsID();
        //-----------------junge-------------
        if($_FILES['image']) {
            $this->uploadImages($_FILES, $fid, 'category', 'image');
        }
        //-----------------junge-------------
		if( $res ){
			$this -> success("添加成功");
		}else {
			$this -> error("添加失败");
		}
	}
	
	/*
	 * 删除分类
	 */
	function delete(){
		$id = I("id");
		$r = M('product_nav') -> where("parent_id = $id" ) -> find();

		if( $r ){
			$this -> error("该分类下有子分类，不可删除");
		}
		
		$pnr = M('product_nav_relationship') -> where("nav_id = $id" ) -> find();
		if( $pnr ){
			$this -> error("该分类下有产品，不可删除");
		}
		
		$res = M('product_nav') -> where("id = $id" ) -> delete();

        //-----------------junge-------------
        $images = M('images')->where("data_id=$id")->field('image_path')->select();
        foreach ($images as $image){
            if(file_exists("data/".$image['image_path'])){
                unlink("data/".$image['image_path']);
            }
        }
        M('images')->where("data_id=$id")->delete();
        //-----------------junge-------------

		if( $res ){
			$this -> success("删除成功");
		}else {
			$this -> error("删除失败");
		}
	}
	
	/*
	 * 修改分类view
	 */
	function edit(){
		$id = I("id");

		$data = M('product_nav') -> where("id = $id" ) -> find();
		$cate = M('product_nav') -> where("id != $id") -> select();
		$where = array(
		    'data_id'=>$id,
            'type'=>'category'
        );
		$image = M('images')->where($where)->find();

		$this -> assign("image",$image);
		$this -> assign("cate",$cate);
		$this -> assign("data",$data);
		$this -> display();
	}
	
	/*
	 * 保存修改的信息
	 */
	function edit_post(){
		$id = $fid = $_POST['id'];
		$data['parent_id'] = $_POST['parent'];
		$data['name'] = $_POST['name'];
		$data['description'] = $_POST['description'];

		$res = M('product_nav') -> where("id = $id" )->save($data);
        //-----------------junge-------------

        if($_FILES['image']) {
            //判断有上传图片，把旧的图片删除
            $where = array(
                'data_id'=>$id,
                'type'=>'category'
            );
            $image = M('images')->where($where)->find();
            if(file_exists("data/".$image['image_path'])){
                unlink("data/".$image['image_path']);
            }

            M('images')->where($where)->delete();
            $this->uploadImages($_FILES, $fid, 'category', 'image');
        }
        //-----------------junge-------------

        $this -> success('添加成功',U('Category/index'));
	}

	function uploadImages($file,$fid,$type,$field){
        $images = bathUploadImage($file,$fid,$type,$field);
        if(!is_array($images)){
            if(strpos($images,'error')!==false){
                echo "<script>alert('".substr($images,5)."');window.history.go(-1)</script>";
                return false;
            }
        }else{
            M('images')->addAll($images);
            return true;
        }
    }
}




























