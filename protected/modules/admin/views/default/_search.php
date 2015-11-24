<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */
/* @var $form CActiveForm */
?>
<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
'enableAjaxValidation'=>false,
)); ?>

<div class="row">
		<div class="col-md-12">
			<div class="box border inverse mb0">
				<div class="box-title">
					<h4><i class="fa fa-search"></i>Advanced Search</h4>
					<div class="tools hidden-xs">
						<a href="javascript:;" class="expand">
							<i class="fa fa-chevron-down"></i>
						</a>
					</div>
				</div>
				<div class="box-body big" style="display:none;">
				<?php echo $form->errorSummary($model); ?>


				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'name', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'name',array('size'=>52,'maxlength'=>100,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'client_name', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'client_name',array('size'=>52,'maxlength'=>100,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'client_company_name', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'client_company_name',array('size'=>52,'maxlength'=>100,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'suppliers_name', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'suppliers_name',array('size'=>52,'maxlength'=>100,'class'=>'form-control')); ?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->label($model,'start_date', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-2">
						<?php 
							echo CHtml::dropDownList("Operators['start_date']","",array(
							    	'>'=>'>',
							    	'<'=>'<',
							    	'='=>'=',
							    	'<='=>'<=',
							    	'>='=>'>=',
							    	'<>'=>'<>',
							    ),
								array('empty'=>'Operators', 'class'=>'form-control', 'id'=>'start_date_op')
							);
						?>
					</div>
					<div class="col-sm-4 col-offset-sm-2">
						<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'start_date',
								'htmlOptions' => array(
								    'dateFormat' => 'yy-mm-dd',
									'size' => '52',         // textField size
									'maxlength' => '100' ,
									'class'=>'form-control',   // textField maxlength
								),
								'options' => array(
									'dateFormat'=>'yy-mm-dd',
									'changeMonth'=>true,
        							'changeYear'=>true,
								),
							));
						?>

						<?php echo $form->error($model,'start_date'); ?>
					</div>			
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->label($model,'add_date', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-2">
						<?php 
							echo CHtml::dropDownList("Operators['add_date']","",array(
							    	'>'=>'>',
							    	'<'=>'<',
							    	'='=>'=',
							    	'<='=>'<=',
							    	'>='=>'>=',
							    	'<>'=>'<>',
							    ),
								array('empty'=>'Operators', 'class'=>'form-control', 'id'=>'add_date_op')
							);
						?>
					</div>
					<div class="col-sm-4 col-offset-sm-2">
						<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'add_date',
								'htmlOptions' => array(
									'size' => '52',         // textField size
									'maxlength' => '100', 
									'class'=>'form-control',   // textField maxlength
								),
								'options' => array(
									'dateFormat'=>'yy-mm-dd',
									'changeMonth'=>true,
        							'changeYear'=>true,
								),
							));
						?>

						<?php echo $form->error($model,'add_date'); ?>
										
					</div>
				</div>
			
				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->label($model,'modify_date', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-2">
						<?php 
							echo CHtml::dropDownList("Operators['modify_date']","",array(
							    	'>'=>'>',
							    	'<'=>'<',
							    	'='=>'=',
							    	'<='=>'<=',
							    	'>='=>'>=',
							    	'<>'=>'<>',
							    ),
								array('empty'=>'Operators', 'class'=>'form-control', 'id'=>'modify_date_op')
							);
						?>
					</div>
					<div class="col-sm-4 col-offset-sm-2">
						<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'modify_date',
								'htmlOptions' => array(
									'size' => '52',         // textField size
									'maxlength' => '100', 
									'class'=>'form-control',   // textField maxlength
								),
								'options' => array(
									'dateFormat'=>'yy-mm-dd',
									'changeMonth'=>true,
        							'changeYear'=>true,
								),
							));
						?>

						<?php echo $form->error($model,'modify_date'); ?>
										
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->label($model,'status', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					    <?php 
							echo CHtml::activeDropDownList($model, 'status', array(
								    '1'=>'Awaiting Approval','2'=>'Introductions Sent'
								), array(
									'empty'=>'Select Status',
									"",
									'class'=>'form-control'
								)
							);
						?>
					</div>
				</div>
	
	            <div class="row">
	            	<div class="col-sm-4 tr-align"></div>
	            	<div class="col-sm-6 col-offset-sm-2 btn-box">
						<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
</div>
</div><!-- search-form -->