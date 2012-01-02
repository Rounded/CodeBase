<div id="pagecontent" class="contentcontainer fix">
	<div class="texture fix">
		<?php if(m_pagelines('featureboxes',$post->ID) || is_page_template('page-feature.php') || is_page_template('page-feature-page.php')) { require(PRO.'/template_fboxes.php'); }?>
		
		<?php if(!is_page_template('page-feature.php')):?>
		<div class="content <?php if(pagelines('leftsidebar') || m_pagelines('leftsidebar', $post->ID) || is_page_template('page-leftsidebar.php')):?>leftsidebar<?php endif;?>">
			<div id="maincontent" class="fix">
				<?php include (THEME_LIB . '/_pagecontent.php'); ?>
			</div>
			<?php get_sidebar();?>
		</div>
		<?php endif;?>
	</div>
</div>