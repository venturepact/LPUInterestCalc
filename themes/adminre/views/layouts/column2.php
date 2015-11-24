<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>


<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>
        <ul>
            
			
			<!-- Referral System End -->
            <!-- Innovation index start -->
            <li class="has-sub">
                <?php echo CHtml::link('<span class="menu-text">Calculator</span><span class="arrow"></span>', 'javascript:;',array('class'=>'','type'=>'raw',)); ?>
                <ul class="sub">
                    <li class="has-sub-sub">
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Calculator Branches</span>
                                <span class="arrow"></span>', 'javascript:;', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                        <ul class="sub-sub">
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorBranches/create');?>"><span class="sub-sub-menu-text">Create New Branch</span></a></li>
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorBranches/admin');?>"><span class="sub-sub-menu-text">Manage Branch</span></a></li>
                        </ul>
                    </li>


                      <li class="has-sub-sub">
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Calculator Category</span>
                                <span class="arrow"></span>', 'javascript:;', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                        <ul class="sub-sub">
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorCategory/create');?>"><span class="sub-sub-menu-text">Create New category</span></a></li>
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorCategory/admin');?>"><span class="sub-sub-menu-text">Manage category</span></a></li>
                        </ul>
                    </li>


                      <li class="has-sub-sub">
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Calculator options</span>
                                <span class="arrow"></span>', 'javascript:;', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                        <ul class="sub-sub">
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorOptions/create');?>"><span class="sub-sub-menu-text">Create New options</span></a></li>
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorOptions/admin');?>"><span class="sub-sub-menu-text">Manage options</span></a></li>
                        </ul>
                    </li>


                      <li class="has-sub-sub">
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Calculator Options Weightage</span>
                                <span class="arrow"></span>', 'javascript:;', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                        <ul class="sub-sub">
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorOptionsWeightage/create');?>"><span class="sub-sub-menu-text">Create New Options Weightage</span></a></li>
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorOptionsWeightage/admin');?>"><span class="sub-sub-menu-text">Manage Options Weightage</span></a></li>
                        </ul>
                    </li>




                      <li class="has-sub-sub">
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Calculator Question</span>
                                <span class="arrow"></span>', 'javascript:;', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                        <ul class="sub-sub">
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorQuestion/create');?>"><span class="sub-sub-menu-text">Create New Question</span></a></li>
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorQuestion/admin');?>"><span class="sub-sub-menu-text">Manage Question</span></a></li>
                        </ul>
                    </li>



                      <li class="has-sub-sub">
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Calculator Users</span>
                                <span class="arrow"></span>', 'javascript:;', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                        <ul class="sub-sub">
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorUsers/create');?>"><span class="sub-sub-menu-text">Create New Users</span></a></li>
                            <li><a class="" href="<?php echo Yii::app()->createUrl('admin/CalculatorUsers/admin');?>"><span class="sub-sub-menu-text">Manage Users</span></a></li>
                        </ul>
                    </li>
                    
                    
                </ul>
            </li>
            <!-- Innovation index End -->
        </ul>
        <!-- /SIDEBAR MENU -->
    </div>
</div>
<!-- /SIDEBAR -->

<div id="main-content">
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endContent(); ?>