<?php
/* wppa_topten.php
* Package: wp-photo-album-plus
*
* display the top rated photos
* Version 3.0.1
*/
class TopTenWidget extends WP_Widget {
    /** constructor */
    function TopTenWidget() {
        parent::WP_Widget(false, $name = 'Top Ten Photos');	
		$widget_ops = array('classname' => 'wppa_topten_widget', 'description' => __( 'WPPA+ Top Ten Rated Photos', 'wppa') );	//
		$this->WP_Widget('wppa_topten_widget', __('Top Ten Photos', 'wppa'), $widget_ops);															//
    }

	/** @see WP_Widget::widget */
    function widget($args, $instance) {		
		global $widget_content;
		global $wpdb;

        extract( $args );
        
 		$widget_title = apply_filters('widget_title', empty( $instance['title'] ) ? get_option('wppa_toptenwidgettitle', __('Top Ten Photos', 'wppa')) : $instance['title']);

		$page = get_option('wppa_topten_widget_linkpage', '0');
		$max = get_option('wppa_topten_count', '10');
		
		$thumbs = $wpdb->get_results('SELECT * FROM '.PHOTO_TABLE.' WHERE mean_rating > 0 ORDER BY mean_rating DESC LIMIT '.$max, 'ARRAY_A');
		$widget_content = '';
		$maxw = get_option('wppa_topten_size', '86');
		$maxh = $maxw + 18;
		if ($thumbs) foreach ($thumbs as $image) {
			
			// Make the HTML for current picture
			$widget_content .= '<div class="wppa-widget" style="width:'.$maxw.'px; height:'.$maxh.'px; margin:4px; display:inline; text-align:center; float:left;">'; 
			if ($image) {
				// make image url
				$imgurl = get_bloginfo('wpurl') . '/wp-content/uploads/wppa/' . $image['id'] . '.' . $image['ext'];
				
				// Find link page if any, if we find a title, there is a valid page to link to
				$pid = get_option('wppa_topten_widget_linkpage', '0');
				$page_title = $wpdb->get_var("SELECT post_title FROM " . $wpdb->posts . " WHERE post_type = 'page' AND post_status = 'publish' AND ID=" . $pid);
				if ($page_title) { 			// Yep, Linkpage found
					$title = __a('Link to', 'wppa_theme') . ' ' . wppa_qtrans($page_title);
					$widget_content .= '<a href="'.wppa_get_permalink($pid).'topten=10&amp;slide=true&amp;photo='.$image['id'].'&amp;cover=0&amp;occur=1">';
				} 
				else {
					$title = $widget_title;
					$widget_content .= '<a href = "'.$imgurl.'" target="_blank">';
				}

				$file = wppa_get_thumb_path_by_id($image['id']);
				$imgstyle = wppa_get_imgstyle($file, $maxw, 'center', 'thumb');
								// 'max-width: ' . $maxw . 'px; max-height: ' . $maxw . 'px;
				$widget_content .= '<img src="' . $imgurl . '" style="'.$imgstyle.'" title="' . $title . '" alt="' . $title . '">';

				$widget_content .= '</a>';
			} 
			else {	// No image
				$widget_content .= __a('Photo not found.', 'wppa_theme');
			}
			$widget_content .= '<span style="font-size:9px;">'.wppa_get_rating_by_id($image['id']).'</span>';
			$widget_content .= '</div>';
		}	
		else $widget_content .= 'There are no rated photos (yet).';

		echo $before_widget . $before_title . $widget_title . $after_title . $widget_content . $after_widget;
    }
	
    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'sortby' => 'post_title', 'title' => '') );
 		$widget_title = apply_filters('widget_title', empty( $instance['title'] ) ? get_option('wppa_toptenwidgettitle', __('Top Ten Photos', 'wppa')) : $instance['title']);
//		$title = esc_attr( $instance['title'] );
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wppa'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $widget_title; ?>" /></p>
		<p><?php _e('You can set the content and the behaviour of this widget in the <b>Photo Albums -> Settings</b> admin page.', 'wppa'); ?></p>
<?php
    }

} // class TopTenWidget

// register TopTenWidget widget
if (get_option('wppa_rating_on', 'yes') == 'yes') add_action('widgets_init', create_function('', 'return register_widget("TopTenWidget");'));
