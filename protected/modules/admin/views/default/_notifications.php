<?php 
$count=1; foreach($notifications as $key=>$notification){?>
    <?php if($key == $isDate){ 
            echo '<span id="appendable">';
            foreach($notification as $current){?>
                <li class="font_newregular">
                    <div class="pl20">
                        <?php echo $current['description'];?>
                        <span class="time" data-last="<?php echo $current['add_date'];?>"><?php echo $current['add_date'];?></span>
                    </div>
                </li>
    <?php } echo '</span>';$count++; continue;}?>
    <li>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title fs14 font_newregular text-right pr20"><?php echo date('d M',strtotime($key));?></h4>                              
            </div>
        </div>
    </li>
    <li class="timeline-inverted mt0">
        <div class="timeline-panel">
            <div class="timeline-body">
                <ul id="<?php if(count($notifications) == $count){echo "newAppend";}?>" >
                    <?php foreach($notification as $current){?>
                    <li class="font_newregular">
                        <div class="pl20">
                            <?php echo $current['description'];?>
                            <span class="time" data-last="<?php echo $current['add_date'];?>"><?php echo $current['add_date'];?></span>
                        <?php
                        if($current['is_prior_admin'] && $_REQUEST['view'] == "admin" && $current['is_checked'] == 0) { 
                            ?>
                                <span class="checked">&nbsp;&nbsp;&nbsp;Mark this seen: <input class="notification-seen" data-id="<?php echo $key; ?>" type="checkbox"></span>
                            <?php 
                        } 
                        if($current['is_prior_admin'] && $_REQUEST['view'] == "admin" && $current['is_checked'] == 1) {
                            $seenby = Users::model()->findByPk($current['admin_seenby']);
                            ?>
                                <span class="checked pl30">Seen by: <?php echo $seenby->first_name; ?></span>
                            <?php
                        }
                        ?></div>
                    </li>
                    <?php }?>
                    <br><br>
                </ul>                               
            </div>
        </div>
    </li>
<?php $count++;}?>

<input type="hidden" value="<?php echo $offSet;?>" id="NewOffSet"/>
<input type="hidden" value="<?php echo $seeMore;?>" id="NewSeeMore"/>
<input type="hidden" value="<?php echo date('d M',strtotime($date));?>" id="NewDate"/>