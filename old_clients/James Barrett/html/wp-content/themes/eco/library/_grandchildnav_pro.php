<?php 
	if ($post->post_parent && wp_list_pages("title_li=&child_of=".$post->ID."&echo=0") || 
	    (isset($post->ancestors) && count($post->ancestors)>=2)):
?>
	<div id="grandchildnav" class="widget">
		
		<div class="winner">	
		<h3 class="wtitle">
		<?php 
				if(isset($post->ancestors) && count($post->ancestors)==1) {
					$subnavpost = get_post($post->ID); 
					$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
				}else{
					$reverse_ancestors = array_reverse($post->ancestors);
					$subnavpost = get_post($reverse_ancestors[1]);
					$children =  wp_list_pages("title_li=&child_of=".$reverse_ancestors[1]."&echo=0&sort_column=menu_order");
				}?>
			
			<?php echo $subnavpost->post_title;	?>
		</h3>
			<div class="wcontent">
				<?php// print_r($post);?>
				<ul>
				<?php if ($children) { echo $children;}?>
	
				</ul>
			</div>
		</div>
	</div>
<?php endif;?>
