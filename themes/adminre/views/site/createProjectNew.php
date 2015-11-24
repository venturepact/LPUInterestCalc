<div class="col-md-12 col-xs-12 mt50 mb25 outerParent">
	<div class="col-md-12 col-xs-12 text-center rs-mt50">
		<h1 class="fs30 font_newregular mt10 pp-hcolor">Hey 
		<?php
		if(!Yii::app()->user->isGuest)
			 echo $user->first_name;
		else
			echo 'There';
		?>
		! 
		</h1>
		<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight">We have a few questions about your needs. <br> It will only take ~ 60 seconds!</h3>
	</div>
	<div class="side-dots">
		<div class="col-xs-12 text-center">
			<span class="pagination-circle-new mt5"><span class="pc-inside-new slide-dot" data-slide="1"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="2"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="3"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="4"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="5"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="6"></span></span>
			<span class="pagination-circle-new mt5"><span class="pc-inside-light-new slide-dot" data-slide="7"></span></span>
		</div>
	</div>
	<?php
		$form=$this->beginWidget('CActiveForm',array('id'=>'CreateProjectForm'));
		echo $form->hiddenField($project,'id',array('id'=>'ClientProjectId'));
		echo $form->hiddenField($project,'mobile');
		if(!Yii::app()->user->isGuest){
			echo $form->hiddenField($project,'client_profiles_id',array('value'=>Yii::app()->user->clientProfileId));
			echo $form->hiddenField($project,'call_time_zone',array('value'=>Yii::app()->user->tz));
		}
		else{
			$ip 					= 	$_SERVER['REMOTE_ADDR'];
			$value 					= 	$this->getTimeZone($ip);
			$user_tz 				= 	$value['timezone'];
			echo $form->hiddenField($project,'call_time_zone',array('value'=>$user_tz));			
		}
		echo $form->hiddenField($project,'call_available_time');
		echo $form->hiddenField($project,'lead_score',array('value'=>'0'));
	?>
	<div class="col-md-12 col-xs-12 mt25 slider1">
		<div class="col-md-12 col-xs-12 pp-box np">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">First, let's give this project a name:</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<?php echo $form->textField($project,'name',array('class'=>'pp-input required', 'placeholder'=>'ex: Facebook, eCommerce For Boats', 'data-parsley-required-message'=>'Project Title is required', 'data-parsley-minlength'=>'2'));?>
				<!-- <input class="pp-input" id="requirement" placeholder="ex: eCommerce for Boats, Salesforce App" data-parsley-required-message='We Require a Project Title' data-parsley-minlength='2' type="text"> -->
			</div>
			<!-- <div class="col-xs-12 np mt20 placeholder-pp">	
			<?php 
			//if(Yii::app()->user->isGuest) {
				//echo $form->textField($users,'first_name',array('class'=>'pp-input required', 'placeholder'=>'Name', 'data-parsley-required-message'=>'Name is required', 'data-parsley-minlength'=>'2'));
			//}
		    ?>
			</div>
			<div class="col-xs-12 np mt20 placeholder-pp">
			<?php 
			//if(Yii::app()->user->isGuest) {
				//echo $form->emailField($users,'username',array('class'=>'pp-input required email', 'placeholder'=>'Your Email Address', 'data-parsley-required-message'=>'Email is required'));
			//}
			?>
			</div> -->
		</div>
		<?php //if(!Yii::app()->user->isGuest) { ?>
		<div class="col-md-12 col-xs-12 text-center mt15">
			<button type="button" class="btn btn-teal-new mt15 fs18 font_light pl35 pr35 pt5 pb5  first next-btn" data-slide="2" data-analytics="project_name">Get Started <i class="fa fa-spinner fa-spin hide"></i></button>
		</div>
		<?php// }else{ ?>
		<!-- <div class="col-md-12 col-xs-12  text-center mt15">
			<?php //echo CHtml::link('Proceed via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2,'redirectType'=>1),array('id'=>'linkedinButton','class'=>'btn btn-teal-new mt15 fs18 font_light pl35 pr35 pt5 pb5 last next-btn'));?>
		</div>
		<div class="col-md-12 col-xs-12  text-center mt20">
			<a href="javascript:void(0);" id="pronotlink" class="fs14 t-color font_light last next-btn">Use Email Instead</a>
		</div> -->
		<?php //} ?>
	</div>
	<?php //if(!Yii::app()->user->isGuest) { ?>
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
			<h1 class="fs30 font_newregular mt10 pp-hcolor">Awesome! </h1>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight">So what kind of a team are you looking for?</h3>
		</div>
		<div class="col-md-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">The team should have experience with:</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<select id="select-car" name="skills[]" multiple class="pp-input demo-default np pp-selectize" style="width:100%" placeholder="Select Skills (eg. Mobile Apps, PHP, Healthcare)">
					<?php foreach($skills as $skill){
						?>
						<option value="<?php echo $skill->id;?>" >
							<?php echo $skill->name;?>
	                    </option>
					<?php } ?>
				</select>
				<!-- <input class="pp-input" placeholder="ex: PHP, eCommerce, Health & Wellness" type="text"> -->
				<div class="pp-helpingtip-new">
					Feel free to add programming languages (iOS, PHP) and/or domains (Education, Healthcare).		
					<img class="toparrow" src="<?php echo Yii::app()->theme->baseUrl."/images/left-blue.png"; ?>" />
					<em class=""></em>
				</div>
				<!--<div class="pp-helpingtip">
					  Feel free to add programming languages (iOS, PHP) and/or domains (Education, Healthcare).
					  <img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/images/profile-rollover-right.png" class="toparrow">
					</div>-->
			</div>
			<div class="col-xs-12 mt15 np">
				<h3 class="h-color">Here are some trending skills</h3>
				<div class="col-xs-12 np">
					<div class="ckbutton"><label><input type="checkbox" value="" /><span class="fs14 font_newregular trending-tag callTag" data-name="27">Web Development</span></label></div>
					<div class="ckbutton"><label><input type="checkbox" value="" /><span class="fs14 font_newregular trending-tag callTag" data-name="78">Mobile Apps</span></label></div>
					<div class="ckbutton"><label><input type="checkbox" value="" /><span class="fs14 font_newregular trending-tag callTag" data-name="152">eCommerce Websites</span></label></div>
					<div class="ckbutton"><label><input type="checkbox" value="" /><span class="fs14 font_newregular trending-tag callTag" data-name="28">Ruby on Rails</span></label></div>
					<!--<a href="javascript:void(0);" class="trending-tag callTag" data-name="27">Web Development</a>
					<a href="javascript:void(0);" class="trending-tag callTag" data-name="78">Mobile Apps</a>
					<a href="javascript:void(0);" class="trending-tag callTag" data-name="152">eCommerce Websites</a>
					<a href="javascript:void(0);" class="trending-tag callTag" data-name="28">Ruby on Rails</a>-->
				</div>
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt20 step-content">
			<button type="button" class="btn btn-teal-new mt15 fs18 font_newlight pl35 pr35 pt5 pb5  next-btn skills-step" data-slide="3" data-analytics="project_skills">Proceed <i class="fa fa-spinner fa-spin hide"></i></button>
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
			<h1 class="fs30 font_newregular mt10 pp-hcolor">Great! </h1>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight skill-txt"></h3>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight skill-txt2">Tell us a little more so we can filter better! </h3>
		</div>
		<div class="col-md-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">My preferred location for the team is:</h1>
			<div class="col-xs-12 np mt20">
				<div class="pp-loc-inner col-xs-12 col-sm-4 np locations pp-location pp-nbr">
					<input type="radio" id="radio01" checked="checked" value="no-preferences" name="ClientProjects[preferences]"/>
					<label for="radio01">Anywhere</label>
				</div>
				<?php if( !empty($zone['country']) ) {?>
					<div class="pp-loc-inner col-xs-12 col-sm-4 np locations pp-location pp-nbr">
						<input type="radio" id="radio02" value='country' name="ClientProjects[preferences]"/>
						<label for="radio02" class="ellipsis display_block"><?php echo $zone['country'];?></label>
					</div>
				<?php } ?>
				<div class="pp-loc-inner other-region col-xs-12 col-sm-4 np pp-location ">
					<input type="radio" id="radio03" value='regions' name="ClientProjects[preferences]"/>
					<label for="radio03">Other Regions</label>
				</div>
				<!--<a href="javascript:void(0);" class="active"><i class="fa fa-check fs12 orange-new"></i> Anywhere</a>
				<a href="javascript:void(0);" class=""><i class="fa fa-check fs12 hide orange-new"></i> United States</a>
				<a href="javascript:void(0);" class="pp-nb other-region"><i class="fa fa-check fs12 hide orange-new"></i> Other Regions</a>-->
				<div class="pp-helpingtip">
				  Feel free to add multiple requirements.
				  <img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/images/profile-rollover-right.png" class="toparrow">
				</div>
			</div>
			<div class="col-xs-12 np mt20 hide other-region-div">
				<?php $regions	=	Regions::model()->findAllByAttributes(array('status'=>1),array('order'=>'description'));
				  foreach($regions as $region){
				?>
					<div class="ckbutton"><label><input type="checkbox" id="option<?php echo $region->id;?>" name="options[]" value="<?php echo $region->id;?>" /><span class="fs14 font_newregular trending-tag"><?php echo $region->name;?></span></label></div>
				<?php } ?>
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt50 step-content">
			<button type="button" class="btn btn-teal-new mt15  fs18 font_newlight pl35 pr35 pt5 pb5  next-btn" data-slide="4" data-analytics="project_location">Proceed <i class="fa fa-spinner fa-spin hide"></i></button>
		</div>
	</div>
	<div class="col-md-12 col-xs-12 mt25 slider4">
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
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight">Let's talk a little about the budget.</h3>
		</div>
		<div class="col-md-12 col-xs-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">My approximate budget is:</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np pp-location pp-nbr">
					<input type="radio" id="radio08" checked="checked" name="ClientProjects[custom_budget_range]" value="5k - 20k"/>
					<label for="radio08">$5k - $20k</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location pp-nbr">
					<input type="radio" id="radio09" name="ClientProjects[custom_budget_range]" value="20k - 100k"/>
					<label for="radio09">$20k - $100k</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location pp-nbr">
					<input type="radio" id="radio10" name="ClientProjects[custom_budget_range]" value="100k - 500k"/>
					<label for="radio10">$100k - $500k</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location">
					<input type="radio" id="radio11" name="ClientProjects[custom_budget_range]" value="500k+"/>
					<label for="radio11">$500k +</label>
				</div>
				<!--<?php //$options = array ('5k - 20k' => '5k - 20k', '20k - 50k' => '20k - 50k', '50k - 200k'=>'50k - 200k','200k - 500k'=>'200k - 500k','500k - 1M'=>'500k - 1M','1M+'=>'1 Million +'); ?>
				<?php //echo $form->dropDownList($project,'custom_budget_range',$options,array('class'=>'demo-default pp-selectstyle pp-select3 display_inline pp-styledropdown selectize-texttrue'));?>-->
			</div>
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight mt30">And I'll be ready with the specifications & funds:</h1>
			<div class="col-xs-12 np mt20">
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np pp-location pp-nbr">
					<input type="radio" id="radio04" checked="checked" name="ClientProjects[project_start_preference]" value="1"/>
					<label for="radio04">Immediately</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location pp-nbr">
					<input type="radio" id="radio05" name="ClientProjects[project_start_preference]" value="2"/>
					<label for="radio05">1-2 weeks</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location pp-nbr">
					<input type="radio" id="radio06" name="ClientProjects[project_start_preference]" value="3"/>
					<label for="radio06">2-4 weeks</label>
				</div>
				<div class="pp-loc-inner2 col-xs-12 col-sm-3 np  pp-location">
					<input type="radio" id="radio07" name="ClientProjects[project_start_preference]" value="4"/>
					<label for="radio07">Few months</label>
				</div>
				<!--<a href="javascript:void(0);" class="active"><i class="fa fa-check fs12 orange-new"></i> Immediately</a>
				<a href="javascript:void(0);" class=""><i class="fa fa-check fs12 hide orange-new"></i> 1 - 4 Weeks</a>
				<a href="javascript:void(0);" class="pp-nb"><i class="fa fa-check fs12 hide orange-new"></i> Few Months</a>-->
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt50 step-content">
			<button type="button" class="btn btn-teal-new mt15  fs18 font_newlight pl35 pr35 pt5 pb5  next-btn" data-slide="5" data-analytics="project_budget">Proceed <i class="fa fa-spinner fa-spin hide"></i></button>
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
			<h1 class="fs30 font_newregular mt10 pp-hcolor">Duly noted!</h1>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight">Can you briefly summarize your needs?<br>Wireframes or drawings will be extremely helpful too!</h3>
		</div>
		<div class="col-md-12 col-xs-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">Here are some features and flows I have in mind:</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<div class="col-xs-12 np">
					<?php echo $form->textArea($project,'description',array('class'=>'pp-input','placeholder'=>'The more the detail, the quicker we can make the introductions','style'=>'max-height: 170px; min-height: 108px','rows'=>'3', 'data-parsley-required-message'=>'Describe your needs in at least 30 characters', 'data-parsley-minlength'=>'30'));?>
					<div class="scheduleCall">
						<div class="text-up">
							<div class="smile-image">
							<span class="count-smiley"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/sile01.png" /></span>
							</div>
							<div class="text-heading-scheduleCall">
								<h4 class="font_newregular title-text">Insufficient Details</h4>
								<p class="font_newlight mb0 title-msg">Some more detail will help us match better!</p>
							</div>
						</div>
						<div class="text-down">
							<p class="font_newlight">Think about user flows or other similar products. 250 character is our sweet spot!</p>
							<span class="fs14">OR <a href="javascript:void(0);" data-toggle="modal" data-target="#givecall" class="moveToNext" data-slide="6">Schedule a Call</a> to discuss this over phone.</span>
						</div>
						<a href="javascript:void(0)" class="pull-right pt25 fs16 next-btn schedule" data-slide="6">Skip to next step <span class=""><i class="fa fa-long-arrow-right"></i></span></a>
						
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
			<!-- <div class="col-xs-12 np mt10 placeholder-pp pp-attachment">
				<div class="col-xs-11 col-md-11 pt10 pb10 pl0"  id="ClientProjects_mockup">
					<label class="placeholder-color fs18">You can attached refrence files</label>
				</div>
			</div> -->
			<!--<div class="col-xs-12 np mt20 placeholder-pp pp-input">
				<div class="col-xs-11 col-md-11 pt10 pb10"  id="ClientProjects_mockup">
					<label class="placeholder-color">Attach Wireframes, Drawings or Specifications.</label>
				</div>
				<div class="col-xs-1 col-md-1">
					<a class="attachment-pp" id="projectDocs" href="javascript:void(0);"><span aria-hidden="true" class="icon-paper-clip orange-new"></span></a>
				</div>
			</div>-->
		</div>
		<div class="col-md-12 col-xs-12 text-center mt50 step-content">
			<button type="button" class="btn btn-teal-new mt15  fs18 font_newlight pl35 pr35 pt5 pb5  next-btn" data-slide="6" data-analytics="project_description">Proceed <i class="fa fa-spinner fa-spin hide"></i></button>
		</div>
	</div>
	<div class="col-md-12 col-xs-12 mt25 slider6">
		<div class="col-md-12 col-xs-12 text-center mb40">
			<div class="count-smiley"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/sile01.png" /></div>
			<h1 class="fs30 font_newregular mt10 pp-hcolor title-text">Insufficient Details</h1>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight title-msg-step ">Some more detail will help us match better!</h3>
			<h3 class="callconfirm">We can always <a href="javascript:void(0);" data-toggle="modal" data-target="#givecall" class="orange-new font_newregular">Schedule a call</a> to discuss this over phone.</h3>
		</div>
		<div class="col-md-12 col-xs-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight">Here is some information about my company</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
			<?php if(Yii::app()->user->isGuest) { ?>
				<?php echo $form->textField($users,'company_name',array('data-parsley-required-message'=>'Company name is required to process this request', 'class'=>'pp-input required','placeholder'=>'company name')); ?>
			<?php } else{ ?>
			<?php echo $form->textField($user,'company_name',array('data-parsley-required-message'=>'Company name is required to process this request', 'class'=>'pp-input required','placeholder'=>'company name')); ?>
			<?php } ?>
				<!-- <input class="pp-input" placeholder="company name" type="text"> -->
			</div>
			
			<div class="col-xs-12 np mt20 placeholder-pp">
				<?php echo $form->textField($profile,'company_link',array('data-parsley-required-message'=>'A company website is required to process this request', 'class'=>'pp-input required','placeholder'=>'website'));?>
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
				<?php //echo $form->dropDownList($profile,'team_size',$options,array('prompt'=>'Company Size','data-parsley-required-message'=>'Company size is required to process this request', 'class'=>'demo-default pp-selectstyle pp-select4 display_inline pp-styledropdown selectize-texttrue required','tabindex'=>'10'));?>
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
			<button type="button" class="btn btn-teal-new mt15  fs18 font_newlight pl35 pr35 pt5 pb5  next-btn" data-slide="7" data-analytics="project_companyInfo">Proceed <i class="fa fa-spinner fa-spin hide"></i></button>
		</div>
	</div>
	<div class="col-md-12 col-xs-12 mt25 slider7">
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
			<h1 class="fs30 font_newregular mt10 pp-hcolor">And finally.. </h1>
			<h3 class="fs18 mt10 lh28 pp-hcolor font_newlight">How can we reach you? <br>No spam or unsolicited communication. We promise! </h3>
		</div>
		<div class="col-md-12 col-xs-12 col-xs-12 pp-box np step-content">
			<h1 class="fs22 display_block nm pp-inputcolor font_newlight">You can email me at:</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<?php if(Yii::app()->user->isGuest) { ?>
					<?php echo $form->textField($users,'username',array('data-parsley-required-message'=>'Email is required','data-parsley-type'=>'email', 'class'=>'pp-input email required','placeholder'=>'email address'));?>
				<?php }else{  ?>
					<?php echo $form->textField($project,'summary',array('value'=>$user->username,'data-parsley-required-message'=>'Email is required', 'class'=>'pp-input','placeholder'=>'email address'));?>
				<?php } ?>
				<div class="pp-helpingtip">
				  No spam or unsolicited communication - promise!
				  <img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/images/profile-rollover-right.png" class="toparrow">
				</div>
			</div>
			<h1 class="fs22 display_inline nm pp-inputcolor font_newlight mt30">And my cell number is:</h1>
			<div class="col-xs-12 np mt20 placeholder-pp">
				<?php echo $form->textField($project,'mobile',array('data-parsley-required-message'=>'Phone No. is required', 'class'=>'pp-input required','data-parsley-type'=>"digits",'placeholder'=>'phone number'));?>
				<!-- <input class="pp-input" placeholder="(555) 555 55555" type="text"> -->
			</div>
		</div>
		<div class="col-md-12 col-xs-12 text-center mt20 mb40 step-content">
			<?php //echo CHtml::submitButton('Get Introductions & Quotes',array('id'=>'finalSubmit','class'=>"btn btn-teal-new mt15 fs18 font_light pl35 pr35 pt5 pb5 last next-btn"));?>
			<?php if(Yii::app()->user->isGuest){ ?>
				<button type="button" id="finalSubmit" class="btn btn-teal-new mt15 fs18 font_light pl35 pr35 pt5 pb5 last next-btn">Get Introductions & Quotes <i class="fa fa-spinner fa-spin hide"></i></button>
			<?php }else{  ?>
				<button type="submit" id="finalSubmit" class="btn btn-teal-new mt15 fs18 font_light pl35 pr35 pt5 pb5 last next-btn">Get Introductions & Quotes <i class="fa fa-spinner fa-spin hide"></i></button>
			<?php } ?>
		</div>
	</div>
	<?php //} ?>
	<?php $this->endWidget(); ?>
</div>
<?php //if(Yii::app()->user->isGuest) {?>
<!-- Modal SignUp -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-md-12 col-xs-12 np">
			<div class="modal-body col-md-12 col-xs-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np p20">
					<div class="col-md-12 col-xs-12 np">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<!-- Sign Up starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-create-acc modal-create-acc-show rs-np">
							
							<div class="alert alert-dismissible alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>
	
							<h3 class="fs26 font_newlight team-text-blue mt5">Create Account</h3>
							<div class="form-group">
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
								</div>
								<div class="col-md-12 col-xs-12 mt5 mb5">
									<div class="col-md-5 col-xs-12 border-overlay"></div>
									<div class="col-md-2 col-xs-12 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 col-xs-12 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/signup'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::hiddenField('is_create_project_signup','1',array('id'=>'is_search_signup'));  ?>
									<?php echo CHtml::hiddenField('signup-category','',array('id'=>'signup-category'));  ?>
									<?php echo CHtml::hiddenField('signup-val','',array('id'=>'signup-val'));  ?>
									<?php echo $form->textField($users,'first_name',array('data-parsley-required-message'=>'Name is required','placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input bb0 required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
									<?php echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2')); ?>
									<?php echo $form->passwordField($users,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'required'=>'required','title'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required minlength','length'=>"6",'tabindex'=>'3'));?>
									<?php $users->role_id=2; echo $form->hiddenField($users,'role_id'); ?>
									<?php if(Yii::app()->user->hasState('promo')){
											$users->refCode=Yii::app()->user->promo;
											echo $form->hiddenField($users,'refCode');
									}?>
								</div>
								<div class="col-md-12 col-xs-12">
									<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
										<input required="required" type="checkbox" name="customcheckbox1" id="customcheckbox1" checked/>
										<label for="customcheckbox1" class="fs12 grey1">&nbsp; I agree to</label>
										<a class="fs12 font_newregular orange-new mt15" href="javascript:void(0);" id="" data-toggle='modal' data-target='#terms-conditions'>Terms & Conditions</a>
									</div>
								</div>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::button('Create Account',array('id'=>'signupSearch','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15','tabindex'=>'4','data-id'=>'sign_up')); ?>
								</div>
								<?php $this->endWidget(); ?>						
								<div class="col-md-12 col-xs-12">
									<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
										<span class="grey1 fs14">Already have an Account? <a class="fs14 font_newregular mt20 grey1 orange-new modal-signin-div" id="" href="javascript:void(0);">Sign In</a></span>
									</div>
								</div>
							</div>	
						</div>
						<!-- Sign Up ends -->
						<!-- Forgot Password starts -->
						<?php $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form-search','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-forgot-password modal-forgot-password-hide">
							<div class="alert alert-success hide mt15 mb15" id="repsoneRest1" style="width:100%; margin:0 auto;">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
								<p id="messageResponse1"><?php echo Yii::app()->user->getFlash('errorfPass'); ?></p>
							</div>
							<div id="resetpass1">
								<h3 class="fs26 font_newlight team-text-blue mt5">No Problem!</h3>
								<div class="form-group">
									<div class="col-md-12 col-xs-12">
										<?php echo $form->textField($forgot,'email',array('data-parsley-required-message'=>'Email is required','placeholder'=>'Email','class'=>'gui-input bb2 mt10','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email1')); ?>
									</div>
									<div class="col-md-12 col-xs-12">
										<?php echo CHtml::button('Reset Password',array('name'=>'Submit','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt20','id'=>'passButSat1')); ?>
									</div>
									<div class="col-md-12 col-xs-12">
										<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
											<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new modal-create-accDiv" href="javascript:void(0);">Create now</a></span>	
										</div>
									</div>
								</div>	
							</div>
						</div>
						<?php $this->endWidget(); ?>
						<!-- Forgot Password ends -->
						<!-- Sign In starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-signin modal-signin-hide rs-np">
							
							<div class="alert alert-dismissible alert-danger alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>

							<h3 class="fs26 font_newlight team-text-blue mt5">Members</h3>
							<div class="form-group">
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
								</div>
								<div class="col-md-12 col-xs-12 mt5 mb5">
									<div class="col-md-5 col-xs-12 border-overlay"></div>
									<div class="col-md-2 col-xs-12 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 col-xs-12 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/login'),'id'=>'login-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::hiddenField('is_create_project_login','1',array('id'=>'is_search_login'));  ?>
									<?php echo CHtml::hiddenField('login-category','',array('id'=>'login-category'));  ?>
									<?php echo CHtml::hiddenField('login-val','',array('id'=>'login-val'));  ?>
									<?php echo $form->emailField($model,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'class'=>'gui-input bb0 emailModal','required'=>'required','data-parsley-type'=>"email")); ?>
									<div class="col-md-12 col-xs-12 np">
									<?php echo $form->passwordField($model,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordFieldInPopup')); ?>
									<a class="fs12 font_newregular orange-new pull-right mt15 modal-forgot-passwordDiv  forgot-pass" href="javascript:void(0);" id="">Forgot ?</a>
									</div>
								</div>
								<div class="col-md-12 col-xs-12">
									<div class="col-md-6 col-xs-6 np">
										<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10 rs-nm">
											<?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox"));?>
											<label for="customcheckbox" class="fs12 grey1">&nbsp; Remember me</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-6 np">
											
									</div>
								</div>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::button('Sign In',array('id'=>'login-m','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15','data-id'=>'login-form')); ?>
								</div>
								<?php $this->endWidget(); ?>	
								<div class="col-md-12 col-xs-12">
									<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
										<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new modal-create-accDiv" href="javascript:void(0);">Create now</a></span>	
									</div>
								</div>
							</div>	
						</div>
						<!-- Sign In ends -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal SignUp End-->
<?php //} else {?>
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
						
						<input type="text" id="timeZoneOption" name="timeZoneOption" class="gui-input" disabled="disabled" placeholder="Time Zone" value="<?php //echo Yii::app()->user->tz;?>">
						<label for="firstname" class="field-icon"><span class="icon-globe fs14" aria-hidden="true"></span></label>
					</label>
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
<?php //}?>
<?php //if(!Yii::app()->user->isGuest){ ?>
<script type="text/javascript">
var click_count=2;
	$(document).ready(function(){	
		<?php //if($count == 0){ ?>
			//$('.sec-today').addClass('hide');
		<?php //} ?>

		$('.callTag').click(function(){
			var data = $(this).attr('data-name');
			console.log(searchSel[0].selectize);
			searchSel[0].selectize.addItem(data,true);
		});
		//skills selectize
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
		$('.scheduleCall').hide();
	});	

	<?php if(!Yii::app()->user->isGuest){ ?>
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

	// //Add attachments
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
	<?php }else{?>

	//handle deletion of attachments
		function deleteDocs(element){
			element.parent().parent().find('a').html('Deleting ...');
			element.parent().parent().find('.ref-file-show').hide();  	       
		    element.parent().parent().remove();
		}

	//Add attachments
		$('#projectDocs').click(function(){
			filepicker.setKey("ANQWcFDQRUiGfBqjfgINQz");
			filepicker.pickMultiple({mimetypes: ['image/*', 'text/*', 'application/pdf','application/msword','application/vnd.ms-excel','application/vnd.ms-powerpoint'],},
				function(InkBlob){	
					//console.log(InkBlob);
		            $('#ClientProjects_mockup').find('label').remove();
		            $('#ClientProjects_mockup').parent().css('height','auto');

		            $.each(InkBlob, function( key, value ) {
			            var myArray = value.mimetype+','+value.filename+','+value.size+','+value.url;				
						$('#ClientProjects_mockup').append('<div class="ref-files pl0" id="ref-'+key+'"><input type="hidden" name="attach['+key+']" value="'+myArray+'" /> <a href="'+value.url+'" target="_blank" class="orange-new">'+value.filename+'</a><div class="ref-file-show"><a href="javascript:void(0);" id="delRef-'+key+'" data-id="'+key+'" onClick="deleteDocs($(this))" title="Delete"><span aria-hidden="true" class="fa fa-times orange-new mr5 ml10"></span></a></div></div>'); 
					});
		            
				},
				function(FPError){
					console.log(FPError.toString());
				}
			);
		});
	<?php } ?>	
	
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
<?php //} ?>
