<div class="col-md-12 col-sm-12 col-xs-12 mt50" id="">
	<!--<div class="col-md-12 text-center">
		<img src="<?php //echo Yii::app()->theme->baseUrl;?>/style/images/logo_big.png" alt="VenturePact" class="">
	</div>-->
	<div class="col-md-12 mt50 mb50"> 
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="col-md-12">
				<!-- Login form -->
				<div class="form-horizontal admin-form theme-primary np mt50">
					<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false,)); ?>
					<?php if(Yii::app()->user->hasFlash('success')):?>
						<div class="alert-box success"><span>success: </span><?php echo Yii::app()->user->getFlash('success'); ?></div>
					<?php endif; ?>
					<?php if(Yii::app()->user->hasFlash('error')):?>
						<div class="alert-box error"> <span>error: </span><?php echo Yii::app()->user->getFlash('error'); ?></div>
					<?php endif; ?>
					<div class="col-md-12">
						<h3 class="fs26 font_newlight team-text-blue mb20">Reset Password</h3>
						<div class="form-group mb10">
							<?php if(!empty($supplier) && $supplier->is_invited==1): ?>
							<div class="col-md-12">
								<?php echo $form->textField($user,'username',array('placeholder'=>"User Name",  'class'=>"gui-input bb0", 'disabled'=>'disabled')); ?>
								<?php echo $form->error($user,'username'); ?>
							</div>
							<?php endif; ?>
							<div class="col-md-12">
								<?php echo $form->passwordField($model,'new_password',array('placeholder'=>"New Password",  'class'=>"gui-input bb0")); ?>
								<?php echo $form->error($model,'new_password'); ?>
							</div>
							<div class="col-md-12">
								<?php echo $form->passwordField($model,'confirm_password',array('placeholder'=>"Confirm Password",  'class'=>"gui-input bb2")); ?>
								<?php echo $form->error($model,'confirm_password'); ?>
							</div>
							<div class="col-md-12">
								<?php echo CHtml::submitButton('Save',array('class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt20')); ?>
							</div>
						</div>
						<?php $this->endWidget(); ?>
					</div>
				</div>
				<!--/ Login form -->
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#reset-pswrd-height').height($( window ).height());
		$("body").addClass("scroll-height");
	});
</script>