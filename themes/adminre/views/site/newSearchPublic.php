<div class="container-fluid search-bg font_newregular"  >
	<div class="row">
		<div class="navbar navbar-fixed-top bg-light np search-nav col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-1 col-sm-1 col-xs-1 np">
				<?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/white-logo.png" alt="Venturepact">', array('/site'),array('class'=>'blue-logo ml10')); ?>
			</div>
			<ol class="breadcrumb pt20">
				<li class="crumb-active"><span class="fs24 font_newlight dark_blue_new"></span></li>				
			</ol>
			<div class="pull-right col-md-4 col-sm-10 col-xs-10 search-menu np">
				<ul class="nav navbar-nav guest pull-right">						
					<li>
						<a href="<?php echo CController::createUrl('/site/project');?>" class="fs14 font_newregular grey-new-light pr25" href="javascript:void(0);">Post Your Project</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 scheduleACallTop"  href="javascript:void(0);">Call 958.265.2365</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="fs14 font_newregular grey-new-light pr25 scheduleACallTop menu-icon"><i class="fa fa-bars pr5"></i> Menu</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--Left section-->
	<div class="row mt60">
		<div class="col-md-3 col-sm-12 col-xs-12 left-section-s">
			<div class="col-md-12 col-xs-12  col-sm-12 np text-center font_newlight">
				<img width="80" height="80" alt="Team Member" class="img-circle" src="<?php echo Yii::app()->theme->baseUrl;?>/images/about-team-pm.png" alt="team">
				<h2 class=" blue-head  fs18 mt10 mb5 lh22 ">Hey,<br/>this is Pratham!</h2>
				<p class="fs14 text-color-navy pt5 lh20 mt10 mb0">Refine your search or <br/>let us help you over a call.</p>
			</div>
			<div class="col-md-12 col-xs-12 col-sm-12 mt30 np">
				<ul class="nav search-tabs guest" role="tablist">
					<li role="presentation" class="active col-md-6 col-sm-12 col-xs-12  np font_newregular fs14"><a href="#rsearch" aria-controls="rsearch" role="tab" data-toggle="tab">Refine Search</a><span class="arrow-down"></span></li>
					<li role="presentation" class="col-md-6 col-sm-12 col-xs-12  np font_newregular fs14"><a href="#scall" aria-controls="scall" role="tab" data-toggle="tab">Schedule a Call</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div  role="tabpanel" class="tab-pane active  pa20" id="rsearch">
						<?php $form=$this->beginWidget('CActiveForm',array('id'=>'form-search','method'=>'GET','action' => Yii::app()->createUrl('/site/newSearch')));?>
						<!-- Temp Fix -->
						<?php echo CHtml::hiddenField('range','0;135',array('id'=>'range')); ?>
						<div class="col-md-12 col-sm-12 col-xs-12 mt10 np">
							<div class=" admin-form form-horizontal">
								<div class="form-group mb10">
									<div class="col-sm-12 sr-input">
										<label class="field append-icon">
											<div class="control-group" id="select-car-group">
												<select id="select-skills" class="demo-default" name="skills[]" multiple placeholder="Skills (eg: PHP, iOS, C++)" readonly="true">
													<optgroup label="Skills">
														<?php
														$skills		=	Skills::model()->findAllByAttributes(array('skillcol'=>0));
														foreach($skills as $skill){?>
														<option value="skill_<?php echo $skill->name;?>"  <?php echo (!empty($data['skills']) && in_array('skill_'.$skill->name,$data['skills']))?'selected':'';?>><?php echo $skill->name;?></option>
														<?php } ?>
													</optgroup>
													<optgroup label="Services">
														<?php $services	=	Services::model()->findAllByAttributes(array('status'=>1));
														foreach($services as $service){?>
															<option value="service_<?php echo $service->name;?>" <?php echo (!empty($data['skills']) && in_array('service_'.$service->name,$data['skills']))?'selected':'';?>><?php echo $service->name;?></option>
														<?php } ?>
													</optgroup>
												</select>
											</div>
											<label class="field-icon" for="firstname"><span aria-hidden="true" class="icon-magnifier"></span></label>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 mt10 mb20 np">
							<div class="locationdiv-otr">
								<div class="locationdiv-inner col-md-12 col-sm-12 col-xs-12">
									<span class="search-head-text fs14 font_newregular pull-left">Location</span>
									<i class="fa fa-angle-down fs14 orange-new pull-right mt5"></i>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 zone_outr np pt5">
									<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border mb10">
										<div class="col-md-6 col-sm-6 search-blue font_newregular col-xs-6 np">
											Zone 1
										</div>
										<div class="col-md-6 col-sm-6 search-blue font_newregular text-right col-xs-6 np">
											$80 - $250
										</div>
										<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
											Western Europe, US & Canada, Australia
										</p>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border mb10">
										<div class="col-md-6 col-sm-6 search-blue font_newregular col-xs-6 np">
											Zone 1
										</div>
										<div class="col-md-6 col-sm-6 search-blue font_newregular text-right col-xs-6 np">
											$80 - $250
										</div>
										<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
											Middle East Estern Europe Central & South America
										</p>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border mb10">
										<div class="col-md-6 col-sm-6 search-blue font_newregular col-xs-6 np">
											Zone 1
										</div>
										<div class="col-md-6 col-sm-6 search-blue font_newregular text-right col-xs-6 np">
											$80 - $250
										</div>
										<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
											Soth Asia Africa East Asia South East Asia
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 mt5 mb20 np">
							<div class="locationdiv-otr">
								<div class="leveldiv-inner col-md-12 col-sm-12 col-xs-12">
									<span class="search-head-text fs14 font_newregular pull-left">Any Level</span>
									<i class="fa fa-angle-down fs14 orange-new pull-right mt5"></i>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 level_data pa10">
									<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border mb10">
										<div class="col-md-12 col-sm-12 search-blue font_newregular col-xs-12 np">
											Start Up Level
										</div>
										<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
											Looking for firms with low pricing
										</p>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border mb10">
										<div class="col-md-12 col-sm-12 search-blue font_newregular col-xs-12 np">
											Intermediate
										</div>
										<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
											Looking for firms with low pricing
										</p>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12 pa10 zone-border mb10">
										<div class="col-md-12 col-sm-12 search-blue font_newregular col-xs-12 np">
											Expert
										</div>
										<p class="darkgrey_iconnew col-xs-12 pl0 mt5 mb0">
											Looking for firms with low pricing
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 mt10 np">
							<div class=" admin-form form-horizontal">
								<div class="form-group mb10">
									<div class="col-sm-12 sr-input">
										<label class="field append-icon">
											<div class="control-group">
												<select id="industry" multiple class="demo-default" placeholder="Type Industry" name="industry[]" readonly="true">
													<option default>Select a Industry</option>
													<?php
													$industries		=	Industries::model()->findAllByAttributes(array('status'=>1));
													foreach($industries as $industry){?>
														<option value="<?php echo $industry->name;?>" <?php echo (!empty($data['industry']) && in_array($industry->name,$data['industry']))?'selected="selected"':'';?> ><?php echo $industry->name;?> </option>
													<?php } ?>
												</select>
											</div>
											<label class="field-icon" for="firstname"></label>
										</label>
									</div>
								</div>
							</div>
						</div>
						<?php $this->endWidget(); ?>
					</div>
					<div role="tabpanel" class="tab-pane pa20" id="scall">
						<div class="col-md-12 col-sm-12 col-xs-12 mt10 np bb2">
							<p class="darkblue-text font_newregular">
								Give us a phone no. or skype id where we can we reach you?
							</p>
							<p class="darkblue-text font_newregular">
								Select few time below that works best
							</p>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 mt30 np">
							<div class=" admin-form form-horizontal">
								<div class="form-group mb10">
									<div class="col-sm-12 sr-input">
										<label class="field prepend-icon">
											<div class="control-group">
												<input type="text" placeholder="phone no. or skype id" class="gui-input call-s pl40" id="firstname" name="firstname">
											</div>
											<label class="field-icon" for="firstname"><span class="icon-call-in search-blue" aria-hidden="true"></span></label>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 form-group mb5 np">
							<h4 class="fs14 search-blue font_newregular">Today</h4>
							<div class="col-md-12 pl0 timing-tag mb25">
							<div class="ckbutton-timming"><label><input type="checkbox" value="5" data-value="10:00 AM" data-category="2" name="tomorrow"><span class="fs12 timming-tag">10:00 AM</span><label></label></label></div>
							<div class="ckbutton-timming"><label><input type="checkbox" value="6" data-value="12:00 PM" data-category="2" name="tomorrow"><span class="fs12 timming-tag">12:00 PM</span><label></label></label></div>
							<div class="ckbutton-timming"><label><input type="checkbox" value="7" data-value="2:00 PM" data-category="2" name="tomorrow"><span class="fs12 timming-tag">2:00 PM</span><label></label></label></div>
							<div class="ckbutton-timming"><label><input type="checkbox" value="8" data-value="4:00 PM" data-category="2" name="tomorrow"><span class="fs12 timming-tag">4:00 PM</span><label></label></label></div>
							</div>
							<h4 class="fs14 search-blue font_newregular">Tomorrow</h4>
							<div class="col-md-12 pl0 timing-tag">
							<div class="ckbutton-timming"><label><input type="checkbox" value="5" data-value="10:00 AM" data-category="2" name="tomorrow"><span class="fs12 timming-tag">10:00 AM</span><label></label></label></div>
							<div class="ckbutton-timming"><label><input type="checkbox" value="6" data-value="12:00 PM" data-category="2" name="tomorrow"><span class="fs12 timming-tag">12:00 PM</span><label></label></label></div>
							<div class="ckbutton-timming"><label><input type="checkbox" value="7" data-value="2:00 PM" data-category="2" name="tomorrow"><span class="fs12 timming-tag">2:00 PM</span><label></label></label></div>
							<div class="ckbutton-timming"><label><input type="checkbox" value="8" data-value="4:00 PM" data-category="2" name="tomorrow"><span class="fs12 timming-tag">4:00 PM</span><label></label></label></div>
							</div>
							<div class="col-md-12 col-xs-12 text-center">
								<input type="submit" value="Call Scheduled" name="yt0" class="btn btn-orange mt15 fs12 font_newregular pl35 pr35 pt5 pb5">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--right section-->
		<div class="col-md-9 np">
			<!--Render Partial for Results-->
			<div id='search-Result'>
				<?php $this->renderPartial('_newSearch',array("suppliers"=>$suppliers,'data'=>$data,'loginConnections'=>$loginConnections));?>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="guest menu-login-section">
		<div class="col-md-12 col-sm-12 col-xs-12 rs-np">
			<div class="col-md-12 col-xs-12 rs-mt10">
				<a class="menu-close pull-right pa30 rs-np" href="javascript:void(0);"><img alt="close" src="<?php echo Yii::app()->theme->baseUrl.'/images/icon-close.png'; ?>"></a>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 rs-np">
				<div class="col-md-6 col-xs-12 rs-np">
					<div class="col-md-6 col-md-offset-5">
					<?php if(Yii::app()->user->hasFlash('success')):?>
						<div class="alert alert-success alert-dismissible alertMessage" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo Yii::app()->user->getFlash('success'); ?>
						</div>
					<?php endif; ?>
					<?php if(Yii::app()->user->hasFlash('error')):?>
						<div class="alert alert-danger1 alert-dismissible alertMessage" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo Yii::app()->user->getFlash('error'); ?>
						</div>
					<?php endif; ?>
					</div>
					<div class="col-md-12 col-xs-12 rs-nm rs-p11">
						<?php if(Yii::app()->user->isGuest){
								$this->widget('WidgetHomeMenu');
							}else{ ?>
						<div class="col-md-7 col-md-offset-4 col-xs-12">
							<div class="col-md-12 col-xs-12 np text-center">
								<img width="90" height="90" src="<?php echo Yii::app()->user->image;?>" class="img-circle" alt="Team Member">
								<h2 class="fs16  font_newregular ">Hey <?php echo Yii::app()->user->fname;?></h2>
								<p class="fs14 font_newregular pt5">Welcome to VenturePact</p>
							</div>
							<div class="col-md-12 col-xs-12 bt mt20 pt20 text-center np rs-hide">
								<?php echo CHtml::link('<span class="icon-home mr5" aria-hidden="true"></span> Dashboard',array('/'.Yii::app()->user->role),array('class'=>'fs13 font_newregular orange-new col-md-5 col-xs-12 pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-settings mr5" aria-hidden="true"></span> Settings',array('/'.Yii::app()->user->role.'/account'),array('class'=>'fs13 font_newregular orange-new col-md-4 np pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-power orange-light mr5" aria-hidden="true"></span> Logout',array('/site/logout'),array('class'=>'fs13 font_newregular orange-new col-md-3 np text-right mb5')); ?>									
							</div>
							<div class="col-md-12 col-xs-12 bt mt20 pt20 pb20 text-center np rs-show">
								<?php echo CHtml::link('<span class="icon-home mr5" aria-hidden="true"></span>',array('/'.Yii::app()->user->role.'/index'),array('class'=>'fs13 font_newregular orange-new col-md-5 col-xs-4 pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-settings mr5" aria-hidden="true"></span>',array('/'.Yii::app()->user->role.'/account'),array('class'=>'fs13 font_newregular orange-new col-md-4 np col-xs-4 pl0 pr10 mb5')); ?>
								<?php echo CHtml::link('<span class="icon-power orange-light mr5" aria-hidden="true"></span>',array('/site/logout'),array('class'=>'fs13 font_newregular orange-new col-md-3 np col-xs-4 mb5')); ?>									
							</div>										
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-12  col-xs-12 login-border rs-mb20">
					<div class="col-md-12 col-sm-12 col-xs-12 mt50 rs-np rs-nm rs-mb20">
						<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-1 rs-np rs-mb20">
							<ul class="login-menu fs14 font_newlight">
								<li><a href="<?php echo Yii::app()->createUrl('/site/about');?>" class="blue-new">About Us</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/vettingProcess');?>" class="blue-new">Vetting Process</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/howItWorks');?>" class="blue-new">How It Works</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/faq');?>" class="blue-new">FAQs</a></li>
								<li><a href="http://blog.venturepact.com/" target="_blank" class="blue-new">Blog</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/press');?>" class="blue-new">Press</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/testimonials');?>" class="blue-new">Reviews</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/partner');?>" class="blue-new">For Developers</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('/site/affiliate');?>" class="blue-new">For Affiliates</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-10 mt30 rs-nm pl25 rs-np rs-hide">
						<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-1 np rs-np rs-mb20">
							<div class="col-md-12 col-sm-12 col-xs-12 np bt bb pt10 pb10">
								<div class="col-md-5 col-sm-12 col-xs-12 np">
									<h3 class="fs16 blue-new font_newlight mt10 mb10">Share now:</h3>
								</div>
								<div class="col-md-7 col-sm-12 col-xs-12">
									<div class="col-md-12 col-sm-12 col-xs-12 np"> 
										<div class="col-md-3 col-sm-1 col-xs-3 mr5">
											<a href="https://www.facebook.com/VenturePact" target="_blank" class="tm-facebook-small web-hover">
												<span class="web-show-small"></span>
												<i class="fa fa-facebook fs15 mt5"></i>
											</a>
										</div>
										<div class="col-md-3 col-sm-1 col-xs-3 mr5">
											<a href="https://twitter.com/VenturePact" target="_blank" class="tm-twitter-small web-hover">
												<span class="web-show-small"></span>
												<i class="fa fa-twitter fs15 mt5"></i>
											</a>
										</div>
										<div class="col-md-3 col-sm-1 col-xs-3 mr5">
											<a href="https://www.linkedin.com/company/venturepact" target="_blank" class="tm-linkedin-small web-hover">
												<span class="web-show-small"></span>
												<i class="fa fa-linkedin fs15 mt5"></i>
											</a>
										</div>
									</div>
								</div>							
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-10 mt70 rs-nm pl25 rs-np rs-show">
						<div class="col-md-1 col-sm-1 col-xs-3 mr5">
							<a href="https://twitter.com/VenturePact" target="_blank" class="tm-twitter-small">
								<i class="fa fa-twitter"></i>
							</a>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-3 mr5">
							<a href="https://www.facebook.com/VenturePact" target="_blank" class="tm-facebook-small">
								<i class="fa fa-facebook"></i>
							</a>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-3 mr5">
							<a href="https://www.linkedin.com/company/venturepact" target="_blank" class="tm-linkedin-small">
								<i class="fa fa-linkedin"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal SignUp -->
<div class="modal fade guest" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-md-12 col-xs-12 np">
			<div class="modal-body col-md-12 col-xs-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np p20">
					<div class="col-md-12 col-xs-12 np">
						<!-- <button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
						<!-- Sign Up starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-create-acc modal-create-acc-show rs-np">
							
							<div class="alert alert-dismissible alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>
	
							<h3 class="fs26 font_newlight team-text-blue mt5">Create Account</h3>
							<div class="form-group">
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10 '));?>
								</div>
								<div class="col-md-12 col-xs-12 mt5 mb5">
									<div class="col-md-5 col-xs-12 border-overlay"></div>
									<div class="col-md-2 col-xs-12 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 col-xs-12 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/signup'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::hiddenField('is_search_signup','1',array('id'=>'is_search_signup'));  ?>
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
										<a class="fs12 font_newregular orange-new mt15 " href="javascript:void(0);" id="" data-toggle='modal' data-target='#terms-conditions'>Terms & Conditions</a>
									</div>
								</div>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::button('Create Account',array('id'=>'signupSearch','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15 ','tabindex'=>'4','data-id'=>'sign_up')); ?>
								</div>
								<?php $this->endWidget(); ?>						
								<div class="col-md-12 col-xs-12">
									<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
										<span class="grey1 fs14">Already have an Account? <a class="fs14 font_newregular mt20 grey1 orange-new modal-signin-div " id="" href="javascript:void(0);">Sign In</a></span>
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
										<?php echo CHtml::button('Reset Password',array('name'=>'Submit','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt20 ','id'=>'passButSat1')); ?>
									</div>
									<div class="col-md-12 col-xs-12">
										<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
											<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new modal-create-accDiv " href="javascript:void(0);">Create now</a></span>	
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
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2,'redirectType'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10 '));?>
								</div>
								<div class="col-md-12 col-xs-12 mt5 mb5">
									<div class="col-md-5 col-xs-12 border-overlay"></div>
									<div class="col-md-2 col-xs-12 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 col-xs-12 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/login'),'id'=>'login-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
								<div class="col-md-12 col-xs-12">
									<?php echo CHtml::hiddenField('is_search_login','1',array('id'=>'is_search_login'));  ?>
									<?php echo CHtml::hiddenField('login-category','',array('id'=>'login-category'));  ?>
									<?php echo CHtml::hiddenField('login-val','',array('id'=>'login-val'));  ?>
									<?php echo $form->emailField($model,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email")); ?>
									<div class="col-md-12 col-xs-12 np">
									<?php echo $form->passwordField($model,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordFieldInPopup')); ?>
									<a class="fs12 font_newregular orange-new pull-right mt15 modal-forgot-passwordDiv" href="javascript:void(0);" id="">Forgot ?</a>	
									</div>
								</div>
								<!--<div class="col-md-12 col-xs-12">
									<div class="col-md-6 col-xs-6 np">
										<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10 rs-nm">
											<?php // echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox"));?>
											<label for="customcheckbox" class="fs12 grey1">&nbsp; Remember me</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-6 np">
										
									</div>
								</div>-->
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
<script>
$(document).ready(function() {

	$(document).on('click','a,input,button,select,div.locationdiv-inner,div.leveldiv-inner',function(e){
		if( !$(this).parents('.guest').length ){
			$('#signup').modal({
			  backdrop: 'static',
			  keyboard: false
			});
			e.preventDefault();
			e.stopPropagation();
		}
	});
	//signup
	$(".modal-forgot-passwordDiv").click(function(){
		$(".modal-forgot-password").show(500);
		$(".modal-signin").hide(500); 		
	});
	
	$(".modal-create-accDiv").click(function(){
		$(".modal-create-acc").show(500);
		$(".modal-signin").hide(500);
	});
	
	$(".modal-create-accDiv").click(function(){
		$(".modal-create-acc").show(500);
		$(".modal-forgot-password").hide(500); 
	});
	
	$(".modal-signin-div").click(function(){
		$(".modal-signin").show(500);
		$(".modal-create-acc").hide(500);
	});
	
	$('#login-m').click(function(){
		signIn($(this));
	});
	
	$('#signupSearch').click(function(){
		signUp($(this));
	});

	$( "#passwordFieldInPopup" ).keypress(function( event ) {
	  if ( event.which == 13 ) {
	     $( "#login-m" ).trigger( "click" );
	  }
	});

	$('#passButSat1').on("click",function(){
		var elem	=	$('#forget-form-email1');
		if(elem.val().length>0){
			if(testEmail(elem.val())){
				$('#passButSat1').val('Please Wait ...');
				$.ajax({
					type: 'POST',
					url:"<?php echo CController::createUrl('/site/ajaxUniqe');?>"+'/email/'+elem.val(),
					success :function(data){
						var response = JSON.parse(data);
						console.log('Element is :'+elem);
						if(response.exist){
							elem.addClass('parsley-error');
							var ErrID	=	elem.attr('data-parsley-id')
							$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">'+response.message+'</li>');
							$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
							$('#signupButSat').attr('type','button');
							$('#passButSat1').val('Reset Password');
						}
						else{
							elem.val('');
							$('#messageResponse1').html(response.message);
							$('#repsoneRest1').show();
							//$('#resetpass1').addClass('hide');
							$('#repsoneRest1').removeClass('hide');
							var ErrID	=	elem.attr('data-parsley-id')
							$('#parsley-id-satn-'+ErrID).html('');
							$('#passButSat1').val('Reset Password');
							//$('#passButSat1').hide();
						}
					}
				});
			}
			else{
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is not a valid email address.</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			}
		}
		else{
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is required field.</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
		}
	});
	//signup
	// $( ".locationdiv-inner" ).click(function(){$('.zone_outr').slideToggle(500);});
	// $( ".leveldiv-inner" ).click(function(){$('.level_data').slideToggle(500);});
	// $('.zone_outr').on('click','.zone-border',function(){$(this).toggleClass('zoneselected')});
	// $('.level_data').on('click','.zone-border',function(){$(this).toggleClass('zoneselected')});
	var suppliersList	=	[];
	var $count			=	0;
	var $limit			=	3;
	$('.setSkills').click(function(){
		localStorage.setItem('skills',$('#select-skills').val());
		localStorage.setItem('location',$('#location').val());
		localStorage.setItem('industry',$('#industry').val());
	});
	
	var selectizeOP	=	$('#select-skills').selectize({
		openOnFocus: false,
		sortField: {field: 'text',},
		closeAfterSelect: true,
		maxOptions:12,
		optgroup: true,
		plugins: ['remove_button'],
		//onChange: function() {$.fn.filterClick();},
		onItemRemove: function() {
			$('#select-skills').close();
		}
	});

	var selectizeIndu	=	$('#industry').selectize({
		openOnFocus: false,
		maxItems: 3,
		closeAfterSelect: true,
		plugins: ['remove_button'],
		//onChange: function(values) {$.fn.filterClick();},
		onItemRemove: function() {
			$('#industry').close();
		}
	});
<?php
	if(Yii::app()->user->hasState('searchFor')) {
		if(Yii::app()->user->searchFor=='industry') {?>
				select12 = selectizeIndu[0].selectize;
				select12.addItem('<?php echo Yii::app()->user->keyword;?>');
<?php
		}elseif(Yii::app()->user->searchFor=='skill' || Yii::app()->user->searchFor=='keyword') {?>
			select12 = selectizeOP[0].selectize;
			select12.addOption({value:'<?php echo Yii::app()->user->searchFor.'_'.Yii::app()->user->keyword;?>',text:'<?php echo Yii::app()->user->keyword;?>'});
			select12.addItem('<?php echo Yii::app()->user->searchFor.'_'.Yii::app()->user->keyword;?>');
			console.log("Set session data");
<?php
		}?>
	setLocalStorageData();
<?php
	}?>

	$(window).scroll(function() {
		if ($(this).scrollTop() == 0) {
			$('.search-nav').css({
				'box-shadow': 'none',
				'-moz-box-shadow' : 'none',
				'-webkit-box-shadow' : 'none'
			});
		}
		else {
			$('.search-nav').css({
				'box-shadow': '0 3px 6px rgba(0, 0, 0, 0.1)',
				'-moz-box-shadow' : '0 3px 6px rgba(0, 0, 0, 0.1)',
				'-webkit-box-shadow' : '0 3px 6px rgba(0, 0, 0, 0.1)'
			});
		}
	});

	function setLocalStorageData() {
		// add data from localstorage
		if(localStorage.length > 0) {
			// get and set data to their respective fields
			var storageSkills = localStorage.getItem('skills');
			//var storageLocation = localStorage.getItem('location');
			var storageIndustry = localStorage.getItem('industry');
			var storageRange = localStorage.getItem('rangeSlider');
			var storageSuppliers = localStorage.getItem('selectedSuplliers');
			if(typeof storageSkills != undefined && storageSkills != null) {
				console.log("Skills: " + storageSkills);
				var skillsArray = storageSkills.split(",");
				console.log(skillsArray);
				var selectSkills = selectizeOP[0].selectize;
				$.each(skillsArray, function(index, item) {
					selectSkills.addItem(item);
				});
				console.log("Selected Skills");
			}
			/*
			if(typeof storageLocation != undefined && storageLocation != null) {
				//console.log("Location: " + storageLocation);
				var locationArray = storageLocation.split(",");
				console.log(locationArray);
				var selectLocation = selectizeLoc[0].selectize;
				$.each(locationArray, function(index, item) {
					selectLocation.addItem(item);
				});
				console.log("Selected Locations");
			}*/
			if(typeof storageIndustry != undefined && storageIndustry != null) {
				console.log("Industry: " + storageIndustry);
				var industryArray = storageIndustry.split(",");
				console.log(industryArray);
				var selectSkills = selectizeIndu[0].selectize;
				$.each(industryArray, function(index, item) {
					selectSkills.addItem(item);
				});
				console.log("Selected Industries");
			}
			if(typeof storageRange != undefined && storageRange != null) {
				console.log("Range: " + storageRange);
				var rangeArray = storageRange.split(";");
				rangeSlider.update({
					from: rangeArray[0],
					to: rangeArray[1]
				});
			}

			$( document ).ajaxComplete(function() {
				if(typeof storageSuppliers != undefined && storageSuppliers != null) {
					console.log("Suppliers: " + storageSuppliers);
					supplierArray = storageSuppliers.split(",");
					$.each(supplierArray, function(index, item) {
						if($('#not-selected-' + item).is(':visible')) {
							$('#not-selected-' + item)[0].click();
						}
					});
				}
			});
			// clear localStorage
			//localStorage.clear();
		}
	}
	
	localStorage.removeItem('searchItem');

	$.fn.callLoad = (function(){
		$('#search-Result').on('click',".hide-result",function() {
			if($count<$limit){
				$(this).addClass('hide supplier-selected');
				$(this).next(".show-result").removeClass('hide');
				$count		=	$('.supplier-selected').length;
				$valCurrent	=	$(this).val();
				suppliersList.push($valCurrent);
				$("#CountSupplier").html($count);
			}else{
				var actionconfirm = 'To keep things simple, we recommend talking to '+$limit+' (or fewer) teams only. You can always request more later.';
				bootbox.alert(actionconfirm);
			}
			localStorage.setItem('suppliersSelected',suppliersList);
		});

		$('#search-Result').on('click',".show-result",function() {
			$(this).addClass('hide');
			$(this).parent().find(".hide-result").removeClass('hide supplier-selected');
			$count		=	$('.supplier-selected').length;
			$valCurrent	=	$(this).val();			
			var $indx	=	suppliersList.indexOf($valCurrent);
			suppliersList.splice($indx, 1);
			$("#CountSupplier").html($count);
			localStorage.setItem('suppliersSelected',suppliersList);
		});
	})();
	
	$(document).on('click','#see-more',function(){
		$('.result-hover').each(function(){
			$(this).removeClass('hide');
		});
		$('#see-more').addClass('hide');
	});
		
	$(".menu-icon").click(function(){
		$(".menu-login-section").fadeIn(300);
	});
	$(".menu-close").click(function(){
		$(".menu-login-section").fadeOut(300);
	});
	$(".forgot-passwordDiv").click(function(){
		$(".forgot-password").fadeIn(500);
		$(".signin").fadeOut(500); 		
	});
	$(".create-accDiv").click(function(){
		$(".create-acc").fadeIn(500);
		$(".signin").fadeOut(500);
	});
	$(".create-accDiv").click(function(){
		$(".create-acc").fadeIn(500);
		$(".forgot-password").fadeOut(500); 
	});
	$(".signin-div").click(function(){
		$(".signin").fadeIn(500);
		$(".create-acc").fadeOut(500);
	});
});
</script>