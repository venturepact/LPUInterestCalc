<?php
/* @var $this CalculatorOptionsWeightageController */
/* @var $model CalculatorOptionsWeightage */

$this->breadcrumbs=array(
	'Calculator Options Weightages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CalculatorOptionsWeightage', 'url'=>array('index')),
	array('label'=>'Create CalculatorOptionsWeightage', 'url'=>array('create')),
	array('label'=>'View CalculatorOptionsWeightage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CalculatorOptionsWeightage', 'url'=>array('admin')),
);
?>

<h1>Update CalculatorOptionsWeightage <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>