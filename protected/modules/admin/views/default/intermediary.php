<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */

$status = array(
    '1' => 'Awaiting Approval',
    '2' => 'Introduction Sent'
);

$this->breadcrumbs=array(
    'Client Projects'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List ClientProjects', 'url'=>array('index')),
    array('label'=>'Create ClientProjects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    // start date operator
    var start_date = $('#ClientProjects_start_date').val()
    if(start_date.length > 10) start_date = start_date.substring(start_date.length - 10);
    var start_date_op = $('#start_date_op').val();
    $('#ClientProjects_start_date').val(start_date_op + start_date);
    // modify date operator
    var modify_date = $('#ClientProjects_modify_date').val()
    if(modify_date.length > 10) modify_date = modify_date.substring(modify_date.length - 10);
    var modify_date_op = $('#modify_date_op').val();
    $('#ClientProjects_modify_date').val(modify_date_op + modify_date);
    // add date operator
    var add_date = $('#ClientProjects_add_date').val()
    if(add_date.length > 10) add_date = add_date.substring(add_date.length - 10);
    var add_date_op = $('#add_date_op').val();
    $('#ClientProjects_add_date').val(add_date_op + add_date);
    // ajax update
    $('#datatables1').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");

?>



<!-- Modal -->
<div class="modal fade" id="approve_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- AJAX Loader -->
            <div class="ajax-loader loader-hidden"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/img/loaders/12.gif"></div>
            
            <div id="approve-data-ajax"></div>
        </div>
    </div>
</div>

<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <h1>Intermediary Leads</h1>
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

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form" >
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div>
<!-- search-form -->

<div class="row">
    <div class="col-md-12 full-width">
        <!-- BOX -->
        <div class="box border custom-table">

            <div class="box-title">
                <h4><i class="fa fa-table"></i>List of all Intermediary Leads</h4>
            </div>
                                    

            <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'datatables1',
                'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
                'dataProvider'=>$model->intermediarySearch(),
                'filter'=>$model,
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
                'columns'=>array(
                    array(
                        'name'=>'name',
                        'type'=>'html',
                        'value'=>'CHtml::link($data->name, array("/admin/suppliersProjects/introduction", "pid"=>base64_encode($data->id)))',
                    ),
                    array(
                        'name'=>'client_company_name',
                        'type'=>'html',
                        'value'=>'CHtml::link($data->clientProfiles->users->company_name, array("/admin/users/view", "id"=>$data->clientProfiles->users->id, "view"=>"client"))',
                    ),
                    array(
                        'name'=>'client_name',
                        'type'=>'html',
                        'value'=>'CHtml::link($data->clientProfiles->users->first_name, array("/admin/users/view", "id"=>$data->clientProfiles->users->id, "view"=>"client"))',
                    ),
                    array(
                        'name'=>'start_date',
                        'value'=>'(empty($data->start_date))?"Not Provided":$data->start_date',
                    ),
                    array(
                        'name'=>'suppliers_name',
                        'type'=>'html',
                        'value'=>'$data->getSuppliers($data)',
                    ),
                    array(
                        'name'=>'add_date',
                        'value'=>'(empty($data->add_date))?"Not Provided":$data->add_date',
                    ),
                    // array(
                    //     'name'=>'modify_date',
                    //     'value'=>'(empty($data->modify_date)) ? "Not Provided" : $data->modify_date',
                    // ),
                    array(
                        'name'=>'status',
                        'header'=>'Status', 
                        'filter'=>false, 
                        'value'=>'($data->status<=1)?"Awaiting Approval":"Introductions Sent"',            
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
                        'name'=>'call_time_zone',
                        'value'=>'!empty($data->call_available_time)?$data->call_time_zone:"None"',
                    ),
                    array(
                        'name'=>'call_available_time',
                        'type'=>'html',
                        'value'=>'$data->getTime($data)',
                    ),
                    array(
                        'name'=>'lead_owner',
                        'value'=>'!empty($data->clientProfiles->manager->first_name)? $data->clientProfiles->manager->first_name : "None"',
                    ),
                    array(
                        'name'=>'mobile',
                    ),
                    array(
                        'name'=>'tag',
                        'type'=>'raw',
                        'value'=>'$data->getTags($data)',
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'header'=>'Approve',
                        'template'=>'{approve}{done}',
                        'buttons'=>array(
                            'approve'=>array(
                                'label'=>'APPROVED',
                                'url'=>'Yii::app()->createUrl("#")',
                                'visible'=>'($data->status<=1)?true:false',
                                // 'click'=>'function(e) {
                                //     return false;
                                // }',
                            ),
                            'done'=>array(
                                'label'=>'CHANGE APPROVAL',
                                'url'=>'Yii::app()->createUrl("/admin/default/getApproveView", array("id"=>$data->id, "type"=>"approved"))',
                                'options'=>array(
                                    'data-toggle'=>'modal',
                                    'data-target'=>'#approve_modal',
                                    // 'live'  => false,
                                    'class' => uniqid(),
                                    'ajax' => array(
                                        'type' => 'get',
                                        'url'=>'js:$(this).attr("href")',
                                        'beforeSend' => 'js:function(data)
                                        {
                                            $("#approve_modal").modal("show");
                                            $("#approve-data-ajax").empty();
                                            $(".ajax-loader").show();
                                        }',
                                        'success' => 'js:function(data)
                                        {
                                            $(".ajax-loader").hide();
                                            $("#approve-data-ajax").html(data);
                                        }'
                                    ),
                                ),
                                'visible'=>'($data->status<=1)?false:true',
                            ),
                        ),
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'header'=>'Search',
                        //'template'=>'{search}{no-search}',
                        'template'=>'{search}',
                        'buttons'=>array(
                            'search'=>array(
                                'label'=>'SEARCH SUPPLIERS',
                                //'visible'=>'($data->other_status==1)?true:false',
                                'url'=>'Yii::app()->createUrl("admin/clientProjects/searchSuppliers",array("pid"=>$data->id))',
                            )
                            ,
                            // 'no-search'=>array(
                            //     'label'=>'Not Requested',
                            //     'visible'=>'($data->other_status==0)?true:false',
                            //     'click'=>'function(e) {
                            //         return false;
                            //     }',
                            // ),
                        ),
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'header'=>'Chat',
                        'template'=>'{chat}{no-chat}',
                        'buttons'=>array(
                            'chat'=>array(
                                'label'=>'CHAT GROUPS',
                                'visible'=>'($data->getSuppliers($data) != "None")?true:false',
                                'url'=>'Yii::app()->createUrl("/admin/suppliersProjects/introduction",array("pid"=>base64_encode($data->id)))',
                            ),
                            'no-chat'=>array(
                                'label'=>'NO GROUPS',
                                'visible'=>'($data->getSuppliers($data) == "None")?true:false',
                                'click'=>'function(e) {
                                    return false;
                                }',
                            ),
                        ),
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'header'=>'Options',
                        'template'=>'{deactivate}{activate}',
                        'buttons'=>array(
                            'deactivate'=>array(
                                'label'=>'DEACTIVATE',
                                'visible'=>'($data->is_deleted)?false:true',
                                'url'=>'Yii::app()->createUrl("admin/default/projectDelete",array("pid"=>$data->id, "action"=>"1"))',
                            ),
                            'activate'=>array(
                                'label'=>'ACTIVATE',
                                'visible'=>'($data->is_deleted)?true:false',
                                'url'=>'Yii::app()->createUrl("admin/default/projectDelete",array("pid"=>$data->id, "action"=>"2"))',
                            )
                        ),
                    ),
                ),
            )); ?>
            </div>
        </div>
    <!-- /BOX -->
    </div>
</div>