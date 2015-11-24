<div class="col-md-12 col-sm-12 col-xs-12 np slide table-div">
	<div class="navbar np">
		<div class="col-md-3 np mt20">
			<?php
			if(Yii::app()->user->isGuest)
				echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/'),array('class'=>'blue-logo ml10'));
			else
				echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'blue-logo ml10'));
			?>
		</div>
		<div class="pull-right col-md-9 mt20">					
			<ul class="nav navbar-nav navbar-right">						
				<li>
					<a href="<?php echo CController::createUrl('/site/project');?>" class="fs14 font_newregular grey-new-light pr25">Post your Project</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25">1888 Venture-Pact</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 menu-icon">
						<i class="fa fa-bars pr5"></i> Menu
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="search-suppliers_home">
			<div class="col-md-12 col-sm-12 col-xs-12 mt70 mb25">
				<div class="col-md-12 text-center mt30">
					<h1 class="fs40 font_newregular h-text mt10">Hi,shouldn't finding<br> development team be eaiser?</h1>
					<h3 class="fs30 font_newregular h-text2 mt20">We think so!</h3>
				</div>
				<div class="col-md-10 col-md-offset-1 text-center mt30">
					<div class="admin-form form-horizontal">
						<form action="<?php echo Yii::app()->createUrl('/site/search1');?>" method="post">
							<input type="hidden" id="skill-search" value='keyword' name='keyword' class="hide" />
							<div class="form-group search col-md-8 mb5">
								<label class="field prepend-icon algolia_parent">
									<input type="text" placeholder="Search Your Team (eg: php, Mobile, Gaming)" class="form-control" id="sup-search" spellcheck="true" name='value'/>
									<label class="field-icon" for="Location"><span aria-hidden="true" class="icon-magnifier"></span></label>
								</label>
							</div>
							<?php if(Yii::app()->user->isGuest){?>
							<div class="col-md-2 text-center np">
								<button type="submit" value="Search" name='search' class="btn btn-orange fs15 pl15 pr15 pt10 pb10">Search via LinkedIn</button>
							</div>
							<div class="form-group search col-md-7"></div>
							<div class="col-md-5 text-right np">
								<span>or</span><a href="javascript:void(0);" data-toggle="modal" data-target="#signup" class="fs14 h-orange font_newregular" type="button"> Enter Your Email</a>
							</div>
							<?php }else{?>
							<div class="col-md-2 text-center np">
								<button type="submit" value="Search" name='search' class="btn btn-orange fs15 pl15 pr15 pt10 pb10">Search Your Team</button>
							</div>
							<?php }?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np h-lightbg pt40 slide table-div">
	<div class="trusted-div">
	<div class="container mt40">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center pa20">
			<span class="fs32 col-md-12 h-text3 mb15 font_newregular lh-44 mb40">Integer faucibus, dui quis pellentesque vestibulum, aliquet turpis, in consectetur ex dui vitae erat in eleifend eros</span>
			<div class="col-md-12">
				<div class="owl-carousel owl-theme owl-homepage mb30">
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/vw.jpg" alt="volkswagen" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/lg.jpg" alt="L.G" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/adidas.jpg" alt="Adidas" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/nbc.jpg" alt="NBC" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/vw.jpg" alt="volkswagen" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/fedex.jpg" alt="FedEx" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/dell.jpg" alt="Dell" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/vw.jpg" alt="volkswagen" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/lg.jpg" alt="L.G" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/adidas.jpg" alt="Adidas" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/nbc.jpg" alt="NBC" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/vw.jpg" alt="volkswagen" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/fedex.jpg" alt="FedEx" /></div>
					<div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/dell.jpg" alt="Dell" /></div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-12 np">
		<div class="navbar bg-light np navbar-height header-shadow hide" id="task_flyout">
			<div class="col-md-12 np">
				<div class="col-md-1 np br-gray">
					<?php
					if(Yii::app()->user->isGuest)
						echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'),array('class'=>'home-blue-logo ml10'));
					else
						echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'home-blue-logo ml10'));
					?>
				</div>
				<div class="col-md-6 pl20 pt10">
					<div class="admin-form form-horizontal">
						<div class="form-group client-dash-search mb0">
							<label class="field prepend-icon mt10">
								<input type="text" name="Email" id="Email" class="gui-input form-control fs24 font_newlight pt0 grey-light" placeholder="Search Your Team (eg: php, Mobile, Gaming)">
								<label for="Email" class="field-icon"><span class="icon-magnifier fs18 mr5" aria-hidden="true"></span></label>
							</label>
						</div>
					</div>
				</div>
				<div class="pull-right col-md-5 pt10 home-nav np">					
					<ul class="nav navbar-nav navbar-right">						
						<li>
							<a href="<?php echo CController::createUrl('/site/project');?>" class="fs14 font_newregular blue-new pr25">Post your Project</a>
						</li>
						<li>
							<a href="javascript:void(0);" class="fs14 font_newregular blue-new pr25">1888 Venture-Pact</a>
						</li>
						<li>
							<a href="javascript:void(0);" class="fs14 font_newregular blue-new pr25 menu-icon">
								<i class="fa fa-bars pr5"></i> Menu
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2">
	<div class="container mt40">
		<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h2 class="fs32 mb20">
					Don't waste money hiring the wrong developer
				</h2>
				<h4 class="mt40 fs22 h-text4 lh-30 font_newlight">
					Work with one od our thoroughly vetted software development teams with proven track records.
				</h4>
				<a class="btn btn-default-home pt10 pb10 pl25 pr25 mt15 fs14 font_bold font_newlight" href="#" >Know 4 step verification process</a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/waste-money.png" alt="dont waste money" class="pull-right mt15" />
			</div>
			<div class="col-md-12 col-sm-6 col-xs-12 mt40 bt2 pt40">
				<div class="col-md-2 col-sm-6 col-xs-12">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/ceo.png" alt="Ceo" class="img-circle" />
				</div>
				<div class="col-md-10 col-sm-6 col-xs-12">
					<span class="fs16 lh-22 h-text5">
						<i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa.</i>
					</span>
					<div class="col-md-12 np mt20">
						<h4 class="fs14 mb0 font_newregular">Valentino Sorano</h4>
						<h5 class="mt0">CEO, Themeforest</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2">
	<div class="container mt40">
		<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h2 class="fs32 mb20">
					Don't rely on just one conversation, use verified data to make an informed decision.
				</h2>
				<h4 class="mt40 fs22 h-text4 lh-30 font_newlight">
					Evaluate detailed portfolios and check past references before deciding who to work with a team.
				</h4>
				<a class="btn btn-default-home pt10 pb10 pl25 pr25 mt15 fs14 font_bold font_newlight" href="#" >See a sample profile</a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/dont-rely.png" alt="dont rely" class="pull-right mt15" />
			</div>
			<div class="col-md-12 col-sm-6 col-xs-12 mt40 bt2 pt40">
				<div class="col-md-2 col-sm-6 col-xs-12">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/ceo2.png" alt="Ceo" class="img-circle" />
				</div>
				<div class="col-md-10 col-sm-6 col-xs-12">
					<span class="fs16 lh-22 h-text5">
						<i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies.</i>
					</span>
					<div class="col-md-12 np mt20">
						<h4 class="fs14 mb0 font_newregular">James Bennett</h4>
						<h5 class="mt0">CEO, Photodune</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2">
	<div class="container mt40">
		<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h2 class="fs32 mb20">
					Don't fall into common outsourcing pitfalls
				</h2>
				<h4 class="mt40 fs22 h-text4 lh-30 font_newlight">
					Our engagement platform helps you securely manage contracts, escrow payments and milestones.
				</h4>
				<a class="btn btn-default-home pt10 pb10 pl25 pr25 mt15 fs14 font_bold font_newlight" href="#" >Check out the platfrom!</a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/escrow.png" alt="Escrow Payment" class="pull-right mt15" />
			</div>
			<div class="col-md-12 col-sm-6 col-xs-12 mt40 bt2 pt40">
				<div class="col-md-2 col-sm-6 col-xs-12">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/ceo3.png" alt="Ceo" class="img-circle" />
				</div>
				<div class="col-md-10 col-sm-6 col-xs-12">
					<span class="fs16 lh-22 h-text5">
						<i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies.</i>
					</span>
					<div class="col-md-12 np mt20">
						<h4 class="fs14 mb0 font_newregular">Ashley Spencer</h4>
						<h5 class="mt0">CEO, Envato</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide bp-gradient-bg table-div">
	<div class="col-md-12 col-sm-12 col-xs-12 np trusted-bg text-center mt80">
		<h2 class="text_white fs36 font_newregular mt90">Trusted by top tech companies past 10 years</h2>
		<a class="btn btn-default-white mt15 fs14 font_bold font_newlight" href="javascript:void(0);" >See More</a>
	</div>
	<div class="container">
		<div class="col-md-12 col-sm-6 col-xs-12 text-center">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/gift.png" alt="Gift" class="" />
		</div>
		<div class="col-md-12 col-sm-6 col-xs-12 mt30">
			<ul class="nav nav-pills mb20 col-md-8 col-md-offset-3">
				<li class="active">
					<a href="#tab17_1" class="h-tabs" data-toggle="tab">Special Offer</a>
				</li>
				<li>
					<a href="#tab17_2" class="h-tabs" data-toggle="tab">Member Benefits</a>
				</li>
				<li>
					<a href="#tab17_3" class="h-tabs" data-toggle="tab">Free Resources</a>
				</li>
			</ul>
			<div class="clearfix"></div>
			<div class="tab-content br-n pn">
				<div id="tab17_1" class="tab-pane active">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<h2 class="text_white">Special offer before the end of the month</h2>
							<ul class="tabs-ul">
								<li class="grey-new-light fs14"> > Start your project before the end of the month </li>
								<li class="grey-new-light fs14"> > Get a free security audit if you do X</li>
							</ul>
						</div>
					</div>
				</div>
				<div id="tab17_2" class="tab-pane">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<h2 class="text_white">Member Benefits before the end of the month</h2>
							<ul class="tabs-ul">
								<li class="grey-new-light fs14"> > Start your project before the end of the month </li>
								<li class="grey-new-light fs14"> > Get a free security audit if you do X</li>
							</ul>
						</div>
					</div>
				</div>
				<div id="tab17_3" class="tab-pane">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<h2 class="text_white">Free Resources before the end of the month</h2>
							<ul class="tabs-ul">
								<li class="grey-new-light fs14"> > Start your project before the end of the month </li>
								<li class="grey-new-light fs14"> > Get a free security audit if you do X</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2">
	<div class="container mt60">
		<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 text-center">
			<span class="btn-default-collection">Our Collection</span>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<h4 class="h-text">Developer Collections</h4>
				<ul class="pl0 ul-collection">
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<h4 class="h-text">Developer Collections</h4>
				<ul class="pl0 ul-collection">
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<h4 class="h-text">Developer Collections</h4>
				<ul class="pl0 ul-collection">
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<h4 class="h-text">Developer Collections</h4>
				<ul class="pl0 ul-collection">
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
					<li class="mb15"><a href="javascript:void(0);">Developer Collections</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide bp-gradient-bg table-div" id="focus">
	<div class="navbar np">
		<div class="col-md-3 np mt20">
			<?php
			if(Yii::app()->user->isGuest)
				echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/'),array('class'=>'blue-logo ml10'));
			else
				echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'blue-logo ml10'));
			?>
		</div>
		<div class="pull-right col-md-9 mt20">					
			<ul class="nav navbar-nav navbar-right">						
				<li>
					<a href="<?php echo CController::createUrl('/site/project');?>" class="fs14 font_newregular grey-new-light pr25">Post your Project</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25">1888 Venture-Pact</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 menu-icon">
						<i class="fa fa-bars pr5"></i> Menu
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="col-md-12 col-sm-12 col-xs-12 mt70 mb25 text-center">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 class="text_white fs40 display_inline">I need</h2>
				<input type="text" class="display_inline need-input" placeholder=".net" />
				<h2 class="text_white fs40 display_inline">team.</h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<button type="button" class="btn-lg fs16 mt40 text_white">Connect Me via LinkedIn</button>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 mt15">	
				<span>or</span><a href="javascript:void(0);" class="fs14 h-orange font_newregular" type="button"> Enter Your Email</a>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide bp-gradient-bg table-div">
	<div class="col-md-12 col-sm-12 col-xs-12 np news-bg">
		<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 text-center">
				<span class="btn-default-news">Venturepact in News</span>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt20 text-center">
				<div class="col-md-3">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/techcrunch.jpg" alt="TechCrunch" />
				</div>
				<div class="col-md-3">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/inc.jpg" alt="Inc" />
				</div>
				<div class="col-md-3">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/forbes.jpg" alt="Forbes" />
				</div>
				<div class="col-md-3">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/hbr.jpg" alt="Harward Business Review" />
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 np bgwhite">
		<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt20 mb30">
				<div class="col-md-4 np">
					<h4 class="mb15 fs18 h-text">Blogs</h4>
					<div class="col-md-12 np mb20">
						<div class="col-md-3 pl0">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/blog1.jpg" alt="Inc" />
						</div>
						<div class="col-md-9 pr0">
							<span class="fs12 col-md-12">
								What You Should Really Look For In Your Next Job (Or New Business)
							</span>
							<a class="display_block fs11 orange-new pl10" href="javascript:void(0);">Date will come here</a>
						</div>
					</div>
					<div class="col-md-12 np mb20">
						<div class="col-md-3 pl0">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/blog2.jpg" alt="Inc" />
						</div>
						<div class="col-md-9 pr0">
							<span class="fs12 col-md-12">
								What You Should Really Look For In Your Next Job (Or New Business)
							</span>
							<a class="display_block fs11 orange-new pl10" href="javascript:void(0);">Date will come here</a>
						</div>
					</div>
					<div class="col-md-12 np">
						<div class="col-md-3 pl0">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/blog3.jpg" alt="Inc" />
						</div>
						<div class="col-md-9 pr0">
							<span class="fs12 col-md-12">
								What You Should Really Look For In Your Next Job (Or New Business)
							</span>
							<a class="display_block fs11 orange-new pl10" href="javascript:void(0);">Date will come here</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<h4 class="mb15 fs18 h-text">Resources</h4>
					<div class="col-md-12 np mb20">
						<div class="col-md-5 np">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/blog3.jpg" alt="Inc" />
						</div>
						<div class="col-md-7 np">
							<span class="fs12 col-md-12">
								How to find remote team
							</span>
							<a class="display_block fs11 orange-new pl10" href="javascript:void(0);">Download</a>
						</div>
					</div>
					<div class="col-md-12 np">
						<div class="col-md-5 np">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/blog3.jpg" alt="Inc" />
						</div>
						<div class="col-md-7 np">
							<span class="fs12 col-md-12">
								How to find remote team
							</span>
							<a class="display_block fs11 orange-new pl10" href="javascript:void(0);">Download</a>
						</div>
					</div>
					<ul class="pl0 ul-other bt col-md-12 mt15 pt10">
						<li class="mb10"><a href="javascript:void(0);">Calculator</a></li>
						<li class="mb10"><a href="javascript:void(0);">Forum</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<h4 class="mb15 fs18 h-text">Others</h4>
					<ul class="pl0 ul-other">
						<li class="mb10"><a href="javascript:void(0);">About us</a></li>
						<li class="mb10"><a href="javascript:void(0);">Opportunities/Jobs</a></li>
						<li class="mb10"><a href="javascript:void(0);">Non Disclosing Agreements</a></li>
						<li class="mb10"><a href="javascript:void(0);">Press</a></li>
						<li class="mb10"><a href="javascript:void(0);">Contact us</a></li>
						<li class="mb10"><a href="javascript:void(0);">FAQs</a></li>
						<li class="mb10"><a href="javascript:void(0);">Become a partner</a></li>
					</ul>
				</div>
				<div class="col-md-2">
					<h4 class="mb15 fs18 h-text">Menu</h4>
					<ul class="pl0 ul-other">
						<li class="mb10"><a href="javascript:void(0);">How it works?</a></li>
						<li class="mb10"><a href="javascript:void(0);">Case Studies</a></li>
						<li class="mb10"><a href="javascript:void(0);">Refer a Project</a></li>
						<li class="mb10"><a href="javascript:void(0);">Resources/Blogs</a></li>
						<li class="mb10"><a href="javascript:void(0);">For Developers</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 np h-lightbg">
		<div class="container">
			<div class="col-md-6 col-sm-6 col-xs-12 pa20">
				<h4 class="fs14 font_newregular">VenturePact - Made in NY</h4>
				<span class="fs11 h-text6">© 2014 VenturePact All rights reserved.</span>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 pa20 pull-right">
				<a href="https://twitter.com/VenturePact" target="_blank" class="social-bg mr5"><i class="fa fa-twitter fa-lg h-icontext"></i></a>
				<a href="https://www.facebook.com/VenturePact" target="_blank" class="social-bg mr5"><i class="fa fa-facebook fa-lg h-icontext"></i></a>
				<a href="https://www.linkedin.com/company/venturepact" target="_blank" class="social-bg mr5"><i class="fa fa-linkedin fa-lg h-icontext"></i></a>
				<a href="https://plus.google.com/+Venturepact/about" target="_blank" class="social-bg"><i class="fa fa-google-plus fa-lg h-icontext"></i></a>
			</div>
		</div>
	</div>
</div>
<!-- Modal SignUp -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-md-12 np">
			<div class="modal-body col-md-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np p20">
					<div class="col-md-12 np">
						<!-- Sign Up starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-create-acc modal-create-acc-show">
							
							<div class="alert alert-dismissible alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>
	
							<h3 class="fs26 font_newlight team-text-blue mt5">Create Account</h3>
							<div class="form-group">
								<div class="col-md-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignUp via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
								</div>
								<div class="col-md-12 mt5 mb5">
									<div class="col-md-5 border-overlay"></div>
									<div class="col-md-2 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/signup'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
								<div class="col-md-12">
									<?php echo CHtml::hiddenField('is_search_signup','1',array('id'=>'is_search_signup'));  ?>
									<?php echo CHtml::hiddenField('signup-category','',array('id'=>'signup-category'));  ?>
									<?php echo CHtml::hiddenField('signup-val','',array('id'=>'signup-val'));  ?>
									<?php echo $form->textField($users,'first_name',array('placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input bb0 required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
									<?php echo $form->emailField($users,'username',array('placeholder'=>"Your Email Address",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2')); ?>
									<?php echo $form->passwordField($users,'password',array('placeholder'=>"Password",'required'=>'required','title'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required minlength','length'=>"6",'tabindex'=>'3'));?>
									<?php $users->role_id=2; echo $form->hiddenField($users,'role_id'); ?>
								</div>
								<div class="col-md-12">
									<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
										<input required="required" type="checkbox" name="customcheckbox1" id="customcheckbox1" checked/>
										<label for="customcheckbox1" class="fs12 grey1">&nbsp; I agree to</label>
										<a class="fs12 font_newregular orange-new mt15" href="javascript:void(0);" id="">Terms & Conditions</a>
									</div>
								</div>
								<div class="col-md-12">
									<?php echo CHtml::button('Create Account',array('id'=>'signupSearch','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15','tabindex'=>'4','data-id'=>'sign_up')); ?>
								</div>
								<?php $this->endWidget(); ?>						
								<div class="col-md-12">
									<div class="col-md-12 bt mt25 pt20 np">
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
									<div class="col-md-12">
										<?php echo $form->textField($forgot,'email',array('placeholder'=>'Email','class'=>'gui-input bb2 mt10','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email1')); ?>
									</div>
									<div class="col-md-12">
										<?php echo CHtml::button('Reset Password',array('name'=>'Submit','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt20','id'=>'passButSat1')); ?>
									</div>
									<div class="col-md-12">
										<div class="col-md-12 bt mt25 pt20 np">
											<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new modal-create-accDiv" href="javascript:void(0);">Create now</a></span>	
										</div>
									</div>
								</div>	
							</div>
						</div>
						<?php $this->endWidget(); ?>
						<!-- Forgot Password ends -->
						<!-- Sign In starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-signin modal-signin-hide">
							
							<div class="alert alert-dismissible alert-danger alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>

							<h3 class="fs26 font_newlight team-text-blue mt5">Members</h3>
							<div class="form-group">
								<div class="col-md-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
								</div>
								<div class="col-md-12 mt5 mb5">
									<div class="col-md-5 border-overlay"></div>
									<div class="col-md-2 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/login'),'id'=>'login-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
								<div class="col-md-12">
									<?php echo CHtml::hiddenField('is_search_login','1',array('id'=>'is_search_login'));  ?>
									<?php echo CHtml::hiddenField('login-category','',array('id'=>'login-category'));  ?>
									<?php echo CHtml::hiddenField('login-val','',array('id'=>'login-val'));  ?>
									<?php echo $form->emailField($model,'username',array('placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email")); ?>
									<div class="col-md-12">
									<?php echo $form->passwordField($model,'password',array('placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordFieldInPopup')); ?>
									<a class="fs12 font_newregular orange-new pull-right mt15 modal-forgot-passwordDiv forgot-pass" href="javascript:void(0);" id="">Forgot ?</a>
									</div>
								</div>
							<!--	<div class="col-md-12">
									<div class="col-md-6 np">
										<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
											<?php  // echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox"));?>
											<label for="customcheckbox" class="fs12 grey1">&nbsp; Remember me</label>
										</div>
									</div>
									<div class="col-md-6 np">
											
									</div>
								</div>-->
								<div class="col-md-12">
									<?php echo CHtml::button('Sign In',array('id'=>'login-m','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15','data-id'=>'login-form')); ?>
								</div>
								<?php $this->endWidget(); ?>	
								<div class="col-md-12">
									<div class="col-md-12 bt mt25 pt20 np">
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
		<div class="modal-content col-md-12 np">
			<div class="modal-body col-md-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np p30 thankyou-bg-popup" id="">
					<div class="col-md-12 np">
						<div class="col-md-12 text-center mt30 mb40">
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/thankyou-img.jpg" class="" alt="thank you" />
						</div>
						<div class="col-md-12 text-center">
							<h1 class="fs24 font_newlight blue-new mb20 pb10">Thank you for <br/>reviewing this partner.</h1>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/thankyou-done-img.png" class="" alt="thank you" />
							<h1 class="fs24 font_newlight blue-new mb20 pt10">We will let them know about <br/>your review.</h1>		
						</div>
						<div class="col-md-12 text-center mt10">
							<button type="button" class="btn btn-orange fs14" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Thank You End-->
<script>
$(document).ready(function(){
	$("#linkedinButton").click(function(){
		var searchItem = $('#sup-search').val();
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
		$('#login-category').val($('#skill-search').val());
		$('#login-val').val($('#sup-search').val());
		signIn($(this));
	});
	
	$('#signupSearch').click(function(){
		$(this).attr('value','Creating Account ...');
		$('#signup-category').val($('#skill-search').val());
		$('#signup-val').val($('#sup-search').val());
		signUp($(this));
	});

	$( "#passwordFieldInPopup" ).keypress(function( event ) {
	  if ( event.which == 13 ) {
	     $( "#login-m" ).trigger( "click" );
	  }
	});

	<?php if(isset($_REQUEST['thank']) && $_REQUEST['thank']==1){?>
	$('#thankyou').modal('toggle');
	<?php } ?>
});
</script>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algolia.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/hogan.common.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScript('myHideEffect','$(".alertMessage").animate({opacity: 1.0}, 10000).fadeOut("slow");',CClientScript::POS_READY);?>