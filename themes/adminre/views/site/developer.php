<!-- jQuery -->
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
<div class="navbar navbar-fixed-top bg-light np search-nav rs-hide">
	<div class="col-md-1 np">
		<?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/site'),array('class'=>'blue-logo ml10')); ?>
	</div>
	<ol class="breadcrumb pt15">
		<li class="crumb-active mt5">
			<span class="fs24 font_newlight dark_blue_new">Top <?php echo ucwords($keyword).' '.$category; ?> </span>
		</li>				
	</ol>
	<div class="pull-right col-md-6 search-menu">
		<ul class="nav navbar-nav navbar-right">						
			<li>
				<a href="<?php echo CController::createUrl('/site/project');?>" class="fs14 font_newregular grey-new-light pr25 rs-pt10">Post Your Project</a>
			</li>
			<li>
				<a href="javascript:void(0);" data-toggle="modal" data-target="#givecall" class="fs14 font_newregular grey-new-light pr25 scheduleACallTop rs-pt10">Call 949.791.7659</a>
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
<header class="navbar navbar-fixed-top bg-light np header-left rs-mt38 rs-orange rs-show">
	<ol class="breadcrumb fs16 p20 font_newlight hide">
		<li class="crumb-active">
			<a href="javascript:void(0);" class="fs16 back-pd" id="rs-back"><i class="fa fa-angle-left"></i> Back</a>
		</li>
	</ol>
	<ul class="nav navbar-nav navbar-right col-xs-12 np">						
		<li class="col-xs-5 nm pl20 rs-pl10">
			<a href="<?php echo CController::createUrl('/site/project');?>" class="fs14 font_newregular text-white text-center">Post Your Project</a>
		</li>
		<li class="col-xs-5 nm">
			<a href="javascript:void(0);" data-toggle="modal" data-target="#givecall" class="fs14 font_newregular text-white scheduleACallTop text-center">Call 949.791.7659</a>
		</li>
		<li class="rs-hide col-xs-5 nm">
			<a href="javascript:void(0);" class="fs14 font_newregular text-white menu-icon">
				<i class="fa fa-bars pr5"></i>
			</a>
		</li>
		<li class="rs-show col-xs-2 nm">
			<a href="javascript:void(0);" class="fs14 font_newregular text-white menu-icon text-right text-center">
				<i class="fa fa-bars pr5"></i>
			</a>
		</li>
	</ul>
</header>
<div class="col-md-12 col-sm-12 col-xs-12 mt60 pa40 pt15 pb0 bgwhite rs-mt80">
	<h1 class="fs24 font_newlight dark_blue_new display_inline pb15">Here's a Snapshot of Our Vetted <?php echo $keyword.' '.$category;?>:</h1>
</div>
<div id='search-Result'>
	<?php $this->renderPartial('_developer',array("suppliers"=>$suppliers,'data'=>$data,'type'=>$type,'keyword'=>$keyword));?>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 pa30 pb50 pt50 bgwhite">
	<div class="col-md-2 col-xs-12 rs-center">
		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/rachel-big.jpg" alt="Rachel" />
	</div>
	<div class="col-md-5 col-xs-12 rs-center ml40 mt15 rs-nm">
		<span class="fs30 b-color pb15 bb">Hi! I am Rachel</span>
		<h3 class="fs24 loc-gray">Feel free to get in touch if you have any questions!</h3>
		<a href="<?php echo CController::createUrl('/site/project');?>" class="fs14 orange-new">Find The Right Team For Me</a>
	</div>
</div>
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
								<h2 class="fs16  font_newregular ">Hey! <?php echo Yii::app()->user->fname;?></h2>
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
								<?php echo CHtml::link('<span class="icon-power orange-light mr5" aria-hidden="true"></span>',array('/site/logout'),array('class'=>'fs13 font_newregular orange-new col-md-3 np col-xs-4 text-right mb5')); ?>									
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
					<div class="col-md-12 col-sm-12 col-xs-10 mt70 ml50 rs-nm pl25 rs-np rs-hide">
						<div class="col-md-1 col-sm-1 col-xs-3 mr5">
							<a href="https://twitter.com/VenturePact" target="_blank" class="tm-twitter-small">
								<i class="fa fa-twitter fs18 mt2"></i>
							</a>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-3 mr5">
							<a href="https://www.facebook.com/VenturePact" target="_blank" class="tm-facebook-small">
								<i class="fa fa-facebook fs18 pt3"></i>
							</a>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-3 mr5">
							<a href="https://www.linkedin.com/company/venturepact" target="_blank" class="tm-linkedin-small">
								<i class="fa fa-linkedin fs18 mt2"></i>
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
					<div class="col-md-12 form-group hide">
						<label for="datepicker1" class="field prepend-icon">
							<?php echo $form->hiddenField($callSchedules,'time_zone');?>
							<input type="text" id="timeZoneOption" name="timeZoneOption" class="gui-input" disabled="disabled" placeholder="Time Zone" value="<?php echo 'Asia/Kolkata';?>">
							<label for="firstname" class="field-icon"><span class="icon-globe fs14" aria-hidden="true"></span></label>
						</label>
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
								$server = date_default_timezone_get();
								$count	=	0;
								date_default_timezone_set('America/New_York');
								$date	=	DateTime::createFromFormat('m/d/Y g:ia', date("m/d/Y g:ia"));
								$t		=	$date->format('g:i A');
								foreach($call_slots as $slot){								
									$date							=	DateTime::createFromFormat('m/d/Y g:ia', date("m/d/Y")." ".$slot->name);
									$triggerOn						=	$date->format('Y-m-d g:ia');
									$admin_tz						=	'America/New_York';
									$schedule_date					=	new DateTime($triggerOn, new DateTimeZone($admin_tz));
									$t1	=	$schedule_date->format('g:i A');							
									if($slot->category == 1 && strtotime($t1) > strtotime($t))
									{
										$count	=	1;
							?>
										<div class="ckbutton-timming"><label><input type="checkbox" name="today" data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs12 timming-tag"><?php echo $slot->name; ?></span><label></div>
							<?php	}
								}
							if($count == 0)
								echo "<span class='fs12 timming-tag'>Sorry, no slots available today.</span>";
							date_default_timezone_set($server);
							?>
						</div>
					</div>
					<div class="col-md-12 form-group mb5">
						<h4 class="mt0 font_newregular">Tomorrow</h4>
						<div class="col-md-12 pl0 timing-tag">
							<?php foreach($call_slots as $slot){
									if($slot->category == 2){
							?>
								<div class="ckbutton-timming"><label><input type="checkbox" data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs12 timming-tag"><?php echo $slot->name; ?></span><label></div>
							<?php  }}?>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer col-md-12">
				<button type="button" id="callButton" class="btn btn-orange fs12" data-toggle="modal">Done</button>
				<button type="button" class="btn btn-default2 fs12" data-dismiss="modal">Cancel</button>
			</div>
			<?php $this->endWidget();?>
		</div>
	</div>
</div>
<!-- Modal for Call End -->
<!-- Modal Start-->
<div class="modal fade" id="view-project" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xlg">
		<div class="modal-content col-md-12 np">
			<div class="modal-header pa20 new-modal-bg" id="replaceModelLabel">
				<a class="orange-new fs12 font_newregular pull-left mt15" href="#"><i class="fa fa-long-arrow-left"></i> Prev. Project</a>
				<h2 class="modal-title fs28 text-center">Mobile Wallete</h2>
				<a class="orange-new fs12 font_newregular pull-right mt-30" href="#">Next Project <i class="fa fa-long-arrow-right"></i></a>
			</div>
			<div class="modal-body col-md-12 np new-modal-bg slimscroll" id="replaceModelBody">
				<!-- Replace Content at click of Portfolio -->
			</div>
		</div>
	</div>
</div>
<!-- Modal End-->
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
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignUp via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2,'redirectType'=>3),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10 dev-linkedin'));?>
									<form action="<?php echo Yii::app()->createUrl('/site/search1');?>" method="post" class="form-linkedin hide">
										<input type="hidden" value="<?php echo $type; ?>" name="keyword"  />
										<input type="hidden" value="<?php echo $keyword; ?>" name="value"  />
										<button class="btn width100 btn-linkedin fs14 pull-left font_newregular mt10" type="submit"><i class="fa fa-linkedin-square fs15 mr5"></i> Proceed via LinkedIn</button>
									</form>
								</div>
								<div class="col-md-12 mt5 mb5">
									<div class="col-md-5 border-overlay"></div>
									<div class="col-md-2 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/signup'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
								<div class="col-md-12">
									<?php echo CHtml::hiddenField('is_dev_signup','1',array('id'=>'is_dev_signup'));  ?>
									<?php echo CHtml::hiddenField('signup-category',$type,array('id'=>'signup-category'));  ?>
									<?php echo CHtml::hiddenField('signup-val',$keyword,array('id'=>'signup-val'));  ?>
									<?php echo CHtml::hiddenField('is_dev_signup_search','0',array('id'=>'is_dev_signup_search'));  ?>
									<?php echo $form->textField($users,'first_name',array('data-parsley-required-message'=>'Name is required','placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input bb0 required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
									<?php echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2')); ?>
									<?php echo $form->passwordField($users,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'required'=>'required','title'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required minlength','length'=>"6",'tabindex'=>'3'));?>
									<?php $users->role_id=2; echo $form->hiddenField($users,'role_id'); ?>
									<?php if(Yii::app()->user->hasState('promo')){
											$users->refCode=Yii::app()->user->promo;
											echo $form->hiddenField($users,'refCode');
									}?>
								</div>
								<div class="col-md-12">
									<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
										<input required="required" type="checkbox" name="customcheckbox1" id="customcheckbox1" checked/>
										<label for="customcheckbox1" class="fs12 grey1">&nbsp; I agree to</label>
										<a class="fs12 font_newregular orange-new mt15" href="javascript:void(0);" id="" data-toggle='modal' data-target='#terms-conditions'>Terms & Conditions</a>
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
										<?php echo $form->textField($forgot,'email',array('data-parsley-required-message'=>'Email is required','placeholder'=>'Email','class'=>'gui-input bb2 mt10','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email1')); ?>
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
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2,'redirectType'=>3),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10 dev-linkedin'));?>
									<form action="<?php echo Yii::app()->createUrl('/site/search1');?>" method="post" class="form-linkedin hide">
										<input type="hidden" value="<?php echo $type; ?>" name="keyword"  />
										<input type="hidden" value="<?php echo $keyword; ?>" name="value"  />
										<button class="btn width100 btn-linkedin fs14 pull-left font_newregular mt10" type="submit"><i class="fa fa-linkedin-square fs15 mr5"></i> Proceed via LinkedIn</button>
									</form>
								</div>
								<div class="col-md-12 mt5 mb5">
									<div class="col-md-5 border-overlay"></div>
									<div class="col-md-2 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/login'),'id'=>'login-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
								<div class="col-md-12">
									<?php echo CHtml::hiddenField('is_dev_login','1',array('id'=>'is_dev_login'));  ?>
									<?php echo CHtml::hiddenField('login-category',$type,array('id'=>'login-category'));  ?>
									<?php echo CHtml::hiddenField('login-val',$keyword,array('id'=>'login-val'));  ?>
									<?php echo CHtml::hiddenField('is_dev_login_search','0',array('id'=>'is_dev_login_search'));  ?>
									<?php echo $form->emailField($model,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email")); ?>
									<?php echo $form->passwordField($model,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordFieldInPopup')); ?>
								</div>
								<div class="col-md-12">
									<div class="col-md-6 np">
										<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
											<?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox"));?>
											<label for="customcheckbox" class="fs12 grey1">&nbsp; Remember me</label>
										</div>
									</div>
									<div class="col-md-6 np">
										<a class="fs12 font_newregular orange-new pull-right mt15 modal-forgot-passwordDiv" href="javascript:void(0);" id="">Forgot Password?</a>	
									</div>
								</div>
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
<script type="text/javascript">
$(document).ready(function () {
	<?php if($count == 0){ ?>
	$('.sec-today').addClass('hide');
	<?php } ?>
	
	<?php if($hide == 1){ ?>
	$('#see-more').addClass('hide');
	<?php } ?>
	
	var id;
	var suppliersList	=	[];
		
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
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
		suppliersList	=	[];
		suppliersList.push(id);
		localStorage.setItem('selectedSuplliers',suppliersList);
		signIn($(this));
	});
	
	$('.dev-login').click(function(){
		id = $(this).attr('value');
	});
	
	$('.setSkills').click(function(){
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
	});
		
	$('.dev-connect').click(function(){
		id = $(this).attr('value');
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
		suppliersList	=	[];
		suppliersList.push(id);
		localStorage.setItem('selectedSuplliers',suppliersList);
		window.location.replace("<?php echo Yii::app()->createUrl("/site/projectCreate");?>");
	});
	
	$('#signupSearch').click(function(){
		$(this).attr('value','Creating Account ...');
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
		suppliersList	=	[];
		suppliersList.push(id);
		localStorage.setItem('selectedSuplliers',suppliersList);
		signUp($(this));
	});
	
	$('.dev-linkedin').click(function(){
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
		suppliersList	=	[];
		suppliersList.push(id);
		localStorage.setItem('selectedSuplliers',suppliersList);
	});
	
	$( "#passwordFieldInPopup" ).keypress(function( event ) {
	  if ( event.which == 13 ) {
	     $( "#login-m" ).trigger( "click" );
	  }
	});
	
	$('span').tooltip();
	
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
		
	$('.slimscroll').slimscroll();
	
	$('span').tooltip();
	
	$('.carousel').carousel({
		interval: 2000
	});
		
	$(document).on('click','.replaceModContent',function(e) {
		var id 		=	$(this).attr('data-id');
		var modelId = 	'#view-project'+id;
		var label	= 	'#myModalLabel'+id;
		var body	= 	'#bodyContent'+id;
		$('#replaceModelLabel').html($(label).html());
		$('#replaceModelBody').html($(body).html());
		$('.carousel').carousel({
		  interval: 2000
		});
		$('#view-project').modal('toggle');
	});
	
	$(document).on('click','#see-more',function(e) {
		$('#is_dev_signup_search').val('1');
		$('#is_dev_login_search').val('1');
		$('.dev-linkedin').addClass('hide');
		$('.form-linkedin').removeClass('hide');
	});
	
	$(document).on('hidden.bs.modal','#signup',function(e) {
		$('#is_dev_signup_search').val('0');
		$('#is_dev_login_search').val('0');
		$('.dev-linkedin').removeClass('hide');
		$('.form-linkedin').addClass('hide');
	});
	
	$(document).on('click','.newModel',function(e) {
		var id 		=	$(this).attr('data-id');
		var modelId	=	'#view-project'+id;
		var label	=	'#myModalLabel'+id;
		var body	=	'#bodyContent'+id;
		$('#replaceModelLabel').html($(label).html());
		$('#replaceModelBody').html($(body).html());
		$('.carousel').carousel({
		  interval: 2000
		});
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
	$("[data-id^=pop_]").removeClass('active-all');
	element.addClass('active-all');
}

var iteration=1;
var iteration2=1;
$('#callButton').click(function(){
	var ids = $('.timing-tag input:checkbox:checked').map(function() {
		return this.value;
	}).get().join(",");
	$('#CallSchedules_call_time').val(ids);
	NProgress.start();
	$('#white-trans-bg').show();	
	$(this).html('Please Wait ...');
	$(this).attr('disabled','disabled');
	$.ajax({
		type:'Post',
		url:'<?php echo Yii::app()->createUrl("site/scheduleCall"); ?>',
		data:$('#callSchedulingForm').serialize(),
		success:function(response){
			if(response!="error"){
				var timings = $('.timing-tag input:checkbox:checked').map(function() {
					if( $(this).attr('data-category') == 1  && iteration==1 ){
						iteration=0;
						return "Today @ "+$(this).attr('data-value');
						
					}
					else if( $(this).attr('data-category') == 2 && iteration2==1 ){
						iteration2=0;
						return "Tomorrow @ "+$(this).attr('data-value');
					}
					return $(this).attr('data-value');
				}).get().join(" or ");
				iteration=1;
				iteration2=1;
				$('.scheduleACall').html("Call scheduled for  " +timings+". We'll email you to confirm.");
				$("#hiddenId").val(response);
				$('#callButton').html('Done');
				$('#callButton').removeAttr('disabled');
				NProgress.done(true);
				$('#white-trans-bg').hide();
				$('#givecall').modal('toggle');
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