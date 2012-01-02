	<div id="nav" class="fix">
		<ul class="dropdown clearfix"> 	
			<!-- <li class="page_item "><a class="home" href="<?php echo get_settings('home'); ?>/" title="<?php _e('Home',TDOMAIN);?>"><?php _e('Home',TDOMAIN);?></a></li> -->
			<?php 
				$frontpage_id = get_option('page_on_front');
				if($bbpress_forum && pagelinesforum('exclude_pages')){ $forum_exclude = ','.pagelinesforum('exclude_pages');}
				else{ $forum_exclude = '';}
				wp_list_pages('exclude='.$frontpage_id.$forum_exclude.'&depth=3&title_li=&link_before=<span>&link_after=</span>');?>
		</ul>
	</div><!-- /nav -->
	<div class="clear"></div>