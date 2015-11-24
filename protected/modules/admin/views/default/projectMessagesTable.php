<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <h1><?php echo strtolower($this->action->id) == 'managerprojectmessagestable' ? 'Manager ' : 'All '; ?>Project Messages</h1>
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

<div class="alert alert-dismissible" role="alert" style="display:none;">
  <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
  <span id="alert_message" ></span>
</div>



<div class="row">
    <div class="col-md-12 full-width">
        <!-- BOX -->
        <div class="box border custom-table">

            <div class="box-title">
                <h4><i class="fa fa-table"></i>List of all Project Messages</h4>
            </div>
                                    

            <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'datatables1',
                'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
                'dataProvider'=> strtolower($this->action->id) == 'projectmessagestable' ? $model->projectRoomSearch() : $model->managerProjectRoomSearch(),
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
                        'value'=>'!empty($data->name) ? CHtml::link($data->name, array("/admin/suppliersProjects/introduction", "pid"=>base64_encode($data->id))) : "-"',
                    ),
                    array(
                    	'name'=>'client_name',
                    	'type'=>'html',
                        'value'=>'$data->clientProfiles->users->first_name',
                    ),
                    array(
                    	'name'=>'client_company_name',
                    	'type'=>'html',
                        'value'=>'!empty($data->clientProfiles->users->company_name) ? $data->clientProfiles->users->company_name : "-"',
                    ),
                    array(
                    	'name'=>'suppliers_name',
                    	'type'=>'raw',
                        'value'=>'$data->getSuppliers($data, "chat_link")',
                    ),
                    array(
                    	'name'=>'account_manager',
                    	'value'=>'$data->clientProfiles->manager->first_name',
                    ),
                    // array(
                    //     'name'=>'unread_messages',
                    //     'filter'=>false,
                    //     'value'=>'$data->suppliersProjects->admin_message_count',
                    // ),
                    array(
                        'class'=>'CButtonColumn',
                        'header'=>'Chat',
                        'template'=>'{chat}{no-chat}',
                        'buttons'=>array(
                            'chat'=>array(
                                'label'=>'CHAT&nbsp;GROUPS',
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
            	)
			)); ?>
            </div>
        </div>
    <!-- /BOX -->
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.btn-hidden-send').on('click', function() {
        var elem = $(this).closest('tr').next('.hidden-row').find('.hidden-send');
        elem.toggleClass('hide');
        if(!elem.hasClass('hide'))
            $(this).find('.btn-send-title').text('Close');
        else
            $(this).find('.btn-send-title').text('Write');

    });

    $('.send-msg').on('click', function(e) {
        var sid = $(this).data('sid');
        var dsid = $(this).data('dsid');
        var from = $(this).data('from');
        var room = $(this).data('room');
        var username = $(this).data('username');
        var txt = $('#msg-chat-'+dsid).val();

        // send message
        var data = {
            'user':sid,
            'from':from,
            'room':room,
            'msg':txt,
            'username':username
        };

        sendMessageNonChatPage(data);

        // hide the div
        $(this).closest('.hidden-row').prev('tr').find('.btn-hidden-send').click();

        $("#alert_message").html("<strong>Success!</strong> The message was successfully sent.");
        $("#alert_message").parent().addClass("alert-success");
        $("#alert_message").parent().removeClass("alert-danger");
        $("#alert_message").parent().fadeIn("slow");
        setTimeout(function(){ $("#alert_message").parent().fadeOut("slow"); },5000);
    });
});

function sm(data){
    $.ajax({
        url:"<?php echo Yii::app()->createUrl('/supplier/sm');?>",
        data: data,
        dataType:'json',
        type:'post',
        success:function(data){
            console.log(data);
        },
        error:function(){

        }
    });
}
</script>