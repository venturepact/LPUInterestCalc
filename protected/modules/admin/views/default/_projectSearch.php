<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
'enableAjaxValidation'=>false,
)); ?>

	<?php echo CHtml::label('Search Term', 'searchproject_input', array('class'=>'control-label')); ?>

	<?php echo CHtml::textField('query', isset($_REQUEST['query'])?$_REQUEST['query']:'', array ( 'class'=>'form-control', 'placeholder'=>'Search by project id, name, client name, supplier name to get a listing of projects', 'id'=>'searchproject_input', 'style'=>'height:45px;' )); ?>
	

<?php $this->endWidget(); ?><br/>