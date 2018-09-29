<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<!--IE采用最新的渲染模式-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!--让双核浏览器默认选择 WebKit 内核渲染-->
	<meta name="renderer" content="webkit">
	<!--禁止百度转码-->
	<meta http-equiv="Cache-Control" content="no-siteapp">
	<!--[if IE]>
		<script src="../js/html5shiv.min.js"></script>
		<script src="../js/respond.min.js"></script>
	<![endif]-->
	<title>一佳门窗</title>
	<!--bootstrap-->
	<link rel="Shortcut Icon" href="/themes/simplebootx/Public/diye/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/bootstrap.css">
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/base.css">
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/index.css">
	<script src="/themes/simplebootx/Public/diye/js/jquery.min.js" type="text/javascript"></script>
    <script src="/themes/simplebootx/Public/diye/js/bootstrap.js" type="text/javascript"></script>
    <script src="/themes/simplebootx/Public/diye/js/base.js" type="text/javascript"></script>
    <script src="/themes/simplebootx/Public/diye/js/index.js" type="text/javascript"></script>
</head>
<body>
<!--页头-->
<script type="text/javascript">
	function exit(evnet){
		if( !confirm("确定真的要退出吗？") ){
			if( event && event.preventDefault ){
				event.preventDefault();
			}else{
				window.event.returnValue = false;
			}
			return false;
		}
	}
</script>
<nav class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<div class="navbar-header">
				<!--响应后的汉堡按钮-->
				<a class="btn btn-link navbar-toggle borderRadius0 marginTop20" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<!--logo-->
				<a href="index.php?g=portal&m=index&a=index" class="brand z1 pr"><img src="/themes/simplebootx/Public/diye/images/logo.png" alt=""></a>
			</div>
			<!--导航-->
			<div class="navbar-collapse collapse pr" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-xs navbar-xs-overflow" id="navbar-collapse-ul">
					<li class="dropdown">
						<a class="dropdown-toggle" href="index.php?g=portal&m=index&a=index">首页</a>
					</li>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="">关于一佳<b class="caret"></b></a>
						<div class="row dropdown-menu p20 border0 nava">
							<div class="col-sm-4 positionStatic marginBottom20">
								<h1 class="nav-title btnone">关于我们<span class="glyphicon nav-title-icon"></span></h1>
								<ul class="nav-ul">
									<li><a href="<?php echo U('portal/Company/company');?>">一佳概括</a></li>
									<li><a href="<?php echo U('portal/Idea/idea');?>">一佳文化</a></li>
									<!--<li><a href="<?php echo U('portal/Kcxdevelopment/kcxdevelopment');?>">可持续发展</a></li>-->
									<li><a href="<?php echo U('portal/Research/research');?>">研发创新</a></li>
									<li><a href="<?php echo U('portal/Collaborate/index');?>">公益基金</a></li>
								</ul>
							</div>
							<div class="col-sm-4 positionStatic marginBottom20">
								<h1 class="nav-title">新闻与发布<span class="glyphicon nav-title-icon"></span></h1>
								<ul class="nav-ul">
									<li><a href="<?php echo U('portal/index/news');?>">行业新闻</a></li>
									<li><a href="<?php echo U('portal/index/news');?>">公司新闻</a></li>
									<li><a href="<?php echo U('portal/Zydevelopment/index');?>">职业发展</a></li>
									<!--<li><a href="<?php echo U('portal/expo/index');?>">展会与发布</a></li>-->
									<!--<li><a href="<?php echo U('portal/investor/investor');?>">投资者关系与财务信息</a></li>-->
								</ul>
							</div>
							<div class="col-sm-4 positionStatic marginBottom20">
								<h1 class="nav-title">精英招聘<span class="glyphicon nav-title-icon"></span></h1>
								<ul class="nav-ul">
									<li><a href="<?php echo U('portal/Joindiye/joinus');?>">加入一佳</a></li>
									<li><a href="<?php echo U('portal/Recurit/recurit');?>">招聘岗位</a></li>
									<li><a href="<?php echo U('portal/professional/index');?>">专业人士</a></li>
									<li><a href="<?php echo U('portal/Campusrecruit/campusrecruit');?>">校园招聘</a></li>
								</ul>
							</div>
						</div>
					</li>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="">产品与服务<b class="caret"></b></a>
						<div class="row dropdown-menu p20 border0 nava">
							<div class="col-sm-12 positionStatic">
								<div class="row">
									<div class="col-sm-3 positionStatic">
										<h1 class="nav-title btnone">产品分类<span class="glyphicon nav-title-icon"></span></h1>
										<ul class="nav-ul">
											<li><a  href="<?php echo U('portal/product/category');?>">查看更多>>></a></li>
											<?php if(is_array($navl)): foreach($navl as $key=>$co): ?><li><a href="index.php?g=portal&m=Product&a=product&navid=<?php echo ($co["id"]); ?>"><?php echo ($co["name"]); ?></a></li><?php endforeach; endif; ?>
										</ul>
									</div>
									<div class="col-sm-9 positionStatic">
										<h1 class="nav-title">工程案例<span class="glyphicon nav-title-icon"></span></h1>
										<ul class="nav-ul nav-product-ul">
											<li><a  href="<?php echo U('portal/plan/caselist');?>">查看更多>>></a></li>
											<?php if(is_array($plannav)): foreach($plannav as $key=>$vo): ?><li><a href="index.php?g=portal&m=Plan&a=detail&id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="">支持平台<b class="caret"></b></a>
						<div class="row dropdown-menu p20 border0 nava">
							<div class="col-sm-4 positionStatic marginBottom20">
								<h1 class="nav-title btnone">沟通平台<span class="glyphicon nav-title-icon"></span></h1>
								<ul class="nav-ul">
									<li><a href="<?php echo U('portal/Visitor/visitor');?>">媒体联系</a></li>
									<li><a href="<?php echo U('portal/Opinion/index');?>">客户反馈</a></li>
									<li><a href="<?php echo U('portal/Purchase/index');?>">合作交流</a></li>
									<li><a href="<?php echo U('portal/Contact/index');?>">联系我们</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
				<!--登录-->
				<ul class="nav fr">

					<li class="user language">
						<a href=""><i class="glyphicon glyphicon-earphone"></i><?php echo ($setting['site_admin_telephone']); ?></a>
					</li>
					<?php if(session('user_login') != null){ ?>
						<li class="dropdown user ">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
								<?php if(session('user_url') != null){ ?>
									<img src="data<?php echo ($_SESSION['user_url']); ?>" class="headIcon" alt="">&nbsp;
								<?php }else{ ?>
									<img src="data\upload\avatar\headicon.png" class="headIcon" alt="">&nbsp;
								<?php }?>
								<span class="userName"><?php echo ($_SESSION['user_login']); ?></span><b class="caret"></b>
								<!--<?php if(is_array($cate)): foreach($cate as $key=>$co): ?><img src="data<?php echo ($co['user_url']); ?>" class="headIcon" alt=""><?php endforeach; endif; ?>&nbsp;<span class="userName"><?php echo ($_SESSION['user_url']); ?></span><b class="caret"></b>  -->
							</a>
							<ul class="dropdown-menu pull-right marginTop0 border0 borderRadius0">
								<li><a href="<?php echo U('portal/User/edit',array('id'=>$_SESSION['userid']));?>"><i></i>&nbsp;个人中心</a></li>
								<li><a href="<?php echo U('portal/Index/logout');?>"><i></i>&nbsp;退出</a></li>
							</ul>
						</li>
					<?php }else{ ?>
						<li class="user offline dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle"><img src="/themes/simplebootx/Public/diye/images/headicon.png" class="headIcon" alt="">&nbsp;登录<b class="caret"></b></a>

							<ul class="dropdown-menu borderRadius0 border0 margin0 padding0 userList">
								<li><a href="<?php echo U('portal/user/login');?>">登陆官网</a></li>
								<!--<li><a href="http://mail.empirechem.com" target="_blank">企业邮箱</a></li>
                				<li><a href="http://101.37.21.241" target="_blank">办公系统</a></li>
                				<li><a href="http://empirechem.yunxuetang.cn/login.htm" target="_blank">培训系统</a></li>-->
							</ul>
						</li>
					<?php }?>
					<li class="spacer"></li>
					<li class="user language">
						<a href="<?php echo U('portal/index/index_en');?>"><i class="glyphicon glyphicon-globe"></i>English</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>

<!--图片轮播-->
<div>
	<div class="carousel slide" id="banner" data-ride="carousel">
		<!--轮播列表-->
		<ol class="carousel-indicators">
			<?php if($picdata[0]['state'] == 1){?>
				<li data-slide-to="0" class="active" data-target="#banner"></li>
			<?php }?>
			
			<?php if($picdata[1]['state'] == 1){?>
				<li data-slide-to="1" data-target="#banner"></li>
			<?php }?>
			
			<?php if($picdata[2]['state'] == 1){?>
				<li data-slide-to="2" data-target="#banner"></li>
			<?php }?>
			
		</ol>
		<!--轮播图片-->
		<div class="carousel-inner">
			<?php if($picdata[0]['state'] == 1){?>
			<div class="item active">
				<a href="/index.php?g=portal&m=Article&a=index&id={$picdata[0]['postid']}"></a>
				<a href="/index.php?g=portal&m=Article&a=index&id=<?php echo ($picdata[0]['postid']); ?>" target="_blank"><span class="zhezhao"></span><img src="<?php echo ($picdata[0]['imgpath']); ?>" alt=""></a>
				<div class="item-section">
					<h1 class="item-title"><?php echo ($picdata[0]['post_title']); ?></h1>
					<p class="pt20 pb20"><?php echo ($picdata[0]['post_excerpt']); ?></p>
					<a href="/index.php?g=portal&m=Article&a=index&id=<?php echo ($picdata[0]['postid']); ?>" class="carousel-btn">了解详情</a>
				</div>
			</div>
			<?php }?>
			
			<?php if($picdata[1]['state'] == 1){?>
			<div class="item">
				<a href="/index.php?g=portal&m=Article&a=index&id={$picdata[1]['postid']}"></a>
				<a href="/index.php?g=portal&m=Article&a=index&id=<?php echo ($picdata[1]['postid']); ?>" target="_blank"><span class="zhezhao"></span><img src="<?php echo ($picdata[1]['imgpath']); ?>" alt=""></a>
				<div class="item-section">
					<h1 class="item-title"><?php echo ($picdata[1]['post_title']); ?></h1>
					<p class="pt20 pb20"><?php echo ($picdata[1]['post_excerpt']); ?></p>
					<a href="/index.php?g=portal&m=Article&a=index&id=<?php echo ($picdata[1]['postid']); ?>" class="carousel-btn">了解详情</a>
				</div>
			</div>
			<?php }?>
			
			<?php if($picdata[2]['state'] == 1){?>
			<div class="item">
				<a href="/index.php?g=portal&m=Article&a=index&id={$picdata[2]['postid']}"></a>
				<a href="/index.php?g=portal&m=Article&a=index&id=<?php echo ($picdata[2]['postid']); ?>" target="_blank"><span class="zhezhao"></span><img src="<?php echo ($picdata[2]['imgpath']); ?>" alt=""></a>
				<div class="item-section">
					<h1 class="item-title"><?php echo ($picdata[2]['post_title']); ?></h1>
					<p class="pt20 pb20"><?php echo ($picdata[2]['post_excerpt']); ?></p>
					<a href="/index.php?g=portal&m=Article&a=index&id=<?php echo ($picdata[2]['postid']); ?>" class="carousel-btn">了解详情</a>
				</div>
			</div>
			<?php }?>
			
		</div>
		<!--上下翻页按钮-->
		<a href="#banner" class="carousel-control left" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a href="#banner" class="carousel-control right" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
</div>

<!--内容-->
<section>
	<div class="container">
		<div class="section-company">
			<div class="row padding10 mt60 marginBottom25">
				<?php if(is_array($companyDate)): foreach($companyDate as $key=>$vo): ?><div class="fn col-sm-6 w100">
					<div class="section-title">
						<h1 class="company-title marginTop60 marginBottom20"><a href="<?php echo U('portal/Company/company');?>">快速了解<span class="orange">一佳门窗</span></a></h1>
						<p class="company-text"><a href="<?php echo U('portal/Company/company');?>"><?php echo ($vo["abstract"]); ?></a></p>
					</div>
				</div>
				<div class="fn w100 col-sm-6">
					<a href="<?php echo U('portal/Company/company');?>"><img src="data<?php echo ($vo['imgpath']); ?>" alt=""></a>
				</div><?php endforeach; endif; ?>
			</div>
			<div class="row">
				<div class="col-sm-4 marginTop10">
					<a href="<?php echo U('portal/Company/company');?>">
						<h2><span class="company-span glyphicon glyphicon-home"></span>公司介绍</h2>
						<div class="company-text marginTop15">
							<?php if(is_array($companyDate)): foreach($companyDate as $key=>$zi): ?><p><?php echo ($zi["title"]); ?></p><?php endforeach; endif; ?>
						</div>
					</a>
				</div>
				<div class="col-sm-4 marginTop10">
					<a href="<?php echo U('portal/History/history');?>">
						<h2><span class="company-span glyphicon glyphicon-time"></span>发展历史</h2>
						<div class="company-text marginTop15">
							<?php if(is_array($histdata)): foreach($histdata as $key=>$po): ?><p><?php echo ($po[content]); ?></p><?php endforeach; endif; ?>
						</div>
					</a>
				</div>
				<div class="col-sm-4 marginTop10">
					<a href="<?php echo U('portal/Collaborate/index');?>">
						<h2><span class="company-span glyphicon glyphicon-yen"></span>投资基金</h2>
						<div class="company-text marginTop15">
							<?php if(is_array($funds)): foreach($funds as $key=>$fo): ?><p><?php echo ($fo["introduce"]); ?></p><?php endforeach; endif; ?>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- 产品列表 -->
		<!-- <div class="product-wrap">
			<h2 class="marginTop35 marginBottom20">一佳产品</h2>

			<div class="row">
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54fd5aee57715.png"></a>
					</div>
					<h3 class="text-center">美式提拉窗系列</h3>
					<p class="product-desc">上下双提拉窗是区别于传 统欧式门窗内外开和普通推拉模式的新型隔热铝合金窗，采用纯美式风格的...</p>
				</div>
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f58101cfce6.jpg"></a>
					</div>
					<h3 class="text-center">美式内倾推拉窗系列</h3>
					<p class="product-desc">内倒侧滑窗是区别于传统欧式门窗内外开和普通推拉模式的新型隔热铝合金窗，综合了推拉式门窗的灵...</p>
				</div>
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f5811134cda.jpg"></a>
					</div>
					<h3 class="text-center">静佳系列  隔音窗</h3>
					<p class="product-desc">您所希望的宁静空间可以通过堡屋门窗系统来实现，堡屋门窗系统选用的材料与精准的生产，安装工艺...</p>
				</div>
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f5812231e46.jpg"></a>
					</div>
					<h3 class="text-center">融家系列  保温窗</h3>
					<p class="product-desc">通常建筑物的门窗面积占外墙总面积的10-15%，但所散发的能量却超越了建筑总能耗的10%，...</p>
				</div>
			</div>

			<div class="row">
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f58135da0a8.jpg"></a>
					</div>
					<h3 class="text-center">密家系列  密封窗</h3>
					<p class="product-desc">堡屋门窗系统多重的压缩式密封，合理的节约设计， 精选的密封材料。在关闭状态下杜绝空气、雨水...</p>
				</div>
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f582297436d.jpg"></a>
					</div>
					<h3 class="text-center">严仕系列  坚固窗</h3>
					<p class="product-desc">堡屋严仕门窗 ， 拥有一流的材料可确保外形及功能经久不衰，能够承受各种气候状况或外力的入侵...</p>
				</div>
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f582441c47a.jpg"></a>
					</div>
					<h3 class="text-center">卫仕系列  防盗窗</h3>
					<p class="product-desc">家是安全的港湾，谁也不希望这个安全港受到不速之客的打扰。堡屋门窗在满足建筑物的功能性的前提...</p>
				</div>
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f582678b45a.jpg"></a>
					</div>
					<h3 class="text-center">耐驰系列  全能窗</h3>
					<p class="product-desc">坚固的窗体，集成各个子系统的优点，是一款经过严格的整合及实践的高质量、标准化的产品。此系统...</p>
				</div>
			</div>
		</div> -->
	<div class="product-wrap">
		<div class="container">
			<h2 class="product-title">一佳产品</h2>
			<div class="text-right"><a href="<?php echo U('portal/product/category');?>">更多</a></div>
			<div class="row marginBottom60">
				<div class="product-item big col-sm-6">
					<div class="product-pic">
						<a href="<?php echo U('product/productdetail',array('id'=>$product[0]['id']));?>"><img src="data/<?php echo ($product[0]['picpath']); ?>" alt="<?php echo ($product[0]['name']); ?>"></a>
					</div>
					<h3 class="text-overflow"><?php echo ($product[0]['name']); ?></h3>
					<p class="product-desc"><?php echo ($product[0]['features']); ?>...</p>
				</div>

				<div class="col-sm-6">
					<div class="row">

						<?php if(is_array($product)): foreach($product as $k=>$p2): if(in_array($k, array(1,2,3,4))): ?><div class="product-item marginBottom20 col-sm-6">
								<div class="product-pic">
									<a href="<?php echo U('product/productdetail',array('id'=>$p2['id']));?>"><img src="data/<?php echo ($p2['picpath']); ?>" alt="<?php echo ($p2['name']); ?>"></a>
								</div>
								<h3 class="text-overflow"><?php echo ($p2['name']); ?></h3>
								<p class="text-overflow product-desc"><?php echo ($p2['features']); ?>...</p>
							</div><?php endif; endforeach; endif; ?>
						<!--<div class="product-item marginBottom20 col-sm-6">
							<div class="product-pic">
								<a href=""><img src="http://www.baohau.com/Public/Uploads//54f5811134cda.jpg"></a>
							</div>
							<h3 class="text-overflow">静佳系列  隔音窗</h3>
							<p class="product-desc text-overflow">您所希望的宁静空间可以通过堡屋门窗系统来实现，堡屋门窗系统选用的材料与精准的生产，安装工艺...</p>
						</div>
						<div class="product-item marginBottom20 col-sm-6">
							<div class="product-pic">
								<a href=""><img src="http://www.baohau.com/Public/Uploads//54f5811134cda.jpg"></a>
							</div>
							<h3 class="text-overflow">静佳系列  隔音窗</h3>
							<p class="product-desc text-overflow">您所希望的宁静空间可以通过堡屋门窗系统来实现，堡屋门窗系统选用的材料与精准的生产，安装工艺...</p>
						</div>
						<div class="product-item marginBottom20 col-sm-6">
							<div class="product-pic">
								<a href=""><img src="http://www.baohau.com/Public/Uploads//54f5812231e46.jpg"></a>
							</div>
							<h3 class="text-overflow">融家系列  保温窗</h3>
							<p class="product-desc text-overflow">通常建筑物的门窗面积占外墙总面积的10-15%，但所散发的能量却超越了建筑总能耗的10%，...</p>
						</div>-->
					</div>
				</div>
				<?php if(is_array($product)): foreach($product as $k=>$p3): if(in_array($k,array(5,6,7,8))): ?><div class="product-item col-sm-3">
							<div class="product-pic">
								<a href="<?php echo U('product/productdetail',array('id'=>$p3['id']));?>"><img src="data/<?php echo ($p3['picpath']); ?>" alt="<?php echo ($p3['name']); ?>"></a>
							</div>
							<h3 class="text-overflow"><?php echo ($p3['name']); ?></h3>
							<p class="product-desc text-overflow"><?php echo ($p3['features']); ?>...</p>
						</div><?php endif; endforeach; endif; ?>
				<!--<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f582297436d.jpg"></a>
					</div>
					<h3 class="text-overflow">严仕系列  坚固窗</h3>
					<p class="product-desc text-overflow">堡屋严仕门窗 ， 拥有一流的材料可确保外形及功能经久不衰，能够承受各种气候状况或外力的入侵...</p>
				</div>
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f582441c47a.jpg"></a>
					</div>
					<h3 class="text-overflow">卫仕系列  防盗窗</h3>
					<p class="product-desc text-overflow">家是安全的港湾，谁也不希望这个安全港受到不速之客的打扰。堡屋门窗在满足建筑物的功能性的前提...</p>
				</div>
				<div class="product-item col-sm-3">
					<div class="product-pic">
						<a href=""><img src="http://www.baohau.com/Public/Uploads//54f582678b45a.jpg"></a>
					</div>
					<h3 class="text-overflow">耐驰系列  全能窗</h3>
					<p class="product-desc text-overflow">坚固的窗体，集成各个子系统的优点，是一款经过严格的整合及实践的高质量、标准化的产品。此系统...</p>
				</div>-->
			</div>
		</div>
	</div>

<style>
	.news-wrap h2 {
		color: #f99724;
	}
</style>

	<div class="container">
		<!-- 新闻中心 -->
		<div class="news-wrap">
			<h2 class="marginTop60 text-center marginBottom20" style="font-family: '微软雅黑'">新闻中心</h2>
			<div id="news" class="section-industry">
				<ul class="pull-right">
					<li class="news-btn news-btn-left glyphicon glyphicon-menu-left"></li>
					<li class="news-btn news-btn-right glyphicon glyphicon-menu-right"></li>
				</ul>
				<div class="industry-content">
					<div class="industry-img clearfix">
						<?php if(is_array($information)): foreach($information as $key=>$vo): ?><div class="industry-img-content">
								<a href="index.php?g=portal&m=Article&a=index&id=<?php echo ($vo["id"]); ?>">
									<img src="<?php echo ($vo['smeta']); ?>" alt="">
									<div class="industry-article">
										<h2><?php echo ($vo["post_title"]); ?></h2>
										<p><?php echo ($vo["post_excerpt"]); ?></p>
									</div>
								</a>
							</div><?php endforeach; endif; ?>
					</div>
				</div>
			</div>
		</div>

		<hr class="marginBottom60">
		<!-- 招聘信息 -->
		<div class="recruit row marginBottom60">
			<!-- 招聘信息 -->
			<div class="col-sm-4">
				<h3 class="marginBottom20">人才招聘</h3>
				<div class="recruit-textBg clearfix">你或许可以在这里找到一门适合你的工作，并收获一个大家庭</div>
				<div class="marginTop35 clearfix marginBottom20">
					<a class="recruit-btn btn btn-warning mr15" href="<?php echo U('portal/recurit/recurit');?>">社会招聘</a>
					<a class="recruit-btn btn btn-warning" href="<?php echo U('portal/campusrecruit/campusrecruit');?>">校园招聘</a>
				</div>
			</div>
			<!-- 招聘表格 -->
			<div class="col-sm-8">
				<div class="col-sm-6">
					<div class="table-responsive border0">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>社会招聘</th>
									<th class="text-right"><a href="<?php echo U('portal/recurit/recurit');?>">更多</a></th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($newRecurit)): foreach($newRecurit as $key=>$ao): ?><tr data-toggle='modal' data-target='#avc<?php echo ($ao["id"]); ?>'>
										<td><?php echo ($ao["name"]); ?></td>
										<td class="text-right">
											<?php echo ($ao["createtime"]); ?>
										</td>
									</tr><?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="table-responsive border0">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>校园招聘</th>
									<th class="text-right"><a href="<?php echo U('portal/campusrecruit/campusrecruit');?>">更多</a></th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($newCampusrecruit)): foreach($newCampusrecruit as $key=>$no): ?><tr data-toggle='modal' data-target='#as<?php echo ($no["id"]); ?>'>
										<td><?php echo ($no["name"]); ?></td>
										<td class="text-right">
											<?php echo ($no["createtime"]); ?>
										</td>
									</tr><?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- 弹窗 -->
				<?php if(is_array($newRecurit)): foreach($newRecurit as $key=>$ho): ?><div class="modal fade" id="avc<?php echo ($ho["id"]); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</pan><span class="sr-only">Close</span></button>
										<h4 class="modal-title"><?php echo ($ho["name"]); ?></h4>
									</div>
									<div class="modal-body">
										<div class="row paddingTop10">
											<div class="col-sm-6 paddingBottom10">职位类别：<?php echo ($ho["model"]); ?></div>
											<div class="col-sm-6 paddingBottom10">工作地点：<?php echo ($ho["origin"]); ?></div>
											<div class="col-sm-6 paddingBottom10">发布时间：<?php echo ($ho["createtime"]); ?></div>
											<div class="col-sm-6 paddingBottom10">薪　　资：<?php echo ($ho["pay"]); ?></div>
										</div>
										<h2>职责:</h2>
										<p><?php echo ($ho["responsibilities"]); ?></p>
										<h2>要求:</h2>
										<p><?php echo ($ho["require"]); ?></p>
									</div>
									<div class="modal-footer">
										<form action="<?php echo U('portal/Recurit/add_recurit');?>" method="POST" class="text-left" enctype="multipart/form-data">
											<input type="hidden" name="id" value="<?php echo ($ho["id"]); ?>" />
											<div class="clearfix">
												<label for="file" class="pull-left">简历资料：</label>
												<input type="file" onchange="updateFiles(this)" name="file" required="" class="pull-left">
											</div>
											<p class="message">请将简历资料命好名并上传,只允许上传rar,zip,7z格式的文件</p>
											<input type="submit" class="pull-right btn btn-warning" value="投递简历">
										</form>
									</div>
								</div>
							</div>
						</div><?php endforeach; endif; ?>
				<!-- 弹窗2 -->
				<?php if(is_array($newCampusrecruit)): foreach($newCampusrecruit as $key=>$ko): ?><div class="modal fade" id="as<?php echo ($ko["id"]); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</pan><span class="sr-only">Close</span></button>
										<h4 class="modal-title"><?php echo ($ko["name"]); ?></h4>
									</div>
									<div class="modal-body">
										<div class="row paddingTop10">
											<div class="col-sm-6 paddingBottom10">职位类别：<?php echo ($ko["model"]); ?></div>
											<div class="col-sm-6 paddingBottom10">工作地点：<?php echo ($ko["origin"]); ?></div>
											<div class="col-sm-6 paddingBottom10">发布时间：<?php echo ($ko["createtime"]); ?></div>
											<div class="col-sm-6 paddingBottom10">薪　　资：<?php echo ($ko["pay"]); ?></div>
										</div>
										<h2>职责:</h2>
										<p><?php echo ($ko["responsibilities"]); ?></p>
										<h2>要求:</h2>
										<p><?php echo ($ko["require"]); ?></p>
									</div>
									<div class="modal-footer">
										<form action="<?php echo U('portal/Recurit/add_recurit');?>" method="POST" class="text-left" enctype="multipart/form-data">
											<input type="hidden" name="id" value="<?php echo ($ko["id"]); ?>" />
											<div class="clearfix">
												<label for="file" class="pull-left">简历资料：</label>
												<input type="file" onchange="updateFiles(this)" name="file" required="" class="pull-left">
											</div>
											<p class="message">请将简历资料命好名并上传,只允许上传rar,zip,7z格式的文件</p>
											<input type="submit" class="pull-right btn btn-warning" value="投递简历">
										</form>
									</div>
								</div>
							</div>
						</div><?php endforeach; endif; ?>
			</div>
		</div>
	</div>
</section>
<!--页脚-->
<!--页脚-->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<h1 class="footer-h1 f18">关于一佳</h1>
				<ul class="footer-ul">
					<li><a href="<?php echo U('portal/Company/company');?>">公司介绍</a></li>
					<li><a href="<?php echo U('portal/Idea/idea');?>">一佳理念</a></li>
					<li><a href="<?php echo U('portal/Kcxdevelopment/kcxdevelopment');?>">可持续发展</a></li>
					<li><a href="<?php echo U('portal/Research/research');?>">研发与创新</a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<h1 class="footer-h1 f18">公共服务</h1>
				<ul class="footer-ul">
					<li><a href="<?php echo U('portal/Recurit/recurit');?>">精英招聘</a></li>
					<li><a href="<?php echo U('portal/index/news');?>">新闻及媒体</a></li>
					<li><a href="<?php echo U('portal/Collaborate/index');?>">一佳投资基金</a></li>
					<!--<li><a href="<?php echo U('portal/expo/index');?>">展会与发布</a></li>
					<li><a href="<?php echo U('portal/investor/investor');?>">投资者关系</a></li>-->
					<li><a href="<?php echo U('portal/Law/index');?>">法律声明与咨询</a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<h1 class="footer-h1 f18">沟通平台</h1>
				<ul class="footer-ul">
					<li><a href="<?php echo U('portal/Purchase/index');?>">供应商合作伙伴</a></li>
					<li><a href="<?php echo U('portal/Visitor/visitor');?>">媒体联系</a></li>
					<li><a href="<?php echo U('portal/Opinion/index');?>">客户反馈</a></li>
				</ul>
			</div>
			<div class="footer-gzwm col-sm-4 col-sm-offset-2 text-center">
				<h1 class="footer-h1 f18">关注我们</h1>
				<ul class="footer-ul">
					<li class="col-sm-6"><a href="">
						<img src="/themes/simplebootx/Public/diye/images/weibo.jpg" alt="">
						<p>官方微博</p>
					</a></li>
					<li class="col-sm-6"><a href="">
						<img src="/themes/simplebootx/Public/diye/images/weixin.jpg" alt="">
						<p>微信公众号</p>
					</a></li>
				</ul>
			</div>
		</div>
		<hr>
		<p class="text-center marginBottom25">Copyright &copy; 2017 一佳门窗. All Rights Reserved. 沪ICP备15055031号-1</p>
	</div>
</footer>
</body>
</html>