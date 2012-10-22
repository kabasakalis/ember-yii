<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	// application components
 // autoloading model and component classes
 	'import'=>array(
 		'application.models.*',
 		'application.components.*',
         'application.behaviors.password.*',
         'application.behaviors.crypt.*'
 	),
    'commandMap' => array(
           			'migrate' => array(
           				'class' => 'system.cli.commands.MigrateCommand',
           				/* change if required */
           				'migrationPath' => 'application.migrations'
           			)
           		),

	'components'=>array(
        'db'=>array(
        			'connectionString' => 'mysql:host=yii.gr;dbname=yii_ember',
        			'emulatePrepare' => true,
        			'username' => 'root',
        			'password' => '',
        			'charset' => 'utf8',
                    'schemaCachingDuration' => YII_DEBUG ? 0 : 86400000, // 1000 days
                    'enableParamLogging' => YII_DEBUG,
        		),

	),
);