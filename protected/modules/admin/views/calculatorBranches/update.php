<?php
/* @var $this CalculatorBranchesController */
/* @var $model CalculatorBranches */

$this->breadcrumbs=array(
	'Calculator Branches'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CalculatorBranches', 'url'=>array('index')),
	array('label'=>'Create CalculatorBranches', 'url'=>array('create')),
	array('label'=>'View CalculatorBranches', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CalculatorBranches', 'url'=>array('admin')),
);
?>

<h1>Update CalculatorBranches <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>