<html>
<head>
    <title>Calculator</title>
    <link href='<?php echo Yii::app()->theme->baseUrl; ?>/calculator/css/onepage-scroll.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/calculator/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/calculator/css/font-awesome-4.4.0/css/font-awesome.css" >
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/calculator/fonts/simple-line/simple-line-icons.css" >
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/calculator/css/style.css" >
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

    <!-- Latest compiled and minified JavaScript -->
<!--Bhawna-->
</head>
<body class="vp-calculator">
<div class="cal-map page8 hide">
	<div class="cal-map-top">
		<div class="map-topbar">
			<span class="col-xs-6 np mp-heading">
				Detailed Estimate
			</span>
			<ul class="mp-topicons">
				<li><a href="javascript:void(0);" class="active"><span class="icon-info" aria-hidden="true"></span></a></li>
				<li><a href="javascript:void(0);"><span class="icon-question" aria-hidden="true"></span></a></li>
				<li><a href="javascript:void(0);" class="close-map"><span class="icon-close" aria-hidden="true"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="cal-map-mid">
		<div class="col-md-12 mt15">
			<div class="col-xs-12 text-center mt40 mb20">
				<span class="topmid-heading">Thinking of Offshoring?</span>
				<span class="topmid-heading2">See how your app will cost across the world!</span>
			</div>
			<div class="map_zone_outer col-xs-12 pl0 pr0">
				<div class="col-lg-4 col-md-4 pl0 pr0">
					<label id="div_130" class="radio-inline radio_btn radio_hide" type="button" >
					<input id="reg1" type="radio" name="zone" class="zone hide"  value="130" />
						<div class="map-zone1">
							<span>Zone 1 </span>
							<small> USA, Canada, Western Europe & Australia</small>
							<a href="javascript:void(0);" class="getestimate-btn">get estimate</a>
							<a href="javascript:void(0);" class="getestimate-btn2 hide">$5,2000</a>
						</div>
					</label>
				</div>
				<div class="col-lg-4 col-md-4 pl0 pr0 border_position_set"  >
					<label id="div_65" class="radio-inline radio_btn radio_hide" type="button">
						<input id="reg2" type="radio" name="zone" class="zone hide" value="65" />
						<div class="map-zone1">
							<span>Zone 2</span>  
							<small>Eastern Europe, Middle East, Central & South America </small>
							<a href="javascript:void(0);" class="getestimate-btn">get estimate</a>
							<a href="javascript:void(0);" class="getestimate-btn2 hide">$5,2000</a>
						</div>
					</label>
				</div>
				<div class="col-lg-4 col-md-4 pl0 pr0" >
					<label id="div_40"  class="radio-inline radio_btn radio_hide" type="button" >
						<input id="reg3" type="radio" name="zone" class="zone hide" value="40">
						<div class="map-zone1">
							<span>Zone 3 </span>
							<small> South Asia, East Asia, South East Asia & Africa</small>
							<a href="javascript:void(0);" class="getestimate-btn hide">get estimate</a>
							<a href="javascript:void(0);" class="getestimate-btn2">$5,2000</a>
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
				<a href="javascript:void(0);" class="btn btn-redmap">Post Your Project <i class="fa fa-spinner fa-spin"></i></a>
			</div>
		</div>
	</div>
	<div class="cal-map-right">
		<span class="mapright-heading">Project Summary</span>
		<div class="mapright-total">
			<span class="icon-pointer total-icon" aria-hidden="true"></span>
			<div class="mapright-outr">
				<span class="mapright-heading2">Your App Estimate: <label>$52,00</label></span>
				<span class="mapright-heading3">Zone 3: South Asia, East Asia, South Asia & Africa</span>
			</div>
		</div>
		<span class="mapright-heading">Project Details</span>
		<div class="mapright-detail">
			<div class="mp-deatil-outr">
				<span class="mpdetail-1">Platform:</span>
				<div class="col-xs-8 np">
					<span class="mpdetail-2">Android</span>
					<span class="mpdetail-3">+$500</span>
				</div>
			</div>
			<div class="mp-deatil-outr">
				<span class="mpdetail-1">UI Theme:</span>
				<div class="col-xs-8 np">
					<span class="mpdetail-2">Stock or Template UI</span>
					<span class="mpdetail-3">+$50</span>
					<span class="mpdetail-2">Custome Brand Ui</span>
					<span class="mpdetail-3">+$50</span>
				</div>
			</div>
			<div class="mp-deatil-outr">
				<span class="mpdetail-1">No. of Screens:</span>
				<div class="col-xs-8 np">
					<span class="mpdetail-2">1 - 6</span>
					<span class="mpdetail-3">+$50</span>
				</div>
			</div>
			<div class="mp-deatil-outr">
				<span class="mpdetail-1">Login:</span>
				<div class="col-xs-8 np">
					<span class="mpdetail-2">Email ID via Password</span>
					<span class="mpdetail-3">+$500</span>
				</div>
			</div>
			<div class="mp-deatil-outr">
				<span class="mpdetail-1">Security:</span>
				<div class="col-xs-8 np">
					<span class="mpdetail-2">I want to encryupt communi-cation between my server</span>
					<span class="mpdetail-3">+$500</span>
				</div>
			</div>
			<div class="mp-deatil-outr">
				<span class="mpdetail-1">3rd Party Services:</span>
				<div class="col-xs-8 np">
					<span class="mpdetail-2">Socail Network</span>
					<span class="mpdetail-3">+$500</span>
					<span class="mpdetail-2">Location </span>
					<span class="mpdetail-3">+$500</span>
					<span class="mpdetail-2">Communication</span>
					<span class="mpdetail-3">+$500</span>
				</div>
			</div>
			<div class="mp-deatil-outr">
				<span class="mpdetail-1">Application Data:</span>
				<div class="col-xs-8 np">
					<span class="mpdetail-2">A new database </span>
					<span class="mpdetail-3">+$50</span>
				</div>
			</div>
			<div class="mp-deatil-outr">
				<span class="mpdetail-1">Admin:</span>
				<div class="col-xs-8 np">
					<span class="mpdetail-2">User Management</span>
					<span class="mpdetail-3">+$50</span>
				</div>
			</div>
			<div class="mp-deatil-outr">
				<span class="mpdetail-1">Other Features:</span>
				<div class="col-xs-8 np">
					<span class="mpdetail-2">Activity feeds or User Wall</span>
					<span class="mpdetail-3">+$50</span>
					<span class="mpdetail-2">In-app purchases</span>
					<span class="mpdetail-3">+$50</span>
					<span class="mpdetail-2">Shopping Cart</span>
					<span class="mpdetail-3">+$50</span>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 	$branches =	CalculatorBranches::model()->findAll('status = 1');

	if(isset($branches)) { ?>
		<nav role="navigation" class="navbar navbar-fixed-top pt10 navbar-custom" id="navbar">
		    <div class="container">
		        <div class="navbar-header">

		            <a class="navbar-brand rs-hide" href="/site"><img class="rs-logo rs-hide" itemprop="image" src="<?php echo Yii::app()->theme->baseUrl; ?>/calculator/img/logo.png" alt="VenturePact Logo" width="188" height="30"></a>
		            <ul class="nav navbar-nav navbar-right mt10 pull-right">
		                <li>
		                	<label class="head-prize hide" id="weightage" >
			                	<?php foreach ($branches as $branch) {
			                		echo "<span>".$branch->name.'</span>-<span id="bwe_'.$branch->id.'">'.'0'.'</span>&nbsp'; 
			                	} 
			                	?> 
		                	</label>
		                </li>
		                <li>
		                	<a href="javascript:void(0);" class="menu-icon"><i class="fa fa-reorder mr5"></i></a>
		                </li>
		            </ul>
		        </div>

		    </div>
		</nav>
	<?php }  ?>
<div class="calculator-main  text-center">
    <section class="page1">
        <div class="container">
            <h3 class="featured-text">Find Your Stream</h3>
            <h4 class="subtext">Take this simple quiz to know your stream
            </h4>
            <p class="text-center mt40">
                <button class="btn btn-red sliding-next get-started"  data-slide="2">Get Started <i class="fa fa-spinner fa-spin"></i></button>
            </p>
            <div class="map-block ">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/calculator/img/map.png" class=" map-img img-responsive">
            </div>
			
			<div class="side-dots hide">
				<div class="col-xs-12 text-center">
				<?php 
				   	$count = 1;
				   	foreach ($categories as $category) { 
				   		if(($category->is_deleted==0) && ($category->is_cal_lpu==1)) {
			   				$count++;
			   				?>
							<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot<?php echo $count;?>" data-slide="<?php echo $count;?>"></span></span>
							<?php 
						}
					}
					?>	
					<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot<?php echo $count+1;?>" data-slide="<?php echo $count+1;?>"></span></span>	
				</div>
			</div>	
        </div>
        
    </section>
    <?php $form=$this->beginWidget('CActiveForm', array(
    								'htmlOptions'=>array(
		                                'onsubmit'=>"return false;",
		                                'onkeypress'=>" if(event.keyCode == 13){ send(); } ",
		                                'class' => "forms", 
		                                'data-parsley-validate' => 'data-parsley-validate'
	                            	),
	                            
		                            'enableClientValidation' => true, 
		                            'id' => 'cost_calculator', 
		                            'clientOptions'=>array('validateOnSubmit'=>true)
	    						)); ?>
   	<?php 
   	$count = 1;
   	foreach ($categories as $category) { 
   	if(($category->is_deleted==0) && ($category->is_cal_lpu==1)) {
   		$count++;	
   		?>

	   	<section class="<?php echo 'page'.$count;?> hide">
		        <div class="container">
		        	
		            <h3 class="featured-text"> <?php echo $category->name;?> </h3>
		            <h4 class="subtext"><?php echo $category->description;?>
		            </h4>
	         
	            <div class="row">
	                <div class="block  text-left">
	            	<?php foreach($category->calculatorQuestions as $question){
	            	?>
	                    <button href="" data-toggle="tooltip" data-trigger="hover" title="Get a Help!" id="" class=" help help1"
	                            data-placement = "bottom"><span class="icon-question text-right pull-right"></span>
	                    </button>
	                    
		                    <h1 class="nm block-head-text"><?php echo $question->question;?></h1>
		                    <div class="col-xs-12 np mb70 ui-theme-block two-section pull-left sAnswer" data-answer = "0">


		                    <?php foreach($question->calculatorOptions as $option){ ?>

			                    <?php 
				                    $weightage = array();
				                    $w  = "";
				                    foreach ($option->calculatorOptionsWeightages as $key => $value) {
				                    	$weightage[$value->calculator_branches_id] = $value->weightage;
				                    	$w.= " data-we-{$value->calculator_branches_id}='$value->weightage' ";
				                    }	                    	

			                     ?>
			                        <div class="col-xs-12 col-sm-6 ic-check "  data-toggle="tooltip" title="Lorem Ipsum is a dummy text!"
			                             data-placement = "bottom" >
			                             <input type="radio" class="header" id="radio_<?php echo $option->id; ?>"  value="<?php echo $option->id; ?>" name="option[<?php echo $question->id ?>][]" <?php echo $w;?> data-question-id = "<?php echo $question->id; ?>">

			                          
			                            <label for="radio_<?php echo $option->id;?>"><div class="icon-box"><div class="vp-ic icon-check">&nbsp;</div></div>
			                                <div class="text"><?php echo $option->options;?></div></label>
			                        </div>
		                    
	                    <?php } ?>
	                    </div>
	                <?php } ?>
	                </div>
	            </div>
	            <button class="btn btn-green sliding-next mb100"  type="button" data-slide="<?php echo $count+1;?>">Proceed <i class="fa fa-spinner fa-spin"></i></button>
	        </div>
	    </section>
    <?php  }
    }?>  
    <section class="page<?php echo $count+1;?> hide">
        <div class="container">
            <h3 class="featured-text">Contact</h3>
            <h4 class="subtext">No spam or unsolicited communication - promise!</h4>
            <div class="row">
                <div class="block text-left">
                    <h1 class="nm block-head-text">You can email me at:</h1>
                    <?php echo CHtml::textField('contact_email','',array('size' => 10, 'class' => 'all-emails text-box textarea-resize-none required', 'placeholder' => 'mark@facebook.com', 'data-parsley-required-message'=>"Email is required",'data-parsley-type'=>"email",'data-parsley-type-message'=>"Email should be valid",'tabindex' => '2')); ?>
                    <!--<input type="text" placeholder="mark@facebook.com" class="text-box mb70">-->
                    <h1 class="nm block-head-text mt70">And my phone no. is: </h1>
                    <?php echo CHtml::textField('contact_phone','',array('size'=>10,'maxlength'=>10,'placeholder'=>'9876543210','class'=>'text-box mb70')); ?>

                    <!--<input type="text" placeholder="mark@facebook.com" class="text-box">-->
                </div>
            </div>
            <div class="col-md-12 mb100">
            <?php echo CHtml::submitButton("Get My Stream", array('id' => 'update', 'class' => 'btn btn-green getdetailed','data-toggle'=>"modal")); ?>
                <!--<button class="btn btn-green getdetailed">Get Detailed Estimate <i class="fa fa-spinner fa-spin"></i></button>-->
                <span class="text-center footer-span mt10">It will compute the most suitable stream for you.</span>
            </div>
        </div>
    </section>

<?php $this->endWidget(); ?>
   <div id="result" class="modal fade in" role="dialog">
		<div class="modal-dialog modal-md">
		<!-- Modal content-->
			<div class="modal-content modal-bg">
				<div class="modal-body col-md-12 pt15 pb15 text-center fs22">
		           <span id='result-message'></span>  

				</div>
			</div>
		</div>
	</div>
</div> 
</body>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/parsley.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script  type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/calculator/js/selectize.js"></script>
<script type="text/javascript">

$(document).ready(function() {
 	
		var weightage=0;
		var allBranches = $("[id^=bwe_]");
		var selectedQuestions = new Array();
	   $("[id^=radio_] ").on("change", function() {
	   		var that = $(this);  
	   		that.closest('.sAnswer').attr('data-answer',that.val()); 	   		
	   		allBranches.each(function(index,val){
				$(this).html('0');
			});

			$('.sAnswer').each(function(){
				console.log($(this).attr('data-answer'));
				var sAnswer = $(this).attr('data-answer');
				if(sAnswer != 0){
					that = $('#radio_'+sAnswer); 
					allBranches.each(function(index,val){
						var bid = $(this).attr("id").split('_')[1];
						var bwe = that.data('we-'+bid);
						var oldval = eval($(this).html());   	
						$(this).html(oldval+bwe);		

					});
				}
			});	

        });

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
    $('#select-beast-empty').selectize({
        create: true
    });
    $('#select-database').selectize({
        create: true
    });
    $('.help').tooltip();
    $('.tip').tooltip();
    $(".get-started").click(function(){
       /*$(".head-prize").addClass("show");
        $(".menu-icon").css("display","none");
*/    });
	
	$(".getdetailed").click(function(){
		$(".page<?php echo $count+1;?>").removeClass("hide");
		$("#navbar").css("display","block");
		$('body').css("overflow","scroll");
    });
	
	$(".close-map").click(function(){
		$(".page<?php echo $count+1;?>").addClass("hide");
		$("#navbar").css("display","block");
		$('body').css("overflow","scroll");
    });
	
	
    $(".sliding-next").on('click',function(){
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
});
</script>
<!-- vmap script -->
<script type="text/javascript">
    $(document).ready(function() {
    	$('#cost_calculator').find('input[type="submit"]').on('click',function () {  
    	var that=$('#update');  
            //var that = $('#result'); 
            	if($("#cost_calculator").parsley().validate()){
            	$('#update').val("Calculating..");
    			$('#result').modal('show');
				console.log("hello");
            	var data=$("#cost_calculator").serialize();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo Yii::app()->createUrl('/costCalculator/computeResults');?>",
                    dataType: 'JSON',
                    data: data,
                    success: function (response) {
                    	//response = JSON.parse(response);
                        if (response.success) {
    						console.log(response.message);
    						$(that).val("Get My Stream");
                        	$('#result-message').html(response.message);
                        	//that.modal('show');
                        	// console.log(response.message);
                        }
                        else {
                        	
                            console.log(response.message);
                        }
                    },
                    error: function () {
                        console.log('internal error');
                    }

                });
             }
        });
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

        /*Zone 2
Middle East Estern Europe Central & South America $50 - $80=> 65 / hour*/
        var zoneqprice2 = 65;

        /*Zone 3
South Asia Africa East Asia South East Asia $30 - $50=> 40 / hour*/
        var zoneqprice3 = 40;
       // var hourcalculated = <?php //echo $user->total_hour; ?> ;
       	
       /* $("[id^=chkbx_] ").on("change", function() {
            if ($(this).prop("checked"))
                hourcalculated += eval($(this).val());
            else
                hourcalculated -= eval($(this).val());

            zoneqprice = eval($(".zone:checked").val());
            $("#totalprice ").html("$" + hourcalculated * zoneqprice + "<sup>*</sup>");
            $("#total_price ").val(hourcalculated * zoneqprice);
        });*/
        // $(".zone").on("change", function() {
        //    // alert($(this).val());
        //     $(".zone").parent().removeClass("btn-primary").addClass("btn-default");
        //     $(this).parent().addClass("btn-primary").removeClass("btn-default");
        //     zoneqprice = eval($(this).val());
        //     $(".totalprice").html("$" + hourcalculated * zoneqprice + "<sup>*</sup>");
        //     console.log("hourcalculated : " + hourcalculated + " - " + zoneqprice);
        // });

        //Email Id validation
        $("#passButSat").click(function() {
            if ($("#email").val().length > 0) {
                $("#hiddenemail").val($("#email").val());
                $("#bs-modal-email").modal("hide");
            } else {
                alert("Please enter email");
            }
        });
		$("#wizard").steps("next");
		$("#wizard").steps("next");
		$("#wizard").steps("next");
		$("#wizard").steps("next");
		$(".actions").addClass("hide");
//$('li.first').addClass('satnam');
$('li.current').addClass('done');
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
<script type="text/javascript" src="js/vmap/js/jquery.vmap.min.js"></script>
<script type="text/javascript" src="js/vmap/js/jquery.vmap.world.js"></script>
<script type="text/javascript" src="js/vmap/js/jquery.vmap.sampledata.js"></script>
</html>