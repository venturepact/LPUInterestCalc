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
    input.parsley-success,
select.parsley-success,
textarea.parsley-success {
  color: #468847;
  background-color: #DFF0D8;
  border: 1px solid #D6E9C6;
}

input.parsley-error,
select.parsley-error,
textarea.parsley-error {
  color: #B94A48;
  background-color: #F2DEDE;
  border: 1px solid #EED3D7;
}

.parsley-errors-list {
  margin: 2px 0 3px;
  padding: 0;
  list-style-type: none;
  font-size: 0.9em;
  line-height: 0.9em;
  opacity: 0;

  transition: all .3s ease-in;
  -o-transition: all .3s ease-in;
  -moz-transition: all .3s ease-in;
  -webkit-transition: all .3s ease-in;
}

.parsley-errors-list.filled {
  opacity: 1;
}

    </style>

</head>
<body class="vp-calculator">
<div id="result" class="modal fade in" role="dialog">
        <div class="modal-dialog modal-md">
        <!-- Modal content-->
            <div class="modal-content modal-bg">
                <div class="modal-body col-md-12 pt15 pb15 text-center fs22">
                   <span id='result-message'> You can't have app with no features!</span>  

                </div>
            </div>
        </div>
</div>
 <div class="cal-map page8  hide" id="calEstimate">
    <?php $this->renderPartial('_calEstimate'); ?>
  </div>
 
 <nav role="navigation" class="navbar pt10 navbar-custom" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand rs-hide" href="/site"><img class="rs-logo rs-hide" itemprop="image" src="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/img/logo.png" alt="VenturePact Logo" width="188" height="30"></a>
            <ul class="nav navbar-nav navbar-right mt10 pull-right">
                <li><label class="head-prize hide" id="totalprice"><small>Your app estimate</small></label></li>
                <li><a href="javascript:void(0);" class="menu-icon"><i class="fa fa-reorder mr5"></i></a></li>
            </ul>
        </div>

    </div>
</nav>
<div class="calculator-main  text-center">
    
    <section class="page1 ">
        <div class="container">
            <h3 class="featured-text">FIND OUT HOW MUCH YOUR APP COSTS</h3>
            <h4 class="subtext mb30">Using this simple tool - find out how price changes by country
            </h4>
            <p class="text-center">
                <button class="btn btn-red sliding-next get-started"  data-slide="2">Get Started <i class="fa fa-spinner fa-spin"></i></button>
            </p>
            <div class="map-block ">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/../../design/calculator/img/map.png" class=" map-img img-responsive">
            </div>
			
			<div class="side-dots hide">
				<div class="col-xs-12 text-center">
                       <?php
                      $catCount=2;      
                      foreach($data as $category){ ?>
                         <span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot<?php echo $catCount; ?>" data-slide="<?php echo $catCount; ?>"></span></span>
                <?php $catCount++; } ?>
                 <span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot<?php echo $catCount; ?>" data-slide="<?php echo $catCount; ?>"></span></span>
               </div>
			</div>	
        </div>
    </section>

        
       <?php  $form=$this->beginWidget('CActiveForm', array('id'=>'wizard-validate','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate')));?>
                    <input type="hidden" name="total_price" value="" id="total_price"/>
					<input type="hidden" name="total_hour" value="" id="total_hour"/>
                    <input type="hidden" name="zoneqprice1" value="" id="zoneqprice1"/>
                    <input type="hidden" name="zoneqprice2" value="" id="zoneqprice2"/>
                    <input type="hidden" name="zoneqprice3" value="" id="zoneqprice3"/>


    <?php
        $catCount=2;      
    	foreach($data as $category){ ?>

  <section class="page<?php echo $catCount;?>  hide ">
        <div class="container">
            <h3 id="header<?php echo $catCount;?>" class="featured-text header"> <?php echo $category->name;?></h3>
            <h4 class="subtext">Tell us a little bit more about project, so we can<br/>
                find the perfect teams for you!
			</h4>
			 
            <div class="row">
            	
                <div class="block text-left">
                    <button   data-toggle="tooltip" title="Help Text!" data-trigger="hover"  id="" class="help help2" data-placement = "bottom"><span class="icon-question text-right pull-right"></span>
                    </button>
                     <?php

                                $count_questions = 0;
								foreach($category->calculatorQuestions as $question ){
									//hold the first question description
										$qDescription = "";
										if($question->is_deleted == 0){
                                        $qDescription = $question->description;
					     ?>

                    <h1 class="nm block-head-text" id="<?php echo $question->id; ?>"> <?php echo $question->question; ?></h1>
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
                           }                            ?>
                    	 <?php foreach($question->calculatorOptions as $option ){ 
	                                                /*check if option is not deleted*/
													if($option->is_deleted == 0){
											        if(($counter%2==1)&&($counter>2))    { ?>
                            <div class="col-xs-12 col-sm-6 ic-check tip bt border-right-none"  data-toggle="tooltip" title="Lorem Ipsum is a dummy text!"
                             data-placement = "bottom">
                          <?php  }    if(($counter%2==0)&&($counter>2))  {?>
                                <div class="col-xs-12 col-sm-6 ic-check tip bt "  data-toggle="tooltip" title="Lorem Ipsum is a dummy text!"
                             data-placement = "bottom">
                               <?php } else if($counter<=2){?>
                                <div class="col-xs-12 col-sm-6 ic-check tip   "  data-toggle="tooltip" title="Lorem Ipsum is a dummy text!"
                             data-placement = "bottom">
                               <?php } ?>
                            <input type="checkbox" class="header<?php echo $catCount;?>" id="chkbx_<?php echo $option->id; ?>"  value="<?php echo $option->id; ?>" name="checkbox[<?php echo $question->id; ?>][]" data-hour="<?php echo $option->hour; ?>">
                            <label for="chkbx_<?php echo $option->id ?>"><div class="icon-box"><div class="vp-ic <?php  if(($option->icon!='')) echo $option->icon; else echo 'pic-ic';?>">&nbsp;</div></div>
                                <div class="text" id="optionheader<?php echo $option->id;?>"><?php echo $option->options; ?></div></label>
                        </div>
                        <?php }
                  $counter++;  }?>


                   </div>
                    
                     <?php }}?>
                  
                </div>
                  
            </div>
         
            <button type="button" class="btn btn-green sliding-next mb100"   data-slide="<?php echo ++$catCount; ?>">Proceed <i class="fa fa-spinner fa-spin"></i></button>
        </div>
    </section>

    	  <?php }?>

    
  
    
    <section class="page<?php echo $catCount; ?>   hide">
        <div class="container">
            <h3 class="featured-text">Contact</h3>
            <h4 class="subtext">No spam or unsolicited communication - promise!</h4>
            <div class="row">
                <div class="block text-left">
                    <h1 class="nm block-head-text">You can email me at:</h1>
                     <span id="errorMessage" class="hide" style="color:red;font-size:13px;"></span> 
                    <input type="text" name="email" id="email" placeholder="mark@facebook.com" class="text-box  required"  data-parsley-type="email" data-parsley-type-message="email is invalid">
                   
                    <h1 class="nm block-head-text mt50">And my phone no. is: </h1>
                    <input type="text" placeholder="123456789" class="text-box mb70" data-parsley-minlength="6" data-parsley-minlength-message="Minimun length required is 6" data-parsley-type="number">
                </div>
            </div>
            <div class="col-md-12 mb100">
                <button type="button" class="btn btn-green getdetailed">Get Detailed Estimate <i class="fa fa-spinner fa-spin"></i></button>
                <span class="text-center footer-span mt10">It will show location wise app estimate with all the details</span>
            </div>
        </div>
    </section>

       <?php $this->endWidget(); ?>
</div>

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script  type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/selectize.js" ></script>

 <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/parsley.min.js"></script>
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
        $(".page1 .featured-text").css("margin-top","80px");
        $(".page1 .subtext").css("margin-bottom","80px");
        $(".navbar").addClass("navbar-fixed-top");
        $(".calculator-main").css("margin-top","30px")
    });
    //$('.two-section .ic-check:even').addClass("bt border-right-none");
    //$('.two-section .ic-check:eq(0)').addClass("border-right-none");
	//$('.two-section .ic-check:eq(3)').addClass("bt");
    $('.admin-block .icon-box:eq(2)').css("margin-top","15px");
    $('.admin-block .icon-box:eq(3)').css("margin-top","15px");
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
        $('.pc-inside-new').addClass('pc-inside-light-new').removeClass('pc-inside-new');
		$('.slide-dot'+(slideNumber-1)).addClass('pc-inside-light-new').removeClass('pc-inside-new');
		$('.slide-dot'+slideNumber).addClass('pc-inside-new').removeClass('pc-inside-light-new');

    });


    $('.pagination-circle-new').on('click',function(e){
        //remove class from selected dot
        var slideNumber =   $(this).find('span').data('slide');
        if($('.page'+slideNumber).hasClass('show')){
            $('.pc-inside-new').addClass('pc-inside-light-new').removeClass('pc-inside-new');
            //add class to clicked dot
            $(this).find('span').addClass('pc-inside-new').removeClass('pc-inside-light-new');
            //bring corresponding slide to view
            
            var divToShow   =   $('.page'+slideNumber);
            $('html, body').animate({
                scrollTop: divToShow.offset().top - 25
            }, 1000);
        }
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
        var hourcalculated = 0;
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
            $("#totalprice ").html("$" + hourcalculated * zoneqprice + "<sup>*</sup>");

            $("#total_price ").val(hourcalculated * zoneqprice);
             $("#total_hour ").val(hourcalculated);
        });
       /* $(".zone").on("change", function() {
           // alert($(this).val());
            $(".zone").parent().removeClass("btn-primary").addClass("btn-default");
            $(this).parent().addClass("btn-primary").removeClass("btn-default");
            zoneqprice = eval($(this).val());
            $(".totalprice").html("$" + hourcalculated * zoneqprice + "<sup>*</sup>");
            console.log("hourcalculated : " + hourcalculated + " - " + zoneqprice);
        });*/

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
    $arrCategory=[];
    $arrCategoryUnique=[];
    $arrOption=[];
    $arrDataHour=[];
    $isChecked='false';
   $("[id^=chkbx_] ").each(function(){ 
                            if ($(this).prop("checked"))
                                 {
                                $isChecked='true';
                                var HeaderId='#'+$(this).attr('class');
                                var optionId='#optionheader'+$(this).attr('value');
                                $arrCategory.push(HeaderId);
                                $arrOption.push(optionId);
                                $arrDataHour.push($(this).attr('data-hour'));
                                if($arrCategoryUnique.indexOf(HeaderId)==-1)
                                $arrCategoryUnique.push(HeaderId);
                                }

                       });

      if($isChecked=='true')
{
   var form=$('#wizard-validate');
   if(form.parsley().validate())
  {
      $('#errorMessage').addClass('hide');
     $(this).html('Calculating...');
        var hourcalculated=  $("#total_hour").attr('value');
        
         $.ajax({
                type: 'POST',
                url: "<?php echo CController::createUrl('/site/SaveCalculatorData2');?>",
                data: form.serialize(),
                datatype: 'json',
                success: function(resPartial) {
                    console.log(resPartial);
                  
                    if(resPartial)
                    {
                        var mapRightHtml='';

                         $(".getdetailed").html('Get Detailed Estimate');
                         
                           for($i=0;$i<$arrCategoryUnique.length;$i++){
                               var HeaderId=$arrCategoryUnique[$i];
                                var optionHtml='';
                                    for($j=0;$j<$arrCategory.length;$j++){
                                        var optionId=$arrOption[$j];
                                        if(HeaderId==$arrCategory[$j])
                                        {
                                        optionHtml= optionHtml+'<div> <span class="mpdetail-2">'+$(optionId).html()+'</span>  <span class="mpdetail-3" id='+$arrDataHour[$j]+'><span style="font-size:14px;">+</span>$'+$arrDataHour[$j]*40+'</span> </div>';
                                        }
                                        
                                    }
                                    mapRightHtml =mapRightHtml+'<div class="mp-deatil-outr"><span class="mpdetail-1">'+$(HeaderId).html()+'</span> <div class="col-xs-8 np"> '+optionHtml+'    </div> </div>';
                              }


                      $('.mapright-detail').html(mapRightHtml); 
                 // $('#calEstimate').html(resPartial);
                    var x = hourcalculated * 130;
                    var y = hourcalculated * 65;
                    var z = hourcalculated * 40;
                    $('#etestimate-btn-id1').html("$" + x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $('#etestimate-btn-id2').html("$" + y.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $('#etestimate-btn-id3').html("$" + z.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $('#lblAppEstimate').html($('#etestimate-btn-id3').html());
                    $('#vmap3').css('display','block');
                    $('#vmap1').css('display','none');
                    $('#vmap2').css('display','none');
                    $(".getestimate-btn").removeClass('hide');
                    $(".getestimate-btn2").addClass('hide');
                    $("#btn-id3").addClass('hide');
                    $("#etestimate-btn-id3").removeClass('hide');
                    $(".page8").removeClass("hide");
                    $("#navbar").css("display","none");
                    $('body').css("overflow","hidden");
                    }else{
                       
                    }
                }
            });
   }

}
else
   {

   $('#result').modal('show');
   }
      return false;
    }); 
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

function validateEmail(email) {
        email = $.trim(email);
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (email.length > 0 && filter.test(email)) return true;
        else return false;
    }

    $(document).ready(function(){
       var local_storage = localStorage.getItem("zone_price");

       //console.log(local_storage);
        local_storage = 40;

       if(local_storage!=130)
       {
            $("#div_130").removeClass("btn-primary1");
            $("#div_130").parent().removeClass("btn-primary1");
            $("#div_" + local_storage).addClass("btn-primary1").removeClass("btn-default1");


       }

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

        $("[id^=chkbx_] ").on("change", function() {

            if ($(this).prop("checked"))
                hourcalculated += eval($(this).data("hour"));
            else
                hourcalculated -= eval($(this).data("hour"));

            zoneqprice = eval($(".zone:checked").val());
            $("#totalprice ").html("$" + (hourcalculated * zoneqprice3).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "&nbsp-&nbsp" + "$" + (hourcalculated * zoneqprice1).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            $("#total_price ").val( hourcalculated * zoneqprice3);
			$("#total_hour").val(hourcalculated);

        });
        $(".zone").on("change", function() {
            //alert($(this).val());
            //$(".zone").parent().removeClass("btn-primary").addClass("btn-default");
            //$(this).parent().addClass("btn-primary").removeClass("btn-default");
            zoneqprice = eval($(this).val());
            localStorage.setItem("zone_price", zoneqprice);
            console.log(localStorage.getItem("zone_price"));
            $("#totalprice ").html("$" + hourcalculated * zoneqprice);
			$("#total_price ").val(hourcalculated * zoneqprice);
			$("#total_hour").val(hourcalculated);
        });

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