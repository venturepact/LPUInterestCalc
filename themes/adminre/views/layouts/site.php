<!DOCTYPE html>
<!-- Microdata markup added by Google Structured Data Markup Helper. -->
<html>
<head>
<!--Code for Canonical URLs-->
<?php
if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)
{
	$actual_link	=	'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$seo_link		=	'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	echo '<link rel="canonical" href="'.$seo_link.'"/>';
}
?>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/parsley.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/jquery-ui.min.js"></script>
<!-- Title -->
<title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>

<!-- Meta Data-->
<meta charset="utf-8">
<meta name="author" content="VenturePact">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="VenturePact - Premium Engineering Teams, On Demand">
<meta itemprop="description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team.">
<meta itemprop="image" content="https://venturepact.com/fb_post_small.jpg">

<!-- Twitter Card data -->
<meta name="twitter:card" content="product">
<meta name="twitter:site" content="@venturepact">
<meta name="twitter:title" content="VenturePact - Premium Engineering Teams, On Demand">
<meta name="twitter:description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team.">
<meta name="twitter:creator" content="@venturepact">
<meta name="twitter:image" content="https://venturepact.com/fb_post_small.jpg">

<!-- Open Graph data -->
<meta property="og:title" content="VenturePact - Premium Engineering Teams, On Demand" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://www.venturepact.com/" />
<meta property="og:image" content="https://venturepact.com/fb_post_small.jpg" />
<meta property="og:description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team." />
<meta property="og:site_name" content="VenturePact" />

<!-- Favicon -->
<link rel="shortcut icon" href="https://venturepact.com/favicon.ico">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/css/main_style.css" rel="stylesheet">
<!-- Theme CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/theme.css" rel="stylesheet">
<!-- Admin Forms CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/admin-tools/admin-forms/css/admin-forms.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/style.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/responsive.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/DataTables-1.10.9/media/css/jquery.datatables.min.css"/>

<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/simple-line-icons.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/c-hamburger.min.css" rel="stylesheet">

</head>
<div id="loader-wrapper" style="height:100% !important;width:100%;background:#2B394B;">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div>
<body>
<!-- Start: Main -->
<div id="main" class="light-g"> 
<!-- Start: Sidebar -->
<div class="col-xs-12 topbar-hide-home2 mobile-menu" id="nav-bar">
	<?php
	if(Yii::app()->user->isGuest)
		echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/homepage/h-logo-dark.png" alt="Venturepact">', array('/site/index'),array('class'=>'col-xs-1 text-right pl0 pr0 search-hide'));
	else
		echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/homepage/h-logo-dark.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'col-xs-1 text-right pl0 pr0 search-hide'));
	?>
	<div class="col-xs-11 mt5 search-hide">
		<a class="fs14 text-center menu-icon h-text2 col-xs-1 menu-icon pull-right" href="javascript:void(0);"><i class="fa fa-bars pr5"></i></a>
		<a href="<?php echo CController::createUrl('/site/project');?>" class="text-right pl0 pr0 pull-right font_newregular h-text2 mr15">Post Project</a>
		<a href="javascript:void(0);" class="pull-right mr5 search-rs"><span class="icon-magnifier fs12 mr5" aria-hidden="true"></span></a>
	</div>
	<div class="col-xs-12 searchbar-rs">
		<div class="admin-form form-horizontal">
			<form action="<?php echo Yii::app()->createUrl('/site/search1');?>" method="post">
				<div class="form-group client-dash-search mb0">
					<input type="hidden" class="skill-search hide" value='keyword' name='keyword'  />
					<label class="field col-xs-11 algolia_parent algolia-stick">
						<input type="text" placeholder="Find Your Team (eg: php, Mobile, Gaming)" class="gui-input form-control fs12 font_newlight pt0 pb0 grey-light algolia-search" spellcheck="true" name='value'/>
					</label>
					<a class="pull-right col-xs-1 mt15 searchcross-rs" href="javascript:void(0);"><img alt="close" width="10" src="<?php echo Yii::app()->theme->baseUrl;?>/images/icon-close.png"></a>
				</div>
				<button type="submit" value="Search" name='search' class="btn btn-orange pa5 mt15 fs12 font_bold hide">Search via LinkedIn</button>
			</form>
		</div>
	</div>
</div>
<!-- Start: Content-Wrapper -->
<section id="wrapper-main">
	<div class="col-md-12 col-sm-12 col-xs-12 np light-g">
		<!--<div class="navbar bg-light np navbar-height header-shadow rs-hide position-set-int">
			<div itemscope itemtype="http://schema.org/LocalBusiness" class="col-md-12 np">
				<div class="col-md-1 np br-gray">
					<?php
					//if(Yii::app()->user->isGuest)
						//echo CHtml::link('<img itemprop="image" src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/site/index'),array('class'=>'home-blue-logo ml10'));
					//else
						//echo CHtml::link('<img itemprop="image" src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'home-blue-logo ml10'));
					?>
				</div>
				<div class="col-md-11 pl20 pt10">
					<div class="admin-form form-horizontal">
						<div class="form-group client-dash-search mb0">
							<form action="<?php //echo Yii::app()->createUrl('/site/search1');?>" method="post">
								<div class="col-md-7">
									<input type="hidden" class="skill-search hide" value='keyword' name='keyword'  />
									<label class="field prepend-icon algolia_parent algolia-stick mt10">
										<input type="text" placeholder="Find Your Team (eg: php, Mobile, Gaming)" class="gui-input form-control fs24 font_newlight pt0 grey-light algolia-search linkedin-btn" spellcheck="true" name='value'/>
										<label for="sup-search1" class="field-icon"><span class="icon-magnifier fs18 mr5" aria-hidden="true"></span></label>
									</label>
								</div>
								<div class="pull-right col-md-5 show-linkedin-btn">		 			
									<ul class="nav navbar-nav navbar-right">				
										<li>
											<button type="submit" value="Search" name='search' class="btn btn-orange pa5 mt15 fs12 font_bold">Find Your Team</button>
										</li>
										<li>
											<a class="pull-right col-xs-12 cross-linkedin-btn" href="javascript:void(0);">
												<img alt="close" width="10" src="<?php echo Yii::app()->theme->baseUrl;?>/images/icon-close.png">
											</a>
										</li>
									</ul>
								</div>
								<div class="pull-right col-md-5 home-nav np hide-home-nav show-home-nav">		  			
									<ul class="nav navbar-nav navbar-right">						
										<li>
											<a itemprop="url" href="<?php //echo Yii::app()->createUrl("/site/project");?>" class="fs14 font_newregular blue-new pr25">Post Your Project</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="fs14 font_newregular blue-new pr25">Call <span itemprop="telephone">949.791.7659</span></a>
										</li>
										<li>
											<a href="javascript:void(0);" class="fs14 font_newregular blue-new pr25 menu-icon">
												<i class="fa fa-bars pr5"></i>
											</a>
										</li>
									</ul>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		<nav role="navigation" class="navbar navbar-custom navbar-fixed-top"  id="navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" data-target="" data-toggle="collapse" class="navbar-toggle menu-icon">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-reorder light-grey"></i>
					</button>
					<div id="search-icon-mob" class="sr-web"><a href="javascript:void(0);"><i class="fa fa-search fs14 bg-trans white"></i></a></div>
					<?php
					if(Yii::app()->user->isGuest)
						echo CHtml::link('<img class="rs-logo" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/logo.png" alt="VenturePact Logo">', array('/site'),array('class'=>'navbar-brand'));
					else
						echo CHtml::link('<img class="rs-logo" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/logo.png" alt="VenturePact Logo">', array('/'.Yii::app()->user->role),array('class'=>'navbar-brand'));
					?>
				</div>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li id="search-icon" class=""><a href="javascript:void(0);"><i class="fa fa-search fs14 white bg-trans"></i></a></li>
						<li><a href="<?php echo CController::createUrl('/site/project');?>">Post Your Project </a></li>
						<li><a href="tel:9497917659">Call 949.791.7659</a></li>
						<li><a href="javascript:void(0);" class="menu-icon"><i class="fa fa-reorder mr5"></i></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<nav role="navigation" class="navbar navbar-white navbar-fixed-top navbarsearch">
			<div class="container">
				<div id="navbarCollapse" class="navbar-collapse">
					<div class="navsearch-outr placeholder1">
						<span aria-hidden="true" class="icon-magnifier search-searchicon"></span>
						<div class="searcheader placeholder1">
							<form action="<?php echo Yii::app()->createUrl('/site/search2');?>" method="post" id="searchFormTop">
								<select id="topsearch" name="value" multiple class="demo-default"  placeholder="Search by Skills or Domain"></select>
							</form>
						</div>
						<a href="javascript:void(0);" class="search-close">X</a>
					</div>
				</div>
			</div>
		</nav>
		<?php echo $content; ?>
	</div>
</section>
<section class="section6">
	<div class="container">
		<h3 class="our-res">Resources To Get You Started</h3>
		<div class="col-md-12 col-sm-12 col-xs-12 np">
			<div class="col-md-4 col-sm-6 col-xs-12 pl0 mb30 our-r">
				<div class="col-sm-4 col-xs-4 pl0">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/book4.jpg" class="img-responsive or-img" alt="Book"/>
				</div>
				<div class="col-sm-8 col-xs-8 np">
					<a target="_blank" href="http://blog.venturepact.com/ebook-outsourcing-101-how-when-where-to-outsource" class="or-text">Outsourcing 101 eBook: How, When & Where to Outsource</a>
					<a target="_blank" href="http://blog.venturepact.com/ebook-outsourcing-101-how-when-where-to-outsource" class="fl-link-new">Download Ebook <i class="fa fa-long-arrow-right fl-link-icon"></i></a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12 pl0 mb30 our-r">
				<div class="col-sm-4 col-xs-4 pl0">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/book5.jpg" class="img-responsive or-img" alt="Book"/>
				</div>
				<div class="col-sm-8 col-xs-8 np">
					<a target="_blank" href="http://blog.venturepact.com/manage-communicate-and-release-effectively" class="or-text">Outsourcing 102 eBook: Manage, Communicate and Release, Effectively!</a>
					<a target="_blank" href="http://blog.venturepact.com/manage-communicate-and-release-effectively" class="fl-link-new">Download Ebook <i class="fa fa-long-arrow-right fl-link-icon"></i></a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12 pl0 mb30 our-r">
				<div class="col-sm-4 col-xs-4 pl0">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/book6.jpg" class="img-responsive or-img" alt="Book"/>
				</div>
				<div class="col-sm-8 col-xs-8 np">
					<a target="_blank" href="https://venturepact.com/costofbuildinganapp" class="or-text">Mobile App Cost Calculator</a>
					<a target="_blank" href="https://venturepact.com/costofbuildinganapp" class="or-link">Access</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12 pl0 mb30 our-r">
				<div class="col-sm-4 col-xs-4 pl0">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/book1.jpg" class="img-responsive or-img" alt="Book"/>
				</div>
				<div class="col-sm-8 col-xs-8 np">
					<a href="http://blog.venturepact.com/10-software-enabled-businesses-you-can-start-in-a-day-and-how" target="_blank" class="or-text">10 Software Enabled Businesses You Can Start in A Day (And How)</a>
					<span class="or-link">April 6, 2015</span>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12 pl0 mb30 our-r">
				<div class="col-sm-4 col-xs-4 pl0">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/book2.jpg" class="img-responsive or-img" alt="Book"/>
				</div>
				<div class="col-sm-8 col-xs-8 np">
					<a href="http://blog.venturepact.com/outsourcing-software-development-in-conversation-with-pratham-mittal/" target="_blank" class="or-text">Outsourcing Software Development: In Conversation with Pratham Mittal</a>
					<span class="or-link">April 6, 2015</span>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12 pl0 mb30 our-r">
				<div class="col-sm-4 col-xs-4 pl0">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/book3.jpg" class="img-responsive or-img" alt="Book"/>
				</div>
				<div class="col-sm-8 col-xs-8 np">
					<a href="http://blog.venturepact.com/which-department-can-i-outsource/" target="_blank" class="or-text">Which Department Can I Outsource?</a>
					<span class="or-link">April 6, 2015</span>
				</div>
			</div>
		</div>
	</div>
</section>
<footer class="footer-main-bg">
	<div class="container">
		<div class="col-md-3 col-sm-12 col-xs-12 rs-center mt30 pl0">
			<div class="footer-left">
				<h4>VenturePact - </h4>
				<span>Made in NY</span>
			</div>
			<div class="copyright">
				© 2015 VenturePact. All rights reserved.
			</div>
		</div>
		<div class="col-md-7 col-sm-12 col-xs-12 rs-center mt30">
			<ul class="footer-links rs-center">
				<li><a href="<?php echo Yii::app()->createUrl('/site/about');?>">Company</a></li>
				<li>.</li>
				<li><a href="<?php echo Yii::app()->createUrl('/site/howItWorks');?>">How it Works</a></li>
				<li>.</li>
				<li><a href="<?php echo Yii::app()->createUrl('/site/vettingProcess');?>">Vetting Process</a></li>
				<li>.</li>
				<li><a href="<?php echo Yii::app()->createUrl('/site/press');?>">Press</a></li>
				<li>.</li>
				<li><a href="<?php echo Yii::app()->createUrl('/site/faq');?>">FAQs</a></li>
				<li>.</li>
				<li><a href="<?php echo Yii::app()->createUrl('/site/testimonials');?>">Reviews</a></li>
				<li>.</li>
				<li><a href="<?php echo Yii::app()->createUrl('/site/partner');?>">For Developers</a></li>
				<li>.</li>
				<li><a href="<?php echo Yii::app()->createUrl('/site/affiliate');?>">For Affiliates</a></li>
				<li>.</li>
				<li><a href="https://angel.co/venturepact/jobs" target="_blank">We’re Hiring</a></li>
				<li>.</li>
				<li><a href="http://blog.venturepact.com/" target="_blank">Blog</a></li>
				<li>.</li>
				<li><a href="javascript:void(0);" data-toggle="modal" data-target="#terms-conditions">Terms and Conditions</a></li>
			</ul>
		</div>
		<div class="col-md-2 col-sm-12 col-xs-12 social-links-main rs-center np">
			<a href="https://twitter.com/VenturePact" target="_blank" class="social-links" title="Twitter"><i class="fa fa-twitter"></i></a>
			<a href="https://www.facebook.com/VenturePact" target="_blank" class="social-links" title="Facebook"><i class="fa fa-facebook"></i></a>
			<a href="https://www.linkedin.com/company/venturepact" target="_blank" class="social-links" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
			<a href="https://plus.google.com/+Venturepact/about" target="_blank" class="social-links" title="GooglePlus"><i class="fa fa-google-plus"></i></a>
		</div>
	</div>
</footer>
<section>
	<div class="menu-login-section layout-site">
		<div class="col-md-12 col-sm-12 col-xs-12 rs-p11">
			<div class="col-md-12 col-xs-12 rs-mt10 rs-np">
				<!--<a class="menu-close pull-right pa30 rs-np" id="menu-close" href="javascript:void(0);"><img alt="close" src="<?php //echo Yii::app()->theme->baseUrl.'/images/icon-close.png'; ?>"></a>-->
				<a class="menu-close pull-right pa30 rs-np pl0 pr0" id="menu-close" href="javascript:void(0);">
					<button class="c-hamburger c-hamburger--htx">
						<span>toggle menu</span>
					</button>
				</a>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 rs-np">
				<div class="col-md-6 col-xs-12 rs-np">
					<div class="col-md-6 col-md-offset-5">
					<?php if(Yii::app()->user->hasFlash('success')):?>
						<div class="alert alert-success alert-dismissible alertMessage" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo Yii::app()->user->getFlash('success'); ?>
						</div>
					<?php endif; ?>
					<?php if(Yii::app()->user->hasFlash('error')):?>
						<div class="alert alert-danger1 alert-dismissible alertMessage" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo Yii::app()->user->getFlash('error'); ?>
						</div>
					<?php endif; ?>
					</div>

					<div class="col-md-12 col-xs-12 rs-nm rs-p11 mt10">
						<?php if(Yii::app()->user->isGuest){
								$this->widget('WidgetHomeMenu');
							}else{ ?>
						<div class="col-md-7 col-md-offset-4 col-xs-12">
							<div class="col-md-12 col-xs-12 np text-center">
								<img width="90" height="90" src="<?php echo (!empty(Yii::app()->user->image))?Yii::app()->user->image:Yii::app()->theme->baseUrl."/style/images/userAvatarBig.png";?>" class="img-circle" alt="Team Member">
								<h2 class="fs16  font_newregular ">Hey! <?php echo Yii::app()->user->fname;?></h2>
								<p class="fs14 font_newregular pt5">Welcome to VenturePact</p>
							</div>
							<div class="col-md-12 col-xs-12 bt mt20 pt20 text-center np rs-hide">
								<?php echo CHtml::link('<span class="icon-home mr5" aria-hidden="true"></span> Dashboard',array('/'.Yii::app()->user->role),array('class'=>'fs13 font_newregular orange-new col-md-5 col-xs-12 pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-settings mr5" aria-hidden="true"></span> Settings',array('/'.Yii::app()->user->role.'/account'),array('class'=>'fs13 font_newregular orange-new col-md-4 np pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-power orange-light mr5" aria-hidden="true"></span> Logout',array('/site/logout'),array('class'=>'fs13 font_newregular orange-new col-md-3 np text-right mb5')); ?>									
							</div>
							<div class="col-md-12 col-xs-12 bt mt20 pt20 pb20 text-center np rs-show">
								<?php echo CHtml::link('<span class="icon-home mr5" aria-hidden="true"></span>',array('/'.Yii::app()->user->role.'/index'),array('class'=>'fs13 font_newregular orange-new col-md-5 col-xs-4 pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-settings mr5" aria-hidden="true"></span>',array('/'.Yii::app()->user->role.'/account'),array('class'=>'fs13 font_newregular orange-new col-md-4 np col-xs-4 pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-power orange-light mr5" aria-hidden="true"></span>',array('/site/logout'),array('class'=>'fs13 font_newregular orange-new col-md-3 np col-xs-4 mb5')); ?>									
							</div>										
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-12  col-xs-12 login-border rs-mb20">
					<div class="col-md-12 col-sm-12 col-xs-12 mt10 rs-np rs-nm rs-mb20">
						<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-1 rs-np rs-mb20">
							<ul class="login-menu fs14 font_newlight">
								<li><a href="<?php echo Yii::app()->createUrl('/site/about');?>" class="blue-new">About Us</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/vettingProcess');?>" class="blue-new">Vetting Process</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/howItWorks');?>" class="blue-new">How It Works</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/faq');?>" class="blue-new">FAQs</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/referral');?>" class="blue-new">Referral</a></li>
								<li><a href="http://blog.venturepact.com/" target="_blank" class="blue-new">Blog</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/press');?>" class="blue-new">Press</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/testimonials');?>" class="blue-new">Reviews</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/partner');?>" class="blue-new">For Developers</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/affiliate');?>" class="blue-new">For Affiliates</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-10 mt30 rs-nm pl25 rs-np rs-hide">
						<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-1 np rs-np rs-mb20">
							<div class="col-md-12 col-sm-12 col-xs-12 np pt10 pb10 bb">
								<div class="col-md-12 col-sm-12 col-xs-12 np">
									<h3 class="fs16 blue-new font_newlight mt10 mb10 pb10 bb">Share now:</h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 pl0 ml0">
									<div class="col-md-12 col-sm-12 col-xs-12 np"> 
										<div class="col-md-2 col-sm-2 col-xs-4 np mr10">
											<a href="https://www.facebook.com/VenturePact" target="_blank" class="tm-facebook-small web-hover">
												<span class="web-show-small"></span>
												<i class="fa fa-facebook fs15"></i>
											</a>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-4 np mr10">
											<a href="https://twitter.com/VenturePact" target="_blank" class="tm-twitter-small web-hover">
												<span class="web-show-small"></span>
												<i class="fa fa-twitter fs15"></i>
											</a>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-4 np mr10">
											<a href="https://www.linkedin.com/company/venturepact" target="_blank" class="tm-linkedin-small web-hover">
												<span class="web-show-small"></span>
												<i class="fa fa-linkedin fs15"></i>
											</a>
										</div>
									</div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-10 mt70 rs-nm pl25 rs-np rs-show">
						<div class="col-md-1 col-sm-1 col-xs-1 mr10">
							<a href="https://twitter.com/VenturePact" target="_blank" class="tm-twitter-small">
								<i class="fa fa-twitter"></i>
							</a>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1 mr10">
							<a href="https://www.facebook.com/VenturePact" target="_blank" class="tm-facebook-small">
								<i class="fa fa-facebook"></i>
							</a>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1 mr10">
							<a href="https://www.linkedin.com/company/venturepact" target="_blank" class="tm-linkedin-small">
								<i class="fa fa-linkedin"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
<!-- End: Main -->
<!-- Modal Terms&Conditions Start-->
<div class="modal fade" id="terms-conditions" role="dialog" aria-hidden="true" style="z-index:1060;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content col-md-12 mb30 np">
			<div class="modal-header pa20 new-modal-bg">
				<button data-dismiss="modal" class="pull-right close mt5" type="button">×</button>
				<h2 class="modal-title fs28 text-center font_newregular orange-new">Terms & Conditions</h2>
			</div>
			<div class="modal-body col-md-12 np p20">
				<p>
					This Privacy Policy governs the manner in which VenturePact LLC.   collects, uses, maintains and discloses information collected from users   (each, a "User") of the VenturePact.com website ("Site"). This privacy   policy applies to the Site and all products and services offered by   VenturePact LLC.<br>
	                <br>
	                <strong class="orange-new">Personal identification information</strong><br>
	                <br>
	                We may collect personal identification information from Users in a   variety of ways, including, but not limited to, when Users visit our   site, register on the site, fill out a form, and in connection with   other activities, services, features or resources we make available on   our Site. Users may be asked for, as appropriate, name, email address.   Users may, however, visit our Site anonymously. We will collect personal   identification information from Users only if they voluntarily submit   such information to us. Users can always refuse to supply personally   identification information, except that it may prevent them from   engaging in certain Site related activities.<br>
	                <br>
	                <strong class="orange-new">Non-personal identification information</strong><br>
	                <br>
	                We may collect non-personal identification information about Users   whenever they interact with our Site. Non-personal identification   information may include the browser name, the type of computer and   technical information about Users means of connection to our Site, such   as the operating system and the Internet service providers utilized and   other similar information.<br>
	                <br>
	                <strong class="orange-new">How we use collected information</strong><br>
	                <br>
	                The VenturePact LLC may collect and use Users personal information for the following purposes:<br>
	                <br>
	                - To personalize user experience We may use information in the aggregate   to understand how our Users as a group use the services and resources   provided on our Site. <br>
	                - To send periodic emails If User decides to opt-in to our mailing list,   they will receive emails that may include company news, updates,   related product or service information, etc. If at any time the User   would like to unsubscribe from receiving future emails, they may do so   by contacting us via our Site.<br>
	                <br>
	                <strong class="orange-new">How we protect your information</strong><br>
	                <br>
	                We adopt appropriate data collection, storage and processing practices   and security measures to protect against unauthorized access,   alteration, disclosure or destruction of your personal information,   username, password, transaction information and data stored on our Site.<br>
	                <br>
	                <strong class="orange-new">Sharing your personal information</strong><br>
	                <br>
	                We do not sell, trade, or rent Users personal identification information   to others. We may share generic aggregated demographic information not   linked to any personal identification information regarding visitors and   users with our business partners, trusted affiliates and advertisers   for the purposes outlined above.<br>
	                <br>
	                <strong class="orange-new">Third party websites</strong><br>
	                <br>
	                Users may find advertising or other content on our Site that link to the   sites and services of our partners, suppliers, advertisers, sponsors,   licensors and other third parties. We do not control the content or   links that appear on these sites and are not responsible for the   practices employed by websites linked to or from our Site. In addition,   these sites or services, including their content and links, may be   constantly changing. These sites and services may have their own privacy   policies and customer service policies. Browsing and interaction on any   other website, including websites which have a link to our Site, is   subject to that website's own terms and policies.<br>
	                <br>
	                <strong class="orange-new">Engagement between Development firm and Client</strong><br>
	                <br>
	                Once a contract is signed between the Development firm and the Client the relationship and contract will be between the two parties. It is the development firm's responsibility to provide the services on time and the Client and development firm are both responsible to communicate regularly and promptly. It is the clients responsibility to make the necessary payments on time. VenturePact cannot be sued or held accountable by either party for issues that arise between the Development firm and the Client during their engagement.<br>
	                <br>
	                <strong class="orange-new">Compliance with children's online privacy protection act</strong><br>
	                <br>
	                Protecting the privacy of the very young is especially important. For   that reason, we never collect or maintain information at our Site from   those we actually know are under 13, and no part of our website is   structured to attract anyone under 13.<br>
	                <br>
	                <strong class="orange-new">Changes to this privacy policy</strong> VenturePact LLC has the discretion to update this privacy policy at any   time. When we do, we will post a notification on the main page of our   Site. We encourage Users to frequently check this page for any changes   to stay informed about how we are helping to protect the personal   information we collect. You acknowledge and agree that it is your   responsibility to review this privacy policy periodically and become   aware of modifications.<br>
	                <br>
	                <strong class="orange-new">Your acceptance of these terms</strong> By using this Site, you signify your acceptance of this policy. If you   do not agree to this policy, please do not use our Site. Your continued   use of the Site following the posting of changes to this policy will be   deemed your acceptance of those changes.<br>
	                <br>
	                <strong class="orange-new">Contacting us</strong><br>
	                <br>
	                If you have any questions about this Privacy Policy, the practices of   this site, or your dealings with this site, please contact us at:<br>
	                <br>
	                <a href="mailto:Questi%6F%6Es@%56%65%6Etur%65Pact%2Ec%6Fm">Questions@VenturePact.com</a>
                </p>
			</div>
		</div>
	</div>
</div>
<!-- Modal End-->

<style>
	#main, #main:before {background: none;}
</style>

<!-- BEGIN: PAGE SCRIPTS --> 
<!-- Bootstrap -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/main-loader.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/validate.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/js/main.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/js/demo.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/jquery.slimscroll.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/animo.js" async></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/selectize.js"></script>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algolia.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/hogan.common.js',CClientScript::POS_END); ?>

<script type="text/javascript">
$(document).ready(function() {
	$(":input").focusout(function(){
		$(this).parsley().validate();
	});
	
	

	$('.slimscroll').slimscroll({	
		height : $( window ).height()+'px',
	});
	
	$('#passButSat').on("click",function(){
		var elem	=	$('#forget-form-email');
		if(elem.val().length>0){
			if(testEmail(elem.val())){
				$('#passButSat').val('Please Wait ...');
				$.ajax({
					type: 'POST',
					url:"<?php echo CController::createUrl('/site/ajaxUniqe');?>"+'/email/'+elem.val(),
					success :function(data){
						var response = JSON.parse(data);
						console.log('Element is :'+elem);
						if(response.exist){
							elem.addClass('parsley-error');
							var ErrID	=	elem.attr('data-parsley-id')
							$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">'+response.message+'</li>');
							$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
							$('#signupButSat').attr('type','button');
							$('#passButSat').val('Reset Password');

						}
						else{
							elem.val('');
							$('#messageResponse').html(response.message);
							$('#repsoneRest').show();
							//$('#resetpass').addClass('hide');
							$('#repsoneRest').removeClass('hide');
							var ErrID	=	elem.attr('data-parsley-id')
							$('#parsley-id-satn-'+ErrID).html('');
							$('#passButSat').val('Reset Password');
							//$('#passButSat').hide();
						}
					}
				});
			}
			else{
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is not a valid email address.</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			}
		}
		else{
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is required field.</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
		}
	});
	
	$('#passButSat1').on("click",function(){
		var elem	=	$('#forget-form-email1');
		if(elem.val().length>0){
			if(testEmail(elem.val())){
				$('#passButSat1').val('Please Wait ...');
				$.ajax({
					type: 'POST',
					url:"<?php echo CController::createUrl('/site/ajaxUniqe');?>"+'/email/'+elem.val(),
					success :function(data){
						var response = JSON.parse(data);
						console.log('Element is :'+elem);
						if(response.exist){
							elem.addClass('parsley-error');
							var ErrID	=	elem.attr('data-parsley-id')
							$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">'+response.message+'</li>');
							$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
							$('#signupButSat').attr('type','button');
							$('#passButSat1').val('Reset Password');
						}
						else{
							elem.val('');
							$('#messageResponse1').html(response.message);
							$('#repsoneRest1').show();
							//$('#resetpass1').addClass('hide');
							$('#repsoneRest1').removeClass('hide');
							var ErrID	=	elem.attr('data-parsley-id')
							$('#parsley-id-satn-'+ErrID).html('');
							$('#passButSat1').val('Reset Password');
							//$('#passButSat1').hide();
						}
					}
				});
			}
			else{
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is not a valid email address.</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			}
		}
		else{
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is required field.</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
		}
	});
	
	$(".menu-icon").click(function(){
		$(".menu-login-section").fadeIn(300);
	});
	$(".menu-close").click(function(){
		$(".menu-login-section").fadeOut(300);
	});
	$(".forgot-passwordDiv").click(function(){
		$(".signin").hide(); 
		$(".forgot-password").show();		
	});
	
	$(".create-accDiv").click(function(){
		$(".signin").hide();
		$(".create-acc").show();
	});
	
	$(".create-accDiv").click(function(){
		$(".forgot-password").hide(); 
		$(".create-acc").show();
	});
	
	$(".signin-div").click(function(){
		$(".create-acc").hide();
		$(".signin").show();
	});
	
	$( "#searchbox" ).click(function() { 
		$( ".searchbox-show" ).slideDown( "show" );
		$( ".butnn-hide" ).fadeOut(); 
		
	});
	$( "#rs-searchbox" ).click(function() {
		$(".rs-searchbox-show" ).slideDown( "show" );
		$(".butnn-hide" ).each(function(){
			$(this).addClass('hide');
		});
	});
	
	$(".menu-close").click(function(){
		$(".searchbox-show").slideUp( "hide" );
		$( ".butnn-hide" ).fadeIn();
	});
	$(".menu-close").click(function(){
		$(".rs-searchbox-show").slideUp( "hide" );
		$(".butnn-hide" ).each(function(){
			$(this).removeClass('hide');
		});
	});
	
	//$( "#searchbox" ).click(function() {
		//$( ".searchbox-show" ).slideDown( "show" );
	//});
	//$(".menu-close").click(function(){
		//$(".searchbox-show").slideUp( "hide" );
	//});
	//$( "#rs-searchbox" ).click(function() {
		//$( ".searchbox-show" ).slideDown( "show" );
	//});
	//$(".menu-close").click(function(){
		//$(".rs-searchbox-show").slideUp( "hide" );
	//});
	
	$("#linkedinButton").click(function(){
		var searchItem = $('.algolia-search').val();
		localStorage.setItem('searchItem',searchItem);
	});
	
	$(".modal-forgot-passwordDiv").click(function(){
		$(".modal-forgot-password").show(500);
		$(".modal-signin").hide(500); 		
	});
	
	$(".modal-create-accDiv").click(function(){
		$(".modal-create-acc").show(500);
		$(".modal-signin").hide(500);
	});
	
	$(".modal-create-accDiv").click(function(){
		$(".modal-create-acc").show(500);
		$(".modal-forgot-password").hide(500); 
	});
	
	$(".modal-signin-div").click(function(){
		$(".modal-signin").show(500);
		$(".modal-create-acc").hide(500);
	});
	
	$('#login-m').click(function(){
		$(this).attr('value','Please Wait ...');
		$('#login-category').val($('.skill-search').val());
		var $value;
		$('.algolia-search').each(function(){
			if($(this).val()!='')
				$value	=	$(this).val();
		})
		$('#login-val').val($value);
		signIn($(this));
	});
	
	$('#signupSearch').click(function(){
		$(this).attr('value','Creating Account ...');
		$('#signup-category').val($('.skill-search').val());
		var $value;
		$('.algolia-search').each(function(){
			if($(this).val()!='')
				$value	=	$(this).val();
		})
		$('#signup-val').val($value);
		signUp($(this));
	});

	$( "#passwordFieldInPopup" ).keypress(function( event ) {
	  if ( event.which == 13 ) {
	     $( "#login-m" ).trigger( "click" );
	  }
	});
	
	var owl = $(".owl-homepage");
	owl.owlCarousel({
		itemsCustom : [
			[0, 8],
			[450, 8],
			[600, 8],
			[700, 8],
			[1000, 8],
			[1200, 9],
			[1400, 10],
			[1600, 12]
		],
		navigation : false,
		autoPlay: 2500,
		pagination : false,
	});

	$(".search-rs").click(function(){
		$(".searchbar-rs").slideDown();
		$(".search-hide").slideUp();
	});
	
	$(".searchcross-rs").click(function(){
		$(".searchbar-rs").slideUp();
		$(".search-hide").slideDown();
	});
	
	$(".linkedin-btn").click(function(){
		$(".show-linkedin-btn").show(500);
		$(".hide-home-nav").hide(500);
	});
	$(".cross-linkedin-btn").click(function(){
		$(".show-home-nav").show(500);
		$(".show-linkedin-btn").hide(500);
	});
		
	
	$(window).scroll(function(){
		if ($(window).scrollTop() > 425) {
			$('#task_flyout').addClass('fixed-scroll');
			$('#task_flyout').removeClass('hide');
		} else  {
				$('#task_flyout').removeClass('fixed-scroll');
				$('#task_flyout').addClass('hide');
		}
	});
	
	<?php if(isset($_REQUEST['login']) && $_REQUEST['login']==1){?>
	$(".menu-icon").trigger('click');
	<?php } ?>
	
	
	//Scroll search add
	$(window).scroll(function(){
		if ($(this).scrollTop() > 425) {
			$('#search-icon').fadeIn();
		} else  {
			$('#search-icon').fadeOut();
		}		 
	});
	
	$(window).scroll(function(){
		if($(this).width() < 768) {
			if ($(this).scrollTop() > 300) {
				$('#search-icon-mob').addClass('sr-mobile');
			} else  {
				$('#search-icon-mob').removeClass('sr-mobile');
			}
		}		
	});
	
	$('#search-icon-mob a').click(function(){
		$('#navbar').animo({
			animation: "fadeOutRight",
			duration: 0.3,
			keep: true
		}, function(){
			$('#navbar').hide();
			$('.navbarsearch').show().animo({
				animation: "fadeInLeft",
				duration: 0.3,
				keep: true
			});
		});
	});
	
	$('#search-icon a').click(function(){
		$('#navbar').animo({
			animation: "fadeOutRight",
			duration: 0.3,
			keep: true
		}, function(){
			$('#navbar').hide();
			$('.navbarsearch').show().animo({
				animation: "fadeInLeft",
				duration: 0.3,
				keep: true
			});
		});
	});
	
	$('.search-close').click(function(){
		$('.navbarsearch').animo({
			animation: "fadeOutLeft",
			duration: 0.3,
			keep: true
		}, function(){
			$('.navbarsearch').hide();
			$('#navbar').show().animo({
				animation: "fadeInRight",
				duration: 0.3,
				keep: true
			});
		});
	});
	
	$(".menu-icon").click(function(){
		$(".menu-login-section").fadeIn(400);
		if(!$(".menu-close > button").hasClass('is-active'))
			$(".menu-close > button").addClass('is-active');
	});
	
	$(".menu-close").click(function(){
		$(".menu-login-section").fadeOut(400);
		if($(".menu-close > button").hasClass('is-active'))
			$(".menu-close > button").removeClass('is-active');
	});	
	
});

$('#topsearch').selectize({
		theme: 'links',
		//maxItems: null,
		valueField: 'id',
		searchField: 'title',
		sortField: 'title',
		maxItems: 2,
		openOnFocus:false,
		closeAfterSelect: true,
		maxOptions:5,
		options: [
			<?php $skills	=	Skills::model()->findAllByAttributes(array('skillcol'=>0));
			foreach($skills as $skill){?>
				{id: "skill_<?php echo $skill->name;?>", title: '<?php echo $skill->name;?>', category: 'Skill'},
			<?php } ?>
			<?php $services	=	Services::model()->findAllByAttributes(array('status'=>1));
			foreach($services as $service){?>
				{id: "service_<?php echo $service->name;?>", title: '<?php echo $service->name;?>', category: 'Service'},
			<?php } ?>
			<?php $industries	=	Industries::model()->findAllByAttributes(array('status'=>1));
			foreach($industries as $industry){?>
				{id: "industry_<?php echo $industry->name;?>", title: '<?php echo $industry->name;?>', category: 'Industry'},
			<?php } ?>
		],
		render: {
			option: function(data, escape) {
				return	'<div class="option">'+
							'<span class="title">' + escape(data.title) + '</span>' +
							'<span class="tag">' + escape(data.category) + '</span>' +
						'</div>';
			},
			item: function(data, escape) {
				return '<div class="item"><a href="' + escape(data.category) + '">' + escape(data.title) + '</a></div>';
			}
		},
		onChange: function() { $('#searchFormTop').submit();},
	});

</script>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5QGDHR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5QGDHR');</script>
<!-- End Google Tag Manager -->
<style>
.owl-homepage.item{
    background: #42bdc2;
    padding: 30px 0px;
    margin: 5px;
    color: #FFF;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    text-align: center;
}
.owl-carousel .owl-wrapper-outer {
    overflow: hidden;
    position: relative;
    width: 100%;
}
</style>
<script>
  window.intercomSettings = {
    app_id: "<?php echo Yii::app()->params['intercom_id']; ?>"
  };
</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/<?php echo Yii::app()->params['intercom_id']; ?>';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
<?php Yii::app()->clientScript->registerScript('myHideEffect','$(".alertMessage").animate({opacity: 1.0}, 10000).fadeOut("slow");$(".tt-hint").remove();',CClientScript::POS_READY);?>
<script>
  window.intercomSettings = {
    app_id: "<?php echo Yii::app()->params['intercom_id']; ?>"
  };
</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/<?php echo Yii::app()->params['intercom_id']; ?>';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
</body>
</html>
