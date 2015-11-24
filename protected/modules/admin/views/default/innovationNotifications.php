<!-- Start: Header -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <h1>Admin Notification</h1>
        </div>
    </div>
</div>
<!-- End: Header --> 
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 np layout-left">
    <div class="col-md-1"></div>
    <div class="notification col-md-10 col-sm-10 col-xs-10">
        <ul class="timeline" id="contentNotification">
            <span class="circle-top"></span>
                <?php $count=1; foreach($notifications as $key=>$notification){?>
                
                <li>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title fs14 font_newregular text-right pr20"><?php echo $key;?></h4>                             
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted mt0">
                    <div class="timeline-panel">
                        <div class="timeline-body">
                            <ul id="<?php if(count($notifications) == $count){echo "append";}?>">
                                <?php foreach($notification as $key=>$current){?>
                                <li class="font_newregular">
                                    <div class="pl20">
                                        <?php echo $current['description'];?>
                                        <span class="time" data-last="<?php echo $current['created'];?>"><?php echo $current['created'];?></span>
                                        
                                    </div>
                                </li>
                                <?php }?>
                                <br><br>
                            </ul>                               
                        </div>
                    </div>
                </li>
                <?php $count++;}?>
            <span class="circle-bottom"></span> 
        </ul>
        <?php if( $seeMore == 1 ){ ?>
            <input type="hidden" value="<?php echo date('d M',strtotime($date));?>" id="date"/>
            <input type="hidden" value="<?php echo $offSet;?>" id="offSet"/>
            <input type="button" onclick="loadMore($(this))" value="More" class="col-md-6 btn tab-btn-new fs12 highlight pull-right mt20"/>
        <?php }?>
    </div>
    <div class="col-md-1">
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    $('li.font_newregular').find('p').each(function(){
        $(this).removeClass('fs10 font_newlight mb0 toggle-color');
    });

    $('.notification-seen').on('change', function() {
        if(this.checked) {
            var not_id = $(this).data('id');
            var seen_by = <?php echo Yii::app()->user->id; ?>;
            var that = $(this);
            
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('/admin/default/markSeenNotification'); ?>",
                data: "notification="+not_id+"&seen_by="+seen_by,
                success: function() {
                    that.parent().html("Seen by: You");
                },
            });
        }
    });

});
function loadMore(element){
    element.val('Loading ...');
    $.ajax({
        type:"POST",
        url:"<?php echo Yii::app()->createUrl('/admin/default/ajaxNotifications');?>",
        data:"date="+$("#date").val()+"&offSet="+$("#offSet").val(),
        success:function(response){
            $("#contentNotification").append(response);
            if($("#appendable").html() != ''){
                $("#append br").remove();
                $("#append").append( $("#appendable").html() );
                $("#appendable").remove();
            }

            if( $("#NewDate").val()!=$("#date").val() ){
                $("#append").attr('id','');
                $("#newAppend").attr('id','append');
            }
            $("#date").val( $("#NewDate").val() );
            $("#NewDate").remove();

            $("#offSet").val($("#NewOffSet").val());
            $("#NewOffSet").remove();

            if( $("#NewSeeMore").val() == 0 ){
                element.fadeOut();
            }
            $("#NewSeeMore").remove();

            element.val('More');
            $('li.font_newregular').find('p').each(function(){
                $(this).removeClass('fs10 font_newlight mb0 toggle-color');
            });
        }
    });
    
 }
</script>