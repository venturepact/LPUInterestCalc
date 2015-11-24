
<!-- Static Top Header for Create Project -->
<div class="col-md-12 col-xs-12 text-center">
	<h1 class="text_white fs40 font_newregular mt10">
		Hey <?php echo $profile->users->first_name; ?>!
	</h1>
	<h3 class="cp-text fs26 mt10">Tell the teams a little more about your needs <br><span class="fs16">(will only take 30 seconds)</span></h3>
</div><!-- end: Static Top for Create Project -->

<!-- Static Top Pager for Create Project -->
<div class="col-md-12 col-xs-12 np mt40 mb40">
	<div class="col-md-4 col-xs-2 cp-border-t cp-border-b np mt10"></div>
	<div class="col-md-4 col-xs-8 text-center">
		<span class="pagination-circle"><span id="step-1" class="pc-inside"></span></span>
		<span class="pagination-circle"><span id="step-2" class="pc-inside-light"></span></span>
		<span class="pagination-circle"><span id="step-3" class="pc-inside-light"></span></span>
		<span class="pagination-circle"><span id="step-4" class="pc-inside-light"></span></span>
	</div>

	<div class="col-md-4 col-xs-2 cp-border-t cp-border-b np mt10"></div>
</div><!-- end: Static Top Pager for Create Project -->

<!-- Start Create project Form -->

<?php

	$form=$this->beginWidget('CActiveForm',array('id'=>'CreateProjectForm','htmlOptions'=>array('data-parsley-validate'=>'data-parsley-validate')));
	echo $form->hiddenField($project,'id',array('id'=>'ClientProjectId'));
	echo $form->hiddenField($project,'client_profiles_id',array('value'=>Yii::app()->user->clientProfileId));
	echo $form->hiddenField($project,'mobile');
	echo $form->hiddenField($project,'call_time_zone',array('value'=>Yii::app()->user->tz));
	echo $form->hiddenField($project,'call_available_time');
	echo $form->hiddenField($project,'lead_score',array('value'=>'0'));

    //Hidden Fields for data from Search Form
    echo CHtml::hiddenField('skills','',array('id'=>'skills'));
    echo CHtml::hiddenField('industry','',array('id'=>'industry'));
    echo CHtml::hiddenField('rangeSlider','',array('id'=>'rangeSlider'));
    echo CHtml::hiddenField('location','',array('id'=>'location'));
    echo CHtml::hiddenField('selectedSuplliers','',array('id'=>'selectedSuplliers'));
		?>
	<!-- Need a team slide -->
	<div class="col-md-12 col-xs-12 mt25 slide-div2 currentSlide" id="slide-1">
		<div class="col-md-12 col-xs-12 text-center np">
			<div class="mt10 vali-outr">
				<h2 class="fs32 text_white display_inline mr10">Lets call this project</h2>
				<?php echo $form->textField($project,'name',array('class'=>'cp-input col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 required', 'placeholder'=>'ex: Facebook, eCommerce For Boats', 'data-parsley-required-message'=>'Project Title is required', 'data-parsley-minlength'=>'2'));?>
				<?php //$options = array ('0' => 'to execute a project independently', '1' => 'to work with my existing team'); ?>
				<?php //echo $form->dropDownList($project,'business_problem',$options,array('class'=>'selectize-texttrue demo-default cp-selectstyle cp-select display_inline cp-styledropdown'));?>
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt15">
			<button type="button" class="btn btn-orange mt15 fs16 font_newregular pl35 pr35 pt5 pb5 sliding-next2 next-btn">Next</button>
		</div>
	</div><!-- end: Need a team slide -->

	<!-- Budget Details Slide -->
	<div class="col-md-12 col-xs-12 mt25 slide-div3" id="slide-2">
		<div class="col-md-12 col-xs-12 np">
			<div class="mt10 rs-center">
				<h1 class="col-md-6 col-xs-12 fs32 text_white mr15 np rs-center text-right rs-textnone">My budget is USD</h1>
				<?php $options = array ('5k - 20k' => '5k - 20k', '20k - 50k' => '20k - 50k', '50k - 200k'=>'50k - 200k','200k - 500k'=>'200k - 500k','500k - 1M'=>'500k - 1M','1M+'=>'1 Million +'); ?>
				<?php echo $form->dropDownList($project,'custom_budget_range',$options,array('class'=>'demo-default cp-selectstyle cp-select3 display_inline cp-styledropdown selectize-texttrue'));?>
				<h1 class="display_inline fs32 text_white ml15 np text-right rs-textnone rs-hide hide">and</h1>
			</div>
		</div>
		<div class="col-md-12 col-xs-12 np">
			<div class="mt10 rs-center text-center">
				<h1 class="col-md-12 col-xs-12 fs32 text_white mr15 np text-right rs-textnone text-center mt0">and I'll be ready with the funds and specifications <?php
					echo $form->dropDownList($project,'project_start_preference',array('1'=>'immediately','2'=>'in next 1-2 weeks','3'=>'in next 2-4 weeks','4'=>'in next few months'),array('class'=>'selectize-texttrue demo-default cp-selectstyle cp-select5 display_inline cp-styledropdown'));
				?></h1> 
				
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt40 mb40">
			<button type="button" class="btn btn-orange mt15 fs16 font_newregular pl35 pr35 pt5 pb5 sliding-next3 next-btn">Next</button>
		</div>
	</div><!-- end: Budget Details Slide -->

	<div class="col-md-12 col-xs-12 mt25 slide-div4" id="slide-3">
		<div class="col-md-12 col-xs-12 text-center np">
			<div class="mt10">
				<h1 class="fs32 text_white display_inline mr10">Here is some more info about my project</h1>
				<div class="col-md-12 col-xs-12 mt10">
					<div class="col-md-10 np"><?php echo $form->textArea($project,'description',array('class'=>'cp-textarea col-md-12 col-xs-9 rs-nm required','placeholder'=>'The more the detail, the quicker we can make the introductions','style'=>'max-height: 170px; min-height: 108px','rows'=>'3', 'data-parsley-required-message'=>'Please describe your needs in at least 30 characters so we can make a good match', 'data-parsley-minlength'=>'30'));?></div>
					<a href="javascript:void(0);" id="projectDocs" class="cp-input-a col-md-1 col-xs-2 ml30"><span class="icon-paper-clip orange-new" aria-hidden="true"></span></a>
				</div>
				<div class="col-sm-12 col-xs-12 mt10" id="ClientProjects_mockup">
	            </div>
				<div class="col-md-12 col-xs-12 mt10">
					<h1 class="fs32 text_white display_inline mr10">You can also</h1>
					<span class="icon-clock fs20 orange-new" aria-hidden="true"></span>
					<a href="javascript:void(0);" data-toggle="modal" data-target="#givecall" class="fs24 line-height40 orange-new tu" id="callLink">&nbsp;Schedule a call with us</a>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt50">
			<button type="button" class="btn btn-orange mt15 fs16 font_newregular pl35 pr35 pt5 pb5 sliding-next4 next-btn">Next</button>
		</div>
	</div>

	<div class="col-md-12 slide-div5" id="slide-4">
		<div class="col-md-12 text-center np">
			<h1 class="fs32 text_white display_inline mr10">Finally, here is some info about my company</h1>
			<div class="mt10 col-md-12 col-xs-12">
				<?php echo $form->textField($user,'company_name',array('data-parsley-required-message'=>'Company Name is required', 'class'=>'cp-input col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 required','placeholder'=>'company name'));?>
			</div>
			<div class="mt20 col-md-12 col-xs-12">
				<?php $options = array ('1-5' => '1-5', '5-50' => '5-50', '50-200'=>'50-200','200-1000'=>'200-1000','1000+'=>'1000+'); ?>
				<?php echo $form->dropDownList($profile,'team_size',$options,array('prompt'=>'Company Size','data-parsley-required-message'=>'Company Size is required', 'class'=>'required demo-default cp-selectstyle display_inline cp-select-size cp-styledropdown selectize-texttrue'));?>
			</div>
			<div class="mt20 col-md-12 col-xs-12">
				<?php echo $form->textField($profile,'company_link',array('data-parsley-required-message'=>'Company Website link is required', 'class'=>'cp-input col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 required','placeholder'=>'website'));?>
			</div>
			<div class="mt20 col-md-12 col-xs-12">
				<h1 class="fs32 text_white display_inline mr10">I can be reached at</h1>
				<?php echo $form->textField($project,'mobile',array('data-parsley-required-message'=>'Phone No. is required', 'class'=>'cp-input col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 required','data-parsley-type'=>"digits",'placeholder'=>'phone number'));?>
			</div>
		</div>
		<div class="col-md-12 text-center mt20">
			<?php echo CHtml::submitButton('Get Connected',array('id'=>'finalSubmit','class'=>"btn btn-orange mt15 fs20 font_newregular pl35 pr35 pt5 pb5"));?>
		</div>
	</div>

	<div class="back-project hide">
		<a href="javascript:void(0);"><span class="icon-arrow-left text_white fs28" aria-hidden="true"></span></a>
	</div>
<?php $this->endWidget(); ?>

<!-- Modal for Call Start -->
<div id="givecall" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content col-md-12 np">
      <div class="modal-header pa20 new-modal-bg">
        <h2 class="modal-title fs22 text-center" id="myModalLabel">Schedule a Call</h2>
      </div>
		<div class="modal-body col-md-12 np new-modal-bg">
			 <div class="col-md-12 mt30 mb10 admin-form theme-primary">
				<div class="col-md-12 form-group hide">
					<label for="datepicker1" class="field prepend-icon">
						<input type="text" id="timeZoneOption" name="timeZoneOption" class="gui-input" disabled="disabled" placeholder="Time Zone" value="<?php echo Yii::app()->user->tz;?>">
						<label for="firstname" class="field-icon"><span class="icon-globe fs14" aria-hidden="true"></span></label>
					</label>
					<!--<select id="timeZoneOption" class="demo-default selectize-typee">
						<option class="get-class" value="">Select Time Zone</option>
						<?php /*foreach($time_zones as $zone){ ?>
							<option class="get-class" value="<?php echo $zone->id; ?>"><?php echo $zone->name; ?></option>
						<?php }*/ ?>
					</select>-->
				</div>
				<div class="col-md-12 form-group">
					<label for="datepicker1" class="field prepend-icon">
						<input type="text" id="mobileNumber" name="mobileNumber" class="gui-input" placeholder="What phone number or Skype ID can we reach you on?">
						<label for="firstname" class="field-icon"><span class="icon-screen-smartphone fs14" aria-hidden="true"></span></label>
					</label>
				</div>
				<div class="col-md-12 form-group mb5">
					<h4 class="mt0 font_newregular">What times are you available?</h4>
					<h4 class="fs13 sec-today">Today</h4>
                    <div class="col-md-12 pl0 timing-tag sec-today">
						<?php
							$count	=	0;
							foreach($call_slots as $slot){
								$admin_tz = "America/New_York";
								$d = new DateTime("now", new DateTimeZone($slot->value));
								$date =	DateTime::createFromFormat('m/d/Y g:i a', $d->format('m/d/Y')." ".$slot->name, new DateTimeZone($slot->value));
								$admin_date = $date->setTimeZone(new DateTimeZone($admin_tz));
								$admin_now = new DateTime("now", new DateTimeZone($admin_tz));
								if($slot->category == 1 && ($admin_date > $admin_now))
								{
									$count	=	1;
									?>
										<div class="ckbutton-timming"><label><input type="checkbox" name="today" data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs14 timming-tag"><?php echo $slot->name; ?></span><label></div>
									<?php
								}
							}

							if($count == 0)
								echo "<span class='fs12 timming-tag'>Sorry, no slots available today.</span>";
						?>
					</div>
				</div>
				<div class="col-md-12 form-group mb5">
					<h4 class="fs13">Tomorrow</h4>
					<div class="col-md-12 pl0 timing-tag">
						<?php foreach($call_slots as $slot){
								if($slot->category == 2){
						?>
							<div class="ckbutton-timming"><label><input type="checkbox" name="tomorrow"  data-category="<?php echo $slot->category; ?>"  data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs14 timming-tag"><?php echo $slot->name; ?></span><label></div>
						<?php  }}?>
					</div>
				</div>
			</div>
		</div>
     <div class="modal-footer col-md-12 pa20">
        <button type="button" id="callButton" class="btn btn-orange fs12" data-toggle="modal">Done</button>
		<button type="button" class="btn btn-default2 fs12" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal for Call End -->
<style type="text/css">
 ::-webkit-input-placeholder { /* WebKit browsers */
    color:    #e25a44;
     opacity: 1 !important;
 }
 ::-moz-placeholder { /* WebKit browsers */
    color:    #e25a44;
     opacity: 1 !important;
 }
 body{min-height:500px;}
</style>
<script>
$(document).ready(function(){

	<?php if($count == 0){ ?>
	$('.sec-today').addClass('hide');
	<?php } ?>

    //Data from Search Form
	var skills = localStorage.getItem('skills');
	var location = localStorage.getItem('projectLocation');
	var selectedSuplliers = localStorage.getItem('selectedSuplliers');
	var industry = localStorage.getItem('industry');
	var rangeSlider = localStorage.getItem('rangeSlider');
    $('#skills').val(skills);
    $('#location').val(location);
    $('#selectedSuplliers').val(selectedSuplliers);
    $('#industry').val(industry);
    $('#rangeSlider').val(rangeSlider);
	//Add attachments
	$('#projectDocs').click(function(){
		filepicker.setKey("ANQWcFDQRUiGfBqjfgINQz");
		filepicker.pickMultiple({mimetypes: ['image/*', 'text/*', 'application/pdf','application/msword','application/vnd.ms-excel','application/vnd.ms-powerpoint'],},
		function(InkBlob){
        		$.ajax({
            		type:'POST',
            		url:"<?php echo CController::createUrl("/client/deleteDocs",array('id'=>''));?>"+$("#ClientProjectId").val(),
            		data : 'data='+JSON.stringify(InkBlob),
		            success:function(data){
		                $('#ClientProjects_mockup').append(data);
		            }
        		});
		},
		function(FPError){
			console.log(FPError.toString());
		}
		);
	});

	/*$(document).on('hidden.bs.modal','#givecall',function(e) {
		$('#timeZoneOption').val('');
		$('#datepicker1').val('');
	});*/

	$('span[id^="step-"]').click(function() {
		console.log('clicked',$(this).parent().next().children('.pc-inside').length);
		if($(this).hasClass('pc-inside') && $(this).parent().next().children('.pc-inside').length != 0) {
			var thisId = $(this).attr('id');
			var switchId = thisId.split('-')[1];
			var currentId = $('.currentSlide').attr('id').split('-')[1];
			console.log("To: " + switchId + " - From : " + currentId);

			// change the slides now
			$("body").css("overflow", "hidden");
			$('#slide-' + currentId).animo({animation: "fadeOutRight", duration: 0.5, keep: true},function() {
				$('#slide-' + currentId).hide();
				$('#slide-' + switchId).show().animo({animation: "fadeInLeft", duration: 0.5},function(){
					$("body").addClass("scroll-height");
					$("body").removeClass("no-scroll");
				});
			});
			for(var i = currentId; i > switchId; i--) {
				$("#step-"+i).removeClass("pc-inside").addClass("pc-inside-light");
			}

			$('#slide-'+currentId).removeClass('currentSlide');
			$('#slide-'+switchId).addClass('currentSlide');
		}
	});

	$('.back-project').on('click', function(e) {
		e.preventDefault();
		var slideFrom = $(this).parent().attr('id').split('-')[1];
		var slideTo = slideFrom - 1;

		$("body").css("overflow", "hidden");
		$('#slide-' + slideFrom).animo({animation: "fadeOutRight", duration: 0.5, keep: true},function() {
			$('#slide-' + slideFrom).hide();
			$('#slide-' + slideTo).show().animo({animation: "fadeInLeft", duration: 0.5},function(){
				$("body").addClass("scroll-height");
				$("body").removeClass("no-scroll");
			});
		});

		$('#step-' + slideFrom).addClass('pc-inside-light').removeClass('pc-inside');
		$('#slide-'+ slideFrom).removeClass('currentSlide');
		$('#slide-'+ slideTo).addClass('currentSlide');
	});

	$('.next-btn').click(function(e){
		var that = $(this);
		var validate;
		if($('.slide-div2').hasClass('currentSlide'))
		{
			validate	=	$('#ClientProjects_name').parsley().validate();
			if(validate == true)
			{
				$('#ClientProjects_name').parent().find('ul').find('.check').hide();
			}
			else
			{
				$('#ClientProjects_name').parent().find('ul').find('.check').show();
			}
		}
		else if($('.slide-div4').hasClass('currentSlide'))
		{
			validate	=	$('#ClientProjects_description').parsley().validate();
			if(validate == true)
			{
				$('#ClientProjects_description').parent().find('ul').find('.check').hide();
			}
			else
			{
				$('#ClientProjects_description').parent().find('ul').find('.check').show();
			}
		}
		else
		{
			validate = true;
		}
		if(validate == true)
		{
			$(this).attr('disabled', true);
			var form=$("#CreateProjectForm").serialize();
			$.ajax({
				url:"<?php echo Yii::app()->createUrl('site/projectCreate'); ?>",
				method:'POST',
				data:form,
				success:function(data){
					$("#ClientProjectId").val(data);
					if($('.slide-div2').hasClass('currentSlide')){
						$("body").css("overflow", "hidden");
						$('.slide-div2').animo({animation: "fadeOutLeft", duration: 0.5, keep: true},function() {
							$('.slide-div2').hide();
							$('.slide-div3').show().animo({animation: "fadeInRight", duration: 0.5},function(){
								$("body").addClass("scroll-height");
								$("body").removeClass("no-scroll");
								$('.slide-div2').removeClass('currentSlide');
								$('.slide-div3').addClass('currentSlide');
							});
						});
						$("#step-2").removeClass("pc-inside-light").addClass("pc-inside");
						goog_report_conversion(document.location.href);
					}
					that.attr('disabled', false);
				}
			});
		}
		else
		{
			e.preventDefault();
		}
	});

	$('#finalSubmit').click(function(){
		if($('#CreateProjectForm').parsley().validate() == true)
		{
			calculateLead();
			goog_report_conversion('<?php echo Yii::app()->createAbsoluteUrl(Yii::app()->request->url); ?>');
		}
	});
});

//handle deletion of attachments
function deleteDocs(element){
	 element.parent().parent().find('a').html('Deleting ...');
	 element.parent().parent().find('.ref-file-show').hide();
    $.ajax({
        type:'POST',
        url:"<?php echo CController::createUrl("/client/deleteDocs",array('id'=>''));?>"+$("#ClientProjectId").val(),
        data : 'action=delete&imageId='+element.attr('data-id'),
        success:function(data){
            if(data==1){
                element.parent().parent().hide();
            }
        },
        error:function(){

        }
    });
}

//Calculate Lead Score
function calculateLead()
{
	var lead_score	=	parseInt($('#ClientProjects_lead_score').val());
	//Score Calculation for Name
	var name_len	=	parseInt($('#ClientProjects_name').val().length);
	if(name_len > 0)
	{
		lead_score	=	lead_score+1;
	}
	//Score Calculation for Region Preference
	/*
	var zones		=	localStorage.getItem('zones');
	var location	=	localStorage.getItem('location');
	console.log(lead_score);
	if(location!=''){
		if(location.indexOf("Country") > -1 || location.indexOf("City") > -1){
			lead_score	=	lead_score+2;
		}
	}else{
		if(zones!=''){
			lead_score	=	lead_score+1;
		}
	}
	
	
	var pref	=	$('#project_preferences').val();
	if(pref=="0")
	{
		console.log('No Change');
		//lead_score	=	lead_score+0;
	}
	else if(pref=="country")
	{
		lead_score	=	lead_score+2;
	}
	else if(pref="regions")
	{
		lead_score	=	lead_score+1;
	}*/
	//Score Calculation for Budget and Time
	var budget_range	=	$('#ClientProjects_custom_budget_range').val();
	if(budget_range=="5k - 20k" || budget_range=="20k - 50k")
	{
		lead_score	=	lead_score+1;
	}
	else if(budget_range=="50k - 200k" || budget_range=="200k - 500k")
	{
		lead_score	=	lead_score+2;
	}
	else if(budget_range=="500k - 1M" || budget_range=="1M+")
	{
		lead_score	=	lead_score+3;
	}
	var time	=	$('#ClientProjects_project_start_preference').val();
	if(time=="1")
	{
		lead_score	=	lead_score+3;
	}
	else if(time=="2")
	{
		lead_score	=	lead_score+2;
	}
	else if(time="3")
	{
		lead_score	=	lead_score+1;
	}
	else if(time="4")
	{
		console.log('No Change');
		//lead_score	=	lead_score+0;
	}
	//Score Calculation for Skills
	if($('#skills').val() != "")
	{
		lead_score	=	lead_score+1;
	}
	//Score Calculation for Description
	var description_len	=	parseInt($('#ClientProjects_description').val().length);
	if(description_len > 50 && description_len < 100)
	{
		lead_score	=	lead_score+2;
	}
	else if(description_len > 100)
	{
		lead_score	=	lead_score+3;
	}
	else
	{
		lead_score	=	lead_score+1;
	}
	//Score Calculation for Company Profile
	var check_client_len	=	parseInt($('#Users_company_name').val().length);
	if(check_client_len > 0)
	{
		lead_score	=	lead_score+1;
	}
	check_client_len	=	parseInt($('#ClientProfiles_company_link').val().length);
	if(check_client_len > 0)
	{
		lead_score	=	lead_score+1;
	}
	check_client_len	=	parseInt($('#ClientProjects_mobile').val().length);
	if(check_client_len > 0)
	{
		lead_score	=	lead_score+1;
	}
	if($('#ClientProfiles_team_size').val() != "")
	{
		lead_score	=	lead_score+1;
	}
	console.log(lead_score);
	lead_score	=	Math.round((lead_score/17)*10);
	//Set New Lead Score
	$('#ClientProjects_lead_score').val(lead_score);
}
</script>
<style>html{background:#5acccd ;}</style>