<?php

defined('DS') or define('DS',DIRECTORY_SEPARATOR);
defined('APP_DEPLOYED') or define('APP_DEPLOYED',0);

//Local Framework Path
$yiic=(!APP_DEPLOYED)?dirname(__FILE__).DS.'..'.DS.'..'.DS.'..'.DS.'frameworks'.DS .'yii_1.1.12'.DS .'framework'.DS .'yiic.php':
//Server framework Path
 dirname(__FILE__).DS.'..'.DS.'..'.DS.'frameworks'.DS .'yii_1.1.12'.DS .'framework'.DS .'yiic.php';


// change the following paths if necessary
$config=dirname(__FILE__).'/config/console.php';

require_once($yiic);


