<div id="blog_posts" class="contentcontainer fix">
	<div class="texture fix">
		<div class="content fix <?php if(pagelines('leftsidebar')):?>leftsidebar<?php endif;?>">
			<div id="maincontent">
				<?php include (THEME_LIB . '/_posts.php'); ?>
			</div>
			<?php get_sidebar();?>
		</div>
	</div>
</div>