<?php
class CostCalculatorController extends Controller
{
	/*** Declares class-based actions.**/
	public $layout='site';
    public $res = array("avtar"=>"https://www.filepicker.io/api/file/N8YTR3bkTKn78aD5f9f5");
	
	public function filters(){
		return array(
			'accessControl',
			'postOnly + delete',
		);
	}
	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
 	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('*'),
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->layout		=	'false';
		$model				=	new LoginForm;
		$forgot				=	new ForgotpasswordForm;
		$categories			= 	CalculatorCategory::model()->findAll();
		//CVarDumper::dump($categories,10,1);die;

		if(Yii::app()->user->hasState('remail')){
			$users   =   Users::model()->find(array('condition'=>'username=:email','params'=>array(':email'=>Yii::app()->user->remail) ));
		}
		if(empty($users))
			$users	=	new Users;
		$this->pageTitle	=	'Premium Engineering Teams, On Demand';
		Yii::app()->clientScript->registerMetaTag("Find and engage with vetted web and mobile programmers and teams. Use secure escrow payments & intelligent collaboration tools to maximize success.", 'description');
		Yii::app()->clientScript->registerMetaTag("software, outsource, outsourcing, hiring, developers, development, venturepact, web design, web development, mobile development, php developers, iOS developers", 'keywords');
		$this->render('index',array('model'=>$model,'forgot'=>$forgot,'users'=>$users,'categories'=>$categories));
	}

	public function actionComputeResults(){
		
		$categories			= 	CalculatorCategory::model()->findAll('is_Deleted = 0');
		$branches 			=	CalculatorBranches::model()->findAll('status = 1');
		$netWeight 			=	array();
		foreach($branches as $branch){
			$netWeight[$branch->id] = 0;
		}
		 // CVarDumper::dump($_POST,10,1);
		 $questions = array();
		 foreach ($_POST['option'] as $key => $question ) {
		 	
		 	$questions[$key] = $question[0]; 
		 }

		$calculatorOptionsWeightage = CalculatorOptionsWeightage::model()->findAllByAttributes(array('calculator_options_id'=>$questions));
		$weightage =array();
		foreach ($calculatorOptionsWeightage as $key => $w) {
			// echo $w->id.',';
			$branch = $w->calculatorBranches->name;
			$weightage[$branch][] = $w->weightage;
			
		}
		// CVarDumper::dump($weightage,10,1);die;
		$calresult  = array();
		foreach ($weightage as $key => $branch) {
			$calresult[$key] = array_sum($branch);
		}
		
		
		foreach ($categories as $category) { 
			foreach($category->calculatorQuestions as $question){
	   			if(isset($_POST['option'][$question->id][0])) {
	   				$optionId =  $_POST['option'][$question->id][0];
	   				$weights = CalculatorOptionsWeightage::model()->findAll(array('condition'=>'t.calculator_options_id = :id AND t.status <>0',
																			 'params'=>array(':id'=>$optionId),
																			 'order'=>'t.calculator_branches_id'));
	   				// CVarDumper::dump($weights,10,1);die;
	   				foreach($weights as $weight){
	   					$netWeight[$weight->calculator_branches_id] = $netWeight[$weight->calculator_branches_id] + $weight->weightage;	  
	   				}
	   			}
   			}
   		}

   		uasort($netWeight, 'CalculatorOptionsWeightage::sortWeights');
   		reset($netWeight);
   		$response['netWeight'] = $netWeight;
		$first_key = key($netWeight);
  //  		echo $first_key;die;
		// CVarDumper::dump($netWeight,10,1);die;
   		

		if(isset($_POST['contact_email']))
			$email = $_POST['contact_email'];
		if(isset(Yii::app()->user->parentId)){
			$user  = Users::model()->findByPk(Yii::app()->user->parentId);
		}
		else{
			$user = $this->createNewUser($email);
			$user->phone_number =isset($_POST['contact_phone'])?$_POST['contact_phone']:NULL;
			$user->update();

		}

		$calculatorUser = new CalculatorUsers;
		$calculatorUser->username = $user->username;
		$calculatorUser->hash_val=base64_encode($calculatorUser->username);
		$calculatorUser->is_user_lpu=1;
		if(!empty($user->phone_number))
			$calculatorUser->phone_number = $user->phone_number;
		$calculatorUser->created = date('Y-m-d H:i:s');
		$calculatorUser->modified = date('Y-m-d H:i:s');
		if(!$calculatorUser->save()){
			$response['message'] = "user not saved for calculator";
			$response['success'] = false;
			echo json_encode($response);
			die;
		}

		foreach ($questions as $option) {
			
		
		$result = new CalculatorBranchResult;
		$result->users_id = $user->id;
		$result->calculator_branches_id = $first_key;
		$result->created = date('Y-m-d H:i:s');
		$result->modified = date('Y-m-d H:i:s');
		$result->calculator_option_id=$option;
		$result->save();
		}
		if($result->save()){
			$response['message'] = "You are most suited for ".$result->calculatorBranches->name;
			$response['success'] = true;
			$response['weight'] = json_encode($calresult);
		}
		else{
			$response['message'] = "Result not calculated";
			$response['success'] = false;
			$response['weight'] = "";
		}

		echo json_encode($response);
		die;

		// echo $result->calculatorBranches->name;
		// CVarDumper::dump($calculatorUser,10,1);
		// CVarDumper::dump($result,10,1);die;

	}


	protected function createNewUser($email,$name = null){
    	$user		 =	Users::model()->findByAttributes(array('username'=>$email));

    	if(empty($user)){
    		$arr = explode("@", $email, 2);
    		$user				=	new Users;
    		if($name != null)
    			$user->first_name   =   $name;
    		else	
    			$user->first_name   =   $arr[0];
			$user->password		=	base64_encode("pratham123");
			$user->username	 	=	$email;
			$user->status		=	1;
			$user->role_id		=	2;
			$user->display_name	=	$user->first_name.time();
			$user->add_date		=	date('Y-m-d H:i:s');
			$user->promo_code   = 	"VP".time();

			if($user->save())
			{
				$user->promo_code   = 	"VP".strtoupper($user->first_name).$user->id;
				$user->update();

				/*creating new client*/
    			$this->createNewClient($user);
    			return $user;
			}else
				CVarDumper::dump($user,10,1);
    	}

	}

	protected function createNewClient($user)
    {
    	$profile	                =	new ClientProfiles;
		$profile->users_id		    =	$user->id;
		$profile->status			=	1;
		$profile->add_date		    =	date('Y-m-d H:i:s');
		$profile->manager_id 		=	1;
		if($profile->save()) return 1;
		else return 0;
    }
/*	public function actionError()
	{
        $this->layout		=	'publicProject';
		$error=Yii::app()->errorHandler->error;
		$errMsg	='Property "CWebUser.role" is not defined.';
		$this->pageTitle	=	'Error - VenturePact';

		if($_SERVER['HTTP_HOST'] != "venturepact.com"){		
			CVarDumper::dump($error,10,1);die;
		}
		if($error)
		{
			$errorModel							= 		new ErrorLogs;
			$errorModel->user_type 				=		isset(Yii::app()->user->role)?Yii::app()->user->role:'Guest';
			$errorModel->user_id				=		isset(Yii::app()->user->id)?Yii::app()->user->id:'000';
			$errorModel->user_name				=		Yii::app()->user->name ;
			$errorModel->error_code				=		isset($error['code'])?$error['code']:'0000';
			$errorModel->message				=		isset($error['message'])?$error['message']:'Not Available';
			$errorModel->request_url			=		$_SERVER['REQUEST_URI'];
			$errorModel->query_string			= 		isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'Not Available';
			$errorModel->file_name				=		isset($error['file'])?$error['file']:'Not Available';
			$errorModel->line_number			=		isset($error['line'])?$error['line']:'Not Available';;
			$errorModel->error_type				=		isset($error['type'])?$error['type']:'Not Available';
			$errorModel->time					=		date('Y-m-d H:i:s');
			$errorModel->reference_url			=		isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'Direct from Broswer';
			$errorModel->ipaddress				=		isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'NA';
			$errorModel->browser				=		($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'Unknown';
			if($errMsg	!=	$errorModel->message){
				if($errorModel->save()){
				}
	  		    //Yii::app()->user->logout();
			}else
    		{
    			//Yii::app()->user->logout();
    		}
		}

		if($error['code']=='500')
			$this->render('error');
		else
			$this->render('error404');
	}
*/
	
    
	public function actionGetNotification()
	{
        $this->renderPartial('ajaxNotification');
    }
}
?>