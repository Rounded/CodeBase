<?php if(m_pagelines('full_width_widget', $post->ID) && VPRO):?>
	<div id="fullwidth_bottom_widgets" class="content">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Full-Width Bottom Sidebar')) : ?>
		<p class="subtle"><?php _e('Full width widgets selected but no widgets have been added.',TDOMAIN);?></p>
	<?php endif;?>
	</div>
<?php endif;?>
<div class="clear"></div>

<?php if(pagelines('twitfooter') && pagelines('twittername') && VPRO):?>
<div id="twitfooter">
	<div class="content">
		<div class="tbubble">
		<?php include (THEME_LIB . '/_twittermessages.php'); ?>
		</div>
	</div>
</div>
<?php endif;?>

<?php 

	global $bbpress_forum;
	if(($bbpress_forum && pagelinesforum('hide_bottom_sidebars')) || !pagelines('bottom_sidebars') || !VPRO || m_pagelines('hide_bottom_sidebars', $post->ID)) $hide_footer = true;
	else $hide_footer = false;		
?>
<?php if(!$hide_footer):?>

<div id="morefoot" class="fix">
	<div class="morefoot_back fix">
		<div class="content">
				<div id="morefootbg" class="fix">
					<div class="wcontain fix">	
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ) : ?>
						<div class="widget">
							<?php if(!pagelines('sidebar_no_default')):?>
								<h3><?php _e('Looking for something?',TDOMAIN);?></h3>
								<p><?php _e('Use the form below to search the site:',TDOMAIN);?></p>
								<?php include (THEME_LIB . '/_searchform.php'); ?>
								<br class="clear"/>
								<p><?php _e('Still not finding what you\'re looking for? Drop a comment on a post or contact us so we can take care of it!',TDOMAIN);?></p>
						
							<?php endif;?>
						</div>
						<?php endif; ?>
					</div>
					<div class="wcontain">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Middle') ) : ?>
						<div class="widget">
							<?php if(!pagelines('sidebar_no_default')):?>
								<div class="widget">
								<h3><?php _e('Visit our friends!',TDOMAIN);?></h3><p><?php _e('A few highly recommended friends...',TDOMAIN);?></p><ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
								</div>
							<?php endif;?>
						</div>
						<?php endif; ?>
					</div>
					<div class="wcontain">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ) : ?>
							<div class="widget">
							<?php if(!pagelines('sidebar_no_default')):?>
								<div class="widget">
								<h3><?php _e('Archives', TDOMAIN);?></h3><p><?php _e('All entries, chronologically...',TDOMAIN);?></p><ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>
								</div>
							<?php endif;?>
							</div>
						<?php endif; ?>
					</div>
				</div>

		</div>
	</div>
</div><!-- Closes morefoot -->

<?php endif; ?>