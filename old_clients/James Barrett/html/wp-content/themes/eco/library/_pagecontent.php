	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="copy">
			
				<div class="entry">

					<?php the_content(__('<p class="serif">Read the rest of this page &raquo;</p>',TDOMAIN)); ?>
					<?php wp_link_pages(array('before' => __('<p><strong>Pages:</strong> ',TDOMAIN), 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
					<?php edit_post_link(__('Edit this entry.',TDOMAIN), '<span>', '</span>'); ?>
				</div>
			</div>			
		</div>
	<?php endwhile; endif; ?>
	
	<div class="copy">
		<?php include(THEME_LIB."/_contentsidebar.php");?>

		<div class="clear"></div>
	</div>
