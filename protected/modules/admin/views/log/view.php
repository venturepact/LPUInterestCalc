<?php
/* @var $this LogController */
/* @var $model Log */

$this->breadcrumbs=array(
	'Logs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Log', 'url'=>array('index')),
	array('label'=>'Create Log', 'url'=>array('create')),
	array('label'=>'Update Log', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Log', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Log', 'url'=>array('admin')),
);
?>

<h1>View Log #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'proposal_id',
		'project_status',
		'is_checked',
		'title',
		'description',
		'add_date',
		'update_date',
		'status',
		'for_user',
		'notification',
		'is_read',
		'is_active',
		'login_id',
	),
)); ?>
