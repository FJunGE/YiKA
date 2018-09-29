<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 工程案例
 * @author MR_PC
 * 2016/7/31
 */
class PlanController extends HomebaseController {
    /**
     * 工程案例详细页面
     */
	function detail(){
		$id = I('id');
		
		//1、获取解决方案数据
		$plan = M('plan') -> where("id = $id") -> find();
		
		//2，获取关联得产品信息
		$prodata = M('product') -> table("dy_product dp, dy_plan_relation_product dr") ->
				where("dr.plan_id = $id and dr.pro_id = dp.id")->
		 		select();

		
		//行业解决方案头部
		$plandata = M('plan') -> where('state = 1') -> select();
		$this->assign("plandata",$plandata);

        //行业解决方案头部
        $where = array('data_id' => $id,'type'=>'plan');
        $images = M('images') -> where($where)-> select();
        $this->assign("images",$images);
		
		$this->assign("prodata",$prodata);
		$this->assign("plan",$plan);
		$this->display("/zh/jjfa");		
	}

    /**
     * 工程案例中心列表页面
     */
	function caselist(){
        $pageSize = "12";
	    $p = (isset($_GET['p']))?$_GET['p']:"0";//当前页数
	    $Count = M('plan')->table("dy_plan p,dy_images i")->where("p.id = i.data_id and i.type = 'plan' and p.state = 1")->group("i.data_id")->select();//总页数
        $page = getPage(count($Count),$pageSize);
        $show = $page->show();

        //1、获取解决方案数据
        $case = M('plan')
            ->where("state = 1")
            ->field('id,title,plan_content,picpath')
            ->order("id desc")
            ->page($p.",".$pageSize)
            ->select();

        foreach ($case as $key => $item){
            $case[$key]['plan_content'] = htmlspecialchars($item['plan_content']);
            if(empty($item['picpath'])){
                unset($case[$key]);
            }
        }

        $this->assign("page",$show);
        $this->assign("case",getCache('caselist',$case));
        $this->assign('recommend',$this->relation_product('recommend'));
        $this->assign('hot',$this->relation_product('hot'));
	    $this->display("/zh/caselist");
    }

    /**
     * 推荐产品
     * 选出案例中出现最多的前六个产品
     *
     * 热门产品
     * 选出案例中最新的前六个产品
     */
    public function relation_product($type){
        $relation = M('plan_relation_product')->field('pro_id')->select();
        //装换成一维数组
        $relation = array_column($relation,'pro_id');
        //重复的一维数组中统计出现次数最多的value
        $relation = array_count_values($relation);

        if($type=='recommend'){
            //推荐产品=>从高到低排序
            arsort($relation);
        }

        //去重
        $uniqueArr = array_unique($relation);
        $i = 0;
        $products = array();
        foreach($uniqueArr as $key => $val){
            //取出一条数据
            $product = M('product')->field('name')->where('id = '.$key)->find();
            //记录出当前的产品数据
            $products[] = array('id'=>$key,'name'=>$product['name']);
            if($i == 6){
                break;
            }
            $i++;
        }
        return $products;
    }


	function detail_en(){
		$id = I('id');
	
		//1、获取解决方案数据
		$plan = M('plan') -> where("id = $id") -> find();
	
		//2，获取关联得产品信息
		$prodata = M('product') -> table("dy_product dp, dy_plan_relation_product dr") ->
		where("dr.plan_id = $id and dr.pro_id = dp.id")->
		select();
	
		//应用市场导航部分
    	$plannav = M('plan') -> where('state = 1') ->where('edition=2') -> order('id desc') ->select();
    	$this->assign("plannav",$plannav);
	
		$this->assign("prodata",$prodata);
		$this->assign("plan",$plan);
		$this->display("/en/jjfa_en");
	}
	public function test(){
	    $this->display("/zh/category");
    }
}


