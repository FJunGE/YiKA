<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
	<title>EmpireChem - Join us</title>
	<!--bootstrap-->
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/bootstrap.css">
	<link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/base.css">
	<script src="/themes/simplebootx/Public/diye/js/jquery.min.js" type="text/javascript"></script>
    <script src="/themes/simplebootx/Public/diye/js/bootstrap.js" type="text/javascript"></script>
    <script src="/themes/simplebootx/Public/diye/js/base.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/themes/simplebootx/Public/diye/css/joinus.css">
</head>
<body>
<!--页头-->
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
                                <li><a href="http://mail.empirechem.com">Mail login</a></li>
                                <li><a href="http://101.37.21.241">OA Login</a></li>
                                <li><a href="">Training system login</a></li>
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

<!--内容-->
<section>
	<div class="banner">
		<img class="banner-img" src="/themes/simplebootx/Public/diye/images/joinus.jpg" alt="">
		<div class="container banner-section">
			<h2>Join Us</h2>
			<p>We treat our employees as the biggest assets. EmpireChem’s success as a leading company relies on the personal engagement of our employees.</p>
			<p>We encourage our staff to develop their strengths, and we recognize their achievements. We form the best team. Become part of it.</p>
			<div class="banner-btn">
				<a href="<?php echo U('portal/Recurit/recurit_en');?>" class="btn btn-warning marginRight35 marginTop20">Society Recruitment</a>
				<a href="<?php echo U('portal/Campusrecruit/campusrecruit_en');?>" class="btn btn-warning marginTop20">Campus Internships</a>
			</div>
		</div>
	</div>
	<div class="container paddingBottom60 marginTop35">
		<div class="row">
			<div class="col-sm-10 section-text">
				<?php if(is_array($joindiyeData)): foreach($joindiyeData as $key=>$vo): ?><h1 class="section-h1 text-center"><?php echo ($vo["title"]); ?></h1>
				<hr>
				<p><?php echo ($vo["content"]); ?></p><?php endforeach; endif; ?>
				<p>To join us：</p>
				<div class="row">
					<div class="section-list text-center col-sm-3">
						<a href="<?php echo U('portal/Zydevelopment/index_en');?>"><div class="list-title"><h2>Career Development</h2></div></a>
					</div>
					<div class="section-list text-center col-sm-3">
						<a href="<?php echo U('portal/Campusrecruit/campusrecruit_en');?>"><div class="list-title"><h2>Campus Internships</h2></div></a>
					</div>
					<div class="section-list text-center col-sm-3">
						<a href="<?php echo U('portal/professional/index_en');?>"><div class="list-title"><h2>Opportunities for Talents</h2></div></a>
					</div>
					<div class="section-list text-center col-sm-3">
						<a href="<?php echo U('portal/Recurit/recurit_en');?>"><div class="list-title"><h2>Job Search</h2></div></a>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<ul class="jyzp-ul nav padding10 mt40">
					<li><a class="jrdy-li" href="<?php echo U('portal/Joindiye/joinus');?>">Joining us</a></li>
					<li><a href="<?php echo U('portal/Zydevelopment/index_en');?>">Career Development</a></li>
					<li><a href="<?php echo U('portal/Recurit/recurit');?>">Job Search</a></li>
					<li><a href="<?php echo U('portal/professional/index_en');?>">Opportunities for Talents</a></li>
					<li><a href="<?php echo U('portal/Campusrecruit/campusrecruit_en');?>">Campus Internships</a></li>
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