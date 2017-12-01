<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if ($title == '' or $title == null) {echo 'Mai Châu Tourist';} else {echo $title;}?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="fb:admins" content=""/>
	<meta property="fb:app_id" content="" />
	<meta name="title" content="<?=@$meta_title?>" />
	<meta name="copyright" content="Copyright © 2016 by maichautourist.com" />
	<meta name="keywords" content="<?=@$meta_keywords?>" />
	<meta name="description" content="<?=@$meta_description?>" />
	<meta name="og:title" content="<?=@$meta_title?>" />
	<meta name="og:keywords" content="<?=@$meta_keywords?>" />
	<meta name="og:description" content="<?=@$meta_description?>" />

	<link href="<?=base_url('assets/img/favicon.ico')?>" rel="shortcut icon">
	<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/bootstrap-theme.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/yamm.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/owl.carousel.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/owl.theme.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/owl.transitions.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/responsive.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
</head>

<body>
    <header class="site-header">
		<div class="logo-wrapper hidden-xs">
			<!-- Logo & hgroup -->
			<div class="container">
				<div class="row">
					<div class="site-logo col-lg-2 col-md-2 col-sm-12">
						<a href="<?=site_url()?>" title="Mai Châu Tourist">
							<img src="<?=base_url($home_logo)?>" alt="" itemprop="logo">
						</a>
					</div>

					<div class="hgroup-sidebar col-lg-10 col-md-10 col-sm-12">
						<div id="text-13" class="widget widget_text hidden-xs">
							<div class="textwidget">
								<div class="icon-with-description" style="padding-top: 1px;">
									<i class="fa fa-phone"></i>
									<span style="color: #a9a9a9; font-weight: 400; padding-bottom: 5px;">Hỗ trợ trực tuyến</span><br>
									<span style="color: #ff8006; font-weight: 600; font-size: 16px;text-align:right;display: block"><?=$home_hotline?></span>
								</div>
							</div>
						</div>
						<div id="dash_search-2" class="widget widget_dash_search hidden-xs">
							<!--Search Field-->
							<form id="header-search" action="<?=base_url('search/')?>" method="GET" class="pt-searchform">
								<input id="s_keyword" name="s_keyword" type="text" class="searchtext" value="" placeholder="Text here..." tabindex="1">
								<button id="s_submit" class="search-button" title="Find" tabindex="2"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<nav class="navbar ln-navbar affix-top yamm" id="maichauNav">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand hidden-sm hidden-md hidden-lg">
							<a href="<?=site_url()?>" title="Mai Châu Tourist">
								<img src="<?=base_url('assets/img/logo-sample.png')?>" alt="" itemprop="logo" style="max-height: 100%;">
							</a>
						</div>
						<div class="collapse navbar-collapse" style="position: relative" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="first active"><a href="<?=site_url()?>"><i class="fa fa-home"></i> Trang chủ</a></li>
								<?php if($menus) foreach ($menus as $m) {
									if ($m->type=="list"){
									// Put list in here
								?>		
								<li class="dropdown">
									<?php if($m->link && $m->link != ''){?>
										<a href="<?=@site_url($m->link)?>" class="dropdown-toggle"><?=@$m->title?> <span class="caret"></span></a>
									<?php } else{?>
										<a href="#" class="dropdown-toggle"><?=@$m->title?> <span class="caret"></span></a>
									<?php }?>	
									<ul class="dropdown-menu">
									<?php foreach ($m->list_content as $c) {?>
										<li><a href="<?=@$c->link?>"><i style="font-size:10px" class="fa fa-circle-o"></i> <?=@$c->title?></a></li>
									<?php } ?>
									</ul>
								</li>	

								<?php } if ($m->type=="mega"){ ?>
								<li class="dropdown yamm-fullwidth">
	                                <a href="#" class="dropdown-toggle js-activated"><?=@$m->title?></a>
	                                <ul class="dropdown-menu yamm-dropdown-menu">
	                                	<li>
	                                		<div class="yamm-content row">
											<?php //put mega 
	                                		foreach ($m->list_col as $c) {
	                                			if($c->content_type=="text"){
	                                				?>
	                                				<div class="col-sm-3 inner megamenu">
		                                                <h4><?=@$c->title?></h4>
														<div class="item">
															<?=@$c->content?>
														</div>
		                                            </div>
	                                			<?php } if($c->content_type=="custom"){ ?>
	                                				<div class="col-sm-3 inner">
		                                                <h4 class="yamm-heading"><a href="<?=@base_url($c->link)?>"><?=@$c->title?></a></h4>
														<div class="inner-col">
															<?=@$c->content?>
														</div>
		                                            </div>
												<?php } }?>
	                                		</div>
	                                	</li>
	                                </ul>
                                </li>	
								<?php } if ($m->type=="link") { ?>
									<li><a href="<?=@site_url($m->link)?>"><?=@$m->title?></a></li>
								<?php }}?>
								<!--<li><a href="#">Giới thiệu</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tour du lịch <i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#">Ba Bể - Bản Giốc</a></li>
										<li><a href="#">Hà Giang</a></li>
										<li><a href="#">Mộc Châu</a></li>
										<li><a href="#">Đảo Cô Tô</a></li>
									</ul>
								</li>
								<li><a href="#">Chỗ ở</a></li>
								<li><a href="#">Xe du lịch</a></li>
								<li><a href="#">Các dịch vụ</a></li>
								<li><a href="#">Cẩm nang</a></li>
								<li><a href="#">Liên hệ</a></li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>