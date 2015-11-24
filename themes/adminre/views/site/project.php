<div class="col-md-12 col-xs-12 text-center">
	<h1 class="text_white fs40 font_newregular mt10">Hey! </h1>
	<h3 class="cp-text fs26 mt10">Tell us more about your needs in 30 seconds</h3>
</div>
<div class="col-md-12 col-xs-12  np mt40 mb40">
	<div class="col-md-4 col-xs-2 cp-border-t cp-border-b np mt10"></div>
	<div class="col-md-4 col-xs-8 text-center">
		<span class="pagination-circle"><span class="pc-inside"></span></span>
		<span class="pagination-circle"><span class="pc-inside-light"></span></span>
		<span class="pagination-circle"><span class="pc-inside-light"></span></span>
		<span class="pagination-circle"><span class="pc-inside-light"></span></span>
		<span class="pagination-circle"><span class="pc-inside-light"></span></span>
		<span class="pagination-circle"><span class="pc-inside-light"></span></span>
	</div>
	<div class="col-md-4 col-xs-2 cp-border-t cp-border-b np mt10"></div>
</div>
<div class="col-md-12 col-xs-12 mt25 slide-div np">
	<div class="col-md-12 col-xs-12 text-center np">
		<div class="mt10 vali-outr">
			<h2 class="fs32 text_white display_inline mr10">Lets call this project</h2> 
			<input type="text" id="requirement" name="requirement" class="cp-input col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 required" placeholder="ex: Facebook, eCommerce For Boats" data-parsley-required-message='Project Title is required' data-parsley-minlength='2' />
			<!--<select id="requirement" name="requirement" class="selectize-texttrue demo-default cp-selectstyle cp-select display_inline cp-styledropdown">
				<option value="0">to execute a project independently</option>
				<option value="1">to work with my existing team</option>
			</select>-->
		</div>
	</div>
	<div class="col-md-12 col-xs-12  text-center mt20">
		<?php echo CHtml::link('Connect via Linkedin', array('/site/linkedin','lType'=>'initiate','role'=>2,'redirectType'=>1),array('id'=>'linkedinButton','class'=>'btn btn-orange mt15 fs20 font_newregular pl25 pr25 pt5 pb5 sliding-next'));?>
	</div>
	<div class="col-md-12 col-xs-12  text-center mt20">
		<a href="javascript:void(0);" id="pronotlink" class="fs14 h-orange font_newregular">No LinkedIn?</a>
	</div>
</div>
<!-- Modal SignUp -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-md-12 col-xs-12 np">
			<div class="modal-body col-md-12 col-xs-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np p20">
					<div class="col-md-12 col-xs-12 np">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<!-- Sign Up starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-create-acc modal-create-acc-show rs-np">
							
							<div class="alert alert-dismissible alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>
	
							<h3 class="fs26 font_newlight team-text-blue mt5">Create Account</h3>
							<div class="form-group">
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
								</div>
								<div class="col-md-12 col-xs-12 mt5 mb5">
									<div class="col-md-5 col-xs-12 border-overlay"></div>
									<div class="col-md-2 col-xs-12 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 col-xs-12 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/signup'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::hiddenField('is_create_project_signup','1',array('id'=>'is_search_signup'));  ?>
									<?php echo CHtml::hiddenField('signup-category','',array('id'=>'signup-category'));  ?>
									<?php echo CHtml::hiddenField('signup-val','',array('id'=>'signup-val'));  ?>
									<?php echo $form->textField($users,'first_name',array('data-parsley-required-message'=>'Name is required','placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input bb0 required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
									<?php echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2')); ?>
									<?php echo $form->passwordField($users,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'required'=>'required','title'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required minlength','length'=>"6",'tabindex'=>'3'));?>
									<?php $users->role_id=2; echo $form->hiddenField($users,'role_id'); ?>
									<?php if(Yii::app()->user->hasState('promo')){
											$users->refCode=Yii::app()->user->promo;
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
									<?php echo CHtml::hiddenField('is_create_project_login','1',array('id'=>'is_search_login'));  ?>
									<?php echo CHtml::hiddenField('login-category','',array('id'=>'login-category'));  ?>
									<?php echo CHtml::hiddenField('login-val','',array('id'=>'login-val'));  ?>
									<?php echo $form->emailField($model,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email")); ?>
									<div class="col-md-12 col-xs-12 np">
									<?php echo $form->passwordField($model,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordFieldInPopup')); ?>
									<a class="fs12 font_newregular orange-new pull-right mt15 modal-forgot-passwordDiv forgot-pass" href="javascript:void(0);" id="">Forgot ?</a>
									</div>
								</div>
								<!--<div class="col-md-12 col-xs-12">
									<div class="col-md-6 col-xs-6 np">
										<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10 rs-nm">
											<?php //echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox"));?>
											<label for="customcheckbox" class="fs12 grey1">&nbsp; Remember me</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-6 np">
											
									</div>
								</div>-->
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
<script>
$(document).ready(function(){
	$("#linkedinButton").click(function(e){
		if($('#requirement').parsley().validate() == true)
		{
			$('#requirement').parent().find('ul').find('.check').hide();
			var requirement = $('#requirement').val();
			localStorage.setItem('requirement',requirement);
		}
		else
		{
			$('#requirement').parent().find('ul').find('.check').show();
			e.preventDefault();
		}
	});
	
	$("#pronotlink").click(function(e){
		if($('#requirement').parsley().validate() == true)
		{
			$('#requirement').parent().find('ul').find('.check').hide();
			var requirement = $('#requirement').val();
			localStorage.setItem('requirement',requirement);
			$('#signup').modal('toggle');
		}
		else
		{
			$('#requirement').parent().find('ul').find('.check').show();
			e.preventDefault();
		}
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
	
	$('#login-m').click(function(e){
		if($('#requirement').parsley().validate() == true)
		{
			var requirement = $('#requirement').val();
			localStorage.setItem('requirement',requirement);
			signIn($(this));
		}
		else
		{
			e.preventDefault();
		}
	});
	
	$('#signupSearch').click(function(e){
		if($('#requirement').parsley().validate() == true)
		{
			var requirement = $('#requirement').val();
			localStorage.setItem('requirement',requirement);
			signUp($(this));
		}
		else
		{
			e.preventDefault();
		}
	});

	$( "#passwordFieldInPopup" ).keypress(function( event ) {
	  if ( event.which == 13 ) {
	     $( "#login-m" ).trigger( "click" );
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
});
</script>
<style>body{min-height:300px;} html{background:#5acccd ;}</style>