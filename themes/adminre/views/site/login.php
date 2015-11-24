<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3>Login as Client</h3></div>
		</div>
	</div>
</div>   

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
			<?php if(isset($_REQUEST['first'])){?>
				<div class="alert alert-success" id="repsoneRest2">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<p id="messageResponse2">
					<script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script>
					<div style="display:none;"><script id="hideScript">var hideButton = new timelyButton('vp', { buttonId: 'hideScript' });</script></div>
					<strong> Welcome to VenturePact!</strong> If you would like to discuss your requirements over a call, feel free to schedule a call <a href="#" onclick="hideButton.start();">here</a>. <?php if($_REQUEST['first']!=2){?>Also, please click on the verification link sent to your email address.<?php }?></p>
				</div>
			<?php } ?>
			<div class="col-sm-6 ">
				Not a Client? <?php echo CHtml::link('Login as Supplier', array('/site/supplierlogin'));?>           
				<h3>Registered Customers</h3>         
					<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('data-parsley-validate'=>"data-parsley-validate",'class'=>'forms','onsubmit'=>'return validate();'))); ?>
					<?php if(Yii::app()->user->hasFlash('error')):?>
						<div class="alert alert-dismissable alert-danger alertMessage">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<?php echo Yii::app()->user->getFlash('error'); ?>
						</div>
					<?php endif; ?>        
					<?php if(Yii::app()->user->hasFlash('success')):?>
						<div class="alert alert-dismissable alert-success alertMessage">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<?php echo Yii::app()->user->getFlash('success'); ?>
						</div>
					<?php endif; ?>  
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<?php echo $form->emailField($model,'username',array('placeholder'=>"Username",'class'=>'form-control input-white','required'=>'required','data-parsley-type'=>"email")); ?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<?php echo $form->passwordField($model,'password',array('placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'form-control text-input defaultText required password','required'=>'required')); ?>
					</div>
					<div class="checkbox">
						<label>
							<?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox",'class'=>'checkbox'));?><p class="text-left">Remember me</p>
						</label>
					</div>
					<?php echo CHtml::submitButton('Sign In',array('class'=>'btn btn-primary bm0 pull-left')); ?>
                    <span class="forgot ml15"><a href="javascript:void(0);" id="errorfPassLink" data-toggle="modal" data-target="#bs-modal-lost-password">Forgot your password?</a></span>
				<?php $this->endWidget(); ?>
			</div>
			<div class="col-sm-6">
			<h3>Login with Linkedin </h3>
			<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
			<div class="connect">
			<?php echo CHtml::link('Connect with Linkedin', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn btn-lg btn-primary share-linkedin'));?></div>
			</div>
		</div>
	</div>
<!-- /.container --> 
</div>

<div id="bs-modal-lost-password" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bgcolor-teal border-radius">
				<button data-dismiss="modal" class="close mt5" type="button">×</button>
				<div style="font-size:16px;" class="pull-left ico-unlock-alt mr10 mt5"></div>
				<h4 class="semibold modal-title">Forgot Password</h4>
			</div>
		<?php $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
			<div class="alert alert-success hide mt15" id="repsoneRest" style="width:96%; margin:0 auto;">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<p id="messageResponse"><?php echo Yii::app()->user->getFlash('errorfPass'); ?></p>
			</div>
			<div id="resetpass" class="modal-body pb0">
				<div class="form-group mb0">
					<div class="row">
						<div class="col-sm-12 pa0">
							<label class="control-label col-md-12 mb10">Enter Your e-mail here <span class="text-danger">*</span></label>
							<div class="has-icon col-md-12 mb10">
								<?php echo $form->textField($forgot,'email',array('placeholder'=>'Email','class'=>'mb0 form-control','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email')); ?>
								<i class="ico-user2 form-control-icon"></i>
							</div>
						</div>
					</div>
				</div>                
			</div>
			<div class="modal-footer">
				<?php echo CHtml::button('Reset Password',array('name'=>'Submit','class'=>'mt0 btn btn-primary','id'=>'passButSat')); ?>
			</div>
			<?php $this->endWidget(); ?>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<script>
	$(document).ready(function(){
		$(":input").focusout(function(){
			$(this).parsley().validate();
		});
		$('#passButSat').on("click",function(){
			var elem	=	$('#forget-form-email');
			if(elem.val().length>0){
				if(testEmail(elem.val())){
					$('#passButSat').val('Please Wait');
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
								$('#passButSat').val('Reset Password');

							}
							else{
								elem.val('');
								$('#messageResponse').html(response.message);
								$('#repsoneRest').show();
								//$('#resetpass').addClass('hide');
								$('#repsoneRest').removeClass('hide');
								var ErrID	=	elem.attr('data-parsley-id')
								$('#parsley-id-satn-'+ErrID).html('');
								$('#passButSat').val('Reset Password');
								//$('#passButSat').hide();
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
<?php Yii::app()->clientScript->registerScript('myHideEffect','$(".alertMessage").animate({opacity: 1.0}, 3000).fadeOut("slow");',CClientScript::POS_READY);?>