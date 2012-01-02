<div class="branding">
	<?php if(pagelines('custom_header')):?>
		<a class="home" href="<?php echo get_settings('home'); ?>/" title="<?php bloginfo('name');?>"><img src="<?php echo pagelines('custom_header');?>" alt="<?php bloginfo('name');?>" /></a>
	<?php else:?>
		<h1 class="site-title"><a class="home" href="<?php echo get_settings('home'); ?>/" title="<?php _e('Home',TDOMAIN);?>"><?php bloginfo('name');?></a></h1>
		<h6 class="site-description"><?php bloginfo('description');?></h6>
	<?php endif;?>
</div>