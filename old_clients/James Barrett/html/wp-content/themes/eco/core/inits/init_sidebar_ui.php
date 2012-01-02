<script type="text/javascript" src="<?php echo CORE_JS;?>/jquery-ui.custom.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
	var $j = jQuery.noConflict();
	
	$j(document).ready(function () {
		<?php if(pagelines('accordionjs')):?>
		$j("#accordion").accordion({ 
			<?php if(pagelines('accordion_active')):?>active: <?php echo pagelines('accordion_active'); ?>,<?php endif;?>
			<?php if(pagelines('accordion_autoheight')):?>autoHeight: true<?php else:?>autoHeight: false<?php endif;?>
		});
		<?php endif;?>
		
		$j("#drag_drop_sidebar").sortable();
		$j("#drag_drop_sidebar").disableSelection();
		
	});	
/* ]]> */
</script>