<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('A_scripts', dirname(__FILE__).'/../extensions/alecz');

define('HASH_KEY', '5357e79aa9bf7');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'     => 'Notaria 39',
	'language' => 'es',
	'theme'    => 'bootstraptheme',
	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'bootstrap.behaviors.*',
		'bootstrap.helpers.*',
		'bootstrap.widgets.*',
	),

	'modules' => array(
		// uncomment the following to enable the Gii tool

		'gii' => array(
			'generatorPaths' => array(
				'bootstrap.gii',
			),
			'class'    => 'system.gii.GiiModule',
			'password' => 'ericko2303',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('192.168.1.246', '127.0.0.1', '::1'),
		),
		'importcsv' => array(
			'path' => 'upload/importCsv/', // path to folder for saving csv file and file with import params
		),
	),

	// application components
	'components' => array(
		'authManager' => array(
			'class'        => 'CDbAuthManager',
			'connectionID' => 'db',
		),
		'format' => array(
			'class' => 'application.components.Formatter',
		),
		'bootstrap' => array(
			'class' => 'bootstrap.components.BsApi',
		),
		'browser' => array(
			'class' => 'application.extensions.browser.CBrowserComponent',
		),
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager' => array(
			'urlFormat'      => 'path',
			'showScriptName' => false,
			'urlSuffix'      => '.tak',
			'rules'          => array(
				'uploads/<filename:[a-zA-Z]+\.pdf>'      => 'Upload/viewPdf',
				'<controller:\w+>/<id:\d+>'              => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
			),
		),

		/*'db'=>array(
		'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=notaria39',
			'emulatePrepare'   => true,
			'username'         => 'root',
			'password'         => 'ericko2303',
			'charset'          => 'utf8',
		),

		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'log' => array(
			'class'  => 'CLogRouter',
			'routes' => array(
				array(
					'class'  => 'CFileLogRoute',
					'levels' => 'error, warning',
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
	'params' => array(
		'ldap' => array(
			'servers' => array(
				'192.168.1.10',
			),
			'defaultDomain' => 'NOTARIA39',
			'search'        => array(
				'ou=Notaria39,dc=NOTARIA39,dc=chiapas',
				'ou=Users,dc=NOTARIA39,dc=chiapas',
				'ou="PO_NOT TITULAR",dc=NOTARIA39,dc=chiapas',
				'ou="Builtin",dc=NOTARIA39,dc=chiapas',
			),
		),
		// this is used in contact page
		'adminEmail' => 'kerberos.it.s@gmail.com',
		'tel'        => '(961) 602 3437',
		'empresa'    => 'Kerberos IT Services',
		'location'   => 'Tuxtla Gutierrez, Chiapas',
		'g+'         => 'https://plus.google.com/105506064145094162915',
		'googleid'   => 'alejandrorueda2303@gmail.com',
		'googlepass' => 'ericko2303!@',
		'googlecal'  => '0ijhk3vngjckc9n58ckgde7510@group.calendar.google.com',
	),
);