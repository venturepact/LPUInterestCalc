<?php 
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public $stripText = "Never miss an email from VenturePact. Click the priority icon in your inbox.";
    public $res = array("avtar"=>"https://www.filepicker.io/api/file/N8YTR3bkTKn78aD5f9f5");
    
	/*
	* Method to return the desired reply to Email address 
	*/
	protected function getReplyToAddress($param)
	{
		if(!empty($param)){
            $chatroomhasuser = ChatRoomHasUsers::model()->findByPk($param[1]);
            if(empty($chatroomhasuser->hash)){
                $chatroomhasuser->hash= md5($chatroomhasuser->id);
                $chatroomhasuser->save();
            }
            return 'replyto-'.($chatroomhasuser->hash).'@'.Yii::app()->params['replyDomain'];
			//return 'replyto-'.base64_encode(implode(',',$param)).'@'.Yii::app()->params['replyDomain'];
		}
		return Yii::app()->params['adminEmail'];

	}
    
    /*
    * Method to get amount with comma 
    */

    protected function sluggify($url) {
        // basic normalization
        $url = strtolower($url);
        $url = strip_tags($url);
        $url = stripslashes($url);
        $url = html_entity_decode($url);

        // remove quotes
        $url = str_replace('\'', '', $url);

        // replace non-alpha numeric with -
        $match = '/[^a-z0-9]+/';
        $replace = '-';
        $url = preg_replace($match, $replace, $url);

        $url = trim($url, '-');

        return $url;
    }
    
	protected function getAmountWithComma($amount)
	{
		return number_format($amount, 0, '.', ',');
	}

	public function mailLog($subject,$to,$templete,$body)
	{	
		$mailLog	=	 new EmailLogs;
		$mailLog->esubject	=	$subject;
		$mailLog->reciver	=	$to;
		$mailLog->user_id	=	isset(Yii::app()->user->id)?Yii::app()->user->id:'00';
		$mailLog->templete	=	$templete;
		$mailLog->body		=	$body;
		$mailLog->time		=	date('Y-m-d H:i:s');
		if($mailLog->save())
		  return 1;
		else
		  return 0;
	}


	/* Code API - Tarun Gupta
	* Date - 30-07-2014
	* $ip parameter should be a valid IP address else it will take the current ip addr from $SERVER
	* call in any controller like parent::getLocationByIp("115.249.130.53") or parent::getLocationByIp()
	*
	**/
	public function getLocationByIp($ip=null)
	{
		// finding Location (Country, City) on the basis of user ip

		//set current location if $ip is null
		if(empty($ip))
			$ip = $this->getUserIp();

		// create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "ipinfo.io/".$ip);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

		$output = json_decode($output);
		//CVarDumper::dump($output,10,1);
		//echo $output->city;die;
		if(!empty($output->city)){
			$city = Cities::model()->findByAttributes(array("name"=>$output->city));
		}else{
			//return default cities id 'New York'
			$city = Cities::model()->findByAttributes(array("id"=>134717));
		}
		CVarDumper::dump($city,10,1);
		return $city;
	}

	private function getUserIp()
	{

		//return CHttpRequest::getUserHostAddress();
		return $_SERVER['REMOTE_ADDR'];
	}
    
    
     function milestoneStatusarray()
     {
        $milestoneStatus = array(
							'0'=>array(
								'client'=>'No funding request received',
								'supplier'=>'Funding request not sent'),
                            '1'=>array(
								'client'=>'Funding requested',
								'supplier'=>'Funding request sent'),
							'2'=>array(
								'client'=>'Milestone funded',
								'supplier'=>'Milestone funded'),
							'3'=>array(
								'client'=>'Release requested',
								'supplier'=>'Release requested'),
							'4'=>array(
								'client'=>'Payment made',
								'supplier'=>'Payment received'),
                            '5'=>array(
								'client'=>'Funding Rescinded',
								'supplier'=>'Funding Rescinded'),
                            '6'=>array(
								'client'=>'Payment cancelled',
								'supplier'=>'Payment denied'),
                            '7'=>array(
								'client'=>'Funding Rescinded',
								'supplier'=>'Funding Rescinded'),
                            '8'=>array(
								'client'=>'Pending',
								'supplier'=>'Pending'),
                            '9'=>array(
								'client'=>'Release Requested',
								'supplier'=>'Pending')         							
							);     
        return $milestoneStatus;                           
     }
     
     function milestoneStatusarraywithoutescrow()
     {
        $milestoneStatus = array(
							'0'=>array(
								'client'=>'No Payment request recieved',
								'supplier'=>'Payment not requested'),
                            '1'=>array(
								'client'=>'',
								'supplier'=>''),
							'2'=>array(
								'client'=>'',
								'supplier'=>''),
							'3'=>array(
								'client'=>'Payment requested',
								'supplier'=>'Payment requested'),
							'4'=>array(
								'client'=>'Payment made',
								'supplier'=>'Payment recieved'),
                            '5'=>array(
								'client'=>'',
								'supplier'=>''),
                            '6'=>array(
								'client'=>'Payment denied',
								'supplier'=>'Payment denied'),
                            '7'=>array(
								'client'=>'',
								'supplier'=>''),
                            '8'=>array(
								'client'=>'Pending',
								'supplier'=>'Pending')    							
							);     
        return $milestoneStatus;                           
    }
     
     
    public function actionMilestonesstatus($milestone_id,$old,$new,$note)
    {
        $status_model = new MilestoneHasOrderStatus;
        $status_model->supplier_milestones_id = $milestone_id; 
        $status_model->old_status = $old;
        $status_model->new_status = $new;
        $status_model->date = date("Y-m-d H:m:s", strtotime("+14 days"));
        $status_model->note = $note;
        if($status_model->save())
        {
            echo "1";    
        } 
    }
    

    function fetch_data_for_email($id)
    {
        $supplier_project_proposal = SuppliersProjectsProposals::model()->findAllByAttributes(array('id'=>$id));
        
        $client_name    = $supplier_project_proposal[0]->clientProjects->clientProfiles->users->display_name;
        $client_email   = $supplier_project_proposal[0]->clientProjects->clientProfiles->users->username;
        $supplier_name  = $supplier_project_proposal[0]->suppliers->first_name." ".$supplier_project_proposal[0]->suppliers->last_name;
        $supplier_email = $supplier_project_proposal[0]->suppliers->email;
        $project_name   = $supplier_project_proposal[0]->clientProjects->name;
        
        $array = array("supplier_name"=>$supplier_name,"supplier_email"=>$supplier_email,"client_name"=>$client_name,"client_email"=>$client_email,"project_name"=>$project_name);
      
        return $array;
    }


    /**
    *
    * Method to autologin user if linkedin cookie exists
    * 
    * @return boolean $result was the process successful or not
    *
    **/
    protected function cookieLoginLinkedIn() {
        // if not logged in - check if linkedin cookie exist and login
        if(empty(Yii::app()->user->id)) {
            if(isset($_COOKIE['linkedin'])) {
                $linkedin_cookie = base64_decode($_COOKIE['linkedin']);
                $user = Users::model()->findByAttributes(array('username'=>$linkedin_cookie));
                if(!empty($user)) {
                    $login              =   new LoginForm;
                    $login->username    =   $user->username;
                    $login->password    =   $user->password;
                    $login->login();

                    // update cookie time again
                    setcookie('linkedin', base64_encode($user->username), time() + (7*24*60*60), '/');
                }
            }
        }
        // return true;
    }


    /**
    *
    * Method to add chat messages in various scenarios
    * in project chat.
    * 
    * @param integer $template_id specify the template to be used for this message
    * @param integer $chat_room_id the chat room this message belongs to
    * @param array $data additional data to include in message template
    * 
    * @return boolean $result was the process successful or not
    *
    **/

    protected function insertChatMessage($template_id, $chat_room_id, array $data, $user_id = null, $flag = null) {
        // make sure we get a numeric value
        if(is_nan($template_id) || is_nan($chat_room_id)) return false;

        // set up current time
        $data['add_date'] = date('Y-m-d H:i:s');

        // get templified message
        $message = $this->setChatTemplate($template_id, $data);
        if(!$message) return false;

        if(is_null($user_id)) $user_id = Yii::app()->user->parentId;

        // get user from chat room
        $chatUser = ChatRoomHasUsers::model()
                        ->findByAttributes(
                            array(
                                'chat_room_id'=>$chat_room_id,
                                'users_id'=>$user_id,
                            )
                        );
        if(empty($chatUser)) return false;

        // set data into chat messages
        $chatMessage = new ChatMessages;
        $chatMessage->chat_template_id = $template_id;
        $chatMessage->chat_message_has_user_id = $chatUser->id;
        $chatMessage->message = $message;
        $chatMessage->chat_room_id = $chat_room_id;
        $chatMessage->flag = $flag;

        if($template_id == 7) {
            $chatMessage->type = 7;
            if(isset($data['milestone_id'])) {
                $chatMessage->proposal_id = $data['milestone_id'];
            }
        }

        // save message
        if($chatMessage->save()) return true;
        else return false;
    }

    
    /**
    *
    * Method to integrate message and other information
    * into chat template.
    * 
    * @param integer $template_id specifies the template to be used for this message
    * @param array $data the chat room this message belongs to
    * 
    * @return boolean $result the process was not successful
    * @return text $message the templified message
    *
    **/

    private function setChatTemplate($template_id, array $data) {
        // find template
        $templateObject = ChatTemplate::model()->findByPk($template_id);
        if(empty($templateObject)) return false;

        // get all placeholders to fill in
        $placeholders = explode(',', $templateObject->placeholders);
        $message = $templateObject->template;

        // CVarDumper::dump($placeholders,10,1);die;
        // apply data to template
        foreach ($placeholders as $placeholder) {
            $placeholder = trim($placeholder);
            if(!empty($placeholder)) {
                $keyword = trim($placeholder, '{}');
                $message = preg_replace('{' . $placeholder . '}', $data[$keyword], $message);
            }
        }

        // return the message
        return $message;
    }


    /**
    *
    * Method to check if a project can be marked as completed
    * in widget chat.
    * 
    * @param integer $project_id specifies the supplier's project id
    * 
    * @return boolean $result if project can be marked complete
    *
    **/
    protected function canMarkComplete($pid) {
        // check if project can be completed
        $pitch = ProposalPitches::model()->findByAttributes(
            array(
                'suppliers_projects_id'=>$pid,
                'status'=>3
            )
        );
        if(empty($pitch)) return false;

        $project_complete = false;
        $one_milestone_complete = false;
        foreach ($pitch->pitchHasMilestones as $milestone) {
            if($milestone->status >= 6) {
                $one_milestone_complete = true;
            }
            else if($milestone->status < 4) {
                $project_complete = true;
            }
            else if($milestone->status >= 4) {
                $project_complete = false;
                break;
            }
        }

        if($project_complete && $one_milestone_complete) {
            return true;
        } else return false;
    }


    /**
    *
    * Method to set/unset search data in sessions
    * 
    * @param array $data specifies the data to be set in sessions
    * @param string $operation the operation to perform set/unset
    * 
    **/

    protected function setSearchTerms(array $data, $operation) {
        // continue work later if required        
    }


    /**
    *
    * Method to return due date text - Tarun 
    * 
    * @param string $date specifies the date
    *
    * @return string $response the due date from current date
    * 
    **/

    protected function getDueDatePayment($date)
    {
        
        $response= array();
        if (!empty($date)) { 
            $after7days = strtotime(date('Y-m-d', strtotime($date. ' + 8 days')));                                
            $now = time();                          
            $datediff = $after7days - $now;
            $days =  floor($datediff/(60*60*24));
            $daysabs = abs($days);
            $response['days'] = $days;
            $response['due_date'] = date('Y-m-d', strtotime($date. ' + 7 days')) ;
            $response['color'] = $days>=0? 'color:green;' :'color:red;';
            $response['absdays'] = $daysabs;
            $response['txt'] = $days>0?"Payment due in $daysabs days":($days==0?"Payment due today":"Payment was due $daysabs days ago");             
        }
        else{
            $response['days'] = 0;
        }           
        return $response;
    }

    /**
    *
    * Method to save notifications to Logs
    *
    * @param integer $for the user for which the notification is
    * @param integer $project_id the project for which the notification is
    * @param object $log
    *
    **/
    
    protected function logSaveAccountManager($for, $project_id, $log) {
        // if notification is meant for admin - send to account manager as well
        if($for == 1) {
            // get project
            $project = ClientProjects::model()->findByPk($project_id);
            if(!empty($project)) {
                $amLog = new Log;
                $amLog->attributes = $log->attributes;
                $amLog->for_user  = $project->clientProfiles->manager_id;
                $log->is_prior_admin = 0;
                $amLog->save();

                // make admin log important as well
                $log->is_prior_admin = 1;
                $log->update();
            }
        }
        /*
        // handle child users later
        else {
            // send the notification to other users associated with this user
            $forUser = Users::model()->findByPk($for);
            $parentUser = $forUser;
            if($forUser->role_id == 4 || $forUser->role_id == 5) {
                $teamUser = Team::model()->findByAttributes(array('users_id'=>$forUser->id));
                $parentUser = Users::model()->findByPk($teamUser->add_by);

                // notify parent as well
                $pLog = new Log;
                $pLog->attributes = $log->attributes;
                $pLog->for_user  = $parentUser->id;
                $pLog->save();
                // CVarDumper::dump($pLog, 10, 1);
            }

            $childUsers = Team::model()->findAllByAttributes(array('add_by'=>$parentUser->id));
            if(!empty($childUsers)) {
                foreach ($childUsers as $childUser) {
                    // for every child user add a notification in log - excluding the main
                    if($childUser->users_id != $for) {
                        $cLog = new Log;
                        $cLog->attributes = $log->attributes;
                        $cLog->for_user  = $childUser->users_id;
                        $cLog->save();
                        // CVarDumper::dump($cLog, 10, 1);
                    }
                } // end: childUser foreach
            }

        } // end: admin/user condition
        */
    }

    /**
    *
    * Method to admin update Logs
    *
    * @param integer $userid the user for which the notification is
    * @param integer $username users usernsme
    * @param varchar $description
    *
    **/
    public function updateLog($userid,$username,$description,$controller,$action)
    {   
     
        $updateLog             =     new UpdateLogs;
        $updateLog->user_id    =    $userid;
        $updateLog->username   =    $username;
        $updateLog->controller =    $controller;
        $updateLog->action     =    $action;
        $updateLog->description=    $description;
        $updateLog->user_ip    =    $_SERVER['REMOTE_ADDR'];
        $updateLog->updated_by =    Yii::app()->user->id;
        $updateLog->save();
         
    }

    public function getdescriptionforupdatelogs($model,$old_model)
    {
        $description='';
        $keydesc='';
        $valuedesc='';
      foreach($model as $key=>$value)
                {
                    if($value!=$old_model[$key])
                    {
                       $keydesc.= $key.' = '.$old_model[$key]."<br/>";
                       $valuedesc.=$key.' = '.$value."<br>";
                    }
                }  
         $description='Old record<br> '. $keydesc.'<hr>New record<br> '.$valuedesc;
         return  $description; 
    } 

    /**
    *
    * Method to return dev relation user for suppliers
    *
    * @return User $user the user object of dev relation
    *
    **/
    protected function getDevRelationUser($returnParam = 'id') {

        // dev relation username and backup
        $dev_relation_username = "dharak.desai@venturepact.com";
        $backup_username       = "randy@venturepact.com";

        $user = Users::model()->findByAttributes(array('username'=>$dev_relation_username));

        if(empty($user)) {
            $user = Users::model()->findByAttributes(array('username'=>$backup_username));
        }
        
        // if requested for object return user
        if($returnParam == "object") return $user;

        if(!property_exists($user, $returnParam)) {
            return $user->$returnParam;
        }
    }

    /**
    *
    * Method to add SMS API to application
    *
    **/
    protected function sendMsg($case,$data)
    {
        require_once(__DIR__ . "/../controllers/twilio-php/Services/Twilio.php");
        $sid = "AC9bbce9d64e916e9eda775d01349e6711"; // Your Account SID from www.twilio.com/user/account
        $token = "0ff36c51e48f25ac577714c57971a053"; // Your Auth Token from www.twilio.com/user/account

        $client = new Services_Twilio($sid, $token);
        $message = $client->account->messages->sendMessage(
          '+12513339679', // From a valid Twilio number
          $data['to'], // Text this number
          $data['msg']
        );

        return $message->sid;

    }

    protected function base64url_encode($data) { 
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    }

    protected function base64url_decode($data) { 
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    } 
}
