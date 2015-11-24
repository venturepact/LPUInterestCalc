<?php
/* @var $this CalculatorBranchResultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calculator Branch Results',
);

$this->menu=array(
	array('label'=>'Create CalculatorBranchResult', 'url'=>array('create')),
	array('label'=>'Manage CalculatorBranchResult', 'url'=>array('admin')),
);
?>

<h1>Calculator Branch Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
