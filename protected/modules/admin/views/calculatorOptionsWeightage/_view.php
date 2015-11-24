<?php
/* @var $this CalculatorOptionsWeightageController */
/* @var $data CalculatorOptionsWeightage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calculator_options_id')); ?>:</b>
	<?php echo CHtml::encode($data->calculator_options_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calculator_branches_id')); ?>:</b>
	<?php echo CHtml::encode($data->calculator_branches_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weightage')); ?>:</b>
	<?php echo CHtml::encode($data->weightage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>