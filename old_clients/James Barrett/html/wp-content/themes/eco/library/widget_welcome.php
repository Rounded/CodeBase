<?php if(is_home() || is_single() || pagelines('welcomeall')):?>		
	<?php if(pagelines('greeting') || pagelines('welcomemessage')):?>
		<div id="welcome" class="fix">
			<div class="welcometext">
				<?php if(pagelines('greeting')):?><h3 class="greeting"><?php echo pagelines('greeting');?></h3><?php endif;?>
				<?php if(pagelines('welcomemessage')):?><div class="welcomemessage"><?php echo pagelines('welcomemessage');?></div><?php endif;?>
				<?php include (THEME_LIB . '/_twittermessages.php'); ?>
				<div class="clear"></div>
			</div>
		</div>
	<?php endif;?>			
<?php endif;?>