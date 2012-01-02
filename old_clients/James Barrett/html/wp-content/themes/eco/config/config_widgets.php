<?php

// SOCIAL WIDGET

if (class_exists('WP_Widget')) {
	class PageLines_Social extends WP_Widget {
	
	   function PageLines_Social() {
		   $widget_ops = array('description' => 'This widget places links to your social accounts in the sidebar.' );
		   parent::WP_Widget(false, $name = __('PageLines - Social', TDOMAIN), $widget_ops);    
	   }
	
	
	   function widget($args, $instance) {        
		   extract( $args );
		
			// THE TEMPLATE
		  	include(THEME_LIB.'/_social_icons.php');
	   }
	
	   function update($new_instance, $old_instance) {                
		   return $new_instance;
	   }
	
	   function form($instance) {                
		   $number = esc_attr($instance['number']);
		   $thumb_size = esc_attr($instance['thumb_size']);
		   
		   ?>    	   
		<p>	<?php _e('The options for this widget are set in theme options.',TDOMAIN);?></p>
	<?php 
	   }
	
	} 
	register_widget('PageLines_Social');
}

// WELCOME WIDGET

if (class_exists('WP_Widget')) {
	class PageLines_Welcome extends WP_Widget {
	
	   function PageLines_Welcome() {
		   $widget_ops = array('description' => 'This widget places a welcome message with latest tweet in your sidebar; values for this are set in theme options.' );
		   parent::WP_Widget(false, $name = __('PageLines - Welcome', TDOMAIN), $widget_ops);    
	   }
	
	   function widget($args, $instance) {        
		   extract( $args );
		
			// THE TEMPLATE
		  	include(THEME_LIB.'/widget_welcome.php');
	   }
	
	   function update($new_instance, $old_instance) {                
		   return $new_instance;
	   }
	
	   function form($instance) { ?>    	   
		<p>	<?php _e('The options for this widget are set in theme options.',TDOMAIN);?></p>
		<p>	<?php _e('By default this widget only shows on your posts and single post pages. It can be set to show on all pages where the widget should be shown.',TDOMAIN);?></p>
	<?php 
	   }
	
	} 
	register_widget('PageLines_Welcome');
}

if(VPRO){
	// Custom WP125 Widget

	if (class_exists('WP_Widget')) {
		class PageLines_Ads extends WP_Widget {
	
		   function PageLines_Ads() {
			   $widget_ops = array('description' => 'This widget places a special WP125 ads widget formatted for the theme.' );
			   parent::WP_Widget(false, $name = __('PageLines Pro - Ads (WP125)', TDOMAIN), $widget_ops);    
		   }
	
		   function widget($args, $instance) {        
			   extract( $args );
		
				// THE TEMPLATE
			  	include(PRO.'/widget_ads.php');
		   }
	
		   function update($new_instance, $old_instance) {                
			   return $new_instance;
		   }
	
		   function form($instance) { ?>    	   
			<p>	<?php _e('The options for this widget are set in the options for the Wp125 plugin.',TDOMAIN);?></p>
			<?php if(!function_exists('wp125_write_ads')):?><p><strong><?php _e('Notice: This plugin still needs to be installed', TDOMAIN);?></strong></p><?php endif;?>
		<?php 
		   }
	
		} 
		register_widget('PageLines_Ads');
	}

	// PageLines Flickr

	if (class_exists('WP_Widget')) {
		class PageLines_Flickr extends WP_Widget {
	
		   function PageLines_Flickr() {
			   $widget_ops = array('description' => 'This widget places a special FlickrRSS widget formatted for the theme.' );
			   parent::WP_Widget(false, $name = __('PageLines Pro - Flickr', TDOMAIN), $widget_ops);    
		   }
	
		   function widget($args, $instance) {        
			   extract( $args );
		
				// THE TEMPLATE
			  	include(PRO.'/widget_flickr.php');
		   }
	
		   function update($new_instance, $old_instance) {                
			   return $new_instance;
		   }
	
		   function form($instance) { ?>    	   
			<p>	<?php _e('The options for this widget are set in the options for the FlickrRSS plugin.',TDOMAIN);?></p>
			<?php if(!function_exists('get_flickrRSS')):?><p><strong><?php _e('Notice: This plugin still needs to be installed', TDOMAIN);?></strong></p><?php endif;?>
		<?php 
		   }
	
		} 
		register_widget('PageLines_Flickr');
	}
}

?>