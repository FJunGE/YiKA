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
		<script src="/themes/simplebootx/Public/diye/js/html5shiv.min.js"></script>
		<script src="/themes/simplebootx/Public/diye/js/respond.min.js"></script>
	<![endif]-->
	<title>EmpireChem - <?php echo ($plan["title"]); ?></title>
	<!--bootstrap-->
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/bootstrap.css">
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/base.css">
	<script src="/themes/simplebootx/Public/diye/js/jquery.min.js" type="text/javascript"></script>
    <script src="/themes/simplebootx/Public/diye/js/bootstrap.js" type="text/javascript"></script>
    <script src="/themes/simplebootx/Public/diye/js/base.js" type="text/javascript"></script>
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/newsxx.css">
	<style>
	</style>
</head>
<body>
<script type="text/javascript">
    function exit(evnet){
        if( !confirm("Are you sure?") ){
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
                <a href="index.php?g=portal&m=index&a=index_en" class="brand z1 pr"><img src="/themes/simplebootx/Public/diye/images/logo.png" alt=""></a>
            </div>
            <!--导航-->
            <div class="navbar-collapse collapse pr" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-xs navbar-xs-overflow" id="navbar-collapse-ul">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="">Company<b class="caret"></b></a>
                        <div class="row dropdown-menu p20 border0 nava">
                            <div class="col-sm-4 positionStatic marginBottom20">
                                <h1 class="nav-title btnone">About Us<span class="glyphicon nav-title-icon"></span></h1>
                                <ul class="nav-ul">
                                    <li><a href="<?php echo U('portal/Company/company_en');?>">Company Induction</a></li>
                                    <li><a href="<?php echo U('portal/Kcxdevelopment/kcxdevelopment_en');?>">Sustainability</a></li>
                                    <li><a href="<?php echo U('portal/Collaborate/index_en');?>">EmpireChem Investment Fund(EIF)</a></li>
                                    <li><a href="<?php echo U('portal/Idea/idea_en');?>">Business Philosophy</a></li>
                                    <li><a href="<?php echo U('portal/Research/research_en');?>">Research &amp; Innovation</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4 positionStatic marginBottom20">
                                <h1 class="nav-title">Newswall<span class="glyphicon nav-title-icon"></span></h1>
                                <ul class="nav-ul">
                                    <li><a href="<?php echo U('portal/index/news_en');?>">Industry News</a></li>
                                    <li><a href="<?php echo U('portal/investor/investor_en');?>">Investors Relations &amp; Finance</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4 positionStatic marginBottom20">
                                <h1 class="nav-title">Job Search<span class="glyphicon nav-title-icon"></span></h1>
                                <ul class="nav-ul">
                                    <li><a href="<?php echo U('portal/Joindiye/joinus_en');?>">Why joining us?</a></li>
                                    <li><a href="<?php echo U('portal/Zydevelopment/index_en');?>">Career Development</a></li>
                                    <li><a href="<?php echo U('portal/Recurit/recurit_en');?>">Job Search</a></li>
                                    <li><a href="<?php echo U('portal/professional/index_en');?>">Opportunities for Talents</a></li>
                                    <li><a href="<?php echo U('portal/Campusrecruit/campusrecruit_en');?>">Campus Internships</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="">Industries<b class="caret"></b></a>
                        <div class="row dropdown-menu p20 border0 nava">
                            <div class="col-sm-12 positionStatic">
                                <div class="row">
                                    <div class="col-sm-12 positionStatic marginBottom20">
                                        <h1 class="nav-title btnone">Industries<span class="glyphicon nav-title-icon"></span></h1>
                                        <ul class="nav-ul nav-product-ul clearfix en">
                                            <?php if(is_array($plannav)): foreach($plannav as $key=>$vo): ?><li><a href="index.php?g=portal&m=Plan&a=detail_en&id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="">Supporting Panel<b class="caret"></b></a>
                        <div class="row dropdown-menu p20 border0 nava">
                            <div class="col-sm-4 positionStatic marginBottom20">
                                <h1 class="nav-title btnone">Supporting Panel<span class="glyphicon nav-title-icon"></span></h1>
                                <ul class="nav-ul">
                                    <li><a href="<?php echo U('portal/Visitor/visitor_en');?>">Media Contact</a></li>
                                    <li><a href="<?php echo U('portal/Contact/index_en');?>">Locations &amp; Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--登录-->
                <ul class="nav fr">
                    <li class="user language">
                        <a href=""><i class="glyphicon glyphicon-earphone"></i><?php echo ($setting['site_admin_english_telephone']); ?></a>
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
                                <li><a href="<?php echo U('portal/User/edit',array('id'=>$_SESSION['userid']));?>"><i></i>&nbsp;Personal Center</a></li>
                                <li><a href="<?php echo U('portal/Index/logout');?>"><i></i>&nbsp;login out</a></li>
                            </ul>
                        </li>
                    <?php }else{ ?>
                        <li class="user offline dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle"><img src="/themes/simplebootx/Public/diye/images/headicon.png" class="headIcon" alt="">&nbsp;log in<b class="caret"></b></a>
                             
                             <ul class="dropdown-menu borderRadius0 border0 margin0 padding0 userList">
                                <li><a href="<?php echo U('portal/user/login_en');?>">Login</a></li>
                                <!--<li><a href="http://mail.empirechem.com">Mail login</a></li>-->
                                <!--<li><a href="http://101.37.21.241">OA Login</a></li>-->
                                <!--<li><a href="">Training system login</a></li>-->
                            </ul>
                        </li>
                    <?php }?>
                    <li class="spacer"></li>
                    <li class="user language">
                        <a href="<?php echo U('portal/index/index');?>"><i class="glyphicon glyphicon-globe"></i>中文版</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="jjfa container">
	<ol class="breadcrumb borderRadius0 marginTop10">
		<li><a href="index.php?g=portal&m=index&a=index_en">Home</a></li>
		<li class="active"><?php echo ($plan["title"]); ?></li>	
	</ol>
	<div class="jjfa-h1"><?php echo ($plan["title"]); ?></div>
	<hr>
	<div class="row">
		<div class="jjfa-text col-sm-8">
			<p>
				<?php echo ($plan["plan_content"]); ?>
			</p>
		</div>
		<div class="col-sm-4"><img src="data/<?php echo ($plan["picpath"]); ?>" alt=""></div>
		<div class="col-xs-12 jjfa-fj marginTop10">Related accessories: <span class="glyphicon glyphicon-link"></span><a target="_blank" href="data/<?php echo ($plan["filepath"]); ?>">Download related accessories</a></div>
	</div>
	<hr>
	<div class="solutions">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#solutions1" data-toggle="tab">Detailed introduction</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="solutions1">
				<div class="solutions-name en">
					<?php echo ($plan["pro_content"]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--页脚-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <h1 class="footer-h1 f18">About Us</h1>
                <ul class="footer-ul">
                    <li><a href="<?php echo U('portal/Company/company_en');?>">Company Induction</a></li>
                    <li><a href="<?php echo U('portal/Idea/idea_en');?>">Business Philosophy</a></li>
                    <li><a href="<?php echo U('portal/Research/research_en');?>">Research &amp; Innovation</a></li>
                    <li><a href="<?php echo U('portal/Collaborate/index_en');?>">EmpireChem Investment Fund(EIF)</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h1 class="footer-h1 f18">Service</h1>
                <ul class="footer-ul">
                    <li><a href="<?php echo U('portal/Recurit/recurit_en');?>">Job Search</a></li>
                    <li><a href="<?php echo U('portal/index/news_en');?>">News &amp; Media</a></li>
                    <li><a href="<?php echo U('portal/investor/investor_en');?>">Investors Relations</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h1 class="footer-h1 f18">Communications</h1>
                <ul class="footer-ul">
                    <li><a href="<?php echo U('portal/Visitor/visitor_en');?>">Media Contact</a></li>
                    <li><a href="<?php echo U('portal/Feedback/feedback_en');?>">Guarantee &amp; Feedback</a></li>
                </ul>
            </div>
            <div class="footer-gzwm col-sm-4 col-sm-offset-2 text-center">
                <h1 class="footer-h1 f18">Follow Us</h1>
                <ul class="footer-ul">
                    <li class="col-sm-6"><a href="">
                        <img src="/themes/simplebootx/Public/diye/images/weibo.jpg" alt="">
                        <p>Sina Weibo</p>
                    </a></li>
                    <li class="col-sm-6"><a href="">
                        <img src="/themes/simplebootx/Public/diye/images/weixin.jpg" alt="">
                        <p>Wechat</p>
                    </a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="text-center marginBottom25">Copyright &copy; 2016 EmpireChem. All Rights Reserved.</p>
    </div>
</footer>
</body>
</html>