<?php
/* @var $this CalculatorBranchesController */
/* @var $model CalculatorBranches */

$this->breadcrumbs=array(
	'Calculator Branches'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CalculatorBranches', 'url'=>array('index')),
	array('label'=>'Create CalculatorBranches', 'url'=>array('create')),
	array('label'=>'Update CalculatorBranches', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CalculatorBranches', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CalculatorBranches', 'url'=>array('admin')),
);
?>

<h1>View CalculatorBranches #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'created',
		'modified',
		'status',
	),
)); ?>
