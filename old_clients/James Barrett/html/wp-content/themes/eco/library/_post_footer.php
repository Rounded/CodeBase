<?php if(is_single()):?>
	<div class="post-footer">

			<div class="left">
				<?php edit_post_link(__(' (Edit Post) ', TDOMAIN), '', '&nbsp;');?>
				<?php e_pagelines('post_footer_social_text', '');?>	
			</div>
			<div class="right">
				<?php 
					$upermalink = urlencode(get_permalink());
					$utitle = urlencode(get_the_title());
				?>
				<?php if(pagelines('share_twitter')):?><a href="http://twitter.com/home/?status=<?php echo $utitle; ?>%20<?php echo $upermalink; ?>" title="<?php _e('Post At Twitter',TDOMAIN);?>" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-soc5.gif" alt="Digg" /></a><?php endif;?> 
				<?php if(pagelines('share_delicious')):?><a href="http://del.icio.us/post?url=<?php echo $upermalink; ?>&title=<?php echo $utitle; ?>" title="<?php _e('Bookmark at Delicious',TDOMAIN);?>" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-soc1.gif" alt="Delicious" /></a><?php endif;?>
				<?php if(pagelines('share_mixx')):?><a href="http://www.mixx.com/submit?page_url=<?php echo $upermalink; ?>" title="<?php _e('Bookmark at Mixx',TDOMAIN);?>" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-soc2.gif" alt="Mixx" /></a> <?php endif;?>
				<?php if(pagelines('share_stumbleupon')):?><a href="http://www.stumbleupon.com/submit?url=<?php echo $upermalink; ?>&title=<?php echo $utitle; ?>" title="<?php _e('Bookmark at StumbleUpon',TDOMAIN);?>" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-soc3.gif" alt="StumbleUpon" /></a> <?php endif;?>
				<?php if(pagelines('share_digg')):?><a href="http://digg.com/submit?phase=2&url=<?php echo $upermalink; ?>&title=<?php echo $utitle; ?>" title="<?php _e('Bookmark at Digg',TDOMAIN);?>" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-soc4.gif" alt="Digg" /></a><?php endif;?> 
			</div>
	

		<br class="fix" />
	
	</div>
<?php endif; ?>