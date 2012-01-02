<?php 

// CORE VERSION
	define('CORE_VERSION', "3.1.5");

// COMMON WP VARIABLES
	define('SITENAME',get_bloginfo('name'));
	define('RSSURL',get_bloginfo('rss2_url'));
	define('FEEDID',get_option('feedid'));
	
// DEFINE CORE CONSTANTS

	define('CORE_FUNCTIONS', CORE . '/functions');
	define('CORE_PLUGINS', CORE . '/plugins');
	define('CORE_CLASSES', CORE . '/classes');
	define('CORE_ADMIN', CORE . '/admin');
	define('CORE_INITS', CORE . '/inits');
	define('CORE_LIB', CORE . '/library');

// DEFINE DIRECTORY CONSTANTS
	define('THEME_CONFIG', TEMPLATEPATH . '/config');
	define('THEME_LIB', TEMPLATEPATH . '/library');

// DEFINE WEB FOLDERS
	define('THEME_ROOT', get_bloginfo('template_url'));
	define('CORE_ROOT', THEME_ROOT.'/'.CORENAME);
	
	// CORE WEB ROOTS
		define('CORE_JS', CORE_ROOT . '/js');
		define('CORE_CSS', CORE_ROOT . '/css');
		define('CORE_IMAGES', CORE_ROOT . '/images');
	
	//THEME SPECIFIC
		define('THEME_CSS', THEME_ROOT . '/css');
		define('THEME_JS', THEME_ROOT . '/js');
		define('THEME_IMAGES', THEME_ROOT . '/images');
	
		define('PRO', TEMPLATEPATH . '/pro');
		define('PRO_CSS', THEME_ROOT . '/pro/css');
		define('DEV', TEMPLATEPATH . '/dev');
			
// DEMO MODE
	define('DEMO', false);	


?>