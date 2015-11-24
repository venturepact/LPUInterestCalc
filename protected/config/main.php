<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'VenturePact',

	//timezone
	'timeZone'=>'UTC',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.LinkedIn.*',
		'ext.SendGridExt.*',
		'ext.ServicesFirebaseTokenGenerator.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'satnam',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
			// 'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '115.249.130.57'] // adjust this to your needs
		),
		
	),

	// application components
	'components'=>array(
		'imagemod' => array(
			 //alias to dir, where you unpacked extension
			'class' => 'application.extensions.imagemodifier.CImageModifier',
		),
		'user'=>array(
			// enable cookie-based authentication
		    'loginUrl'=>array('site/index','login'=>'1'),        
			'allowAutoLogin'=>true,
		),
		'Smtpmail'=>array(
            'class'=>'application.extensions.smtpmail.PHPMailer',
            'Host'=>"smtp.gmail.com",
            'Username'=>'questions@venturepact.com',
            'Password'=>'question@vp@)!$',
            'Mailer'=>'smtp',
			'SMTPSecure' => "ssl",
            'Port'=>465,
            'SMTPAuth'=>true,
			'IsHTML'=>true,
        ),
		'clientScript'=>array(
			'class' => 'CClientScript',
			'scriptMap' => array(
			'jquery.js'=>false,
			),
			'coreScriptPosition' => CClientScript::POS_END,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=calculator',
			'emulatePrepare' => true,
			'username' => 'root',			
			'password' =>'',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page	     
		'adminEmail'=>'venturesupplier@gmail.com',
		'sendgrid_username'=>'tarungutpa003',
		'sendgrid_password'=>'venturepact1',
		'masterPassword'=>'pratham123',
		'socket_port'=>'8080'
	),
	'theme'=>'adminre',
);