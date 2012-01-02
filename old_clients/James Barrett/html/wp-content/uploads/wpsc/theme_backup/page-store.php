<?php get_header(); ?>
<div class="h-spacer20"></div>
	<div class="section">
		<div class="center">
			<div class="mcontent">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post" id="post-<?php the_ID(); ?>">
	
				<h2><?php the_title(); ?></h2>
	
				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
	
				<div class="entry">
	
					<?php the_content(); ?>
	
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
	
				</div>
	
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
			</div>
			
			<?php // comments_template(); ?>
	
			<?php endwhile; endif; ?>
			</div><!-- END .mcontent -->
			
			<?php get_sidebar(); ?>
			
			<div class="clear"></div>
		</div><!-- END .center -->
	</div><!-- END .section -->
<div class="h-spacer20"></div>
<?php get_footer(); ?>