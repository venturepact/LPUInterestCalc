<div class="col-md-12 col-xs-12 mt50 mb25 outerParent">
	<div class="col-md-12 col-xs-12 text-center  rs-mt50">
		<h1 class="fs30 font_newregular mt10 pp-hcolor">
			Hey <?php echo $profile->users->first_name; ?>!
		</h1>
		<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight">Tell us more about your needs <br> and we'll try to find you the best teams, for free</h3>
	</div>
	<div class="side-dots">
		<div class="col-xs-12 text-center">
			<span class="pagination-circle-new mt5"><span class="pc-inside-new slide-dot" data-slide="1"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="2"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="3"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="4"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="5"></span></span>
		</div>
	</div>
	<?php
		$form=$this->beginWidget('CActiveForm',array('id'=>'CreateProjectForm'));
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
	<div class="col-md-12 col-xs-12 mt25 slider1">
		<div class="col-md-12 col-xs-12 pp-box np">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">Lets call this project!</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<?php echo $form->textField($project,'name',array('class'=>'pp-input required', 'placeholder'=>'ex: Facebook, eCommerce For Boats', 'data-parsley-required-message'=>'Project Title is required', 'data-parsley-minlength'=>'2','tabindex'=>'1'));?>
				<!-- <input class="pp-input" id="requirement" placeholder="ex: eCommerce for Boats, Salesforce App" data-parsley-required-message='Project Title is required' data-parsley-minlength='2' type="text"> -->
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt15">
			<button type="button" class="btn btn-teal-new mt15 fs16 font_newregular pl35 pr35 pt5 pb5  first next-btn" data-slide="2" tabindex="2">Proceed <i class="fa fa-spinner fa-spin hide"></i></button>
		</div>
	</div>
	<div class="col-md-12 col-xs-12 mt25 slider2">
		<div class="col-md-12 col-xs-12 text-center mb40">
			<!--<span aria-hidden="true" class="icon-check mt10 mb10 fs40 dark-blue-new"></span>-->
			<div class="checkmark" style="width:65px; display:inline-block;">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px"
					viewBox="0, 0, 100, 100" id="checkmark">
					<g transform="">
						<circle class="path" fill="none" stroke="#666e78  " stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="44"/>
						<circle class="fill" fill="none" stroke="#666e78  " stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="44"/>
						<polyline class="check" fill="none" stroke="#666e78  " stroke-width="8" stroke-linecap="round" stroke-miterlimit="10" 
							points="70,35 45,65 30,52  "/>
					</g>
				</svg>
			</div>
			<h1 class="fs30 font_newregular mt10 pp-hcolor">Got it! </h1>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight">Let's talk a little about the budget. </h3>
		</div>
		<div class="col-md-12 col-xs-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">My approximate budget is</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np pp-location pp-nbr">
					<input type="radio" id="radio08" checked="checked" name="ClientProjects[custom_budget_range]" value="5k - 20k"/>
					<label for="radio08"><span></span>$5k - $20k</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location pp-nbr">
					<input type="radio" id="radio09" name="ClientProjects[custom_budget_range]" value="20k - 100k"/>
					<label for="radio09"><span></span>$20k - $100k</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location pp-nbr">
					<input type="radio" id="radio10" name="ClientProjects[custom_budget_range]" value="100k - 500k"/>
					<label for="radio10"><span></span>$100k - $500k</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location">
					<input type="radio" id="radio11" name="ClientProjects[custom_budget_range]" value="500k+"/>
					<label for="radio11"><span></span>$500k +</label>
				</div>
				<?php //$options = array ('5k - 20k' => '5k - 20k', '20k - 50k' => '20k - 50k', '50k - 200k'=>'50k - 200k','200k - 500k'=>'200k - 500k','500k - 1M'=>'500k - 1M','1M+'=>'1 Million +'); ?>
				<?php //echo $form->dropDownList($project,'custom_budget_range',$options,array('class'=>'demo-default pp-selectstyle pp-select3 display_inline pp-styledropdown selectize-texttrue'));?>
			</div>
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight mt30">and I'll be ready with the specifications & funds</h1>
			<div class="col-xs-12 np mt20">
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location pp-nbr">
					<input type="radio" id="radio04" checked="checked" name="ClientProjects[project_start_preference]" value="1"/>
					<label for="radio04"><span></span>Immediately</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location pp-nbr">
					<input type="radio" id="radio05" name="ClientProjects[project_start_preference]" value="2"/>
					<label for="radio05"><span></span>1-2 weeks</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location pp-nbr">
					<input type="radio" id="radio06" name="ClientProjects[project_start_preference]" value="3"/>
					<label for="radio06"><span></span>2-4 weeks</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location">
					<input type="radio" id="radio07" name="ClientProjects[project_start_preference]" value="4"/>
					<label for="radio07"><span></span>few months</label>
				</div>
				<!--<a href="javascript:void(0);" class="active"><i class="fa fa-check fs12 orange-new"></i> Immediately</a>
				<a href="javascript:void(0);" class=""><i class="fa fa-check fs12 hide orange-new"></i> 1 - 4 Weeks</a>
				<a href="javascript:void(0);" class="pp-nb"><i class="fa fa-check fs12 hide orange-new"></i> Few Months</a>-->
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt50 step-content">
			<button type="button" class="btn btn-teal-new mt15 fs16 font_newregular pl35 pr35 pt5 pb5  next-btn" data-slide="3" tabindex="4">Proceed <i class="fa fa-spinner fa-spin hide"></i></button>
		</div>
	</div>
	<div class="col-md-12 col-xs-12 mt25 slider3 pb50">
		<div class="col-md-12 col-xs-12 text-center mb40">
			<!--<span aria-hidden="true" class="icon-check mt10 mb10 fs40 dark-blue-new"></span>-->
			<div class="checkmark" style="width:65px; display:inline-block;">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px"
					viewBox="0, 0, 100, 100" id="checkmark">
					<g transform="">
						<circle class="path" fill="none" stroke="#666e78  " stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="44"/>
						<circle class="fill" fill="none" stroke="#666e78  " stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="44"/>
						<polyline class="check" fill="none" stroke="#666e78  " stroke-width="8" stroke-linecap="round" stroke-miterlimit="10" 
							points="70,35 45,65 30,52  "/>
					</g>
				</svg>
			</div>
			<h1 class="fs30 font_newregular mt10 pp-hcolor">Duly noted </h1>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight">We will ensure that we find teams within your budget. </h3>
		</div>
		<div class="col-md-12 col-xs-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">Here's some more information about my need:</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<div class="col-xs-12 np">
					<?php echo $form->textArea($project,'description',array('class'=>'pp-input','placeholder'=>'The more the detail, the quicker we can make the introductions','style'=>'max-height: 170px; min-height: 108px','rows'=>'3', 'data-parsley-required-message'=>'Describe your needs in at least 30 characters', 'data-parsley-minlength'=>'30',"tabindex"=>"5"));?>
					<div class="scheduleCall">
						<div class="text-up">
							<div class="smile-image ">
								<span class="count-smiley"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/sile01.png" /></span>
							</div>
							<div class="text-heading-scheduleCall">
								<h4 class="font_newregular title-text">Insufficient Details</h4>
								<p class="font_newlight mb0 title-msg">Some more detail will help us match better!</p>
							</div>
						</div>
						<div class="text-down">
							<p class="font_newlight">Think about user flows or other similar products. 250 characters is usually enough!</p>
							<span class="fs14">OR <a href="javascript:void(0);" data-toggle="modal" data-target="#givecall" class="moveToNext" data-slide="4">Schedule a Call</a> to discuss this over phone.</span>
						</div>
					
						<a href="javascript:void(0)" class="pull-right pt25 fs16 next-btn schedule" data-slide="4">Skip to next step <span class=""><i class="fa fa-long-arrow-right"></i></span></a>
						<img class="toparrow" src="<?php echo Yii::app()->theme->baseUrl."/images/up-blue.png"; ?>" />
						<em class=""></em>
					</div>

					<div class="pp-helpingtip">
					  Talk about the main pivotal features, describe the user flow or give examples of reference websites.
					  <img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/images/profile-rollover-right.png" class="toparrow">
					</div>
					<div class="col-xs-12 np mt10">
						<div class="msgsmiley"></div>
						<div class="display_inline pl5 mt5 char-count"><span id="messagecounter" class="mt5 mr5">0</span>Characters</div>
					</div>
				</div>
			</div>
			<h1 class="fs16 display_inline nm pp-inputcolor font_newlight mt20">I have wireframes, drawings or specs:</h1>
			<div class="col-xs-2 col-md-2 pull-right">
				<a class="attachment-pp pt20 orange-new" id="projectDocs" href="javascript:void(0);">Add <span aria-hidden="true" class="icon-paper-clip orange-new"></span></a>
			</div>
			<div class="col-xs-12 np mt10 placeholder-pp pp-attachment">
				<div class="col-xs-11 col-md-11 pt10 pb10 pl0"  id="ClientProjects_mockup"></div>
			</div>
			<!--<h1 class="fs22 display_inline nm pp-inputcolor font_newlight mt20">Attachments:</h1>
			<div class="col-xs-2 col-md-2 pull-right">
				<a class="attachment-pp pt20 orange-new" id="projectDocs" href="javascript:void(0);">Add <span aria-hidden="true" class="icon-paper-clip orange-new"></span></a>
			</div>
			<div class="col-xs-12 np mt10 placeholder-pp pp-attachment">
				<div class="col-xs-11 col-md-11 pt10 pb10 pl0"  id="ClientProjects_mockup">
					<label class="placeholder-color fs18">You can attached refrence files</label>
				</div>
			</div>-->
		</div>
		<div class="col-md-12 col-xs-12 text-center mt50 step-content">
			<button type="button" class="btn btn-teal-new mt15 fs16 font_newregular pl35 pr35 pt5 pb5  next-btn " data-slide="4" tabindex="6">Proceed <i class="fa fa-spinner fa-spin hide"></i></button>
		</div>
	</div>
	<div class="col-md-12 col-xs-12 mt25 slider4">
		<div class="col-md-12 col-xs-12 text-center mb40">
			<div class="count-smiley"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/sile01.png" /></div>
			<h1 class="fs30 font_newregular mt10 pp-hcolor title-text">Insufficient Details </h1>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight title-msg-step ">Some more detail will help us match better!</h3>
			<h3 class="callconfirm">We can always <a href="javascript:void(0);" data-toggle="modal" data-target="#givecall" class="orange-new font_newregular">Schedule a Call</a> to discuss this over phone.</h3>
		</div>
		<div class="col-md-12 col-xs-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">Here is some information about my company</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<?php echo $form->textField($user,'company_name',array('data-parsley-required-message'=>'Company Name is required', 'class'=>'pp-input required','placeholder'=>'company name',"tabindex"=>"7")); ?>
				<!-- <input class="pp-input" placeholder="company name" type="text"> -->
			</div>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<?php echo $form->textField($profile,'company_link',array('data-parsley-required-message'=>'Company Website link is required', 'class'=>'pp-input required','placeholder'=>'website',"tabindex"=>"9"));?>
				<!-- <input class="pp-input" placeholder="website" type="text"> -->
			</div>
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight mt10">Company Size</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<div class="pp-loc-inner2 col-xs-12 col-sm-2 np  pp-location pp-nbr">
					<input type="radio" id="radio14" checked="checked" name="ClientProjects[team_size]" value="1-5"/>
					<label for="radio14">1-5</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-2 np  pp-location pp-nbr">
					<input type="radio" id="radio15" name="ClientProjects[team_size]" value="5-50"/>
					<label for="radio15">5-50</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-2 np  pp-location pp-nbr">
					<input type="radio" id="radio16" name="ClientProjects[team_size]" value="50-200"/>
					<label for="radio16">50-200</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location">
					<input type="radio" id="radio17" name="ClientProjects[team_size]" value="200-1000"/>
					<label for="radio17">200-1000</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location">
					<input type="radio" id="radio18" name="ClientProjects[team_size]" value="1000+"/>
					<label for="radio18">1000+</label>
				</div>
				<?php //$options = array ('1-5' => '1-5', '5-50' => '5-50', '50-200'=>'50-200','200-1000'=>'200-1000','1000+'=>'1000+'); ?>
				<?php //echo $form->dropDownList($profile,'team_size',$options,array('prompt'=>'Company Size','data-parsley-required-message'=>'Company Size is required', 'class'=>'demo-default pp-selectstyle pp-select4 display_inline pp-styledropdown selectize-texttrue required',"tabindex"=>"8"));?>
				<!-- <select class="demo-default pp-selectstyle pp-select4 display_inline pp-styledropdown selectize-texttrue">
					<option value="0">1-5</option>
					<option value="2">5-50</option>
					<option value="3">50-200</option>
					<option value="4">200-1000</option>
					<option value="5">1000+</option>
				</select> -->
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt20 step-content">
			<button type="button" class="btn btn-teal-new mt15  fs18 font_newlight pl35 pr35 pt5 pb5  next-btn" data-slide="5" tabindex="10">Proceed <i class="fa fa-spinner fa-spin hide"></i></button>
		</div>
	</div>
	<div class="col-md-12 col-xs-12 mt25 slider5">
		<div class="col-md-12 col-xs-12 text-center mb40">
			<!--<span aria-hidden="true" class="icon-check mt10 mb10 fs40 dark-blue-new"></span>-->
			<div class="checkmark" style="width:65px; display:inline-block;">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px"
					viewBox="0, 0, 100, 100" id="checkmark">
					<g transform="">
						<circle class="path" fill="none" stroke="#666e78  " stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="44"/>
						<circle class="fill" fill="none" stroke="#666e78  " stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="44"/>
						<polyline class="check" fill="none" stroke="#666e78  " stroke-width="8" stroke-linecap="round" stroke-miterlimit="10" 
							points="70,35 45,65 30,52  "/>
					</g>
				</svg>
			</div>
			<h1 class="fs30 font_newregular mt10 pp-hcolor">Contact </h1>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight">No spam or unsolicited communication - promise! </h3>
		</div>
		<div class="col-md-12 col-xs-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_block nm pp-inputcolor font_newlight">You can email me at:</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<?php echo $form->textField($project,'summary',array('value'=>$user->username,'data-parsley-required-message'=>'Email is required', 'class'=>'pp-input','placeholder'=>'mail address',"tabindex"=>"11"));?>
				<div class="pp-helpingtip">
				  No spam or unsolicited communication - promise!
				  <img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/images/profile-rollover-right.png" class="toparrow">
				</div>
			</div>
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight mt30">And my phone no. is:</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<?php echo $form->textField($project,'mobile',array('data-parsley-required-message'=>'Phone No. is required', 'class'=>'pp-input required','data-parsley-type'=>"digits",'placeholder'=>'phone number',"tabindex"=>"12"));?>
				<!-- <input class="pp-input" placeholder="(555) 555 55555" type="text"> -->
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt20 mb40 step-content">
			<?php //echo CHtml::submitButton('Get Me Introduced',array('id'=>'finalSubmit','class'=>"btn btn-teal-new mt15  fs18 font_newlight pl35 pr35 pt5 pb5 last next-btn","tabindex"=>"13"));?>
			<button type="submit" id="finalSubmit" class="btn btn-teal-new mt15 fs18 font_light pl35 pr35 pt5 pb5 last next-btn" tabindex="13">Get Introductions & Quotes <i class="fa fa-spinner fa-spin hide"></i></button>
		</div>
	</div>
	<?php $this->endWidget(); ?>
</div>
<!-- Modal for schdule Call Start -->
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
						<?php //foreach($time_zones as $zone){ ?>
							<option class="get-class" value="<?php //echo $zone->id; ?>"><?php //echo $zone->name; ?></option>
						<?php //} ?>
					</select>-->
				</div>
				<span class="phno-text font_newlight">Add Phone Number or Skype ID</span>
				<div class="col-md-12 form-group mt10">														
					<label for="datepicker1" class="field prepend-icon">
						<input type="text" id="mobileNumber" name="mobileNumber" class="gui-input fs13 font_newlight" placeholder="Add Contact">
						<label for="firstname" class="field-icon"><span class="icon-screen-smartphone fs14" aria-hidden="true"></span></label>
					</label>
				</div>
				<div class="col-md-12 form-group mb5">
					<h4 class="mt0 fs16 font_newlight blu-col">Select a few times below that work for you:</h4>

					<h4 class="sec-today fs14 font_newregular gray-col">Today</h4> 
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
										<div class="ckbutton-timming"><label><input type="checkbox" name="today" data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs14 timming-tag-scheduleCall"><?php echo $slot->name; ?></span><label></div>
									<?php
								}
							}
							
							if($count == 0)
								echo "<span class='fs12 timming-tag-scheduleCall'>Sorry, no slots available today.</span>";
						?>
					</div>
				</div>
				<div class="col-md-12 form-group mb5">
					<h4 class="fs14 font_newregular gray-col">Tomorrow</h4>
					<div class="col-md-12 pl0 timing-tag">
						<?php foreach($call_slots as $slot){
								if($slot->category == 2){
						?>
							<div class="ckbutton-timming"><label><input type="checkbox" name="tomorrow" data-category="<?php echo $slot->category; ?>" data-value="<?php echo $slot->name; ?>" value="<?php echo $slot->id; ?>" /><span class="fs14 timming-tag-scheduleCall"><?php echo $slot->name; ?></span><label></div>
						<?php  }}?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 ml10 alert-error admin-form theme-primary hide">
			<span class="orange-new">Please select a slot.</span>
		</div>
     <div class="modal-footer col-md-12 col-xs-12">
        <button type="button" id="callButton" class="btn btn-orange fs12" data-toggle="modal">Done</button>
		<button type="button" class="btn btn-default2 fs12" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal for schdule Call End -->
<script type="text/javascript">
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
			                $('#ClientProjects_mockup').find('label').remove();
			            	$('#ClientProjects_mockup').parent().css('height','auto');
			                $('#ClientProjects_mockup').append(data);
			            }
	        		});
			},
			function(FPError){
				console.log(FPError.toString());
			}
			);
		});
		
		var searchSel = $('#select-car').selectize({
			sortField: 'text',
			maxItems: 5,
			openOnFocus: false,
			closeAfterSelect: true,
			maxOptions:5,
			plugins: ['remove_button'],
			onDelete: function(values) {},
			create: function (input) {
				$.ajax({
					type:'POST',
					url:"<?php echo CController::createUrl("/site/createSkill");?>",
					data : 'name='+input,
					success: function(id){		}
				});
				return {
					value: input,
					text: input
				}
			}
		});
	});

//Code for Schedule Call
    var savedButton;
	var iteration=1;
	var iteration2=1;
	$('#callButton').click(function(){
		var element	= $(this);
		var ids = $('.timing-tag input:checkbox:checked').map(function() {
			return this.value;
		}).get().join(",");
		//$('#ClientProjects_call_time_zone').val($('#timeZoneOption').val());
		$('#ClientProjects_call_available_time').val(ids);
		$('#ClientProjects_mobile').val($('#mobileNumber').val());
		$(this).html('Scheduling ...');
		$(this).attr('disabled','disabled');
		var timings = $('.timing-tag input:checkbox:checked').map(function() {
			if(  $(this).attr('data-category') == 1  && iteration==1 ){
				iteration=0;
				return "Today @ "+$(this).attr('data-value');
				
			}
			else if(  $(this).attr('data-category') == 2  && iteration2==1 ){
				iteration2=0;
				return "Tomorrow @ "+$(this).attr('data-value');
			}
			return $(this).attr('data-value');
		}).get().join(" or ");
		iteration=1;
		iteration2=1;
		if(!(timings.length==0))
		{
			$('.validateSlot').addClass('hide');
			$('.callconfirm').html("Call scheduled for  <a href='javascript:void(0);' data-toggle='modal' data-target='#givecall' class='orange-new font_newregular'>" +timings+"</a>. We'll email you to confirm.");
			$('#givecall').modal('toggle');

			if(!element.parent().siblings('div.alert-error').hasClass('hide'))
			{
				element.parent().siblings('div.alert-error').addClass('hide');
			}

			if(savedButton!=undefined){
				$('.scheduleCall').hide();
				$('.schedule').click();
			}
		}
		else
		{
			element.parent().siblings('div.alert-error').removeClass('hide');
		}	
		$(this).html('Done');
		$(this).removeAttr('disabled');
	});
	
	$('.moveToNext').click(function(){
		savedButton = $(this);
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
		}
		//Score Calculation for Budget and Time
		var budget_range	=	$('#ClientProjects_custom_budget_range').val();
		if(budget_range=="5k - 20k" || budget_range=="20k - 50k")
		{
			lead_score	=	lead_score+1;
		}
		else if(budget_range=="20k - 100k" || budget_range=="100k - 500k" || budget_range=="50k - 200k" || budget_range=="200k - 500k")
		{
			lead_score	=	lead_score+2;
		}
		else if(budget_range=="500k+" || budget_range=="500k - 1M" || budget_range=="1M+")
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
		var skills_data	=	$('#select-car').val();
		if(skills_data != null)
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