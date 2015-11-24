<?php
class SiteController extends Controller
{
	/*** Declares class-based actions.**/
	public $layout='site';
    public $res = array("avtar"=>"https://www.filepicker.io/api/file/N8YTR3bkTKn78aD5f9f5");
	
	public function filters(){
		return array(
			'SetCookieSession', // to check if cookie exist and set session
			'accessControl',
			'postOnly + delete',
		);
	}

	public function filterSetCookieSession($filterChain) {
		$this->cookieLoginLinkedIn();
		$filterChain->run();
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

			array('allow','actions'=>array('index','login','Error','AdminLink','Logout'),'users'=>array('*')),
            array('deny', 'users'=>array('*'),'deniedCallback' => function() { Yii::app()->controller->redirect(array ('/site/index','login'=>'1')); }),
		);
    }

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }

        return true;
    }
	


	public function actionIndex()
	{
		$this->layout		=	'newPublic';
		$model				=	new LoginForm;
		$forgot				=	new ForgotpasswordForm;
		if(Yii::app()->user->hasState('remail')){
			$users   =   Users::model()->find(array('condition'=>'username=:email','params'=>array(':email'=>Yii::app()->user->remail) ));
		}
		if(empty($users))
			$users	=	new Users;
		$this->pageTitle	=	'Premium Engineering Teams, On Demand';
		Yii::app()->clientScript->registerMetaTag("Find and engage with vetted web and mobile programmers and teams. Use secure escrow payments & intelligent collaboration tools to maximize success.", 'description');
		Yii::app()->clientScript->registerMetaTag("software, outsource, outsourcing, hiring, developers, development, venturepact, web design, web development, mobile development, php developers, iOS developers", 'keywords');
		$this->render('newIndex',array('model'=>$model,'forgot'=>$forgot,'users'=>$users));
	
	}



	public function actionLogin()
	{
		if(isset(Yii::app()->user->role))
			$this->redirect(array('/'.Yii::app()->user->role));
		$model	=	new LoginForm;
		$forgot	=	new ForgotpasswordForm;
		if(isset($_POST['LoginForm']))
		{
			$response 			= array();
			$model->attributes 	= $_POST['LoginForm'];
			$model->password	= base64_encode($model->password);
			if($model->validate() && $model->loginStatus() && $model->login()){
				$userd				=	Users::model()->findByPk(Yii::app()->user->id);
				$userd->last_login	=	date('Y-m-d H:i:s');
				$userd->save();
				//based on roles
				if(isset(Yii::app()->user->role)){
					$response['success'] = '1';
					$response['url']     = Yii::app()->createUrl('/'.Yii::app()->user->role);
					echo json_encode($response);
					die;
				}else{
					$this->redirect(array('/site/login'));
				}
			}else{
                $response['success'] = $model->errors['password'][0];
            	echo json_encode($response);
                die;
			}
		}
		else
			$this->redirect(array('site/index','login'=>'1'));
			//$this->render('login',array('model'=>$model,'forgot'=>$forgot));

	}

	public function actionError()
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

	public function actionAdminLink($link,$log)
	{
		if(isset($link)){
			$email	=	base64_decode($link);
			$log	=	base64_decode($log);
		}
		$record_exists = Users::model()->find('username = :email AND password = :pass AND link_status = :status', array(':email'=>$email,':pass'=>$log,':status'=>1));
		if(!empty($record_exists)){
			$record_exists->link_status	=	0;
			$record_exists->save();
			$model     			=	new LoginForm;
			$model->username	=	$email;
			$model->password	=	$log;
			if($model->validate()&&$model->login()){
				$this->redirect(Yii::app()->createUrl('/'.$record_exists->roles->name));
			}
		}
		else{
			Yii::app()->user->setFlash('success','Your email address has no account with us.Please Register to get one.');
		}
		$this->redirect(Yii::app()->createUrl('/site/login'));
	}


	public function actionLogout()
	{
		// destroy linkedin cookie
		setcookie('linkedin', Yii::app()->user->email, time() - 1, '/');
		
		session_unset();
		session_destroy();
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
?>