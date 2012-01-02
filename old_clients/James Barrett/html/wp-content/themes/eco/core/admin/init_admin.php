<?php

	//Runs at the beginning of every admin page before the page is rendered
		add_action( 'admin_init', 'load_scripts' );
		function load_scripts(){
			if($_GET['page'] == 'pagelines' || $_GET['page'] == 'pagelines_feature'){
				wp_enqueue_script( 'jquery' );
				wp_enqueue_script( 'jquery-ui-core' );
				wp_enqueue_script( 'jquery-ui-tabs' );	
			}
		}


	//Runs in the HTML <head> section of the admin panel. 
	add_action( 'admin_head', 'load_head' );
	function load_head(){
		echo '<link rel="stylesheet" href="'.CORE_CSS.'/admin.css" type="text/css" media="screen" />';
		echo '<link rel="shortcut icon" href="'.CORE_IMAGES.'/favicon-pagelines.ico" type="image/x-icon" />';
	}
	
	// Load Top Level 
	add_action( 'admin_menu', 'load_panels' );
	function load_panels(){	
		//add_menu_page('Page title', 'Top-level menu title', 'administrator', 'my-top-level-handle', 'my_magic_function');
		add_object_page ('Page Title', THEMENAME, 8,'pagelines', 'pagelines_theme_options', CORE_IMAGES. '/favicon-pagelines.png');
	}
	
	// Theme Options
	add_action('admin_menu', 'add_option_interface');
	function add_option_interface() {
		//add_submenu_page(parent, page_title, menu_title, capability required, file/handle, [function]); 
		$pagelines_options_page = add_submenu_page('pagelines', 'Theme Options', 'Theme Options', 8, 'pagelines','pagelines_theme_options'); // Default
	}
	
	if(VPRO){
		// Feature Page
		add_action('admin_menu', 'add_feature_interface');
		function add_feature_interface() {
			//add_submenu_page(parent, page_title, menu_title, capability required, file/handle, [function]); 
			$pagelines_features_page = add_submenu_page('pagelines', 'Feature Page Setup', 'Feature Setup', 8, 'pagelines_feature','pagelines_feature_options');
		}
	}
	
	// Show Options Panel after activate  
	if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {

		//Do redirect
		header( 'Location: '.admin_url().'admin.php?page=pagelines&pageaction=activated' ) ;

	}

	
?>