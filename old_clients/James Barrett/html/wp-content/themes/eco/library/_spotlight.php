<?php if(!pagelines('hide_spotlight') && !m_pagelines('hide_spotlight',$post->ID)):?>
<div id="spotlight" class="fix">
	<div class="effect">
		<div class="shadow-bottom fix">
			<div class="content">
			
				<?php if(is_page_template('page-highlight.php')) { 
					require(PRO.'/template_highlight.php'); 
				}else{?>
					<h1 class="pagetitle">
						<?php global $bbpress_forum;?>
						<?php if($bbpress_forum):?>
							<a href="<?php bb_uri(); ?>"><?php bb_option('name'); ?></a>
						<?php elseif(is_page()):?>
								<?php the_title(); ?>
						<?php elseif(is_home() || is_single()):?>
								<?php 
									if(get_option('page_for_posts')){
										echo get_the_title(get_option('page_for_posts'));
									}else{
										e_pagelines("blog_title_text",__('The Latest', TDOMAIN));
									}
								?>
						<?php elseif(is_search()):?>
								<?php _e('Search Results', TDOMAIN);?>
						<?php elseif(is_category()):?>
							<?php single_cat_title(''); ?>
						<?php elseif(is_404()):?>
								<?php _e('Error 404', TDOMAIN);?>
						<?php endif;?>
					</h1>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<?php endif;?>