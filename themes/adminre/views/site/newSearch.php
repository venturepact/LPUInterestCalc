<style>
body{ min-height:500px !important;}
</style>
<div class="container-fluid search-bg font_newregular">
	<div class="row">
		<div class="navbar navbar-fixed-top bg-light np search-nav col-md-12 col-sm-12 col-xs-12"> 
			<div class="col-md-1 col-sm-1 col-xs-1 np rs-hide">
				<?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'blue-logo ml10')); ?>
			</div>
			<div class="pull-right col-md-11 col-sm-12 col-xs-12 search-menu np rs-bl0">
				<h1 class="fs22 font_newlight dark_blue_new display_inline mt15 mb0 ml15 col-md-7 col-sm-8 col-xs-10 np rs-nm ellipsis rs-fs18 rs-mt10 rs-ml10 rs-bl0">Connect upto 3 development teams</h1>
				<ul class="pull-right nav navbar-nav rs-100">
					<li class="rs-hide">
						<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 new-getbutn" id="getIntro">Get Connected <small class="fs14 orangewhite">(<span id="CountSupplier">0</span> selected)</small></a>						
					</li>
					<!--<li class="rs-hide">
						<a href="<?php //echo CController::createUrl('/site/project');?>" class="fs14 font_newregular grey-new-light pr25">Post Your Project</a>
					</li>
					<li class="rs-hide">
						<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 scheduleACallTop rs-hide" >Call 958.265.2365</a>
					</li>
					<li class="">
						<a href="<?php //echo CController::createUrl('/site');?>" class="hide rs-show fs18" ><i class="fa fa-long-arrow-left "></i></a>
					</li>-->
					<li class="pull-right">
						<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 menu-icon scheduleACallTop"><i class="fa fa-bars pr5"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--Left section-->
	<div class="row mt60">
		<div class="col-md-3 col-sm-12 col-xs-12 left-section-s ">
			<div class="col-md-12 col-xs-12  col-sm-12 np text-center rs-hide">
				<img width="80" height="80" alt="Team Member" class="img-circle" src="<?php echo Yii::app()->theme->baseUrl;?>/images/josh.png" alt="team">
				<h2 class=" blue-head  fs18 mt10 mb5 lh22 ">Hey <?php echo Yii::app()->user->fname;?><br/>This is Josh!</h2>
				<p class="fs14 text-color-navy pt5 lh20 mt10 mb0">Refine your search or <br/>let us help you over a call.</p>
			</div>
			<div class=" col-md-12 col-xs-12 col-sm-12 mt30 np rs-top">
				<ul class="nav search-tabs  rs-mt-61" role="tablist">
					<li role="presentation" class="active col-md-6 col-sm-6 col-xs-6  np font_newregular fs14"><a href="#rsearch" aria-controls="rsearch" role="tab" data-toggle="tab">Refine Search</a><span class="arrow-down"></span></li>
					<li role="presentation" class="col-md-6 col-sm-6 col-xs-6  np font_newregular fs14"><a href="#scall" aria-controls="scall" role="tab" data-toggle="tab">Schedule a Call</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div  role="tabpanel" class="tab-pane active  pa20" id="rsearch">
						<?php $form=$this->beginWidget('CActiveForm',array('id'=>'form-search','method'=>'GET','action' => Yii::app()->createUrl('/site/search')));?>
						<!-- Temp Fix -->
						<?php echo CHtml::hiddenField('range','0;135',array('id'=>'range')); ?>
						<?php echo CHtml::hiddenField('locations[]','',array('id'=>'location-search')); ?>
						<?php echo CHtml::hiddenField('tt-input','',array('class'=>'tt-input')); ?>
						<div class="col-md-12 col-sm-12 col-xs-12 mt10 np">
							<div class=" admin-form form-horizontal">
								<div class="form-group mb10">
									<div class="col-sm-12 sr-input">
										<label class="field append-icon">
											<div class="control-group" id="select-car-group">
												<select id="select-skills" class="demo-default" name="skills[]" multiple placeholder="Skills (eg: PHP, iOS, C++)">
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
											<label class="field-icon" for="firstname"><span aria-hidden="true" class="icon-magnifier"></span></label>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 mt10 mb20 np">
							<div  class="locationdiv-otr">
								<div  class="locationdiv-inner col-md-12 col-sm-12 col-xs-12">
									<!--Zone Tag to Append--><div id="zone-tags" class="location-tag-outer"></div>
									<span class="search-head-text1 fs14 pull-left loc-span pt3">Location </span>
									<?php foreach($zones as $zone){?>
										<div class="location-tag font_newregular hide" id="zone-<?php echo $zone->id; ?>">Zone <?php echo $zone->id; ?><span class="gry font_newlight fs9 removeFilter" >x</span></div>
									<?php }?>
									<i class="fa fa-angle-down fs14 orange-new pull-right mt5 pt3"></i>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 zone_outr np pt5">
								<?php foreach($zones as $zone){?>
								<label class="level pl10 pr10 pt5 pb5 mb0" for="toggle-<?php echo $zone->id;?>">
									<input type="hidden" id="toggle-<?php echo $zone->id;?>" value='Zone#<?php echo $zone->id;?>' name='locations[]' disabled='disabled' class="zones" data-regions="<?php $ids=explode(',',$zone->region_data); array_walk($ids, function(&$item) { $item = 'regions_'.$item; }); echo implode(',',$ids); ?>">
									<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border" data-id="Zone-<?php echo $zone->id; ?>" data-name="Zone <?php echo $zone->id; ?>">
										<span class="col-md-6 col-sm-6 search-blue  col-xs-6 np">
											<?php echo $zone->title;?>
										</span>
										<span class="col-md-6 col-sm-6 search-blue  text-right col-xs-6 np">
											<?php echo $zone->min_price.' - '.$zone->max_price;?>
										</span>
										<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
											<?php echo $zone->description;?>
										</p>
										<span class="cancle-icon gry">x</span>
									</div>
								</label>
								<?php }?>
									<div class="col-md-12 col-xs-12 col-xs-12 text-center location-bg pt10 pb10 ">
										<input type="text" placeholder="Type City or Country" class="gui-input call-location algolia-search" id="algo-location" name="algo-location">
									</div>	
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 mt5 mb20 np">
							<div class="locationdiv-otr">
								<div class="leveldiv-inner col-md-12 col-sm-12 col-xs-12">
									<!--Level Tag to Append--><div id="level-tags" class="location-tag-outer"></div>
									<span class="search-head-text1 fs14 pull-left lvl-span pt3">Experience </span>
									<i class="fa fa-angle-down fs14 orange-new pull-right mt5"></i>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 level_data ">
									<label class="level" for="toggle1-4">
										<input type="hidden" id="toggle1-4" value='1' name='level[]' disabled="disabled" class="levels">
										<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border1 mt10" data-id="Level-1" data-name="With Start Ups">
											<span class="col-md-12 col-sm-12 search-blue  col-xs-12 np">
												With Start Ups
											</span>
											<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
												Quick, Scrappy and Agile
											</p>
										</div>
									</label>
									<label class="level" for="toggle1-5">
										<input type="hidden" id="toggle1-5" value='2' name='level[]' disabled="disabled" class="levels">
										<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border1" data-id="Level-2" data-name="With Mid-sized Companies">
											<span class="col-md-12 col-sm-12 search-blue  col-xs-12 np">
												With Mid-sized Companies
											</span>
											<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
												Experience with security and scalability
											</p>
										</div>
									</label>
									<label class="level" for="toggle1-6">
										<input type="hidden" id="toggle1-6" value='3' name='level[]' disabled="disabled" class="levels">
										<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border1" data-id="Level-3" data-name="With Enterprises">
											<span class="col-md-12 col-sm-12 search-blue  col-xs-12 np">
												With Enterprises
											</span>
											<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
												Seasoned in security and scalability
											</p>
										</div>
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 mt10 np">
							<div class=" admin-form form-horizontal">
								<div class="form-group mb10">
									<div class="col-sm-12 sr-input">
										<label class="field append-icon">
											<div class="control-group">
												<select id="industry" multiple class="demo-default" placeholder="Domain Expertise" name="industry[]">
													<option default>Select a Industry</option>
													<?php
													$industries		=	Industries::model()->findAllByAttributes(array('status'=>1));
													foreach($industries as $industry){?>
														<option value="<?php echo $industry->name;?>" <?php echo (!empty($data['industry']) && in_array($industry->name,$data['industry']))?'selected="selected"':'';?> ><?php echo $industry->name;?> </option>
													<?php } ?>
												</select>
											</div>
											<label class="field-icon" for="firstname"></label>
										</label>
									</div>
								</div>
							</div>
						</div>
						<?php $this->endWidget(); ?>
					</div>
					<div role="tabpanel" class="tab-pane pa20" id="scall">
						<?php 
				    		$form = $this->beginWidget('CActiveForm',array('id'=>'callSchedulingForm'));
				    		echo $form->hiddenField($callSchedules,'call_time');
				    		echo Chtml::hiddenField('id','',array('id'=>'hiddenId'));
				    		echo $form->hiddenField($callSchedules,'time_zone');
				    		echo Chtml::hiddenField('timeZoneOption',Yii::app()->user->tz,array('id'=>'timeZoneOption'));
						?>
						<!-- <div class="col-md-12 col-sm-12 col-xs-12 mt10 np bb2">
							<p class="darkblue-text font_newregular">
								Give us a phone # or skype ID where we can we reach you?
							</p>
							<p class="darkblue-text font_newregular">
								Select few time below that works best
							</p>
						</div> -->
						<div class="col-md-12 col-sm-12 col-xs-12 mt30 np">
							<div class=" admin-form form-horizontal">
								<div class="form-group mb10">
									<div class="col-sm-12 sr-input">
										<label class="field prepend-icon">
											<div class="control-group">
												<?php echo $form->textField($callSchedules,'client_phone',array('class'=>'gui-input call-s pl40','data-parsley-required'=>'true','placeholder'=>'Phone number or Skype ID'));?>
											</div>
											<label class="field-icon" for="firstname"><span class="icon-call-in search-blue" aria-hidden="true"></span></label>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 form-group mb5 np">
							<h4 class="fs13 search-blue font_newregular">Today</h4>
							<div class="col-md-12 col-xs-12 pl0 timing-tag mb25">
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
											<div class="ckbutton-timming"><label><input type="checkbox" name="today" data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs12 timming-tag"><?php echo $slot->name; ?></span><label></div>
										<?php
									}
								}
								
								if($count == 0)
									echo "<span class='fs12 timming-tag'>Sorry, no slots available today.</span>";
							?>
							</div>
							<h4 class="fs13 search-blue font_newregular rs-width">Tomorrow</h4>
							<div class="col-md-12 pl0 timing-tag">
							<?php foreach($call_slots as $slot){
								if($slot->category == 2){
							?>
								<div class="ckbutton-timming"><label><input type="checkbox" data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs12 timming-tag"><?php echo $slot->name; ?></span><label></div>
							<?php  }}?>
							</div>
							<div class="col-md-12 col-xs-12 text-center fs13 search-blue font_newregular scheduleACall">
								
							</div>
							<div class="col-md-12 col-xs-12 text-center">
								<button type="button" id="callButton" value="Call Scheduled" class="btn btn-orange mt15 fs12 font_newregular pl35 pr35 pt5 pb5">Schedule Call</button>
							</div>
						</div>
						<?php $this->endWidget();?>
					</div>
				</div>
			</div>
		</div>
		<!--right section-->
		<div class="col-md-9 np">
			<div class="logo-animated"></div>
			<!--Render Partial for Results-->
			<div id="search-Result">
				<?php
				$this->renderPartial('_newSearch',array("suppliers"=>$supplierListSorted,'count'=>$count,'data'=>$data,'lowRange'=>$lowRange,'upRange'=>$upRange,'loginConnections'=>$loginConnections,'filterApplied'=>$filterApplied,'searchLocation'=>$searchLocation,'match'=>1));

				if($countM < $count && $countM < $limit){
					$this->renderPartial('_newSearch',array("suppliers"=>$supplierListSorted1,'count'=>$count,'data'=>$data,'lowRange'=>$lowRange,'upRange'=>$upRange,'loginConnections'=>$loginConnections,'filterApplied'=>$filterApplied,'searchLocation'=>$searchLocation,'match'=>0,'countM'=>$countM));
				}
					
				
				?>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="menu-login-section search-cham">
		<div class="col-md-12 col-sm-12 col-xs-12 rs-np">
			<div class="col-md-12 col-xs-12 rs-mt10">
				<!--<a class="menu-close pull-right pa30 rs-np" id="menu-close" href="javascript:void(0);"><img alt="close" src="<?php //echo Yii::app()->theme->baseUrl.'/images/icon-close.png'; ?>" width="15" height='15' ></a>-->
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
					<div class="col-md-12 col-xs-12 rs-nm rs-p11">
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
					<div class="col-md-12 col-sm-12 col-xs-12 mt50 rs-np rs-nm rs-mb20">
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
							<div class="col-md-12 col-sm-12 col-xs-12 np bt bb pt10 pb10">
								<div class="col-md-5 col-sm-12 col-xs-12 np">
									<h3 class="fs16 blue-new font_newlight mt10 mb10">Share now:</h3>
								</div>
								<div class="col-md-7 col-sm-12 col-xs-12">
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
<script>
var tag_zone	=	0;
var tag_level	=	0;
var add_class	=	'';
var flag		=	0;
$(document).ready(function() {
	
	var storageSkills = localStorage.getItem('skills');
	if(typeof storageSkills == undefined || storageSkills == null || storageSkills == '') {
		localStorage.setItem('skills',$('#select-skills').val());
	}
	
	if($(window).width() < 768){
		$('ul.search-tabs li:first-child').removeClass('active');
		$('#rsearch').removeClass('active');
	}
	
	$( ".locationdiv-inner" ).click(function(e){
		if(e.target.tagName!='A')
			$('.zone_outr').slideToggle(500);
	});
	$( ".leveldiv-inner" ).click(function(e){
		if(e.target.tagName!='A')
			$('.level_data').slideToggle(500);
	});
	var suppliersList	=	[];
	$('.setSkills').click(function(){
		localStorageData();
	});

	function localStorageData(){
		localStorage.setItem('skills',$('#select-skills').val());
		//localStorage.setItem('location',$('#locations').val());
		//localStorage.setItem('selectedSuplliers',suppliersList);
		localStorage.setItem('industry',$('#industry').val());
		//for zones
		var zones=new Array();
		var projectLocation = new Array();
		$('.zones').each(function(e){
			if(!$(this).prop('disabled')){
				zones.push( $(this).val() );
				projectLocation.push($(this).attr('data-regions'));
			}
		});
		if(zones.length!=0)
			localStorage.setItem('zones',zones.join());
		else
			localStorage.setItem('zones','');
		//for levels
		var levels=new Array();
		$('.levels').each(function(e){
			if(!$(this).prop('disabled')){
				levels.push( $(this).val() );
			}
		});
		if(levels.length!=0)
			localStorage.setItem('levels',levels.join());
		else
			localStorage.setItem('levels','');

		//for location
		if($('.tt-input').val()!='' && $('#location-search').val()!=''){
			localStorage.setItem('location',$('.tt-input').val()+','+$('#location-search').val());
			projectLocation.push($('#location-search').val());
		}
		else{
			setTimeout(clearLocation,500);
		}

		localStorage.setItem('projectLocation',projectLocation.join());
	}
	
	var xhr = undefined;
	$.fn.filterClick = function() {
		Pace.restart();
		//set the local storage data
		localStorageData();

		$('#best-results-height').show();
		$('body').css('overflow-y','hidden');

		if(xhr != undefined && xhr.readystate != 4){
            xhr.abort();
        }
		$('.logo-animated').show();
        xhr =	$.ajax({
			type: "GET",
			url: "<?php echo Yii::app()->createUrl("/site/search");?>",
			data: $('#form-search').serialize()+'&ajax=1',
			success: function(returnedData){
				$('.logo-animated').hide();
				$('body').css('overflow-y','auto');
				var Query = [];
				$('#search-Result').html(returnedData);
				$count			=	$('.supplier-selected').length;
				suppliersList	=	[];
				$("#CountSupplier").html($count);
				if(localStorage.getItem('selectedSuplliers') != null){
					var selectedOnes = localStorage.getItem('selectedSuplliers').split(',');
					for(i=0;i<selectedOnes.length;i++){
						// show selected
						$('#not-selected-'+selectedOnes[i]).addClass('hide');
						$('#selected-'+selectedOnes[i]).removeClass('hide');
						// trigger Click
						$('#not-selected-'+selectedOnes[i]).trigger('click');
					}
					//localStorage.removeItem('selectedSuplliers');

				}
	
			}
		});

		windowwidth();
	};

	function windowwidth()
	{
	if ($(window).width() <= 768) {			
	var height = ($( window ).height()-152)+'px';
	$('.slimscroll').css('overflow-y','scroll')
	$('.slimscroll').css('height',height);
	}	
	}
	
	function clearLocation(){
		if($('.tt-input').val()=='' && $('#location-search').val()=='')
			localStorage.setItem('location','');
	}
	$(document).on('click','.dropdown-toggle',function(){localStorageData();});
	$(document).on('click','.zone-border',function(){
		$(this).toggleClass('zoneselected');
		if($(this).hasClass('zoneselected')){
			$('.loc-span').addClass('hide');
			$('#zone-tags').append('<div class="location-tag font_newregular z-ind9 '+$(this).attr('data-id')+' " id="zone-tag"><span id="zone-value">'+$(this).attr('data-name')+'</span><a href="javascript:void(0);" data-id="'+$(this).attr('data-id')+'" class="close-tag gry">x</a></div>');
			$(this).prev().removeAttr('disabled');
		}
		else
		{
			var zoneClass	=	'.'+$(this).attr('data-id');
			$(zoneClass).remove();
			if($.trim($("#zone-tags").html())==''){
				$('.loc-span').removeClass('hide');
			}
			$(this).prev().attr('disabled','disabled');
		}
		$.fn.filterClick();
	});
	
	$(document).on('click','.close-tag',function(){
		var zoneID	=	$(this).attr('data-id');
		$('div[data-id="'+zoneID+'"]').toggleClass('zoneselected').prev().attr('disabled','disabled');
		$(this).parent().remove();
		if($.trim($("#zone-tags").html())==''){
			$('.loc-span').removeClass('hide');
		}
		if($.trim($("#level-tags").html())==''){
			$('.lvl-span').removeClass('hide');
		}
		$.fn.filterClick();
	});
	
	$(document).on('click','#algo-loc',function(){
		$(".tt-input").val('');
		$("#algo-location").val('');
		if($('.tt-input').val().length==0){
			flag	=	0;
			$("#location-search").val('');
		}
		$(this).parent().remove();
		if($.trim($("#zone-tags").html())==''){
			$('.loc-span').removeClass('hide');
		}
		$.fn.filterClick();
	});
		
	$(document).on('click','.zone-border1',function(){
		$(this).toggleClass('zoneselected');
		if($(this).hasClass('zoneselected')){
			$('.lvl-span').addClass('hide');
			$('#level-tags').append('<div class="location-tag font_newregular z-ind9 '+$(this).attr('data-id')+' " id="zone-tag"><span id="zone-value">'+$(this).attr('data-name')+'</span><a href="javascript:void(0);" data-id="'+$(this).attr('data-id')+'" class="close-tag gry">x</a></div>');
			$(this).prev().removeAttr('disabled');
		}
		else
		{
			var zoneClass	=	'.'+$(this).attr('data-id');
			$(zoneClass).remove();
			if($.trim($("#level-tags").html())==''){
				$('.lvl-span').removeClass('hide');
			}
			$(this).prev().attr('disabled','disabled');
		}
		$.fn.filterClick();
	});
	
	$(document).on('focusout','.algolia-search',function(){
		if($('.tt-input').val().length==0){
			flag	=	0;
			$("#location-search").val('');
			$('.algo-loc').remove();
			if($.trim($("#zone-tags").html())==''){
				$('.loc-span').removeClass('hide');
			}
			$.fn.filterClick();
		}
	});
		
	var selectizeOP	=	$('#select-skills').selectize({
		openOnFocus: false,
		sortField: {field: 'text',},
		closeAfterSelect: true,
		maxOptions:12,
		optgroup: true,
		plugins: ['remove_button'],
		onChange: function() {$.fn.filterClick();},
		onItemRemove: function() {
			//$('#select-skills').close();
		}
	});

	var selectizeIndu	=	$('#industry').selectize({
		maxItems: 3,
		closeAfterSelect: true,
		plugins: ['remove_button'],
		onChange: function(values) {$.fn.filterClick();$('#industry').click();},
		onItemRemove: function(value){
			//$('#industry').close();
		}
	});
	
<?php
	if(Yii::app()->user->hasState('searchFor')) {
		if(Yii::app()->user->searchFor=='industry') {?>
				select12 = selectizeIndu[0].selectize;
				select12.addItem('<?php echo Yii::app()->user->keyword;?>');
<?php
		}elseif(Yii::app()->user->searchFor=='skill' || Yii::app()->user->searchFor=='keyword') {?>
			select12 = selectizeOP[0].selectize;
			select12.addOption({value:'<?php echo Yii::app()->user->searchFor.'_'.Yii::app()->user->keyword;?>',text:'<?php echo Yii::app()->user->keyword;?>'});
			select12.addItem('<?php echo Yii::app()->user->searchFor.'_'.Yii::app()->user->keyword;?>');
			console.log("Set session data");
<?php
		}?>
	setLocalStorageData();
<?php
	}?>

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
	
	$(document).on('click','#getIntro',function(e){console.log('in');
		if(suppliersList.length<1){
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
			window.location.href="<?php echo Yii::app()->createUrl("/site/projectCreate");?>";
		}
	};

	$.fn.callLoad = (function(){
		$('#search-Result').on('click',".hide-result",function() {
			if($count<$limit){
				if($(this).attr('id')==undefined){
					$('#'+$(this).attr('data-id')).addClass('hide');
					$('#'+$(this).next().attr('data-id')).removeClass('hide');
				}
				else{
					$('.'+$(this).attr('id')).addClass('hide');
					$('.'+$(this).next(".show-result").attr('id')).removeClass('hide');
				}
				$(this).addClass('hide');
				$(this).next(".show-result").removeClass('hide');
				$valCurrent	=	$(this).val();
				suppliersList.push($valCurrent);
				$count		= suppliersList.length;
				$("#CountSupplier").html($count);
			}else{
				var actionconfirm = 'To keep things simple, we recommend talking to '+$limit+' (or fewer) teams only. You can always request more later.';
				bootbox.alert(actionconfirm);
			}
			localStorage.setItem('selectedSuplliers',suppliersList);
		});

		$('#search-Result').on('click',".show-result",function() {
			if($(this).attr('id')==undefined){
				$('#'+$(this).attr('data-id')).addClass('hide');
				$('#'+$(this).prev().attr('data-id')).removeClass('hide');
			}
			else{
				$('.'+$(this).attr('id')).addClass('hide');
				$('.'+$(this).prev().attr('id')).removeClass('hide');
			}
			$(this).addClass('hide');
			$(this).parent().find(".hide-result").removeClass('hide');
			$valCurrent	=	$(this).val();			
			var $indx	=	suppliersList.indexOf($valCurrent);
			suppliersList.splice($indx, 1);
			$count		= suppliersList.length;
			$("#CountSupplier").html($count);
			localStorage.setItem('selectedSuplliers',suppliersList);
		});
	})();

	//$.fn.filterClick();

	function setLocalStorageData() {
		// add data from localstorage
		if(localStorage.length > 0) {
			// get and set data to their respective fields
			var storageSkills = localStorage.getItem('skills');
			//var storageLocation = localStorage.getItem('location');
			var storageIndustry = localStorage.getItem('industry');
			//var storageRange = localStorage.getItem('rangeSlider');
			var storageSuppliers = localStorage.getItem('selectedSuplliers');
			var storageZones = localStorage.getItem('zones');
			var storageLevels= localStorage.getItem('levels');
			if(typeof storageSkills != undefined && storageSkills != null && storageSkills != '') {
				console.log("Skills: " + storageSkills);
				var skillsArray = storageSkills.split(",");
				console.log(skillsArray);
				var selectSkills = selectizeOP[0].selectize;
				$.each(skillsArray, function(index, item) {
					selectSkills.addItem(item);
				});
				console.log("Selected Skills");
			}

			if(typeof storageZones != undefined && storageZones != null && storageZones != '') {
				console.log("Zones: " + storageZones);
				var zonesArray = storageZones.split(",");
				console.log(zonesArray);
				$('.loc-span').addClass('hide');
				$.each(zonesArray,function(index, item){
					var element = $('input[value="'+item+'"]');
					var div 	= element.next();
					element.removeAttr('disabled');
					div.toggleClass('zoneselected');
					$('#zone-tags').append('<div class="location-tag font_newregular z-ind9 '+div.attr('data-id')+' " id="zone-tag"><span id="zone-value">'+div.attr('data-name')+'</span><a href="javascript:void(0);" data-id="'+div.attr('data-id')+'" class="close-tag gry">x</a></div>');
				});
				$('.zone_outr').slideToggle(500);
			}

			if(typeof storageLevels != undefined && storageLevels != null && storageLevels != '') {
				console.log("Levels: " + storageLevels);
				var levelsArray = storageLevels.split(",");
				console.log(levelsArray);
				$('.lvl-span').addClass('hide');
				$.each(levelsArray,function(index, item){
					var element = $('label.level input[value="'+item+'"]');
					var div 	= element.next();
					element.removeAttr('disabled');
					div.toggleClass('zoneselected');
					$('#level-tags').append('<div class="location-tag font_newregular z-ind9 '+div.attr('data-id')+' " id="zone-tag"><span id="zone-value">'+div.attr('data-name')+'</span><a href="javascript:void(0);" data-id="'+div.attr('data-id')+'" class="close-tag gry">x</a></div>');
				});
				$('.level_data').slideToggle(500);
			}
			if(typeof storageIndustry != undefined && storageIndustry != null && storageIndustry != '') {
				console.log("Industry: " + storageIndustry);
				var industryArray = storageIndustry.split(",");
				console.log(industryArray);
				var selectSkills = selectizeIndu[0].selectize;
				$.each(industryArray, function(index, item) {
					selectSkills.addItem(item);
				});
				console.log("Selected Industries");
			}
			// if(typeof storageRange != undefined && storageRange != null && storageRange != '') {
			// 	console.log("Range: " + storageRange);
			// 	var rangeArray = storageRange.split(";");
			// 	rangeSlider.update({
			// 		from: rangeArray[0],
			// 		to: rangeArray[1]
			// 	});
			// }

			$( document ).ajaxComplete(function() {
				if(typeof storageSuppliers != undefined && storageSuppliers != null && storageSuppliers != '') {
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
			$.fn.filterClick();
		}
	}
	
	localStorage.removeItem('searchItem');
	
	$(document).on('click','#see-more',function(){
		$('.result-show').each(function(){
			$(this).removeClass('hide');
		});
		$('#headShow').removeClass('hide');
		$('#see-more').addClass('hide');
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

	$('#search-Result').on('click','a[data-toggle="tab"]', function() {
			$(this).parent().parent().parent().find('div.active').removeClass('active');
			$(this).parent().addClass('active');
	});


	$('#search-Result').on('click',".more-skills",function(){
		$(".tag-collapse").css('display','inline-block');
		$(".less-skills").show();
		$(".more-skills").hide();
	});

	$('#search-Result').on('click',".less-skills",function(){
		$(".tag-collapse").css('display','none');
		$(".more-skills").show();
		$(".less-skills").hide();
	});

	$('#search-Result').on('click',".previousPic",function(){
		var element = $(this).parent().find('img.isActive');
		if(element.prev('img').length!=0){
			element.addClass('hide').removeClass('isActive');
			element.prev('img').removeClass('hide').addClass('isActive');
		}
	});

	$('#search-Result').on('click',".nextPic",function(){
		var element = $(this).parent().find('img.isActive');
		if(element.next('img').length!=0){
			element.addClass('hide').removeClass('isActive');
			element.next('img').removeClass('hide').addClass('isActive');
		}
	});
	
	$('#search-Result').on('click',".link",function(e){
		$(this).parents('.slimscroll').slimScroll({ scrollTo : $(this).parent().prev().height() });
		//$(this).parents('.slimscroll').animate({scrollTop: $(this).parent().prev().height()},'slow');
		$(this).parent().hide();
	});

	$('#search-Result').on('click','.cslide-next',function(e){
		var currentElement = $(this).parent().next().find('.cslide-first');
		if(currentElement.next('div.cslide-slide').length != 0){
			currentElement.removeClass('cslide-first');
			currentElement.next('div.cslide-slide').addClass('cslide-first');
		}
	});

	$('#search-Result').on('click','.cslide-prev',function(e){
		var currentElement = $(this).parent().next().find('.cslide-first');
		if(currentElement.prev('div.cslide-slide').length != 0){
				currentElement.removeClass('cslide-first');
				currentElement.prev('div.cslide-slide').addClass('cslide-first');
			}
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
	
	$(document).on('shown.bs.modal','.modal-lazy',function(e) {
		$(this).find('.bootstrap-slider img').each(function(){
			$(this).attr('src', $(this).attr('data-img-url'));
		});
	});

	$(document).on('click','.next',function(){
		var supplier_id		=	parseInt($(this).attr("data-supplier-id"));
		var next_slide_id	=	parseInt($(this).attr("data-slide-id"));
		var next_slide		=	'#Slide-'+supplier_id+'-'+next_slide_id;
		var curr_slide		=	'#Slide-'+supplier_id+'-'+(next_slide_id-1);
		console.log(next_slide);
		console.log(curr_slide);
		//$("body").css("overflow", "hidden");
		$(curr_slide).animo({animation: "fadeOutLeft", duration: 0.0, keep: false},function() {
			$(curr_slide).hide();
			$(next_slide).show().removeClass("hide").animo({animation: "fadeInRight", duration: 0.0},function(){
				$("body").addClass("scroll-height");
				$("body").removeClass("no-scroll");
				$(curr_slide).removeClass('currentSlide');
				$(next_slide).addClass('currentSlide');
			});
		});
	});

	$(document).on('click','.previous',function(){
		var supplier_id		=	parseInt($(this).attr("data-supplier-id"));
		var prev_slide_id	=	parseInt($(this).attr("data-slide-id"));
		var next_slide		=	'#Slide-'+supplier_id+'-'+prev_slide_id;
		var curr_slide		=	'#Slide-'+supplier_id+'-'+(prev_slide_id+1);
		console.log(next_slide);
		console.log(curr_slide);
		//$("body").css("overflow", "hidden");
		$(curr_slide).animo({animation: "fadeOutRight", duration: 0.0, keep: false},function() {
			$(curr_slide).hide();
			$(next_slide).show().removeClass("hide").animo({animation: "fadeInLeft", duration: 0.0},function(){
				$("body").addClass("scroll-height");
				$("body").removeClass("no-scroll");
				$(curr_slide).removeClass('currentSlide');
				$(next_slide).addClass('currentSlide');
			});
		});
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

function handelSkillsHideShow(element){
	var val=element.attr('data-id');
	var parent=element.parent().parent();
	parent.find("[data-display^=pop_]").hide('fast');
	if(val=="pop_skills"){
		parent.find("[data-display^=pop_]").show('fast');
		if(parent.find(".less-skills").length !=0)
			parent.find(".less-skills").show('fast');
	}
	else{
		parent.find("[data-display='"+val+"']").show('fast');
		if(parent.find(".less-skills").length !=0 && parent.find(".more-skills").length !=0 ){
			parent.find(".less-skills,.more-skills").hide('fast');
		}
	}
	//remove class from all other buttons
	parent.find("[data-id^=pop_]").removeClass('active');
	//apply class to current button
	parent.find("[data-id='"+val+"']").addClass('active');
}

var iteration=1;
var iteration2=1;
$('#callButton').click(function(){
	if( $('#callSchedulingForm').parsley().validate() ){
		var ids = $('.timing-tag input:checkbox:checked').map(function() {
			return this.value;
		}).get().join(",");
		console.log(ids);
		$('#CallSchedules_call_time').val(ids);		
		//loader and loading stuff start-----
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
					$('.scheduleACall').html("Call scheduled for  " +timings+". We'll email you to confirm.");
					$("#hiddenId").val(response);

					//loader and loading stuff start-----
					$('#callButton').html('Reschedule');
					$('#callButton').removeAttr('disabled');
					//end---
				}
				else{
					$('.scheduleACall').html('Try Call Scheduling Again');
				}
			}
		});
	}
});
	
$('.locationdiv-inner,.leveldiv-inner').click(function(e){
	var top = $('.tab-content').offset().top;
	$("body,html").animate({ scrollTop: top-100 },1000);
});
$('#algo-location').click(function(e){
	var top = $('.locationdiv-otr').offset().top;
	$("body,html").animate({ scrollTop: top },1000);
});
</script>
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END); ?>
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/google.js',CClientScript::POS_END); ?>
