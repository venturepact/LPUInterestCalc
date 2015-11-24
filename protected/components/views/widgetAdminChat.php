<!-- Chat window starts here  -->
<style type="text/css">
    .img45
    {
        height: 34px;
        width: 34px;    
    }
    .img75
    {
        height: 75px;
        width: 75px;
    }
</style>

<!-- begin: .tray-center -->
<div class="tray tray-center va-t posr pl0 pr0 pt0 new-modal-bg layout-left">
    <!-- Conversation for Propsal# -->
    <?php //echo $project->clientProjects->name; ?>

    <div class="admin-panels mn pn ui-sortable pl20 pr20 pt25" data-animate="fadeIn">

        <div class="row" id="chat-window" data-room="<?php echo base64_encode($room); ?>" data-user="<?php echo base64_encode($roomUser->id); ?>" >
            <input type="hidden" name="client" value="0" />
            <input type="hidden" name="supplier" value="0" />
            <input type="hidden" name="admin" value="0" />
            <input type="hidden" name="floating" value="1" />

            <div class="col-sm-12">
                <!-- Add user widget -->
                <div class="col-md-10 pull-left">
                    <div class="col-md-8" id="user_container">
                        <div class="dummy_user hide">
                         <a href="javascript:void(0)" class="posr mr5  ">
                            <img  src="<?php echo $this->res['avtar'];?>" class="img-circle border_grey img45" alt=" " title="" />
                            <span id="o_stat_" class="tab-notification offline-dot"></span>
                        </a>
                    </div>
                    <?php
                    $otherUser = null;
                    foreach ($allusers as $key => $user) {
                        if($user->users->role_id != 1) {
                            $userimg = $user->users->image;
                            $otherUser = $user;
                            ?>
                            <a href="<?php echo Yii::app()->createUrl('/admin/users/view', array('id'=>$user->users->id)); ?>" class="posr mr5">
                                <img  src="<?php echo (empty($userimg)?$this->res['avtar'] :$userimg);?>" class="img-circle img45 offline-dot1" id="o_stat_<?php echo $user->users_id; ?>" alt="<?php echo $user->users->first_name; ?> " title="<?php echo $user->users->first_name; ?> " />
                            </a>
                            <?php 
                        }
                    }
                    foreach ($allusers as $key => $user) {
                        if(!empty($otherUser->users->clientProfiles) && $user->users->role_id == 1) {
                            $manager = $otherUser->users->clientProfiles[0]->manager;
                            $userimg = $manager->image;
                            if(empty($userimg)) $userimg = $this->res['avtar'];
                            ?>
                            <a href="javascript:void(0)" class="posr mr5 cursor_default">
                                <img  src="<?php echo $userimg; ?>" class="img-circle img45 offline-dot1" id="o_stat_<?php echo $user->users_id; ?>" alt="<?php echo $manager->first_name; ?> " title="<?php echo $manager->first_name; ?> " />
                            </a>
                            <?php 
                        }
                    } ?>

                    </div>
                    <!-- <div class="col-md-1 pull-right ">
                        <a href="javascript:void(0)"  data-toggle="modal" data-target="#add_user"><span class="tab-circle-grey ml20 text-center"><span class="icon-user-follow text_white fs18" aria-hidden="true"></span></span></a>
                    </div> -->
                </div>

                <div class="col-md-2">
                    <small class="pull-right"><i> <div id="txtChatStatusWindow"></div></i></small>
                </div>

                <!-- CHAT -->
                <div class="row">
                    <div class="col-md-12 full-width">
                        <!-- BOX -->
                        <div class="box border custom-table chat-window">
                            
                            <div class="box-body big border">
                                <div class="scroller" data-height="350px" data-always-visible="1" data-rail-visible="1">
                                    <ul class="media-list chat-list" id="chattingscrollWindow" class="scrollThis" data-type="window">
                                        <?php foreach($chatData as $chat ){ 
                                            $userimage = !empty($chat->chatMessageHasUser->users->image)?$chat->chatMessageHasUser->users->image:$this->res['avtar'];
                                            $fp = false;
                                            if(preg_match('/www.filepicker.io/', $userimage)) $fp = true;
                                            if($fp) $userimage = $userimage . "/convert?w=24&h=24&fit=crop";
                                            
                                            if($chat->chatMessageHasUser->users->role_id != 1) {
                                                ?>
                                                    <li class="media">
                                                      <a class="pull-left" href="#">
                                                        <img width="24px" height="24px" class="media-object" alt="Generic placeholder image" src="<?php echo $userimage; ?>">
                                                      </a>
                                                      <div class="media-body chat-pop">
                                                        <h4 class="media-heading"><?php echo $chat->chatMessageHasUser->users->first_name; ?> <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="time" data-last="<?php echo $chat->add_date; ?>" ><?php echo $chat->add_date; ?></abbr> </span></h4>
                                                        <p><?php echo $chat->message; ?></p>
                                                      </div>
                                                    </li>
                                                <?php
                                            } else {
                                                ?>
                                                    <li class="media">
                                                      <a class="pull-right" href="#">
                                                        <!-- <img width="24px" height="24px" class="media-object" alt="Generic placeholder image" src="<?php //echo $userimage; ?>"> -->
                                                      </a>
                                                      <div class="pull-right media-body chat-pop mod">
                                                        <h4 class="media-heading">You <span class="pull-left"><i class="fa fa-clock-o"></i> <abbr class="time" data-last="<?php echo $chat->add_date; ?>" ><?php echo $chat->add_date; ?></abbr> </span></h4>
                                                        <p><?php echo $chat->message; ?></p>
                                                      </div>
                                                    </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="divide-20"></div>
                                <div class="chat-form">
                                    <div class="input-group"> 
                                        <input id="txtChatWindow" type="text" class="form-control"> 
                                        <span class="input-group-btn"> <button id="btnChatWindow" class="btn btn-primary" type="button"><i class="fa fa-check"></i></button> </span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /BOX -->
                    </div>
                </div>
                <!-- /CHAT -->

                <?php $chatTemplates=ChatTemplate::model()->findAllByAttributes(array('status'=>1)); ?>
                <script type="text/javascript">
                    var username = "<?php echo $roomUser->users->first_name; ?>";
                    var templates = <?php echo CJSON::encode($chatTemplates); ?>;
                    var url = "<?php echo (empty($roomUser->users->image)?$this->res['avtar']:$roomUser->users->image); ?>";

                </script>
               <!-- <script type="text/javascript" src="<?php //echo Yii::app()->theme->baseUrl; ?>/javascript/notification.js"></script> -->

                <script type="text/javascript">
                    $(document).ready(function(){
                     $('.attach_chat').click(function() {
                        filepicker.setKey("<?php echo $this->filpickerKey; ?>");
                        filepicker.pick({
                            mimetypes: ['image/*'],
                            //container : 'window'
                        },
                        function(InkBlob) {
                            console.log(InkBlob);
                            
                            var anchor = '<a class="orange-new fs14" href="'+InkBlob.url+'" target="_blank" > <span aria-hidden="true" class="icon-paper-clip fs16"></span>'+InkBlob.filename+'</a>';
                            sendMessage(anchor);
                        },
                        function(FPError) {
                            //alert("Error Uploading Files : " + FPError.toString());
                            console.log(FPError.toString());
                        }
                        );
                    });


                     $('#btnAddUser').on("click",function(){
                        var addUserForm  = $('#addUserForm');
                        var modalPopup = $("#add_user");
                        var data = addUserForm.serialize();
                        $('#btnAddUser').val('Please Wait');

                        $.ajax({
                            type: 'POST',
                            url:"<?php echo Yii::app()->createUrl('/supplier/addChildUser');?>",
                            data:data,
                            success :function(data){
                                var response = JSON.parse(data);
                                if(response.hasOwnProperty('error')){
                                    modalPopup.find('.repsoneRest').removeClass('alert-success');
                                    modalPopup.find('.repsoneRest').addClass('alert-danger');
                                    modalPopup.find('.repsoneRest').show();
                                    modalPopup.find('.repsoneRest').addClass('hide');
                                    modalPopup.find('.repsoneRest').removeClass('hide');                    
                                    modalPopup.find('.messageResponse').html(response.error);                    
                                    $('#btnAddUser').val('Done');
                                }
                                else{
                                    modalPopup.find('.repsoneRest').show();
                                    modalPopup.find('.repsoneRest').removeClass('alert-danger').addClass('alert-success');
                                    modalPopup.find('.repsoneRest').addClass('hide').removeClass('hide');

                                    modalPopup.find('.messageResponse').html(response.success);
                                    $('#btnAddUser').val('Done');
                                    addUserForm.trigger("reset");
                                    addUserForm.find('#profile_img1').attr('src','<?php echo Yii::app()->theme->baseUrl."/images/add_icon.png"; ?>');
                                    addUserForm.find('#uid').val('');
                                    addUserForm.find('#profilePicUser1').val("");
                                    var newuser = $($('.dummy_user').html());
                                    var anchorid = newuser.find('span').attr('id');
                                    newuser.find('span').attr('id',anchorid+response.id);
                                    newuser.find('img').attr('title',response.first_name);
                                    newuser.find('img').attr('alt',response.first_name);
                                    $("#user_container").append(newuser)
                                    changeClearSelect();                    
                                    $('#add_user').modal('toggle');
                                }
                            }
                        });
});


});
function changeClearSelect(){
    $("button.selectpicker[type=button]").find("span:first").html('Select Role');
    $('ul.dropdown-menu').find('li').each(function(){
        var value = $(this).attr('data-original-index');
        if(value == 0)
            $(this).addClass('selected');
        else
            $(this).removeClass('selected');
    });
}
function sm(data){
    $.ajax({
        url:"<?php echo Yii::app()->createUrl('/supplier/sma');?>",
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

<!-- Modal Add Member -->
<div class="modal fade " id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content col-md-12 np">
            <div class="modal-header pa20 add_member_p_head">
                <h2 class="modal-title fs24 text-center " id="myModalLabel"> Add User </h2>
            </div>
            <div class="modal-body col-md-12 np">
                <div class="alert alert-success hide mt15 repsoneRest"  style="width:96%; margin:0 auto;">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <p class="messageResponse"></p>
                </div>
                <?php $form=$this->beginWidget('CActiveForm', array('id'=>'addUserForm','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
                <?php echo CHtml::hiddenField('uid','',array('id'=>'uid'));  ?>
                <div class="col-md-12 pt10 mb30 text-center">
                    <div class="col-md-2 col-md-offset-5 pa10 mt10 mb50 pb50  text-center ">
                        <a class="tm-photo" href="#" id="openBrowUser">
                            <img width="" alt="Team Member" src="<?php echo Yii::app()->theme->baseUrl."/images/add_icon.png"; ?>" id="profile_img1" class="img-circle">
                            <h5 class="fs14 font_newregular orange-new mt5">Add<br/>Photo</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 mb20 admin-form theme-primary" >
                    <div class="col-md-12 ">
                        <label class="field prepend-icon">
                            <?php echo $form->textField($user1,'first_name',array('placeholder'=>" Name (Required)",'required'=>'required','title'=>"Name (Required)",'data-parsley-pattern'=>"^[a-zA-Z]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input required alphanum firstEdit minlength','length'=>"2",'tabindex'=>'15'));?>
                            <?php //if($check == 1)echo $form->error($user1,'first_name'); ?>
                            <label for="firstname" class="field-icon"><span class="icon-user" aria-hidden="true"></span></label>
                        </label>
                    </div>
                    <div class="col-md-12 ">
                        <label class="field prepend-icon">
                            <?php echo $form->textField($user1,'role',array('placeholder'=>"Designation (Required)",'required'=>'required','title'=>"Designation (Required)",'data-parsley-pattern'=>"^[a-zA-Z]+$",'data-parsley-minlength'=>"1",'class'=>'gui-input required alphanum minlength lastEdit','length'=>"1",'tabindex'=>'16'));?>
                            <?php //echo $form->textField($user1,'last_name',array('placeholder'=>"Last Name (Required)",'required'=>'required','title'=>"Last Name (Required)",'data-parsley-pattern'=>"^[a-zA-Z]+$",'data-parsley-minlength'=>"1",'class'=>'gui-input required alphanum minlength lastEdit','length'=>"1",'tabindex'=>'16'));?>
                            <?php //if($check == 1)echo $form->error($user1,'last_name'); ?>
                            <label for="firstname" class="field-icon"><span class="icon-user" aria-hidden="true"></span></label>
                        </label>
                    </div>
                </div>
                <div class="col-md-12 mb10 admin-form theme-primary" >
                    <div class="col-md-12">
                        <label class="field prepend-icon">
                            <?php echo $form->emailField($user1,'username',array('placeholder'=>"Email (Required)",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'gui-input required email emailEdit','tabindex'=>'17')); ?>
                            <?php //if($check == 1)echo $form->error($user1,'email'); ?>
                            <label for="firstname" class="field-icon"><span aria-hidden="true" class="icon-envelope"></span></label>
                        </label>
                    </div>
                </div>
                <div class="col-md-12 mb10 admin-form theme-primary" >
                    <div class="col-md-12 form-group ">
                        <?php $role = array("4"=>"Admin","5"=>"Manager"); ?>
                        <?php echo $form->dropDownList($user1,'role_id', $role,array("empty"=>"Select Role","class"=>"selectpicker show-tick form-control input-group required roleEdit",'required'=>'required','tabindex'=>'18')); ?>
                    </div>
                </div>
                <?php echo $form->hiddenField($user1,'image',array('id'=>"profilePicUser1")); ?>
                <?php 
                $user1->password = time();
                echo $form->hiddenField($user1,'password');
                $user1->addUser = 1;
                echo $form->hiddenField($user1,'addUser');
                ?>
            </div>
            <div class="modal-footer pt20 pb20 col-md-12">
                <?php echo CHtml::button('Done',array('id'=>'btnAddUser','class'=>'btn btn-orange small-btn fs12','tabindex'=>'19')); ?>
                <?php $this->endWidget(); ?>
                <button type="button" class="btn btn-default2 fs12 small-btn" id="modelCan" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Member End-->

<!-- Chat window ends here  -->

<script>
function sma(data){
    $.ajax({
        url:"<?php echo Yii::app()->createUrl('/supplier/sma');?>",
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