<?php
/* @var $this CalculatorBranchResultController */
/* @var $model CalculatorBranchResult */

$this->breadcrumbs=array(
	'Calculator Branch Results'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CalculatorBranchResult', 'url'=>array('index')),
	array('label'=>'Create CalculatorBranchResult', 'url'=>array('create')),
	array('label'=>'View CalculatorBranchResult', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CalculatorBranchResult', 'url'=>array('admin')),
);
?>

<h1>Update CalculatorBranchResult <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>