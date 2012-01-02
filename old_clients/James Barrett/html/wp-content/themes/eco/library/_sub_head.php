<?php if(!pagelines('hide_sub_header') && !is_search() && !is_404()):?>
	<?php if($post->post_parent || wp_list_pages("title_li=&child_of=".$post->ID."&echo=0")) $children = true;?>
	<?php if($children):?>
		<div id="sub_head" class="fix">
			<div class="content">
				<?php require(THEME_LIB.'/_sub_nav.php');?>
			</div>
		</div>
	<?php elseif((is_home() || is_category()) && pagelines('subnav_categories') && wp_list_categories('include='.pagelines('subnav_categories').'&title_li=&echo=0') != "<li>No categories</li>"):?>
	<div id="sub_head" class="fix">
		<div class="content">
			<ul id="subnav" class="fix">
				<li><span class="subnav_first">&nbsp;</span></li>
				<?php wp_list_categories('include='.pagelines('subnav_categories').'&title_li='); ?>
				<li><span class="subnav_last">&nbsp;</span></li>
		
			</ul>
		</div>
	</div>

	<?php endif;?>

<?php endif;?>
