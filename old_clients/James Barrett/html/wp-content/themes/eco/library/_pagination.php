<?php if(function_exists('wp_pagenavi') && VPRO):?> 
	<?php wp_pagenavi(); ?>  
<?php elseif (show_posts_nav()) : ?>
	<div class="page-nav fix"> <span class="previous-entries"><?php next_posts_link(__('&laquo; Previous Entries',TDOMAIN)) ?></span> <span class="next-entries"><?php previous_posts_link(__('Next Entries &raquo;',TDOMAIN)) ?></span></div><!-- page nav -->
<?php endif;?>