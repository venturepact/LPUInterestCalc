<?php
	$session	=	Yii::app()->session;
	$prefixLen	=	strlen(CCaptchaAction::SESSION_VAR_PREFIX);
	foreach ($session->keys as $key) {
		if (strncmp(CCaptchaAction::SESSION_VAR_PREFIX, $key, $prefixLen) == 0)
			$session->remove($key);
	}
?>
<div class="col-md-12 col-sm-12 col-xs-12 pa40 rs-np rs-mt80">
	<div class="container">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h1 class="fs42 text-center mt25 dark-blue-new font_newregular">Get In Touch</h1>
			<div class="col-md-12">
				<div class="col-md-2"></div>
				<p class="fs26 lh32 font_newlight h-black bt bb pt30 pb30 col-md-8 text-center"> 
					We are located in New York and Philadelphia
				</p>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-4 col-sm-12 col-xs-12 np mt30 rs-mt0">
				<div class="col-md-12 np mb15">
					<h3 class="font_newregular fs18">VenturePact, LLC.</h3>
					<span class="col-md-12 np mb5">79 Madison Ave,</span>
					<span class="col-md-12 np mb5">NY 10016</span>
					<span class="col-md-12 np mb5 fs14">P: 949-791-7659 </span>
					<span class="col-md-12 np mb5 fs14">E: <a class="orange-new" href="questions@venturepact.com">questions@venturepact.com</a></span>
				</div>
				<div class="col-md-12 np mb15">
					<h3 class="font_newregular fs18">VenturePact, LLC.</h3>
					<span class="col-md-12 np mb5 lh20">The Franklin Building<br>834 Chestnut Street,<br>Philadelphia, PA 19107 </span>
					<span class="col-md-12 np mb5 fs14">P: 949-791-7659 </span>
					<span class="col-md-12 np mb5 fs14">E: <a class="orange-new" href="questions@venturepact.com">questions@venturepact.com</a></span>
				</div>
			</div>
			<div class="col-md-7 col-md-offset-1 mt50 col-sm-12 col-xs-12 np form-horizontal admin-form theme-primary rs-pb30 rs-mt25">
				<div class="col-md-12">
					<?php if(Yii::app()->user->hasFlash('error')):?>
						<div class="alert alert-dismissable alert-danger1 alertMessage">
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
					<?php $form=$this->beginWidget('CActiveForm', array('id'=>'contact-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('data-parsley-validate'=>'data-parsley-validate','class'=>"forms"))); ?>
					<?php echo $form->errorSummary($contact); ?>
						<?php echo $form->textField($contact,'name',array('data-parsley-required-message'=>'Name is required','placeholder'=>'Name (Required)','data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>"gui-input bb2 mb15 required",'title'=>"Name (Required)")); ?>
						<?php echo $form->textField($contact,'email',array('data-parsley-required-message'=>'Email is required','placeholder'=>'Email (Required)','data-parsley-type'=>"email",'class'=>"gui-input bb2 mb15 required",'title'=>"Email (Required)")); ?>
						<?php echo $form->textField($contact,'subject',array('data-parsley-required-message'=>'Subject is required','placeholder'=>'Subject (Required)','class'=>"gui-input bb2 mb15 required",'title'=>"Subject (Required)")); ?>
						<?php echo $form->textArea($contact,'body',array('data-parsley-required-message'=>'Message is required','placeholder'=>'Message (Required)','class'=>"gui-textarea bb2 mb15 required")); ?>
						<?php if(CCaptcha::checkRequirements()): ?>
							<span class="hint">Please enter the letters as they are shown in the image below.
							<br/>Letters are not case-sensitive.</span><br/>
							<?php $this->widget('CCaptcha'); ?>
							<?php echo $form->textField($contact,'verifyCode',array('data-parsley-required-message'=>'Captcha is required','placeholder'=>'Captcha (Required)',"class"=>"gui-input bb2 mt5 mb15 required")); ?>
							<?php echo $form->error($contact,'verifyCode'); ?>
					<?php endif; ?>
					<?php echo CHtml::submitButton('Submit',array('class'=>"btn tab-btn-orange fs14 pull-left font_newregular mt25")); ?>
					<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">	
			<div class="border-horizontal"></div>
		</div>
	</div>
</div>
<?php include 'modal.php'; ?>