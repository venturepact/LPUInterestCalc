<style>
	.owl-theme .owl-controls .owl-buttons {text-align:left;}
	.owl-carousel{width:87%; float:right;}
	.owl-carousel.owl-carousel-new{width:100%; float:none;}
	.owl-carousel .owl-controls .owl-buttons div.owl-prev{left: 0px;padding: 0px; top:40%;}
	.owl-carousel .owl-controls .owl-buttons div.owl-next{right:0px; padding: 0px; top:40%;}
	.owl-demo2 .item img{ display: block; width: 319px; height: 199px;}
	.owl-theme .owl-controls .owl-buttons {text-align:left;}
	.owl-prev{ color: #2c333b !important;}
	.owl-next{ color: #2c333b !important;}
	.item img{cursor:pointer;}
	.owl-demo2 .item img {display: block; height: auto; width: 100%;}
	.owl-demo .item img {display: block; width: 100%;cursor:pointer;}
	.view-outr .owl-demo2 .owl-wrapper-outer .owl-wrapper{width:100% !important;}
	.view-outr .owl-demo2 .owl-wrapper-outer .owl-wrapper .owl-item{width:100% !important;}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/style/css/demoStyleSheet.css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/js/fadeSlideShow.js"></script>

<div class="navbar navbar-fixed-top bg-light np search-nav">
	<div class="col-md-1 np">
		<?php //echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'blue-logo ml10')); ?>
		<?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/site'),array('class'=>'blue-logo ml10')); ?>
	</div>
	<ol class="breadcrumb pt15">
		<li class="crumb-active">
			<span class="fs24 font_newlight dark_blue_new">Hi<?php //echo Users::model()->findByPk(Yii::app()->user->id)->first_name; ?>, Here's Who We Recommend</span>
		</li>				
	</ol>
	<div class="pull-right col-md-4 search-menu">
		<ul class="nav navbar-nav navbar-right">						
			<li>
				<a href="<?php echo CController::createUrl('/site/project');?>" class="fs14 font_newregular grey-new-light pr25">Post Your Project</a>
			</li>
			<li>
				<a href="javascript:void(0);" data-toggle="modal" data-target="#givecall" class="fs14 font_newregular grey-new-light pr25 scheduleACallTop">Call 949.791.7659</a>
			</li>
			<li class="rs-hide">
				<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 menu-icon">
					<i class="fa fa-bars pr5"></i>
				</a>
			</li>
			<li class="rs-show">
				<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 menu-icon">
					<i class="fa fa-bars pr5"></i>
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 mt60 pa40 pt15 pb0 bgwhite">
		<?php $form=$this->beginWidget('CActiveForm',array('id'=>'form-search','method'=>'GET','action' => Yii::app()->createUrl('/site/search')));?>
		<div class=" admin-form form-horizontal">
			<div class="form-group mb10">
				<label for="" class="col-sm-2 control-label pl0 pr0 fs16 loc-gray">Skills:</label>
				<div class="col-sm-8 pr0 sr-input">
					<label class="field prepend-icon">
						<div class="control-group" id="select-car-group">
							<select id="select-skills" class="demo-default" name="skills[]" multiple placeholder="eg: PHP, iOS, C++">
								<optgroup label="Skills">
									<?php
									$skills		=	Skills::model()->findAllByAttributes(array('skillcol'=>0));
									//$skills		=	Skills::model()->findAll();
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
						<label class="field-icon" for="firstname"><span aria-hidden="true" class="icon-magnifier"></span></label>
					</label>
				</div>
			</div>
			<div class="form-group mb0">
				<label for="" class="col-sm-2 control-label pl0 pr0 fs16 loc-gray">Refine Search:</label>
				<div class="col-sm-4 sr-input">
					<label class="field control-group prepend-icon select-car-group">
						<select id="industry" multiple class="demo-default" style="width:100%" placeholder="Domain (eg: Healthcare, Finance)" name="industry[]" data-parsley-id='426'>
							<option default>Select a Industry</option>
							<?php
							$industries		=	Industries::model()->findAllByAttributes(array('status'=>1));
							foreach($industries as $industry){?>
								<option value="<?php echo $industry->name;?>" <?php echo (!empty($data['industry']) && in_array($industry->name,$data['industry']))?'selected="selected"':'';?> ><?php echo $industry->name;?> </option>
							<?php } ?>
						</select>
						<label class="field-icon" for="firstname"><span aria-hidden="true" class="icon-briefcase "></span></label>
					</label>
				</div>
				<div class="col-sm-4 sr-input pr0">
							<label class="field control-group prepend-icon select-car-group">
								<select id="location" name="location[]" multiple class="demo-default" style="width:100%" placeholder="Location">
									<?php foreach($locations as $key=>$location){?>
									<optgroup label="<?php echo ($key)?'Regions':'My Country';?>">
									<?php foreach($location as $key=>$val){?>
										<option value="<?php echo $key;?>"><?php echo $val;?></option>	
									<?php }?>
									</optgroup>
									<?php }?>
								</select>
								<label class="field-icon" for="firstname"><span aria-hidden="true" class="icon-pointer "></span></label>
							</label>
						</div>
			</div>
			<div class="form-group mb0">
				<label for="" class="col-sm-2 control-label pl0 pr0 fs16 loc-gray mt5">Rate/Hour:</label>
				<div class="col-sm-8">
					<input type="hidden" name='range' id="rangeSlider" class="irs-hidden-input" value="" />
					<div class="col-md-12 col-sm-12 col-xs-12 range-value">
						<div class="col-md-4 col-sm-4 col-xs-4 text-center fs12 lightlight mt5 ">
							India, Africa, East <br>&amp; South East Asia
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 text-center fs12 lightlight mt5">
							Middle East, Eastern Europe <br>&amp; South America
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 text-center fs12 lightlight mt5">
							US, Canada &amp;<br> Western Europe
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->endWidget(); ?>
	</div>	

	<div class="col-md-12 col-sm-12 col-xs-12 p40 bgdrakgrey bt bb upto3" data-spy="affix" data-offset-top="300" style="display:none;">
			<h1 class="fs24 font_newlight dark_blue_new display_inline mt10 pull-left">Select up to three teams <?php //echo count($supplierResultCount);?></h1>
			<div class="col-md-4 nm pull-right">
				<button type="submit" class="btn-lg font_newregular pull-right mr10" id='getIntro'>Get introduced <small class="fs14 orangewhite">(<span id='CountSupplier'>0</span> selected)</small></button>
			</div>
	</div>
	<div class="" id='search-Result'>
	<?php $this->renderPartial('_search',array("suppliers"=>$suppliers,'data'=>$data,'loginConnections'=>$loginConnections));?>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 pa30 pb50 pt50 bgwhite" style="display:none;">
		<div class="col-md-2">
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/rachel-big.jpg" alt="Rachel" />
		</div>
		<div class="col-md-5 ml40 mt15">
			<h1 class="fs30 b-color pb15 bb">Hi! I'm Rachael!</h1>
			<h3 class="fs24 loc-gray">Feel free to get in touch if you have any questions!</h3>
			<a href="javascript:void(0);" class="fs14 orange-new scheduleACall" data-toggle="modal" data-target="#givecall">Schedule a Call</a>
			<span class="ml5 mr5">|</span>
			<a href="<?php echo CController::createUrl('/site/project');?>" class="fs14 orange-new">Help Me Find The Right Team</a>
			
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 pa30 pb50 pt50 bgwhite" style="display:none;">
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/rachel-big.jpg" alt="Rachel" />
		</div>
		<div class="col-md-6 ml40 mt15">
			<h1 class="fs30 b-color pb15 bb">Hi! I'm Rachel.</h1>
			<h3 class="fs18 loc-gray">Your search was too narrow, but we have awesome teams on our waitlist that you might like.</h3>
<!--
			<a href="javascript:void(0);" class="fs14 orange-new scheduleACall" data-toggle="modal" data-target="#givecall">Schedule a Call</a>
			<span class="ml5 mr5">|</span>
-->
			<a href="<?php echo CController::createUrl('/site/project');?>" class="btn tab-btn-new fs12 highlight pull-left mt10 mr10">Let Me Dig Out The Right Team For You</a>
			
		</div>
	</div>
	<!-- jQuery -->
	
	<section>
	<div class="menu-login-section">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12">
				<a class="menu-close pull-right pa30" href="javascript:void(0);"><img alt="close" src="<?php echo Yii::app()->theme->baseUrl.'/images/icon-close.png'; ?>"></a>
			</div>
			<div class="col-md-12">
				<div class="col-md-6">
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
					<div class="col-md-12 mt10">
						<?php if(Yii::app()->user->isGuest){
								$this->widget('WidgetHomeMenu');
							}else{ ?>
						<div class="col-md-7 col-md-offset-4">
							<div class="col-md-12 np text-center">
								<img width="90" height="90" src="<?php echo Yii::app()->user->image;?>" class="img-circle" alt="Team Member">
								<h2 class="fs16  font_newregular ">Hey <?php echo Yii::app()->user->fname;?></h2>
								<p class="fs14 font_newregular pt5">Welcome to VenturePact</p>
							</div>
							<div class="col-md-12 col-xs-12 bt mt20 pt20 text-center np rs-hide">
								<?php echo CHtml::link('<span class="icon-home mr5" aria-hidden="true"></span> Dashboard',array('/'.Yii::app()->user->role),array('class'=>'fs13 font_newregular orange-new col-md-5 col-xs-12 pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-settings mr5" aria-hidden="true"></span> Settings',array('/'.Yii::app()->user->role.'/account'),array('class'=>'fs13 font_newregular orange-new col-md-4 np pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-power orange-light mr5" aria-hidden="true"></span> Logout',array('/site/logout'),array('class'=>'fs13 font_newregular orange-new col-md-3 np text-right mb5')); ?>									
							</div>
							<div class="col-md-12 col-xs-12 bt mt20 pt20 text-center np rs-show">
								<?php echo CHtml::link('<span class="icon-home mr5" aria-hidden="true"></span>',array('/'.Yii::app()->user->role.'/index'),array('class'=>'fs13 font_newregular orange-new col-md-5 col-xs-4 pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-settings mr5" aria-hidden="true"></span>',array('/'.Yii::app()->user->role.'/account'),array('class'=>'fs13 font_newregular orange-new col-md-4 np col-xs-4 pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-power orange-light mr5" aria-hidden="true"></span>',array('/site/logout'),array('class'=>'fs13 font_newregular orange-new col-md-3 np col-xs-4 mb5')); ?>									
							</div>										
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-6 login-border">
					<div class="col-md-12 mt10">
						<div class="col-md-6 col-md-offset-1">
							<ul class="login-menu fs14 font_newlight">
								<li><a href="<?php echo Yii::app()->createUrl('/site/about');?>" class="blue-new">About Us</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/vettingProcess');?>" class="blue-new">Vetting Process</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/howItWorks');?>" class="blue-new">How It Works</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/faq');?>" class="blue-new">FAQs</a></li>
								<li><a href="http://blog.venturepact.com/" target="_blank" class="blue-new">Blog</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/press');?>" class="blue-new">Press</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/testimonials');?>" class="blue-new">Reviews</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/partner');?>" class="blue-new">For Developers</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/affiliate');?>" class="blue-new">For Affiliates</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-10 mt30 rs-nm pl25 rs-np rs-hide">
						<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-1 pl5 rs-np rs-mb20">
							<div class="col-md-12 col-sm-12 col-xs-12 np bt bb pt10 pb10">
								<div class="col-md-5 col-sm-12 col-xs-12 np">
									<h3 class="fs16 blue-new font_newlight mt10 mb10">Share now:</h3>
								</div>
								<div class="col-md-7 col-sm-12 col-xs-12 np">
									<div class="col-md-12 col-sm-12 col-xs-12 np"> 
										<div class="col-md-3 col-sm-1 col-xs-3 mr5">
											<a href="https://www.facebook.com/VenturePact" target="_blank" class="tm-facebook-small web-hover">
												<span class="web-show-small"></span>
												<i class="fa fa-facebook fs15 mt5"></i>
											</a>
										</div>
										<div class="col-md-3 col-sm-1 col-xs-3 mr5">
											<a href="https://twitter.com/VenturePact" target="_blank" class="tm-twitter-small web-hover">
												<span class="web-show-small"></span>
												<i class="fa fa-twitter fs15 mt5"></i>
											</a>
										</div>
										<div class="col-md-3 col-sm-1 col-xs-3 mr5">
											<a href="https://www.linkedin.com/company/venturepact" target="_blank" class="tm-linkedin-small web-hover">
												<span class="web-show-small"></span>
												<i class="fa fa-linkedin fs15 mt5"></i>
											</a>
										</div>
									</div>
								</div>							
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-10 mt70 rs-nm pl25 rs-np rs-show">
						<div class="col-md-1 col-sm-1 col-xs-3 mr5">
							<a href="https://twitter.com/VenturePact" target="_blank" class="tm-twitter-small">
								<i class="fa fa-twitter"></i>
							</a>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-3 mr5">
							<a href="https://www.facebook.com/VenturePact" target="_blank" class="tm-facebook-small">
								<i class="fa fa-facebook"></i>
							</a>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-3 mr5">
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

<!-- Modal for Call Start -->
<div id="givecall" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content col-md-12 np">
    	<?php 
    		$form = $this->beginWidget('CActiveForm',array('id'=>'callSchedulingForm'));
    		echo $form->hiddenField($callSchedules,'call_time');
    		echo Chtml::hiddenField('id','',array('id'=>'hiddenId'));
		?>
      <div class="modal-header pa20 new-modal-bg">
        <h2 class="modal-title fs22 text-center" id="myModalLabel">Schedule a call</h2>
      </div>
		<div class="modal-body col-md-12 np new-modal-bg">
			 <div class="col-md-12 mt30 mb10 admin-form theme-primary">
			 	<div class="col-md-12 form-group hide ">
					<label for="datepicker1" class="field prepend-icon">
						<?php echo $form->hiddenField($callSchedules,'time_zone');?>
						<input type="text" id="timeZoneOption" name="timeZoneOption" class="gui-input" disabled="disabled" placeholder="Time Zone" value="<?php //echo Yii::app()->user->tz;?>">
						<label for="firstname" class="field-icon"><span class="icon-globe fs14" aria-hidden="true"></span></label>
					</label>
					<!--<select id="timeZoneOption" class="demo-default selectize-typee">
						<option class="get-class" value="">Select Time Zone</option>
						<?php /*foreach($time_zones as $zone){ ?>
							<option class="get-class" value="<?php echo $zone->id; ?>"><?php echo $zone->name; ?></option>
						<?php }*/ ?>
					</select>-->
				</div>
				<div class="col-md-12 form-group">														
					<label for="datepicker1" class="field prepend-icon">
						<?php echo $form->textField($callSchedules,'client_phone',array('class'=>'gui-input','placeholder'=>'What phone number or Skype ID can we reach you on?'));?>
						<label for="firstname" class="field-icon"><span class="icon-screen-smartphone fs14" aria-hidden="true"></span></label>
					</label>
				</div>
				<div class="col-md-12 form-group mb5">
					<h4 class="mt0 font_newregular sec-today">Today</h4>
					<div class="col-md-12 pl0 timing-tag sec-today">
						<?php
							$count	=	0;
							foreach($call_slots as $slot){		
								$admin_tz = "America/New_York";						
								$d = new DateTime("now", new DateTimeZone($slot->value));
								$date =	DateTime::createFromFormat('m/d/Y g:i a', $d->format('m/d/Y')." ".$slot->name, new DateTimeZone($slot->value));
								$admin_date = $date->setTimeZone(new DateTimeZone($admin_tz));
								$admin_now = new DateTime("now", new DateTimeZone($admin_tz));
								if($slot->category == 1 && ($admin_date > $admin_now))
								{
									$count	=	1;
									?>
										<div class="ckbutton-timming"><label><input type="checkbox" name="today" data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs14 timming-tag"><?php echo $slot->name; ?></span><label></div>
									<?php
								}
							}
							
							if($count == 0)
								echo "<span class='fs12 timming-tag'>Sorry, no slots available today.</span>";
						?>
					</div>
				</div>
				<div class="col-md-12 form-group mb5">
					<h4 class="mt0 font_newregular">Tomorrow</h4>
					<div class="col-md-12 pl0 timing-tag">
						<?php foreach($call_slots as $slot){
								if($slot->category == 2){
						?>
							<div class="ckbutton-timming"><label><input type="checkbox" data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs14 timming-tag"><?php echo $slot->name; ?></span><label></div>
						<?php  }}?>
					</div>
				</div>
			</div>
		</div>
     <div class="modal-footer col-md-12">
        <button type="button" class="btn btn-default2 fs12" data-dismiss="modal">Cancel</button>
        <button type="button" id="callButton" class="btn btn-orange fs12" data-toggle="modal">Done</button>
      </div>
      <?php $this->endWidget();?>
    </div>
  </div>
</div>

<!-- Modal Start-->
<div class="modal fade" id="view-project" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xlg">
		<div class="modal-content col-md-12 np">
			<div class="modal-header pa20 new-modal-bg" id="replaceModelLabel">
				<a class="orange-new fs12 font_newregular pull-left mt15" href="#"><i class="fa fa-long-arrow-left"></i> Prev. Project</a>
				<h2 class="modal-title fs28 text-center">Mobile Wallete</h2>
				<a class="orange-new fs12 font_newregular pull-right mt-30" href="javascript:void(0);">Next Project <i class="fa fa-long-arrow-right"></i></a>
			</div>
			<div class="modal-body col-md-12 np new-modal-bg slimscroll pb15" id="replaceModelBody">
				<!-- Replace Content at click of Portfolio -->
			</div>
		</div>
	</div>
</div>
<!-- Modal End-->


<script type="text/javascript">

jQuery(document).ready(function(){
	jQuery('#slideshow').fadeSlideShow();
});

$(document).ready(function () {

	<?php if($count == 0){ ?>
	$('.sec-today').addClass('hide');
	<?php } ?>
	
	$("img.lazy").lazy();
	$('span').tooltip();

	var suppliersList	=	[];

	$('.setSkills').click(function(){
		localStorage.setItem('skills',$('#select-skills').val());
		localStorage.setItem('location',$('#location').val());
		localStorage.setItem('industry',$('#industry').val());
		localStorage.setItem('rangeSlider',$('#rangeSlider').val());
	});

	var interval=setInterval(function(){
		$("#theProgressBar").css('width',(NProgress.status*100)+'%');
	}, 50);

	$.fn.filterClick = function() {
		NProgress.start();
		$('#best-results-height').show();
		$.ajax({
			type: "GET",
			url: "<?php echo Yii::app()->createUrl("/site/search");?>",
			data: $('#form-search').serialize()+'&ajax=1',
			success: function(returnedData){
				var Query = [];
				Query.push($("#satnam-keyword").val());
				$("#satnam-skills").each(function(){Query.push(this.text);});
				$("#satnam-industry").each(function(){Query.push(this.text);});
				if(returnedData != ''){
					$('#search-Result').prev().fadeIn();
					$('#search-Result').next().fadeIn();
					$('#search-Result').next().next().fadeOut();
					$('#search-Result').html( returnedData );
				}
				else{
					$('#search-Result').prev().fadeOut();
					$('#search-Result').next().fadeOut();
					$('#search-Result').next().next().fadeIn();
					$('#search-Result').html( returnedData );
				}
				$.fn.callLoad();
				//reset 
				$count			=	$('#search-Result').find('div.bgcream').length;
				suppliersList	=	[];
				$("#CountSupplier").html($count);
				
				NProgress.done();
				$('.fade').removeClass('out');

				clearInterval(interval);
				$("#theProgressBar").css('width','100%');
				setTimeout(function(){$('#best-results-height').remove();},800);		
			}
		});
	};

	var selectizeOP	=	$('#select-skills').selectize({
		openOnFocus: false,
		//maxItems: 3,
		sortField: {field: 'text',},
		closeAfterSelect: true,
		maxOptions:12,
		optgroup: true,
		plugins: ['remove_button'],
		onChange: function() {$.fn.filterClick();},
		onItemRemove: function() {
			$('#select-skills').close();
    	}
	});

	var selectizeIndu	=	$('#industry').selectize({
		maxItems: 3,
		closeAfterSelect: true,
		plugins: ['remove_button'],
		onChange: function(values) {$.fn.filterClick();},
		onItemRemove: function() {
			$('#industry').close();
    	}
	});

	var selectizeLoc = $('#location').selectize({
		//maxItems: 3,
		closeAfterSelect: true,
		plugins: ['remove_button'],
		onChange: function(values) {$.fn.filterClick();},
	});

	$("#rangeSlider").ionRangeSlider({
		type: "double",
		min: 0,
		max: 135,
		grid: true,
		grid_num: 3,
        step: 5,
		prefix:'$',
        max_postfix:'+',
		from: <?php echo $lowRange;?>,
		to: <?php echo $upRange;?>,
		drag_interval: true,
		onFinish:function(){$.fn.filterClick();},
	});

	var rangeSlider = $("#rangeSlider").data("ionRangeSlider");
	console.log('<?php echo Yii::app()->user->searchFor.'_'.Yii::app()->user->keyword;?>');
	<?php
		if(Yii::app()->user->hasState('searchFor')) {
			if(Yii::app()->user->searchFor=='industry') {
				?>
					select12 = selectizeIndu[0].selectize;
					select12.addItem('<?php echo Yii::app()->user->keyword;?>');
				<?php
			} elseif(Yii::app()->user->searchFor=='skill' || Yii::app()->user->searchFor=='keyword') {
				?>
					select12 = selectizeOP[0].selectize;
					select12.addOption({value:'<?php echo Yii::app()->user->searchFor.'_'.Yii::app()->user->keyword;?>',text:'<?php echo Yii::app()->user->keyword;?>'});
					select12.addItem('<?php echo Yii::app()->user->searchFor.'_'.Yii::app()->user->keyword;?>');
					console.log("Set session data");
				<?php
			}
			?>
				// set data from local storage to search terms
				setLocalStorageData();

			<?php
			//Yii::app()->user->setState('searchFor',null);
			//Yii::app()->user->setState('keyword',null);
		}
	?>

	$(window).scroll(function() {
		if ($(this).scrollTop() == 0) {
			$('.search-nav').css({
				'box-shadow': 'none',
				'-moz-box-shadow' : 'none',
				'-webkit-box-shadow' : 'none'
			});
		}
		else {
			$('.search-nav').css({
				'box-shadow': '0 3px 6px rgba(0, 0, 0, 0.1)',
				'-moz-box-shadow' : '0 3px 6px rgba(0, 0, 0, 0.1)',
				'-webkit-box-shadow' : '0 3px 6px rgba(0, 0, 0, 0.1)'
			});
		}
	});

	$('#getIntro').click(function(e){
		if(parseInt($("#CountSupplier").html())<1){
			e.preventDefault();
			bootbox.alert('Please select at least one team');
		}
		else
			$.fn.selectSup();
	});

	var $count			=	0;
	var $limit			=	3;
	$.fn.selectSup = function() {
		if($count <= $limit){
			localStorage.setItem('skills',$('#select-skills').val());
			localStorage.setItem('location',$('#location').val());
			localStorage.setItem('selectedSuplliers',suppliersList);
			localStorage.setItem('industry',$('#industry').val());
			localStorage.setItem('rangeSlider',$('#rangeSlider').val());
			window.location.href="<?php echo Yii::app()->createUrl("/site/projectCreate");?>";
		}
	};

	$.fn.callLoad = function(){
		$(".owl-demo").owlCarousel({
			navigation : true,
			pagination : false,
			singleItem : true,
			transitionStyle : "fade",
			slideSpeed : 800,
			paginationSpeed : 2100,
			//autoPlay: 3600,
			navigationText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>"
			], 
		});
		$(".owl-carousel-popup,.owl-demo-6").owlCarousel({
			navigation : true,
			pagination : false,
			singleItem : true,
			transitionStyle : "fade",
			slideSpeed : 800,
			paginationSpeed : 2100,
			//autoPlay: 3600,
			navigationText: [
				"<i class='fa fa-angle-left'></i>",
				"<i class='fa fa-angle-right'></i>"
			],
		});
		$("#owl-demo-6").owlCarousel({
			navigation : true,
			pagination : false,
			singleItem : true,
			transitionStyle : "fade",
			slideSpeed : 800,
			paginationSpeed : 2100,
			//autoPlay: 3600,
			navigationText: [
				"<i class='fa fa-angle-left'></i>",
				"<i class='fa fa-angle-right'></i>"
			],
		});

		$( ".hide-result" ).click(function() {
			if($count<$limit){
				//Removed one parent for new design
				$(this).parent().parent().parent().addClass('bgcream').removeClass('bgdrakgrey');
				//$(this).parent().parent().parent().find("div.hide-details").slideUp(500);
				$(this).hide();
				$(this).parent().find(".show-result").show();
				$count	=	$('#search-Result').find('div.bgcream').length;
				$valCurrent	=	$(this).val();
				suppliersList.push($valCurrent);
				$("#CountSupplier").html($count);
			}else{
				var actionconfirm = 'To keep things simple, we recommend talking to '+$limit+' (or fewer) teams only. You can always request more later.';
				bootbox.alert(actionconfirm);
			}
		});

		$( ".show-result" ).click(function() {
			//Removed one parent for new design
			$(this).parent().parent().parent().addClass('bgdrakgrey').removeClass('bgcream ');
			//$(this).parent().parent().parent().find("div.hide-details").slideDown(500);
			$(this).hide();
			$(this).parent().find(".hide-result").show();
			$count=	$('#search-Result').find('div.bgcream').length;
			$valCurrent	=	$(this).val();			
			var $indx	=	suppliersList.indexOf($valCurrent);
			suppliersList.splice($indx, 1);
			$("#CountSupplier").html($count);
		});

		$('.slimscroll').slimscroll({ scrollTo : '0px' });

		$(".owl-demo2").owlCarousel({
			navigation : true,
			pagination : false,
			singleItem : true,
			transitionStyle : "fade",
			slideSpeed : 800,
			paginationSpeed : 2100,
			//autoPlay: 3600,
			navigationText: [
				"<i class='fa fa-angle-left'></i>",
				"<i class='fa fa-angle-right'></i>"
			],
		});
		$('span').tooltip();
		$('.carousel').carousel({
		  interval: 2000
		});

		NProgress.done(true);
		
	}
	$.fn.callLoad();
	$.fn.filterClick();

	function setLocalStorageData() {
		// add data from localstorage
		if(localStorage.length > 0) {
			// get and set data to their respective fields
			var storageSkills = localStorage.getItem('skills');
			var storageLocation = localStorage.getItem('location');
			var storageIndustry = localStorage.getItem('industry');
			var storageRange = localStorage.getItem('rangeSlider');
			var storageSuppliers = localStorage.getItem('selectedSuplliers');
			if(typeof storageSkills != undefined && storageSkills != null) {
				console.log("Skills: " + storageSkills);
				var skillsArray = storageSkills.split(",");
				console.log(skillsArray);
				var selectSkills = selectizeOP[0].selectize;
				$.each(skillsArray, function(index, item) {
					selectSkills.addItem(item);
				});
				console.log("Selected Skills");
			}
			if(typeof storageLocation != undefined && storageLocation != null) {
				console.log("Location: " + storageLocation);
				var locationArray = storageLocation.split(",");
				console.log(locationArray);
				var selectLocation = selectizeLoc[0].selectize;
				$.each(locationArray, function(index, item) {
					selectLocation.addItem(item);
				});
				console.log("Selected Locations");
			}
			if(typeof storageIndustry != undefined && storageIndustry != null) {
				console.log("Industry: " + storageIndustry);
				var industryArray = storageIndustry.split(",");
				console.log(industryArray);
				var selectSkills = selectizeIndu[0].selectize;
				$.each(industryArray, function(index, item) {
					selectSkills.addItem(item);
				});
				console.log("Selected Industries");
			}
			if(typeof storageRange != undefined && storageRange != null) {
				console.log("Range: " + storageRange);
				var rangeArray = storageRange.split(";");
				rangeSlider.update({
				    from: rangeArray[0],
				    to: rangeArray[1]
				});
			}

			$( document ).ajaxComplete(function() {
				if(typeof storageSuppliers != undefined && storageSuppliers != null) {
					console.log("Suppliers: " + storageSuppliers);
					supplierArray = storageSuppliers.split(",");
					$.each(supplierArray, function(index, item) {
						if($('#not-selected-' + item).is(':visible')) {
							$('#not-selected-' + item)[0].click();
						}
					});
				}
			});

			// clear localStorage
			//localStorage.clear();
		}
	}

	localStorage.removeItem('searchItem');
	$(document).on('click','.replaceModContent',function(e) {
		var id = $(this).attr('data-id');
		var modelId = '#view-project'+id;
		var label	= '#myModalLabel'+id;
		var body	= '#bodyContent'+id;
		$('#replaceModelLabel').html($(label).html());
		$('#replaceModelBody').html($(body).html());
		//$('#view-project').html($(modelId).html());
		$('.carousel').carousel({
		  interval: 2000
		});
		$('#view-project').modal('toggle');
	});
	
	$(document).on('click','.newModel',function(e) {
		var id = $(this).attr('data-id');
		var modelId = '#view-project'+id;
		var label	= '#myModalLabel'+id;
		var body	= '#bodyContent'+id;
		$('#replaceModelLabel').html($(label).html());
		$('#replaceModelBody').html($(body).html());
		//$('#view-project').html($(modelId).html());
		$('.carousel').carousel({
		  interval: 2000
		});
		//$('#view-project').modal('toggle');
	});
	$(document).on('click','#see-more',function(){
		$('.result-hover').each(function(){
			$(this).removeClass('hide');
		});
		$('#see-more').addClass('hide');
	});
	
	$(".menu-icon").click(function(){
		$(".menu-login-section").fadeIn(300);
	});
	$(".menu-close").click(function(){
		$(".menu-login-section").fadeOut(300);
	});
	$(".forgot-passwordDiv").click(function(){
		$(".forgot-password").fadeIn(500);
		$(".signin").fadeOut(500); 		
	});
	$(".create-accDiv").click(function(){
		$(".create-acc").fadeIn(500);
		$(".signin").fadeOut(500);
	});
	$(".create-accDiv").click(function(){
		$(".create-acc").fadeIn(500);
		$(".forgot-password").fadeOut(500); 
	});
	$(".signin-div").click(function(){
		$(".signin").fadeIn(500);
		$(".create-acc").fadeOut(500);
	});	


	var timezone = $('#timeZoneOption').val();
	$.ajax({
		url:"<?php echo Yii::app()->createUrl('site/convertTime'); ?>",
		method:'POST',
		data: { timezone: timezone},
		success:function(data){
			var response = JSON.parse(data);
			console.log(response);
			$('.timing-tag input:checkbox').each(function(){
				var elem	=	$(this);
				var id		=	elem.attr('value');	
				var time	=	response[id].time;
				elem.attr('data-value',time);
				elem.parent().find('span').html(time);
			});
		}
	});
});

function handelSkillsHideShow(element){
	var val=element.attr('data-id');
	$("[data-display^=pop_]").hide('fast');
	if(val=="pop_skills"){
		$("[data-display^=pop_]").show('fast');
	}
	else{
		$("[data-display='"+val+"']").show('fast');
	}
	//remove class from all other buttons
	$("[data-id^=pop_]").removeClass('active-all');
	//apply class to current button
	element.addClass('active-all');
}


var iteration=1;
var iteration2=1;
$('#callButton').click(function(){
		var ids = $('.timing-tag input:checkbox:checked').map(function() {
			return this.value;
		}).get().join(",");
		$('#CallSchedules_call_time').val(ids);		
		//loader and loading stuff start-----
		NProgress.start();
		$(this).html('Scheduling ...');
		$(this).attr('disabled','disabled');
		//end-------
		$.ajax({
			type:'Post',
			url:'<?php echo Yii::app()->createUrl("site/scheduleCall"); ?>',
			data:$('#callSchedulingForm').serialize(),
			success:function(response){
				if(response!="error"){
					var timings = $('.timing-tag input:checkbox:checked').map(function() {
						if( $(this).attr('data-category') == 1 && iteration==1 ){
							iteration=0;
							return "Today @ "+$(this).attr('data-value');
							
						}
						else if( $(this).attr('data-category') == 2  && iteration2==1 ){
							iteration2=0;
							return "Tomorrow @ "+$(this).attr('data-value');
						}
						return $(this).attr('data-value');
					}).get().join(" or ");
					iteration=1;
					iteration2=1;
					$('.scheduleACallTop').html('Call Scheduled');
					$('.scheduleACall').html("Call scheduled for  " +timings+". We'll email you to confirm.");
					$("#hiddenId").val(response);

					//loader and loading stuff start-----
					$('#callButton').html('Done');
					$('#callButton').removeAttr('disabled');
					NProgress.done(true);
					$('#givecall').modal('toggle');
					//end---
				}
				else{
					$('.scheduleACall').html('Try Call Scheduling Again');
				}
			}

		});
		
	});

function showHideMore(link,show){
	if(show==1){
		link.parent().css('display','none');
		link.parent().next('.showHide').slideDown('fast');
		link.parent().next('.showHide').css('display','inline');
	}
	else{
		link.parent().slideUp('fast');
		link.parent().prev('.showHide').css('display','inline');
	}
}

</script>
<!-- Google Code for Conversion Code: venturepact.com Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 949378098;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "8TsBCPehiV0QsrjZxAM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/949378098/?label=8TsBCPehiV0QsrjZxAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>