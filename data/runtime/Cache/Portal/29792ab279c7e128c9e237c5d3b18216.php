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
	<!--[if IE 9]>
		<script src="../js/html5shiv.min.js"></script>
		<script src="../js/respond.min.js"></script>
	<![endif]-->
	<title>一佳门窗 - 职业发展</title>
	<!--bootstrap-->
	<link rel="Shortcut Icon" href="/themes/simplebootx/Public/diye/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/bootstrap.css">
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/base.css">
	<script src="/themes/simplebootx/Public/diye/js/jquery.min.js" type="text/javascript"></script>
    <script src="/themes/simplebootx/Public/diye/js/bootstrap.js" type="text/javascript"></script>
    <script src="/themes/simplebootx/Public/diye/js/base.js" type="text/javascript"></script>
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/kcxfz.css">
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

<!--内容-->
<section>
	<div class="banner">
		<div class="content">
			<div class="container">
				<h1>职业发展</h1>
				<p>员工是一佳最重要的资产，更是一佳最重要的投资事项。每位员工都与一佳共同成长、创造价值。<br>回馈一佳员工，提供优质待遇、培训机制及真诚的关怀;为员工不断建立上升通道，通过奋斗为员工建立长期保障。</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-10">
				<div class="zyfz-content zyfz-top clearfix mt40">
					<?php if(is_array($zydeveData)): foreach($zydeveData as $key=>$xo): ?><div class="zyfz-section">
							<div class="zyfz-title"><?php echo ($xo["title"]); ?></div>
							<div class="zyfz-text">
								<p><?php echo ($xo["content"]); ?></p>
							</div>
						</div><?php endforeach; endif; ?>
				</div>
				<hr class="marginTop60 paddingBottom20">
				<div class="zyfz-tsrc text-center marginBottom40">
					<?php if(is_array($zydeveDatb)): foreach($zydeveDatb as $key=>$vo): ?><div class="zyfz-h1"><?php echo ($vo["title"]); ?></div>
						<p><?php echo ($vo["content"]); ?></p><?php endforeach; endif; ?>
				</div>
				<div class="zyfz-content clearfix marginBottom60">
					<?php if(is_array($zydeveDatc)): foreach($zydeveDatc as $key=>$co): ?><div class="zyfz-section">
							<div class="zyfz-title"><?php echo ($co["title"]); ?></div>
							<div class="zyfz-text">
								<p><?php echo ($co["content"]); ?></p>
							</div>
						</div><?php endforeach; endif; ?>
				</div>
			</div>
			<div class="col-sm-2">
				<ul class="jyzp-ul nav padding10 mt40">
					<li><a href="<?php echo U('portal/Joindiye/joinus');?>">加入一佳</a></li>
					<li><a class="zyfz-li" href="<?php echo U('portal/Zydevelopment/index');?>">职业发展</a></li>
					<li><a href="<?php echo U('portal/Recurit/recurit');?>">精英招聘</a></li>
					<li><a href="<?php echo U('portal/professional/index');?>">专业人士</a></li>
					<li><a href="<?php echo U('portal/Campusrecruit/campusrecruit');?>">校园招聘</a></li>
				</ul>
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