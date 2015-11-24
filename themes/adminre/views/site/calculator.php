    <!-- START Template Main -->
    <section role="main" id="main" class="top_position_set">
        <div class="wizard-steps1 border_top"></div>
        <!-- START Template Container -->
        <section class="container-fluid pt5">
            <!-- Page Header -->
            <div class="wizard-header">
                <!-- START Form Wizard -->
				<div class="container">
                    <?php $form=$this->beginWidget('CActiveForm', array('id'=>'wizard-validate','enableClientValidation'=>true,'action'=>CController::createUrl("/site/saveCalculatorData"),'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate')));?>

                    <div class="section-header clearfix">
                        <!-- Zone and price estimator-->
						<!--//-->
						<div class="pull-right col-lg-3 col-sm-12 col-xs-12 pr0 mt10 mb5 mb10 ">
								<!--<div class="col-lg-4 col-sm-12 text-center text-default"><p style="margin-top: 17px;"><span class="ico-location6 ml5 text-default" style="font-size:16px;" data-placement="bottom" data-toggle="tooltip" type="button" data-original-title="text here"></span> Estimate by Location</p></div>-->

								<!--/<div class="col-lg-5 col-sm-12 pr0 mt10 pl0">
									<div class="border-radius text-center">
										<div class="btn-group mr5 mb5">
											<label class="radio-inline radio_btn btn-primary radio_hide" data-placement="bottom" data-toggle="tooltip" data-html="true" type="button" data-original-title="Western&nbspEurope,&nbspUS, Canada &amp; Australia">
                                               <input type="radio" name="zone" class="zone hide" checked value="130" s />Zone 1
                                            </label>
										</div>
										<div class="btn-group mr5 mb5">
											<label class="radio-inline radio_btn btn-default radio_hide" data-placement="bottom" data-toggle="tooltip" data-html="true" type="button" data-original-title="Middle&nbspEast,&nbspEastern Europe, Central &amp; South America">
                                              <input type="radio" name="zone" class="zone hide" value="65" />Zone 2
                                            </label>
										</div>
										<div class="btn-group mr5 mb5">
											<label class="radio-inline radio_btn btn-default radio_hide" data-placement="bottom" data-toggle="tooltip" data-html="true" class="btn btn-default" type="button" data-original-title="South&nbspAsia,&nbspAfrica, East Asia &amp; South East Asia">
                                               <input type="radio" name="zone" class="zone hide" value="40" />Zone 3
                                            </label>
										</div>
									</div>
								</div>-->
								<div class="col-lg-12 text-center pl0 pr0">
									<h3 class="bold text-success mb0 mt0" id="totalprice">$0</h3>
									<h6 class="mt5 text-default"><i class="ico-money"></i> Your App Estimate</h6>
								</div>
							</div>


                        <!--// Zone and price estimator-->



                    </div>

                    <!-- Wizard Container 1 -->
					<input type="hidden" name="email" value="<?php echo $user->username; ?>" id="hiddenemail"/>
                    <script>
                        var email= $("#hiddenemail").val();
                        localStorage.setItem("hiddenemail",email);
                    </script>
					<input type="hidden" name="total_price" value="" id="total_price"/>
					<input type="hidden" name="total_hour" value="" id="total_hour"/>

                    <!--/ Wizard Container 1 -->
                    <?php
                    $total_price = CalculatorUsers::model()->findAllByAttributes(array('id'=>base64_decode($_GET["pid"])));
                    if(!empty($total_price[0]->total_hour))
                    {
                     ?>
                    <script>
                        $(document).ready(function(){
                           <?php
                           //for retreiving user history if user clicks back button
                            $user_history = CalculatorResult::model()->findAllByAttributes(array('users_id'=>base64_decode($_GET["pid"])));

                            foreach($user_history as $history)
                            {
                                ?>
                                $("#chkbx_" + <?php echo $history->option_id; ?> ).attr("checked","checked");
                                <?php
                            }

                            
                            
                           
                            ?>

                            var zoneqprice1 = 130;
                            var zoneqprice2 = 65;
                            var zoneqprice3 = 40;
                            var hourcalculated = <?php echo $total_price[0]->total_hour; ?>;
                            $("#totalprice ").html("$" + hourcalculated * zoneqprice3 + "&nbsp-&nbsp" + "$" + hourcalculated * zoneqprice1);
                            $("#total_price ").val( hourcalculated * zoneqprice3);
                			$("#total_hour").val(hourcalculated);


                        });
                    </script>
                    <?php
                    }
                     ?>

                   <?php

                   //CVarDumper::Dump($total_price[0]->total_hour,10,1);
                   ?>
                    <?php if(isset($data)){ ?>
                    <!-- Wizard Container  -->

                    <?php
					$j = 0; $t=0;
                    $array = array();

					foreach($data as $category){

				    if($t==0)
                    {
                        ?>
                        <style>
                            .disabled
                            {
                                display: none;
                            }
                            .actions
                            {
                                height: 58px;
                            }
                        </style>
                        <?php
                        $t=1;
                    }

                    $array[$j] = $category->id;
					$j++;
					?>
                    <!--Rendering Category -->


                    <div class="wizard-title">
                        <?php echo $category->name;?></div>
                    <div class="wizard-container pl0 pr0">

                        <div class="col-md-12 bg-white border-bottom-0 all-border border-radius-top border-radius-bottom pa15">
                            <div class="col-md-8 border-show border-hide mt0">
                                <!--Rendering Questions in the category-->
                                <?php

                                $count_questions = 0;
								foreach($category->calculatorQuestions as $question ){
									//hold the first question description
										$qDescription = "";

								?>

								<?php
									/*check if question is active or not*/
									if($question->is_deleted == 0){

										$qDescription = $question->description;

                                if($count_questions==0)
                                {
                                    ?>
                                    <div class="hide" id="cat_desc_<?php echo $category->id; ?>"><?php echo $qDescription; ?></div>
                                    <?php
                                    $count_questions = 1;
                                }
								?>

                                <div class="form-group border-top-none" onmouseover="changeContent('<?php echo "desc_".$question->id; ?>','<?php echo "main_desc_".$category->id; ?>','<?php //echo htmlentities($question->description); ?>')" >

                                    <label class="col-sm-5 control-label pb10">
                                        <a href="#" >
                                            <?php echo $question->question; ?> <span class="text-danger hide">*</span>
                                        </a>
										<div>
										<small style="font-size:10px" class="hide <?php echo "desc_".$question->id; ?>"><?php echo $question->description;?></small>
										</div>
                                    </label>
                                    <!--Rendering Options of the question in the category-->

                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php foreach($question->calculatorOptions as $option ){ ?>
												<?php
													/*check if option is not deleted*/
													if($option->is_deleted == 0){
												?>
												<div class="checkbox custom-checkbox">
													<input type="checkbox" value="<?php echo $option->id; ?>" id="chkbx_<?php echo $option->id; ?>" name="checkbox[<?php echo $question->id; ?>][]" data-hour="<?php echo $option->hour; ?>">
													<label for="chkbx_<?php echo $option->id ?>">&nbsp;&nbsp;
														<?php echo $option->options; ?></label>
												</div>
                                                <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Rendering Options of the question in the category-->
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <!--/ Rendering Questions in the category-->

                            </div>
                            <!--Category Description -->
                            <div class="col-md-4 right-side-hide border-left">
								<div class="col-sm-12 content_outer" id="<?php echo "main_desc_".$category->id; ?>">
									<h4 class="semibold mt15 mb15 pb5"><i class="ico-money"></i> Hover on question</h4>
									<p class="text-muted line-height24">To see the the question help hover on to it.</p>
								</div>
                            </div>
                            <!--/ Category Description -->
                        </div>
                    </div>
                    <?php } ?>
                    <!--/ Rendering Category -->
                    <?php } ?>
                    <!--/ Wizard Container -->

                    <?php $this->endWidget(); ?>

                </div>
                <!--/ END Form Wizard -->
            </div>
            <!--/ Page Header -->
        </section>
        <!--/ END Template Container -->

        <!-- START To Top Scroller -->
        <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
        <!--/ END To Top Scroller -->
    </section>
    <!--/ END Template Main -->






 <!-- app init script -->

    <script type="text/javascript">

        $(document).ready(function() {

			$("html").Core({
                "console": false
            });
			 //$("#bs-modal-email").modal({
				//backdrop: 'static',
				//keyboard: false  // to prevent closing with Esc button (if you want this too)
			//});
			//$("#bs-modal-email").modal("show");
            $("html,body").scrollTop(0);

            <?php
            for($i=0;$i<count($array);$i++)
            {
                ?>
                changeContent1('<?php echo $array[$i]; ?>');
                <?php
            }

             ?> 

        });

        function changeContent(desc,id, msg) {
		    var content = '<h4 class="semibold mt0 mb15 pb5"><i class="ico-lightbulb mr5"></i> Hover on question</h4><p class="text-muted line-height24">To see the the question help hover on to it.</p>';
			var msg  = $("."+desc).html();
            var el = document.getElementById(id);
            if (id) {
                if (msg != "origContent")
                    el.innerHTML = msg;
                else
                    el.innerHTML = content;
            }
        }




        function changeContent1(id) {
		    var content = '<h4 class="semibold mt0 mb15 pb5"><i class="ico-lightbulb mr5"></i> Hover on question</h4><p class="text-muted line-height24">To see the the question help hover on to it.</p>';
			var msg  = $("#cat_desc_"+id).html();


            var el = document.getElementById("main_desc_" + id);
            if (id) {
                if (msg != "origContent")
                    el.innerHTML = msg;
                else
                    el.innerHTML = content;
            }
        }

    </script>
    <!--/ app init script -->

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
            $("#totalprice ").html("$" + hourcalculated * zoneqprice3 + "&nbsp-&nbsp" + "$" + hourcalculated * zoneqprice1);
            $("#total_price ").val( hourcalculated * zoneqprice3);
			$("#total_hour").val(hourcalculated);
        });
        $(".zone").on("change", function() {
            //alert($(this).val());
            $(".zone").parent().removeClass("btn-primary").addClass("btn-default");
            $(this).parent().addClass("btn-primary").removeClass("btn-default");
            zoneqprice = eval($(this).val());
            localStorage.setItem("zone_price", zoneqprice);
            console.log(localStorage.getItem("zone_price"));
            $("#totalprice ").html("$" + hourcalculated * zoneqprice);
			$("#total_price ").val(hourcalculated * zoneqprice);
			$("#total_hour").val(hourcalculated);
        });

		//fake forrm get and validate
		var fake_form = $("#fake-form").parsley();
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
