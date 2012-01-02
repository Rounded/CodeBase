<?php


class Options {

	// BUILD THE PAGELINES OBJECT
		function __construct() {
			$this->update_or_install();
			$this->get_options();			
		}
	
	
	//INITIAL INSTALL OR UPDATING
	function update_or_install(){
		
			//if options aren't set
			if(!get_option('pagelines_options') && !get_option('pagelines_options_redundant')){ 
			
				//if old options are set
				if(get_option('pagepress_options')){
				
					//set new options to old
					update_option('pagelines_options',get_option('pagepress_options'));
				
				}else{
				
					// first time using this theme in this install so set defaults
					$this->default_features();	
					$this->default_options();
					$this->save_options();
				}
			}
		}

	// DEFAULT SETTINGS
	
		function default_options(){
				// admin	
				$this->credlink = "http://www.pagelines.com";
				$this->set_defaults_from_array(get_option_array());	
		}
		
		function default_features(){
		
			$this->features = get_default_features();
			$this->fboxes = get_default_fboxes();
			$this->set_defaults_from_array(get_feature_array());
		
		}
		

	// GET OPTION FUNCTIONS 
		function get_options() {
		
			if(!get_option('pagelines_options')){ 
				$saved_options = maybe_unserialize(get_option('pagelines_options_redundant'));
				update_option('pagelines_options',get_option('pagelines_options_redundant'));
			}else{ $saved_options = maybe_unserialize(get_option('pagelines_options'));	}
		
			if (!empty($saved_options) && is_object($saved_options)) {
				foreach ($saved_options as $option_name => $value)
					$this->$option_name = stripslashes_deep($value);
			}
			
		}
	
	// UPDATE OPTION FUNCTIONS
		function update_option($name, $data = false){
			if($data) $this->$name = $data;
			else $this->$name = $_POST[$name];
		}
	
	// SAVE OPTION FUNCTIONS
		function save_options() {
			if(!$_GET['activated']) checkauthority();
			update_option('pagelines_options', $this);
			
			//Redundancy Backup (Hopefully will solve suspected DB problems w some users)
			if(get_option('pagelines_options')){
				update_option('pagelines_options_redundant', $this);
			}
		}
		
		function save_features($postdata){
			
			$this->update_options_from_array(get_feature_array());
			
			if($postdata){
				$this->update_option('features', $postdata['feature']);
				$this->update_option('fboxes', $postdata['fbox']);
			}
			$this->save_options();
			
		}
	
	// RESTORE FUNCTIONS 
		
		function restore_options(){
			//if they get messed up
		
			$this->default_options();
			$this->save_options();	
		}
	
		
		function restore_features(){
		
			$this->default_features();
			$this->save_options();
		}
		
	// RESTORE FROM DATABASE FUNCTIONS	
		function restore_from_backup(){
		
			$this->restore_from_backup_with_array(get_option_array());
			$this->save_options();
		}
		
		function restore_features_from_backup(){
			$this->restore_from_backup_with_array(get_feature_array());
			$this->features = get_option('features');
			$this->fboxes = get_option('fboxes');
			$this->save_options();
		}
	
	// DATABASE BACKUP
		function backup_features($postdata){
			
			$this->save_features($postdata);
			
			$this->backup_from_array(get_feature_array(),$postdata);
	
			update_option('features', $_POST['feature']);
			update_option('fboxes', $_POST['fbox']);
		}

		function backup_options($postdata){
			$this->backup_from_array(get_option_array(), $postdata);
		}
		
	// ARRAY HELPER FUNCTIONS 

		function update_options_from_array($the_array = array()){
			foreach($the_array as $menuitem => $options ){
				foreach($options as $optionid => $o ){
					if($o['type']=='check_multi'){
						foreach($o['selectvalues'] as $multi_optionid => $multi_o){
							$this->update_option($multi_optionid);
						}
					}elseif(isset($o['wp_option'])){
						// saves as a regular WP option
						update_option($optionid, $_POST[$optionid]);
					}else{
						$this->update_option($optionid);
					}
				}
			}		
		}

		function set_defaults_from_array($the_array = array()){
			foreach($the_array as $menuitem => $options ){
				foreach($options as $optionid => $o ){
					if($o['type']=='check_multi'){
						foreach($o['selectvalues'] as $multi_optionid => $multi_o){
							$this->$multi_optionid = $multi_o['default'];
						}
					}else{
						if(!VPRO && isset($o['version_set_default']) && $o['version_set_default'] == 'pro') $this->$optionid = null;
						else $this->$optionid = $o['default'];
					}
				}
			}
		}

		function backup_from_array($the_array = array(), $postdata){
			foreach($the_array as $menuitem => $options ){
				foreach($options as $optionid => $o ){
					if($o['type']=='check_multi'){
						foreach($o['selectvalues'] as $multi_optionid => $multi_o){
							update_option($multi_optionid, $postdata[$multi_optionid]);
						}
					}else{update_option($optionid, $postdata[$optionid]);}
				}
			}
		}

		function restore_from_backup_with_array($the_array = array()){
			foreach($the_array as $menuitem => $options ){
				foreach($options as $optionid => $optionfields ){
					if($o['type']=='check_multi'){
						foreach($o['selectvalues'] as $multi_optionid => $multi_o){
							$this->$multi_optionid = get_option($multi_optionid);
						}
					}else{
						$this->$optionid = get_option($optionid);
					}
				}
			}
		}

}

//********* END OF OPTIONS CLASS *********//


// PageLines function returns attributes from option class

function pagelines($option, $post_id = ''){
	
	if($post_id && get_post_meta($post_id, $option, true) && !is_home()){
		//if option is set for a page/post
		return get_post_meta($post_id, $option, true);
	}else{
		//if not set on page/post return global option.
		global $pagelines; 
		if ($pagelines->$option){
			return $pagelines->$option;
		} else return false;
	}
}

function e_pagelines($option, $alt = ''){

	global $pagelines; 
	
	if(isset($pagelines->$option)&&!empty($pagelines->$option)){
		echo $pagelines->$option;
	}else{
		echo $alt;
	}	
}

function m_pagelines($option, $post){
	$meta = get_post_meta($post, $option, true);
	if(isset($meta) && !is_home()){
		return $meta;
	}else{
		return false;
	}
}


function em_pagelines($option, $post, $alt = ''){
	$post_meta = m_pagelines($option, $post);
	
	if(isset($post_meta)){
		echo $post_meta;
	}else{
		echo $alt;
	}
}

?>