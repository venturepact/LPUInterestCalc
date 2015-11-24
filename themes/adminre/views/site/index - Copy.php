<section class="col-md-12 col-sm-12 col-xs-12 np slide table-div homepage-bg error-bg-height">
	<div itemscope itemtype="http://schema.org/LocalBusiness" class="navbar np navbar-fixed-top rs-hide" id="rs-nav-bar">
		<div class="col-md-3 np mt20">
			<?php
			if(Yii::app()->user->isGuest)
				echo CHtml::link('<img itemprop="image" src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/site'),array('class'=>'blue-logo ml10'));
			else
				echo CHtml::link('<img itemprop="image" src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'blue-logo ml10'));
			?>
		</div>
		<div class="pull-right col-md-9 mt20">					
			<ul class="nav navbar-nav navbar-right">						
				<li>
					<a itemprop="url" href="<?php echo CController::createUrl('/site/project');?>" class="fs14 font_newregular grey-new-light pr25">Post Your Project</a>
				</li>
				<li>
					<a href="tel:9497917659" class="fs14 font_newregular grey-new-light pr25">Call 949.791.7659</a>
				</li>
				<li>
					<a href="javascript:void(0);" id="menu-modal" class="fs14 font_newregular grey-new-light pr25 menu-icon">
						<i class="fa fa-bars pr5"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="error-table-layout">
		<div class="container">
			<div class="search-suppliers_home">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-12 col-xs-12 text-center rs-mt15">
						<h1 class="fs35 rs-fs28 font_newregular h-text mt10 rs-text12 rs-pt40 rs-fs24">Building Web &amp; Mobile Apps Has Never Been Easier!</h1>
						<h3 class="fs27 rs-fs16 font_newregular h-text2 mt20">Meet VenturePact - Your Engineering Team, On Demand.</h3>
					</div>
					<div class="col-md-10 col-md-offset-1 text-center mt30">
						<div class="admin-form form-horizontal">
							<form action="<?php echo Yii::app()->createUrl('/site/search1');?>" method="post" id="searchFormSite">
								<input type="hidden" class="skill-search hide" value='keyword' name='keyword'  />
								<div class="form-group search col-md-12 mb5">
									<!--
									<label class="field prepend-icon mt5 algolia_parent">
										<input type="text" placeholder="Find Your Team (eg: php, Mobile, Gaming)" class="algolia-search typeahead form-control fs14 font_newregular" spellcheck="true" name='value' autocomplete='true' />
										<label class="field-icon" for="Location"><span aria-hidden="true" class="icon-magnifier"></span></label>
									</label>
									-->
									
						<div class="control-group" id="select-car-group">
							<select id="select-skills" class="demo-default" name="value" multiple placeholder="eg: PHP, iOS, C++">
								<optgroup label="Skills">
									<?php
									$skills		=	Skills::model()->findAllByAttributes(array('skillcol'=>0));
									foreach($skills as $skill){?>
									<option value="skill_<?php echo $skill->name;?>"  <?php echo (!empty($data['skills']) && in_array('skill_'.$skill->name,$data['skills']))?'selected':'';?>><?php echo $skill->name;?></option>
									<?php } ?>
								</optgroup>
								<optgroup label="Services">
									<?php $services	=	Services::model()->findAllByAttributes(array('status'=>1));
									foreach($services as $service){?>
										<option value="service_<?php echo $service->name;?>" <?php echo (!empty($data['skills']) && in_array('service_'.$service->name,$data['skills']))?'selected':'';?>><?php echo $service->name;?></option>
									<?php } ?>
								</optgroup>
							</select>
						</div>
						
									
									
								</div>
								<div class="col-md-12 text-center np mt20">
									<button type="submit" value="Search" name='search' class="btn btn-orange fs14 pl15 pr15 pt10 pb10  lh-22 font_newregular">Search Your Team</button>
								</div>
							</form>
						</div>
					</div>
					<a id="link" class="fix-a text-center grey-new-light" href="javascript:void(0);">
						<i class="grey-new-light fa fa-angle-down fs40 bounce animated"></i><br>
					</a><br>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="col-md-12 col-sm-12 col-xs-12 np h-lightbg pt40 slide table-div id3">
	<div class="trusted-div" id="slider-outrr">
		<div class="container mt40 rs-np">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center pa20 rs-np">
				<span class="btn-default-collection font_newregular bb lh-30 rs-mt30 rs-np">The Best Brands Have Trusted Our Teams</span>
				<div class="col-md-12 col-xs-12 mt40">
					<div class="col-md-12 np  mb40">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="item col-md-3 rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-espn.png" class="gray-img" alt="ESPN" width="200" height=""/ ></div>
							<div class="item col-md-3 rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-fb.png" class="gray-img" alt="FinansBank" width="230" height="120"/>						</div>
							<div class="item col-md-3"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-bonobos.png" class="gray-img" alt="Bonobos" width="210"/></div>
							<div class="item col-md-3 rs-mb10 pt10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-ah-gr.png" class="gray-img" alt="Athena Health" width="210" height="87"/></div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="item col-md-3 rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-bmw.png" class="gray-img" alt="BMW" width="210"/></div>
							<div class="item col-md-3 rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-ashoka.png" class="gray-img" alt="Ashoka" width="230" height="120"/></div>
							<div class="item col-md-3 rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-al.png" class="gray-img" alt="Alcatel Lucent" width="200"/></div>
							<div class="item col-md-3 rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-adidas.png" class="gray-img" alt="Adidas" width="200" height="104"/></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->widget('WidgetAlgolia');?>
</section>
<section class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div">
	<div class="error-table-layout remove-css">
		<div class="container mt40">
			<div itemscope itemtype="http://schema.org/LocalBusiness" class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 rs-np rs-nm">
				<div class="bb2 pb10 col-md-12 col-xs-12 np pb40">
					<div class="col-md-6 col-sm-6 col-xs-8 col-xs-offset-2 rs-show">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/waste-money.png" alt="dont waste money" class="pull-right mt15 rs-img" width="403" height="280"/>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 rs-show pl0 pr0">
						<h2 class="fs28 mb20">
							Don't waste money hiring the wrong team!
						</h2>
						<h4 class="mt30 fs18 h-text4 lh-30">
							Work with one of our thoroughly vetted software development teams with proven track records.
						</h4>
						<a id="_url140" itemprop="url" class="btn btn-default-home pt10 pb10 pl10 pr10 mt15 fs12 font_newlight" href="<?php echo Yii::app()->createUrl('/site/vettingProcess');?>">Read About Our 4 Step Vetting Process</a>
					</div>
					<div class="col-md-6 col-sm-8 col-xs-12 pr0 rs-hide">
						<h2 class="fs32 mb20 rs-nm">
							Don't waste money hiring the wrong team!
						</h2>
						<h4 class="mt40 fs22 h-text4 lh-30">
							Work with one of our thoroughly vetted software development teams with proven track records.
						</h4>
						<a id="_url140" itemprop="url" class="btn btn-default-home pt10 pb10 pl20 pr20 mt15 fs14 font_bold" href="<?php echo Yii::app()->createUrl('/site/vettingProcess');?>" >Read About Our 4 Step Vetting Process</a>
					</div>
					<div class="col-md-6 col-sm-4 rs-mt25 col-xs-12 rs-hide">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/waste-money.png" alt="dont waste money" class="pull-right mt15 rs-img img-responsive" />
					</div>
				</div>
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 mt40 rs-np rs-bb2">
					<div class="col-md-2 col-sm-3 col-xs-12 rs-center rs-mb10 rs-np">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/eyepi.png" alt="Ceo" class="img-circle rs-img gray-img" width="93" height="93"/>
					</div>
					<div itemprop="review" itemscope itemtype="http://schema.org/Review" class="col-md-10 col-sm-9 col-xs-12 rs-mb10 rs-np">
						<span class="fs16 lh-22 h-text5">
							<i itemprop="reviewBody" class="">VenturePact was incredibly helpful in putting us in contact with the talented technology and web development experts that could make our goals come true.  VenturePact listened to our needs, matched us with the most logical providers, and ensured our needs, goals, and milestones were reached.</i>
						</span>
						<span itemprop="author" itemscope itemtype="http://schema.org/Person">
							<div itemprop="name" class="col-md-12 np mt20">
								<h4 class="fs14 mb0 font_newregular">Brian Alan Hill</h4>
								<h5 class="mt0">President, EyePi</h5>
							</div>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section itemscope itemtype="http://schema.org/LocalBusiness" itemref="_url140" class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div">
	<div class="error-table-layout remove-css">
		<div class="container mt40">
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 rs-np rs-nm">
				<div class="bb2 pb10 col-md-12 col-xs-12 np pb40">
					<div class="col-md-6 col-sm-4 col-xs-8 col-xs-offset-2 rs-show rs-mt25">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/dont-rely.png" alt="dont rely" class="pull-right mt15 rs-img  gray-img" width="347" height="299"/>
					</div>
					<div class="col-md-6 col-sm-8 col-xs-12 rs-show pl0 pr0">
						<h2 class="fs28 mb20">
							Don't rely on hearsay. Leverage data!
						</h2>
						<h4 class="mt30 fs18 h-text4 lh-30">
							Evaluate detailed portfolios and check past references before deciding who to work with.
						</h4>
						<a itemprop="url" class="btn btn-default-home pt10 pb10 pl10 pr10 mt15 fs12 font_newlight" href="<?php echo CController::createUrl('/Digital-Trike');?>" target="_blank">Check Out a Sample Team Profile</a>
					</div>
					<div class="col-md-6 col-sm-8 col-xs-12 pr0 rs-hide">
						<h2 class="fs32 mb20 rs-nm">
							Don't rely on hearsay. Leverage data!
						</h2>
						<h4 class="mt40 fs22 h-text4 lh-30">
							Evaluate detailed portfolios and check past references before deciding who to work with.
						</h4>
						<a itemprop="url" class="btn btn-default-home pt10 pb10 pl25 pr25 mt15 fs14 font_bold" href="<?php echo CController::createUrl('/Digital-Trike');?>" target="_blank" >Check Out a Sample Team Profile</a>
					</div>
					<div class="col-md-6 col-sm-4 col-xs-12 rs-hide">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/dont-rely.png" alt="dont rely" class="pull-right mt15 rs-img img-responsive" />
					</div>
				</div>
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 mt40 rs-np rs-bb2">
					<div class="col-md-2 col-sm-3 col-xs-12 rs-center rs-mb10 rs-np">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/kram.png" alt="Ceo" class="img-circle rs-img gray-img" width="93" height="93"/>
					</div>
					<div itemprop="review" itemscope itemtype="http://schema.org/Review" class="col-md-10 col-sm-9 col-xs-12 rs-mb10 rs-np">
						<span class="fs16 lh-22 h-text5">
							<i itemprop="reviewBody">With their extensive network of qualified and varied developers- from all zones and levels- we were provided with the opportunity and assistance to select the best development team to meet our budget and quality needs.</i>
						</span>
						<span itemprop="author" itemscope itemtype="http://schema.org/Person">
							<div itemprop="name" class="col-md-12 np mt20">
								<h4 class="fs14 mb0 font_newregular">Anthony Georgiades</h4>
								<h5 class="mt0">CoFounder, Kram Technologies</h5>
							</div>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div">
	<div class="error-table-layout remove-css">
		<div class="container mt40">
			<div itemscope itemtype="http://schema.org/LocalBusiness" class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 rs-np">
				<div class="bb2 pb10 col-md-12 col-xs-12 np pb40">
					<div class="col-md-6 col-sm-4 col-xs-8 col-xs-offset-2 rs-show">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/escrow.png" alt="Escrow Payment" class="pull-right mt15 rs-img" width="354" height="268"/>
					</div>
					<div class="col-md-6 col-sm-8 col-xs-12 rs-hide pl0 pr0">
						<h2 class="fs28 mb20">
							Don't fall into common outsourcing pitfalls!
						</h2>
						<h4 class="mt30 fs18 h-text4 lh-30">
							Our engagement platform helps you securely manage contracts, escrow payments and milestones.
						</h4>
						<a itemprop="url" class="btn btn-default-home pt10 pb10 pl10 pr10 mt15 fs12 font_newlight" href="<?php echo CController::createUrl('/site/howItWorks');?>" >See How It All Works</a>
					</div>
					<div class="col-md-6 col-sm-8 col-xs-12 rs-show pl0 pr0">
						<h2 class="fs28 mb20">
							Don't fall into common outsourcing pitfalls!
						</h2>
						<h4 class="mt30 fs18 h-text4 lh-30">
							Our engagement platform helps you securely manage contracts, escrow payments and milestones.
						</h4>
						<a itemprop="url" class="btn btn-default-home pt10 pb10 pl25 pr25 mt15 fs14 font_newlight" href="<?php echo CController::createUrl('/site/howItWorks');?>" >See How It All Works</a>
					</div>
					<div class="col-md-6 col-sm-4 col-xs-12 rs-hide">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/escrow.png" alt="Escrow Payment" class="pull-right mt15 rs-img  img-responsive" />
					</div>
				</div>
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 mt40 rs-np">
					<div class="col-md-2 col-sm-3 col-xs-12 rs-center rs-mb10 rs-np">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/klink-logo.jpg" alt="Ceo" class="img-circle rs-img gray-img" width="93" height="93"/>
					</div>
					<div itemprop="review" itemscope itemtype="http://schema.org/Review" class="col-md-10 col-sm-9 col-xs-12 rs-mb10 rs-np">
						<span class="fs16 lh-22 h-text5">
							<i itemprop="reviewBody">VenturePact provided an awesome and convenient way to find quality development firms that fit our needs, budgets, and timeline demands.  VenturePact is extremely hands-on, and available to arbitrate any disputes that may arise.  They also offer a great way to pay firms, which is completely hassle-free.  I'd recommend VenturePact to anyone looking for development firms with which to work.</i>
						</span>
						<span itemprop="author" itemscope itemtype="http://schema.org/Person">
							<div itemprop="name" class="col-md-12 np mt20">
								<h4 class="fs14 mb0 font_newregular">Nicholas Bowers</h4>
								<h5 class="mt0">CTO, Klink Technologies</h5>
							</div>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="col-md-12 col-sm-12 col-xs-12 np slide bp-gradient-bg table-div">
	<div class="error-table-layout trusted-div remove-css">
		<div class="container mt80">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center ">
				<img class="" alt="Gift" src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/gift.png" width="120" height="121">
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 mt30 rs-np rs-mb25">
				<ul class="nav nav-pills mb20 col-md-8 col-md-offset-2 col-xs-12 col-sm-12 rs-show rs-np rs-center">
					<li class="rs-mb10 active rs-nav">
						<a href="#tab17_1" class="rs-h-tabs font_newregular nm" data-toggle="tab">Referral</a>
					</li>
					<li class="rs-mb10 rs-nav">
						<a href="#tab17_2" class="rs-h-tabs font_newregular nm" data-toggle="tab">Member Benefits</a>
					</li>
					<li class="rs-mb10 rs-nav">
						<a href="#tab17_3" class="rs-h-tabs font_newregular nm" data-toggle="tab">Free Resources</a>
					</li>
				</ul>
				<ul class="nav nav-pills mb20 rs-hide text-center pl0">
					<li class="rs-100 active nav-pills-li">
						<a href="#tab17_1" class="h-tabs font_newregular" data-toggle="tab">Referral Savings</a>
					</li>
					<li class="rs-100 nav-pills-li">
						<a href="#tab17_2" class="h-tabs font_newregular" data-toggle="tab">Member Benefits</a>
					</li>
					<li class="rs-100 nav-pills-li">
						<a href="#tab17_3" class="h-tabs font_newregular" data-toggle="tab">Free Resources</a>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="tab-content br-n pn">
					<div id="tab17_1" class="tab-pane active">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
								<h2 class="text_white">Earn $500 For Every Friend You Refer</h2>
								<ul class="rs-np">
									<li class="grey-new-light fs18 lh32 rs-center">80% of our members earn over $1500 towards their projects.</li>
									<li class="grey-new-light fs18 lh32 rs-center mt20"> <a class="btn btn-orange fs15 pl15 pr15 pt10 pb10 font_newregular" href="<?php echo CController::createUrl('/site/referral');?>">Refer Now</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div id="tab17_2" class="tab-pane">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
								<h2 class="text_white">Exclusive Benefits From Our Partners</h2>
								<ul class="np rs-np">
									<li class="grey-new-light fs18 lh32 rs-center"> Benefits include free hosting, SEO audits &amp; much more</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="tab17_3" class="tab-pane">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center">
								<h2 class="text_white">eBooks That Will Make You a Pro</h2>
								<ul class="rs-np">
									<li class="grey-new-light fs18 lh32 rs-center"> Read Our Outsourcing 101 ebook on How, When &amp; Where To Outsource! </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div">
	<div class="container mt60 rs-nm">
		<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt30 text-center rs-show bb">
			<span class="btn-default-collection font_newregular col-xs-12 rs-mt30 lh-24">Check Out Some Of Our Teams</span>
		</div>
		<div class="col-md-12 col-sm-12 pa20 mt50 text-center rs-nm rs-hide">
			<span class="btn-default-collection font_newregular bb  rs-mt30">Check Out Some Of Our Teams</span>
		</div>
		<div itemscope itemtype="http://schema.org/LocalBusiness"  class="col-md-12 col-sm-12 col-xs-12 pa20 mt20 rs-center rs-nm">
			<div class="col-md-3 col-sm-6 col-xs-12 rs-pb20 rs-bb2">
				<ul class="pl0 ul-collection">
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>"iOS"));?>">iOS Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Android'));?>">Android Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'JavaScript'));?>">Javascript Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'.NET'));?>">.NET Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Java'));?>">Java Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'iPhone'));?>">iPhone Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'iPad'));?>">iPad Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'ASP.NET'));?>">ASP.NET Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Windows Phone'));?>">Windows Phone Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Desktop Application'));?>">Desktop Application Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Business Application'));?>">Business Application Developers</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 rs-pb20 rs-bb2">
				<ul class="pl0 ul-collection">
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Ruby on Rails'));?>">Ruby on Rails Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Python'));?>">Python Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Node.js'));?>">Node.js Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Angular.js'));?>">Angular.js Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Backbone.js'));?>">Backbone.js Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Design'));?>">UI/UX Designers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Magento'));?>">Magento Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'CRM'));?>">CRM Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'CMS'));?>">CMS Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'ERP'));?>">ERP Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Ecommerce'));?>">Ecommerce Developers</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 rs-pb20 rs-bb2">
				<ul class="pl0 ul-collection">
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'PHP'));?>">PHP Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Wordpress'));?>">Wordpress Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Drupal'));?>">Drupal Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Joomla'));?>">Joomla Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Phonegap'));?>">Phonegap Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Game Development'));?>">Game Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Oracle'));?>">Oracle Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'SQL'));?>">SQL Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Postgres SQL'));?>">Postgres SQL Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Data Science'));?>">Data Science Developers</a></li>	
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Wearable Technology'));?>">Wearable Technology Developers</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<ul class="pl0 ul-collection">
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Cocos2d-x'));?>">Cocos Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'Mobile application'));?>">Mobile Application Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'MongoDB'));?>">MongoDB Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'HTML'));?>">HTML Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/developer',array('keyword'=>'CSS'));?>">CSS Developers</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/team',array('location'=>'New York'));?>">Developers in New York</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/team',array('location'=>'United States'));?>">Developers in USA</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/team',array('location'=>'Central & South America'));?>">Developers in South & Central America</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/team',array('location'=>'Eastern Europe'));?>">Developers in Eastern Europe</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/team',array('location'=>'Asia'));?>">Developers in Asia</a></li>
					<li class="mb15"><a itemprop="url" href="<?php echo CController::createUrl('/site/team',array('location'=>'India'));?>">Developers in India</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div" id="">
	<div itemscope itemtype="http://schema.org/LocalBusiness" class="col-md-12 col-sm-12 col-xs-12 np trusted-bg text-center rs-hide">
		<h2 itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="text_white fs36 mt80 font_newregular pt30 rs-pt10 rs-mt45">Top Brands Rate Their Experience with VenturePact at <span itemprop="ratingValue">4.9</span> on 5 (<span itemprop="ratingCount">212</span> ratings).</h2>
		<a itemprop="url" class="btn btn-default-white mt15 fs14 mb80 font_newlight rs-ml10 rs-mr10" href="<?php echo Yii::app()->createUrl('/site/testimonials');?>" >Read What They Have To Say</a>
	</div>
	<div itemscope itemtype="http://schema.org/LocalBusiness" class="col-md-12 col-sm-12 col-xs-12 np trusted-bg text-center rs-show">
		<h2 itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="text_white fs28 mt80 font_newregular pt30 rs-pt10 rs-mt45">Top Brands Rate Their Experience with VenturePact at <span itemprop="ratingValue">4.9</span> on 5 (<span itemprop="ratingCount">212</span> ratings).</h2>
		<a itemprop="url" class="btn rs-btn-default-white mt15 mb80 fs14 font_newlight rs-ml10 rs-mr10" href="<?php echo Yii::app()->createUrl('/site/testimonials');?>" >Read What They Have To Say</a>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 np">
		<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12 pa10 mt30 text-center rs-show">
				<span class="btn-default-news font_newregular bb col-xs-12">Featured In</span>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt80 text-center rs-hide">
				<span class="btn-default-news font_newregular bb">Featured In</span>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 np pb25 text-center rs-show">
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/tc.png" alt="TechCrunch" class="rs-img  img-responsive" width="250" height="130"/>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/inc.png" alt="Inc" class="rs-img img-responsive" width="250" height="130"/>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/forbes.png" alt="Forbes" class="rs-img img-responsive" width="230" height="120"/>
				</div>
				<div class="col-md-3 col-sm-3  col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/hbr.png" alt="Harward Business Review" class="rs-img img-responsive" width="250" height="130"/>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 text-center rs-hide">
				<div class="col-md-3 col-sm-3  col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/tc.png" alt="TechCrunch" class="rs-img img-responsive" width="250" height="130" />
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/inc.png" alt="Inc" class="rs-img img-responsive" width="250" height="130" />
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/forbes.png" alt="Forbes" class="rs-img  img-responsive" width="230" height="120" />
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/hbr.png" alt="Harward Business Review" class="rs-img img-responsive" width="250" height="130" />
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal SignUp -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-md-12 col-xs-12 np">
			<div class="modal-body col-md-12 col-xs-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np p20">
					<div class="col-md-12 col-xs-12 np">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<!-- Sign Up starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 col-xs-12 modal-create-acc modal-create-acc-show">
							
							<div class="alert alert-dismissible alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>
	
							<h3 class="fs26 font_newlight team-text-blue mt5">Create Account</h3>
							<div class="form-group">
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignUp via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
								</div>
								<div class="col-md-12 col-xs-12 mt5 mb5">
									<div class="col-md-5 col-xs-12 border-overlay"></div>
									<div class="col-md-2 col-xs-12 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 col-xs-12 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/signup'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::hiddenField('is_search_signup','1',array('id'=>'is_search_signup'));
									echo CHtml::hiddenField('signup-category','',array('id'=>'signup-category'));	
									echo CHtml::hiddenField('signup-val','',array('id'=>'signup-val'));
									echo $form->textField($users,'first_name',array('data-parsley-required-message'=>'Name is required','placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input bb0 required alphanum minlength','length'=>"2",'tabindex'=>'1'));
									
									if(Yii::app()->user->hasState('promo')){
										$users->refCode=Yii::app()->user->promo;
										echo $form->hiddenField($users,'refCode');
												
										if(Yii::app()->user->hasState('remail')){
											echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Email",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2','readonly'=>'readonly'));
										}else
											echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Email",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2'));
									}else{
										echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2'));
									}
									$users->password	=	'';
									echo $form->passwordField($users,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'required'=>'required','title'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required minlength','length'=>"6",'tabindex'=>'3'));?>
									<?php $users->role_id=2; echo $form->hiddenField($users,'role_id'); ?>
									<?php if(Yii::app()->user->hasState('promo')){
											$users->refCode	=	Yii::app()->user->promo;
											echo $form->hiddenField($users,'refCode');
									}?>
									
									
								</div>
								<div class="col-md-12 col-xs-12">
									<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
										<input required="required" type="checkbox" name="customcheckbox1" id="customcheckbox1" checked/>
										<label for="customcheckbox1" class="fs12 grey1">&nbsp; I agree to</label>
										<a class="fs12 font_newregular orange-new mt15" href="javascript:void(0);" id="" data-toggle='modal' data-target='#terms-conditions'>Terms & Conditions</a>
									</div>
								</div>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::button('Create Account',array('id'=>'signupSearch','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15','tabindex'=>'4','data-id'=>'sign_up')); ?>
								</div>
								<?php $this->endWidget(); ?>						
								<div class="col-md-12 col-xs-12">
									<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
										<span class="grey1 fs14">Already have an Account? <a class="fs14 font_newregular mt20 grey1 orange-new modal-signin-div" id="" href="javascript:void(0);">Sign In</a></span>
									</div>
								</div>
							</div>	
						</div>
						<!-- Sign Up ends -->
						<!-- Forgot Password starts -->
						<?php $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form-search','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-forgot-password modal-forgot-password-hide">
							<div class="alert alert-success hide mt15 mb15" id="repsoneRest1" style="width:100%; margin:0 auto;">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
								<p id="messageResponse1"><?php echo Yii::app()->user->getFlash('errorfPass'); ?></p>
							</div>
							<div id="resetpass1">
								<h3 class="fs26 font_newlight team-text-blue mt5">No Problem!</h3>
								<div class="form-group">
									<div class="col-md-12 col-xs-12">
										<?php echo $form->textField($forgot,'email',array('data-parsley-required-message'=>'Email is required','placeholder'=>'Email','class'=>'gui-input bb2 mt10','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email1')); ?>
									</div>
									<div class="col-md-12 col-xs-12">
										<?php echo CHtml::button('Reset Password',array('name'=>'Submit','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt20','id'=>'passButSat1')); ?>
									</div>
									<div class="col-md-12 col-xs-12">
										<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
											<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new modal-create-accDiv" href="javascript:void(0);">Create now</a></span>	
										</div>
									</div>
								</div>	
							</div>
						</div>
						<?php $this->endWidget(); ?>
						<!-- Forgot Password ends -->
						<!-- Sign In starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-signin modal-signin-hide rs-np">
							
							<div class="alert alert-dismissible alert-danger alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>

							<h3 class="fs26 font_newlight team-text-blue mt5">Members</h3>
							<div class="form-group">
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
								</div>
								<div class="col-md-12 col-xs-12 mt5 mb5">
									<div class="col-md-5 col-xs-12 border-overlay"></div>
									<div class="col-md-2 col-xs-12 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 col-xs-12 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/login'),'id'=>'login-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::hiddenField('is_search_login','1',array('id'=>'is_search_login'));  ?>
									<?php echo CHtml::hiddenField('login-category','',array('id'=>'login-category'));  ?>
									<?php echo CHtml::hiddenField('login-val','',array('id'=>'login-val'));  ?>
									<?php echo $form->emailField($model,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email")); ?>
									<?php echo $form->passwordField($model,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordFieldInPopup')); ?>
								</div>
								<div class="col-md-12 col-xs-12">
									<div class="col-md-6 col-xs-6 np">
										<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10 rs-nm">
											<?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox"));?>
											<label for="customcheckbox" class="fs12 grey1">&nbsp; Remember me</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-6 np">
										<a class="fs12 font_newregular orange-new pull-right mt15 modal-forgot-passwordDiv" href="javascript:void(0);" id="">Forgot Password?</a>	
									</div>
								</div>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::button('Sign In',array('id'=>'login-m','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15','data-id'=>'login-form')); ?>
								</div>
								<?php $this->endWidget(); ?>	
								<div class="col-md-12 col-xs-12">
									<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
										<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new modal-create-accDiv" href="javascript:void(0);">Create now</a></span>	
									</div>
								</div>
							</div>	
						</div>
						<!-- Sign In ends -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal SignUp End-->
<!-- Modal Thank You -->
<div class="modal fade" id="thankyou" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-md-12 col-xs-12 np">
			<div class="modal-body col-md-12 col-xs-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np p30 thankyou-bg-popup" id="">
					<div class="col-md-12 col-xs-12 np">
						<div class="col-md-12 col-xs-12 text-center mt30 mb40">
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/thankyou-img.jpg" class="" alt="" />
						</div>
						<div class="col-md-12 col-xs-12 text-center">
							<h2 class="fs24 font_newlight blue-new mb20 pb10">Thank you for <br/>submitting your review.</h2>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/thankyou-done-img.png" class="" alt="" />
						</div>
						<div class="col-md-12 col-xs-12 text-center mt10">
							<button type="button" class="btn btn-orange fs14" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Thank You End-->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize.js"></script>
<script>
$(document).ready(function(){
	
	var selectizeOP	=	$('#select-skills').selectize({
		openOnFocus: false,
		maxItems: 1,
		sortField: {field: 'text',},
		closeAfterSelect: true,
		maxOptions:12,
		optgroup: true,
		plugins: ['remove_button'],
		onChange: function() {
			
		},
		onItemRemove: function() {
			$('#select-skills').close();
    	}
	});
	
	
	$('#menu-modal').click(function(){
		$('body').css('overflow','hidden');
	});
	$('#menu-close').click(function(){
		$('body').css('overflow','auto');
	});

	$('#searchFormSite').submit(function() {
		localStorage.clear();
		return true;
	});
	
	
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
		localStorage.clear();
		signIn($(this));
	});
	
	$('#signupSearch').click(function(){
		//$(this).attr('value','Creating Account ...');
		$('#signup-category').val($('.skill-search').val());
		var $value;
		$('.algolia-search').each(function(){
			if($(this).val()!='')
				$value	=	$(this).val();
		})
		$('#signup-val').val($value);
		localStorage.clear();
		signUp($(this));
	});

	$( "#passwordFieldInPopup" ).keypress(function( event ) {
	  if ( event.which == 13 ) {
	     $( "#login-m" ).trigger( "click" );
	  }
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
	
	<?php if(isset($_REQUEST['thank']) && $_REQUEST['thank']==1){?>
	$('#thankyou').modal('toggle');
	<?php } ?>

	$(".menu-icon").click(function(){
		$(".menu-login-section").fadeIn(300);
		<?php 
		if(Yii::app()->user->hasState('promo')){
			if(Yii::app()->user->hasState('remail')){?>
				$('.btn-linkedin').attr('href','<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>2,'redirectType'=>5));?>');
		<?php 
			}
			else{ ?>
				$('.btn-linkedin').attr('href','<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>2,'redirectType'=>4));?>');
		<?php
			}
		}
		else{ ?>
			$(".btn-linkedin").attr('href',"<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>'2'));?>");
		<?php 
		} ?>
		$('.affiliate').val('2');
	});
	
	$('#affiliateSignup').click(function(){
		$(".menu-login-section").fadeIn(300);
		$(".btn-linkedin").attr('href',"<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>'6'));?>");
		$('.affiliate').val('6');
	});
});
</script>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END,array('async'=>'async')); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END,array('async'=>'async')); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algolia.js',CClientScript::POS_END,array('async'=>'async')); ?>
<script type="text/javascript">
var CE_SNAPSHOT_NAME = "VenturePact Index Page";
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0034/1290.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>

<style>
/* bounce effect */
.animated{-webkit-animation-name: bounceIn !important;
  -webkit-animation-duration: 4s !important;
  -webkit-animation-iteration-count: infinite !important;
  -webkit-animation-timing-function: ease-out !important;
  -webkit-animation-fill-mode: forwards !important; 
  animation-name: bounceIn !important;
  animation-duration: 4s !important;
  animation-iteration-count: infinite !important;
  animation-timing-function: ease-out !important;
  animation-fill-mode: forwards !important;}
.bounce {
  -webkit-animation-name: bounce;
  animation-name: bounce;
}
</style>
