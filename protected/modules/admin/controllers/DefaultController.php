<?php

class DefaultController extends Controller
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
	
	 /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
     public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform actions
                'actions'=>array('index','view','create','update','admin','delete', 'messages','invitesManage', 'getWidgetNotification', 'projectMessages', 'projectMessagesTable', 'managerProjectMessagesTable', 'projectAbandon', 'deleteProjects', 'projectDelete', 'deleteProjectData', 'getApproveView', 'approveProject', 'intermediary', 'messages', 'saveApproveProjectDetails', 'approveIntermediaryProject','projectQuestions', 'notifications','innovationNotifications' ,'ajaxNotifications', 'markSeenNotification','upLoadClientDocs','updateCity','deleteTag','updateCountry','enterpriseApproved'),
                'expression'=>'Yii::app()->user->role=="admin"',
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


    protected function assignLinks($data,$row){
        $url="/admin/users/view";
        return CHtml::link($data->username,Yii::app()->createUrl($url,array('id'=>$data->id)));
    }
	
    public function actionLogSave($for,$title,$description,$notification,$proposalId=null,$projectStatus=0,$is_checked=0) {
        if(!empty($proposalId))
            Log::model()->updateAll(array('is_active'=>0),'proposal_id="'.$proposalId.'"');
        $log                =   new Log;
        $log->login_id      =   Yii::app()->user->id;
        $log->title         =   $title;
        $log->for_user      =   $for;
        $log->description   =   $description;
        $log->notification  =   $notification;
        $log->is_read       =   0;
        $log->add_date      =   date('Y-m-d H:i:s');
        $log->status        =   1;
        $log->project_status=   $projectStatus;
        $log->proposal_id   =   $proposalId;
        $log->is_checked    =   $is_checked;
        $log->is_active     =   1;
        $log->save();
    }
    


    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    


	public function actionUpdateCity()
	{
		if(isset($_POST) && !empty($_POST))
		{
			if(isset($_POST['cityUniId']) && !empty($_POST['cityUniId']))
			{
				$CityInfoarray			=	explode(',',$_POST["city"]);
				$GeoLocations			=	explode(',',$_POST["GLong"]);
				$country_name			=	trim($CityInfoarray[sizeof($CityInfoarray)-1]);
				$city_name				=	$CityInfoarray[0];
				$old_country			=	Countries::model()->findByAttributes(array('name'=>$country_name));
				$old_city				=	Cities::model()->findByAttributes(array('name'=>$city_name,'countries_id'=>$old_country->id));
				if(empty($old_city))
				{
					$new_city					=	new Cities;
					$new_city->name				=	$CityInfoarray[0];
					$new_city->code				=	$_POST["cityUniId"];
					$new_city->description		=	$_POST["city"];
					$new_city->others			=	$_POST["cityUniId"];
					$new_city->geo_lat			=	$GeoLocations[0];
					$new_city->geo_lng			=	$GeoLocations[1];
					$new_city->status			=	1;
					if(!empty($old_country))
					{
						$new_city->countries_id	=	$old_country->id;
					}
					else
					{
						$new_country				=  	new Countries; 
						$new_country->name 			= 	$country_name;
						$new_country->status 		=	1;
						$new_country->code 			=	$_POST["S-Code"];
						$new_country->code2 		=	$_POST["S-Code"];
						$new_country->regions_id	= 	12;
						$new_country->price_zone_id	=	4;
						$new_country->save();
						$new_city->countries_id		=	$new_country->id;
					}
					$new_city->save();
				}
				else
				{
					$old_city->others		=	$_POST["cityUniId"];
					$old_city->description	=	$_POST["city"];
					$old_city->save();
				}
			}
		}
		$this->render('updateCity');
	}
	
	public function actionUpdateCountry()
	{
		if(isset($_POST) && !empty($_POST))
		{
			if(isset($_POST['cityUniId']) && !empty($_POST['cityUniId']))
			{
				$name			=	trim($_POST['cityOldId']);
				$GeoLocations	=	explode(',',$_POST["GLong"]);
				$old_country	=	Countries::model()->findByAttributes(array('name'=>$name));
				if(!empty($old_country))
				{
					$old_country->place_id	=	$_POST['cityUniId'];
					$old_country->save();
				}
				else
				{
					$new_country				=  	new Countries; 
					$new_country->name 			= 	$name;
					$new_country->status 		=	1;
					$new_country->code 			=	$_POST["S-Code"];
					$new_country->code2 		=	$_POST["S-Code"];
					$new_country->place_id		=	$_POST['cityUniId'];
					$new_country->regions_id	= 	12;
					$new_country->price_zone_id	=	4;
					$new_country->save();
				}
			}
		}
		$this->render('updateCountry');
	}
    
    public function actionIndex() {
        $this->redirect(array("/admin/calculatorUsers/admin"));
    }

    
    public function actionIntermediary() {
        $model=new ClientProjects('intermediarySearch');
        $model->unsetAttributes();
        
        if( Yii::app()->request->isAjaxRequest && Yii::app()->user->getState('searchAttrsIntermediary')){
            foreach( explode(',',Yii::app()->user->getState('searchAttrsIntermediary') ) as $val){
                $keyValue=explode('=',$val);
                $model->$keyValue[0]=$keyValue[1];
            }
        } else {
            Yii::app()->user->setState('searchAttrsIntermediary', null);
        }

        if(isset($_GET['ClientProjects'])){
            $anArray = array();
            foreach($_GET['ClientProjects'] as $key=>$value){
                if(strpos($value,"[")==false){
                    $model->$key=$value;
                    $anArray[]=$key.'='.$value;
                }
            }
            Yii::app()->user->setState('searchAttrsIntermediary',implode(',',$anArray));
            unset($_GET['ClientProjects']);
        }

        $this->render('intermediary', array(
            'model'=>$model,
        ));
    }

    public function actionInvitesManage() {
        $model=new Users('invitesSearch');
        $model->unsetAttributes();
        
        if( Yii::app()->request->isAjaxRequest && Yii::app()->user->getState('searchAttrsInvites') ){
            foreach( explode(',',Yii::app()->user->getState('searchAttrsInvites') ) as $val){
                $keyValue=explode('=',$val);
                $model->$keyValue[0]=$keyValue[1];
            }
        }

        if(isset($_GET['Users'])){

            $anArray = array();
            foreach($_GET['Users'] as $key=>$value){
                if(strpos($value,"[")==false){
                    $model->$key=$value;
                    $anArray[]=$key.'='.$value;
                }
            }
            Yii::app()->user->setState('searchAttrsInvites',implode(',',$anArray));
            unset($_GET['Users']);
        }

        
        $this->render('invitesManage', array(
            'model'=>$model,
        ));
    }


    public function actionGetWidgetNotification() {
        if(Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('widgetNotificationRenderer');
        }
    }

    
    public function actionGetApproveView($id) {
        if(Yii::app()->request->isAjaxRequest && is_numeric($id)) {
            $project = ClientProjects::model()->findByAttributes(array('id'=>$id));
            $this->renderPartial('_approve', array('project'=>$project));
        }
        else $this->redirect(array('/admin/'));
    }

    
    public function actionSaveApproveProjectDetails($pid=null) {
        if(is_null($pid)) {
            echo "Invalid project requested.";
            die;
        }

        $forProject    = ClientProjects::model()->findByPk($pid);

        $clientProject = Yii::app()->request->getPost('ClientProject');
        $client        = Yii::app()->request->getPost('Client');
        $project       = Yii::app()->request->getPost('Project');
        $skills        = Yii::app()->request->getPost('Skills');
        $services      = Yii::app()->request->getPost('Services');
        $industries    = Yii::app()->request->getPost('Industries');
        $errorList['iserror'] = 0;
        $errorList['msg'] = array();

        // save data received
        if(isset($forProject) && !empty($forProject)) {
            // update client account manager
            if(isset($client['manager_id']) && !empty($client['manager_id']) && is_numeric($client['manager_id'])) {
                // if old manager is not same as the requested one
                if($forProject->clientProfiles->manager_id != $client['manager_id']) {
                    ClientProfiles::model()->updateLeadOwner($client['manager_id'], $forProject->clientProfiles);
                }
            }

            // save score and comment
            $score         = $clientProject['lead_score'];
            $comment       = trim($clientProject['admin_comments']);
            if((is_numeric($score) && $score >= 0 && $score <= 10) || (!empty($comment))) {
                $forProject->lead_score     = $clientProject['lead_score'];
                $forProject->admin_comments = $clientProject['admin_comments'];
                //$forProject->lead_owner = $clientProject['lead_owner'];
                if(!$forProject->update()) {
                    $errorList['iserror'] = 1;
                    $errorList['msg']['leads'] = "Failed to update Leads";
                }
            }

            // update skills
            unset($criteria);
            $criteria = new CDbCriteria;
            $criteria->addNotInCondition('skills_id', $skills);
            $criteria->addCondition('client_projects_id=' . $pid);
            ClientProjectsHasSkills::model()->deleteAll($criteria);
            if(!empty($skills))
            foreach ($skills as $skill) {
                $hasSkill    = ClientProjectsHasSkills::model()->findByAttributes(array('skills_id'=>$skill, 'client_projects_id'=>$pid));
                if(!empty($hasSkill)) {
                    $hasSkill->status = 1;
                    $hasSkill->add_date = date("Y-m-d H:i:s");
                    $hasSkill->skills_id = $skill;
                    if(!$hasSkill->update()) {
                        $errorList['iserror'] = 1;
                        $errorList['msg']['skills'] = "Failed to update Skills";
                    }
                } else {
                    $hasSkill= new ClientProjectsHasSkills;
                    $hasSkill->client_projects_id = $pid;
                    $hasSkill->status = 1;
                    $hasSkill->add_date = date("Y-m-d H:i:s");
                    $hasSkill->skills_id = $skill;
                    if(!$hasSkill->save()) {
                        $errorList['iserror'] = 1;
                        $errorList['msg']['skills'] = "Failed to add Skills";
                    }
                }
            }

            //update services
            unset($criteria);
            $criteria = new CDbCriteria;
            $criteria->addNotInCondition('services_id', $services);
            $criteria->addCondition('client_projects_id =' . $pid);
            ClientProjectsHasServices::model()->deleteAll($criteria);
            if(!empty($services))
            foreach ($services as $service) {
                $hasService    = ClientProjectsHasServices::model()->findByAttributes(array('services_id'=>$service, 'client_projects_id'=>$pid));
                if(!empty($hasService)) {
                    $hasService->status = 1;
                    $hasService->add_date = date("Y-m-d H:i:s");
                    $hasService->services_id = $service;
                    if(!$hasService->update()) {
                        $errorList['iserror'] = 1;
                        $errorList['msg']['services'] = "Failed to update Services";
                    }
                } else {
                    $hasService= new ClientProjectsHasServices;
                    $hasService->client_projects_id = $pid;
                    $hasService->status = 1;
                    $hasService->add_date = date("Y-m-d H:i:s");
                    $hasService->services_id = $service;
                    if(!$hasService->save()) {
                        $errorList['iserror'] = 1;
                        $errorList['msg']['services'] = "Failed to add Services";
                    }
                }
            }

            //update industries
            unset($criteria);
            $criteria = new CDbCriteria;
            $criteria->addNotInCondition('industries_id', $industries);
            $criteria->addCondition('client_projects_id ='. $pid);
            ClientProjectsHasIndustries::model()->deleteAll($criteria);
            if(!empty($industries))
            foreach ($industries as $industry) {
                $hasIndustry = ClientProjectsHasIndustries::model()->findByAttributes(array('industries_id'=>$industry, 'client_projects_id'=>$pid));
                if(!empty($hasIndustry)) {
                    $hasIndustry->status = 1;
                    $hasIndustry->add_date = date("Y-m-d H:i:s");
                    $hasIndustry->industries_id = $industry;
                    if(!$hasIndustry->update()) {
                        $errorList['iserror'] = 1;
                        $errorList['msg']['industries'] = "Failed to update Industries";
                    }
                } else {
                    $hasIndustry= new ClientProjectsHasIndustries;
                    $hasIndustry->client_projects_id = $pid;
                    $hasIndustry->status = 1;
                    $hasIndustry->add_date = date("Y-m-d H:i:s");
                    $hasIndustry->industries_id = $industry;
                    if(!$hasIndustry->save()) {
                        $errorList['iserror'] = 1;
                        $errorList['msg']['industries'] = "Failed to add Industries";
                    }
                }
            }

            // update client details
            if(isset($client) && !empty($client)) {
                $clientProfile               = $forProject->clientProfiles;
                $clientProfile->company_link = $client['company_link'];
                if(!$clientProfile->update()) {
                    $errorList['iserror'] = 1;
                    $errorList['msg']['client'] = "Failed to update Client Details";
                }

                $clientProfile->users->company_name = $client['company_name'];
                $clientProfile->users->display_name = preg_replace('/[^a-z0-9]/i', '-', $client['company_name']);

                try {
                    $clientProfile->users->update(); 
                } catch (Exception $e) {
                    $errorList['iserror'] = 1;
                    $errorList['msg']['company'] = "Company Name already exists";
                }
            }

            // update project details
            if(isset($project) && !empty($project)) {
                $forProject->name                       = $project['name'];
                $forProject->team_size                  = $project['team_size'];
                $forProject->project_start_preference   = $project['project_start_preference'];
                $forProject->current_status_id          = $project['current_status_id'];
                $forProject->description                = $project['description'];
                $forProject->min_budget                 = $project['min_budget'];
                $forProject->max_budget                 = $project['max_budget'];
                if(!$forProject->update()) {
                    $errorList['iserror'] = 1;
                    $errorList['msg']['project'] = "Failed to update Project Details";
                }
            }

            if(!$this->saveTags($pid,Yii::app()->request->getPost('tag'),Yii::app()->request->getPost('tagNew'))){
                $errorList['iserror'] = 1;
                $errorList['msg']['tags'] = "Failed to update some Tags (Duplicate Tag name or Something isn't working)";
            }
            echo json_encode($errorList); die;
            
        }
    }

    public function saveTags($pid,$tags,$newTags){
        $status     =   true;
        if($newTags){
            foreach ($newTags as $tag) {
                if(!empty($tag['text'])){
                    $crieteria=new CDbCriteria;
                    $crieteria->compare('t.tag_text',trim($tag['text']));
                    $model=Tags::model()->findAll($crieteria);
                    if(!empty($model))
                    {                        
                        $status = false;
                    }
                    else{
                        $newTag                =   new Tags;
                        $newTag->tag_text      =   $tag['text'];
                        $newTag->tag_color     =   empty($tag['color'])?'#009933':'#'.$tag['color'];
                        $newTag->add_date      =   date('Y-m-d H:i:s');
                        $newTag->modify_date   =   date('Y-m-d H:i:s');
                        if(!$newTag->save()){
                            $status = false;
                        }
                        else{
                            if(!empty($tag['active']) && $tag['active']==1){
                                $projectTag                        =   new ClientProjectsHasTags;
                                $projectTag->client_projects_id    =   $pid;
                                $projectTag->tag_id                =   $newTag->id;
                                $projectTag->add_date              =   date('Y-m-d H:i:s');
                                $projectTag->modify_date           =   date('Y-m-d H:i:s');
                                if(!$projectTag->save())
                                    $status = false;
                            }
                        }
                    }
                }
            }
        }

        if($tags){
            foreach ($tags as $tag) {
                $exsistingTag               =   Tags::model()->findByPk($tag['id']);
                
                $crieteria                  =   new CDbCriteria;
                $crieteria->compare('t.tag_text',trim($tag['text']));
                $model                      =   Tags::model()->findAll($crieteria);
                if(empty($model))
                {
                    $exsistingTag->tag_text =   empty($tag['text'])?$exsistingTag->tag_text:$tag['text'];
                }
                
               $exsistingTag->tag_color     =   empty($tag['color'])?$exsistingTag->tag_color:'#'.$tag['color'];
               $exsistingTag->add_date      =   date('Y-m-d H:i:s');
               $exsistingTag->modify_date   =   date('Y-m-d H:i:s');
               if(!$exsistingTag->update()){
                    $status = false;
               }

               if(!empty($tag['active']) && $tag['active']==1){
                    $projectTag                            =   ClientProjectsHasTags::model()->findByAttributes(array('client_projects_id'=>$pid,'tag_id'=>$exsistingTag->id));
                    if(empty($projectTag)){
                        $projectTag                        =   new ClientProjectsHasTags;
                        $projectTag->client_projects_id    =   $pid;
                        $projectTag->tag_id                =   $exsistingTag->id;
                        $projectTag->add_date              =   date('Y-m-d H:i:s');
                        $projectTag->modify_date           =   date('Y-m-d H:i:s');
                        if(!$projectTag->save())
                            $status = false;
                    }
                    else{
                        $projectTag->is_deleted            =    0;
                        $projectTag->modify_date           =   date('Y-m-d H:i:s');
                        if(!$projectTag->update())
                            $status = false;
                    }
                    
               }
               else{
                   $projectTag                             =   ClientProjectsHasTags::model()->findByAttributes(array('client_projects_id'=>$pid,'tag_id'=>$exsistingTag->id)); 
                   if(!empty($projectTag)){
                        $projectTag->is_deleted            =    1;
                        if(!$projectTag->update())
                            $status = false;
                   }
               }
           }

        }

        return $status;

    }

    public function actionDeleteTag(){
        $id = Yii::app()->request->getPost('id');
        if($id){
            $tag = Tags::model()->findByPk($id);
            if($tag->delete()){
                echo 'success';
            }
            else{
                echo 'error';
            }

        }
    }

    public function actionApproveIntermediaryProject($id=null) {
        $suppliers = Yii::app()->request->getPost('Suppliers');
        if(is_null($id)) {
            Yii::app()->user->setFlash('failureFlash', 'Invalid Url Requested.');
            $this->redirect(array('/admin/default/intermediary'));
        }

        // begin transaction
        $transaction = Yii::app()->db->beginTransaction();

        // get supplierProject for this client project
        $supProjects = SuppliersProjects::model()->findAllByAttributes(array('client_projects_id' => $id));
        
        // if all the suppliers are disselected - remove status from all
        if(!isset($suppliers) || empty($suppliers)) {
            foreach ($supProjects as $project) {
                $project->status = 0;
                if(!$project->update()) {
                    $transaction->rollback();
                    Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                    $this->redirect(array('/admin/default/intermediary'));
                }
            }

            // set clients status to waiting approval
            $project = ClientProjects::model()->findByPk($id);
            $project->status = 1;
            
            // update lead score and vp_comments
            $clientProject = Yii::app()->request->getPost('ClientProject');

            // save score and comment
            $score         = $clientProject['lead_score'];
            $comment       = trim($clientProject['admin_comments']);
            if((is_numeric($score) && $score >= 0 && $score <= 10) || (!empty($comment))) {
                $project->lead_score     = $clientProject['lead_score'];
                $project->admin_comments = $clientProject['admin_comments'];
            }
            if($project->update()) {
                $transaction->commit();
                Yii::app()->user->setFlash('successFlash', 'Suppliers Removed Successfully.');
                //$this->redirect(array('/admin/default/intermediary'));
            } else {
                $transaction->rollback();
                Yii::app()->user->setFlash('failureFlash', 'Suppliers Selection Failed.');
                $this->redirect(array('/admin/default/intermediary'));
            }

        }

        // if some suppliers are selected
        if(isset($suppliers) && !empty($suppliers)){
            $selected = array();
            foreach($suppliers as $supplier) {
                foreach ($supplier as $key => $value) {
                    $selected[] = $key;
                }
            }

            // update project status to 1
            foreach ($supProjects as $project) {
                $oldStatus = null;
                if(in_array($project->suppliers_id, $selected)){
                    $oldStatus = $project->status;
                    $project->status       = 1;
                    $project->is_new_intro = 0;
                }
                else{
                    $project->status       = 0;
                    $project->is_new_intro = 0;
                }

                if(!$project->update()) {
                    $transaction->rollback();
                    Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                    $this->redirect(array('/admin/default/intermediary'));
                }

                // if old status was off and turned on - send mail and notification
                if(!is_null($oldStatus) && $oldStatus == 0 && $project->status == 1) {
                    // get suppliers team
                    $teamSupp = Team::model()->findAllByAttributes(array('add_by'=>$project->suppliers->users->id));
                    $suppUsers = array();
                    foreach ($teamSupp as $team) {
                        $suppUsers[] = $team->users;
                    }
                    $suppUsers[] = $project->suppliers->users;

                    // get clients team
                    $teamClient = Team::model()->findAllByAttributes(array('add_by'=>$project->clientProjects->clientProfiles->users->id));
                    $clientUsers = array();
                    foreach ($teamClient as $team) {
                        $clientUsers[] = $team->users;
                    }
                    $clientUsers[] = $project->clientProjects->clientProfiles->users;

                    // notification constant
                    $title          =   'Introduction';
                    $description    =   CHtml::link('<p class="fs10 font_newlight mb0 toggle-color">'.ucwords($project->clientProjects->clientProfiles->manager->first_name).' Introduced you to <span class="orange-new">'.$project->clientProjects->clientProfiles->users->first_name.'</span> of <span class="orange-new">'.$project->clientProjects->clientProfiles->users->company_name.'</span> for <span class="orange-new">'.$project->clientProjects->name.'</span></p>',array('/supplier/conversation','pid'=>base64_encode($project->id)));
                    $isNotification =   1;
                    
                    // email constants
                    $data['link']               =   Yii::app()->createAbsoluteUrl('client/index');
                    $data['account_manager'] = $project->clientProjects->clientProfiles->manager->username;
                    $data['manager_name'] = $project->clientProjects->clientProfiles->manager->first_name;
                    $data['name']               =   $project->suppliers->users->first_name;
                    $data['supplier_name']               =   $project->suppliers->users->first_name;
                    $data['supplier_project_id']=   $project->id;
                    //skills, services and Industries
                    $data['skills']     =   '';
                    $data['services']   =   '';
                    $data['industries'] =   '';
                    foreach($project->clientProjects->clientProjectsHasSkills as $skill){
                        $data['skills'].=$skill->skills->name.", ";
                    }
                    foreach($project->clientProjects->clientProjectsHasServices as $service){
                        $data['services'].=$service->services->name.", ";
                    }
                    foreach($project->clientProjects->clientProjectsHasIndustries as $industry){
                        $data['industries'].=$industry->industries->name.", ";
                    }
                    $data['skills']     =   rtrim($data['skills'],", ");
                    $data['services']   =   rtrim($data['services'],", ");
                    $data['industries'] =   rtrim($data['industries'],", ");
                    $data['project_name']       =   $project->clientProjects->name;
                    $data['business_problem']   =   $project->clientProjects->business_problem;
                    if($data['business_problem'] == 1) $data['business_problem'] = "work with my Existing Project";
                    else $data['business_problem'] = "build a new Product";
                    $data['budget']             =   $project->clientProjects->custom_budget_range;
                    if($project->clientProjects->preferences=='country'){
                        foreach($project->clientProjects->clientProfiles->cities as $city){
                            $data['locations'] =   $city->cities->countries->name;
                            break;
                        }
                    }
                    else if($project->clientProjects->preferences=='regions'){
                        $data['locations'] = '';
                        $regionIds=explode(",",$project->clientProjects->regions);
                        $crieteria=new CDbCriteria;
                        $crieteria->addInCondition('t.id',$crieteria);
                        $regions = Regions::model()->findAll($crieteria);
                        foreach($regions as $region){
                             $data['locations'] = $region->name.',';
                        }
                        $data['locations'] = rtrim($data['locations'],',');
                    }
                    else{
                        $data['locations'] = '';
                    }
                    //range selected on search page
                    if(!empty($project->clientProjects->min_budget) && !empty($project->clientProjects->max_budget))
                        $data['minmax'] =   '$'.$project->clientProjects->min_budget.' - $'.$project->clientProjects->max_budget;
                    else
                        $data['minmax'] =   '';
                    switch($project->clientProjects->project_start_preference)
                    {
                        case 1:
                            $data['start_pref']         =   "Immediately";
                            break;
                        case 2:
                            $data['start_pref']         =   "In Next 1-2 Weeks";
                            break;
                        case 3:
                            $data['start_pref']         =   "In Next 2-4 Weeks";
                            break;
                        case 4:
                            $data['start_pref']         =   "In Next Few Months";
                            break;
                        default:
                            break;
                    }
                    $data['desc']               =   !empty($project->clientProjects->description) ? $project->clientProjects->description : "";
                    $data['client_name']        =   $project->clientProjects->clientProfiles->users->first_name;
                    $data['client_email']       =   $project->clientProjects->clientProfiles->users->username;
                    $data['client_company']     =   $project->clientProjects->clientProfiles->users->company_name;
                    $data['supplier_email']   =   $project->suppliers->users->username;
                    $data['supplier_company']   =   $project->suppliers->users->company_name;
                    $data['display_name']       =   $project->suppliers->users->display_name;
                    $data['clientProjectId']    =   $project->clientProjects->id;
                    $data['supplierProjectId']  =   $project->id;

                    // send email and notifications to all supplier users
                    foreach ($suppUsers as $user) {
                        $for            =   $user->id;
                        $this->actionLogSave($for,$title,$description,$isNotification);  
                    
                        $data['email']              =   $user->username;
                        $data['id']                 =   $user->id;

                        $chatUsers = ChatRoomHasUsers::model()->findByAttributes(array('chat_room_id'=>$project->chat_room_id,'users_id'=>$user->id, 'status'=>'1'));
                        if(!empty($chatUsers)) {
                            $param[0]= $project->chat_room_id;
                            $param[1]= $chatUsers->id;
                            $param[2]= 1;
                            $data['replyTo'] = $this->getReplyToAddress($param);
                            $this->sendMail($data,'supplier_introduction_approved');
                        }
                    }

                    $title          =   'Introductions made to Client';
                    $description    =   CHtml::link('<p class="fs10 font_newlight mb0 toggle-color"><span class="orange-new">'.$project->clientProjects->clientProfiles->manager->first_name.'</span> Introducted you to <span class="orange-new">'.$project->suppliers->users->first_name.' </span>of<span class="orange-new"> '.$project->suppliers->users->company_name.'</span> for <span class="orange-new">'.$project->clientProjects->name.'</span></p>',array('/client/introDetail','projectId'=>$project->client_projects_id,'pId'=>$project->id));
                    $isNotification =   1;

                    $data['name']               =   $project->clientProjects->clientProfiles->users->first_name;
                    // send email and notifications to all client users
                    foreach ($clientUsers as $user) {
                        $for            =   $user->id;
                        $this->actionLogSave($for,$title,$description,$isNotification);

                        $data['email']              =   $user->username;
                        $data['id']                 =   $user->id;

                        $chatUsers = ChatRoomHasUsers::model()->findByAttributes(array('chat_room_id'=>$project->chat_room_id,'users_id'=>$user->id, 'status'=>'1'));
                        if(!empty($chatUsers)) {
                            $param[0]= $project->chat_room_id;
                            $param[1]= $chatUsers->id;
                            $param[2]= 1;
                            $data['replyTo'] = $this->getReplyToAddress($param);
                            $this->sendMail($data,'client_introduction_approved');
                        }
                    }

                }
            }

            $project = ClientProjects::model()->findByPk($id);
            $project->status = 2;
            // update lead score and vp_comments
            $clientProject = Yii::app()->request->getPost('ClientProject');
            // save score and comment
            $score         = $clientProject['lead_score'];
            $comment       = trim($clientProject['admin_comments']);
            if((is_numeric($score) && $score >= 0 && $score <= 10) || (!empty($comment))) {
                $project->lead_score     = $clientProject['lead_score'];
                $project->admin_comments = $clientProject['admin_comments'];
            }
            
            if($project->update()) {
                $transaction->commit();
                Yii::app()->user->setFlash('successFlash', 'Project Approved Successfully.');              
                //$this->redirect(array('/admin/default/intermediary'));
            } else {
                $transaction->rollback();
                Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                $this->redirect(array('/admin/default/intermediary'));
            }
        }
        
        $this->redirect(array('/admin/default/intermediary'));
    }

    
    public function actionApproveProject($id=null) {
        $suppliers = Yii::app()->request->getPost('Suppliers');



        if(is_null($id)) {
            Yii::app()->user->setFlash('failureFlash', 'Invalid Url Requested.');
            $this->redirect(array('/admin/default/intermediary'));
                         }

        // begin transaction
        $transaction = Yii::app()->db->beginTransaction();

        // get supplierProject for this client project
        $supProjects = SuppliersProjects::model()->findAllByAttributes(array('client_projects_id' => $id));
 
        // if all the suppliers are disselected - remove status from all
        if(!isset($suppliers) || empty($suppliers)) {
            foreach ($supProjects as $project) {
                $project->status = 0;
                if(!$project->update()) {
                    $transaction->rollback();
                    Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                    $this->redirect(array('/admin/default/intermediary'));
                }
            }

            // set clients status to waiting approval
            $project = ClientProjects::model()->findByPk($id);
            $project->status = 1;
            
            // update lead score and vp_comments
            $clientProject = Yii::app()->request->getPost('ClientProject');

            // save score and comment
            $score         = $clientProject['lead_score'];
            $comment       = trim($clientProject['admin_comments']);
            if((is_numeric($score) && $score >= 0 && $score <= 10) || (!empty($comment))) {
                $project->lead_score     = $clientProject['lead_score'];
                $project->admin_comments = $clientProject['admin_comments'];
            }
            if($project->update()) {
                $transaction->commit();
                Yii::app()->user->setFlash('successFlash', 'Suppliers Removed Successfully.');
                //$this->redirect(array('/admin/default/intermediary'));
            } else {
                $transaction->rollback();
                Yii::app()->user->setFlash('failureFlash', 'Suppliers Selection Failed.');
                $this->redirect(array('/admin/default/intermediary'));
            }

        }
  
        // if some suppliers are selected
        if(isset($suppliers) && !empty($suppliers)){
            $selected = array();
            foreach($suppliers as $supplier) {

                foreach ($supplier as $key => $value) {
                    $selected[] = $key;
                    //get supplier for this key value
                      $supp = suppliers::model()->findByPk($key);
                    //  CVarDumper::dump( $supp->users->username,10,1);die;
                      //send mail if its profile is not completed
                      if($supp->is_profile_complete=='0')
                      {
                     $data['id']     =   $supp->users->id;
                     $data['email']       =   $supp->users->username;
                     $data['name']        =   $supp->users->first_name;;
                   
                     $data['link2']       =   Yii::app()->createAbsoluteUrl('Supplier/EditProfile',array('id'=>$supp->id));   
                    
                    $this->sendMail($data,'Supplier_with_incomplete_profile');

                      }
                       
          

                }
            }

            // update project status to 1
            foreach ($supProjects as $project) {
                if(in_array($project->suppliers_id, $selected)){ 
                    $project->status       = 1;
                    $project->is_new_intro = 0;
                    

                    // get all supplier users
                    $suppTeamMembers = Team::model()->findAllByAttributes(array('add_by'=>$project->suppliers->users->id));
                    
                    $suppTeams = array();
                    foreach ($suppTeamMembers as $member) {
                        $suppTeams[] = $member->users;
                    }
                    $suppTeams[] = $project->suppliers->users;

                    //Notify supplier about Introduction
                    $title          =   'Introduction';
                    $description    =   CHtml::link('<p class="fs10 font_newlight mb0 toggle-color">'.ucwords($project->clientProjects->clientProfiles->manager->first_name).' Introducted you to <span class="orange-new">'.$project->clientProjects->clientProfiles->users->first_name.'</span> of <span class="orange-new">'.$project->clientProjects->clientProfiles->users->company_name.'</span> for <span class="orange-new">'.$project->clientProjects->name.'</span></p>',array('/supplier/conversation','pid'=>base64_encode($project->id)));
                    $isNotification =   1;
                    
                    $data['account_manager'] = $project->clientProjects->clientProfiles->manager->username;
                    $data['manager_name'] = $project->clientProjects->clientProfiles->manager->first_name;
                    $data['name']               =   $project->suppliers->users->first_name;
                    $data['supplier_project_id']=   $project->id;
                    
                    $data['skills']     =   '';
                    $data['services']   =   '';
                    $data['industries'] =   '';
                    foreach($project->clientProjects->clientProjectsHasSkills as $skill){
                        $data['skills'].=$skill->skills->name.", ";
                    }
                    foreach($project->clientProjects->clientProjectsHasServices as $service){
                        $data['services'].=$service->services->name.", ";
                    }
                    foreach($project->clientProjects->clientProjectsHasIndustries as $industry){
                        $data['industries'].=$industry->industries->name.", ";
                    }
                    $data['skills']     =   rtrim($data['skills'],", ");
                    $data['services']   =   rtrim($data['services'],", ");
                    $data['industries'] =   rtrim($data['industries'],", ");
                    
                    $data['project_name']       =   $project->clientProjects->name;
                    $data['business_problem']   =   $project->clientProjects->business_problem;
                    if($data['business_problem'] == 1) $data['business_problem'] = "work with my Existing Project";
                    else $data['business_problem'] = "build a new Product";
                    $data['budget']             =   $project->clientProjects->custom_budget_range;

                    if($project->clientProjects->preferences=='country'){
                        foreach($project->clientProjects->clientProfiles->cities as $city){
                            $data['locations'] =   $city->cities->countries->name;
                            break;
                        }
                    }
                    else if($project->clientProjects->preferences=='regions'){
                        $data['locations'] = '';
                        $regionIds=explode(",",$project->clientProjects->regions);
                        $crieteria=new CDbCriteria;
                        $crieteria->addInCondition('t.id',$crieteria);
                        $regions = Regions::model()->findAll($crieteria);
                        foreach($regions as $region){
                             $data['locations'] = $region->name.',';
                        }
                        $data['locations'] = rtrim($data['locations'],',');
                    }
                    else{
                        $data['locations'] = '';
                    }

                    //range selected on search page
                    if(!empty($project->clientProjects->min_budget) && !empty($project->clientProjects->max_budget))
                        $data['minmax'] =   '$'.$project->clientProjects->min_budget.' - $'.$project->clientProjects->max_budget;
                    else
                        $data['minmax'] =   '';
                    switch($project->clientProjects->project_start_preference)
                    {
						case 1:
                            $data['start_pref']         =   "Immediately";
                            break;
                        case 2:
                            $data['start_pref']         =   "In Next 1-2 Weeks";
                            break;
                        case 3:
                            $data['start_pref']         =   "In Next 2-4 Weeks";
                            break;
                        case 4:
                            $data['start_pref']         =   "In Next Few Months";
                            break;
                        default:
                            break;
                    }
                    $data['desc']               =   !empty($project->clientProjects->description) ? $project->clientProjects->description : "";
                    
                    $data['client_name']        =   $project->clientProjects->clientProfiles->users->first_name;
                    $data['client_email']       =   $project->clientProjects->clientProfiles->users->username;
                    $data['client_company']     =   $project->clientProjects->clientProfiles->users->company_name;
                    $data['supplier_company']   =   $project->suppliers->users->company_name;
                    $data['display_name']       =   $project->suppliers->users->display_name;
                    
                    foreach($suppTeams as $user) {
                        $for            =   $user->id;
                        $this->actionLogSave($for,$title,$description,$isNotification);

                        $data['email']              =   $user->username;
                        $data['id']                 =   $user->id;

                        $chatUsers = ChatRoomHasUsers::model()->findByAttributes(array('chat_room_id'=>$project->chat_room_id,'users_id'=>$user->id, 'status'=>'1'));
                        if(!empty($chatUsers)) {
                            $param[0]= $project->chat_room_id;
                            $param[1]= $chatUsers->id;
                            $param[2]= 1;
                            $data['replyTo'] = $this->getReplyToAddress($param);
                            $this->sendMail($data,'supplier_introduction_approved');
                        }
                    }
                }
                else $project->status = 0;

                if(!$project->update()) {
                    $transaction->rollback();
                    Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                    $this->redirect(array('/admin/default/intermediary'));
                }
            }

            $project = ClientProjects::model()->findByPk($id);
            $project->status = 2;
            // update lead score and vp_comments
            $clientProject = Yii::app()->request->getPost('ClientProject');
            // save score and comment
            $score         = $clientProject['lead_score'];
            $comment       = trim($clientProject['admin_comments']);
            if((is_numeric($score) && $score >= 0 && $score <= 10) || (!empty($comment))) {
                $project->lead_score     = $clientProject['lead_score'];
                $project->admin_comments = $clientProject['admin_comments'];
            }
            
            if($project->update()) {
                $transaction->commit();
                Yii::app()->user->setFlash('successFlash', 'Project Approved Successfully.');
                
                // get client team members
                $clientMembers = Team::model()->findAllByAttributes(array('add_by'=>$project->clientProfiles->users->id));
                $clientTeams = array();
                foreach ($clientMembers as $member) {
                    $clientTeams[] = $member->users;
                }
                $clientTeams[] = $project->clientProfiles->users;

                //notify
                $title          =   'Project Approved';
                $description    =   CHtml::link('<p class="fs10 font_newlight mb0 toggle-color">Congratulations! Your project is now Approved!</p>',array('/client/editProject','id'=>$project->id));
                $isNotification =   1;

                $data['account_manager'] = $project->clientProfiles->manager->username;
                $data['manager_name'] =   $project->clientProfiles->manager->first_name;
                $data['from_name']    =   ucwords($project->clientProfiles->manager->first_name);
                $data['name']   =   $project->clientProfiles->users->first_name;
                $data['title']  =   'VenturePact: Project Approved';

                foreach ($clientTeams as $user) {
                    $for = $user->id;
                    $this->actionLogSave($for,$title,$description,$isNotification);

                    $data['email']  =   $user->username;
                    $data['id']     =   $user->id;
                    $this->sendMail($data,'client_project_approved');
                }
                
                //Notify about Introductions Client Side Start
                foreach($project->suppliersProjects as $proposal){
                    if($proposal->status > 0){
                        //Notify Client
                        $title          =   'Introductions made to Client';
                        $description    =   CHtml::link('<p class="fs10 font_newlight mb0 toggle-color"><span class="orange-new">'.ucwords($project->clientProfiles->manager->first_name).'</span> Introducted you to <span class="orange-new">'.$proposal->suppliers->users->first_name.' </span>of<span class="orange-new"> '.$proposal->suppliers->users->company_name.'</span> for <span class="orange-new">'.$project->name.'</span></p>',array('/client/introDetail','projectId'=>$proposal->client_projects_id,'pId'=>$proposal->id));
                        $isNotification =   1;

                        //Email Client
                        $data['link']               =   Yii::app()->createAbsoluteUrl('client/index');
                        $data['name']               =   $project->clientProfiles->users->first_name;
                        $data['supplier_name']      =   $proposal->suppliers->users->first_name;
                        $data['supplier_email']     =   $proposal->suppliers->users->username;
                        $data['supplier_company']   =   $proposal->suppliers->users->company_name;
                        $data['display_name']       =   $proposal->suppliers->users->display_name;
                        $data['project_name']       =   $project->name;
                        $data['budget']             =   $project->custom_budget_range;
                        $data['clientProjectId']    =   $project->id;
                        $data['supplierProjectId']  =   $proposal->id;
                        $data['title']              =   'VenturePact:Introduction';

                        if($data['business_problem'] == 1) $data['business_problem'] = "work with my Existing Project";
                        else $data['business_problem'] = "build a new Product";
                        
                        switch($project->project_start_preference)
                        {
                            case 1:
                            $data['start_pref']         =   "Immediately";
                            break;
                        case 2:
                            $data['start_pref']         =   "In Next 1-2 Weeks";
                            break;
                        case 3:
                            $data['start_pref']         =   "In Next 2-4 Weeks";
                            break;
                        case 4:
                            $data['start_pref']         =   "In Next Few Months";
                            break;
                        default:
                            break;
                        }
                        
                        $data['desc']               =   $project->description;
                        //skills, services and Industries
                        $data['skills']     =   '';
                        $data['services']   =   '';
                        $data['industries'] =   '';
                        foreach($project->clientProjectsHasSkills as $skill){
                            $data['skills'].=$skill->skills->name.", ";
                        }
                        foreach($project->clientProjectsHasServices as $service){
                            $data['services'].=$service->services->name.", ";
                        }
                        foreach($project->clientProjectsHasIndustries as $industry){
                            $data['industries'].=$industry->industries->name.", ";
                        }
                        $data['skills']     =   rtrim($data['skills'],", ");
                        $data['services']   =   rtrim($data['services'],", ");
                        $data['industries'] =   rtrim($data['industries'],", ");
                        //send locationPreference and location in mail
                        if($project->preferences=='country'){
                            foreach($project->clientProfiles->cities as $city){
                                $data['locations'] =   $city->cities->countries->name;
                                break;
                            }
                        }
                        else if($project->preferences=='regions'){
                            $data['locations'] = '';
                            $regionIds=explode(",",$project->regions);
                            $crieteria=new CDbCriteria;
                            $crieteria->addInCondition('t.id',$crieteria);
                            $regions = Regions::model()->findAll($crieteria);
                            foreach($regions as $region){
                                 $data['locations'] = $region->name.',';
                            }
                            $data['locations'] = rtrim($data['locations'],',');
                        }
                        else{
                            $data['locations'] = '';
                        }
                        //range selected on search page
                        if(!empty($project->min_budget) && !empty($project->max_budget))
                            $data['minmax'] =   '$'.$project->min_budget.' - $'.$project->max_budget;
                        else
                            $data['minmax'] =   '';
                        
                        foreach ($clientTeams as $user) {
                            $for            =   $user->id;
                            $this->actionLogSave($for,$title,$description,$isNotification);
                            
                            $data['id']                 =   $user->id;
                            $data['email']              =   $user->username;
                            //chat reply to code
                            $chatUsers = ChatRoomHasUsers::model()->findByAttributes(array('chat_room_id'=>$proposal->chat_room_id,'users_id'=>$user->id, 'status'=>'1'));
                            if(!empty($chatUsers)) {
                                $param[0]= $proposal->chat_room_id;
                                $param[1]= $chatUsers->id;
                                $param[2]= 1;
                                $data['replyTo'] = $this->getReplyToAddress($param);
                                $this->sendMail($data,'client_introduction_approved');
                            }
                        }
                    }
                }
                //Notify about Introductions Client Side End
                

                //$this->redirect(array('/admin/default/intermediary'));
            } else {
                $transaction->rollback();
                Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                $this->redirect(array('/admin/default/intermediary'));
            }
        }
        
        $this->redirect(array('/admin/default/intermediary'));
    }
    
    
    public function sendMail($data,$type)
    {
        // enable/disable emails based on config params
        if(Yii::app()->params['sendMail'] != true) {
            return true;
        }

        $templete   =   '';
        $admin      =   0;
        $intro      =   0;
        $subject    =   'default';
        $chat = 0;
        switch($type){
             case 'test':
                $templete   =   "Welcome_tpl";
                $subject = 'VenturePact:  Account For New CLient';
                $body = $this->renderPartial('/mails/'.$templete,
                    array('name' => 'tarun',false));
            break;

            //Admin Emails Start
             case "project_questions_admin" :
                $templete   =   "project_questions_admin_tpl";
                $subject    =   $data['name'].', We Have Some Questions About Your Project';
                $body       =   $this->renderPartial('/mails/'.$templete,array('data' => $data),true);
             break;
             case "project_questions_reminder_admin" :
                $templete   =   "project_questions_reminder_admin_tpl";
                $subject    =   $data['name'].', We Have Some Questions About Your Project';
                $body       =   $this->renderPartial('/mails/'.$templete,array('data' => $data),true);
             break;
            case "client_project_approved" :
                $templete   =   "client_project_approved_tpl";
                $subject    =   'Congratulations! Your Project is Approved!';
                $body       =   $this->renderPartial('/mails/'.$templete,array('data' => $data),true);
            break;
             case "client_introduction_approved" :
                $templete       =   "client_introduction_approved_tpl";
                $subject        =   $data['name'].', Meet '.$data['supplier_name'].' From '.$data['supplier_company'];
                $data['title']  =   $subject;
                $body           =   $this->renderPartial('/mails/'.$templete,array('data' => $data),true);
                $chat=1;
             break;
             case "supplier_introduction_approved" :
                $templete       =   "supplier_introduction_approved_tpl";
                // $subject        =   ucfirst($data['name']).', Meet '.ucfirst($data['client_name']).' From '.ucfirst($data['client_company']);
                $subject        =   $data['client_name'].', Meet '.$data['name'].' From '.$data['supplier_company'];
                $data['title']  =   $subject;
                $body           =   $this->renderPartial('/mails/'.$templete,array('data' => $data),true);     
                $chat=1;           
             break;
              case "Supplier_with_incomplete_profile" :
                $templete       =   "Supplier_with_incomplete_profile_tpl";
                // $subject        =   ucfirst($data['name']).', Meet '.ucfirst($data['client_name']).' From '.ucfirst($data['client_company']);
                $subject        =  "Get more projects from VenturePact";
                 $data['title']  =   $subject;
                $body           =   $this->renderPartial('/mails/'.$templete,array('data' => $data),true);     
                         
             break;

              case "in_enterprise_approved_by_admin" :
                $templete       =   "in_enterprise_approved_by_admin_tpl";
                $subject        =  "Enterprise Approved";
                $body           =   $this->renderPartial('/mails/'.$templete,array('data' => $data),true);     
                         
             break;


            //Admin Emails End
            
            default:
            break;          
        }

        $fromname   =   "VenturePact Team";

        if($chat)
            $from = $data['replyTo'];
        else {
            $from       =   Yii::app()->params['adminEmail'];
            if(isset($data['account_manager']) && !empty($data['account_manager'])) {
                $from = $data['account_manager'];
                $fromname = $data['manager_name'];
            }
        }

        if(isset($data['manager_name']) && !empty($data['manager_name'])) {
            $fromname = $data['manager_name'];
        }
        

        if(isset($data['email']))
        {
            $to         =   $data['email'];    
        } 
        
        if(isset($email))
        {
            $from = $from_email;
            $to = $to_email;
        }
        
        
        if($admin==1){
            $from       =   $data['email'];
            $to         =   Yii::app()->params['adminEmail'];
        }
        
        if($admin==5){
            $from       =   $data['email'];
            $to         =   "devrelations@venturepact.com";
            //$to           =   "sandeep.verma@venturepact.com"; 
        }
        
        if(isset($new_email))
        {
            if(isset($data['email']))
            {
                $from = $data['email'];    
            }else{
                $from = "newclient@venturepact.com";
            }
            
            //$to = Yii::app()->params['adminEmail'];
            $to = "pratham@venturepact.com";
          
        }     

        require_once("sendgrid-php/sendgrid-php.php");

        $options = array("turn_off_ssl_verification" => true);
        //$sendgrid = new SendGrid('riteshtandon231981', 'venturepact1', $options);
        $username= Yii::app()->params['sendgrid_username'];
        $password = Yii::app()->params['sendgrid_password'];
        $sendgrid = new SendGrid($username, $password, $options);
        $mail = new SendGrid\Email();
        
        if($admin==2)//Admin will get sigup notifictaion 
            $mail->addTo($to)->addTo($from)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
        if($intro==1)//Introduction Email to Client Supplier and Admin
            $mail->addTo($to)->addTo($from)->addTo($add_to_email)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
        else
            $mail->addTo($to)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
        
        if(!$sendgrid->send($mail)){
            return 0;
        }
        else
        {           
            if(parent::mailLog($subject,$to,$templete,$body))
            return 1;
        }
    }

    
    public function actionProjectQuestions($id=null) {
        if($id!=null){
            $project = ClientProjects::model()->findByPk($id);
            $data['account_manager'] = $project->clientProfiles->manager->username;
            $data['manager_name'] = $project->clientProfiles->manager->first_name;
            $data['email']  =   $project->clientProfiles->users->username;
            $data['id']     =   $project->clientProfiles->users->id;
            $data['name']   =   $project->clientProfiles->users->first_name;

            // echo "Before: " . $project->admin_mail_sent;

            if($project->admin_mail_sent != 1) {
    			$data['title']	=	'VenturePact: We Have Some Questions About Your Project';
                $mail           =   $this->sendMail($data,'project_questions_admin');
            } else {
                $data['title']  =   'VenturePact: We Have Some Questions About Your Project';
                $mail           =   $this->sendMail($data,'project_questions_reminder_admin');
            }

            if($mail==1){
                // update database that mail is sent
                $project->admin_mail_sent = 1;
                $project->update();
                // echo "After: " . $project->admin_mail_sent;
                echo "1";
                die;
            }
            else{
                echo "0";
                die;
            }
        }
    }

    
    public function actionNotifications() {
        $this->pageTitle = 'VenturePact Admin | Notifications';
        $seeMore=1;
        $count = 0;
        $limit              =   30;
        $criteria           =   new CDbCriteria();
        $criteria->order    =   't.add_date DESC';  
        $criteria->limit    =    $limit;
        if(isset($_GET['view']) && $_GET['view'] == "manager") 
            $criteria->condition = "t.for_user = " . Yii::app()->user->id;
        else
            $criteria->condition = "t.for_user = 1";
        $logs           =   Log::model()->findAll($criteria);
        $notifications  =   array();

        if(empty($logs)) {
            $this->redirect(array('/admin/default/index'));
        }
        
        foreach($logs as $log){
            $dataKey    =   date('d M',strtotime($log->add_date));
            $notifications[$dataKey][$log->id]['description']   =   $log->description;
            $notifications[$dataKey][$log->id]['add_date']      =   $log->add_date;
            $notifications[$dataKey][$log->id]['is_prior_admin']=   $log->is_prior_admin;
            $notifications[$dataKey][$log->id]['is_checked']    =   $log->is_checked;
            $notifications[$dataKey][$log->id]['admin_seenby']  =   $log->admin_seenby;
            $notifications[$dataKey][$log->id]['for']           =   $log->for_user;
            $count++;
        }
        if($count < $limit){
            $seeMore = 0;
        }
        $this->render('notifications', array("notifications"=>$notifications,"seeMore"=>$seeMore,"offSet"=>$limit,"date"=>$dataKey));
    }
    public function actionInnovationNotifications() {
        $this->pageTitle = 'VenturePact Admin | Innovation Notifications';
        $seeMore=1;
        $count = 0;
        $limit              =   30;
        $criteria           =   new CDbCriteria();
        $criteria->order    =   't.created DESC';  
        $criteria->limit    =    $limit;
        if(isset($_GET['view']) && $_GET['view'] == "manager") 
            $criteria->condition = "t.users_id = " . Yii::app()->user->id;
        else
            $criteria->condition = "t.users_id = 1";
        $logs           =   InInnovationLog::model()->findAll($criteria);
        $notifications  =   array();

        if(empty($logs)) {
            $this->redirect(array('/admin/default/index'));
        }
        
        foreach($logs as $log){
            $dataKey    =   date('d M',strtotime($log->created));
            $notifications[$dataKey][$log->id]['description']   =   $log->description;
            $notifications[$dataKey][$log->id]['created']      =   $log->created;
            $notifications[$dataKey][$log->id]['ischecked']    =   $log->ischecked;
            $notifications[$dataKey][$log->id]['for']           =   $log->users_id;
            $count++;
        }
        if($count < $limit){
            $seeMore = 0;
        }
        $this->render('innovationNotifications', array("notifications"=>$notifications,"seeMore"=>$seeMore,"offSet"=>$limit,"date"=>$dataKey));
    }

    
    public function actionAjaxNotifications() {
        $seeMore=1;
        $count = 0;
        $limit              =   30;
        $dataKey1="";$dataKey='';
        $criteria           =   new CDbCriteria();
        $criteria->order    =   't.add_date DESC';
        $criteria->offset   =    $_POST['offSet'];
        $criteria->limit    =    $limit;
        $criteria->condition = "t.for_user = 1";
        $logs           =   Log::model()->findAll($criteria);
        $notifications  =   array();
        foreach($logs as $log){
            if($_POST['date'] == date('d M',strtotime($log->add_date))){
                $dataKey1 =  date('d M',strtotime($log->add_date));
            }
            $dataKey    =   date('d M',strtotime($log->add_date));
            $notifications[$dataKey][$log->id]['description']   =   $log->description;
            $notifications[$dataKey][$log->id]['add_date']      =   $log->add_date;
            $notifications[$dataKey][$log->id]['is_prior_admin']=   $log->is_prior_admin;
            $notifications[$dataKey][$log->id]['is_checked']    =   $log->is_checked;
            $notifications[$dataKey][$log->id]['admin_seenby']  =   $log->admin_seenby;
            $notifications[$dataKey][$log->id]['for']           =   $log->for_user;
            $count++;
        }
        if($count < $limit){
            $seeMore = 0;
        }
        $this->renderPartial('_notifications', array("notifications"=>$notifications,"seeMore"=>$seeMore,"offSet"=>$_POST['offSet']+$limit,"date"=>$dataKey,'isDate'=>$dataKey1));
    }

    public function actionMarkSeenNotification() {
        if(isset($_POST['notification']) && isset($_POST['seen_by'])) {
            $notification = Log::model()->findByPk($_POST['notification']);
            if(!empty($notification)) {
                $notification->is_checked = 1;
                $notification->admin_seenby = $_POST['seen_by'];
                $notification->update();
                return 1;
            }
        }
    }

    
    public function actionMessages() {
        $this->pageTitle = "VenturePact Admin | Messages";
        $more = 1;
        $limit = 10;
        $start = 0;
        if(isset($_POST['start']) && !empty($_POST['start'])) {
            $start = intval($_POST['start']);
        }

        if(isset($_REQUEST['view']) && $_REQUEST['view'] == "manager") {
            $admin_condition = " AND cp.manager_id = " . Yii::app()->user->id; 
        } else $admin_condition = "";

        $queryMessageCount = "SELECT count( crt.id ) AS total
                                FROM(
                                    SELECT chat_room_id, max( id ) AS latest_msg
                                    FROM chat_messages
                                    GROUP BY chat_room_id
                                    ORDER BY latest_msg DESC
                                ) AS cr
                                LEFT JOIN chat_room AS crt ON crt.id = cr.chat_room_id
                                LEFT JOIN chat_room_has_users AS cru ON cru.chat_room_id = crt.id
                                LEFT JOIN users AS u ON u.id = cru.users_id
                                LEFT JOIN client_profiles AS cp ON cp.users_id = u.id
                                WHERE crt.room_type = 0
                                AND u.role_id <>1" . $admin_condition;
        $command = Yii::app()->db->createCommand($queryMessageCount);
        $roomsCount = $command->queryAll();
        if(!empty($roomsCount)) {
            $roomsCount = $roomsCount[0]['total'];
        } else $roomsCount = 0;

        $queryRooms = "SELECT cr.chat_room_id, cr.latest_msg, u.id AS user, cru.id AS chat_user, cp.manager_id AS manager
                                FROM (
                                    SELECT chat_room_id, max( id ) AS latest_msg
                                    FROM chat_messages
                                    GROUP BY chat_room_id
                                    ORDER BY latest_msg DESC
                                ) AS cr
                                LEFT JOIN chat_room AS crt ON crt.id = cr.chat_room_id
                                LEFT JOIN chat_room_has_users AS cru ON cru.chat_room_id = crt.id
                                LEFT JOIN users AS u ON u.id = cru.users_id
                                LEFT JOIN client_profiles AS cp ON cp.users_id = u.id
                                WHERE crt.room_type =0
                                AND u.role_id <>1" . $admin_condition . " LIMIT " . $start . ", " . $limit;
        $command = Yii::app()->db->createCommand($queryRooms);
        $rooms = $command->queryAll();

        $roomIds = array();
        foreach ($rooms as $room) {
            $roomIds[] = $room['chat_room_id'];
        }

        $criteria = new CDbCriteria;
        $criteria->select = "*";
        $criteria->addInCondition('t.id', $roomIds);
        $criteria->order = "FIELD(t.id, ".implode(',', $roomIds).")";
        $chatRooms = ChatRoom::model()->findAll($criteria);
        
        if($roomsCount <= $start + $limit) $more = 0;
        
        if(!Yii::app()->request->isAjaxRequest)
            $this->render('messages', array('rooms'=>$chatRooms, 'more'=>$more, 'offset'=>$start, 'limit'=>$limit));
        else
            $this->renderPartial('_messages', array('rooms'=>$chatRooms, 'more'=>$more, 'offset'=>$start, 'limit'=>$limit));
    }


    public function actionProjectMessagesTable() {
        $model=new ClientProjects('projectRoomSearch');
        $model->unsetAttributes();
        
        if( Yii::app()->request->isAjaxRequest && Yii::app()->user->getState('searchAttrsProjectRoom') ){
            foreach( explode(',',Yii::app()->user->getState('searchAttrsProjectRoom') ) as $val){
                $keyValue=explode('=',$val);
                $model->$keyValue[0]=$keyValue[1];
            }
        }
        if(isset($_GET['ClientProjects'])){
            $anArray = array();
            foreach($_GET['ClientProjects'] as $key=>$value){
                if(strpos($value,"[")==false){
                    $model->$key=$value;
                    $anArray[]=$key.'='.$value;
                }
            }
            Yii::app()->user->setState('searchAttrsProjectRoom',implode(',',$anArray));
            unset($_GET['ClientProjects']);
        }

        $this->render('projectMessagesTable', array(
            'model'=>$model,
        ));
    }

    public function actionManagerProjectMessagesTable() {
        $model=new ClientProjects('managerProjectRoomSearch');
        $model->unsetAttributes();
        
        if( Yii::app()->request->isAjaxRequest && Yii::app()->user->getState('searchAttrsProjectRoom') ){
            foreach( explode(',',Yii::app()->user->getState('searchAttrsProjectRoom') ) as $val){
                $keyValue=explode('=',$val);
                $model->$keyValue[0]=$keyValue[1];
            }
        }
        if(isset($_GET['ClientProjects'])){
            $anArray = array();
            foreach($_GET['ClientProjects'] as $key=>$value){
                if(strpos($value,"[")==false){
                    $model->$key=$value;
                    $anArray[]=$key.'='.$value;
                }
            }
            Yii::app()->user->setState('searchAttrsProjectRoom',implode(',',$anArray));
            unset($_GET['ClientProjects']);
        }

        $this->render('projectMessagesTable', array(
            'model'=>$model,
        ));
    }


    public function actionProjectMessages() {
        $this->pageTitle = "VenturePact Admin | Project Messages";
        $more = 1;
        $limit = 10;
        $start = 0;
        if(isset($_POST['start']) && !empty($_POST['start'])) {
            $start = intval($_POST['start']);
        }

        if(isset($_REQUEST['view']) && $_REQUEST['view'] == "manager") {
            $admin_condition = "and client_profiles.manager_id = " . Yii::app()->user->id; 
        } else $admin_condition = "";

        $criteria = new CDbCriteria;
        $criteria->select = "t.id";
        $criteria->join ='LEFT JOIN chat_messages cm ON cm.chat_room_id = t.id';
        $criteria->join .=' LEFT JOIN suppliers_projects ON suppliers_projects.chat_room_id = t.id';
        $criteria->join .=' LEFT JOIN client_projects ON client_projects.id = suppliers_projects.client_projects_id';
        $criteria->join .=' LEFT JOIN client_profiles ON client_profiles.id = client_projects.client_profiles_id';
        $criteria->group = "cm.chat_room_id having count(cm.id)>0";
        $criteria->order = "cm.add_date DESC";
        $criteria->distinct = true;
        $criteria->addCondition("t.room_type = 1 " . $admin_condition);
        // CVarDumper::dump($criteria, 10, 1); die;
        $chatRoomsCount = ChatRoom::model()->count($criteria);
        
        $criteria->select = "cm.*, t.*";
        $criteria->offset = $start;
        $criteria->limit = $limit;        
        $chatRooms = ChatRoom::model()->findAll($criteria);

        if($chatRoomsCount <= $start + $limit) $more = 0;
        
        if(!Yii::app()->request->isAjaxRequest)
            $this->render('projectMessages', array('rooms'=>$chatRooms, 'more'=>$more, 'offset'=>$start, 'limit'=>$limit));
        else
            $this->renderPartial('_projectMessages', array('rooms'=>$chatRooms, 'more'=>$more, 'offset'=>$start, 'limit'=>$limit));
    }

    public function actionProjectAbandon() {
        if(!isset($_GET['pid'])) {
            Yii::app()->user->setFlash('failureFlash', 'No project provided.');
            $this->redirect(array('/admin'));
        }

        // get project id
        $pid = trim($_GET['pid']);
        if(empty($pid)) {
            Yii::app()->user->setFlash('failureFlash', 'No project provided.');
            $this->redirect(array('/admin'));
        }

        // get client project
        $clientProject = ClientProjects::model()->findByPk($pid);
        if(empty($clientProject)) {
            Yii::app()->user->setFlash('failureFlash', 'No such project exists.');
            $this->redirect(array('/admin'));
        }

        // update status
        $clientProject->status = 0;
        $clientProject->is_abandon = 1;
        if($clientProject->update()){
            // archive all supplier projects
            SuppliersProjects::model()->updateAll(array( 'is_archived' => 1 ), 'client_projects_id='.$pid);
            Yii::app()->user->setFlash('successFlash', 'Project abandoned successful.');
            $this->redirect(array('/admin'));
        }
    }


    public function actionProjectDelete() {
        $pid = trim(Yii::app()->request->getParam('pid'));
        $action = trim(Yii::app()->request->getParam('action'));
        
        if(empty($pid) || empty($action)) {
            Yii::app()->user->setFlash('failureFlash', 'No project/action provided.');
            $this->redirect(array('/admin'));
        }

        $currentUser = Users::model()->findByPk(Yii::app()->user->id);
        if($currentUser->role_id == 1) {
            $project = ClientProjects::model()->findByPk($pid);
            if(!empty($project)){
                if($action == "1")
                    $project->is_deleted = 1;
                if($action == "2")
                    $project->is_deleted = 0;
                $project->update();
                $this->redirect(array('/admin'));
            }
        }

    }

    
    public function actionDeleteProjects() {
        $model=new ClientProjects('projectSearch');
        $model->unsetAttributes();  // clear any default values
        
        if( Yii::app()->request->isAjaxRequest && Yii::app()->user->getState('searchAttrsClientProjects') ){
            foreach( explode(',',Yii::app()->user->getState('searchAttrsClientProjects') ) as $val){
                $keyValue=explode('=',$val);
                $model->$keyValue[0]=$keyValue[1];
            }
        }
        if(isset($_GET['ClientProjects'])){
            $anArray = array();
            foreach($_GET['ClientProjects'] as $key=>$value){
                if(strpos($value,"[")==false){
                    $model->$key=$value;
                    $anArray[]=$key.'='.$value;
                }
            }
            Yii::app()->user->setState('searchAttrsClientProjects',implode(',',$anArray));
            unset($_GET['ClientProjects']);
        }

        $this->render('deleteProjects',array(
            'model'=>$model,
        ));
    }


    /**
     * Custom methods for cell value in CGridView 
     * @param $data and $row for which the method is called 
     */
    public function getRegion($data, $row)
    {
        if(empty($data->regions)) return "Not Provided";
        $reg['id'] = explode(',', $data->regions);
        $regions = Regions::model()->findAllByAttributes($reg);
        $value = "";
        foreach ($regions as $region) {
            $value .= $region->name . ", ";
        }
        return rtrim(trim($value), ",");
    }

    public function getTier($data, $row)
    {
        if(empty($data->tier)) return "Not Provided";
        $tr['id'] = explode(',', $data->tier);
        $tiers = PriceTier::model()->findAllByAttributes($tr);
        $value = "";
        foreach ($tiers as $tier) {
            $value .='<span class="label label-primary">'. ucwords(trim('$'.$tier->min_price.'-$'.$tier->max_price)) . " /hour</span><br/>";
        }
        return $value;
    }


    public function actionDeleteProjectData() {
        if(!isset($_GET['pid']) || empty($_GET['pid'])) {
            Yii::app()->user->setFlash('failureFlash', 'No data provided.');
            $this->redirect(array('/admin/default/deleteProjects'));
        }

        // get project
        $clientProject = ClientProjects::model()->findByPk($_GET['pid']);
        if(empty($clientProject)) {
            Yii::app()->user->setFlash('failureFlash', 'No such project exists.');
            $this->redirect(array('/admin/default/deleteProjects'));
        }

        $this->deleteChatDataForClientProject($clientProject);
        $this->deletePitchesData($clientProject);
        $this->deleteSupplierProjectsData($clientProject);

        $clientProject->delete();

        Yii::app()->user->setFlash('successFlash', 'Project and related data are deleted successfully.');
        $this->redirect(array('/admin/default/deleteProjects'));
    }


    /**
    *
    * Private methods starts here.
    *
    **/
    

    /* Delete chat related data for a given client project */ 
    private function deleteChatDataForClientProject($project) {
        $chatMessages = array();
        foreach ($project->suppliersProjects as $sp) {
            $chatRooms[] = $sp->chat_room_id;

            // get chat messages
            foreach ($sp->chatRoom->chatMessages as $cm) {
                $chatMessages[] = $cm->id;
            }
        }

        // delete all related chat seen by
        $criteria = new CDbCriteria;
        if(!empty($chatMessages)) {
            $criteria->addInCondition('chat_messages_id', $chatMessages);
            ChatSeenBy::model()->deleteAll($criteria);
        }
        // CVarDumper::dump($criteria, 10, 1);

        // delete all chat messages
        unset($criteria);
        $criteria = new CDbCriteria;
        if(!empty($chatRooms)) {
            $criteria->addInCondition('chat_room_id', $chatRooms);
            ChatMessages::model()->deleteAll($criteria);
        }
        // CVarDumper::dump($criteria, 10, 1);

        // delete all chat room users
        unset($criteria);
        $criteria = new CDbCriteria;
        if(!empty($chatRooms)) {
            $criteria->addInCondition('chat_room_id', $chatRooms);
            ChatRoomHasUsers::model()->deleteAll($criteria);
        }
        // CVarDumper::dump($criteria, 10, 1);

    }


    /* Delete Milestone and Pitches data related to a client project */
    private function deletePitchesData($project) {
        $pitches = array();
        $milestones = array();
        foreach ($project->suppliersProjects as $sp) {
            foreach($sp->proposalPitches as $pp) {
                $pitches[] = $pp->id;
                foreach ($pp->pitchHasMilestones as $phm) {
                    $milestones[] = $phm->id;
                }
            }
        }

        // delete all milestone order status
        $criteria = new CDbCriteria;
        if(!empty($milestones)) {
            $criteria->addInCondition('supplier_milestones_id', $milestones);
            MilestonesHasOrderStatus::model()->deleteAll($criteria);
        }  

        // delete all milestones
        unset($criteria);
        $criteria = new CDbCriteria;
        if(!empty($milestones)) {
            $criteria->addInCondition('id', $milestones);
            PitchHasMilestones::model()->deleteAll($criteria);
        }

        // delete all pitches
        unset($criteria);
        $criteria = new CDbCriteria;
        if(!empty($pitches)) {
            $criteria->addInCondition('id', $pitches);
            ProposalPitches::model()->deleteAll($criteria);
        }
    }

    
    /* Delete Supplier Projects data related to client projects */
    public function deleteSupplierProjectsData($project) {
        $supplierProjects = array();
        $chatRooms = array();
        foreach ($project->suppliersProjects as $sp) {
            $supplierProjects[] = $sp->id;
            $chatRooms[] = $sp->chat_room_id;
        }

        // delete all decline responses
        $criteria = new CDbCriteria;
        if(!empty($supplierProjects)) {
            $criteria->addInCondition('suppliers_projects_id', $supplierProjects);
            DeclineResponse::model()->deleteAll($criteria);
        }

        // delete supplier projects
        unset($criteria);
        $criteria = new CDbCriteria;
        if(!empty($supplierProjects)) {
            $criteria->addInCondition('id', $supplierProjects);
            SuppliersProjects::model()->deleteAll($criteria);
        }

        // delete all chat rooms
        unset($criteria);
        $criteria = new CDbCriteria;
        if(!empty($chatRooms)) {
            $criteria->addInCondition('id', $chatRooms);
            ChatRoom::model()->deleteAll($criteria);
        }
        // CVarDumper::dump($criteria, 10, 1);
    }



    public function actionUpLoadClientDocs()
    {

        $id=Yii::app()->request->getPost('id');
        $data1=Yii::app()->request->getPost('data');
        $action=Yii::app()->request->getPost('action');
        
        if(!empty($action) && $action=="delete"){     
         
            $docs   =   ClientProjectDocuments::model()->findByPk($id);
            $docs->delete();
            echo '1';
        }
        elseif(!empty($data1)){
            $data   =   json_decode($data1);
            $listIds    =   array();
            foreach($data as $item){
                $val    =   (array)$item;
                $docs                       =   new ClientProjectDocuments;
                $docs->client_projects_id   =   $id;
                $docs->path                 =   $val['url'];
                $docs->type                 =   $val['mimetype'];
                $docs->name                 =   $val['filename'];
                $docs->size                 =   $val['size'];
                $docs->status               =   1;
                $docs->ref_type             =   2;
                $docs->add_date             =   date('Y-m-d');
                if($docs->save()){
                    echo '<div class="ref-files pl0" id="ref-'.$docs->id.'" ><a href="'.$docs->path.'" target="_blank" class="label label-primary fn12">'.$docs->name.'</a><div class="pull-right ref-file-show"><a href="javascript:void(0);" id="delRef-'.$docs->id.'" data-id="'.$docs->id.'" onClick="deleteDocs($(this))"title="Delete"><span aria-hidden="true" class="icon-trash orange-new mr5">Delete</span></a></div></div>';
                }
            }
        }
        die;
    }


    public function actionEnterpriseApproved() {
        $pid = trim(Yii::app()->request->getParam('pid'));
        $action = trim(Yii::app()->request->getParam('action'));
        //CVarDumper::dump($action,10,1);die;
        if(empty($pid) || empty($action)) {
            Yii::app()->user->setFlash('failureFlash', 'No enterprise/action provided.');
            $this->redirect(array('/admin'));
        }

        $currentUser = Users::model()->findByPk(Yii::app()->user->id);
        if($currentUser->role_id == 1) {
            $enterprise = InUsersHasEnterprise::model()->findByPk($pid);
            if(!empty($enterprise)){
                if($action == "1"){
                    $enterprise->status = 1;
                }
                if($action == "2"){
                    $enterprise->status= 2;
                    $data['email']=$enterprise->users->username;
                    $data['name']=$enterprise->users->first_name;
                    $data['domain_name']=$enterprise->sub_domain;
                    $this->sendMail($data,'in_enterprise_approved_by_admin');
                }
                $enterprise->update();
                $this->redirect(array('/admin/InUsersHasEnterprise/admin'));
            }
        }

    }
}
