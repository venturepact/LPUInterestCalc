<!-- Sign In starts -->
<div class="form-horizontal admin-form theme-primary col-lg-6 col-md-7 col-md-offset-5 np signin signin-show">
	<div class="alert alert-dismissible alert-danger1 alert_message mt15" style="display:none;">
		<p class="messageResponse"></p>
	</div>

	<div class="form-group">
		<div class="col-md-12 col-xs-12">
			<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>'2'),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
		</div>
		<div class="col-md-12 col-xs-12 mt5 mb5 rs-show">
			<div class="col-md-5 border-overlay mt5 mb5"></div>
			<div class="col-md-2 p10 text-center rs-np mt10"><span class="fs14 font_newregular grey1">or</span></div>
			<div class="col-md-5 border-overlay mt5 mb5"></div>
		</div>
		<div class="col-md-12 mt5 mb5 rs-hide">
			<div class="col-md-5 border-overlay"></div>
			<div class="col-md-2 p10 text-center mt10"><span class="fs14 font_newregular grey1">or</span></div>
			<div class="col-md-5 border-overlay"></div>
		</div>
		<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/login'),'id'=>'login-form-inside','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
		<div class="col-md-12 col-xs-12">
			<?php echo $form->emailField($model,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email",'data-parsley-required-message'=>'Email is required')); ?>
			<div class="col-md-12 col-xs-12 np">
			<?php echo $form->passwordField($model,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordField','data-parsley-required-message'=>'Password is required')); ?>
			<a class="fs12 font_newregular orange-new pull-right mt15 forgot-passwordDiv forgot-pass" href="javascript:void(0);" id="">Forgot?</a>	
			</div>
		</div>
		<div class="col-md-12 col-xs-12"> 
			<div class="col-md-6 col-xs-6 np ">
				<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
					<?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox3"));?>
					<label for="customcheckbox3" class="fs12 grey1">&nbsp; Remember me</label>
				</div>
			</div>
		</div>
			
				
			
		<!--</div>-->
		<div class="col-md-12 col-xs-12">
			<input type="button" value="Sign In" id="loginButton" class="btn width100 tab-btn-orange fs14 pull-left font_newregular mt15" data-id="login-form-inside" onClick="signIn($(this));">
			<?php //echo CHtml::submitButton('Sign In',array('class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15')); ?>
		</div>
		<?php $this->endWidget(); ?>
		<div class="col-md-12 col-xs-12">
			<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
				<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new create-accDiv" href="javascript:void(0);">Create now</a></span>	
				<br /><br />
			</div>
		</div>
	</div>	
</div>
<!-- Sign In ends -->


<script type="text/javascript">
$(document).ready(function(){
<?php
if(Yii::app()->user->hasState('promo')){
	if(Yii::app()->user->hasState('remail')){
?>
		$('.btn-linkedin').attr('href','<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>2,'redirectType'=>5));?>');
<?php 	
	}else{
?>
		$('.btn-linkedin').attr('href','<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>2,'redirectType'=>4));?>');
<?php	
	}
} 
?>
});
function signIn(element){
	var form="#"+element.attr('data-id');
	if($(form).parsley().validate()){
		element.attr('value','Please Wait ... ');
		$.ajax({
			type:'POST',
			url:$(form).attr('action'),
			data:$(form).serialize(),
			success:function(data){
				console.log(data);
				var response = $.parseJSON(data);
				if(response.success=='1'){
					window.location.href = response.url;
				}
				else{
					element.parent().parent().parent().parent().find("p.messageResponse").html("<strong>Login Failed!</strong> "+ response.success );
					element.parent().parent().parent().parent().find("div.alert_message").fadeIn("slow");
					element.attr('value','Sign In');
				}
			}
		});
	}
}

function signUp(element){
	var form="#"+element.attr('data-id');
	if($(form).parsley().validate()){
		element.attr('value','Creating Account ...').attr('disabled','disabled');
		$.ajax({
			type:'POST',
			url:$(form).attr('action'),
			data:$(form).serialize(),
			success:function(data){
				var response = $.parseJSON(data);
				if(response.success=='1'){
					window.location.href = response.url;
				}
				else if(response.success=='2'){
					element.parent().parent().parent().parent().find("div.alert_message").removeClass('alert-danger1');
					element.parent().parent().parent().parent().find("div.alert_message").addClass('alert-success');
					element.parent().parent().parent().parent().find("p.messageResponse").html("<strong>Welcome! </strong> "+ response.msg );
					element.parent().parent().parent().parent().find("div.alert_message").fadeIn("slow");
					element.attr('value','Create Account').removeAttr("disabled");
				}
				else{
					element.parent().parent().parent().parent().find("div.alert_message").removeClass('alert-success');
					element.parent().parent().parent().parent().find("div.alert_message").addClass('alert-danger1');
					element.parent().parent().parent().parent().find("p.messageResponse").html("<strong>Failed!</strong> "+ response.success );
					element.parent().parent().parent().parent().find("div.alert_message").fadeIn("slow");
					element.attr('value','Create Account').removeAttr("disabled");
				}
			}
		});
	}
}

$( "#login-form-inside" ).keypress(function( event ) {
	if ( event.which == 13 ) {
		$( "#loginButton" ).trigger( "click" );
		$( "#loginButton" ).focus();
	}
});
</script>