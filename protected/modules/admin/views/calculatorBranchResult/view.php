<?php
/* @var $this CalculatorBranchResultController */
/* @var $model CalculatorBranchResult */

$this->breadcrumbs=array(
	'Calculator Branch Results'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CalculatorBranchResult', 'url'=>array('index')),
	array('label'=>'Create CalculatorBranchResult', 'url'=>array('create')),
	array('label'=>'Update CalculatorBranchResult', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CalculatorBranchResult', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CalculatorBranchResult', 'url'=>array('admin')),
);
?>

<h1>View CalculatorBranchResult #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_id',
		'calculator_branches_id',
		'status',
		'created',
		'modified',
	),
)); ?>
