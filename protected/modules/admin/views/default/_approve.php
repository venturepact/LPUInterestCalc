<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/css/selectize.css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/js/selectize.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/colorPick/js/colpick.js"></script>


<div id="approve-popup">

    <?php
    if(isset($_REQUEST['type']) && $_REQUEST['type']=="approved") $action = "/admin/default/approveIntermediaryProject";
    else $action = "/admin/default/approveProject";
    ?>

    <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'approve-form',
      'action'=>Yii::app()->createUrl($action, array('id'=>$project->id)),
    )); ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Approve Project</h4>
    </div>
    <div class="modal-body">
        <div class="box-body">
          <div class="tabbable header-tabs">

            <ul class="nav nav-tabs">
             <li class="active"><a href="#approve_tab1" data-toggle="tab"><span class="hidden-inline-mobile">Project Details</span></a></li>
             <li><a href="#approve_tab2" data-toggle="tab"><span class="hidden-inline-mobile">Client Details</span></a></li>
             <li><a href="#approve_tab3" data-toggle="tab"><span class="hidden-inline-mobile">Supplier Selection</span></a></li>
             <li><a href="#approve_tab4" data-toggle="tab"><span class="hidden-inline-mobile">Tags</span></a></li>
            </ul>

            <div class="tab-content">

              <div class="tab-pane active" id="approve_tab1">
                <h4>Project Details provided by the Client</h4>
                <div class="tab-form">
                  <div class="form-group">
                    <label for="projectName">Project Name<?php echo $project->id; ?></label>
                    <?php echo CHtml::textField('Project[name]', $project->name, array(
                      'class'=>'form-control',
                      'id'=>'projectName',
                      'placeholder'=>'Enter project name',
                    )); ?>
                  </div>

                  <div class="form-group">
                    <label>Skills</label>
                    <p>
                      <?php
                      $project_skills = $project->clientProjectsHasSkills;
                      $selectedSkills = array();
                      foreach($project_skills as $project_skill) {
                        $selectedSkills[] = $project_skill->skills_id;
                      }
                      $skills = Skills::model()->findAll();
                      //foreach ($project_skills as $project_skill) {
                        ?>
                        <select id="satnam-start" class="form-control required" placeholder="Yii, Rails, Oracle SQL" multiple name="Skills[]" data-parsley-id='226'>
                          <?php foreach($skills as $skill){
                            //if($skill->skillcol !=0){?>
                          <option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selectedSkills))?'selected="selected"':'';?> >
                            <?php echo $skill->name;?>
                          </option>
                          <?php } ?>
                        </select>
                        <div><ul class="parsley-errors-list" id="parsley-id-226"></ul></div>
                        <!-- <span class="label label-primary fn12"><?php //echo $project_skill->skills->name; ?></span> -->
                        <?php
                      //}
                      ?>
                    </p>
                  </div>

                  <div class="form-group">
                    <label>Industry Name</label>
                    <p>
                      <?php
                      $client_industries = $project->clientProjectsHasIndustries;
                      $selectedIndustries = array();
                      foreach($client_industries as $client_industry) {
                        $selectedIndustries[] = $client_industry->industries_id;
                      }
                      $industries = Industries::model()->findAll();
                      //foreach ($client_industries as $client_industry) {
                        ?>
                        <select id="satnam-industry" class="form-control required" placeholder="Web app, iOS app, ERP" multiple name="Industries[]" data-parsley-id='426'>
                          <option default>Select a Industry</option>
                          <?php foreach($industries as $industry){?>
                           <option value=" <?php echo $industry->id;?>" <?php echo (in_array($industry->id,$selectedIndustries))?'selected="selected"':'';?>  ><?php echo $industry->name;?> </option>
                          <?php } ?>
                        </select>
                        <div><ul class="parsley-errors-list" id="parsley-id-426"></ul>
                        </div>
                        <!-- <span class="label label-primary fn12"><?php //echo $client_industry->industries->name; ?></span> -->
                        <?php
                      //}
                      ?>
                    </p>
                  </div>

                  <div class="form-group">
                    <label>Services</label>
                    <p>
                      <?php
                      $project_services = $project->clientProjectsHasServices;
                      $selectedServices = array();
                      foreach($project_services as $project_service) {
                        $selectedServices[] = $project_service->services_id;
                      }
                      $services = Services::model()->findAll();
                      //foreach ($project_services as $project_service) {
                        ?>
                        <select id="satnam-services" class="form-control required" placeholder="Web app, iOS app, ERP" multiple name="Services[]" data-parsley-id='126'>
                          <option default>Select a Service</option>
                          <?php foreach($services as $service){?>
                          <option value=" <?php echo $service->id;?>" <?php echo (in_array($service->id,$selectedServices))?'selected="selected"':'';?> ><?php echo $service->name;?> </option>
                          <?php } ?>
                          </select>
                          <div><ul class="parsley-errors-list" id="parsley-id-126"></ul></div>
                        <?php
                      //}
                      ?>
                    </p>
                  </div>

                  <div class="form-group">
                    <label for="projectStage">Project Stage</label>
                    <?php 
                      $currentStatus = CurrentStatus::model()->findAll("status=1  order by id");
                      $lit = CHtml::listData($currentStatus,'id','name');
                      echo CHtml::radioButtonList('Project[current_status_id]',$project->current_status_id,$lit,array('separator'=>'','template'=>'<div class="display_block">{input} {label}</div>'));
                    ?>
                  </div>

                  <div class="form-group">
                    <label for="projectExpectedStart">Expected Start Prefernce</label>
                    <?php
                      echo CHtml::radioButtonList('Project[project_start_preference]',$project->project_start_preference,array('1'=>'immediately','2'=>'in next 1-2 weeks','3'=>'in next 2-4 weeks','4'=>'in next few months'),array('separator'=>'','template'=>'<div class="display_block">{input} {label}</div>'));
                    ?>   
                  </div>

                  <div class="form-group">
                    <label for="projectSummary">Project Summary</label>
                    <?php echo CHtml::textArea('Project[description]', $project->description, array(
                      'class'=>'form-control',
                      'id'=>'projectSummary',
                      'placeholder'=>'Enter project summary',
                    )); ?>
                  </div>

                  <div class="form-group">
                   <label>Uploaded Files</label>
                    <p>
                      <?php
                        $files = $project->clientProjectDocuments;
                        if(!empty($files)) {
                          foreach ($files as $file) {
                      ?>
                        <div class="row">
                          <div class="col-md-12">                       
                              <?php
                                echo CHtml::link((!empty($file->name)) ? $file->name: "Not Provided.", $file->path, array(
                                  'target'=>'_blank',
                                  'class'=>'label label-primary fn12',
                                )) . " ";
                              ?>

                              <div class="pull-right ref-file-show">
                                  <a href="javascript:void(0);"  data-id="<?php echo $file->id ?>" onClick="deleteDocs($(this))" title="Delete"><span aria-hidden="true" class="icon-trash orange-new mr5">Delete</span></a>
                              </div>   
                          </div>
                        </div> 
                          <?php } 
                                }
                            else 
                              {
                          ?>
                            <span>Not Provided</span>
                          <?php }
                          ?>
                        <span id="ClientProjectsDelete"></span>

                    </p>                 
                  </div>  


                  <div class="form-group"> 
                      <div class="row">
                        <div class="col-md-12">                 
                          <a href="#"  id="UploadDocs" class="cp-input-a form-control'"><span class="icon-paper-clip orange-new" aria-hidden="true"></span>Click To Upload </a>    
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="col-sm-12 col-xs-12 mt10">
                          </div>
                       </div>
                      </div>
                  </div>


                  <div class="form-group">
                    <label>Preferred Rate</label>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="projectMinBudget">Min Budget</label>
                        <?php echo CHtml::textField('Project[min_budget]', $project->min_budget, array(
                          'class'=>'form-control',
                          'id'=>'projectMinBudget',
                          'placeholder'=>'Min budget',
                        )); ?>
                      </div>
                      <div class="col-md-6">
                        <label for="projectMaxBudget">Max Budget</label>
                        <?php echo CHtml::textField('Project[max_budget]', $project->max_budget, array(
                          'class'=>'form-control',
                          'id'=>'projectMaxBudget',
                          'placeholder'=>'Max budget',
                        )); ?>
                      </div>
                    </div>
                    <!-- <p>Region :
                      <?php
                        // if(!empty($project->regions)) {
                        //   $regions = explode(",", $project->regions);
                        //   foreach ($regions as $region) {
                        //     $reg = Regions::model()->findByPk($region);
                        //     ?>
                        //     <span class="label label-primary fn12"><?php //echo $reg->name; ?></span>
                        //     <?php
                        //   }
                        // } else {
                        //   echo "Not Provided.";
                        // }
                      ?>
                    </p> -->
                  </div>

                </div>
             </div>

             <div class="tab-pane" id="approve_tab2">
              <h4>Client's Company Details</h4>
              <div class="tab-form">
                <div class="form-group">
                  <label for="companyName">Company Name</label>
                  <?php echo CHtml::textField('Client[company_name]', $project->clientProfiles->users->company_name, array(
                    'class'=>'form-control',
                    'id'=>'companyName',
                    'placeholder'=>'Enter company name',
                    //'required'=>'required',
                  )); ?>
                </div>
                <div class="form-group">
                  <label for="lead_owner">Client Account Manager</label>
                  <?php
                    $adminUsers = Users::model()->findAllByAttributes(array('role_id'=>'1'));
                    $ulist = CHtml::listData($adminUsers,'id','first_name');
                    echo CHtml::dropDownList('Client[manager_id]', $project->clientProfiles->manager_id, $ulist, array(
                      'class'=>'form-control',
                      'id'=>'lead_owner',
                    ));
                  ?>
                </div>
                <div class="form-group">
                  <label for="teamSize">Team Size</label>
                  <?php $options = array ('0' => 'Company Size','1-5' => '1-5', '5-50' => '5-50', '50-200'=>'50-200','200-1000'=>'200-1000','1000+'=>'1000+'); ?>
				<?php echo CHtml::dropDownList('Project[team_size]',$project->clientProfiles->team_size,$options,array('class'=>'form-control','id'=>'teamSize','placeholder'=>'Enter team size',));?>
                </div>
                <!-- <div class="form-group">
                  <label for="clientLocation">Location</label>
                  <?php
                    // echo CHtml::textField('Client[location]', (!empty($project->clientProfiles->address1)) ? $project->clientProfiles->address1 : 'Not Provided.', array(
                    //   'class'=>'form-control',
                    //   'id'=>'clientLocation',
                    //   'placeholder'=>'Enter location',
                    // ));
                  ?>
                </div> -->
                <div class="form-group">
                  <label for="companyLink">Company Link</label>
                  <?php echo CHtml::textField('Client[company_link]', $project->clientProfiles->company_link, array(
                    'class'=>'form-control',
                    'id'=>'companyLink',
                    'placeholder'=>'Enter company link',
                  )); ?>
                </div>
              </div>
             </div>
             <div class="tab-pane" id="approve_tab3">
              <div class="tab-form">
                <div class="row">
                  <div class="col-md-12">
                    <h4>Provide following details before approving project</h4>
                  </div>
                  <div class="col-md-12">
                    <p>
                      <label for="lead_score">Lead Score</label>
                      <?php
                        echo CHtml::textField('ClientProject[lead_score]', $project->lead_score, array(
                          'class'=>'form-control',
                          'id'=>'lead_score',
                          'placeholder'=>'Lead Score',
                        ));
                      ?>
                    </p>
                    <p>
                      <label for="admin_comments">Admin Comments</label>
                      <?php
                        echo CHtml::textArea('ClientProject[admin_comments]', $project->admin_comments, array(
                          'class'=>'form-control',
                          'id'=>'admin_comments',
                          'placeholder'=>'Admin Comments',
                        ));
                      ?>
                    </p>
                  </div>
                </div>
                <hr/>
                <h4>Approve the suppliers selected by the client</h4>
                <?php
                  $supplier_projects = $project->suppliersProjects;
                  if(!empty($supplier_projects)) {
                    foreach ($supplier_projects as $sProject) {
                      $supplier = $sProject->suppliers;
                      ?>
                        <div class="row mtb30">
                          <div class="col-md-8">
                            <div class="row">
                              <div class="col-md-4">
                              <img class="img-responsive img-circle" width="80px" height="80px" src="<?php echo (!isset($supplier->image) || empty($supplier->image) || is_null($supplier->image)) ? Yii::app()->theme->baseUrl . '/adminPanel/img/user.png' : $supplier->image . "/convert?w=80&h=80&fit=crop"; ?>" alt="Supplier's Image">
                              </div>
                              <div class="col-md-8 suppDataBox">
                                <p><strong><?php echo (!empty($supplier->users->company_name))? ucwords($supplier->users->company_name): "Not Provided."; ?></strong></p>
                                <p>
                                  <?php
                                    $supp_folios = $supplier->suppliersHasPortfolios;
                                    $folios_skills = array();
                                    foreach($supp_folios as $folio) {
                                      $folios_skills[] = $folio->suppliersHasPortfolioHasSkills;
                                    }
                                    $supp_skills = array();
                                    foreach ($folios_skills as $folio_skills) {
                                      foreach ($folio_skills as $skill) {
                                        if(!in_array($skill->skills->name, $supp_skills))
                                          $supp_skills[] = $skill->skills->name;
                                      }
                                    }
                                    if(!empty($supp_skills)) {
                                      foreach ($supp_skills as $supp_skill) {
                                        ?>
                                        <span class="label label-primary fn12 mtb2"><?php echo $supp_skill; ?></span>&nbsp;
                                        <?php
                                      }
                                    } else {
                                      echo "Not Provided.";
                                    }
                                  ?>
                                </p>
                                <!-- <p> -->
                                  <?php
                                    // $regions = $supplier->suppliersHasCities;
                                    // $value = "";
                                    // foreach ($regions as $region) {
                                    //   if($region->is_main == 1) {
                                    //     $value = $region->cities->name . ", ";
                                    //     $countries = $region->cities->countries;
                                    //     if(count($countries) == 1)
                                    //       $value .= $countries->name;
                                    //     else {
                                    //       foreach($countries as $country) {
                                    //         $value .= $country->name; break;
                                    //       }
                                    //     }
                                    //   }
                                    // }
                                    // echo (!empty($value))? ucwords($value): "Not Provided.";
                                  ?>
                                <!-- </p> -->
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <!-- Suppliers list that need to be send to the server -->
                            <!-- Slide THREE -->
                            <div class="slideThree">
                            <?php
                            echo CHtml::checkbox("Suppliers[selected][$supplier->id]", ($sProject->status >= 1 && $sProject->is_new_intro == 0) ? true : false, array(
                                            'value'=>'1',
                                            'id'=>"supplier".$supplier->id,
                                          ));
                            echo CHtml::label("", "supplier".$supplier->id);
                            ?>
                            </div>
                          </div>
                        </div>
                        <hr/>
                      <?php
                    }
                  } else {
                    ?>
                    <div class="" style="text-align:center; margin-top:40px; margin-bottom:30px;">
                    <p>No suppliers selected yet</p>
                    <a href="<?php echo Yii::app()->createUrl("admin/clientProjects/searchSuppliers",array("pid"=>$project->id)); ?>" class="btn btn-link">Search Suppliers</a><br/>
                    </div>
                    <?php
                  }
                ?>
              </div>
             </div>

              <div class="tab-pane active appendable" id="approve_tab4">
                <h4>Assign Tags to Leads</h4>
                 <?php
                    $selectedTags=array();
                    foreach ($project->clientProjectsHasTags as $tag) {
                      if(!$tag->is_deleted)
                        $selectedTags[]=$tag->tag_id;
                    }
                    $tags=Tags::model()->findAllByAttributes(array('status'=>1));
                ?>
                <div class="tab-form append">
                <?php foreach($tags as $tag){?>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="projectExpectedStart">Tag-Name</label>
                        <input type="hidden" value="<?php echo $tag->id; ?>" name="tag[<?php echo $tag->id; ?>][id]"/>
                        <input type="text" class="form-control" value="<?php echo $tag->tag_text; ?> " name="tag[<?php echo $tag->id; ?>][text]"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="picker">Color</label>
                        <input name="tag[<?php echo $tag->id; ?>][color]" type="text" class="picker form-control" style="border-color:<?php echo $tag->tag_color;?>" value="<?php echo substr($tag->tag_color,1);?>"></input>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <!-- Suppliers list that need to be send to the server -->
                      <!-- Slide THREE -->
                      <div class="m2 slideThree">
                      <?php
                      echo CHtml::checkbox("tag[$tag->id][active]", in_array($tag->id,$selectedTags) ? true : false, array(
                                      'value'=>'1',
                                      'id'=>"tag".$tag->id,
                                    ));
                      echo CHtml::label("", "tag".$tag->id);
                      ?>
                      </div>
                    </div>
                    <div class="col-md-2 hide">
                      <div class="form-group m1">
                        <i class="fa fa-trash-o deleteTag" title="Delete <?php echo trim($tag->tag_text);?> Tag"data-id="<?php echo $tag->id;?>"></i>
                      </div>
                    </div>
                  </div>
              <?php } ?>
              </div>
              <?php echo CHtml::button("+ Add Tag", array(
                'class'=>'btn btn-primary pull-right mtb30',
                'id'=>'addTag'
              ));
              ?>
             </div>

            </div>
           </div>
        </div>
    </div>
    <div class="modal-footer">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible" id="approve-error" role="alert" style="display:none;text-align:left;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="msg"></span>
          </div>
        </div>
      </div>
      
      <button type="button" class="btn btn-primary pull-left" id="updateDetails" >Update Details</button>

      <?php
      if(!empty($supplier_projects)) {
        echo CHtml::submitButton("Approve Project", array(
                'class'=>'btn btn-primary pull-right',
                'id'=>'approveBut'
              ));
      } else {
        echo CHtml::submitButton("Approve Project", array(
                'class'=>'btn btn-primary pull-right',
                'disabled'=>'disabled',
              )); 
      }
      ?>

      <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
        
    </div>
    <?php $this->endWidget(); ?>
</div>
<style type="text/css">
  .picker {
    margin:0;
    padding:0;
    border:1;
    width:175px;
    height:32px;
    border-right:40px solid green;
    border-left: 40px solid green;
    text-align: center;
    line-height:20px;
  }
  #addTag{
    margin-right: 10px; 
  }
  .m1{
     margin:55px 0px 0px 30px !important;
  }
  .m2{
     margin:50px 0px 0px 20px;
  }
  .m1:hover{
    color: red;
    cursor: pointer;
  }
</style>
<script type="text/javascript">
$(document).ready(function(){

$('.picker').colpick({
  layout:'hex',
  submit:0,
  colorScheme:'dark',
  onChange:function(hsb,hex,rgb,el,bySetColor) {
    $(el).css('border-color','#'+hex);
    // Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
    if(!bySetColor) $(el).val(hex);
  }
}).keyup(function(){
  $(this).colpickSetColor(this.value);
});

//Upload the files from admin side
$('#UploadDocs').click(function(){
   filepicker.setKey("ANQWcFDQRUiGfBqjfgINQz");
    filepicker.pickMultiple({mimetypes: ['image/*', 'text/*', 'application/pdf','application/msword','application/vnd.ms-excel','application/vnd.ms-powerpoint'],},
    function(InkBlob){
            $.ajax({
                type:'POST',
                url:"<?php echo Yii::app()->createUrl('admin/default/upLoadClientDocs');?>",
                data : {id:"<?php echo $project->id ?>",data:JSON.stringify(InkBlob)},

                success:function(data){
                  if($('#ClientProjectsDelete').prev('span').text()=="Not Provided")
                    {
                      $('#ClientProjectsDelete').prev('span').text("");
                    }   
                      $('#ClientProjectsDelete').append(data);                  
                  }
            });
    },
    function(FPError){
      console.log(FPError.toString());
    }
    );

  });

$('#approve-popup').on('click','.deleteTag',function(e){
  var id        = $(this).attr('data-id');
  var container = $(this).parent().parent().parent();
  $.ajax({
    type:'POST',
    url:"<?php echo Yii::app()->createUrl('admin/default/deleteTag'); ?>",
    data:{id:id},
    success:function(data){
        if(data="success"){
          container.remove();
        }
        else{
          alert('Error Deleting Tag.');
        }
    }
  });
});


  $("#satnam-start").selectize({
    delimiter: ",",
    persist: false,
    openOnFocus: false,
    closeAfterSelect: true,
    maxOptions:5,
    plugins: ['remove_button'],
    create: function (input) {
      $.ajax({
        type:'POST',
        url:"<?php echo CController::createUrl("/client/createSkill");?>",
        data : 'name='+input,
        success: function(id){    }
      });
      return {
        value: input,
        text: input
      }
    }
  });

  $(".colorChoice").change(function(){
    alert($(this).val());
  });

  $("#satnam-services").selectize({
        delimiter: ",",
        persist: false,
        openOnFocus: false,
        closeAfterSelect: true,
        maxOptions:5,
        plugins: ['remove_button']
    });
  $("#satnam-industry").selectize({delimiter: ",",
        persist: false,
        openOnFocus: false,
        closeAfterSelect: true,
        maxOptions:5,
        plugins: ['remove_button']});

  $('#updateDetails').click(function(e) {
    var data = $("#approve-form").serialize();
    $.ajax({
      type: "POST",
      data: data,
      url: "<?php echo Yii::app()->createUrl('/admin/default/saveApproveProjectDetails', array('pid'=>$project->id)); ?>",
      //dataType: 'json',
      beforeSend: function() {
        $('#updateDetails').prop("disabled", true);
      },
      success: function(response) {
        var data = JSON.parse(response);
        console.log(data);
        $('#updateDetails').prop("disabled", false);
         $('#approve-error').hide();
         if(data.iserror) {
           if(data.msg.tags.length != 0) {
              $('#approve-error').removeClass('alert-success').addClass('alert-danger');
              $('#approve-error').find('.msg').html("<strong>Error!</strong> "+ data.msg.tags);
              $('#approve-error').show();
              $('#approveBut').prop('disabled', true);
            }
          } 
          else {
            $('#approve-error').removeClass('alert-danger').addClass('alert-success');
            $('#approve-error').find('.msg').html("<strong>Success!</strong> Data Saved Successfully.");
            $('#approveBut').prop('disabled', false);
            $('#approve-error').show();
          }
        // $('#approve-error').hide();
        // if(data.iserror) {
        //   console.log(data.msg);
        //   if(data.msg.company.length != 0) {
        //     $('#approve-error').find('.msg').html("<strong>Error!</strong> The client's company name is already taken. Update Details First.");
        //     $('#approve-error').show();
        //     $('#approveBut').prop('disabled', true);
        //   }
        // } else {
        //   $('#approveBut').prop('disabled', false);
        //   $('#approve-error').hide();
        // }
      },
      error: function() {
        console.log("Error ayi hai");
        $('#updateDetails').prop("disabled", false);
      },
    });
  });

  $('#approve-form').submit(function(e) {
    $('#approveBut').prop('disabled', true);

    if($('#companyName').val() == '') {
      $('#approve-error').find('.msg').html("<strong>Required!</strong> The client's company name is required. Update Details First.");
      $('#approve-error').show();
      e.preventDefault();
    }

  });
});




//handle deletion of attachments 
function deleteDocs(element){
   element.parent().find('a').html('Deleting ...');   

    $.ajax({
        type:'POST',
        url:"<?php echo Yii::app()->createUrl('admin/default/upLoadClientDocs');?>",       
        data : {id: element.attr('data-id'),action:"delete"},
        success:function(data){
            if(data==1){
              
              element.parent().parent().hide();
            }
        },
        error:function(){

        }
    });
}

var count=0;
$('#addTag').click(function(e){
  $('.append').append('<div class="row"><div class="col-md-4"><div class="form-group"><label for="projectExpectedStart">Tag-Name</label><input type="text" class="form-control" value="" name="tagNew['+count+'][text]"/></div></div><div class="col-md-4"><div class="form-group"><label for="picker">Color</label><input name="tagNew['+count+'][color]" type="text" class="picker form-control" value=""></input> </div></div><div class="col-md-2"><div class="m2 slideThree"><input type="checkbox" value="1" name="tagNew['+count+'][active]" id="tagNew'+count+'"/><label for="tagNew'+count+'"></label></div></div></div>');
  $('.picker').colpick({
  layout:'hex',
  submit:0,
  colorScheme:'dark',
  onChange:function(hsb,hex,rgb,el,bySetColor) {
    $(el).css('border-color','#'+hex);
    // Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
    if(!bySetColor) $(el).val(hex);
  }
}).keyup(function(){
  $(this).colpickSetColor(this.value);
});
  count++;
});
</script>