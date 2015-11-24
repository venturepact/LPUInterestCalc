<form action="<?php echo $callback_uri; ?>" id="response-form" method="post">
	<input type="hidden" name="response" id="response">
	<input type="hidden" name="responseText" id="responseText">
</form>
<div class="col-md-12 col-sm-12 col-xs-12 mt50" id="">
	<div class="col-md-12 mt50 mb50"> 
		<div class="col-md-4"></div>
		<div class="form-horizontal admin-form theme-primary col-md-2 col-md-offset-1 np signin signin-show">
			<!-- Sign In starts -->
				<div class="alert alert-dismissible alert-danger1 alert_message mt15" style="display:none;">
					<p class="messageResponse"></p>
				</div>
				<div class="form-group">
					<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form-inside','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
					<div class="col-md-12 col-xs-12">
						<?php $users->redirect_uri=$callback_uri; echo $form->hiddenField($users,'redirect_uri'); ?>
						<?php echo $form->emailField($users,'username',array('placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email")); ?>
						<?php echo $form->passwordField($users,'password',array('placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordField')); ?>
					</div>
					<div class="col-md-12 col-xs-12">
						<?php echo CHtml::button('Authenticate',array('id'=>'submit','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15')); ?>
					</div>
					<?php $this->endWidget(); ?>
				</div>	
			<!-- Sign In ends -->
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$(document).on('click','#submit',function(e) {
			if($('#login-form-inside').parsley().validate() == true){
				var data = $('#login-form-inside').serialize();
				$('#submit').val('Please Wait');
				$('#submit').attr('disabled','disabled');
				$.ajax({
					type: 'POST',
					url:"<?php echo CController::createUrl('/site/checkUser');?>",
					data:data,
					success :function(data){
						var response = JSON.parse(data);
						if(response.hasOwnProperty('error')){
							$('#response').val('0');
							$('#responseText').val('Invalid User');
							$('#response-form').submit();
						}
						else{
							$('#response').val('1');
							$('#responseText').val('User Authenticated');
							$('#response-form').submit();
						}
						$('#submit').removeAttr('disabled');
					}
				});
			}
			else{
				e.preventDefault();
			}
		});
	});
</script>