<?php

/************************

  PAGES -  admin hooks

************************/
	add_action('admin_menu', "add_edit_page");
	add_action('save_post', 'save_edit_page');

	/**
	 * Add video posting widget and options page.
	*/

	function add_edit_page(){
		if( function_exists("add_meta_box")){
			add_meta_box("edit_page_interface", THEMENAME." Page Options", "edit_page_interface", "page", "advanced");
		}
	}

	/**
	 * Saves the thumbnail image as a meta field associated
	 * with the current post. Runs when a post is saved.
	 */
	function save_edit_page( $postID ) {
		if(isset($_POST['update']) || isset($_POST['save'])){
			$editpagearray= get_edit_page_post_array();
			foreach($editpagearray as $optionid => $o){
				if(isset($_POST[$optionid])){
					update_post_meta($postID, $optionid, $_POST[$optionid] );
				}
			}
		}
	}
	/**
	 * Code for the meta box.
	 */
	function edit_page_interface()
	{
		global $post_ID;
	
		$editpagearray= get_edit_page_post_array();
	
	?><?php foreach($editpagearray as $optionid => $o):?>
			<?php if(isset($o['where']) && $o['where'] == 'post'):?><?php else:?>
			<?php include(CORE_ADMIN."/page_option_form.php");?>
			<?php endif;?>
		<?php endforeach;?>

	<p style="margin:10px 0 0 25px;">
		<input id="update" class="button-primary" type="submit" value="<?php _e("Update",TDOMAIN); ?>" accesskey="p" tabindex="5" name="update"/>
	</p>
	<br/>

<?php } 



/************************

  POSTS -  admin hooks

************************/
	add_action('admin_menu', "add_edit_post");
	add_action('save_post', 'save_edit_post');

	/**
	 * Add video posting widget and options page.
*/

	function add_edit_post(){
		if( function_exists("add_meta_box")){
			add_meta_box("edit_post_interface", THEMENAME." Post Options", "edit_post_interface", "post", "advanced");
		}
	}

	/**
	 * Saves the thumbnail image as a meta field associated
	 * with the current post. Runs when a post is saved.
	 */
	function save_edit_post( $postID ) {
		if(isset($_POST['update']) || isset($_POST['save'])){
			$editpagearray= get_edit_page_post_array();
			foreach($editpagearray as $optionid => $o){
					update_post_meta($postID, $optionid, $_POST[$optionid] );
			
			}
		}
	}
	/**
	 * Code for the meta box.
	 */
	function edit_post_interface()
	{
		global $post_ID;
	
		$editpagearray= get_edit_page_post_array();

	?>	
		<?php foreach($editpagearray as $optionid => $o):?>
			<?php if(isset($o['where']) && $o['where'] == 'page'):?><?php else:?>
				<?php include(CORE_ADMIN."/page_option_form.php");?>
			<?php endif;?>
		<?php endforeach;?>

	<p style="margin:10px 0 0 25px;">
		<input id="update" class="button-primary" type="submit" value="<?php _e("Update",TDOMAIN); ?>" accesskey="p" tabindex="5" name="update"/>
	</p>
	<br/>

<?php } ?>
