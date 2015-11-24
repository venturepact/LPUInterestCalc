<div class="col-md-12 col-sm-12 col-xs-12 np slide table-div rs-mt38 gradient-bg-dark">
	<div itemscope itemtype="http://schema.org/LocalBusiness" class="navbar np navbar-fixed-top rs-hide" id="nav-bar">
		<div class="col-md-3 np ">
			<?php
			if(Yii::app()->user->isGuest)
				echo CHtml::link('<img itemprop="image" src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/index'),array('class'=>'blue-logo ml10'));
			else
				echo CHtml::link('<img itemprop="image" src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'blue-logo ml10'));
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
						<h1 class="fs48 font_newregular h-text mt10">Grow Your Business!</h1>
						<h3 class="fs24 font_newregular h-text2 mt20">Find And Engage With Verified Customers</h3>
					</div>
					<div class="col-md-10 col-md-offset-1 text-center mt30">
						<div class="col-md-4 col-md-offset-4 text-center np">
							<?php echo CHtml::link('Apply via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>3),array('class'=>'btn btn-orange fs15 pl15 pr15 pt10 pb10 font_newregular'));?>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np h-lightbg pt40 slide table-div">
	<div class="trusted-div" id="slider-outrr">
		<div class="container mt40 rs-mt20">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center pa20">
				<span class="fs26 lh-30 col-md-12 h-text3 font_newregular mb15">The Best Brands Have Trusted Our Teams</span>
				<div class="col-md-12 col-xs-12 rs-hide">
				<div class="col-md-12 text-center mt20 img_section">
					<div class="item pull-left "><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-ah.png" class="gray-img" alt="Athena Health" width="96"/></div>
					<div class="item pull-left"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-adidas.png" class="gray-img" alt="Adidas" width="96"/></div>
					<div class="item pull-left"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-al.png" class="gray-img" alt="Alcatel Lucent" width="96"/></div>
					<div class="item pull-left"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-ashoka.png" class="gray-img" alt="Ashoka" width="96"/></div>
					<div class="item pull-left"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-bmw.png" class="gray-img" alt="BMW" width="96"/></div>
					<div class="item pull-left"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-bonobos.png" class="gray-img" alt="Bonobos" width="96"/></div>
					<div class="item pull-left"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-espn.png" class="gray-img" alt="ESPN" width="96"/></div>
					<div class="item pull-left"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-fb.png" class="gray-img" alt="FinansBank" width="96"/></div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 rs-show">
				<div class="col-md-12 col-xs-6 text-center mt20 img_section">
					<div class="item pull-left rs-mb10 "><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-ah.png" class="gray-img" alt="Athena Health" width="96"/></div>
					<div class="item pull-left rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-adidas.png" class="gray-img" alt="Adidas" width="96"/></div> 
					<div class="item pull-left rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-al.png" class="gray-img" alt="Alcatel Lucent" width="96"/></div>
					<div class="item pull-left rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-ashoka.png" class="gray-img" alt="Ashoka" width="96"/></div>
				</div>
				<div class="col-md-12 col-xs-6 text-center mt20 img_section">
					<div class="item pull-left rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-bmw.png" class="gray-img" alt="BMW" width="96"/></div>
					<div class="item pull-left rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-bonobos.png" class="gray-img" alt="Bonobos" width="96"/></div>
					<div class="item pull-left rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-espn.png" class="gray-img" alt="ESPN" width="96"/></div>
					<div class="item pull-left rs-mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/c-fb.png" class="gray-img" alt="FinansBank" width="96"/></div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 np">
		<div class="navbar bg-light np header-shadow hide anim-menu-scroll" id="rs-task_flyout">
			<div class="col-md-12 np">
				<div class="col-md-1 col-xs-4 np br-gray">
					<?php
					if(Yii::app()->user->isGuest)
						echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'),array('class'=>'home-blue-logo ml10)'));
					else
						echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'home-blue-logo ml10'));
					?>
				</div>
				<div class="pull-right col-md-5 home-nav np col-xs-8">					
					<ul class="nav navbar-nav navbar-right">						
						<li>
							<?php echo CHtml::link('Apply via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>3),array('class'=>'btn btn-orange fs12 pl20 pr20 pt5 pb5 mt15 mr15 mt10 text_white font_newregular rs-hide lh-0'));?>
						</li>
						<li>
							<?php echo CHtml::link('<span class=""><i class="fa fa-linkedin-square mr5"></i></span> Apply', array('/site/linkedin','lType'=>'initiate','role'=>3),array('class'=>'btn btn-orange fs12 pl20 pr20 pt5 pb5 mt15 mr15 text_white font_newregular rs-show'));?>
						</li>
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
	<div class="error-table-layout">
		<div class="container mt40 rs-np">
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 rs-nm">
				<div class="bb2 pb10 col-md-12 col-xs-12 np pb40">
					<div class="col-md-6 col-sm-6 col-xs-8 col-xs-offset-2 rs-show">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/p1.png" alt="dont waste money" class="pull-right  mt15 rs-img" />
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 rs-show pl0 pr0">
						<h2 class="fs28 mb20">
							Don't waste time with low quality leads.
						</h2>
						<h4 class="mt30 fs18 h-text4 lh-30">
							We try to ensure that each lead on our platform has a clear need and a justifiable budget.
						</h4>
					</div>
					<div class="col-md-6 col-sm-8 col-xs-12 pr0 rs-hide">
						<h2 class="fs32 mb20 font_newlight">
							Don't waste time with low quality leads
						</h2>
						<h4 class="mt40 fs22 h-text4 lh-30 font_newlight">
							We try to ensure that each lead on our platform has a clear need and a justifiable budget.
						</h4>
					</div>
					<div class="col-md-6 col-sm-4 rs-mt25 col-xs-12 rs-hide">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/p1.png" alt="dont waste money" class="pull-right  mt15 rs-img" />
					</div>
				</div>
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 mt40 rs-np rs-bb2">
					<div class="col-md-2 col-sm-3 col-xs-12 rs-center rs-mb20 rs-np">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/chat.png" alt="Chat Icon" class="img-circle" />
					</div>
					<div class="col-md-10 col-sm-9 col-xs-12 rs-mb20 rs-np">
						<span class="fs16 lh-22 h-text5 font_newlight">
							<i class="">
								In most cases, one of our tech consultants would have already spoken to the prospective client and ensured that they have a budget to spend on development, authority to make a decision and need in the near term. We try to collect as much information around the project as possible to ensure efficiency and also assign a lead quality score to help you prioritize.
							</i>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div">
	<div class="error-table-layout remove-css">
		<div class="container mt40 rs-mt20">
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 rs-np rs-nm">
				<div class="bb2 pb10 col-md-12 col-xs-12 np pb40">
					<div class="col-md-6 col-sm-4 col-xs-8 col-xs-offset-2 rs-show rs-mt20 rs-mb10">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/p2.png" alt="dont rely" class="pull-right mt15 rs-img" />
					</div>
					<div class="col-md-6 col-sm-8 col-xs-12 rs-show pl0 pr0 rs-mb10">
						<h2 class="fs28 mb20 font_newlight">
							Don't waste time sifting through leads
						</h2>
						<h4 class="mt30 fs18 h-text4 lh-30 font_newlight">
							Get matched with leads that fit your skill set and domain expertise.
						</h4>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 pr0 rs-hide">
						<h2 class="fs32 mb20 font_newlight">
							Don't waste time sifting through leads
						</h2>
						<h4 class="mt40 fs22 h-text4 lh-30 font_newlight">
							Get matched with leads that fit your skill set and domain expertise.
						</h4>
					</div>
					<div class="col-md-6 col-sm-4 col-xs-12 rs-hide">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/p2.png" alt="dont rely" class="pull-right mt15 rs-img" />
					</div>
				</div>
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 mt40 rs-np rs-bb2">
					<div class="col-md-2 col-sm-3 col-xs-12 rs-center rs-mb20 rs-np">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/chat.png" alt="Chat Icon" class="img-circle" />
					</div>
					<div class="col-md-10 col-sm-9 col-xs-12 rs-mb20 rs-np">
						<span class="fs16 lh-22 h-text5 font_newlight">
							<i class="">
								We try to make intelligent matches and take into account a client's preferecnes around technology/skill set, location  and domain expertise. This allows you to focus on clients that really matter to your business.
							</i>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div">
	<div class="error-table-layout remove-css">
		<div class="container mt40">
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt40 rs-np rs-nm">
				<div class="bb2 pb10 col-md-12 col-xs-12 np pb40">
					<div class="col-md-6 col-sm-4 col-xs-8 col-xs-offset-2 rs-show">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/p3.png" alt="Escrow Payment" class="pull-right rs-img mt15" />
					</div>
					<div class="col-md-6 col-sm-8 col-xs-12 rs-hide pl0 pr0">
						<h2 class="fs28 mb20 font_newlight">
							No need to pay hefty subscription or advertising costs
						</h2>
						<h4 class="mt30 fs18 h-text4 lh-30 font_newlight">
							We simply charge a referral fee on each project that you close on our marketplace.
						</h4>
					</div>
					<div class="col-md-6 col-sm-8 col-xs-12 rs-show pl0 pr0">
						<h2 class="fs28 mb20 font_newlight">
							No need to pay hefty subscription or advertising costs
						</h2>
						<h4 class="mt30 fs18 h-text4 lh-30 font_newlight">
							We simply charge a referral fee on each project that you close on our marketplace.
						</h4>
					</div>
					<div class="col-md-6 col-sm-4 col-xs-12 rs-hide">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/p3.png" alt="Escrow Payment" class="pull-right rs-img mt15" />
					</div>
				</div>
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 mt40 rs-np">
					<div class="col-md-2 col-sm-3 col-xs-12 rs-center rs-mb20 rs-np">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/chat.png" alt="Chat Icon" class="img-circle" />
					</div>
					<div class="col-md-10 col-sm-9 col-xs-12 rs-mb20 rs-np">
						<span class="fs16 lh-22 h-text5 font_newlight">
							<i class="">
								The small fee covers the cost of your verification services, public profile, VenturePact project governor, use of our free payments service and collaboration platform.
							</i>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide bp-gradient-bg table-div table-div">
	<div class="error-table-layout">
		<div class="container">
			<div class="col-md-12 col-sm-6 col-xs-12 text-center">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/usertick.png" alt="Gift" class="" />
			</div>
			<div class="col-md-12 col-sm-6 col-xs-12 mt10">
				<div class="clearfix"></div>
				<div class="tab-content br-n pn">
					<div id="" class="tab-pane active">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center">
								<h2 class="text_white font_newlight">Have a lead that you are not a fit for?</h2>
								<ul class="tabs-ul pl0 text-center ml0">
									<li class="grey-new-light fs16 font_newlight"> Refer to it one of our other members and earn!</li>
								</ul>                               
                                <a href="mailto:refer@venturepact.com?bcc=joshw@venturepact.com&amp;subject=Meet%20Josh%20From%20VenturePact&amp;body=Hey%2C%0A%0AI%20think%20VenturePact%20will%20be%20able%20to%20help%20you%20find%20the%20best%20developer%20for%20your%20needs.%20Feel%20free%20to%20let%20Josh%20know%20more%20about%20your%20needs.%0A%0ABest;" class="btn btn-refer mt15 fs14 font_bold" target="_blank">Refer Here</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 np slide h-lightbg2 table-div">
	<div class="col-md-12 col-sm-12 col-xs-12 np looking-bg text-center mt80 pb30">
		<h2 class="h-black fs56 font_newregular rs-nm pt50">Have A Question?</h2>
		<a class="btn btn-refer mt15 fs14" href="<?php echo Yii::app()->createUrl('/site/faq');?>" >Check Out FAQs</a>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 np">
		<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12 pa10 mt30 rs-mt-41 text-center rs-show">
				<span class="btn-default-news font_newregular mt30 bb col-xs-12">Featured In</span>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 mt80 rs-nm text-center rs-hide">
				<span class="btn-default-news font_newregular bb">Featured In</span>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 np pb25 text-center rs-show">
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/tc.png" alt="TechCrunch" class="rs-img  img-responsive" />
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/inc.png" alt="Inc" class="rs-img img-responsive" />
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/forbes.png" alt="Forbes" class="rs-img img-responsive" />
				</div>
				<div class="col-md-3 col-sm-3  col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/hbr.png" alt="Harward Business Review" class="rs-img img-responsive" />
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 pa20 text-center rs-hide">
				<div class="col-md-3 col-sm-3  col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/tc.png" alt="TechCrunch" class="rs-img img-responsive" />
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/inc.png" alt="Inc" class="rs-img img-responsive" />
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/forbes.png" alt="Forbes" class="rs-img  img-responsive" />
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/homepage/hbr.png" alt="Harward Business Review" class="rs-img img-responsive" />
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('#Users_role_id').val('3');
	$('.btn-linkedin').attr('href','<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>'3'));?>');
});

var CE_SNAPSHOT_NAME = "VenturePact Partner Page";

setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0034/1290.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
