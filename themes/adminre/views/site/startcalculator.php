<div class="bg-dark clearfix">
	<header class="" id="header">
		<div class="container">
			<div class="navbar-header">
				<!-- START navbar header -->
				<div class="pt15 mt15 mb15 pl15">
					<!-- Brand -->
					<a href="/">
						<img width="" height="" class="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/vp_logo.png" alt="Logo">
					</a>
					<!--/ Brand -->
				</div>
				<!--/ END navbar header -->
			</div>
		</div>
	</header>

	<section role="main" id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 text-center">

					<h1 style="text-transform: uppercase" class="text-white mt15 pt15 pb5">Find out how much your app costs </h1>

					<h4 class="text-teal">Using this simple tool - find out how price changes by country</h4>
				</div>
			</div>

			<div class="container">
				<div class="col-lg-12 text-center mt15 mb15 pt15 pb15">
					<div class="map_responsive">
						<img width="639px" height="" alt="img" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/map.png"/>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="col-lg-12 col-sm-12 cal_height">
					<div class="col-md-2 col-sm-2"></div>
					<div class="col-md-7 col-md-offset-1 text-center col-sm-10 col-xs-12 mt35">
						<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fake-form','enableClientValidation'=>true,'action'=>CController::createUrl("/site/startcalculator"),'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"form-horizontal form-bordered ",'data-parsley-validate'=>'data-parsley-validate')));?>
						<div class="col-md-8 col-sm-9 col-xs-12 pb15">
							<input type="email" placeholder="Enter your Email" class="form-control-new form-control" id="email" data-parsley-type="email" name="email" required/>
						</div>

						<div class="col-md-4 col-sm-9 col-xs-12 text-center-resp">
							<input class="btn btn-teal-dark-started" type="submit" value="Get Started">
						</div>
						<?php $this->endWidget(); ?>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
	</section>
</div>

<!--App Cost Home End-->


<script type="text/javascript">
	$(document).ready(function(){
		var fake_form = $("#fake-form").parsley();
			$("#fake-form").on("submit",function(){
				console.log("working ",fake_form.isValid());
				if(fake_form.isValid()){
					return true;
				}
				return false;

			});
		});
</script>

<style>
body {
    background-color: #34495e !important;
    font-size: 13px;
    min-height: 100%;
}
</style>
