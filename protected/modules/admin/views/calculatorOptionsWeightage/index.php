<?php
/* @var $this CalculatorOptionsWeightageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calculator Options Weightages',
);

$this->menu=array(
	array('label'=>'Create CalculatorOptionsWeightage', 'url'=>array('create')),
	array('label'=>'Manage CalculatorOptionsWeightage', 'url'=>array('admin')),
);
?>

<h1>Calculator Options Weightages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
