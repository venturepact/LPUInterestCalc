<?php
$totalShow	=	0;
$totalCount	=	count($suppliers);
foreach($suppliers as $supplier1){
	$totalShow++;
	$supplier	=	$supplier1['list'];
	$details	=	$supplier1['supplier'];
	$listOfCompany	=	array();
	$skills			=	array();
	$services		=	array();
	$industry		=	array();
	$skillSort		=	array();
	$result			=	array();
	$listCount		=	0;
	$otherCount		=	0;
	$clientStories	=	0;
	$matchCount		=	0;
	$totlaCount		=	0;
	$skilltemp		=	array();
	if(!empty($data['skills']))
	{
		foreach($data['skills'] as $skillSelect){
			$dataType	=	explode('_',$skillSelect);
			if($dataType[0]=='skill')
				$skilltemp[]	=	$dataType[1].'';
			elseif($dataType[0]=='service')
				$services[]	=	$dataType[1];
			elseif($dataType[0]=='industry')
				$industry[]	=	$dataType[1];
			else
				$keyword=	$dataType;
		}
	}
	
	foreach($details->suppliersHasPortfolios as $portfolio1){
		$projectSkills	=	array();
		if($portfolio1->status==1){
			if(!empty($portfolio1->company_name)){
				if($portfolio1->is_discreet!=1){
					if($listCount <4)
					{
						$listOfCompany[]	=	$portfolio1->company_name;
						$listCount++;
					}
					else
					{
						$otherCount++;
					}
				}
			}
			if(!empty($portfolio1->suppliersHasPortfolioHasSkills))
			{
				foreach($portfolio1->suppliersHasPortfolioHasSkills as $skill)
				{
					$skillSort[$skill->skills->name]	=	((isset($skillSort[$skill->skills->name]))?$skillSort[$skill->skills->name]:0)+1;
					$projectSkills[]					=	$skill->skills->name;	
				}
			}
			$result	=	array_intersect($projectSkills,$skilltemp);
			if(count($result) == count($skilltemp))
				$matchCount++;
			//foreach($projectSkills as $projectSkill)
				//if(in_array($projectSkill,$skilltemp))
					$totlaCount++;
			$clientStories++;
		}
	}
	arsort($skillSort);
	$counter	=	0;
	$otherSkills	=	array();

	$industrytemp	=	array();
	if(!empty($data['industry']))
		foreach($data['industry'] as $industrySelect){
			$industrytemp[]	=	$industrySelect;
		}
	
	foreach($skillSort as $key=>$val){
		if(in_array($key,$skilltemp)){
			if($counter<=4){
				$skills[$key]	=	$val;
				$counter++;
			}else{
				$otherSkills[$key]	=	$val;
			}
		}
	}
	
	foreach($skillSort as $key=>$val){
		if(!in_array($key,$skilltemp)){
			if($counter<=4){
				$skills[$key]	=	$val;
				$counter++;
			}else
				$otherSkills[$key]	=	$val;
		}
	}
?>
<div class="search-result-box as_t">
	<?php
	if($totalShow > 3)
	{
		if(Yii::app()->user->isGuest)
		{ 
	?>
	<div class="sr-overlay t_set"><a value="<?php echo $supplier->id;?>" href="javascript:void(0);" data-toggle="modal" data-target="#signup" data-value="<?php echo (!empty($supplier->users->display_name))?Yii::app()->createUrl('/'.$supplier->users->display_name):'javascript:void(0);'; ?>" target="_blank" class="btn sr-btn dev-login setSkills">View Profile</a></div>
	<?php 
		}
		else
		{ 
	?>
	<div class="sr-overlay t_set"><a value="<?php echo $supplier->id;?>" href="<?php echo (!empty($supplier->users->display_name))?Yii::app()->createUrl('/'.$supplier->users->display_name):'javascript:void(0);'; ?>" target="_blank" class="btn sr-btn dev-connect setSkills">View Profile</a></div>
	<?php 
		}
	}
	?>
	<div class="col-md-2 col-sm-12 col-xs-12 np">
		<a class="tm-hover" class="setSkills" href="<?php echo (!empty($supplier->users->display_name))?Yii::app()->createUrl('/'.$supplier->users->display_name):'javascript:void(0);'; ?>" target="_blank">
			<div class="tm-show2">View Profile</div>
			<img width="80" height="80" src="<?php echo (!empty($supplier->image))?$supplier->image.'/convert?w=80&h=80&fit=crop':Yii::app()->theme->baseUrl.'/style/images/avatar.png';?>" class="img-circle" alt="Team Member">
		</a>
		<?php if(!empty($supplier->offers)){?>
		<div class="fs12 mt10 mr10">
			<div class="special-outr">
				<div class="sp-hover">
					<span class="offer-bg ellipsis ">Special offer</span>
					<div class="profile-rollover">
						<p class="orange-new mt5 fs12"><?php echo $supplier->offers;?></p>
						<img alt="arrow"  class="toparrow" src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/profile-rollover-top.png" >
						<em class=""></em>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="col-md-10 col-sm-12 col-xs-12 np">
		<div class="col-md-8 np rs-p-set col-sm-8 col-xs-8 ellipsis">
			<?php echo (!empty($supplier->users->display_name))?CHtml::link($supplier->users->company_name,array('/'.$supplier->users->display_name),array('class'=>"setSkills search-head-text font_newregular nm ellipsis",'target'=>'_blank')):'<a href="javascript:void(0);" class="search-head-text fs16 font_newregular">'.$supplier->users->company_name.'</a>';?>
			<?php
			$listKey	=	array();
			if(!empty($data['skills'])){
				foreach($data['skills'] as $item){
					$exp		=	explode('_',$item);
					if(isset($exp[1]))
						$listKey[]	=	$exp[1];
				}
			}
			if(Yii::app()->controller->action->id=='team')
			{
			?>
				<h2 class="mt5 mb20 search-blue"><?php echo $clientStories; ?> <?php echo ($clientStories>1)?'projects':'project'; ?></h2>
			<?php
			}
			else
			{
				if($supplier1['matchCount']>0)
				{
			?>
				<h2 href="javascript:void(0);" data-toggle="modal" data-target="#view-project-<?php echo $supplier->id;?>" class="mt5 mb20 search-blue"><strong><?php echo $supplier1['matchCount']; ?> <?php echo ($supplier1['matchCount']>1)?'projects':'project'; ?></strong> in <?php	echo implode(', ',$listKey); ?></h2>
			<?php
				}
				else
				{
			?>
				<h2 href="javascript:void(0);" data-toggle="modal" data-target="#view-project-<?php echo $supplier->id;?>"  class="mt5 mb20 search-blue"><?php echo $supplier1['totlaCount']; ?> relevant <?php echo ($supplier1['totlaCount']>1)?'projects':'project'; ?></h2>
			<?php
				}
			}
			?>
		</div> 

		<div class="col-md-4 rs-hide">
			<?php if(Yii::app()->user->isGuest){ ?>
			<a value="<?php echo $supplier->id;?>" href="javascript:void(0);" data-toggle="modal" data-target="#signup" class="btn sr-btn dev-login">Get Connected</a>
			<?php }else{ ?>
			<a value="<?php echo $supplier->id;?>" href="javascript:void(0);" class="btn sr-btn dev-connect">Get Connected</a>
			<?php } ?>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 np  bb  pb0 mb10 lh20">
		<div class="col-md-12 col-sm-12 col-xs-12 np" >
			<div class="col-md-12 col-sm-12 col-xs-12 bb pb20 np mb15 ">
			<p class="tsm-text fs13 mb0 font_newregular"> 
			<?php 	$length = strlen($supplier->about_company); 
					if($length>250){
						echo substr($supplier->about_company,0,250).'<span class="moreDescription hide">'.substr($supplier->about_company,250,$length).'</span><a href="javascript:void(0);" class="orange-new description pl10">(read more)</a>';
					}
					else{
						echo $supplier->about_company;
					}
				?>
			</p>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 np mb10 sr-minheight ellipsis">
				<?php 
				$cityName		=	'NA';
				$officeLocCount	=	count($supplier->users->usersOffices);
				$otherLocation	=	array();
				foreach($supplier->users->usersOffices as $office){
					if(($office->dep_id == 3)&&($cityName=='NA')){
						$officeLocCount--;
						$cityName	=	$office->city->name.', '.$office->city->countries->name;
					}else{
						$otherLocation[]	=	$office->city->name.' , '.$office->city->countries->name.' - '.$office->dep->name;
					}
				}
				?>
				<span aria-hidden="true" class="icon-pointer darkgrey_iconnew"></span>
				<p class="ellipsis dis_inline darkgrey_new pr10"><?php echo $cityName; ?></p>
				<?php if($officeLocCount > 0){ ?>
				<div class="more-outr rs-hide">
					<span href="" class="btn-sm ml5 mb5 fnone more-opn"><?php echo $officeLocCount; ?> more</span>	
					<div class="more-location hide pa15">
						<?php echo $officeLocCount; ?> more
						<ul class="pl10 mt5">
							<?php foreach($otherLocation as $loc){ ?>
								<li><?php echo $loc; ?></li>
							<?php } ?>
						</ul>
						<img alt="arrow" class="toparrow" src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/profile-rollover-top.png" >
						<em class=""></em>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 np mb10 sr-minheight">
				<span aria-hidden="true" class="icon-users darkgrey_iconnew"></span>
				<p class="ellipsis dis_inline darkgrey_new"><?php echo $supplier->number_of_employee; ?> Engineers</p>
			</div>
			<?php
			$refCount		=	count($details->suppliersHasReferences);
			$totalOfRating	=	0;
			$avgRating		=	0;
			$ratCount		=	0;
			$cat_rate		=	array();
			$ReviewCategory = 	ReviewCategory::model()->findAll();
					foreach($ReviewCategory as $rcat)
					{
						$cat_rate[$rcat->name]	=	0;
					}
			if($refCount>0)
			{
				$ratCount	=	0;
				foreach($details->suppliersHasReferences as $rating){
					if($rating->status > 0){
						foreach($rating->suppliersHasCategoryRatings as $rate)
						{
									$cat_rate[$rate->reviewCategory->name]	+=	$rate->rating;
									$totalOfRating							+=	$rate->rating;
					    }	
					$ratCount++;
					}
				}
				if($ratCount > 0)
					$avgRating = number_format((float)((((float)$totalOfRating))/($ratCount*4)),1);
			}
			else
			{
				$avgRating	=	0;
			}
			if($avgRating > 0){
			?>
			<div class="col-md-4 col-sm-12 col-xs-12 np mb10 sr-minheight rating-pullout-client">	
			 		<input disabled="disabled" id="input-21b" value="<?php echo $avgRating; ?>" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs">
						<span class="rating-rollover-client ">
							<div class="col-md-12 col-sm-12 col-xs-12 pt15 pl20">
								<?php 
								foreach($cat_rate as $key=>$val)
								{
								?>
									<div class="col-md-12 col-sm-12 col-xs-12 np mt5 mb5">
										<div class="blue-new col-sm-6 col-xs-6 np font_newregular fs13 text-left"><?php echo $key; ?>:</div>
										<div class=" pull-left ml5">
											<input disabled="disabled" id="input-21b" value="<?php echo number_format((float)((((float)$val))/($ratCount)),1); ?>" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs">
										</div>
									</div>
								<?php 
								} ?>
							</div>
							<img class="toparrow" src="<?php echo Yii::app()->theme->baseUrl."/style/images/profile-rollover-top.png"; ?>" />
						</span>
			</div>
			<?php } ?>
			</div>
		<div class="col-md-12 col-sm-5 col-xs-5 np" >
			<div class="col-md-4 col-sm-12 col-xs-12 np mb10 sr-minheight fs14 trusted-color">
				<span aria-hidden="true" class="icon-check"></span>
				<p class="ellipsis dis_inline">Trusted</p>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 np mb10 sr-minheight">
				<span aria-hidden="true" class="icon-tag darkgrey_iconnew"></span>
				<p class="ellipsis dis_inline darkgrey_new">
				<?php 
					$rate 	   = '';
					if($supplier->per_hour_rate_from>0)
						$rate .= '$'.$supplier->per_hour_rate_from;
					if($supplier->per_hour_rate_from>0 && $supplier->per_hour_rate_to>0)
						$rate .=' - ';
					if($supplier->per_hour_rate_to>0)
						$rate .= '$'.$supplier->per_hour_rate_to;
				 	
				 	if($rate!='')
						echo $rate.' Per hr';
					else
						echo '--';
				?> 
				</p>
			</div>
			<?php if($ratCount>0){ ?>
			<div class="col-md-4 col-sm-12 col-xs-12 np mb10 sr-minheight">
				<p class="ellipsis dis_inline darkgrey_new"><?php echo ($ratCount>0)?$ratCount:'No'; ?> Reviews</p>
			</div>
			<?php } ?>
		</div>	
		</div>	

		<div class="col-md-12 col-sm-12 col-xs-12 np mt15 mb15">
			<?php 
			foreach($skills as $key=>$val)
			{
			?>
			<span><label class="btn-sm-new"><?php echo $key;?></label></span>
			<?php
			}
			$countSk	=	count($otherSkills);
			?>
			<?php if($countSk > 0){ ?>
			<div class="skills-outr rs-hide">
				<span class="btn-sm mr5 mb5"><?php echo $countSk;?> more</span>
				<div class="more-skills hide pa10">
					<?php echo $countSk;?> more
					<div class="mt10">
						<?php foreach($otherSkills as $key=>$val){?>
						<div class="pull-left">
							<span class="btn-sm-new mb5"><?php echo $key;?></span>
						</div>	
						<?php	}?>	
					</div>
					<img class="toparrow" src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/profile-rollover-top.png" >
					<em class=""></em>
				</div>
			</div>
			<?php } ?>
		</div>
		<p class="pt10 col-md-12 np"><span class="fs14 darkgrey_new">Clients:</span> <span class="ml5 gray-light ml10">
				<span class="rs-p1-set"><?php echo implode('&nbsp  •  &nbsp',array_slice($listOfCompany, 0, 5)); ?>
					</span></span></p>
		
		
		<div class="col-md-4 col-sm-12 col-xs-12 hide rs-content-show pb10 pt20 np">
			<?php if(Yii::app()->user->isGuest){ ?>
			<a value="<?php echo $supplier->id;?>" href="javascript:void(0);" data-toggle="modal" data-target="#signup" class="btn sr-btn dev-login rs-w100p">Get Connected</a>
			<?php }else{ ?>
			<a value="<?php echo $supplier->id;?>" href="javascript:void(0);" class="btn sr-btn dev-connect rs-w100p">Get Connected</a>
			<?php } ?>
		</div>
		
			
	</div>
</div>
<?php if($totalShow == 2)
{
?>
<div class="sr-testimonial">
	<div class="col-md-2 col-sm-2 col-xs-2 np">
		<img width="80" height="80" src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/klink.png" class="img-circle" alt="Team Member">
	</div>
	<div class="col-md-10 col-sm-9 col-xs-9 rs-ml20 np">
		<h4 class="sr-blog-text">VenturePact provided a convenient way to find quality development firms that fit our budget and timeline demands.</h4>
		<span class="sr-blog-name">Nick Bowers,</span>
		<span class="sr-blog-name2">CTO @ Klink Technologies</span>
	</div>
</div>
<?php
}elseif($totalShow == 3){
?>
<div class="sr-testimonial">
	<div class="col-md-2 col-sm-2 col-xs-2 np">
		<img width="80" height="80" src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/firefly.png" class="img-circle" alt="Team Member">
	</div>
	<div class="col-md-10 col-sm-9 col-xs-9 rs-ml20 np">
		<h4 class="sr-blog-text">The VenturePact team was highly available, very engaged, and and responded to feedback swiftly.</h4>
		<span class="sr-blog-name">Dan Shipper,</span>
		<span class="sr-blog-name2">Founder @ FireFly</span>
	</div>
</div>


<?php }if(1==1){ ?>
<!-- Modal Start-->
<div class="modal fade modal-lazy" id="view-project-<?php echo $supplier->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xlg">
		<div class="modal-content col-md-12 col-sm-12 col-xs-12 np">
			<div class="modal-header pa10 new-modal-bg bgwhite clearfix">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-10 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-12 col-xs-12">
							<img class="img-circle" width="65" height="65" alt="dell" src="<?php echo (!empty($supplier->image))?$supplier->image.'/convert?w=80&h=80&fit=crop':Yii::app()->theme->baseUrl.'/style/images/avatar.png';?>">
						</div>
						<div class="col-md-11 col-sm-12 col-xs-12 pl20">
							<h3 class="fs16 font_newregular display_block dark_blue_new mt10 mb0"><?php echo $supplier->users->company_name; ?></h3>
							<span class="fs18 display_block team-text-blue mt5"><span class="font_newregular">
							<?php
								$listKey	=	array();
								if(!empty($data['skills'])){
									foreach($data['skills'] as $item){
										$exp		=	explode('_',$item);
										if(isset($exp[1]))
											$listKey[]	=	$exp[1];
									}
								}				
								if($supplier1['matchCount']>0){
									echo '<span class="font_newregular projects">'.$supplier1['matchCount']; ?> <?php echo ($supplier1['matchCount']>1)?'projects':'project'; ?></span> <?php echo (count($listKey)!=0 || count($industrytemp)!=0)?'in':'';?> <?php	echo implode(', ',$listKey);

									if(count($listKey)==0){echo implode(', ',$industrytemp);}
								}else{
									$type	=	($supplier1['totlaCount']>1)?'projects':'project';
									echo $supplier1['totlaCount'].' relevant '.$type;
								}
							?>
							</span>
						</div>
					</div>
					<!--<div class="col-md-2 col-sm-12 col-xs-12 pt10">
						<button type="button" data-id="not-selected-<?php echo $supplier->id;?>" value="<?php echo $supplier->id;?>" class="btn btn-default1 dropdown-toggle font_newregular fs12 col-md-12 col-sm-12 col-xs-12 hide-result pb10 pt10 not-selected-<?php echo $supplier->id;?>">Select Team</button>
						<button type="button" data-id="selected-<?php echo $supplier->id;?>" value="<?php echo $supplier->id;?>" class="btn btn btn-orange pb5 dropdown-toggle font_newregular col-md-12 col-sm-12 col-xs-12 fs12 pull-right show-result pb10 pt10 hide selected-<?php echo $supplier->id;?>"><i class="fa fa-check"></i> Selected</button>
					</div>-->
				</div>
			</div>
			<div class="modal-body col-md-12 col-sm-12 col-xs-12 np new-modal-bg">
				<div class="col-md-12 col-sm-12 col-xs-12 np">
					<div class="tabbable-panel np">
						<div class="tabbable-line">
							<div class="nav nav-tabs base-tab" >
							<?php
								$portfolioLeft	= 	array();
								$portfolioMiddle= 	array();
								$portfolioRight	= 	array();
								$portfolioRightMost	= 	array();
								$portfolioFinal	= 	array();
								$allSkills 		= 	array();
								$result   		= 	array();
								$matched = 0;
								if(!empty($details->suppliersHasPortfolios)){
									$countSlider	=	0;
									$slideNumber	=	1;
									foreach($details->suppliersHasPortfolios as $portfolio){
										//$countSlider++;
										if($portfolio->status ==1){
											foreach($portfolio->suppliersHasPortfolioHasSkills as $skill1){  
												array_push($allSkills,$skill1->skills->name);
											}
											foreach($portfolio->suppliersHasPortfolioHasServices as $services1){  
												array_push($allSkills,$services1->services->name);
											}
											foreach($portfolio->suppliersPortfolioHasIndustries as $industries1){  
												array_push($allSkills,$industries1->industries->name);
											}
											
											$listKey1	=	array_merge($listKey,$services,$industrytemp);
											
											$result	=	array_intersect($allSkills,$listKey1);
											//$result	=	array_intersect($allSkills,$listKey);
											if(count($result)!=0 && count($result) == count($listKey1))
												array_push($portfolioLeft,$portfolio);
											else
												array_push($portfolioRight,$portfolio);
											$allSkills=array();
											$result   =array();
										}
									}

									$allSkills=array();
									$result   =array();

									foreach($portfolioRight as $portfolio){
										//$countSlider++;
										if($portfolio->status ==1){
											foreach($portfolio->suppliersHasPortfolioHasSkills as $skill1){  
												array_push($allSkills,$skill1->skills->name);
											}
											foreach($portfolio->suppliersHasPortfolioHasServices as $services1){  
												array_push($allSkills,$services1->services->name);
											}
											foreach($portfolio->suppliersPortfolioHasIndustries as $industries1){  
												array_push($allSkills,$industries1->industries->name);
											}
											
											$listKey1	=	array_merge($listKey,$services,$industrytemp);
											
											$result	=	array_intersect($allSkills,$listKey1);
											//$result	=	array_intersect($allSkills,$listKey);
											if(count($result)>0)
												array_push($portfolioMiddle,$portfolio);
											else
												array_push($portfolioRightMost,$portfolio);
											$allSkills=array();
											$result   =array();
										}
									}
									if(empty($portfolioMiddle))
										$portfolioFinal = array_merge($portfolioLeft, $portfolioRight);
									else
										$portfolioFinal = array_merge($portfolioLeft, $portfolioMiddle, $portfolioRightMost);
								}
								$first	=	0;
								if(!empty($portfolioFinal)){
									foreach($portfolioFinal as $portfolio){
										if($portfolio->status ==1){
											$countSlider++;
											
								if($countSlider==1){
									
									$classS	=	($slideNumber==1)?'':'hide';
									echo '<div id="Slide-'.$details->id.'-'.$slideNumber.'" class="ssbslider '.$classS.'">';
									if($slideNumber!=1)
										echo '<a href="javascript:void(0);" data-supplier-id="'.$details->id.'" data-slide-id="'.($slideNumber-1).'" class="previous"><i class="fa fa-chevron-left"></i></a>';
									else
										echo '<a href="javascript:void(0);" class="gray-light previous"><i class="fa fa-chevron-left"></i></a>';
								}
								?>
								<div class="ssbslider-list ellipsis text-center <?php echo ($first==0)?'active':'';?>">
									<a href="#tab_default_<?php echo $portfolio->id;?>" data-toggle="tab" class="ellipsis"><?php echo $portfolio->project_name;?> </a>
									<?php  
											if($first < count($portfolioLeft)){
									?>
									<div id="triangle-topright">
										<span class="triangle-text fa fa-check fs10 white-text"></span>
									</div>
									<?php }elseif($first < count($portfolioLeft)+count($portfolioMiddle)){?>
									<div id="triangle-topright1">
										<span class="triangle-text fa fa-check fs10 white-text"></span>
									</div>
									<?php }?>
								</div>
								<?php
								if(($countSlider%5)==0){
									if(($first+1)!=count($portfolioFinal))
										echo '<a href="javascript:void(0);" data-supplier-id="'.$details->id.'" data-slide-id="'.($slideNumber+1).'" class="next br0"><i class="fa fa-chevron-right"></i></a>';
									else
										echo '<a href="javascript:void(0);" class="gray-light next"><i class="fa fa-chevron-right"></i></a>';
									echo '</div>';
									$slideNumber++;
									$countSlider = 0;
								}
									
								}
										$first++;
									}
									
									if($countSlider>0 && $countSlider<5){
										echo '</div>';
										$slideNumber++;
										$countSlider = 0;
									}
									
								}
								?>
							</div>
						
							<div class="tab-content np clearfix bgdrakgrey bt0 slimscroll">
								<?php
								$first	=	0;
								if(!empty($portfolioFinal)){
									foreach($portfolioFinal as $portfolio){
										if($portfolio->status ==1){
								?>
								<div class="tab-pane <?php echo ($first==0)?'active':'';?>" id="tab_default_<?php echo $portfolio->id;?>">
									<div class="col-md-12 col-sm-12 col-xs-12 np mb100">
										<div class="col-md-12 col-sm-12 col-xs-12 np">
											<div class="col-md-7 col-sm-12 col-xs-12">
												<div class="col-md-12 col-sm-12 col-xs-12 mb10 mt5 ml0">
													<div class="col-md-12 col-sm-12 col-xs-12 np mt30 ml10 bootstrap-slider">
														<?php 
															$indicators	=	0;
															$portImages = $portfolio->suppliersPortfolioImages;
															if(empty($portImages)) {?>
																<img data-img-url="<?php echo Yii::app()->theme->baseUrl;?>/style/images/project-default-img.png"  height="360" width="640" border="0" alt="portfolio" />
															<?php 
															$indicators++;
															}else{
															foreach($portImages as $portImage) { ?>
																<img data-img-url="<?php echo $portImage->image;?>/convert?w=640&h=360&fit=crop" height="360" width="640" border="0" alt="portfolio" class="<?php echo ($indicators==0)?'isActive':'hide';?>"/>
															<?php 
															$indicators++;
															}
														}?>
														<?php
														if(!empty($portfolio->project_link)) {
															$link = $portfolio->project_link;
															if(!preg_match('/http/', $link)) $link = "http://" . $link;
														?>
														<div class="view-demo col-md-12"><a target="_blank" href="<?php echo $link; ?>"><button type="submit" class="font_newregular">View Demo</button></a></div>
														<?php } ?>
													</div>
													<?php if($indicators>1) {?>
														<span class="previousPic"><i class="fa fa-angle-left"></i></span> 
														<span class="nextPic" ><i class="fa fa-angle-right"></i></span>
													<?php }?>
												</div>
											</div>
											<div class="col-md-5 col-sm-12 col-xs-12 pl20 pr30">			
												<div class="col-md-12 col-sm-12 col-xs-12 bb pt0 pb20 mt30 np">
													<div class="col-md-8 col-sm-12 col-xs-12 pt0 np">
														<span class="fs20 font_newregular display_block team-text-blue mb5"><?php echo $portfolio->project_name;?></span>
														<?php 
														if($portfolio->portfolio_type == 0){

															if(!empty($portfolio->company_name))
																$pro_type = '<span class="font_newlight">Client</span> - '.$portfolio->company_name;
															else
																$pro_type   = "Client Project";
															$location	=	'';
															if(!empty($portfolio->location)){
																$city = Cities::model()->findByPk($portfolio->location);
																$location = !empty($city) ? $city->name . ", " . $city->countries->name : "";
															}
														}
														else if($portfolio->portfolio_type == 1){
															$pro_type   = "Independent Product";
														}
														else{
															$pro_type   =  "Open Source Project";
														}
														?>
													</div>
													<?php
													$ReviewCategory = ReviewCategory::model()->findAll();
													$totalOfRating 	=	0;
													$avgRating		=	0;
													$refCount		=	0;
													$catRating		=	array();
													foreach($ReviewCategory as $cate)
														$catRating[$cate->id]	=	0;
													if(!empty($portfolio->suppliersHasReferences))
													{
														foreach($portfolio->suppliersHasReferences as $supRef)
														{
															if($supRef->status > 0)
															{
																$refCount++;
																foreach($supRef->suppliersHasCategoryRatings as $rate)
																{
																	$totalOfRating	+=	$rate->rating;
																	$catRating[$rate->review_category_id]	+= 	$rate->rating;
																}
															}
														}
														if($refCount > 0)
														{
															$avgRating = number_format((float)((((float)$totalOfRating))/($refCount*4)),1);
															foreach($ReviewCategory as $cate)
																$catRating[$cate->id]	=	number_format((float)((((float)$catRating[$cate->id]))/($refCount)),1);
														}
													}
													?>
													<div class="col-md-4 col-sm-6 col-xs-6 pull-right np font_newregular pt5 <?php echo ($avgRating==0)?'hide':''; ?>">
														<input id="input-21b" value="<?php echo $avgRating; ?>" disabled="disabled" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs">
													</div>
													<div class="col-md-12 col-sm-12 col-xs-12 np">														
														<span class="fs13 display_block font_newregular"><?php echo $pro_type; ?><?php if($portfolio->portfolio_type == 0 && $location!=''){?> - <?php echo $location; }?></span>
													</div>
												</div>
												<?php if(!empty($portfolio->description)) {?>
												<div class="col-md-12 col-sm-12 col-xs-12 bb pt20 pb20 np">
													<p class="tsm-text fs13 mb0 font_newregular">
													<?php 
														$linkMore = '<a href="javascript:void(0);" class="orange-new" onclick="showHideMore($(this),1);"> (more)</a>';
														$linkLess = '<a href="javascript:void(0);" class="orange-new" onclick="showHideMore($(this),0);"> (less)</a>';
														if(strlen($portfolio->description)>190){
															echo substr($portfolio->description,0,190).'<span class="showHide">'.$linkMore."</span>";
															echo '<span class="showHide" style="display:none;">'.substr($portfolio->description,190,strlen($portfolio->description)).$linkLess."</span>"; 
														}
														else{ 
															echo $portfolio->description;
														}
													?>
													</p>
													
												</div>
												<?php }?>
												<?php if($portfolio->portfolio_type == 0){ ?>
												<div class="col-md-12 col-sm-12 col-xs-12 bb pt10 pb10 np">
													<div class="col-md-6 col-sm-12 col-xs-12 np">
														<div class="col-md-12 col-sm-12 col-xs-12 pt5 pb5 np rs-pr5">
															<span class="icon-calendar darkgrey_iconnew"> </span>
															<span class="fs13 ml10 font_newregular light-text">Start Date: <span class="blue-new"> &nbsp; <?php echo (isset($portfolio->start_date))?date('d M, Y',strtotime($portfolio->start_date)):'--'; ?></span></span>
														</div>
														<div class="col-md-12 col-sm-12 col-xs-12 pt5 pb5 np">
															<span class="icon-tag darkgrey_iconnew"> </span>
															<span class="fs13 ml10 font_newregular light-text">Project Cost: <span class="blue-new"> &nbsp; <?php echo ($portfolio->project_size>0)?'$'.number_format((int)$portfolio->project_size):'--'; ?></span></span>
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-xs-12 np">
														<div class="col-md-12 col-sm-12 col-xs-12 pt5 pb5 np">
															<span class="icon-clock darkgrey_iconnew"> </span>
															<span class="fs13 ml10 font_newregular light-text">Duration: <span class="blue-new"> &nbsp; <?php echo (!empty($portfolio->estimate_timeline))?$portfolio->estimate_timeline:'--'; ?></span></span>
														</div>
														<!--<div class="col-md-12 col-sm-12 col-xs-12 pt5 pb5 np">
															<span class="icon-tag darkgrey_iconnew"> </span>
															<span class="fs13 ml10 font_newregular light-text">Per Hr. Rate: <span class="blue-new"> &nbsp; <?php //echo ($portfolio->per_hour_rate>0)?'$'.number_format((int)$portfolio->per_hour_rate):'--'; ?></span></span>
														</div>-->
													</div>
												</div>
												<?php }else{ ?>
												<div class="col-md-12 col-sm-12 col-xs-12 bb pt10 pb10 np">
													<div class="col-md-12 col-sm-12 col-xs-12 np">
														<div class="col-md-6 col-sm-12 col-xs-12 pt5 pb5 np">
															<span class="icon-target darkgrey_iconnew"> </span>
															<span class="fs13 ml10 font_newregular light-text">Status: <span class="blue-new"> &nbsp; <?php echo !empty($portfolio->portfolio_status)?$portfolio->portfolio_status:'--'; ?></span></span>
														</div>
														<div class="col-md-6 col-sm-12 col-xs-12 pt5 pb5 np">
															<span class="icon-user darkgrey_iconnew"> </span>
															<span class="fs13 ml10 font_newregular light-text">Active users: <span class="blue-new"> &nbsp; <?php echo ($portfolio->no_of_customers>0)?$portfolio->no_of_customers:'--'; ?></span></span>
														</div>
													</div>
													<!--<div class="col-md-6 col-sm-12 col-xs-12 np">
														<div class="col-md-12 col-sm-12 col-xs-12 pt5 pb5 np">
															<span class="icon-calendar darkgrey_iconnew"> </span>
															<span class="fs13 ml10 font_newregular light-text">Deployment: <span class="blue-new"> &nbsp; <?php //echo (!empty($portfolio->deployment))?$portfolio->deployment:'--'; ?></span></span>
														</div>
														<div class="col-md-12 col-sm-12 col-xs-12 pt5 pb5 np">
															<span class="icon-clock darkgrey_iconnew"> </span>
															<span class="fs13 ml10 font_newregular light-text">Launched in: <span class="blue-new"> &nbsp; <?php //echo (!empty($portfolio->launched_in))?$portfolio->launched_in:'--'; ?></span></span>
														</div>
													</div>-->
												</div>
												<?php } 
												if(!empty($portfolio->suppliersHasPortfolioHasSkills) || !empty($portfolio->suppliersHasPortfolioHasServices) || !empty($portfolio->suppliersPortfolioHasIndustries)){?>
												<div class="col-md-12 col-sm-12 col-xs-12 mt20 mb10 np">
													<span class="btn-sm active mr5 mb5" data-id="pop_skills" onclick="handelSkillsHideShow($(this))">All</span>
													<?php 
													if(!empty($portfolio->suppliersHasPortfolioHasSkills)){?>
													<span class="btn-sm mr5 mb5" id="pop_skills_skills" data-id="pop_skills_switch" onclick="handelSkillsHideShow($(this))">Skills</span>
													<?php }
													if(!empty($portfolio->suppliersHasPortfolioHasServices)){?>
													<span class="btn-sm mr5 mb5" id="pop_skills_services" data-id="pop_services_switch" onclick="handelSkillsHideShow($(this))">Category</span>
													<?php }
													if(!empty($portfolio->suppliersPortfolioHasIndustries)){?>
													<span class="btn-sm mr5 mb5" id="pop_skills_industry" data-id="pop_industry_switch" onclick="handelSkillsHideShow($(this))">Domain</span>
													<?php }?>
												</div>
												<?php } ?>
												<div class="col-md-12 col-sm-12 col-xs-10 mb5 np">
													<?php $count = 0; ?>
													<?php foreach($portfolio->suppliersHasPortfolioHasSkills as $skill) { 
															if($count<5){?>
																<span class="tag-sm mr5 mb5" data-display="pop_skills_switch"><?php echo $skill->skills->name; ?></span>
															<?php }else{?>
																<span class="tag-sm mr5 mb5 tag-collapse" data-display="pop_skills_switch"><?php echo $skill->skills->name; ?></span>
													<?php 	} 	$count++;}?>
													<?php foreach($portfolio->suppliersHasPortfolioHasServices as $service) { 
															if($count<5){?>
																<span class="tag-sm mr5 mb5" data-display="pop_services_switch"><?php echo $service->services->name; ?></span>
															<?php }else{?>
																<span class="tag-sm mr5 mb5 tag-collapse" data-display="pop_services_switch"><?php echo $service->services->name; ?></span>
													<?php 	} 	$count++;}?>
													<?php foreach($portfolio->suppliersPortfolioHasIndustries as $industry) { 
															if($count<5){?>
																<span class="tag-sm mr5 mb5" data-display="pop_industry_switch"><?php echo $industry->industries->name; ?></span>
															<?php }else{?>
																<span class="tag-sm mr5 mb5 tag-collapse" data-display="pop_industry_switch"><?php echo $industry->industries->name; ?></span>
													<?php 	} 	$count++;}?>
													<?php if($count>5){?>
														<span class="btn-sm mr5 mb5 more-skills float-none ellipsis"><?php echo $count-5;?> More</span>
														<span class="btn-sm mr5 mb5 less-skills float-none" style="display: none;">Less</span>
													<?php }?>
												</div>
											</div>
										</div>
										<?php
										$default_logo 	= 	Yii::app()->theme->baseUrl."/style/images/avatar.png";
										if(!empty($portfolio->suppliersHasReferences))
										{ ?>
											<div class="col-md-12 col-sm-12 col-xs-12 text-center">
												<a href="javascript:void(0);" class="text-center grey-new-light link">
													<i class="grey-new-light fa fa-angle-down fs24 bounce animated"></i><br>
													Read Reviews
												</a>
											</div>
										<?php	
											foreach($portfolio->suppliersHasReferences as $supRef)
											{
												if($supRef->status > 0)
												{
										?>
										<div class="col-md-12 col-sm-12 col-xs-12 np pl20 pr20 mt30 mb0" id="reviews-<?php echo $supRef->id; ?>">		
											<div class="col-md-4 col-sm-12 col-xs-12 pa10">
												<?php
													$fp = false;
													if(preg_match('/www.filepicker.io/', $supRef->clientProfiles->users->image))
														$fp = "/convert?w=70&h=70&fit=crop";
													else
														$fp = "";
													$imageurl = "";                        
													if($supRef->is_unattributed==1)
													{
														$imageurl = $this->res['avtar'];
													}
													else
													{
														if($supRef->review_type == 1){
															$imageurl=$this->res['avtar'];
														}
														else{
															$imageurl=(empty($supRef->clientProfiles->users->image)?$this->res['avtar']:$supRef->clientProfiles->users->image);
														}

													}       
												?>
												<div class="col-md-12 col-sm-12 col-xs-12 pt20">				
													<a href="javascript:void(0);">
														<div class="profile-popupdiv">
															<div class="srp-tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>
															<img class="img-circle" src="<?php echo (!empty($imageurl)) ? $imageurl.$fp : $this->res['avtar']; ?>" alt="Team Member" width="70" height="70" />
														</div>
														<div class="col-md-8 col-sm-12 col-xs-12 ">
															<?php if($supRef->review_type==1)  { ?>
															<h5 class="fs14 display_block font_newregular mt0 mb5 team-text-blue">
																<?php echo $supRef->client_first_name; ?>
															</h5>
															<label class="label-sm mt10 mb5">Self Reported</label>
															<?php }else{ ?>
															<h5 class="fs14 display_block font_newregular mt0 mb5 team-text-blue"><?php echo ($supRef->is_unattributed==1 ?"<label class='label-sm mt10 mb5'>Confidential Client</label>":$supRef->client_first_name); ?></h5>
															<h6 class="fs12 display_block nm text-color-navy mt5"><?php echo ($supRef->is_unattributed==1?$supRef->tag_line:(empty($supRef->clientProfiles->users->company_name)?"":$supRef->clientProfiles->users->company_name)); ?></h6>
															<label class="label-sm mt10 mb5"><?php echo ($supRef->status == 2)?'Verified':'Not Verified';?></label>
															<?php } ?>
														</div>
													</a>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 pt30">
													<?php foreach($supRef->suppliersHasCategoryRatings as $rating){ ?>
													<div class="col-md-12 col-sm-12 col-xs-12 np mt5 mb5">
														<div class="col-sm-5 blue-new np font_newregular fs13"><?php echo $rating->reviewCategory->name; ?>:</div>
														<div class="col-md-7 col-sm-6 col-xs-6 font_newregular text-left">
															<input id="input-21b" value="<?php echo $rating->rating; ?>" disabled="disabled" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs">
														</div>
													</div>
													<?php } ?>
												</div>
											</div>
											<div class="col-md-8 col-sm-12 col-xs-12 pa10 bl pl30">
												<?php foreach($supRef->suppliersReferencesQuestions as $question){
													if(!empty($question->answers)){
												?>
												<div class="col-md-12 col-sm-12 col-xs-12 mt10 np">
													<span class="mt0 display_inline mr5 fs13 blue-new font_newregular mb15"><?php echo $question->reviewQuestions->title;?></span>
													<p class="tsm-text fs13 mb15 font_newlight">
														<?php echo $question->answers;?>
													</p>
												</div>
												<?php }} ?>
											</div>
										</div>
									<?php
												}
											}
										}
									?>
									</div>
								</div>
								<?php
										}
										$first++;
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>
</div>
<!-- Modal End-->
<!-- Resposive Modal Start-->
<div class="modal fade modal-lazy rs-m20" id="r-view-project-<?php echo $supplier->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog ma0" role="document">
		<div class="modal-content">
			<div class="modal-body pa0 pb15" id="r-view-project-<?php echo $supplier->id;?>">
				<div class=" col-sm-12 col-xs-12 top-white pt10 pb15 top-pos-fxd" >
					<div class=" col-sm-1 col-xs-1 fs16 mt15 pr0">
						<a href="#" class="arrow-color" data-dismiss="modal"><i class="fa fa-long-arrow-left  "></i></a>
					</div>
					<div class=" col-sm-11 col-xs-11 pr0  ">
						<h3 class="fs16 font_newregular display_block dark_blue_new mt10 mb0 ellipsis"><?php echo $supplier->users->company_name; ?></h3>
						<span class="fs14 display_block team-text-blue mt5 ellipsis"><span class="font_newregular">
						<?php
							if($matchCount>0){
								echo $supplier1['matchCount']; ?> <?php echo ($supplier1['matchCount']>1)?'projects </span>':'project </span>'; ?> in <?php	echo implode(', ',$listKey);
							}else{
								$type	=	($supplier1['totlaCount']>1)?'projects </span>':'project </span>';
								echo $supplier1['totlaCount'].' relevant '.$type;
							}?></span>
						</span>
					</div>
				</div>
				<!--top head end-->
				<section id="cslide-slides" class="cslide-slides-master clearfix">
					<div class="cslide-prev-next clearfix tab-fixed-pos" >
						<span class="cslide-prev font_newregular  fs14 ">
							<!--<span><i class="fa fa-long-arrow-left pull-left mt3"></i></span>-->
							<span class="ellipsis pull-left w84-p">Previous</span>
						</span>
						<span class="cslide-next font_newregular ellipsis fs14">
							<span class="ellipsis w84-p pull-left">Next</span> 
							<!--<span><i class="fa fa-long-arrow-right pull-left mt3 "></i></span>-->
						</span>
					</div>
					<div class="cslide-slides-container clearfix slimscroll" >
						<?php if(!empty($portfolioFinal)){
								$projectCount=0;
								foreach($portfolioFinal as $portfolio){
									if($portfolio->status ==1){ 
						?>
						<div class="cslide-slide <?php if($projectCount==0) {echo 'cslide-first'; $projectCount=1;} ?>">
							<div class="col-md-12 col-sm-12 col-xs-12 bb ">
								<div class=" col-sm-12 col-xs-12 pt0  mt15 mb15">
									<a href="#" class="fs16 font_newregular display_block team-text-blue mb5"><?php echo $portfolio->project_name;?></a>
									<span class="fs13 display_block font_newregular  mb5">
										<?php 
										if($portfolio->portfolio_type == 0){

											if(!empty($portfolio->company_name))
												$pro_type = '<span class="font_newlight">Client</span> - '.$portfolio->company_name;
											else
												$pro_type   = "Client Project";
											$location	=	'';
											if(!empty($portfolio->location)){
												$city = Cities::model()->findByPk($portfolio->location);
												$location = !empty($city) ? $city->name . ", " . $city->countries->name : "";
											}
										}
										else if($portfolio->portfolio_type == 1){
											$pro_type   = "Independent Product";
										}
										else{
											$pro_type   =  "Open Source Project";
										}
										?>
									</span>
									<span class="font_newregular"><?php echo $pro_type; ?><?php if($portfolio->portfolio_type == 0 && $location!=''){?> - <?php echo $location; }?></span>
									<?php
										$ReviewCategory = ReviewCategory::model()->findAll();
										$totalOfRating 	=	0;
										$avgRating		=	0;
										$refCount		=	0;
										$catRating		=	array();
										foreach($ReviewCategory as $cate)
											$catRating[$cate->id]	=	0;
										if(!empty($portfolio->suppliersHasReferences))
										{
											foreach($portfolio->suppliersHasReferences as $supRef)
											{
												if($supRef->status > 0)
												{
													$refCount++;
													foreach($supRef->suppliersHasCategoryRatings as $rate)
													{
														$totalOfRating	+=	$rate->rating;
														$catRating[$rate->review_category_id]	+= 	$rate->rating;
													}
												}
											}
											if($refCount > 0)
											{
												$avgRating = number_format((float)((((float)$totalOfRating))/($refCount*4)),1);
												foreach($ReviewCategory as $cate)
													$catRating[$cate->id]	=	number_format((float)((((float)$catRating[$cate->id]))/($refCount)),1);
											}
										}
									?>
									<?php if($avgRating>0){ ?>
									<input id="input-21b" value="<?php echo $avgRating; ?>" type="number" class="rating <?php echo ($avgRating==0)?'hide':''; ?>" disabled="disabled" min=0 max=5 step=0.2 data-size="xs">
									<?php }?>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 bb np pb20">
								<div class="col-md-12 col-sm-12 col-xs-12 np bootstrap-slider">
								<!-- Images-->
									<?php 
										//$indicators	=	0;
										$portImages = $portfolio->suppliersPortfolioImages;
										if(empty($portImages)) {?>
											<img data-img-url="<?php echo Yii::app()->theme->baseUrl;?>/style/images/project-default-img.png"   width="100%"  alt="portfolio" />
										<?php 
										//$indicators++;
										}else{
										foreach($portImages as $portImage) { ?>
											<img data-img-url="<?php echo $portImage->image;?>/convert?w=640&h=360&fit=crop"  width="100%"  alt="portfolio" class="<?php //echo ($indicators==0)?'isActive':'hide';?>"/>
										<?php 
										break;
										//$indicators++;
										}
									}?>
									<?php
									if(!empty($portfolio->project_link)) {
										$link = $portfolio->project_link;
										if(!preg_match('/http/', $link)) $link = "http://" . $link;
									?>
									<div class="view-demo col-md-12"><a target="_blank" href="<?php echo $link; ?>"><button type="submit" class="font_newregular">View Demo</button></a></div>
									<?php } ?>
								</div>
								<?php //if($indicators>1) {?>
									<!-- <span class="previousPic"><i class="fa fa-angle-left"></i></span> 
									<span class="nextPic" ><i class="fa fa-angle-right"></i></span> -->						
								<?php //}?>
							</div>
							<?php if(!empty($portfolio->description)) {?>
							<div class="col-md-12 col-sm-12 col-xs-12 bb">
								<p class="pt15 pb10  ">
								<!-- Description-->
										<?php 
											$linkMore = '<a href="javascript:void(0);" class="orange-new" onclick="showHideMore($(this),1);"> (more)</a>';
											$linkLess = '<a href="javascript:void(0);" class="orange-new" onclick="showHideMore($(this),0);"> (less)</a>';
											if(strlen($portfolio->description)>190){
												echo substr($portfolio->description,0,190).'<span class="showHide">'.$linkMore."</span>";
												echo '<span class="showHide" style="display:none;">'.substr($portfolio->description,190,strlen($portfolio->description)).$linkLess."</span>"; 
											}
											else{ 
												echo $portfolio->description;
											}
										?>	
								<!-- Description End-->					
								</p>
							</div>
							<?php }?>
							<?php if($portfolio->portfolio_type == 0){ ?>
							<div class="col-sm-12 col-xs-12 bb pt10 pb10 np">
								<div class=" col-sm-12 col-xs-12 np">
									<div class=" col-sm-12 col-xs-12 pt5 pb5 ">
										<span class="icon-calendar darkgrey_iconnew"> </span>
										<span class="fs13 ml10 font_newregular light-text">Start Date: <span class="blue-new"> &nbsp;<?php echo (isset($portfolio->start_date))?date('d M, Y',strtotime($portfolio->start_date)):'--'; ?></span></span>
									</div>
									<div class=" col-sm-12 col-xs-12 pt5 pb5 ">
										<span class="icon-clock darkgrey_iconnew"> </span>
										<span class="fs13 ml10 font_newregular light-text">Duration: <span class="blue-new"> &nbsp; <?php echo (!empty($portfolio->estimate_timeline))?$portfolio->estimate_timeline:'--'; ?></span></span>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12 pt5 pb5 ">
										<span class="icon-tag darkgrey_iconnew"> </span>
										<span class="fs13 ml10 font_newregular light-text">Project Size: <span class="blue-new"> &nbsp; <?php echo ($portfolio->project_size>0)?'$'.number_format((int)$portfolio->project_size):'--'; ?></span></span>
									</div>
								</div>
							</div>
							<?php }else{ ?>
							<div class="col-md-12 col-sm-12 col-xs-12 bb pt10 pb10 np">
								<div class="col-md-12 col-sm-12 col-xs-12 np">
								<div class="col-md-6 col-sm-12 col-xs-12 pt5 pb5 np">
									<span class="icon-target darkgrey_iconnew"> </span>
									<span class="fs13 ml10 font_newregular light-text">Status: <span class="blue-new"> &nbsp; <?php echo !empty($portfolio->portfolio_status)?$portfolio->portfolio_status:'--'; ?></span></span>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 pt5 pb5 np">
									<span class="icon-user darkgrey_iconnew"> </span>
									<span class="fs13 ml10 font_newregular light-text">Active users: <span class="blue-new"> &nbsp; <?php echo ($portfolio->no_of_customers>0)?$portfolio->no_of_customers:'--'; ?></span></span>
								</div>
								</div>													
							</div>
							<?php } ?>
							<!--skills-->
							<div class="col-sm-12 col-xs-12 bb pt15 pb15 np">
								<?php 
								if(!empty($portfolio->suppliersHasPortfolioHasSkills) || !empty($portfolio->suppliersHasPortfolioHasServices) || !empty($portfolio->suppliersPortfolioHasIndustries)){?>
								<div class="col-md-12 col-sm-12 col-xs-12 mb10">
									<span class="btn-sm active mr5 mb5" data-id="pop_skills" onclick="handelSkillsHideShow($(this))">All</span>
									<?php 
									if(!empty($portfolio->suppliersHasPortfolioHasSkills)){?>
									<span class="btn-sm mr5 mb5" id="pop_skills_skills" data-id="pop_skills_switch" onclick="handelSkillsHideShow($(this))">Skills</span>
									<?php }
									if(!empty($portfolio->suppliersHasPortfolioHasServices)){?>
									<span class="btn-sm mr5 mb5" id="pop_skills_services" data-id="pop_services_switch" onclick="handelSkillsHideShow($(this))">Category</span>
									<?php }
									if(!empty($portfolio->suppliersPortfolioHasIndustries)){?>
									<span class="btn-sm mr5 mb5" id="pop_skills_industry" data-id="pop_industry_switch" onclick="handelSkillsHideShow($(this))">Domain</span>
									<?php }?>
								</div>
								<?php } ?>
								<div class="col-md-12 col-sm-12 col-xs-10 mb10">
									<?php $count = 0; ?>
									<?php foreach($portfolio->suppliersHasPortfolioHasSkills as $skill) { 
											if($count<5){?>
												<span class="tag-sm mr5 mb5" data-display="pop_skills_switch"><?php echo $skill->skills->name; ?></span>
											<?php }else{?>
												<span class="tag-sm mr5 mb5 tag-collapse" data-display="pop_skills_switch"><?php echo $skill->skills->name; ?></span>
									<?php 	} 	$count++;}?>
									<?php foreach($portfolio->suppliersHasPortfolioHasServices as $service) { 
											if($count<5){?>
												<span class="tag-sm mr5 mb5" data-display="pop_services_switch"><?php echo $service->services->name; ?></span>
											<?php }else{?>
												<span class="tag-sm mr5 mb5 tag-collapse" data-display="pop_services_switch"><?php echo $service->services->name; ?></span>
									<?php 	} 	$count++;}?>
									<?php foreach($portfolio->suppliersPortfolioHasIndustries as $industry) { 
											if($count<5){?>
												<span class="tag-sm mr5 mb5" data-display="pop_industry_switch"><?php echo $industry->industries->name; ?></span>
											<?php }else{?>
												<span class="tag-sm mr5 mb5 tag-collapse" data-display="pop_industry_switch"><?php echo $industry->industries->name; ?></span>
									<?php 	} 	$count++;}?>
									<?php if($count>5){?>
										<span class="btn-sm mr5 mb5 more-skills float-none ellipsis"><?php echo $count-5;?> More</span>
										<span class="btn-sm mr5 mb5 less-skills float-none" style="display: none;">Less</span>
									<?php }?>
								</div>
							</div>
							<!-- skills -->
							<?php
							$default_logo 	= 	Yii::app()->theme->baseUrl."/style/images/avatar.png";
							if(!empty($portfolio->suppliersHasReferences))
							{ 
								foreach($portfolio->suppliersHasReferences as $supRef)
								{
									if($supRef->status > 0)
									{?>
									<div class="col-sm-12 col-xs-12 np">
										<div class="col-sm-12 col-xs-12 pt15 np">	
											<?php
											$fp = false;
											if(preg_match('/www.filepicker.io/', $supRef->clientProfiles->users->image))
												$fp = "/convert?w=70&h=70&fit=crop";
											else
												$fp = "";
											$imageurl = "";                        
											if($supRef->is_unattributed==1)
											{
												$imageurl = $this->res['avtar'];
											}
											else
											{
												if($supRef->review_type == 1){
													$imageurl=$this->res['avtar'];
												}
												else{
													$imageurl=(empty($supRef->clientProfiles->users->image)?$this->res['avtar']:$supRef->clientProfiles->users->image);
												}

											}       
											?>			
											<a class="tm-hover1" href="">
												<div class="profile-popupdiv">
													<div class="srp-tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>
													<img class="img-circle" src="<?php echo (!empty($imageurl)) ? $imageurl.$fp : $this->res['avtar']; ?>" alt="Team Member" width="70" height="70" />
												</div>
												<div class="col-md-8 col-sm-9 col-xs-8 pl25 rs-np mt5">
													<?php if($supRef->review_type==1)  { ?>
													<h5 class="fs14 display_block font_newregular mt0 mb5 team-text-blue">
														<?php echo $supRef->client_first_name; ?>
													</h5>
													<label class="label-sm mt10 mb5">Self Reported</label>
													<?php }else{ ?>	
													<h5 class="fs14 display_block font_newregular mt0 mb5 team-text-blue"><?php echo ($supRef->is_unattributed==1 ?"<label class='label-sm mt10 mb5'>Confidential Client</label>":$supRef->client_first_name); ?></h5>
													<h6 class="fs12 display_block nm text-color-navy mt5"><?php echo ($supRef->is_unattributed==1?$supRef->tag_line:(empty($supRef->clientProfiles->users->company_name)?"":$supRef->clientProfiles->users->company_name)); ?></h6>
													<label class="label-sm mt10 mb5"><?php echo ($supRef->status == 2)?'Verified':'Not Verified';?></label>
													<?php }?>
												</div>
											</a>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12 pt30">
										<?php foreach($supRef->suppliersHasCategoryRatings as $rating){ ?>
											<div class="col-md-12 col-sm-12 col-xs-12 np mt5 mb5">
												<div class="blue-new  np font_newregular fs13 new-rating-width"><?php echo $rating->reviewCategory->name; ?>:</div>
												<div class="pull-left ml5">
													<input id="input-21b" value="<?php echo $rating->rating; ?>" disabled="disabled" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs">
												</div>
											</div>
										<?php } ?>
										</div>		
									</div>
									<div class="col-sm-12 col-xs-12 mt30 mb30 rs-pb30 rs-bb">
									<?php foreach($supRef->suppliersReferencesQuestions as $question){
											if(!empty($question->answers)){
										?>
										<div class="col-md-12 col-sm-12 col-xs-12 mt10 np">
											<h3 class="mt0 display_inline mr5 fs13 blue-new font_newregular rs-lh-19"><?php echo $question->reviewQuestions->title;?></h3>
											<p class="tsm-text fs13 mb15 font_newlight">
												<?php echo $question->answers;?>
											</p>
										</div>
									<?php }} ?>
									</div>	
								<?php }}} ?>		
						</div>
						<?php 
								}
							}
						}
						?>
					</div>
				</section>
				<!-- /sliding content section -->
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<!-- Resposive Modal End-->
<?php
}
}
?>
<script>
$('.changeCount').html('<?php echo $totalCount; ?>');

$('.rating').rating();

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

</script>
<style>
.bx-clone {
    display: none !important;
}
</style>