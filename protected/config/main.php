<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
require_once dirname(__FILE__).'/../../config.php';
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Mitrasoft Software ERP Solution',
	'defaultController' => 'home/index',
	
	'theme'=>'bootstrap', //yii bootstrap
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.helpers.*',
		'application.modules.admin.controllers.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','192.168.1.18','110.139.14.64','::1'),
			//yii bootstrap
			'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
		'auth' => array(
		  'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
		  'userClass' => 'User', // the name of the user model class.
		  'userIdColumn' => 'user', // the name of the user id column.
		  'userNameColumn' => 'email', // the name of the user name column.
		  'appLayout' => 'application.views.layoutsAdmin.main', // the layout used by the module.
		  'viewDir' => null, // the path to view files to use with this module.
		),
		'admin',
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('admin/home/index'),
			'logoutUrl'=>array('admin/home/index'),
		),
		// uncomment the following to enable URLs in path-format
		//Yii bootstrap
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => FALSE,
			'rules'=>array(
				'admin'=>'admin/site/index',
				'admin/<controller:\w+>/<id:\d+>/*'=>'admin/<controller>/view',
				'admin/<controller:\w+>/<id:\d+>'=>'admin/<controller>/view',
				'admin/<controller:\w+>/<action:\w+>/<id:\d+>/*'=>'admin/<controller>/<action>',
				'admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'admin/<controller>/<action>',

				'<lang:(id|en)>'=>'home/index',
				'<lang:(id|en)>/<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
				'<lang:(id|en)>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

				//menghilangkan index ex:home/index -> home
				// '<controller:\w+>/*'=>'<controller>/index',
				// '<controller:\w+>'=>'<controller>/index',

				'<controller:\w+>/<id:\d+>/*'=>'<controller>/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>/*'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+[^admin]>/<action:\w+>/*'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',


			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		 */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host='.$dt_DB['server'].';dbname='.$dt_DB['database'].'',
			'emulatePrepare' => true,
			'username' => $dt_DB['username'],
			'password' => $dt_DB['password'],
			'charset' => 'utf8',
			'class'=>'CDbConnection',
		),
		'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'behaviors' => array(
				'auth' => array(
					'class' => 'auth.components.AuthBehavior',
					'admins' => array('root'), // users with full access
				),
			),
        ),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'admin/site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace',
				),
				// uncomment the following to show log messages on web pages
				
				// array(
					// 'class'=>'CWebLogRoute',
				// ),
				
			),
		),
		'user' => array(
			'allowAutoLogin'=>true,
			'class' => 'auth.components.AuthWebUser',
			'loginUrl'=>array('admin/home/index'),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'ibnudrift@gmail.com',
	),
	'language'=>'en',
);