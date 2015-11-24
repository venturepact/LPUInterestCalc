<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */

$status = array(
    '1' => 'Innovation user',
    '2' => 'Approved'
);


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
            <h1>
            <div class="col-md-9">Innovation Users</div>
            <div class="col-md-3">
            <?php echo CHtml::link('Invite User for Innovation Index', array('/admin/users/inInviteUsers/'), array('class'=>'btn btn-info vpblue')); ?>
          </div>
          </h1>
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
<?php $this->renderPartial('_invitesSearch',array(
    'model'=>$model,
)); ?>
</div>
<!-- search-form -->


<div class="row">
    <div class="col-md-12 full-width">
        <!-- BOX -->
        <div class="box border custom-table">

            <div class="box-title">
                <h4><i class="fa fa-table"></i>List of all Innovation Users</h4>
            </div>
                                    

            <div class="box-body">
            <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'datatables1',
                    'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
                    'dataProvider'=>$model->invitesSearch(),
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
                        array('name'=>'id','htmlOptions'=>array('class'=>'center')),
                        'first_name',
                         
                        array(
                            'name'=>'username',
                            'header'=>'Username',
                            'type'=>'raw',
                            'value'=>array($this,'assignLinks')
                        ),
                        array('name'=>'role_id',
                            'header'=>'Role', 
                            'filter'=>CHtml::activeDropDownList($model, 'role_id',
                             array('1'=>'Admin','2'=>'Client','3'=>'Supplier','4'=>'User Manager'),
                            array('empty'=>'Select Roles',"")), 
                            'value'=>'ucfirst($data->roles->name)'
                        ),
                        array(
                            'name'=>'is_in_invited',
                            'header'=>'Invite Status', 
                            'filter'=>CHtml::activeDropDownList($model, 'is_in_invited',
                             array('1'=>"Invited", '2'=>"Approved"),
                            array('empty'=>'Select Status',"")), 
                            'value'=>'($data->is_in_invited==1)?"Invited":"Approved"',            
                            // 'value'=>'$data->is_in_invited',            
                        ),
                        array(
                            'name'=>'status',
                            'header'=>'Status', 
                            'filter'=>CHtml::activeDropDownList($model, 'status',
                             array('1'=>"Activated",'0'=>'Deactivated'),
                            array('empty'=>'Select Status',"")), 
                            'value'=>'($data->status==1)?"Activated":"Deactivated"',            
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'header'=>'Operations',
                            'template'=>'{update}{view}{chat}{add innovation}',
                            'buttons'=>array(
                                'update'=>array(
                                    'visible'=>'true',
                                    'url'=>'Yii::app()->createUrl("/admin/users/update", array("id"=>$data->id))',
                                ),
                                'view'=>array(
                                    'visible'=>'true',
                                    'url'=>'Yii::app()->createUrl("/admin/users/view", array("id"=>$data->id))',
                                ),
                                'delete'=>array(
                                    'visible'=>'false',
                                ),
                                'chat'=>array(
                                    'label'=>'Chat',
                                    'imageUrl'=> Yii::app()->theme->baseUrl . "/adminPanel/img/chat-icon.png",
                                    'url'=>'Yii::app()->createUrl("/admin/users/initChat", array("uid"=>$data->id))',
                                ),
                                'add innovation'=>array(
                                    'label'=>'Add Innovation',
                                    'imageUrl'=> Yii::app()->theme->baseUrl . "/adminPanel/img/in2admin2.png",
                                    'url'=>'Yii::app()->createUrl("/admin/InUsersHasPosts/create", array("uid"=>$data->id))',
                                ),
                            )
                        )
                )
            ));  
?>
            </div>
        </div>
    <!-- /BOX -->
    </div>
</div>