<?php
$cfg['WebDir']       =  str_ireplace('\\','/',dirname(dirname(__FILE__)));
$cfg['WebDir']       =  str_ireplace('\\','/',dirname(__FILE__));
$cfg['RootDir']        =  $_SERVER['DOCUMENT_ROOT'];
define('WEB_DIR', str_ireplace($cfg['RootDir'],'',$cfg['WebDir']));

define('APP_DIR', realpath('./'));
require(APP_DIR.'/protected/lib/speed.php');