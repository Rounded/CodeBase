<?php

//FOR DEBUGGING AND OPTIMIZATION
	define('DEBUG', false);
	if(DEBUG){
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	}

// GET GLOBAL VARIABLES
	include(CORE.'/globals.php');

// SUPPORTED WORDPRESS OPTIONS
	if (function_exists( 'add_theme_support' )) add_theme_support('post-thumbnails');

// THEME_CONFIGURATION
	include_once(THEME_CONFIG . '/config_theme.php'); // The Pagelines Option config class

	// LOCALIZATION - Needs to come after config_theme and before localized config files
		define('TDOMAIN', THEMENAME); 
		define('LANGUAGE_FOLDER', TEMPLATEPATH.'/language');
		load_theme_textdomain(TDOMAIN, LANGUAGE_FOLDER );

	include_once(THEME_CONFIG . '/config_options.php'); // The Pagelines Option config class
	include_once(THEME_CONFIG . '/config_features.php'); // The Pagelines Features config class
	include_once(THEME_CONFIG . '/config_page_post.php'); // The Pagelines Page/Post options config 
	include_once(THEME_CONFIG . '/config_widgets.php');
	include_once(THEME_CONFIG . '/config_sidebars.php');

// CORE OPTIONS HANDLING
	include (CORE_ADMIN.'/options.class.php'); 

// WP CONFIG OPTIONS
	include (CORE_FUNCTIONS.'/wp_config_options.php');

//CORE FUNCTION LIBRARIES
	include (CORE_FUNCTIONS.'/functions_library.php');
	include (CORE_FUNCTIONS.'/shortcode_library.php');

	
// INITIATE OPTIONS OBJECT - must come after theme functions file (or functions won't exist)
 	$GLOBALS['pagelines'] = new Options; 
	
// VERSIONS 
	if(VPRO) include(PRO.'/init_pro.php');
	if(VDEV) include(DEV.'/init_dev.php');	

// CORE PLUGINS
	include (CORE_PLUGINS.'/twitter.php');
	
//ADMIN INTERFACES
	include (CORE_ADMIN.'/init_admin.php'); 
	include (CORE_ADMIN.'/admin_functions.php');

	include (CORE_ADMIN.'/option_templates.php'); 
	include (CORE_ADMIN.'/pagepost_setup.php');


?>