<?php
/* @var $this CalculatorBranchesController */
/* @var $model CalculatorBranches */

$this->breadcrumbs=array(
	'Calculator Branches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CalculatorBranches', 'url'=>array('index')),
	array('label'=>'Manage CalculatorBranches', 'url'=>array('admin')),
);
?>

<h1>Create CalculatorBranches</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>