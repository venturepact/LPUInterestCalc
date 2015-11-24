<section class="col-md-12 col-sm-12 col-xs-12 np slide table-div homepage-bg error-bg-height">
	<div itemscope itemtype="http://schema.org/LocalBusiness" class="navbar np navbar-fixed-top rs-hide" id="rs-nav-bar">
		<div class="col-md-3 np">
			<?php
			if(Yii::app()->user->isGuest)
				echo CHtml::link('<img itemprop="image" src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/site'),array('class'=>'blue-logo ml10'));
			else
				echo CHtml::link('<img itemprop="image" src="'.Yii::app()->theme->baseUrl.'/images/logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'blue-logo ml10'));
			?>
		</div>
		<div class="pull-right col-md-9 mt15">					
			<ul class="nav navbar-nav navbar-right mr15">						
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
	<div  class="error-table-layout trusted-div remove-css">
		<div class="container mt80">
			<div class="row np text-center min-h370 rs-pb30 rs-mt25">
				<h1 class="blue-head mt40 ">Earn Over <span class="text_white fs30">$500</span> For Everyone You Invite.</h1>
				<h3 class="blue-head mb40">(Many of our members save over $1000 on their projects)</h3>

				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 mt20 mb20 ">
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="text_white fs16 font_newregular col-md-11 text-center line-height24 light-blue-b pb20">1. Share with friends & businesses that are looking for tech talent. </div>
							<div class="col-md-10 col-sm-12 col-xs-12 mt20">
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ref1.png" alt="banner" />
							</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="text_white fs16 font_newregular col-md-11 text-center line-height24 light-blue-b pb20">2. When anyone signs up, they get <span class="text_white">$500</span> in credits.</div>
						<div class="col-md-10 col-sm-12 col-xs-12 mt30">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ref2.png" alt="banner" />
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="text_white fs16 font_newregular col-md-11 text-center line-height24 light-blue-b pb20">3. You earn <span class="text_white">$500</span> when they spend at least $10,000.</div>
						<div class="col-md-10 col-sm-12 col-xs-12 mt20">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ref3.png" alt="banner" />
						</div>
					</div>
				</div>	
				<div class="col-md-12 text-center np mt20">
					<i class="fa fa-angle-down fs40 bounce animated"></i>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="col-md-12 col-sm-12 col-xs-12 np h-lightbg pt40 slide table-div id3">
	<div class="trusted-div" id="slider-outrr">
		<div class="container mt40 rs-np">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center pa20 rs-np"> 
				<h2 class="fs32 mb20 rs-nm">
					Submit your first referral today.
				</h2>
				<!-- <h4 class="mt40 fs22 h-text4 lh-30">
					Leave us your email and our partnerships representative will get back to you with more information.
				</h4> -->
				<div class="col-md-12 text-center np mt20">
					<button type="button" value="Search" name='search'  data-toggle="modal" data-target="#signup" class="btn btn-orange fs14 pl15 pr15 pt10 pb10  lh-22 font_newregular">Generate Referral Code</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-12 np">
		<div class="navbar bg-light np navbar-height header-shadow hide" id="rs-task_flyout">
			<div class="col-md-12 np">
				<div class="col-md-1 col-xs-4 np br-gray">
					<?php
					if(Yii::app()->user->isGuest)
						echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'),array('class'=>'home-blue-logo ml10'));
					else
						echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'home-blue-logo ml10 mt10 mb10'));
					?>
				</div>
				<div class="pull-right col-md-5 pt15 home-nav np col-xs-8 mr15">					
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="tel:9497917659" class="fs14 font_newregular blue-new pr25 rs-hide">Call 949.791.7659</a>

						</li>
						<li>
							<a href="javascript:void(0);" class="fs14 font_newregular blue-new pr25 menu-icon">
								<i class="fa fa-bars pr5"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<?php //$this->widget('WidgetAlgolia');?>
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
									<?php echo CHtml::hiddenField('is_referral_signup','1',array('id'=>'is_referral_signup'));
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

							<h3 class="fs26 font_newlight team-text-blue mt5">Get Your Referral Code</h3>
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
									<?php echo CHtml::hiddenField('is_referral_login','1',array('id'=>'is_referral_login'));  ?>
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
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/thankyou-img.jpg" class="" alt="thank you" />
						</div>
						<div class="col-md-12 col-xs-12 text-center">
							<h2 class="fs24 font_newlight blue-new mb20 pb10">Thank you for <br/>submitting your review.</h2>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/thankyou-done-img.png" class="" alt="thank you" />
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
<script>
$(document).ready(function(){
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
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algolia.js',CClientScript::POS_END); ?>
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/hogan.common.js',CClientScript::POS_END); ?>

<script type="text/javascript">
var CE_SNAPSHOT_NAME = "VenturePact Index Page";
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0034/1290.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);

$(document).ready(function(){
		$('#login-form-inside').append('<input type="hidden" value="1" name="is_referral_login"/>');
		$('#sign_up_inside').append('<input type="hidden" value="1" name="is_referral_signup"/>');
});

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