<div id="subnav" class="fix">
	<ul>
		
		<?php if($post->post_parent || wp_list_pages("title_li=&child_of=".$post->ID."&echo=0")):?>
		<li><span class="subnav_first">&nbsp;</span></li>
		<?php 
			if(count($post->ancestors)>=2){
				$reverse_ancestors = array_reverse($post->ancestors);
				$children = wp_list_pages("title_li=&depth=1&child_of=".$reverse_ancestors[0]."&echo=0&sort_column=menu_order");	
			}elseif($post->post_parent){ $children = wp_list_pages("title_li=&depth=1&child_of=".$post->post_parent."&echo=0&sort_column=menu_order");
			}else{	$children = wp_list_pages("title_li=&depth=1&child_of=".$post->ID."&echo=0&sort_column=menu_order");}

			if ($children) { echo $children;}
		?>
			<li><span class="subnav_last">&nbsp;</span></li>
		<?php endif;?>
		
	</ul>
	
</div><!-- /sub nav -->