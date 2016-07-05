<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : 
	define('SITE_ROOT', 'C:'.DS.'wamp'.DS.'www'.DS.'school');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// load config file first
require_once(LIB_PATH.DS.'config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions.php');

/*//for managing the image,css,js path
	$root=pathinfo($_SERVER['SCRIPT_FILENAME']);
	$link='';
	if(!strcmp(basename($root['dirname']),'school'))
	{	
		$link = '';	
	}
	else
	{	
		$link = '../';
	}
	echo $link;
*/
	

	

// load core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');
//require_once(LIB_PATH.DS.'pagination.php');

// load database-related classes
require_once(LIB_PATH.DS.'user.php');
require_once(LIB_PATH.DS.'subject.php');
require_once(LIB_PATH.DS.'routine.php');
require_once(LIB_PATH.DS.'account.php');
require_once(LIB_PATH.DS.'admin.php');
//require_once(LIB_PATH.DS.'comment.php');

?>