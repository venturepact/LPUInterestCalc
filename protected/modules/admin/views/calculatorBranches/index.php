<?php
/* @var $this CalculatorBranchesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calculator Branches',
);

$this->menu=array(
	array('label'=>'Create CalculatorBranches', 'url'=>array('create')),
	array('label'=>'Manage CalculatorBranches', 'url'=>array('admin')),
);
?>

<h1>Calculator Branches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
