<!-- BEGIN INBOX DROPDOWN -->
<li class="dropdown" id="header-message">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope chat-notify"></i>
        <?php
            if($personalMessages['totalManagerMsgCount'] > 0) {
                ?>
                    <span class="badge" id="chatCount"><?php echo $personalMessages['totalManagerMsgCount']; ?></span>
                <?php 
            } 
        ?>
    </a>

    <ul class="dropdown-menu inbox" style="max-height: 400px; overflow-y: auto;">
        <li class="dropdown-title">
            <span><i class="fa fa-envelope-o"></i><?php echo ($personalMessages['totalMsgCount']!=0)?$personalMessages['totalMsgCount']:"No"; ?> Unread Chat Room Messages</span>
        </li>

        <li class="footer bb" style="border-bottom:1px solid #444;">
            <a href="<?php echo Yii::app()->createUrl('/admin/default/messages', array('view'=>'manager')); ?>"><?php echo $personalMessages['totalManagerMsgCount'] <= 0 ? "" : '('.$personalMessages['totalManagerMsgCount'] .' Unread)'; ?> For Manager <i class="fa fa-arrow-circle-right"></i></a>
        </li>

        <li class="footer bb" style="border-bottom:1px solid #444;">
            <a href="<?php echo Yii::app()->createUrl('/admin/default/messages'); ?>">See all messages <i class="fa fa-arrow-circle-right"></i></a>
        </li>

        <?php
            foreach($personalMessages['messages'] as $msg) {
                // get user info
                $userImg = "https://www.filepicker.io/api/file/N8YTR3bkTKn78aD5f9f5";
                if(!empty($msg->chatMessageHasUser->users->image)) $userImg = $msg->chatMessageHasUser->users->image;
                if(preg_match('/www.filepicker.io/', $userImg)) $userImg .= "/convert?w=40&h=40&fit=crop";

                $chat_user = ChatRoomHasUsers::model()->find("chat_room_id = $msg->chat_room_id AND users_id <> 1");
                ?>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl("admin/users/initChat", array('uid'=>$chat_user->users_id)); ?>">
                            <img src="<?php echo $userImg; ?>" alt="" />
                            <span class="body" data-room="<?php echo base64_encode($msg->chat_room_id); ?>">
                                <span class="from"><?php echo $msg->chatMessageHasUser->users->first_name; ?></span>
                                <span class="message">
                                    <?php echo $personalMessages['individualMsg'][$msg->chat_room_id]; echo ($personalMessages['individualMsg'][$msg->chat_room_id] == 1)? " Message" : " Messages"; ?> Received
                                </span>
                                <span class="msgtime">
                                    <i class="fa fa-clock-o"></i>
                                    <span class="time" data-last="<?php echo $msg->add_date; ?>"><?php echo $msg->add_date; ?></span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php
            }
        ?>
    </ul>
</li>
<!-- END INBOX DROPDOWN -->

<!-- BEGIN PROJECT INBOX DROPDOWN -->
<li class="dropdown" id="header-message">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-tasks project-notify"></i>
    <?php if($projectMessages['unread_manager_rooms_count'] > 0) { ?>
        <span class="badge" id="projectCount"><?php echo $projectMessages['unread_manager_rooms_count']; ?></span>
    <?php } ?>
    </a>
    <ul class="dropdown-menu inbox" style="max-height: 400px; overflow-y: auto;">
        <li class="dropdown-title" >
            <span><i class="fa fa-tasks"></i><?php echo $projectMessages['unread_rooms_count']; ?> Unread Project Messages</span>
        </li>

        <li class="footer bb" style="border-bottom:1px solid #444;">
            <a href="<?php echo Yii::app()->createUrl('/admin/default/managerProjectMessagesTable'); ?>"><?php echo $projectMessages['unread_manager_rooms_count'] <= 0 ? "" : '('.$projectMessages['unread_manager_rooms_count'] .' Unread)'; ?> For Manager <i class="fa fa-arrow-circle-right"></i></a>
        </li>

        <li class="footer bb" style="border-bottom:1px solid #444;">
            <a href="<?php echo Yii::app()->createUrl('/admin/default/projectMessagesTable'); ?>">See all project messages <i class="fa fa-arrow-circle-right"></i></a>
        </li>

        <?php
            foreach($projectMessages['unread_rooms'] as $project) {
                ?>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('admin/suppliersProjects/introduction', array('pid'=>base64_encode($project->clientProjects->id), 'sid'=>base64_encode($project->id))); ?>">
                            <!-- <img src="<?php //echo $userImg; ?>" alt="" /> -->
                            <span class="body">
                                <span class="from"><?php echo $project->clientProjects->name; ?></span>
                                <span class="message">
                                    <?php echo $project->admin_message_count; ?> Messages Received
                                </span>
                                <!-- <span class="msgtime">
                                    <i class="fa fa-clock-o"></i>
                                    <span class="time" data-last="">a minute ago</span>
                                </span> -->
                            </span> 
                        </a>
                    </li>
                <?php
            }
        ?>
        
    </ul>
</li>
<!-- END PROJECT INBOX DROPDOWN -->

<!-- BEGIN NOTIFICATION DROPDOWN -->    
<li class="dropdown" id="header-notification">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell notification-notify"></i>
        <?php
            if($notifications['logCount']>0) { 
                ?>
                    <span class="badge" id="notificationCount"><?php echo $notifications['logCount'];?></span>  
                <?php
            }
        ?>                      
    </a>
    <ul class="dropdown-menu notification" style="max-height: 400px; overflow-y: auto;">
        <?php
            if(count($notifications['logs'])>0){
                ?>
                    <li class="dropdown-title">
                        <span><i class="fa fa-bell"></i><span><?php echo count($notifications['logs']);?><span> Notifications</span>
                    </li>
                    <li class="footer bb" style="border-bottom:1px solid #444;">
                        <a href="<?php echo Yii::app()->createUrl('/admin/default/notifications', array('view'=>'manager')); ?>"><?php if($notifications['managerLogCount'] > 0) echo "(".$notifications['managerLogCount'].")"; ?> See all Manager Notifications <i class="fa fa-arrow-circle-right"></i></a>
                    </li>
                    <li class="footer bb" style="border-bottom:1px solid #444;">
                        <a href="<?php echo Yii::app()->createUrl('/admin/default/notifications', array('view'=>'admin')); ?>">See all notifications <i class="fa fa-arrow-circle-right"></i></a>
                    </li>
                    
                    <?php 
                        foreach($notifications['logs'] as $log) {
                            ?>
                                <li>
                                    <div class="col-sm-12" style="overflow:auto;  border-bottom:thin solid #ffffff;">
                                        <div class="col-sm-12">
                                        <?php echo $log->description;?>
                                        </div>
                                        <div class="col-sm-12 time">
                                            <span class="pull-right"><i class="fa fa-clock-o"></i> <?php echo $log->add_date;?></span>
                                        </div>
                                     </div>
                                </li>
                            <?php 
                        }
                    ?>
                <?php
            }
            else {
                ?>
                    <li class="footer">
                        <a href="<?php echo Yii::app()->createUrl('/admin/default/notifications'); ?>">No Notifications</a>
                    </li>
                <?php
            }
        ?>
    </ul>
</li>
 <!-- /End NOTIFICATION DROPDOWN -->

 <!-- BEGIN NOTIFICATION DROPDOWN FOR INNOVATION INDEX-->    
<li class="dropdown" id="header-notification">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-linkedin notification-notify"></i>
        <?php
            if($innovationNotifications['logCount']>0) { 
                ?>
                    <span class="badge" id="notificationCount"><?php echo $innovationNotifications['logCount'];?></span>  
                <?php
            }
        ?>                      
    </a>
    <ul class="dropdown-menu notification" style="max-height: 400px; overflow-y: auto;">
        <?php
            if(count($innovationNotifications['logs'])>0){
                ?>
                    <li class="dropdown-title">
                        <span><i class="fa fa-bell"></i><span><?php echo count($innovationNotifications['logs']);?><span> Notifications</span>
                    </li>
                    <li class="footer bb" style="border-bottom:1px solid #444;">
                        <a href="<?php echo Yii::app()->createUrl('/admin/default/innovationNotifications', array('view'=>'manager')); ?>"><?php if($innovationNotifications['managerLogCount'] > 0) echo "(".$innovationNotifications['managerLogCount'].")"; ?> See all Manager Notifications <i class="fa fa-arrow-circle-right"></i></a>
                    </li>
                    <li class="footer bb" style="border-bottom:1px solid #444;">
                        <a href="<?php echo Yii::app()->createUrl('/admin/default/innovationNotifications', array('view'=>'admin')); ?>">See all notifications <i class="fa fa-arrow-circle-right"></i></a>
                    </li>
                    
                    <?php 
                        foreach($innovationNotifications['logs'] as $log) {
                            ?>
                                <li>
                                    <div class="col-sm-12" style="overflow:auto;  border-bottom:thin solid #ffffff;">
                                        <div class="col-sm-12">
                                        <a href="<?php echo $log->url;?>"><?php echo $log->description;?></a>
                                        </div>
                                        <div class="col-sm-12 time">
                                            <span class="pull-right"><?php echo $log->created;?></span>
                                        </div>
                                     </div>
                                </li>
                            <?php 
                        }
                    ?>
                <?php
            }
            else {
                ?>
                    <li class="footer">
                        <a href="<?php echo Yii::app()->createUrl('/admin/default/innovationNotifications'); ?>">No Notifications</a>
                    </li>
                <?php
            }
        ?>
    </ul>
</li>
 <!-- /End NOTIFICATION DROPDOWN FOR INNOVATION INDEX-->