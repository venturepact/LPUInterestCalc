<section class="sup-section1">
	<div class="container posr">
		<nav role="navigation" class="navbar navbar-static-top" id="navbar">
			<div class="container pl0">
				<div class="navbar-header">
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle rs-hide">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-reorder fa-2x white menu-icon"></i>
					</button>
					<?php
					if(Yii::app()->user->isGuest)
						echo CHtml::link('<img class="rs-logo" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/logo.png" alt="VenturePact Logo">', array('/site'),array('class'=>'navbar-brand'));
					else
						echo CHtml::link('<img class="rs-logo" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/logo.png" alt="VenturePact Logo">', array('/'.Yii::app()->user->role),array('class'=>'navbar-brand'));
					?>
				</div>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="tel:9497917659">Call 949.791.7659</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="sp-left">
			<div class="sup-header-text">
				<?php if(Yii::app()->controller->action->id=='team'){ ?>
				<h1 class="sup-heading rs-hide">Your Development Team in <?php echo $keyword; ?> On Demand</h1>
				<h2 class="sup-heading hide rs-content-show">Your Development Team in <?php echo $keyword; ?> On Demand</h2>
				<?php }else{ ?>
				<h1 class="sup-heading rs-hide">Hire <?php echo $keyword; ?> Developers, <br> On Demand</h1>
				<h2 class="sup-heading hide rs-content-show">Hire <b><?php echo $keyword; ?></b> Developers, <br> On Demand</h2>
				<?php } ?>
				<ul class="sup-listing mt20 ">
					<span class="font_newlight white fs18 lh25">
					<?php if(Yii::app()->controller->action->id=='team'){ ?>
					We have hand picked the best developers and teams in <?php echo $keyword; ?>. Securely connect with them using VenturePact's governance and escrow tools!
					<?php }else{ ?>
					We have hand picked the best <?php echo $keyword; ?> developers and teams. Securely connect with them using VenturePact's governance and escrow tools!
					<?php } ?>
					</span>
					<!--<li><span class="sup-icon-outr rs-fs14"><span class="icon-user-following" aria-hidden="true"></span></span> Fully Vetted Teams</li>
					<li><span class="sup-icon-outr rs-fs14"><span aria-hidden="true" class="icon-users"></span></span> Easy Collaboration</li>
					<li><span class="sup-icon-outr rs-fs14"><span class="icon-lock" aria-hidden="true"></span></span> Secured Escrow </li>-->
				</ul>
			</div>
			<div class="ht hide rs-content-show"><input type="submit" class="rs-hire-btn" value="Hire a Team" /></div>

			<div class="sup-company"><span class="green-col col-md-2 col-sm-12 col-xs-12 rs-mt20 np">Trusted By:</span>
			<div class="col-md-10 col-sm-12 col-xs-12 np ">
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/cococola-logo.png" class="img-responsive s-logo1" alt="cococola" />
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/visa-logo.png" class="img-responsive s-logo1" alt="VISA" />
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/samsung-logo.png" class="img-responsive s-logo1" alt="Samsung" />
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/honda-logo.png" class="img-responsive s-logo1" alt="Honda" />
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/tr-logo.png"  class="img-responsive s-logo1 w20p" alt="Thomas Reuters" />
			</div>	

			</div>
		</div>
		<div class="get-started-outr">
			<?php if(Yii::app()->controller->action->id=='team'){ ?>
				<h3 class="gs-header ellipsis pl15 pr15" title="Hire your Team in <?php echo $keyword; ?>">Hire your Team in <?php echo $keyword; ?><span class="icon-size icon-close hide rs-content-show pull-right" aria-hidden="true"></span></h3>
			<?php }else{ ?>
				<h3 class="gs-header" title="Hire your <?php echo $keyword; ?> Team">Hire your <?php echo $keyword; ?> Team <span class="icon-size icon-close hide rs-content-show pull-right" aria-hidden="true"></span></h3>
			<?php } ?>
			<div class="gs-body">
				<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/signupFromDevPage'),'id'=>'signupFromDevPage','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('data-parsley-validate'=>'data-parsley-validate')));?>
				<?php if(Yii::app()->controller->action->id=='team'){ ?>
				<input type="hidden" name="type_lp" value="2" />
				<?php }else{ ?>
				<input type="hidden" name="type_lp" value="1" />
				<?php } ?>
				<input type="hidden" name="keyword" value="<?php echo $keyword; ?>" />
				<div class="gs-form left-addon">
					<span class="icon-user form-icon" aria-hidden="true"></span>
					<input type="text" class="form-control" placeholder="Your Name" name="name" id="name" required="required" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-minlength="2" data-parsley-required-message="Name is required" />
				</div>
				<div class="gs-form left-addon">
					<span class="icon-envelope form-icon" aria-hidden="true"></span>
					<input type="email" class="form-control" placeholder="Email" name="email" id="email" required="required" data-parsley-type="email" data-parsley-required-message="Email is required" />
				</div>
				<?php
				$btn_text	=	"";
				if(Yii::app()->controller->action->id=='team')
				{
					$btn_text	=	"Hire Developers in ".$keyword." Now";
				}
				else
				{
					$btn_text	=	"Hire ".$keyword." Developers Now";
				}
				?>
				<?php if(Yii::app()->controller->action->id=='team' || $keyword=="Game Development" || $keyword=="Desktop Application" || $keyword=="Business Application"){ ?>
				<button type="submit" class="hire-btn"><span class="ellipsis btn-wset"><?php echo $btn_text; ?></span></button>
				<?php }else{ ?>
				<button id="hire-team" type="submit" class="hire-btn"><span class="ellipsis btn-wset"><?php echo $btn_text; ?></span></button>
				<?php } ?>
				<span class="gs-bottomtext">Risk-Free Escrow, Pay Only If Satisfied.</span>
				<?php $this->endWidget(); ?>
			</div>
			</div>
			<div class="top-brand-outr mt20 rs-hide">
				<h4 class="exc-heading ">LOVE YOUR TEAM</h4>
				<h3 class="features-subheading fs22">Over 75% of Companies <br> Rehire Their Teams</h3>

				<div class="text-center">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/stars.png" alt="Ratings" class="rating-img" />
					<p class="rating-value">Avg. Rating: 4.8/5 (212 Reviews)</p>
				</div>
			</div>
		</div>
</section>
<section class="showing-div">
	<div class="container posr">
		<?php if(Yii::app()->controller->action->id=='team'){ ?>
		<span class="showing-result-white">Our Top <span class="changeCount">5</span> Teams in <?php echo $keyword; ?></span>
		<?php }else{ ?>
		<span class="showing-result-white">Our Top <span class="changeCount">5</span> <?php echo $keyword; ?> Teams</span>
		<?php } ?>
	</div>
</section>
<section class="sup-section2">
	<div class="container mt30">
		<div class="col-md-8 col-sm-12 col-xs-12 np">
			<?php if(Yii::app()->controller->action->id=='team'){ ?>
			<span class="showing-result">Check Out These <span class="changeCount">5</span> Vetted Teams in <?php echo $keyword; ?></span>
			<?php }else{ ?>
			<span class="showing-result">Check Out These <span class="changeCount">5</span> Vetted <?php echo $keyword; ?> Teams</span>
			<?php } ?>
			<!-- Render Partial -->
			<?php $this->renderPartial('_newDeveloper',array("suppliers"=>$suppliers,'data'=>$data,'type'=>$type,'keyword'=>$keyword));?>
		</div>
	</div>
</section>
<!-- Modal SignUp -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-md-12 col-xs-12 col-sm-12 np">
			<div class="modal-body col-md-12 col-xs-12 col-sm-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np p20">
					<div class="col-md-12 col-xs-12 col-sm-12 np">
						<!-- Sign Up starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-create-acc modal-create-acc-show">

							<div class="alert alert-dismissible alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>
								<button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fs14  hide rs-content-show">X</span></button>
							<h3 class="fs26 font_newlight team-text-blue mt5">Create Account</h3>
							<div class="form-group">
								<div class="col-md-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignUp via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2,'redirectType'=>3),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10 dev-linkedin'));?>
									<form action="<?php echo Yii::app()->createUrl('/site/search1');?>" method="post" class="form-linkedin hide">
										<input type="hidden" value="<?php echo $type; ?>" name="keyword"  />
										<input type="hidden" value="<?php echo $keyword; ?>" name="value"  />
										<button class="btn width100 btn-linkedin fs14 pull-left font_newregular mt10" type="submit"><i class="fa fa-linkedin-square fs15 mr5"></i> Proceed via LinkedIn</button>
									</form>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12 mt5 mb5">
									<div class="col-md-5 border-overlay"></div>
									<div class="col-md-2 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/signup'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
								<div class="col-md-12">
									<?php echo CHtml::hiddenField('is_dev_signup','1',array('id'=>'is_dev_signup'));  ?>
									<?php echo CHtml::hiddenField('signup-category',$type,array('id'=>'signup-category'));  ?>
									<?php echo CHtml::hiddenField('signup-val',$keyword,array('id'=>'signup-val'));  ?>
									<?php echo CHtml::hiddenField('is_dev_signup_search','0',array('id'=>'is_dev_signup_search'));  ?>
									<?php echo $form->textField($users,'first_name',array('data-parsley-required-message'=>'Name is required','placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input bb0 required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
									<?php echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input bb0 required email','tabindex'=>'2')); ?>
									<?php echo $form->passwordField($users,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'required'=>'required','title'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required minlength','length'=>"6",'tabindex'=>'3'));?>
									<?php $users->role_id=2; echo $form->hiddenField($users,'role_id'); ?>
									<?php if(Yii::app()->user->hasState('promo')){
											$users->refCode=Yii::app()->user->promo;
											echo $form->hiddenField($users,'refCode');
									}?>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
										<input required="required" type="checkbox" name="customcheckbox1" id="customcheckbox1" checked/>
										<label for="customcheckbox1" class="fs12 grey1">&nbsp; I agree to</label>
										<a class="fs12 font_newregular orange-new mt15" href="javascript:void(0);" id="" data-toggle='modal' data-target='#terms-conditions'>Terms & Conditions</a>
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<?php echo CHtml::button('Create Account',array('id'=>'signupSearch','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15','tabindex'=>'4','data-id'=>'sign_up')); ?>
								</div>
								<?php $this->endWidget(); ?>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="col-md-12 col-xs-12 col-sm-12 bt mt25 pt20 np">
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
									<div class="col-md-12 col-xs-12 col-sm-12">
										<?php echo $form->textField($forgot,'email',array('data-parsley-required-message'=>'Email is required','placeholder'=>'Email','class'=>'gui-input bb2 mt10','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email')); ?>
									</div>
									<div class="col-md-12 col-xs-12 col-sm-12">
										<?php echo CHtml::button('Reset Password',array('name'=>'Submit','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt20','id'=>'passButSat')); ?>
									</div>
									<div class="col-md-12 col-xs-12 col-sm-12">
										<div class="col-md-12 bt mt25 pt20 np">
											<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new modal-create-accDiv" href="javascript:void(0);">Create now</a></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php $this->endWidget(); ?>
						<!-- Forgot Password ends -->
						<!-- Sign In starts -->
						<div class="form-horizontal admin-form theme-primary col-md-8 col-md-offset-2 modal-signin modal-signin-hide">

							<div class="alert alert-dismissible alert-danger alert_message mt15" style="display:none;">
								<p class="messageResponse"></p>
							</div>
								<button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fs14 hide rs-content-show">X</span></button>
							<h3 class="fs26 font_newlight team-text-blue mt5">Members</h3>
							<div class="form-group">
								<div class="col-md-12 col-xs-12 col-sm-12">
									<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2,'redirectType'=>3),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10 dev-linkedin'));?>
									<form action="<?php echo Yii::app()->createUrl('/site/search1');?>" method="post" class="form-linkedin hide">
										<input type="hidden" value="<?php echo $type; ?>" name="keyword"  />
										<input type="hidden" value="<?php echo $keyword; ?>" name="value"  />
										<button class="btn width100 btn-linkedin fs14 pull-left font_newregular mt10" type="submit"><i class="fa fa-linkedin-square fs15 mr5"></i> Proceed via LinkedIn</button>
									</form>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12 mt5 mb5">
									<div class="col-md-5 border-overlay"></div>
									<div class="col-md-2 p10 text-center"><span class="fs14 font_newregular grey1">or</span></div>
									<div class="col-md-5 border-overlay"></div>
								</div>
								<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/login'),'id'=>'login-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<?php echo CHtml::hiddenField('is_dev_login','1',array('id'=>'is_dev_login'));  ?>
									<?php echo CHtml::hiddenField('login-category',$type,array('id'=>'login-category'));  ?>
									<?php echo CHtml::hiddenField('login-val',$keyword,array('id'=>'login-val'));  ?>
									<?php echo CHtml::hiddenField('is_dev_login_search','0',array('id'=>'is_dev_login_search'));  ?>
									<?php echo $form->emailField($model,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email")); ?>
									<?php echo $form->passwordField($model,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordFieldInPopup')); ?>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="col-md-6 np">
										<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
											<?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox"));?>
											<label for="customcheckbox" class="fs12 grey1">&nbsp; Remember me</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-6 col-sm-6 np">
										<a class="fs12 font_newregular orange-new pull-right mt15 modal-forgot-passwordDiv" href="javascript:void(0);" id="">Forgot Password?</a>
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<?php echo CHtml::button('Sign In',array('id'=>'login-m','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15','data-id'=>'login-form')); ?>
								</div>
								<?php $this->endWidget(); ?>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="col-md-12 col-xs-12 col-sm-12 bt mt25 pt20 np">
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
var Url;
$(document).ready(function() {
	var id;	
	var suppliersList	=	[];

	<?php if(Yii::app()->controller->action->id=='team'){ ?>
	var newText			=	"Resources To Get You Started With Your needs in "+"<?php echo $keyword; ?>";
	<?php }else{ ?>
	var newText			=	"Resources To Get You Started With Your "+"<?php echo $keyword; ?> needs";
	<?php } ?>
	$("#changeFooter").html(newText);
	
	$(document).on('click', '.gotoTop', function() {
		$("html, body").animate({ scrollTop: 0 });
		return false;
	});

	//Scroll search add
	$(window).scroll(function(){
		if ($(this).scrollTop() > 425) {
			$('.showing-div').fadeIn();
			$('.get-started-outr').addClass('get-fixed');
			$('.top-brand-outr').addClass('outr-fixed');
		} else  {
			$('.showing-div').fadeOut();
			$('.get-started-outr').removeClass('get-fixed');
			$('.top-brand-outr').removeClass('outr-fixed');
		}
	});

	$(window).scroll(function(){
		var offset		=	$('.section6').offset();
		var offestVal	=	offset.top;
		if($(this).scrollTop() > offestVal-565) {
			$('.gs-body').addClass('hide');
			$('.top-brand-outr').addClass('hide');
			$('.gs-header').addClass('gotoTop');
		}else{
			$('.gs-body').removeClass('hide');
			$('.top-brand-outr').removeClass('hide');
			$('.gs-header').removeClass('gotoTop');
		}
	});

	$(window).scroll(function(){
		if($(this).width() < 768) {
			if ($(this).scrollTop() > 300) {
				$('#search-icon-mob').addClass('sr-mobile');
			} else  {
				$('#search-icon-mob').removeClass('sr-mobile');
			}
		}
	});

	$(".rs-hire-btn").click(function(){
		$(".get-started-outr").addClass('rs-content-show');
	});

	$(".icon-size").click(function(){
	$(".get-started-outr").removeClass('rs-content-show');
	});

	$('.rating').rating();

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
		$(this).attr('value','Please Wait ...');
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
		suppliersList	=	[];
		suppliersList.push(id);
		localStorage.setItem('selectedSuplliers',suppliersList);
		signIn($(this));
	});
	
	$('.dev-login').click(function(){	
		Url=$(this).data('value');			
		id = $(this).attr('value');
	});
	
	$('.setSkills').click(function(){
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
	});

	$('#hire-team').click(function(){
		goog_report_conversion(document.location.href);
		localStorage.setItem('devSkills','<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
	});

	$('.dev-connect').click(function(){
		id = $(this).attr('value');
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
		suppliersList	=	[];
		suppliersList.push(id);
		localStorage.setItem('selectedSuplliers',suppliersList);
		Url=$(this).attr('href');
		//window.location.replace("<?php echo Yii::app()->createUrl("/site/projectCreate");?>");
	});

	$('#signupSearch').click(function(e){
		e.preventDefault();
		$(this).attr('value','Creating Account ...');
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
		suppliersList	=	[];
		suppliersList.push(id);
		localStorage.setItem('selectedSuplliers',suppliersList);
		signUp($(this));
	});

	$('.dev-linkedin').click(function(){
		goog_report_conversion(document.location.href);
		localStorage.setItem('skills','skill_<?php echo $keyword; ?>');
		localStorage.setItem('industry','null');
		suppliersList	=	[];
		suppliersList.push(id);
		localStorage.setItem('selectedSuplliers',suppliersList);
	});

	$( "#passwordFieldInPopup" ).keypress(function( event ) {
	  if ( event.which == 13 ) {
	     $( "#login-m" ).trigger( "click" );
	  }
	});

	$(document).on('hidden.bs.modal','#signup',function(e) {
		$('#is_dev_signup_search').val('0');
		$('#is_dev_login_search').val('0');
		$('.dev-linkedin').removeClass('hide');
		$('.form-linkedin').addClass('hide');
	});

	if ($(window).width() <= 768) {
		var height = ($( window ).height()-152)+'px';
		$('.slimscroll').css('overflow-y','scroll')
		$('.slimscroll').css('height',height);
	}
	else{
		$('.slimscroll').slimscroll().bind('slimscrolling', function(e, pos){
			if(pos < 10){    
				$(e.target).find(".link").parent().show();
			}
			else{    	
				$(e.target).find(".link").parent().hide();
			}
		});
	}

	$('a[data-toggle="tab"]').on('click', function() {
		$('.active.bxslider-list').removeClass('active');
		var elem = $(this).closest('.bxslider-list');
		if(!elem.hasClass('active'))
			elem.addClass('active');
		$('div.slimscroll').slimScroll({ scrollTo: '0px' });
	});

	$(".tag-more").click(function(){
		$(".tag-collapse").css('display', 'inline-block');
		$(".tag-less").css('display', 'inline-block');
		$(".tag-more").hide();
	});

	$(".tag-less").click(function(){
		$(".tag-collapse").hide();
		$(".tag-more").css('display', 'inline-block');
		$(".tag-less").hide();
	});
	
	$('#blank-div-height').height(($( window ).height()-60));

	$(document).on('click','.next',function(){
		var supplier_id		=	parseInt($(this).attr("data-supplier-id"));
		var next_slide_id	=	parseInt($(this).attr("data-slide-id"));
		var next_slide		=	'#Slide-'+supplier_id+'-'+next_slide_id;
		var curr_slide		=	'#Slide-'+supplier_id+'-'+(next_slide_id-1);
		console.log(next_slide);
		console.log(curr_slide);
		//$("body").css("overflow", "hidden");
		$(curr_slide).animo({animation: "fadeOutLeft", duration: 0.0, keep: false},function() {
			$(curr_slide).hide();
			$(next_slide).show().removeClass("hide").animo({animation: "fadeInRight", duration: 0.0},function(){
				$("body").addClass("scroll-height");
				$("body").removeClass("no-scroll");
				$(curr_slide).removeClass('currentSlide');
				$(next_slide).addClass('currentSlide');
			});
		});
	});

	$(document).on('click','.previous',function(){
		var supplier_id		=	parseInt($(this).attr("data-supplier-id"));
		var prev_slide_id	=	parseInt($(this).attr("data-slide-id"));
		var next_slide		=	'#Slide-'+supplier_id+'-'+prev_slide_id;
		var curr_slide		=	'#Slide-'+supplier_id+'-'+(prev_slide_id+1);
		console.log(next_slide);
		console.log(curr_slide);
		//$("body").css("overflow", "hidden");
		$(curr_slide).animo({animation: "fadeOutRight", duration: 0.0, keep: false},function() {
			$(curr_slide).hide();
			$(next_slide).show().removeClass("hide").animo({animation: "fadeInLeft", duration: 0.0},function(){
				$("body").addClass("scroll-height");
				$("body").removeClass("no-scroll");
				$(curr_slide).removeClass('currentSlide');
				$(next_slide).addClass('currentSlide');
			});
		});
	});
	
	$(document).on('shown.bs.modal','.modal-lazy',function(e) {
		$(this).find('.bootstrap-slider img').each(function(){
			$(this).attr('src', $(this).attr('data-img-url'));
		});
	});
	
	$(document).on('click',".link",function(e){
		$(this).parents('.slimscroll').slimScroll({ scrollTo : $(this).parent().prev().height() });
		$(this).parent().hide();
	});
	
	$(document).on('click','a[data-toggle="tab"]', function() {
			$(this).parent().parent().parent().find('div.active').removeClass('active');
			$(this).parent().addClass('active');
	});
});

function signIn(element){
	var form="#"+element.attr('data-id');
	if($(form).parsley().validate()){
		element.attr('value','Please Wait ... ');
		$.ajax({
			type:'POST',
			url:$(form).attr('action'),
			data:$(form).serialize(),
			success:function(data){
				console.log(data);
				var response = $.parseJSON(data);
				if(response.success=='1'){
					console.log(Url);
					 if(Url.length > 1)
				 	{
				 		window.location.reload();	
				 	}									
					 window.open(Url);
					//window.location.href = response.url;					
				}
				else{
					element.parent().parent().parent().parent().find("p.messageResponse").html("<strong>Login Failed!</strong> "+ response.success );
					element.parent().parent().parent().parent().find("div.alert_message").fadeIn("slow");
					element.attr('value','Sign In');
				}
			}
		});
	}
}

function signUp(element){
	var form="#"+element.attr('data-id');
	if($(form).parsley().validate()){
		element.attr('value','Creating Account ...').attr('disabled','disabled');
		$.ajax({
			type:'POST',
			url:$(form).attr('action'),
			data:$(form).serialize(),
			success:function(data){
				var response = $.parseJSON(data);
				if(response.success=='1'){
					window.location.href = response.url;
				}
				else if(response.success=='2'){
					element.parent().parent().parent().parent().find("div.alert_message").removeClass('alert-danger1');
					element.parent().parent().parent().parent().find("div.alert_message").addClass('alert-success');
					element.parent().parent().parent().parent().find("p.messageResponse").html("<strong>Welcome! </strong> "+ response.msg );
					element.parent().parent().parent().parent().find("div.alert_message").fadeIn("slow");
					element.attr('value','Create Account').removeAttr("disabled");
				}
				else{
					element.parent().parent().parent().parent().find("div.alert_message").removeClass('alert-success');
					element.parent().parent().parent().parent().find("div.alert_message").addClass('alert-danger1');
					element.parent().parent().parent().parent().find("p.messageResponse").html("<strong>Failed!</strong> "+ response.success );
					element.parent().parent().parent().parent().find("div.alert_message").fadeIn("slow");
					element.attr('value','Create Account').removeAttr("disabled");
				}
			}
		});
	}
	goog_report_conversion(document.location.href);
}

function showHideMore(link,show){
	if(show==1){
		link.parent().css('display','none');
		link.parent().next('.showHide').slideDown('fast');
		link.parent().next('.showHide').css('display','inline');
	}
	else{
		link.parent().slideUp('fast');
		link.parent().prev('.showHide').css('display','inline');
	}
}

function handelSkillsHideShow(element){
	var val=element.attr('data-id');
	var parent=element.parent().parent();
	parent.find("[data-display^=pop_]").hide('fast');
	if(val=="pop_skills"){
		parent.find("[data-display^=pop_]").show('fast');
		if(parent.find(".less-skills").length !=0)
			parent.find(".less-skills").show('fast');
	}
	else{
		parent.find("[data-display='"+val+"']").show('fast');
		if(parent.find(".less-skills").length !=0 && parent.find(".more-skills").length !=0 ){
			parent.find(".less-skills,.more-skills").hide('fast');
		}
	}
	//remove class from all other buttons
	parent.find("[data-id^=pop_]").removeClass('active');
	//apply class to current button
	parent.find("[data-id='"+val+"']").addClass('active');
}

$('.description').click(function(){
	if($(this).html()=="(read less)")
		$(this).html('(read more)');
	else
		$(this).html('(read less)');
	$(this).parent().find('.moreDescription').toggleClass('hide');	
});
</script>