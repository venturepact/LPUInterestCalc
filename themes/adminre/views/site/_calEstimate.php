
	<div class="cal-map-top">
		<div class="map-topbar">
			<span class="col-xs-6 np mp-heading">
				See how your app will cost across the world!
			</span>
			<ul class="mp-topicons">
				<li><a href="javascript:void(0);" class="active"><span class="icon-info" aria-hidden="true"></span></a></li>
				<li><a href="javascript:void(0);"><span class="icon-share-alt" aria-hidden="true"></span></a></li>
				<li><a href="javascript:void(0);" class="close-map"><span class="icon-close" aria-hidden="true"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="cal-map-mid">
		<div class="col-md-12">
			<div class="map_zone_outer">
				<div class="col-lg-4 col-md-4">
					<label id="div_130" class="radio-inline radio_btn radio_hide" type="button" >
					<input id="reg1" type="radio" name="zone" class="zone hide"  value="130" />
						<div class="map-zone1">
							<span>Zone 1 </span >
							<small> USA, Canada, Western Europe & Australia</small>
							<a href="javascript:void(0);" id="btn-id1" class="getestimate-btn" value="130">get estimate</a>
							<a href="javascript:void(0);" id="etestimate-btn-id1" class="getestimate-btn2 hide"></a>
						</div>
					</label>
				</div>
				<div class="col-lg-4 col-md-4 border_position_set"  >
					<label id="div_65" class="radio-inline radio_btn radio_hide" type="button">
						<input id="reg2" type="radio" name="zone" class="zone hide" value="65" />
						<div class="map-zone1">
							<span>Zone 2</span>  
							<small>Eastern Europe, Middle East, Central & South America </small>
							<a href="javascript:void(0);" id="btn-id2" class="getestimate-btn" value="65">get estimate</a>
							<a href="javascript:void(0);" id="etestimate-btn-id2" class="getestimate-btn2 hide"></a>
						</div>
					</label>
				</div>
				<div class="col-lg-4 col-md-4 " >
					<label id="div_40"  class="radio-inline radio_btn radio_hide" type="button" >
						<input id="reg3" type="radio" name="zone" class="zone hide" value="40">
						<div class="map-zone1">
							<span>Zone 3 </span>
							<small> South Asia, East Asia, South East Asia & Africa</small>
							<a href="javascript:void(0);" id="btn-id3" class="getestimate-btn hide" value="40">get estimate</a>
							<a href="javascript:void(0);"  id="etestimate-btn-id3" class="getestimate-btn2"></a>
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
				<a href="<?php echo  CController::createUrl('/site/project'); ?>" class="btn btn-redmap">Post Your Project <i class="fa fa-spinner fa-spin"></i></a>
			</div>
		</div>
	</div>
	<div class="cal-map-right">
		<span class="mapright-heading">Project Summary</span>
		<div class="mapright-total">
			<span class="icon-pointer total-icon" aria-hidden="true"></span>
			<div class="mapright-outr">
				<span class="mapright-heading2">Your App Estimate: <label id="lblAppEstimate">$<?php if(isset($user)) echo number_format($user->total_price); ?></label></span>
				<span class="mapright-heading3">Zone 3: South Asia, East Asia, South East Asia & Africa</span>
			</div>
		</div>
		<span class="mapright-heading">Project Details</span>
		<div class="mapright-detail">

		 <?php
	/*	if(isset($user)){
       $Calresult = CalculatorResult::model()->findAllByAttributes(array("users_id"=>$user->id));
      foreach($Calresult as $result ){

        ?>
             <div class="mp-deatil-outr">
				<span class="mpdetail-1"><?php echo $result->question->category->name; ?>:</span>

				<div class="col-xs-8 np">
					<?php // foreach($result->calculatorQuestions->category-> as $cat ){ ?>
					<span class="mpdetail-2"><?php echo $result->option->options; ?></span>
                    <?php // } ?>

					<span class="mpdetail-3">+$<?php echo ($result->option->hour)*40; ?></span>
				</div>
			</div>
			*/  
      ?>
   
		</div>
	</div>
