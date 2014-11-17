<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'yii基础搭建，便于重用',

	'defaultController'=>'user',

	// preloading 'log' component
	'preload'=>array(
		'log',
		'booster'),

	'aliases' => array(       
        'bootstrap' => realpath(__DIR__ . '/../extensions/booster'),
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'booster' => array(
		    'class' => 'bootstrap.components.Booster',
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName' => false,//隐藏index.php
            'rules' => array(
                '<_c:\w+>/<id:\d+>' => '<_c>/view',
                '<_c:\w+>/<_a:\w+>/<id:\d+>' => '<_c>/<_a>',
                '<_c:\w+>/<_a:\w+>' => '<_c>/<_a>',
            ),
        ),
		// 'db'=>array(
		// 	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=base',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'defaultRoles'=>array('guest'),
			'itemTable' => 'authitem',//认证项表名称
			'itemChildTable' => 'authitemchild',//认证项父子关系
			'assignmentTable' => 'authassignment',//认证项赋权关系
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
		'adminEmail'=>'xxwade2010@163.com',
	),
);