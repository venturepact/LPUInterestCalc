<?php
/* @var $this CalculatorOptionsWeightageController */
/* @var $model CalculatorOptionsWeightage */

$this->breadcrumbs=array(
	'Calculator Options Weightages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CalculatorOptionsWeightage', 'url'=>array('index')),
	array('label'=>'Manage CalculatorOptionsWeightage', 'url'=>array('admin')),
);
?>

<h1>Create CalculatorOptionsWeightage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>