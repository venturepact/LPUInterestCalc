<!-- Modal SignUp -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content col-md-12 col-xs-12 np">
		<div class="modal-body col-md-12 col-xs-12 np">
			<div class="col-md-12 col-sm-12 col-xs-12 np p20">
				<div class="col-md-12 col-xs-12 np">
					<!-- Sign Up starts -->
					<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-create-acc modal-create-acc-show">
						
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
								if(Yii::app()->user->hasState('remail')){
									echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Email",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2','readonly'=>'readonly'));
								}else{
									echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Email",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2'));
								}
								echo $form->passwordField($users,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'required'=>'required','title'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required minlength','length'=>"6",'tabindex'=>'3'));
								$users->role_id=2; echo $form->hiddenField($users,'role_id');
								if(Yii::app()->user->hasState('promo')){
									$users->refCode=Yii::app()->user->promo;
									echo $form->hiddenField($users,'refCode');
								}?>
							</div>
							<div class="col-md-12 col-xs-12">
								<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
									<input required="required" type="checkbox" name="customcheckbox1" id="customcheckbox1" checked/>
									<label for="customcheckbox1" class="fs12 grey1">&nbsp; I agree to</label>
									<a class="fs12 font_newregular orange-new mt15" href="javascript:void(0);" id="" data-toggle="modal" data-target="#terms-conditions">Terms & Conditions</a>
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
					<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-signin modal-signin-hide">
						
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
							<div class="col-md-12">
								<?php echo CHtml::hiddenField('is_search_login','1',array('id'=>'is_search_login'));  ?>
								<?php echo CHtml::hiddenField('login-category','',array('id'=>'login-category'));  ?>
								<?php echo CHtml::hiddenField('login-val','',array('id'=>'login-val'));  ?>
								<?php echo $form->emailField($model,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email")); ?>
								<?php echo $form->passwordField($model,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordFieldInPopup')); ?>
							</div>
							<div class="col-md-12 col-xs-12">
								<div class="col-md-6 np">
									<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
										<?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox"));?>
										<label for="customcheckbox" class="fs12 grey1">&nbsp; Remember me</label>
									</div>
								</div>
								<div class="col-md-6 col-xs-12 np">
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