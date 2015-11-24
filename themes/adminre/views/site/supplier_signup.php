<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/jstz.min.js"></script>
<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3>Sign Up as Supplier</h3></div>
		</div>
	</div>
</div>   

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
			<?php
				$check = 0;
				if(isset($_POST) && !empty($_POST))
					$check = 1;
			?>
			<div class="col-sm-6 ">
				Not a Supplier? <?php echo CHtml::link('Sign up as Client', array('/site/signup'));?>           
				<h3>New User? Register Now!</h3>         
				<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
					<div class="form-group pa0 mt10">
						<label for="name1">Name</label>
						<?php echo $form->hiddenField($users,'time_zone'); ?>
						<?php echo $form->textField($users,'first_name',array('placeholder'=>"Name (Required)",'required'=>'required','title'=>"Name (Required)",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
						<?php if($check == 1)echo $form->error($users,'first_name'); ?>
					</div> 					
					<div class="form-group">
						<label for="exampleInputEmail1">Email </label>
						<?php echo $form->emailField($users,'username',array('placeholder'=>"Email (Required)",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText required email','tabindex'=>'3')); ?>
						<?php if($check == 1)echo $form->error($users,'username'); ?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<?php echo $form->passwordField($users,'password',array('placeholder'=>"Password (Required)",'required'=>'required','title'=>"Password (Required)",'data-parsley-minlength'=>"6",'class'=>'form-control text-input defaultText required minlength','length'=>"6",'tabindex'=>'4'));?>
						<?php if($check == 1)echo $form->error($users,'password'); ?>
					</div>
					<div class="form-group hide">
						<label for="city">City</label>
						<?php
							$city = "";
							if(isset($_POST['city']) && !empty($_POST['city']))
								$city = $_POST['city'];
						?>
						<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
							'model' => $users,
							'value' => $city,
							'name' => 'city',
							'id'=>'testCity',
							'source'=>'js: function(request, response){
								$.ajax({
									url: "'.$this->createUrl('autoCity').'",
									dataType: "json",
									data: {
										term: request.term,
										brand: $("#type").val()
									},
									success: function (data) {response(data);}
								})
							}',
							'options'=>array('class'=>'form-control text-input defaultText required','placeholder'=>"Location (Required)",'title'=>'Location (Required)','tabindex'=>'5',
							'select' => 'js:function(event, ui){ $("#cityId").val(ui.item.id);$("#testCity").attr("readonly","readonly")}',
							
							'click'=>'js:function( event, ui){alert("test");return false;}',
							),
							'htmlOptions'=>array('value'=>'Search',)
							));
						?>
						<?php echo $form->error($users,'city'); ?>
					</div>
					<div class="checkbox">
						<?php 
							$users->role_id=3;
							echo $form->hiddenField($users,'role_id');
							echo $form->hiddenField($users,'cities_id',array('id'=>'cityId'));
						?>
						<input required="required" type="checkbox" name="checkbox" id="checkbox"/>
						<label for="checkbox" class="fs12 pl0">&nbsp; I agree to</label>
						<a class="" href="javascript:void(0);" id="">Terms & Conditions</a>
					</div>
					<?php echo CHtml::submitButton('Sign Up',array('id'=>'signup','class'=>'btn btn-primary bm0 pull-left mt15','tabindex'=>'5')); ?>
				<?php $this->endWidget(); ?>
			</div>
			<div class="col-sm-6">
			<h3>New User? Registered with Linkedin </h3>
			<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
			<div class="connect">
			<?php echo CHtml::link('Connect with Linkedin', array('/site/linkedin','lType'=>'initiate','role'=>3),array('class'=>'btn btn-lg btn-primary share-linkedin'));?>
			
			
			 </div>
			</div>
		</div>
	</div>
<!-- /.container --> 
</div>
<script type="application/javascript">
	$(document).ready(function(){
		var timezone = jstz.determine();
 		var tz = timezone.name();
 		$("#Users_time_zone").val(tz);
		$(":input").focusout(function(){
			$(this).parsley().validate();
		});
		/*$("#signup").click(function(){
			var city_id = $("#cityId").val();
			if(!city_id)
				$("#testCity").val("");
		});
		$("#testCity").attr("placeholder","City (Required)");
		$("#testCity").attr("required","required"); 
		$("#testCity").attr("tabindex","5");
		$("#testCity").addClass("form-control");
		$( "#testCity").focus(function(){
			$this=$("#testCity");
			$this.removeAttr("readonly");
			$this.val('');
			$("#cityId").val('');});*/
	});
</script>
