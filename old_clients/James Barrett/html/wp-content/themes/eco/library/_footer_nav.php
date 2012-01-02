
<ul id="footnav">
<li class="page_item <?php if ( is_front_page() ) { ?>current_page_item<?php } ?>"><a class="home" href="<?php echo get_settings('home'); ?>/" title="<?php _e('Home',TDOMAIN);?>"><?php _e('Home',TDOMAIN);?></a></li>
<?php 
	$frontpage_id = get_option('page_on_front');
	if($bbpress_forum && pagelinesforum('exclude_pages')){ $forum_exclude = ','.pagelinesforum('exclude_pages');}
	else{ $forum_exclude = '';}
	wp_list_pages('exclude='.$frontpage_id.$forum_exclude.'&depth=1&title_li=');?>
</ul>