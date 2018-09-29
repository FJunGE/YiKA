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
    <title>YIKA Window&Door</title>
    <!--bootstrap-->
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

<!--图片轮播-->
<div class="container">
    <div class="carousel slide" id="banner" data-ride="carousel">
        <!--轮播列表-->
        <ol class="carousel-indicators">
            <?php if($picdata[3]['state'] == 1){?>
                <li data-slide-to="0" class="active" data-target="#banner"></li>
            <?php }?>
            
            <?php if($picdata[4]['state'] == 1){?>
                <li data-slide-to="1" data-target="#banner"></li>
            <?php }?>
            
            <?php if($picdata[5]['state'] == 1){?>
                <li data-slide-to="2" data-target="#banner"></li>
            <?php }?>
            
        </ol>
        <!--轮播图片-->
        <div class="carousel-inner">
            <?php if($picdata[3]['state'] == 1){?>
            <div class="item active">
                <a href="/index.php?g=portal&m=article&a=index_en&id={$picdata[3]['postid']}"></a>
                <a href="/index.php?g=portal&m=article&a=index_en&id=<?php echo ($picdata[3]['postid']); ?>" target="_blank"><span class="zhezhao"></span><img src="<?php echo ($picdata[3]['imgpath']); ?>" alt=""></a>
                <div class="item-section">
                    <h1 class="item-title"><?php echo ($picdata[3]['post_title']); ?></h1>
                    <p class="pt20 pb20"><?php echo ($picdata[3]['post_excerpt']); ?></p>
                    <a href="index.php?g=portal&m=article&a=index_en&id=<?php echo ($picdata[3]['postid']); ?>" class="carousel-btn">details</a>
                </div>
            </div>
            <?php }?>
            
            <?php if($picdata[4]['state'] == 1){?>
            <div class="item">
                <a href="/index.php?g=portal&m=Article&a=index_en&id={$picdata[4]['postid']}"></a>
                <a href="/index.php?g=portal&m=Article&a=index_en&id=<?php echo ($picdata[4]['postid']); ?>" target="_blank"><span class="zhezhao"></span><img src="<?php echo ($picdata[4]['imgpath']); ?>" alt=""></a>
                <div class="item-section">
                    <h1 class="item-title"><?php echo ($picdata[4]['post_title']); ?></h1>
                    <p class="pt20 pb20"><?php echo ($picdata[4]['post_excerpt']); ?></p>
                    <a href="index.php?g=portal&m=Article&a=index_en&id=<?php echo ($picdata[4]['postid']); ?>" class="carousel-btn">details</a>
                </div>
            </div>
            <?php }?>
            
            <?php if($picdata[5]['state'] == 1){?>
            <div class="item">
                <a href="/index.php?g=portal&m=Article&a=index_en&id={$picdata[5]['postid']}"></a>
                <a href="/index.php?g=portal&m=Article&a=index_en&id=<?php echo ($picdata[5]['postid']); ?>" target="_blank"><span class="zhezhao"></span><img src="<?php echo ($picdata[5]['imgpath']); ?>" alt=""></a>
                <div class="item-section">
                    <h1 class="item-title"><?php echo ($picdata[5]['post_title']); ?></h1>
                    <p class="pt20 pb20"><?php echo ($picdata[5]['post_excerpt']); ?></p>
                    <a href="index.php?g=portal&m=Article&a=index_en&id=<?php echo ($picdata[5]['postid']); ?>" class="carousel-btn">details</a>
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
                        <h1 class="company-title marginTop60 marginBottom20"><a href="<?php echo U('portal/Company/company_en');?>"><span class="orange">YIKA</span> at a glance</a></h1>
                        <p class="company-text"><a href="<?php echo U('portal/Company/company_en');?>"><?php echo ($vo["abstract"]); ?></a></p>
                    </div>
                </div>
                <div class="fn w100 col-sm-6">
                    <a href="<?php echo U('portal/Company/company_en');?>"><img src="data<?php echo ($vo['imgpath']); ?>" alt="YIKA"></a>
                </div><?php endforeach; endif; ?>
            </div>
            <div class="row">
                <div class="col-sm-4 marginTop10">
                    <a href="<?php echo U('portal/Company/company_en');?>">
                        <h2><span class="company-span glyphicon glyphicon-home"></span>Company Induction</h2>
                        <div class="company-text marginTop15">
                            <?php if(is_array($companyDate)): foreach($companyDate as $key=>$zi): ?><p><?php echo ($zi["title"]); ?></p><?php endforeach; endif; ?>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 marginTop10">
                    <a href="<?php echo U('portal/History/history_en');?>">
                        <h2><span class="company-span glyphicon glyphicon-time"></span>Developing History</h2>
                        <div class="company-text marginTop15">
                            <?php if(is_array($histdata)): foreach($histdata as $key=>$po): ?><span>in<?php echo ($po["year"]); ?> <?php echo ($po["content"]); ?></span><?php endforeach; endif; ?>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 marginTop10">
                    <a href="<?php echo U('portal/Collaborate/index_en');?>">
                        <h2><span class="company-span glyphicon glyphicon-yen"></span>YIKA Investment Fund(EFI)</h2>
                        <div class="company-text marginTop15">
                            <?php if(is_array($funds)): foreach($funds as $key=>$fo): ?><p><?php echo ($fo["introduce"]); ?></p><?php endforeach; endif; ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--新闻中心-->
        <div id="news" class="section-industry">
            <ul class="pull-right">
                <li class="news-btn news-btn-left glyphicon glyphicon-menu-left"></li>
                <li class="news-btn news-btn-right glyphicon glyphicon-menu-right"></li>
            </ul>
            <div class="section-title">             
                <h1 class="marginTop60"><a href="<?php echo U('portal/index/news_en');?>">Latest news</a></h1>
            </div>
            <div class="industry-content">
                <div class="industry-img clearfix">
                    <?php if(is_array($information)): foreach($information as $key=>$vo): ?><div class="industry-img-content">
                            <a href="index.php?g=portal&m=article&a=index_en&id=<?php echo ($vo["id"]); ?>">
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
        <hr class="marginTop35">
        <!--解决方案-->
        <div class="section-industry paddingBottom60" id="industry">
            <ul class="pull-right">
                <li class="industry-btn industry-left glyphicon glyphicon-menu-left"></li>
                <li class="industry-btn industry-right glyphicon glyphicon-menu-right"></li>
            </ul>
            <div class="section-title">             
                <a href="javascript:;"><h1 class="marginTop60">Products</h1></a>
            </div>
            <div class="industry-content">
                <div class="industry-img clearfix">
                    <?php if(is_array($plandata)): foreach($plandata as $key=>$jk): ?><div class="industry-img-content">
                        <a href="index.php?g=portal&m=Plan&a=detail_en&id=<?php echo ($jk["id"]); ?>">
                            <img src="data/<?php echo ($jk["picpath"]); ?>" alt="">
                            <div class="industry-article text-center">
                                <h2><?php echo ($jk["title"]); ?></h2>
                                <div class="jjfa-text">
                                    <p><?php echo ($jk["plan_content"]); ?></p>
                                </div>
                            </div>
                        </a>
                    </div><?php endforeach; endif; ?>
                </div>
            </div>
        </div>
        <!--<hr class="marginBottom60">
        	 招聘信息
        <div class="recruit row marginBottom60"> -->
            <!-- 招聘信息
            <div class="col-sm-4">
                <h3 class="marginBottom20">Job Search</h3>
                <div class="recruit-textBg clearfix">EmpireChem offers an incredible number of ways to enter the company and employment experts and professionals in a wide range of areas.</div>
                <div class="marginTop35 clearfix marginBottom20">
                    <a class="recruit-btn btn btn-warning mr15" href="<?php echo U('portal/recurit/recurit_en');?>">Society Recruitment</a>
                    <a class="recruit-btn btn btn-warning" href="<?php echo U('portal/campusrecruit/campusrecruit_en');?>">Campus Internships</a>
                </div>
            </div> -->
            <!-- 招聘表格
            <div class="col-sm-8">
                <div class="col-sm-6">
                    <div class="table-responsive border0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Society Recruitment</th>
                                    <th class="text-right"><a href="<?php echo U('portal/recurit/recurit_en');?>">more</a></th>
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
                                    <th>Campus Internships</th>
                                    <th class="text-right"><a href="<?php echo U('portal/campusrecruit/campusrecruit_en');?>">more</a></th>
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
                 -->
                <!-- 弹窗 
                <?php if(is_array($newRecurit)): foreach($newRecurit as $key=>$ho): ?><div class="modal fade" id="avc<?php echo ($ho["id"]); ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</pan><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title"><?php echo ($ho["name"]); ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row paddingTop10">
                                            <div class="col-sm-6 paddingBottom10">Types：<?php echo ($ho["model"]); ?></div>
                                            <div class="col-sm-6 paddingBottom10">Location：<?php echo ($ho["origin"]); ?></div>
                                            <div class="col-sm-6 paddingBottom10">Valid from：<?php echo ($ho["createtime"]); ?></div>
                                            <div class="col-sm-6 paddingBottom10">Benefits：<?php echo ($ho["pay"]); ?></div>
                                        </div>
                                        <h2>Duty:</h2>
                                        <p><?php echo ($ho["responsibilities"]); ?></p>
                                        <h2>require:</h2>
                                        <p><?php echo ($ho["require"]); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="<?php echo U('portal/Recurit/add_recurit');?>" method="POST" class="text-left" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo ($ho["id"]); ?>" />
                                            <div class="clearfix">
                                                <label for="file" class="pull-left">biodata：</label>
                                                <input type="file" onchange="updateFiles(this)" name="file" required="" class="pull-left">
                                            </div>
                                            <p class="message">Please send your resume and upload named, only upload rar, zip, 7z file format.</p>
                                            <input type="submit" class="pull-right btn btn-warning" value="Delivery resume">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><?php endforeach; endif; ?>
                    -->
                <!-- 弹窗2 
                <?php if(is_array($newCampusrecruit)): foreach($newCampusrecruit as $key=>$ko): ?><div class="modal fade" id="as<?php echo ($ko["id"]); ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</pan><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title"><?php echo ($ko["name"]); ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row paddingTop10">
                                            <div class="col-sm-6 paddingBottom10">Types：<?php echo ($ko["model"]); ?></div>
                                            <div class="col-sm-6 paddingBottom10">Location：<?php echo ($ko["origin"]); ?></div>
                                            <div class="col-sm-6 paddingBottom10">Valid from：<?php echo ($ko["createtime"]); ?></div>
                                            <div class="col-sm-6 paddingBottom10">Benefits：<?php echo ($ko["pay"]); ?></div>
                                        </div>
                                        <h2>Duty:</h2>
                                        <p><?php echo ($ko["responsibilities"]); ?></p>
                                        <h2>require:</h2>
                                        <p><?php echo ($ko["require"]); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="<?php echo U('portal/Recurit/add_recurit');?>" method="POST" class="text-left" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo ($ko["id"]); ?>" />
                                            <div class="clearfix">
                                                <label for="file" class="pull-left">biodata：</label>
                                                <input type="file" onchange="updateFiles(this)" name="file" required="" class="pull-left">
                                            </div>
                                            <p class="message">Please send your resume and upload named, only upload rar, zip, 7z file format.</p>
                                            <input type="submit" class="pull-right btn btn-warning" value="Delivery resume">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><?php endforeach; endif; ?>
                    
            </div>
            
        </div>-->
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