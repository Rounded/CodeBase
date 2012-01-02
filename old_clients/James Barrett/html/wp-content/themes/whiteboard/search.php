<?php get_header(); ?>
<div id="content" class="search">

	<h1><?php the_search_query(); ?></h1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="single-post">
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php echo '<div class="featuredThumbnail">'; the_post_thumbnail(); echo '</div>'; /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ ?>
			<p>
				Written on <?php the_time('F j, Y'); ?> at <?php the_time() ?>, by <?php the_author_posts_link() ?>
			</p>
	
			<div class="post-excerpt">
				<?php the_excerpt(); /* the excerpt is loaded to help avoid duplicate content issues */ ?>
			</div><!--.post-excerpt-->
		</div><!--.single-post-->
	<?php endwhile; else: ?>
		<div class="no-results">
			<h2>No Results</h2>
			<p>Please feel free try again!</p>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</div><!--no-results-->
	<?php endif; ?>

	<nav class="oldernewer">
		<div class="older">
			<p>
				<?php next_posts_link('&laquo; Older Entries') ?>
			</p>
		</div><!--.older-->
		<div class="newer">
			<p>
				<?php previous_posts_link('Newer Entries &raquo;') ?>
			</p>
		</div><!--.older-->
	</nav><!--.oldernewer-->
	
</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
