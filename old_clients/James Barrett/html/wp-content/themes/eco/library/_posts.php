
<?php if(is_single()):?>
	<div class="post-nav fix"> <span class="previous"><?php previous_post_link('%link') ?></span> <span class="next"><?php next_post_link('%link') ?></span></div>
<?php endif;?>
	
<?php if (!is_404() && have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="postwrap">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">	
			<div class="copy fix">
			
				<?php if(pl_show_thumb($post->ID)): ?>
	            		<div class="post-thumb">
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link To', TDOMAIN);?> <?php the_title_attribute();?>">
								<?php the_post_thumbnail('thumbnail');?>
							</a>
			            </div>
				<?php endif; ?>
				
				<div class="post-header fix <?php if(!pl_show_thumb($post->ID)) echo 'post-nothumb';?>">
					<div class="post-title-section fix">
						<div class="post-title fix">
							<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to',TDOMAIN);?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						
							<div class="metabar">
								<em>
								<?php _e('On',TDOMAIN);?> <?php the_time(get_option('date_format')); ?>, 
								<?php _e('in',TDOMAIN);?> <?php the_category(', ') ?>, 
								<?php _e('by',TDOMAIN);?> <?php the_author(); ?>
								<?php edit_post_link(__('<strong>(Edit Post)</strong>', TDOMAIN), ' ', ' ');?>
								</em>
							</div>
						</div>
						<div class="post-comments">							
							<a href="<?php the_permalink(); ?>#comments" title="<?php _e('View Comments', TDOMAIN);?>"><span><?php comments_number(0, 1, '%'); ?></span></a>
						</div>
					</div>
					<!--/post-title -->
					
					
					<?php if(pl_show_excerpt($post->ID)):?>
							<div class="post-excerpt">
								<?php the_excerpt(); ?>
							</div>
							
							<?php if(is_home() && !pl_show_content($post->ID)):?>
								<a class="continuereading" href="<?php the_permalink(); ?>">
									<?php e_pagelines('post_footer_text', __('Continue Reading', TDOMAIN));?>
								</a>
						
							<?php endif;?>
						
					<?php endif; ?>
				</div>
			</div>
			<?php  if(pl_show_content($post->ID)):?> 		
				<div class="copy">
					<div class="post-content">
						<?php the_content(); ?>
						<?php  if(is_single()) link_pages(__('<p><strong>Pages: </strong> ',TDOMAIN), '</p>', 'number'); ?>	
						<?php edit_post_link(__('Edit Post',TDOMAIN), '', '');?>
					</div>		
					<div class="tags">
					<?php the_tags(__('Tagged with: ', TDOMAIN),' &bull; ','<br />'); ?>&nbsp;
					</div>

				</div>
				<?php if(is_single() && pagelines('authorinfo') && VPRO):?>
					<?php include(THEME_LIB.'/_authorinfo.php');?>
				<?php endif;?>

			<?php endif;?>
				
			<?php include(THEME_LIB.'/_post_footer.php');?>
		</div><!--post -->
	</div>
	
	<?php if(is_single()):?>
		<?php include(THEME_LIB.'/_contentsidebar.php');?>
		<?php include(THEME_LIB.'/_commentsform.php');?>
	<?php endif; endwhile; ?>

	<?php include(THEME_LIB.'/_pagination.php');?>
	
	
<?php else : ?>
<div class="billboard">
		<?php if(is_404()):?>
			<h2 class="center"><?php _e('Sorry! Error 404 - Page Not Found',TDOMAIN);?></h2>
		<?php else:?>
			<h2 class="center"><?php _e('Nothing Found',TDOMAIN);?></h2>
		<?php endif;?>
		<p class="center"><?php _e('Sorry, what you are looking for isn\'t here.',TDOMAIN);?></p>
	
		<div class="center fix"><?php include (THEME_LIB . '/_searchform.php'); ?></div>
</div>
<?php endif; ?>