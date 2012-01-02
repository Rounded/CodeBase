<script type="text/javascript" src="<?php echo CORE_JS;?>/jquery.cycle.all.min.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
	var $j = jQuery.noConflict();
	$j(document).ready(function () {
		
	//Feature Cycle Setup	
			$j('#cycle').cycle({ 
			    fx: '<?php if(pagelines('feffect')):?><?php echo pagelines('feffect');?><?php else:?>fade<?php endif;?>',
				sync: <?php if(pagelines('fremovesync')):?>0<?php else:?>1<?php endif;?>,
				timeout: <?php if(pagelines('timeout')):?><?php echo pagelines('timeout');?><?php else:?>0<?php endif;?>,
			    speed:  <?php if(pagelines('fspeed')):?><?php echo pagelines('fspeed');?><?php else:?>1500<?php endif;?>, 
				pager:  '#featurenav',
				cleartype:  true,
    			cleartypeNoBg:  true
			 });
			
		<?php if(pagelines('feature_nav_type') == 'names'):?>	
		//Overide page numbers on cycle feature with custom text
			$j("div#featurenav").children("a").each(function() {
				<?php $count = 1;?>
				<?php foreach(pagelines('features') as $key => $feature):?>
				if($j(this).html() == "<?php echo $count;?>") { $j(this).html("<?php echo $feature['name'];?>");}
				<?php $count += 1;?>
				<?php endforeach;?>
			});
		<?php endif;?>
		
		<?php if(pagelines('feature_nav_type') == 'thumbs'):?>	
		//Overide page numbers on cycle feature with custom text
			$j("div#featurenav").children("a").each(function() {
				<?php $count = 1;?>
				<?php foreach(pagelines('features') as $key => $feature):?>
				if($j(this).html() == "<?php echo $count;?>") {$j(this).html('<span class="nav_thumb" style="background: transparent url(<?php echo $feature["thumb"];?>) no-repeat 0 0;"><span class="nav_overlay">&nbsp;</span></span>');}
				<?php $count += 1;?>
				<?php endforeach;?>
			});
		<?php endif;?>
		
		<?php if(pagelines('feature_playpause')):?>	
		// Play Pause
			$j('.playpause').click(function() { 
				if ($j(this).hasClass('pause')) {
					$j('#cycle').cycle('pause');
				 	$j(this).removeClass('pause').addClass('resume');
				} else {
				   	$j(this).removeClass('resume').addClass('pause');
				    $j('#cycle').cycle('resume'); 	
				}
		    
			});
		<?php endif;?>
		
	});
/* ]]> */
</script>