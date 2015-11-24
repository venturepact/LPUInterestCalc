<div class="col-md-12 col-sm-12 col-xs-12 np slide table-div rs-mt38 gradient-bg-dark">
	<div class="navbar np navbar-fixed-top rs-hide" id="nav-bar">
		<div class="col-md-3 np">
			<?php
			if(Yii::app()->user->isGuest)
				echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/site'),array('class'=>'blue-logo ml10'));
			else
				echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'blue-logo ml10'));
			?>
		</div>
		<div class="pull-right col-md-9 home-nav mt15">	 				
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="tel:9497917659" class="fs14 font_newregular grey-new-light pr25">Call 949.791.7659</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 menu-icon">
						<i class="fa fa-bars pr5"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="error-table-layout">
			<div class="search-suppliers_home">
				<div class="mt70 rs-nm mb25">
					<div class="text-center mt30 rs-nm">
						<h1 class="fs48 font_newregular h-text mt10 rs-fs30">Help Clients and Businesses Build Web and Mobile Apps</h1>
						<h3 class="fs24 font_newregular h-text2 mt20">Faster, Smarter and Cheaper!</h3>
					</div>
					<div class="text-center mt30 pb30">
						<div class="col-md-4 col-md-offset-4 text-center np">
							<a href="javascript:void(0);" class="btn btn-orange menu-icon fs15 pl15 pr15 pt10 pb10 font_newregular">Become Our Partner</a>
							<?php //echo CHtml::link('Become Our Partner', array('/site/linkedin','lType'=>'initiate','role'=>6),array('class'=>'btn btn-orange  fs15 pl15 pr15 pt10 pb10 font_newregular'));?>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np h-lightbg pt40 slide table-div">
	<div class="trusted-div" id="slider-outrr">
		<div class="container mt40">
			<div class="text-center">
				<span class="fs26 lh-30 col-md-12 h-text3 font_newregular mb15">Our Partners</span>
				<div class="col-md-12 col-xs-12 text-center mt20 img_section font_newlight">
						<div class="col-md-4 col-xs-6 mb40 partner">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/c1.png" alt="" class="mt15 rs-img img_line" />
							<h4 class="mt10 fs22 h-text4 lh-30">Creative & Marketing <br>Agencies</h4>
						</div>
						<div class="col-md-4 col-xs-6 mb40 partner">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/c2.png" alt="" class="mt15 rs-img img_line" />
							<h4 class="mt10 fs22 h-text4 lh-30">Incubators <br>& VCs</h4>
						</div>
						<div class="col-md-4 col-xs-6 mb40 partner">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/c3.png" alt="" class="mt15 rs-img img_line" />
							<h4 class="mt10 fs22 h-text4 lh-30">Co-Working <br>Spaces</h4>
						</div>
						<div class="col-md-4 col-xs-6 mb40 partner">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/c4.png" alt="" class="mt15 rs-img img_line" />
							<h4 class="mt10 fs22 h-text4 lh-30">Community<br> Banks</h4>
						</div>
						<div class="col-md-4 col-xs-6 mb40 partner">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/c5.png" alt="" class="mt15 rs-img img_line" />
							<h4 class="mt10 fs22 h-text4 lh-30">Entrepreneur <br>Networks</h4>
						</div>
						<div class="col-md-4 col-xs-6 mb40 partner">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/c6.png" alt="" class="mt15 rs-img img_line" />
							<h4 class="mt10 fs22 h-text4 lh-30">Publishers</h4>
						</div>
					</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 np">
		<div class="navbar bg-light np header-shadow hide" id="rs-task_flyout">
			<div class="col-md-12 np">
				<div class="col-md-1 col-xs-4 np br-gray">
					<?php
					if(Yii::app()->user->isGuest)
						echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'),array('class'=>'home-blue-logo ml10'));
					else
						echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'home-blue-logo ml10'));
					?>
				</div>
				<div class="pull-right col-md-5 home-nav np col-xs-8">					
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="tel:9497917659" class="fs14 font_newregular blue-new pr25 rs-hide">Call 949.791.7659</a>

						</li>
						<li>
							<a href="javascript:void(0);" class="fs14 font_newregular blue-new pr35 menu-icon">
								<i class="fa fa-bars pr5"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div">
	<div class="error-table-layout remove-css">
		<div class="container mt40">
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 rs-np rs-nm">
				<div class="bb1 col-md-12 col-xs-12 np pb30">
					<div class="col-md-6 col-sm-8 col-xs-12 pl0 pr0">
						<h2 class="fs22 mb20 font_newlight">
							Provide a Value Add Service To Your Network
						</h2>
						<h4 class="mt30 fs16 h-text4 lh-30 font_newlight">
							We try to ensure that each lead on our platform has a clear need and a justifiable budget.
						</h4>
						<h4 class="mt30 fs16 h-text4 font_newlight">
							For a limited time, your clients even get $500 off.
						</h4>
					</div>
					<div class="col-md-6 col-sm-4 col-xs-12 rs-hide">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/img1.png" alt="Value Add Service" class="pull-right rs-img mt15" />
					</div>
					<div class="col-md-6 col-sm-4 col-xs-12 rs-show text-center">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/img1.png" alt="Value Add Service" class="rs-img mt15" />
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 pt10 mt10 rs-np rs-nm pb10">
				<div class="bb1 pb10 col-md-12 col-xs-12 np">
					<div class="col-md-6 col-sm-8 col-xs-12 pl0 pr0 pt40 pull-right">
						<h2 class="fs22 mb20 font_newlight">
							Get Visibility
						</h2>
						<h4 class="mt30 fs16 h-text4 lh-30 font_newlight">
							Write for our blog, offer benefits to our clients and get exposure on our email newsletters.
						</h4>
					</div>
					<div class="col-md-6 col-sm-4 col-xs-12 pull-left rs-hide">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/img2.png" alt="Get Visibility" class="pull-left rs-img mt15" />
					</div>
					<div class="col-md-6 col-sm-4 col-xs-12 rs-show text-center">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/img2.png" alt="Get Visibility" class="rs-img mt15" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div">
	<div class="error-table-layout remove-css">
		<div class="col-md-12 col-sm-12 col-xs-12 np">
			<div class="container mt40">
				<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 rs-np rs-nm">
					<div class="bb1  col-md-12 col-xs-12 np pb30">
						<div class="col-md-6 col-sm-8 col-xs-12 pl0 pr0">
							<h2 class="fs22 mb20 font_newlight">
								Earn Passive Income
							</h2>
							<h4 class="mt30 fs16 h-text4 lh-30 font_newlight">
								You can make over 20% of VenturePact‘s income while adding great value to your network
							</h4>
							<h4 class="mt30 fs16 h-text4 font_newlight">
								For a limited time, your clients even get $500 off.
							</h4>
						</div>
						<div class="col-md-6 col-sm-4 col-xs-12 rs-hide">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/img3.png" alt="Earn Passive Income" class="pull-right rs-img mt15" />
						</div>
						<div class="col-md-6 col-sm-4 col-xs-12 rs-show text-center">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/img3.png" alt="Earn Passive Income" class="rs-img mt15" />
						</div>
					</div>
				</div>
				<div class="col-md-12 col-sm-6 col-xs-12 text-center mt20">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/envlp.png" alt="Gift" class="" />
				</div>
				<div class="col-md-12 col-sm-6 col-xs-12 mt10">
					<div class="clearfix"></div>
					<div class="tab-content br-n pn pb30">
						<div id="" class="tab-pane active">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 text-center font_newlight">
									<h2>Have Ideas For a Deeper Partnership? </h2>
									<ul class="tabs-ul pl0 text-center ml0 mb10">
										<li class="fs16"> We are all ears! Email us at </li>
									</ul>
																	
									<a href="mailto:refer@venturepact.com?bcc=joshw@venturepact.com&amp;subject=Meet%20Josh%20From%20VenturePact&amp;body=Hey%2C%0A%0AI%20think%20VenturePact%20will%20be%20able%20to%20help%20you%20find%20the%20best%20developer%20for%20your%20needs.%20Feel%20free%20to%20let%20Josh%20know%20more%20about%20your%20needs.%0A%0ABest;" class="orange-new mt15 fs14 font_bold" target="_blank">Partners@VenturePact.com</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('#Users_role_id').val('6');
	$('.btn-linkedin').attr('href','<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>'6'));?>');
});
</script>