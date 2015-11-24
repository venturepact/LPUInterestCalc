<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <h1>Delete Projects</h1>
        </div>
    </div>
</div>

<?php if(Yii::app()->user->hasFlash('successFlash')) { ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('successFlash'); ?>
</div>
<?php } ?>

<?php if(Yii::app()->user->hasFlash('failureFlash')) { ?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Failed!</strong> <?php echo Yii::app()->user->getFlash('failureFlash'); ?>
</div>
<?php } ?>

<div class="row">
    <div class="col-md-12 full-width">
        <!-- BOX -->
        <div class="box border custom-table">
        	<div class="box-title">
                <h4><i class="fa fa-table"></i>List of all Client Projects</h4>
            </div>
                                            

                    <div class="box-body">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'datatables1',
                        'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
                        'pagerCssClass'=>'box-body',
                        'template'=>'{items}{summary}{pager}',
                        'pager'=>array(
                            'header'=>'',
                            'firstPageLabel'=>'&laquo;',
                            'lastPageLabel'=>'&raquo;',
                            'prevPageLabel'=>'<',
                            'nextPageLabel'=>'>',
                            'hiddenPageCssClass'=>'disabled',
                            'selectedPageCssClass'=>'active',
                            'htmlOptions'=>array(
                                'class'=>'pagination',
                            ),
                        ),
        				'dataProvider'=>$model->projectSearch(),
        				'filter'=>$model,
        				'columns'=>array(
        					'id',
        					array(
                                'name'=>'name',
                                'type'=>'html',
                                'value'=>'CHtml::link($data->name, array("/admin/clientProjects/view", "id"=>$data->id))'
                            ),
        					array(
        					    'name'=>'client_name',
        					    'type'=>'html',
        						'value'=>'CHtml::link($data->clientProfiles->users->first_name, array("/admin/users/view", "id"=>$data->clientProfiles->users->id))',
        					),
        					array(
        					    'name'=>'min_budget',
        						'value'=>'(empty($data->min_budget))?"Not Provided":$data->min_budget',
        					),
        					array(
        					    'name'=>'max_budget',
        						'value'=>'(empty($data->max_budget))?"Not Provided":$data->max_budget',
        					),
        					array(
        					    'name'=>'start_date',
        						'value'=>'(empty($data->start_date))?"Not Provided":$data->start_date',
        					),
        					array(
        					    'name'=>'project_start_preference',
                                'filter'=>CHtml::activeDropDownList($model, 'project_start_preference',
                                    array('1'=>"Immediately",'2'=>'Next 30 Days', '3'=>'No Hurry'),
                                    array('empty'=>'Select Status',"")), 
                                'value'=>'($data->project_start_preference==1)?"Immediately":(($data->project_start_preference==2)?"Next 30 Days" :(($data->project_start_preference==3)? "No Hurry" : "Not Provided"))',
        					),
        					array(
        					    'name'=>'regions',
        						'value'=>array($this, 'getRegion'),
        					),
        					array(
        					    'name'=>'tier',
        					    'type'=>'raw',
        						'value'=>array($this, 'getTier'),
        					),
                            array(
                                'name'=>'add_date',
                                'value'=>'(empty($data->add_date))?"Not Provided":$data->add_date',
                            ),
        					array(
                    			'name'=>'status',
                    			'header'=>'Status', 
                    			'filter'=>CHtml::activeDropDownList($model, 'status',
                             		array('0'=>'Disabled','1'=>'Waiting Approval','2'=>'Introduction Sent', '3'=>'Active'),
                              		array('empty'=>'Select Status',"")), 
                    			'value'=>'($data->status==0)?"Disabled":(($data->status==1)?"Waiting Approval": (($data->status==2)?"Introduction Sent":"Active"))',            
                			),
                            array(
                                'name'=>'other_status',
                                'header'=>'Other Status', 
                                'filter'=>CHtml::activeDropDownList($model, 'other_status',
                                    array('0'=>'No/Request Granted','1'=>'Yes/Search more suppliers'),
                                    array('empty'=>'Select Status',"")),
                                'value'=>'($data->other_status==1)?"Yes/Search more suppliers":(($data->other_status==0) && (!is_null($data->other_status))?"No/Request Granted": "Not Provided")',            
                            ),
        					array(
        						'class'=>'CButtonColumn',
        						'header'=>'Operations',
                                'template'=>'{customDelete}',
        						'buttons'=>array(
                                    'customDelete'=>array(
                                        'label'=>'Delete',
                                        'visible'=>'true',
                                        'url'=>'Yii::app()->createUrl("admin/default/deleteProjectData", array("pid"=>$data->id))',
                                    ),
                               	),
        					),
        				),
        			)); ?>
                    </div>
                </div>
            <!-- /BOX -->
    </div>
</div>