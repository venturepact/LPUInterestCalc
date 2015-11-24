<?php
/* @var $this CalculatorOptionsWeightageController */
/* @var $model CalculatorOptionsWeightage */

$this->breadcrumbs=array(
	'Calculator Options Weightages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CalculatorOptionsWeightage', 'url'=>array('index')),
	array('label'=>'Create CalculatorOptionsWeightage', 'url'=>array('create')),
	array('label'=>'Update CalculatorOptionsWeightage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CalculatorOptionsWeightage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CalculatorOptionsWeightage', 'url'=>array('admin')),
);
?>

<h1>View CalculatorOptionsWeightage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'calculator_options_id',
		'calculator_branches_id',
		'status',
		'weightage',
		'created',
		'modified',
	),
)); ?>
