
<div class="author-info">
	<div class="pic alignleft"><?php echo get_avatar(get_the_author_email(), $size = '80', $default = $urlHome . '/images/default_avatar_author.gif' ); ?></div>
	<div class="post-author">
		<div class="author-descr">
			<small><?php _e('About the author',TDOMAIN);?></small>
			<h3><?php the_author(); ?></h3>
			<p><?php the_author_description(); ?></p>
			<div class="author-details"><a href="<?php the_author_url(); ?>" target="_blank"><?php _e('Visit Authors Website',TDOMAIN);?></a></div>
		</div>
		<!--/author-descr -->
		<br class="fix" />
	</div>
	<!--/post-author -->
	<div class="clear"></div>
</div>