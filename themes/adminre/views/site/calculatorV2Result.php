<html>
<head>
    <title>Calculator</title>
    <link href='<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/css/onepage-scroll.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/css/font-awesome-4.4.0/css/font-awesome.css" >
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/fonts/simple-line/simple-line-icons.css" >
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/css/style.css">
    <!-- Latest compiled and minified JavaScript -->
<!--Bhawna-->
    
    <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
     <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/jquery-1.11.2.min.js"></script>

      <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-ui-touch.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/core/js/core.min.js"></script>
    <!--/ Library script -->

    <!-- 3rd party plugin script : optional(per use) -->
    
   <style type="text/css">
      body {
    overflow-y:hidden;
           }
</style>

</head>
<body class="vp-calculator">

 <div class="cal-map page8 " id="calEstimate">
   
    <div class="cal-map-top">
        <div class="map-topbar">
            <span class="col-xs-6 np mp-heading">
               See how your app will cost across the world!
            </span>
            <ul class="mp-topicons">
                <li><a href="javascript:void(0);" class="active"><span class="icon-info" aria-hidden="true"></span></a></li>
                <li><a href="javascript:void(0);"><span class="icon-question" aria-hidden="true"></span></a></li>
                <li><a href="javascript:void(0);" class="close-map"><span class="icon-close" aria-hidden="true"></span></a></li>
            </ul>
        </div>
    </div>
    <div class="cal-map-mid">
        <div class="col-md-12">
            <div class="map_zone_outer">
                <div class="col-lg-4 col-md-4">
                    <label id="div_130" class="radio-inline radio_btn radio_hide" type="button" >
                    <input id="reg1" type="radio" name="zone" class="zone hide"  value="130" />
                        <div class="map-zone1">
                            <span>Zone 1 </span >
                            <small> USA, Canada, Western Europe & Australia</small>
                            <a href="javascript:void(0);" id="btn-id1" class="getestimate-btn" value="130">get estimate</a>
                            <a href="javascript:void(0);" id="etestimate-btn-id1" class="getestimate-btn2 hide"></a>
                        </div>
                    </label>
                </div>
                <div class="col-lg-4 col-md-4 border_position_set"  >
                    <label id="div_65" class="radio-inline radio_btn radio_hide" type="button">
                        <input id="reg2" type="radio" name="zone" class="zone hide" value="65" />
                        <div class="map-zone1">
                            <span>Zone 2</span>  
                            <small>Eastern Europe, Middle East, Central & South America </small>
                            <a href="javascript:void(0);" id="btn-id2" class="getestimate-btn" value="65">get estimate</a>
                            <a href="javascript:void(0);" id="etestimate-btn-id2" class="getestimate-btn2 hide"></a>
                        </div>
                    </label>
                </div>
                <div class="col-lg-4 col-md-4" >
                    <label id="div_40"  class="radio-inline radio_btn radio_hide" type="button" >
                        <input id="reg3" type="radio" name="zone" class="zone hide" value="40">
                        <div class="map-zone1">
                            <span>Zone 3 </span>
                            <small> South Asia, East Asia, South East Asia & Africa</small>
                            <a href="javascript:void(0);" id="btn-id3" class="getestimate-btn hide" value="40">get estimate</a>
                            <a href="javascript:void(0);"  id="etestimate-btn-id3" class="getestimate-btn2"></a>
                        </div>
                    </label>
                </div>
            </div>
            <div id="world-map-markers" class="panel-body map-hide text-center" >
                <div id="vmap1" style="height:250px; width:450px;"></div>
                <div id="vmap2" style="height:250px; width:450px;"></div>
                <div id="vmap3" style="height:250px; width:450px;"></div>  
            </div>
            <div class="col-xs-12 pl0 pr0 text-center">
               
            </div>
        </div>
    </div>
    <div class="cal-map-right">
        <span class="mapright-heading">Project Summary</span>
        <div class="mapright-total">
            <span class="icon-pointer total-icon" aria-hidden="true"></span>
            <div class="mapright-outr">
                <span class="mapright-heading2">Your App Estimate: <label id="lblAppEstimate">$<?php if(isset($user)) echo number_format($user->total_price); ?></label></span>
                <span class="mapright-heading3">Zone 3: South Asia, East Asia, South East Asia & Africa</span>
            </div>
        </div>
        <span class="mapright-heading">Project Details</span>
        <div class="mapright-detail">

         <?php
    /*  if(isset($user)){
       $Calresult = CalculatorResult::model()->findAllByAttributes(array("users_id"=>$user->id));
      foreach($Calresult as $result ){

        ?>
             <div class="mp-deatil-outr">
                <span class="mpdetail-1"><?php echo $result->question->category->name; ?>:</span>

                <div class="col-xs-8 np">
                    <?php // foreach($result->calculatorQuestions->category-> as $cat ){ ?>
                    <span class="mpdetail-2"><?php echo $result->option->options; ?></span>
                    <?php // } ?>

                    <span class="mpdetail-3">+$<?php echo ($result->option->hour)*40; ?></span>
                </div>
            </div>
            */  
      ?>
   
        </div>
    </div>

  </div>
 
 <nav role="navigation" class="navbar navbar-fixed-top pt10 navbar-custom" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand rs-hide" href="/site"><img class="rs-logo rs-hide" itemprop="image" src="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/img/logo.png" alt="VenturePact Logo" width="188" height="30"></a>
            <ul class="nav navbar-nav navbar-right mt10 pull-right">
                <li><label class="head-prize hide" id="totalprice">$0</label></li>
                <li><a href="javascript:void(0);" class="menu-icon"><i class="fa fa-reorder mr5"></i></a></li>
            </ul>
        </div>

    </div>
</nav>
<div class="calculator-main  text-center">
    
    <section class="page1 hide">
        <div class="container">
            <h3 class="featured-text">Design & Build Stunning Websites</h3>
            <h4 class="subtext">Tell us more about your needs <br/>
                and we’ll calculate your app estimate, rite here!
            </h4>
            <p class="text-center mt40">
                <button class="btn btn-red sliding-next get-started"  data-slide="2">Get Started <i class="fa fa-spinner fa-spin"></i></button>
            </p>
            <div class="map-block ">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/img/map.png" class=" map-img img-responsive">
            </div>
			
			<div class="side-dots hide">
				<div class="col-xs-12 text-center">
					<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot2" data-slide="2"></span></span>
					<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot3" data-slide="3"></span></span>
					<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot4" data-slide="4"></span></span>
					<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot5" data-slide="5"></span></span>
					<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot6" data-slide="6"></span></span>
					<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot7" data-slide="7"></span></span>
				</div>
			</div>	
        </div>
    </section>
 
     <?php     $optionIdArr=array();
             foreach($user->calculatorResults as $userOption)
                       {
                       $optionIdArr[]=$userOption->option_id;
                       }

     ?>
       <?php  $form=$this->beginWidget('CActiveForm', array('id'=>'wizard-validate','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate')));?>
                    <input type="hidden" name="total_price" value="" id="total_price"/>
					<input type="hidden" name="total_hour" value="" id="total_hour"/>
                    <input type="hidden" name="total_hour" value="" id="zoneqprice1"/>
                    <input type="hidden" name="total_hour" value="" id="zoneqprice2"/>
                    <input type="hidden" name="total_hour" value="" id="zoneqprice3"/>


    <?php
        $catCount=2;      
    	foreach($data as $category){ ?>

  <section class="page<?php echo $catCount;?>   ">
        <div class="container">
            <h3 id="header<?php echo $catCount;?>" class="featured-text header"> <?php echo $category->name;?></h3>
            <h4 class="subtext">Tell us a little bit more about project, so we can<br/>
                find the perfect teams for you!
			</h4>
			 
            <div class="row">
            	
                <div class="block text-left">
                  <button     data-toggle="tooltip" title="Help Text!" data-trigger="hover"  id="" class="help help2" data-placement = "bottom"><span class="icon-question text-right pull-right"></span>
                    </button>
                     <?php

                                $count_questions = 0;
								foreach($category->calculatorQuestions as $question ){
									//hold the first question description
										$qDescription = "";
										if($question->is_deleted == 0){
                                        $qDescription = $question->description;
					     ?>

                    <h1 class="nm block-head-text"> <?php echo $question->question; ?></h1>
                    <?php if($question->id=='17') {?>
                    <div class="col-xs-12 np mb70 admin-block two-section pull-left">
                    <?php } else {?>
                    <div class="col-xs-12 np mb70 ui-theme-block two-section pull-left">
                        <?php } ?>
                         <?php 
                          $counter=1;
                          $optionCount=0;
                          $ThirdOption=0;
                          foreach($question->calculatorOptions as $option ){ 
                                                    /*check if option is not deleted*/
                                                    if($option->is_deleted == 0){
                                                    $ThirdOption=$optionCount;
                                                    $optionCount=$option->id;
                                                    }
                           }      ?>
                    	 <?php foreach($question->calculatorOptions as $option ){ 
	                                                /*check if option is not deleted*/
													if($option->is_deleted == 0){  
                                                 if(($counter%2==1)&&($counter>2))    { ?>
                           <div class="col-xs-12 col-sm-6 ic-check tip bt border-right-none"  data-toggle="tooltip" title="Lorem Ipsum is a dummy text!"
                             data-placement = "bottom">
                              <?php  }  if(($counter%2==0)&&($counter>2)) { ?>
                          <div class="col-xs-12 col-sm-6 ic-check tip bt "  data-toggle="tooltip" title="Lorem Ipsum is a dummy text!"
                             data-placement = "bottom">
                                <?php } else if($counter<=2) {?>
                                <div class="col-xs-12 col-sm-6 ic-check tip  "  data-toggle="tooltip" title="Lorem Ipsum is a dummy text!"
                             data-placement = "bottom">
                               <?php }?>
                            <input disabled <?php if(in_array($option->id,$optionIdArr)) echo "checked" ?> type="checkbox" class="header<?php echo $catCount;?>" id="chkbx_<?php echo $option->id; ?>"  value="<?php echo $option->id; ?>" name="checkbox[<?php echo $question->id; ?>][]" data-hour="<?php echo $option->hour; ?>">
                            <label for="chkbx_<?php echo $option->id ?>"><div class="icon-box"><div class="vp-ic <?php  if(($option->icon!='')) echo $option->icon; else echo 'pic-ic';?>">&nbsp;</div></div>
                                <div class="text" id="optionheader<?php echo $option->id;?>"><?php echo $option->options; ?></div></label>
                        </div>
                        <?php }
                     $counter++;}?>


                   </div>
                    
                     <?php }}?>
                  
                </div>
                  
            </div>
         
            <button type="button" class="btn btn-green sliding-next mb100 hide"   data-slide="<?php echo ++$catCount; ?>">Proceed <i class="fa fa-spinner fa-spin"></i></button>
        </div>
    </section>

    	  <?php }?>

    
  
    
    <section class="page<?php echo $catCount; ?>   ">
         <button type="button" class="btn btn-green getdetailed">Get Detailed Estimate <i class="fa fa-spinner fa-spin"></i></button>
              
    </section>

       <?php $this->endWidget(); ?>
</div>
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script  type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/selectize.js" ></script>


 <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/steps/js/jquery.steps.min.js"></script>
 <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/inputmask/js/inputmask.min.js"></script>
 <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/html/javascript/page.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>

 
    $(".help1").click(function(){
        $(".help1").toggleClass("active");
    });
    $(".help2").click(function(){
        $(".help2").toggleClass("active");
    });
    $(".help3").click(function(){
        $(".help3").toggleClass("active");
    });
    $(".help4").click(function(){
        $(".help4").toggleClass("active");
    });
    $(".help5").click(function(){
        $(".help5").toggleClass("active");
    });
    // $('#select-beast-empty').selectize({
    //     create: true
    // });
    // $('#select-database').selectize({
    //     create: true
    // });
    $('.help').tooltip();
    $('.tip').tooltip();
    $(".get-started").click(function(){
       /* $(".head-prize").addClass("show");
        $(".menu-icon").css("display","none");*/
    });

	$(document).ready(function(){
		$(".page2 .featured-text").css("margin-top","90px");

    });
  
	

	$(".close-map").click(function(){
		$(".page8").addClass("hide");
		$("#navbar").css("display","block");
		$('body').css("overflow","scroll");
    });
	
	
    $(".sliding-next").click(function(){
        $(this).hide();
        /* next slide section to show*/
        var slideNumber =	$(this).data('slide');
        $(".page"+ slideNumber).addClass("show");
        var divToShow  	= 	$('.page'+slideNumber);
        $('html, body').animate({
            scrollTop: divToShow.offset().top-25
        }, 1000);
		$('.slide-dot'+(slideNumber-1)).addClass('pc-inside-light-new').removeClass('pc-inside-new');
		$('.slide-dot'+slideNumber).addClass('pc-inside-new').removeClass('pc-inside-light-new');

    });
$('span[class*="slide-dot"]').click(function(e){
		$('.pc-inside-new').addClass('pc-inside-light-new').removeClass('pc-inside-new');
		$(this).addClass('pc-inside-new').removeClass('pc-inside-light-new');
		
		var slideNumber =	$(this).data('slide');
		var divToShow  	= 	$('.slider'+slideNumber);
		$('html, body').animate({
			scrollTop: divToShow.offset().top-25
		}, 1000);
		
	});
    $(window).scroll(function() {
        //alert($(this).scrollTop());
        if ($(this).scrollTop() > 300) {

            $(".menu-icon").css("display","none");
            $(".head-prize").removeClass("hide");
            $(".side-dots").removeClass("hide");
        }
        else {
            $(".head-prize").addClass("hide");
            $(".side-dots").addClass("hide");
            $(".menu-icon").css("display","block");
        }
    });
</script>
<!-- vmap script -->
<script type="text/javascript">
    jQuery(document).ready(function() {
        var isChecked='false';
           var region1 = {
            us: '#258475',
            ca: '#258475',
            be: '#258475',
            at: '#258475',
            fr: '#258475',
            nl: '#258475',
            dk: '#258475',
            fi: '#258475',
            gr: '#258475',
            ie: '#258475',
            is: '#258475',
            it: '#258475',
            no: '#258475',
            pt: '#258475',
            es: '#258475',
            de: '#258475',
            gb: '#258475',
            au: '#258475',
        }
        var region2 = {
            eg: '#258475',
            ir: '#258475',
            iq: '#258475',
            tr: '#258475',
            sa: '#258475',
            ye: '#258475',
            sy: '#258475',
            il: '#258475',
            jo: '#258475',
            ae: '#258475',
            lb: '#258475',
            kw: '#258475',
            qa: '#258475',
            cy: '#258475',
            ru: '#258475',
            ua: '#258475',
            md: '#258475',
            by: '#258475',
            at: '#258475',
            hu: '#258475',
            pl: '#258475',
            cz: '#258475',
            ro: '#258475',
            si: '#258475',
            sk: '#258475',
            pa: '#258475',
            cr: '#258475',
            gt: '#258475',
            ni: '#258475',
            hn: '#258475',
            bo: '#258475',
            br: '#258475',
            ar: '#258475',
            cl: '#258475',
            co: '#258475',
            pe: '#258475',
            uy: '#258475',
            ec: '#258475',
            py: '#258475',
            ve: '#258475',
            gy: '#258475',
            sr: '#258475',
            gf: '#258475',
        }
        var region3 = {
            af: '#258475',
            am: '#258475',
            az: '#258475',
            bd: '#258475',
            bt: '#258475',
            bn: '#258475',
            mm: '#258475',
            cn: '#258475',
            cy: '#258475',
            ge: '#258475',
            in : '#258475',
            id: '#258475',
            ir: '#258475',
            iq: '#258475',
            il: '#258475',
            jp: '#258475',
            mn: '#258475',
            my: '#258475',
            mv: '#258475',
            np: '#258475',
            om: '#258475',
            pk: '#258475',
            ph: '#258475',
            sa: '#258475',
            sy: '#258475',
            tj: '#258475',
            tw: '#258475',
            tr: '#258475',
            th: '#258475',
            tm: '#258475',
            uz: '#258475',
            vn: '#258475',
            ye: '#258475',
            cf: '#258475',
            za: '#258475',
            ao: '#258475',
            bj: '#258475',
            bw: '#258475',
            bi: '#258475',
            bf: '#258475',
            cm: '#258475',
            cv: '#258475',
            cd: '#258475',
            cg: '#258475',
            dj: '#258475',
            eg: '#258475',
            er: '#258475',
            et: '#258475',
            gh: '#258475',
            gm: '#258475',
            gn: '#258475',
            gq: '#258475',
            ls: '#258475',
            lr: '#258475',
            ly: '#258475',
            mg: '#258475',
            ml: '#258475',
            ma: '#258475',
            mu: '#258475',
            mz: '#258475',
            na: '#258475',
            ne: '#258475',
            ng: '#258475',
            rw: '#258475',
            st: '#258475',
            sn: '#258475',
            td: '#258475',
            so: '#258475',
            sz: '#258475',
            sd: '#258475',
            tg: '#258475',
            tn: '#258475',
            ug: '#258475',
            zm: '#258475',
            zw: '#258475',
            tz: '#258475',
            ke: '#258475',
            mw: '#258475',
            mr: '#258475',
            dz: '#258475',
            kh: '#258475',
            la: '#258475',
            pg: '#258475',
            ga: '#258475',
            ci: '#258475',
            sl: '#258475',
            gw: '#258475',
            jo: '#258475',
            ae: '#258475',
        }
        jQuery('#vmap1').vectorMap({
            map: 'world_en',
            backgroundColor: '',
            color: '#858c8b',
            colors: region1,
            enableZoom: false,
            hoverColor: '#258475',
            hoverOpacity: null,
            normalizeFunction: 'polynomial',
            scaleColors: ['#b6d6ff', '#005ace'],
            selectedColor: '#C8C8C8',
            selectedRegion: null,
            showTooltip: true,
        });
        jQuery('#vmap2').vectorMap({
            map: 'world_en',
            backgroundColor: '',
            color: '#858c8b',
            colors: region2,
            enableZoom: false,
            hoverColor: '#258475',
            hoverOpacity: null,
            normalizeFunction: 'polynomial',
            scaleColors: ['#b6d6ff', '#005ace'],
            selectedColor: '#C8C8C8',
            selectedRegion: null,
            showTooltip: true,
        });
        jQuery('#vmap3').vectorMap({
            map: 'world_en',
            backgroundColor: '',
            color: '#858c8b',
            colors: region3,
            enableZoom: false,
            hoverColor: '#858c8b',
            hoverOpacity: null,
            normalizeFunction: 'polynomial',
            scaleColors: ['#b6d6ff', '#005ace'],
            selectedColor: '#C8C8C8',
            selectedRegion: null,
            showTooltip: true,
        });
        $('#vmap1').show();
        $('#vmap2').hide();
        $('#vmap3').hide();
        $('#reg1').on('click', function() {
            $('#vmap1').show();
            $('#vmap2').hide();
            $('#vmap3').hide();
        });
        $('#reg2').on('click', function() {
            $('#vmap1').hide();
            $('#vmap2').show();
            $('#vmap3').hide();
        });
        $('#reg3').on('click', function() {
            $('#vmap1').hide();
            $('#vmap2').hide();
            $('#vmap3').show();
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      
         /*Zone 1
Western Europe US & Canada Australia$110 - $150 / hour=> 130 */
        var zoneqprice1 = 130;
        $('#zoneqprice1').val(130);
        

        /*Zone 2
Middle East Estern Europe Central & South America $50 - $80=> 65 / hour*/
        var zoneqprice2 = 65;
  $('#zoneqprice2').val(65);
        /*Zone 3
South Asia Africa East Asia South East Asia $30 - $50=> 40 / hour*/
        var zoneqprice3 = 40;
          $('#zoneqprice3').val(40);
        var hourcalculated = <?php echo $user->total_hour; ?> ;
        $("#totalprice ").html("$" + (hourcalculated * zoneqprice3).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "&nbsp-&nbsp" + "$" + (hourcalculated * zoneqprice1).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
         
        $("[id^=chkbx_] ").on("change", function() {
            if ($(this).prop("checked"))
            {
              
                hourcalculated += eval($(this).val());
            }
            else
            {
                hourcalculated -= eval($(this).val());
            }
            zoneqprice = eval($(".zone:checked").val());
            $("#total_price ").val(hourcalculated * zoneqprice);
             $("#total_hour ").val(hourcalculated);
        });
        $(".zone").on("change", function() {
           // alert($(this).val());
            //$(".zone").parent().removeClass("btn-primary").addClass("btn-default");
            //$(this).parent().addClass("btn-primary").removeClass("btn-default");
            zoneqprice = eval($(this).val());
            $(".totalprice").html("$" + hourcalculated * zoneqprice + "<sup>*</sup>");
            console.log("hourcalculated : " + hourcalculated + " - " + zoneqprice);
        });
        getDetail();  
        //Email Id validation
        $("#passButSat").click(function() {
            if ($("#email").val().length > 0) {
                $("#hiddenemail").val($("#email").val());
                $("#bs-modal-email").modal("hide");
            } else {
                alert("Please enter email");
            }
        });
		// $("#wizard").steps("next");
		// $("#wizard").steps("next");
		// $("#wizard").steps("next");
		// $("#wizard").steps("next");
		$(".actions").addClass("hide");
//$('li.first').addClass('satnam');
$('li.current').addClass('done');


$(".getdetailed").click(function(){
    
     getDetail();


    }); 

function getDetail()
{

    var  mapRightHtml='';
    $arrCategory=[];
    $arrCategoryUnique=[];
    $arrOption=[];
    $arrDataHour=[];
      var hourcalculated='';
         $("[id^=chkbx_] ").each(function(){ 
                            if ($(this).prop("checked"))
                                    {
                                   
                               var HeaderId='#'+$(this).attr('class');
                                var optionId='#optionheader'+$(this).attr('value');
                                $arrCategory.push(HeaderId);
                                $arrOption.push(optionId);
                                $arrDataHour.push($(this).attr('data-hour'));
                                if($arrCategoryUnique.indexOf(HeaderId)==-1)
                                $arrCategoryUnique.push(HeaderId);
                                    }
                                      

                                 });

                            for($i=0;$i<$arrCategoryUnique.length;$i++){
                               var HeaderId=$arrCategoryUnique[$i];
                                var optionHtml='';
                                    for($j=0;$j<$arrCategory.length;$j++){
                                        var optionId=$arrOption[$j];
                                        if(HeaderId==$arrCategory[$j])
                                        {
                                        optionHtml= optionHtml+'<div> <span class="mpdetail-2">'+$(optionId).html()+'</span>  <span class="mpdetail-3" id='+$arrDataHour[$j]+'><span>+</span>$'+$arrDataHour[$j]*40+'</span> </div>';
                                        }
                                        
                                    }
                                    mapRightHtml =mapRightHtml+'<div class="mp-deatil-outr"><span class="mpdetail-1">'+$(HeaderId).html()+'</span> <div class="col-xs-8 np"> '+optionHtml+'    </div> </div>';
                            }
            $('.mapright-detail').html(mapRightHtml); 
            
            $('#lblAppEstimate').html('<?php echo "$".number_format($user->total_price); ?>');
           // $('#totalprice').html('<?php echo "$".number_format($user->total_price); ?>');
            $('#etestimate-btn-id1').html("$" + '<?php echo  number_format($user->total_hour * 130); ?>' );
            $('#etestimate-btn-id2').html("$" + '<?php echo number_format($user->total_hour * 65); ?>' );
            $('#etestimate-btn-id3').html("$" + '<?php echo number_format($user->total_hour * 40); ?>' );
            $('#calEstimate').removeClass('hide');
            $('#vmap3').css('display','block');
            $('#vmap1').css('display','none');
            $('#vmap2').css('display','none');
            $(".getestimate-btn").removeClass('hide');
            $(".getestimate-btn2").addClass('hide');
            $("#btn-id3").addClass('hide');
            $("#etestimate-btn-id3").removeClass('hide');
}


    $(".getestimate-btn").on('click',function()
        {

            var x=$( this ).attr('value');
          
            if(x=='130')
            {
            $('#vmap1').css('display','block');
            $('#vmap2').css('display','none');
            $('#vmap3').css('display','none');
            } 
            if(x=='65')
            {
            $('#vmap2').css('display','block');
            $('#vmap1').css('display','none');
            $('#vmap3').css('display','none');
            }
            if(x=='40')
            {
            $('#vmap3').css('display','block');
            $('#vmap1').css('display','none');
            $('#vmap2').css('display','none');
            }
            var message = $(this).closest('.map-zone1').find('span').html()+": "+$(this).closest('.map-zone1').find('small').html();
            $('.mapright-heading3').html(message);
            $(".getestimate-btn").removeClass('hide');
            $(".getestimate-btn2").addClass('hide');
            $(this).addClass('hide');
            var id= '#etestimate-'+$(this).attr('id');
            $(id).removeClass('hide');
            $('#lblAppEstimate').html(  $(id).html());
            $( ".mpdetail-3" ).each(function( index ) {
            console.log( index + ": " + $( this ).attr('id') );
            $( this ).text('+$'+$( this ).attr('id')*x);



});

       // $(this).closest( ".getestimate-btn2 " ).removeClass('hide');
    });





 
    });


</script>
 
<script>

 

    $(document).ready(function(){
       var local_storage = localStorage.getItem("zone_price");

       //console.log(local_storage);
        local_storage = 40;

       /*if(local_storage!=130)
       {
            $("#div_130").removeClass("btn-primary1");
            $("#div_130").parent().removeClass("btn-primary1");
            $("#div_" + local_storage).addClass("btn-primary1").removeClass("btn-default1");


       }*/

       if(local_storage==130)
       {
          $('#vmap1').show();
          $('#vmap2').hide();
          $('#vmap3').hide();

       }else if(local_storage==65)

       {
          $('#vmap1').hide();
          $('#vmap2').show();
          $('#vmap3').hide();
       }else{
          $('#vmap1').hide();
          $('#vmap2').hide();
          $('#vmap3').show();

       }

         $("[id^='wizard-t-']").attr("href","");


    });
</script>


<script type="text/javascript">
    $(document).ready(function() {

       localStorage.setItem("zone_price", "130");
        /*Zone 1
Western Europe US & Canada Australia$110 - $150 / hour=> 130 */
        var zoneqprice1 = 130;

        /*Zone 2
Middle East Estern Europe Central & South America $50 - $80=> 65 / hour*/
        var zoneqprice2 = 65;

        /*Zone 3
South Asia Africa East Asia South East Asia $30 - $50=> 40 / hour*/
        var zoneqprice3 = 40;

        <?php
         if(!empty($total_price[0]->total_hour))
         {
            ?>
            var hourcalculated = <?php echo $total_price[0]->total_hour; ?>;
            <?php
         }else{
            ?>
            var hourcalculated = 0;
            <?php
         }
         ?>

      

		//fake forrm get and validate
	//	var fake_form = $("#fake-form").parsley();
		$("#fake-form").on("submit",function(){
			console.log("working ",fake_form.isValid());
			if(fake_form.isValid()){
				$("#bs-modal-email").modal("hide");
				$("#hiddenemail").val($("#email").val());
			}
			return false;
		});

        //Email Id validation

    });
</script>



<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/js/vmap/js/jquery.vmap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/js/vmap/js/jquery.vmap.world.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/js/vmap/js/jquery.vmap.sampledata.js"></script>
</html>