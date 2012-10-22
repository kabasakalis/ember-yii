<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array(
        'log',
 //   'bootstrap', // preload the bootstrap component
     ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
'aliases'=>array(
    'bootstrap'=>'webroot.protected.extensions.bootstrap'
    ),


	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
           'generatorPaths'=>array(
        //    'bootstrap.gii', // since 0.9.1
            ),
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
        "api"
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

        /*by default we don't use the  extension,we use the original bootstrap js and css files,(with less).
         'bootstrap'=>array(
        'class'=>'ext.bootstrap.components.Bootstrap',
                ),*/
    
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(

                                //Contacts REST API
                               array('api/contact/list', 'pattern' => 'api/contacts', 'verb' => 'GET'),
                               array('api/contact/create', 'pattern' => 'api/contacts', 'verb' => 'POST'),
                               array('api/contact/read', 'pattern' => 'api/contacts/<id:\d+>', 'verb' => 'GET'),
                               array('api/contact/update', 'pattern' => 'api/contacts/<id:\d+>', 'verb' => 'PUT'),
                               array('api/contact/delete', 'pattern' => 'api/contacts/<id:\d+>', 'verb' => 'DELETE'),

               			/*	REST Controller Patterns
               			       for REST please @see http://www.yiiframework.com/wiki/175/how-to-create-a-rest-api/
               				  specify the REST controllers names that lay on your "api" module
               				 make sure the "api" module is initialized!*/
                           /*  array('api/<controller>/list', 'pattern' => 'api/<controller:(controllernameA|controllernameB)>s', 'verb' => 'GET'),
                               array('api/<controller>/list', 'pattern' => 'api/<controller:(controllernameA|controllernameB)>s/<id:\d+>', 'verb' => 'GET'),
                               array('api/<controller>/create', 'pattern' => 'api/<controller:(controllernameA|controllernameB)>', 'verb' => 'POST'),
                               array('api/<controller>/read', 'pattern' => 'api/<controller:(controllernameA|controllernameB)>/<id:\d+>', 'verb' => 'GET'),
                               array('api/<controller>/update', 'pattern' => 'api/<controller:(controllernameA|controllernameB)>/<id:\d+>', 'verb' => 'PUT'),
                            array('api/<controller>/delete', 'pattern' => 'api/<controller:(controllernameA|controllernameB)>/<id:\d+>', 'verb' => 'DELETE'),*/

               				/* other @see http://www.yiiframework.com/doc/guide/1.1/en/topics.url */
               				'<controller:\w+>/<id:\d+>' => '<controller>/view',
               				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
               				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                             'site/page/<view:\w+>' => 'site/page/',
			),
		),

		/*'db'=>array(
					'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
				),*/
		// uncomment the following to use a MySQL database

        'db'=>(!APP_DEPLOYED)?
                                                      array(    //LOCALHOST
                                                      'connectionString' => 'mysql:host=yii.gr;dbname=yii_ember',
       			                                      'emulatePrepare' => true,
       			                                       'username' => 'root',
       		 	                                       'password' => '',
       			                                        'charset' => 'utf8'
               	                                    )
            :   //SERVER
                                                     array(
                                                         'connectionString' => 'mysql:host=    ;dbname=   ',
                                                          'emulatePrepare' => true,
                                                           'username' => '           ',
                                                      	   'password' => '         ',
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
        'clientScript'=>array(
        'class' => 'CClientScript',
                'scriptMap' => array(
                        'jquery.js'=>false,
                    'jquery.min.js'=>false
                ),
        'coreScriptPosition' => CClientScript::POS_END,
),


	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);