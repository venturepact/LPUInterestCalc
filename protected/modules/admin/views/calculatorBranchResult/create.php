<?php
/* @var $this CalculatorBranchResultController */
/* @var $model CalculatorBranchResult */

$this->breadcrumbs=array(
	'Calculator Branch Results'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CalculatorBranchResult', 'url'=>array('index')),
	array('label'=>'Manage CalculatorBranchResult', 'url'=>array('admin')),
);
?>

<h1>Create CalculatorBranchResult</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>