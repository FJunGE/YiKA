<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
use Think\Model;
/**
 * 首页
 */
class ProductController extends HomebaseController {

	/**
	 * 查看产品详情
	 */
	function productdetail(){

		$id = I("id");
		$prodata = M("product") -> where("id = $id") -> find();
		
		//2、取得产品关联得解决方案
		$plandata = M('plan') -> table("dy_plan_relation_product prp,dy_plan dp") 
					-> field("dp.id,dp.title,dp.picpath")
					->where("prp.pro_id = $id and prp.plan_id = dp.id")	
					-> select();

		
		//3、取出同个分类下的14条记录
		$model = new Model();
		$ps = $model -> query("SELECT * FROM dy_product WHERE id IN(SELECT product_id FROM  dy_product_nav_relationship WHERE nav_id in (SELECT nav_id FROM  dy_product_nav_relationship WHERE product_id = $id)) AND state = 2 limit 14");
		
		
		//4、hits字段加一
		M("product")->where("id=$id")->setInc('hits');

		//5、循环取出图片
        $prodata['thumbnail'] = $prodata['picpath'];
        $images = M("images")->where("data_id=$id and type='product'")->select();

        $imagePath = array();
        foreach ($images as $image){
            $imagePath[] = $image['image_path'];
        }
        $prodata['picpath'] = $imagePath;

        //6、获取该产品相关案例
        $planIDs = M('plan_relation_product')->field('plan_id')->where("pro_id = $id")->select();
        if(!empty($planIDs)){
            $plans= array();
            foreach ($planIDs as $planDatum){
                $OnePlan = M('plan')->where("id=".$planDatum['plan_id'])->field('title')->find();
                $plans[$planDatum['plan_id']] = $OnePlan['title'];
                //plan[id]->标题...
            }
            $prodata['plan'] = $plans;

        }

		$this -> assign("plandata",$plandata);
		$this -> assign("prodata", $prodata);
		$this -> assign("ps",$ps);
		$this -> display("/zh/productdetail");
	}

	/**
	 * 产品列表显示页
	 * 
	 */
	public function product(){
		//产品分类导航部分
		$navl = M('product_nav') -> limit('9') -> order('id desc') -> select();
		$this -> assign("navl",$navl);
		//应用市场导航部分
		$plannav = M('plan') -> where('state = 1') ->where('edition=1')-> limit('51') -> order('id desc') ->  select();
		$this->assign("plannav",$plannav);
		
		//查询条件
		$condition['navid'] = !empty($_GET['navid']) ? $_GET['navid'] : '';
		$condition['productname'] = I("productname") != "" ? I("productname") : '';
		
		$table = "dy_product_nav_relationship pnr , dy_product p";
		if( !empty($condition['navid']) ){
			$where = 'pnr.nav_id = ' . $condition['navid'] .' and pnr.product_id = p.id and p.state = 2 ';
		}else if( !empty($condition['productname']) ){
			$table = "dy_product_nav_relationship pnr , dy_product p , dy_product_nav nav";
			$where = ' p.name like "%' . $condition['productname'] .'%"  and  pnr.nav_id = nav.id and p.id = pnr.product_id  and p.state = 2 ';
		}else{
			$table = "dy_product_nav_relationship pnr , dy_product p , dy_product_nav nav";
			$where = ' nav.parent_id = 0 and  pnr.nav_id = nav.id and p.id = pnr.product_id  and p.state = 2 ';
		}
		 
		//产品信息数据     分页显示
		$p = $_GET['p'] != null ? $_GET['p'] : "0";
		$pagesize = "2";
		 
		$m = M('product');
		$productData = $m->
		table( $table ) ->
		where( $where ) ->
		group( 'p.id' ) ->
		order('p.createTime')->
		page($p.','.$pagesize)->
		field('p.model,p.name,p.origin,p.id,p.application,picpath') ->
		select();
		//echo  M('product') ->_sql();
		$c = $m->
		table( $table ) ->
		where( $where ) ->
		group( 'p.id' ) ->
		order('p.createTime')->
		field('p.model,p.name,p.origin,p.id') ->
		select();
		$count = count($c);
		//echo $m -> _sql();
        $Page = getPage($count,$pagesize);
		$show = $Page->show();
		$this->assign('page',$show);

        //echo "<pre>";
		//var_dump($productData);die();
		//end
		 
		//产品分类数据
		$nav = M('product_nav') -> select();
		 
		$this -> assign("productData",$productData);
		$this -> assign("nav",$nav);
		$this -> assign("count",$count);
		$this -> assign("condition",$condition);
		$this -> display("/zh/product");
	}

	public function category(){
	    $categoryData = M('product_nav')->order('id desc')->select();

	    foreach ($categoryData as $key => $item){
	        $where = array("data_id"=>$item['id'],'type'=>'category');
	        $result = M('images')->where($where)->find();
            $categoryData[$key]['image'] = $result['image_path'];
        }

        //第三条到第四条数据
//        $SecondData = array();
//        for($i = 1; $i<5; $i++){
//            $SecondData[] = $categoryData[$i];
//        }

        //第二条到以后的数据
        $a = 2;
        $orderData = array();
        while($a<count($categoryData)){
            $orderData[] = $categoryData[$a];
            $a ++;
        }

	    $this->assign("categoryData",$categoryData);
//	    $this->assign("secondData",$SecondData);
	    $this->assign("orderData",$orderData);
	    $this -> display("/zh/category");
    }

    public function test(){
        $data = $_POST;
        echo json_encode($data);
    }
    /**
     * 产品需求工单处理
     */
    public function demand(){

        $data = $_POST;

        if (empty($_POST)){echo 1; return false;}//内容为空

        if(!sp_check_verify_code()){
            //echo 2;//验证码错误
            echo 2; exit();
        }

        //手机号验证
        if (strlen($data['telephone']) != 11){
            echo 3;//手机号长度错误或是没输入手机号
            return false;

        }else{
            $tel = preg_match("/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/",$data['telephone']);
            if(!$tel){
                echo 4;//手机号格式错误
                return false;
            }
        }

        //邮箱验证
        $emailMatch = preg_match("/([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i",$data['email']);
        if(!$emailMatch){
            echo 5;//邮箱格式错误
            return false;
        }

        //需求信息验证
        if (empty($data['demand'])){echo 6; return false;};

        $pid = $data['pid'];

        //产品数据
        $product = M('product')->where("id=".$data['pid'])->field('name')->find();
        $data['product'] = $product['name'];
        $data['create_date'] = Date("Y-m-d H:i:s",time());

        //移除多余数据
        unset($data['verify']);
        unset($data['pid']);

        $result = M('product_demand')->add($data);
        if ($result){
            echo 8;
        }
    }
}


