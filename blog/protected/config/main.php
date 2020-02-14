<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Blonder413',
//	'theme'	=> 'classic',
	'language'	=> 'es_co',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Pass@1234',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),

	// application components
	'components'=>array(

		'authManager'	=> array(
			'class'			=> 'CDbAuthManager',
			'connectionID'	=> 'db',
		),

		'request'=>array(
			'enableCookieValidation'=>true,
            'enableCsrfValidation'=>true,
        ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'	=> false,
//			'urlSuffix'	=> '.html',
//			'caseSensitive'	=> false,
			'rules'=>array(
				'acerca'	=> 'site/about',
				'contacto'	=> 'site/contact',
//				'<action:(about|contact)>' => 'site/<action>',
				'articulo/<slug>'	=> 'site/articulo',
				'articulo/descarga/<slug>'	=> 'site/descarga',
				'categoria/<slug>'	=> 'site/categoria',
				'etiqueta/<etiqueta>'	=> 'site/etiqueta',
				'admin/<controller:\w+>/<id:\d+>'=>'admin/<controller>/view',
				'admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'admin/<controller>/<action>',
				'admin/<controller:\w+>/<action:\w+>'=>'admin/<controller>/<action>',
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//				'articulo/categoria/<slug:\w+>'	=> 'site/categoria',	// NO SIRVE
			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
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
		'adminEmail'=>'webmaster@example.com',
	),
);
