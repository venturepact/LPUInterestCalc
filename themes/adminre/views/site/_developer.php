<?php
$totalShow=0;
foreach($suppliers as $supplier1){
	$totalShow++;
	$supplier	=	$supplier1['list'];
	$details	=	$supplier1['supplier'];
		$listOfCompany	=	array();
		$skills			=	array();
		$skillSort		=	array();
		$listCount		=	0;
		$clientStories	=	0;
		foreach($details->suppliersHasPortfolios as $portfolio1){
			if($portfolio1->status==1){
				if(!empty($portfolio1->company_name)){
					if($portfolio1->is_discreet!=1 && $listCount <3){
						$listOfCompany[]	=	$portfolio1->company_name;
						$listCount++;
					}
				}
				if(!empty($portfolio1->suppliersHasPortfolioHasSkills))
					foreach($portfolio1->suppliersHasPortfolioHasSkills as $skill)
						$skillSort[$skill->skills->name]	=	((isset($skillSort[$skill->skills->name]))?$skillSort[$skill->skills->name]:0)+1;
				$clientStories++;		
			}
		}
		arsort($skillSort);
		$counter	=	0;
		$otherSkills	=	array();
		
		$skilltemp		=	array();
		if(!empty($data['skills']))
		foreach($data['skills'] as $skillSelect){
			$dataType	=	explode('_',$skillSelect);
			if($dataType[0]=='skill')
				$skilltemp[]	=	$dataType[1].'';
			elseif($dataType[0]=='service')
				$services[]	=	$dataType[1];
			else
				$keyword=	$dataType;
		}
		foreach($skillSort as $key=>$val){
			if(in_array($key,$skilltemp)){
				if($counter<=5){
					$skills[]	=	$key;
					$counter++;
				}else
					$otherSkills[]	=	$key;
			}
		}
		
		foreach($skillSort as $key=>$val){
			if(!in_array($key,$skilltemp)){
				if($counter<=5){
					$skills[]	=	$key;
					$counter++;
				}else
					$otherSkills[]	=	$key;
			}
		}?>
<div class="col-md-12 col-sm-12 col-xs-12 np bgdrakgrey <?php echo ($totalShow>8)?'hide':'';?>">
	<div class="col-md-12 col-sm-12 col-xs-12 bb pl40 pr40 pt20 pb10 rs-np rs-pt10">
		<div class="col-md-1 col-sm-12 col-xs-12 pa10 text-center pl0">
			<a href="">
				<img alt="Team Member" class="img-circle" width="70" height="70" src="<?php echo (!empty($supplier->image))?$supplier->image:Yii::app()->theme->baseUrl.'/style/images/avatar.png';?>">
				
			</a>
		</div>
		<div class="col-md-7 col-sm-12 col-xs-12 pa10">
			<div class="col-md-6 col-sm-12 col-xs-12 np rs-pt10 rs-pb10">
				<h2 class="font_newlight nm blue-new fs26 ellipsis mb5">
				<?php echo (!empty($supplier->users->display_name))?CHtml::link($supplier->users->company_name,array('/'.$supplier->users->display_name),array('class'=>"setSkills blue-new",'target'=>'_blank')):'<a href="javascript:void(0);" class="blue-new">'.$supplier->users->company_name.'</a>';?>
				</h2>
				<div class="col-md-12 col-sm-12 col-xs-12 np mt5">
					<span class="mr10 fs12 "><i class="fa fa-map-marker"></i>
					<?php 
					$cityName	=	'NA';
					$officeLocCount	=	count($supplier->users->usersOffices);
					$otherLocation	=	array();
					foreach($supplier->users->usersOffices as $office){
						if($office->dep_id == 1){
							$officeLocCount--;
							$cityName	=	$office->city->name.', '.$office->city->countries->name;
						}else{
							$otherLocation[]	=	$office->city->name.','.$office->city->countries->name;
						}
					}
					echo $cityName;
					if(!empty($otherLocation))
						echo ' | '.implode(' | ',$otherLocation);
					?>
					</span>
				   <label class=" mt10 fs12 mb5" style="color:#2ea1a3; "><i class="fa fa-check-circle-o"></i> Verified Developer</label>
				</div>
				
			</div>
			<?php
					$refCount		=	count($details->suppliersHasReferences);
					$totalOfRating	=	0;
					$avgRating		=	0;
					if($refCount>0)
					{
						$ratCount	=	0	;
						foreach($details->suppliersHasReferences as $rating){
							if($rating->status > 0){
								foreach($rating->suppliersHasCategoryRatings as $rate)
									$totalOfRating	+=	$rate->rating;
							$ratCount++;
							}
						}
						if($ratCount > 0)
							$avgRating = number_format((float)((((float)$totalOfRating))/($ratCount*4)),1);
					}
					else
						$avgRating	=	0;?>
			<?php
				$rating		=	"";
				$rateText	=	"";
				if($avgRating>0)
				{
					$rating		=	$avgRating;
					$rateText	=	"Rating";
				}
				else
				{
					$rating		=	"Not";
					$rateText	=	"Rated";
				}
				?>
			<div class="col-md-6 col-sm-12 col-xs-12 pull-right rs-center rs-np rs-hide">
				<span class="circle-new ml20 pull-right"><h4 class="font_newregular orange-new fs18 mb0">$<?php echo $supplier->per_hour_rate_from;?></h4><span class="grey-text fs10">Per Hour</span></span>
				<span class="circle-new ml20 pull-right"><h4 class="font_newregular orange-new fs18 mb0">
				<?php echo $clientStories;?>
				</h4><span class="grey-text fs10">Projects</span></span>
				<span class="circle-new ml20 pull-right rs-pull-left"><h4 class="font_newregular orange-new fs18 mb0"><?php echo $rating;?></h4><span class="grey-text fs10"><?php echo $rateText;?></span></span>
			</div>

			<div class="col-md-6 col-sm-12 col-xs-12 pull-right rs-pl15 rs-show">
				<span class="circle-new ml20"><h4 class="font_newregular orange-new fs18 mb0"><?php echo $rating;?></h4><span class="grey-text fs10"><?php echo $rateText;?></span></span>
				<span class="circle-new ml20">
					<h4 class="font_newregular orange-new fs18 mb0">
						<?php echo $clientStories;?>
					</h4>
					<span class="grey-text fs10">Projects</span>
				</span>
				<span class="circle-new ml20"><h4 class="font_newregular orange-new fs18 mb0">$<?php echo $supplier->per_hour_rate_from;?></h4><span class="grey-text fs10">Per Hour</span></span>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 np hide-details">
				<p class="fs14 wlcm-text text-left mt15" style="line-height:22px;">
					<?php
						echo $supplier->about_company;
					?>
				</p> 
				<div class="col-md-12 col-sm-12 col-xs-12 np mt15 mb15">
					<?php foreach($skills as $skil){?>
					<span class="btn-sm mr5 mb5"><?php echo $skil;?></span> 
					<?php }?>
					<div class="skills-hover display_inline">
						<span class="btn-sm lh10 p2 mr5 mb5">+<?php echo count($otherSkills);?></span>
						<div class="skills-hover2">
							<?php
							foreach($otherSkills as $oskill)
							{
							?>
							<span class="btn-sm mr5 mb5 light-g mb5"><?php echo $oskill;?></span>
							<?php
							}
							?>
						</div>
					</div>
					<div class="tags-tooltip">Have questions or feedback?</div> 
				</div>
				<?php if(!empty($supplier->offers)){?>
				<div class="col-md-6 col-sm-12 col-xs-12 pl0 mb15 mt15">
					<div class="offer-bg">
						<strong>Offer:</strong> <?php echo $supplier->offers;?>
					</div>
				</div>
				<?php }?>
				<div class="col-md-6 mt15">
				
					<?php
					if(!empty($loginConnections)){
						$countCon	=	0;
						foreach($supplier->users->linkedinConnections as $conn)
							if(in_array($conn->linkedin_Id,$loginConnections)){
								$countCon++;
								if($countCon<=3){
								?>
							<a class="posr mr5 pull-right" href="<?php echo (!empty($conn->url))?$conn->url:'javascript:void(0);';?>" target="_blank" title="<?php echo $conn->first_name.' '.$conn->last_name;?>">
								<img width="34" class="img-circle border_grey" src="<?php echo $conn->image;?>">
							</a>
					<?php 		}
							}
					if($countCon>0){?>
					<span class="col-md-12 col-sm-12 col-xs-12 mt5 fs10 lightlight mr10 text-right">Shared connections</span>
					<?php }
					}?>
				</div>
			</div>
			
		
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12 pa10">
			<div class="col-md-12 col-sm-12 col-xs-12 pr0 rs-np">
				<?php if(Yii::app()->user->isGuest){ ?>
				<a value="<?php echo $supplier->id;?>" href="javascript:void(0);" data-toggle="modal" data-target="#signup" class="btn status-btn dropdown-toggle font_newregular fs12 mr10 pull-right dev-login pl50 pr50 pt10 pb10 rs-pull-left">Get Started</a>
				<?php }else{ ?>
				<button type="button" value="<?php echo $supplier->id;?>" class="btn status-btn dropdown-toggle font_newregular fs12 mr10 pull-right dev-connect pl50 pr50 pt10 pb10 rs-pull-left">Get Connected</button>
				<?php } ?>
				<div class="col-md-12 col-sm-12 col-xs-12 mt10 mr20 pagination-outr hide-details rs-np">
					<div class="owl-demo">
						<?php
					$matched	=	array();
					if(!empty($supplier->suppliersHasPortfolios)){
						foreach($supplier->suppliersHasPortfolios as $portfolio)
							if($portfolio->status ==1){
								$matched[] = $portfolio->id;
								$portfolioImg	=	Yii::app()->theme->baseUrl."/style/images/project-default-img.png";
								foreach($portfolio->suppliersPortfolioImages as $portImg){
									$portfolioImg = $portImg->image;
									break;
								}?>
								
								<div class="item">
									<img src="<?php echo $portfolioImg;?>" alt="search result" class="lazy img-border replaceModContent" height="250" width="375" data-id="<?php echo $portfolio->id;?>">
									<div class="col-xs-12 col-sm-12 col-xs-12 matched-div replaceModContent" data-id="<?php echo $portfolio->id;?>">
										<a href="" class="display_block pb10 pt10">
											<h4 class="display_block font_newregular mb0 team-text-blue fs14 ellipsis">
												<?php echo $portfolio->project_name;?>
											</h4>
											<h6 class="fs10 display_inline font_newregular nm text-color-navy ellipsis">
												<?php echo ($portfolio->portfolio_type==0)?$portfolio->company_name:'';?>
											</h6>
											<span class="fs10 display_block">
												
												<?php 
												$skillsString	=	array();
												foreach($portfolio->suppliersHasPortfolioHasSkills as $pskill){
													if(in_array($pskill->skills->name,$skilltemp))
														$skillsString[]	= '<span class="btn-sm mr5">'.$pskill->skills->name.'</span>';
												}
												if(count($skillsString)>0)
													echo ''.implode(', ',$skillsString);
												?>
											</span>
										</a>
									</div>
								</div>
								<?php	}
						}		
						if(!empty($details->suppliersHasPortfolios))
							foreach($details->suppliersHasPortfolios as $portfolio)
								if(!in_array($portfolio->id,$matched) && $portfolio->status ==1){
									$portfolioImg	=	Yii::app()->theme->baseUrl."/style/images/project-default-img.png";
									foreach($portfolio->suppliersPortfolioImages as $portImg){
										$portfolioImg = $portImg->image;
										break;
									}?>
									<div class="item">
									<img src="<?php echo $portfolioImg;?>" alt="search result"  class="lazy img-border replaceModContent" data-id="<?php echo $portfolio->id;?>" height="250" width="375" >
									<div class="col-md-12 col-sm-12 col-xs-12 matched-div replaceModContent" data-id="<?php echo $portfolio->id;?>">
										<a href="javascript:void(0);" class="display_block pb10 pt10">
											<h4 class="display_block font_newregular mb0 team-text-blue fs14">
												<?php echo $portfolio->project_name;?>
											</h4>
											<h6 class="fs10 display_inline font_newregular nm text-color-navy">
												<?php echo $portfolio->company_name;?>
											</h6>
										</a>
									</div>
								</div>
						<?php }?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if($totalShow==3){
?>
<div class="col-md-12 col-sm-12 col-xs-12 text-center">
	<?php if(Yii::app()->user->isGuest){ ?>
		<a href="javascript:void(0);" data-toggle="modal" data-target="#signup" class="btn status-btn dropdown-toggle font_newregular fs12 mr10 mt15 mb15 pl50 pr50 pt10 pb10" id="see-more">View More</a>
	<?php }else{ ?>
		<form action="<?php echo Yii::app()->createUrl('/site/search1');?>" method="post" class="form-linkedin">
			<input type="hidden" value="<?php echo $type; ?>" name="keyword"  />
			<input type="hidden" value="<?php echo $keyword; ?>" name="value"  />
			<button class="btn status-btn dropdown-toggle font_newregular fs12 mr10 mt15 mb15 pl50 pr50 pt10 pb10" type="submit">View More</button>
		</form>
	<?php } ?>
</div>
<?php
}
$counter = 0;
$totalCount = 0;
$portfolioId = array();
if(!empty($details->suppliersHasPortfolios)){
	foreach($details->suppliersHasPortfolios as $portfolio){
		if($portfolio->status ==1){
			$portfolioId[] = $portfolio->id;
		}
	}
}
$totalCount = count($portfolioId);
if(!empty($details->suppliersHasPortfolios)){
	foreach($details->suppliersHasPortfolios as $portfolio){
		if($portfolio->status ==1){
?>
<!-- Modal Start-->
<div class="modal fade" id="view-project<?php echo $portfolio->id;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xlg">
		<div class="modal-content col-md-12 np" id="newModelContent">
			<div class="modal-header pa20 new-modal-bg" id="myModalLabel<?php echo $portfolio->id;?>">
				<?php if($counter>0){ ?><a data-id="<?php echo $portfolioId[$counter-1]; ?>" class="newModel orange-new fs12 font_newregular pull-left mt15" href="javascript:void(0);"><i class="fa fa-long-arrow-left"></i> Prev. Project</a><?php } ?>
				<h2 class="modal-title fs28 text-center"><?php if(!empty($portfolio->project_name)){echo $portfolio->project_name; }else{ echo "Project Title Not Provided";} ?></h2>
				<?php if($counter < $totalCount-1){ ?><a data-id="<?php echo $portfolioId[$counter+1]; ?>" class="newModel orange-new fs12 font_newregular pull-right mt-30" href="javascript:void(0);">Next Project <i class="fa fa-long-arrow-right"></i></a><?php } ?>
			</div>
			<div class="modal-body col-md-12 np new-modal-bg slimscroll" id="bodyContent<?php echo $portfolio->id;?>">
				<div class="col-md-12 np">
					<div class="col-md-6">
						<div class="col-md-12 mb10 mt10 np">
							<div class="col-md-12">
								<div class="view-outr">
								
								
								
<div id="carousel-example-generic<?php echo $portfolio->id;?>" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php
	$counds	=	0;
	$portImages = $portfolio->suppliersPortfolioImages;
	if(empty($portImages)) {?>
	<li data-target="#carousel-example-generic" data-slide-to="<?php echo $counds;?>" class="<?php echo ($counds==0)?'active':'';?>"></li>
    <?php 
	$counds++;
	}else{
	foreach($portImages as $portImage) { ?>
		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $counds;?>" class="<?php echo ($counds==0)?'active':'';?>"></li>
    <?php 
		$counds++;
		}
	}?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
	<?php 
	$counds	=	0;
	$portImages = $portfolio->suppliersPortfolioImages;
	if(empty($portImages)) {?>
    <div class="item <?php echo ($counds==0)?'active':'';?>">
		<img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/project-default-img.png"  height="300" border="0" alt="portfolio" />
	</div>
	<?php 
	$counds++;
	}else{
	foreach($portImages as $portImage) { ?>
	<div class="item <?php echo ($counds==0)?'active':'';?>"> 
		<img src="<?php echo $portImage->image;?>/convert?w=580&h=350&fit=crop" height="350" border="0" alt="portfolio" />
	</div>
	<?php 
	$counds++;
	}
	}?>
  </div>

  <!-- Controls -->
</div>									
									<?php
									if(!empty($portfolio->project_link)) {
										$link = $portfolio->project_link;
										if(!preg_match('/http/', $link)) $link = "http://" . $link;
									?>
									<div class="view-demo col-md-12"><a target="_blank" href="<?php echo $link; ?>"><button type="submit" class="font_newregular">View Demo</button></a></div>
									<?php } ?>
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">			
						<div class="col-md-12 pt10 pb10 bb">
							 <?php 
							if($portfolio->portfolio_type == 0){

								if(!empty($portfolio->company_name))
									$pro_type = $portfolio->company_name;
								else
									$pro_type   = "Client Project";
								$pro_image  = !empty($portfolio->image) ? $portfolio->image . "/convert?w=80&h=80&fit=crop" : Yii::app()->theme->baseUrl . "/images/add-logo-img11.jpg";
								if(!empty($portfolio->location)){
									$city = Cities::model()->findByPk($portfolio->location);
									$location = !empty($city) ? $city->name . ", " . $city->countries->name : "";
								}
							}
							else if($portfolio->portfolio_type == 1){
								$pro_type   = "Off-Shelf Project";
								$pro_image  = Yii::app()->theme->baseUrl . "/style/images/off-Shelf.png";
							}
							else{
								$pro_type   =  "Open Source Project";
								$pro_image  =  Yii::app()->theme->baseUrl . "/style/images/open-source.png";
							}
							?>
							<?php if($portfolio->portfolio_type == 0 ){?>
								<div class="col-md-2 fs24 mr20">
									<img class="img-circle border_grey" width="70px" height="70px" alt="<?php echo $pro_type; ?>" src="<?php echo $pro_image;?>">
								</div>
							<?php }else if($portfolio->portfolio_type == 1){ ?>
								<div class="col-md-1 fs24 mr10">
									<span aria-hidden="true" class="icon-layers fs26 font_newregular display_block team-text-blue"></span>
								</div>
							<?php }else{ ?>
								<div class="col-md-1 fs24 mr10">
									<span aria-hidden="true" class="icon-drawer fs26 font_newregular display_block team-text-blue"></span>
								</div>
							<?php } ?>
							<div class="col-md-8 np <?php echo ($portfolio->portfolio_type == 0)?'mt15':'';?>">
								<span class="fs18 font_newregular display_block team-text-blue mt3"><?php echo $pro_type; ?></span>
								<span class="fs14 display_block">
									<?php if($portfolio->portfolio_type == 0 && !empty($location)){ ?>
										<img alt="dollar icon" width="10px" height="14px" src="<?php echo Yii::app()->theme->baseUrl;?>/images/location-icon.png">    
									<?php echo $location;
									}else{
									echo $portfolio->portfolio_status;}?>
								</span>
							</div>
						</div>
						<?php 
							if(!empty($portfolio->description))
							{
						?>
						<div class="col-md-12 bb">
							<p class="tsm-text fs14 text-left ww mb20 mt10">
							<?php 
								$linkMore = '<a href="javascript:void(0);" class="orange-new" onclick="showHideMore($(this),1);">(read more)</a>';
								$linkLess = '<a href="javascript:void(0);" class="orange-new" onclick="showHideMore($(this),0);">(less)</a>';
								if(strlen($portfolio->description)>300){
									echo substr($portfolio->description,0,300).'<span class="showHide">..... '.$linkMore."</span>";
									echo '<span class="showHide" style="display:none;">'.substr($portfolio->description,300,strlen($portfolio->description)).$linkLess."</span>"; 
								}
								else{ 
									echo $portfolio->description;
								}
							?>
							</p>
						</div>
						<?php }?>
						<?php
						if(!empty($portfolio->no_of_users) || !empty($portfolio->no_of_customers) || !empty($portfolio->deployment) || !empty($portfolio->launched_in)){
							if($portfolio->portfolio_type == 0){?>
							<div class="col-md-12 pt5 pb10 bb">
									<?php if(!empty($portfolio->project_size)){?>
									<div class="col-md-6 pa5">
										<img alt="dollar icon" src="<?php echo Yii::app()->theme->baseUrl;?>/images/dollar-icon.png">
										<span class="fs14 ml15">Project Size: <span class="blue-new"> $<?php echo number_format((int)$portfolio->project_size); ?></span></span>
									</div>
									<?php }
									if(isset($portfolio->start_date) && !empty($portfolio->start_date) && $portfolio->start_date != "1970-01-01"){?>
									<div class="col-md-6 pa5">
										<img alt="calendar icon" src="<?php echo Yii::app()->theme->baseUrl;?>/images/cal-icon.png">
										<span class="fs14 ml15">Start Date: <span class="blue-new"><?php echo (isset($portfolio->start_date))?date('d M, Y',strtotime($portfolio->start_date)):'Not Provided'; ?></span></span>
									</div>
									<?php }?>
									<?php if(!empty($portfolio->estimate_timeline)){ ?>
									<div class="col-md-6 pa5">
										<img alt="employee icon" src="<?php echo Yii::app()->theme->baseUrl;?>/images/duration-icon.png">
										<span class="fs14 ml15">Duration: <span class="blue-new"><?php echo $portfolio->estimate_timeline; ?></span></span>
									</div>
									<?php }
									if(!empty($portfolio->per_hour_rate)){ ?>
									<div class="col-md-6 pa5 hide">
										<img alt="dollar icon" src="<?php echo Yii::app()->theme->baseUrl;?>/images/dollar-icon.png">
										<span class="fs14 ml15">Per Hr. Rate: <span class="blue-new"> $<?php echo number_format((int)$portfolio->per_hour_rate); ?></span></span>
									</div>
									<?php } ?>
							</div>
						<?php }else{ ?>
							<div class="col-md-12 pt5 pb10 bb">
									<?php if(!empty($portfolio->no_of_users)){?>
									<div class="col-md-6 pa5">
										<img alt="employee icon" src="<?php echo Yii::app()->theme->baseUrl;?>/images/icon2.png">
										<span class="fs14 ml15">No. of users: <span class="blue-new"><?php echo $portfolio->no_of_users; ?></span></span>
									</div>
									<?php }
									
									if(!empty($portfolio->no_of_customers)){?>
									<div class="col-md-6 pa5">
										<img alt="calendar icon" src="<?php echo Yii::app()->theme->baseUrl;?>/images/icon2.png">
										<span class="fs14 ml15">No. of Customers: <span class="blue-new"><?php echo $portfolio->no_of_customers; ?></span></span>
									</div>
									<?php }?>
								
									<?php if(!empty($portfolio->deployment)){?>
									<div class="col-md-6 pa5">
										<img alt="dollar icon" src="<?php echo Yii::app()->theme->baseUrl;?>/images/deployment.png">
										<span class="fs14 ml15">Deployment: <span class="blue-new"> <?php echo $portfolio->deployment; ?></span></span>
									</div>
									<?php }
									
									if(!empty($portfolio->launched_in)){?>
									<div class="col-md-6 pa5 hide">
										<img alt="dollar icon" src="<?php echo Yii::app()->theme->baseUrl;?>/images/cal-icon.png">
										<span class="fs14 ml15">Launched in: <span class="blue-new"> <?php echo $portfolio->launched_in; ?></span></span>
									</div>
									<?php }?>
								
							</div>
						<?php }
						}
						?>
						<?php if(!empty($portfolio->suppliersHasPortfolioHasSkills) || !empty($portfolio->suppliersHasPortfolioHasServices) || !empty($portfolio->suppliersPortfolioHasIndustries)){?>
						<div class="col-md-12 mt30 pl20 pr20 mb20">
							<span class="btn-sm active mr5 mb5 hide" data-id="pop_skills" onclick="handelSkillsHideShow($(this))">All</span>
							<?php 
							if(!empty($portfolio->suppliersHasPortfolioHasSkills)){?>
							<span class="btn-sm active mr5 mb5" id="pop_skills_skills" data-id="pop_skills_switch" onclick="handelSkillsHideShow($(this))">Skills</span>
							<?php }
							if(!empty($portfolio->suppliersHasPortfolioHasServices)){?>
							<span class="btn-sm active mr5 mb5" id="pop_skills_services" data-id="pop_services_switch" onclick="handelSkillsHideShow($(this))">Category</span>
							<?php }
							if(!empty($portfolio->suppliersPortfolioHasIndustries)){?>
							<span class="btn-sm active mr5 mb5" id="pop_skills_industry" data-id="pop_industry_switch" onclick="handelSkillsHideShow($(this))">Domain</span>
							<?php }?>
						</div>
						<?php } ?>
						<div class="col-md-12 pl20 pr20 mb20">
							<?php foreach($portfolio->suppliersHasPortfolioHasSkills as $skill) { ?>
								<span class="btn-sm mr5 mb5" data-display="pop_skills_switch"><?php echo $skill->skills->name; ?></span>
							<?php } ?>
							<?php foreach($portfolio->suppliersHasPortfolioHasServices as $service) { ?>
								<span class="btn-sm mr5 mb5" data-display="pop_services_switch"><?php echo $service->services->name; ?></span>
							<?php } ?>
							<?php foreach($portfolio->suppliersPortfolioHasIndustries as $industry) { ?>
								<span class="btn-sm mr5 mb5" data-display="pop_industry_switch"><?php echo $industry->industries->name; ?></span>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php $ReviewCategory = ReviewCategory::model()->findAll(); ?>
				<div class="col-md-12 np">
					<?php if(!empty($portfolio->suppliersHasReferences)){ ?>
					<div class="col-md-12 mt20 bb">
						<div class="col-md-12">
							<h3 class="mt0 display_inline mr5 font_newregular fs14 blue-new">
								Testimonials
							</h3>
						</div>
					</div>
					<?php } ?>
					<div class="col-md-8 np">
					<?php
						$default_logo 	= 	Yii::app()->theme->baseUrl."/style/images/avatar.png";
						if(!empty($portfolio->suppliersHasReferences))
						{
							foreach($portfolio->suppliersHasReferences as $supRef)
							{
								if($supRef->status > 0)
								{
					?>
						<div class="col-md-12 np pt20">				
							<div class="col-md-3 pa10 text-center pl0">
								<?php
								if($supRef->is_unattributed==1){
									$imageurl = $default_logo;
								}else{
									if($supRef->review_type == 1)
										$imageurl=(empty($supRef->suppliers->users->image)?$default_logo:$supRef->suppliers->users->image);
									else
										$imageurl=(empty($supRef->clientProfiles->users->image)?$default_logo:$supRef->clientProfiles->users->image);
								} 
								?>								
									<img class="img-circle" src="<?php echo $imageurl; ?>" alt="Team Member" width="70px" height="70px" />
									<h5 class="fs12 display_block font_newregular mb5 team-text-blue"><?php echo $supRef->clientProfiles->users->first_name; ?></h5>
									<h6 class="fs10 display_block nm text-color-navy mt5"><?php echo (!empty($supRef->clientProfiles->users->role)) ? $supRef->clientProfiles->users->role . ", " : ""; echo (!empty($supRef->clientProfiles->users->company_name)) ? $supRef->clientProfiles->users->company_name  : ""; ?></h6>
									<?php 
									if($supRef->review_type==1) {
										echo '<label class="label-sm mt5 mb5"><span class=" label-teal pt0 pb0 font_light">Self Reported</span></label>';
									}
									else{
										if($supRef->status == 1) echo "<label class='label-sm mt5 mb5'>Not Verified</label>";
										if($supRef->status == 2) echo "<label class='label-sm mt5 mb5'>Verified</label>"; 
									}
									?>
								
							</div>
							<div class="col-md-9 pa10">
								<?php foreach($supRef->suppliersReferencesQuestions as $question){
									if(!empty($question->answers)){
								?>
								<div class="col-md-12 mt10 np">
									<h3 class="mt0 display_inline mr5 fs18 blue-new font_newregular text-left"><?php echo $question->reviewQuestions->title;?></h3>
									<p class="tsm-text fs14 mb15 text-left">
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
					<div class="col-md-4">
						<?php
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
						<?php if($avgRating > 0){?>
						<div class="col-md-12 mt20 pa10 text-center mb20">
							<div class="rating-testimonial-small">
								<h2 class="fs24 mt5 nm font_newregular"><?php echo $avgRating;?></h2>
								<span class="fs12">Rating</span>
							</div>
							<h3 class="font_newregular mb5 team-text-blue fs14">Overall Summary</h3>
						</div>
						<div class="col-md-11 col-md-offset-1 mb15 np">
							<?php foreach($ReviewCategory as $cate){ ?>
							<div class="col-sm-12 np mt10 mb10">
								<div class="col-sm-12 blue-new np font_newregular fs14"><?php echo $cate->name; ?>:</div>
								<div class="col-sm-9 np">
									<div class="progress progress-bar-sm nm mt5">
										<div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="<?php echo ($catRating[$cate->id]*20); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($catRating[$cate->id]*20); ?>%;">
											<span class="sr-only"><?php echo (!isset($catRating[$cate->id])) ? "0" : number_format($catRating[$cate->id], 1); ?></span>
										</div>
									</div>
								</div>
								<div class="col-md-3 np text-center font_newregular fs14 blue-new"><?php echo (!isset($catRating[$cate->id])) ? "0" : number_format($catRating[$cate->id], 1); ?></div>
							</div>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal End-->
<?php 	$counter++;}
	}
}?>
<?php }?>