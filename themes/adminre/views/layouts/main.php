<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>VenturePact | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no,">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php 
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/node/node_modules/socket.io/node_modules/socket.io-client/socket.io.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/style/js/jquery-1.11.2.min.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/moment.min.js', CClientScript::POS_HEAD);  
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/style/js/parsley.min.js', CClientScript::POS_HEAD);  
    ?>
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/css/cloud-admin.css" >
    <link rel="stylesheet" type="text/css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/css/themes/night.css" id="skin-switcher" >
    <link rel="stylesheet" type="text/css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/css/responsive.css" >
    
    <!-- STYLESHEETS -->
    <!--[if lt IE 9]>
    <script src="<?php //echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/flot/excanvas.min.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- ANIMATE -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/css/animatecss/animate.min.css" />
    <!-- DATE RANGE PICKER -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <!-- TODO -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/jquery-todo/css/styles.css" />
    <!-- FULL CALENDAR -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/fullcalendar/fullcalendar.min.css" />
    <!-- GRITTER -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/gritter/css/jquery.gritter.css" />
    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/css/custom.css" />
    <!-- FONTS -->


</head>

<body>
    <!-- HEADER -->
    <header class="navbar clearfix" id="header">
        <div class="container">
                <div class="navbar-brand">
                    <!-- COMPANY LOGO -->
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/img/logo/logo.png" alt="VenturePact Logo" class="img-responsive" height="32" width="220">
                    </a>
                    <!-- /COMPANY LOGO -->
                    
                    <!-- SIDEBAR COLLAPSE -->
                    <div id="sidebar-collapse" class="sidebar-collapse btn">
                        <i class="fa fa-bars" 
                            data-icon1="fa fa-bars" 
                            data-icon2="fa fa-bars" ></i>
                    </div>
                    <!-- /SIDEBAR COLLAPSE -->
                </div>

                <!-- NAVBAR LEFT -->
                <ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">
                    
                </ul>
                <!-- /NAVBAR LEFT -->

                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown user pull-right" id="header-user">
                        <?php if(!Yii::app()->user->isGuest) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            
                            <img alt="" src="<?php 
                                if(!empty(Yii::app()->user->image))
                                    echo Yii::app()->user->image; 
                                else
                                    echo Yii::app()->theme->baseUrl."/adminPanel/img/user.png";
                                ?>" 
                            />
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                       <li><a href="<?php echo Yii::app()->createUrl('site/logout'); ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                        <?php } else { ?>
                        <a href="<?php echo Yii::app()->createUrl('site/login'); ?>" class="dropdown-toggle">
                            <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/img/user.png" />
                            
                            <span class="name">Login</span>
                        </a>
                        <?php } ?>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>

                <!-- BEGIN TOP NAVIGATION MENU -->                  
                <ul class="nav navbar-nav pull-right" id="notifyWidgetAdmin">
                    <?php
                        //$this->widget('WidgetAdminNotificationController');
                    ?>
                </ul>
                <!-- END TOP NAVIGATION MENU -->
        </div>

        <!-- TEAM STATUS REMOVED -->
    </header>



    <!-- PAGE -->
    <section id="page">
    <?php
        $userId = Yii::app()->user->id;
        $sup_end = Yii::app()->controller->id=='supplier'?1:0;
        $client_end = Yii::app()->controller->id=='client'?1:0;
        $admin_end = isset(Yii::app()->controller->module->id) && Yii::app()->controller->module->id=='admin'?1:0;
    ?>
    <input type="hidden" value="<?php echo $userId; ?>" name="dhId" id="dhId" />
    <input type="hidden" value="<?php echo Yii::app()->params['socket_port']; ?>" name="dport" id="dport" />
    <input type="hidden" name="supplier" value="<?php echo $sup_end; ?>" />
    <input type="hidden" name="client" value="<?php echo $client_end; ?>" />
    <input type="hidden" name="admin" value="<?php echo $admin_end; ?>" />
    <input type="hidden" value="<?php echo 'http://'.Yii::app()->request->getServerName().Yii::app()->baseUrl; ?>" name="durl" id="durl" />

        <?php echo $content; ?>
    </section>

    <audio src="<?php echo Yii::app()->baseUrl.'/Pling.wav' ?>" autostart="false" width="0" height="0" id="msg-audio" class="hide" />




    <!-- JAVASCRIPTS -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- JQUERY UI-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/bootstrap/js/bootstrap.min.js"></script>
        
    <!-- DATE RANGE PICKER -->
    <!-- <script src="<?php //echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/bootstrap-daterangepicker/moment.min.js"></script> -->
    
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
    
    <!-- SLIMSCROLL -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js">
    
    </script><script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
    
    <!-- DATA TABLES -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/datatables/media/assets/js/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>

    <!-- COOKIE -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/jQuery-Cookie/jquery.cookie.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/filepicker.js"></script>
    <!-- CUSTOM SCRIPT -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/adminPanel/js/script.js"></script>
    <script type="text/javascript">var userpicurl = "<?php echo (empty(Yii::app()->user->image)?'https://www.filepicker.io/api/file/A9r6eU3JQOxoJXvAWPgY':Yii::app()->user->image); ?>";</script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/notification.js"></script>
    <!-- Admin Forms CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/admin-tools/admin-forms/css/admin-forms.css" rel="stylesheet">
    
    <script>
        jQuery(document).ready(function() {
            App.setPage("widgets_box");  //Set current page
            App.init(); //Initialise plugins and elements
            $('[data-toggle="tooltip"]').tooltip();
        });
        $("#header-notification").click(function(){
            if(parseInt($('#notificationCount').html())>0){
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl("/site/notificationCounter");?>",
                success: function(returnedData){
                    $("#notificationCount").html('0');
                    $('#notificationCount').hide();
                }
            });
            }
        });
    </script>
    <!-- /JAVASCRIPTS -->
</body>
</html>