	<div class="socialicons">
		<div class="socialeffect fix">
		<span><?php _e('Connect with us:',TDOMAIN);?> </span>
		<?php if(pagelines('rsslink')):?>
			<a href="<?php echo RSSURL;?>" class="rsslink">
				<img src="<?php echo THEME_IMAGES;?>/icons/icon-rss.png" alt="feed"/>
			</a>
		<?php endif;?>
		<?php if(VPRO):?>
			<?php if(pagelines('twitterlink')):?>
			<a href="<?php echo pagelines('twitterlink');?>" class="twitterlink">
				<img src="<?php echo THEME_IMAGES;?>/icons/icon-twitter.png" alt="twitter"/>
			</a>
			<?php endif;?>
			<?php if(pagelines('facebooklink')):?>
			<a href="<?php echo pagelines('facebooklink');?>" class="facebooklink">
				<img src="<?php echo THEME_IMAGES;?>/icons/icon-facebook.png" alt="facebook"/>
			</a>
			<?php endif;?>
			<?php if(pagelines('linkedinlink')):?>
			<a href="<?php echo pagelines('linkedinlink');?>" class="linkedinlink">
				<img src="<?php echo THEME_IMAGES;?>/icons/icon-linkedin.png" alt="linkedin"/>
			</a>
			<?php endif;?>
		<?php endif;?>
		</div>
	</div>