<?php get_header(); ?>
<div class="h-spacer20"></div>
	<div class="section">
		<div class="center">
			<div class="mcontent">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			
						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
			
						<div class="entry">
							<?php the_content(); ?>
						</div>
			
						<div class="postmetadata">
							<?php the_tags('Tags: ', ', ', '<br />'); ?>
							Posted in <?php the_category(', ') ?> | 
							<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
						</div>
			
					</div>
			
				<?php endwhile; ?>
			
				<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
			
				<?php else : ?>
			
					<h2>Not Found</h2>
			
				<?php endif; ?>
			</div><!-- END .mcontent -->
			
			<?php get_sidebar(); ?>

			<div class="clear"></div>
		</div><!-- END .center -->
	</div><!-- END .section -->
<div class="h-spacer20"></div>

<?php get_footer(); ?>