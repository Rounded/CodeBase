<?php 

function pagelines_theme_options() {
	
	if(VPRO) $intro = '<small><strong>Welcome to '.THEMENAME.' theme options.</strong> This section allows you to customize your theme. <br/>We hope you are enjoying this premium theme from <a href="http://www.pagelines.com">PageLines</a>.</small>';
	else $intro = '<small><strong>Welcome to '.THEMENAME.' theme options.</strong> This section allows you to customize your theme.<br/>
	If you\'d like more features; please check out <a href="'.PROVERSIONOVERVIEW.'">'.PROVERSION.'</a> for tons more templates, options and support.
	</small>';
	
	$option_type = 'option';
	$save_button = "Save Options";
	get_option_header($option_type, $intro, $save_button);
?>			
	<div id="tabs">	
		<ul id="tabsnav">
			<li><span class="graphic top">&nbsp;</span></li>
			<?php 	
				$optionarray = get_option_array();
			?>
			<?php foreach($optionarray as $menuitem => $options):?>
				<li>
					<a class="<?php echo $menuitem;?>" href="#<?php echo $menuitem;?>">
						<span><?php echo ucwords(str_replace('_',' ',$menuitem));?></span>
					</a>
				</li>
			<?php endforeach;?>
	
			<li><span class="graphic bottom">&nbsp;</span></li>
		</ul>
		<div id="thetabs" class="fix">
			<?php if(!VPRO):?>
				<div id="vpro_billboard">
					<div class="vpro_desc">
						<strong>Pro CMS Version: <?php echo PROVERSION;?> </strong><br/>
						<?php echo THEMENAME;?> is the free version of <?php echo PROVERSION;?>, a full CMS theme. In the pro version you will find tons more templates, options and widgetized areas for pro content management and marketing. <a href="<?php echo PROVERSIONOVERVIEW;?>">View Overview &raquo;</a> 
					</div>
					<a class="vpro_thumb" href="<?php echo PROVERSIONOVERVIEW;?>"><img src="<?php echo THEME_IMAGES;?>/pro-thumb-125x50.png" alt="<?php echo PROVERSION;?>" /></a>
				</div>
			<?php endif;?>
			<?php foreach($optionarray as $menuitem => $options):?>
		
				<div id="<?php echo $menuitem;?>" class="tabinfo fix">
					<div class="tabtitle"><?php echo ucwords(str_replace('_',' ',$menuitem));?></div>
				
					<?php foreach($options as $optionid => $o):?>
						<?php if(!isset($o['version']) || (isset($o['version']) && $o['version'] == 'pro' && VPRO)):?>
					<?php 
									if($o['selectvalues']) $serialize_subvalues = serialize($o['selectvalues']);
									$engine_args = 'version='.$o['version'].'&img_width='. $o['imagepreview']. '&selectvalues='.$serialize_subvalues.'&optionicon='. $o['optionicon'].'&layout='.$o['layout'];
									if(isset($o['wp_option'])) $optionvalue = get_option($optionid);
									else $optionvalue = pagelines($optionid);
									option_engine($o['type'], $optionid, $optionvalue, $o['title'], $o['shortexp'], $o['exp'], $o['inputlabel'], $engine_args);?>
						<?php endif;?>
					<?php endforeach; ?>
				</div>
			
			<?php endforeach; ?>	
		</div> <!-- End the tabs -->
	</div> <!-- End tabs -->

	<?php get_option_footer('option', $save_button);?>
<?php }

function pagelines_feature_options() {
	
		$intro = '<small><strong>Welcome to '.THEMENAME.' feature setup.</strong> This section allows you to customize this theme\'s feature templates. <br/>
		We hope your enjoying this premium theme from <a href="http://www.pagelines.com">PageLines</a>.</small>';
		$save_button = "Save Setup";
		$option_type = "feature";
		
		get_option_header($option_type, $intro, $save_button );
	?>			
	<div id="tabs">

		<ul id="tabsnav">
			<li><span class="graphic top">&nbsp;</span></li>
			<?php $featurearray = get_feature_array();?>
			<?php foreach($featurearray as $menuitem => $options):?>
			<li><a onClick="" class="<?php echo $menuitem;?>" href="#<?php echo $menuitem;?>"><span><?php echo ucwords(str_replace('_',' ',$menuitem));?></span></a></li>
			<?php endforeach;?>
			
			<?php if(is_array(pagelines('features'))):?>
				<?php foreach(pagelines('features') as $key => $feature):?>
					<li>
						<a onClick="" class="feature <?php echo 'feature'.$key;?>" href="#<?php echo 'feature'.$key;?>">
							<span>
								<?php if(isset($feature['name']) && $feature['name'] != null):?>
									<?php echo $feature['name'];?>
								<?php else:?>
									<?php _e('New Feature Slide',TDOMAIN);?>
								<?php endif;?>
							</span>
						</a>
					</li>
				<?php endforeach;?>
			<?php endif;?>
			<?php if(is_array(pagelines('fboxes'))):?>
				<?php foreach(pagelines('fboxes') as $key => $fbox):?>
					<li>
						<a onClick="" class="fbox" href="#<?php echo 'fbox'.$key;?>">
							<span>
								<?php if(isset($fbox['name']) && $fbox['name'] != null):?>
									<?php echo $fbox['name'];?>
								<?php else:?>
									<?php _e('New Feature Box',TDOMAIN);?>
								<?php endif;?>
							</span>
						</a>
					</li>
				<?php endforeach;?>
			<?php endif;?>
			<li><span class="graphic bottom">&nbsp;</span></li>

		</ul>
		<div id="thetabs" class="fix">		
				<?php foreach($featurearray as $menuitem => $options):?>
				<div id="<?php echo $menuitem;?>" class="tabinfo fix">
					<div class="tabtitle"><?php echo ucwords(str_replace('_',' ',$menuitem));?></div>
				
					<?php foreach($options as $optionid => $o):?>
						
						<?php 
							if($o['selectvalues']) $serialize_subvalues = serialize($o['selectvalues']);
							$engine_args = 'img_width='.$o['imagepreview'].'&selectvalues='.$serialize_subvalues.'&optionicon='.$o['optionicon'].'&layout='.$o['layout'];
							if(isset($o['wp_option'])) $optionvalue = get_option($optionid);
							else $optionvalue = pagelines($optionid);
							option_engine($o['type'], $optionid, $optionvalue,$o['title'], $o['shortexp'], $o['exp'], $o['inputlabel'], $engine_args);
						?>
											
					<?php endforeach; ?>
			</div>

			<?php endforeach; ?>
			
			<?php $fset = get_feature_setup();?>
			
			<?php if(is_array(pagelines('features'))):?>
				<?php foreach(pagelines('features') as $key => $feature):?>
					
					<div id="<?php echo 'feature'.$key;?>" class="featuretab tabinfo fix">
						<div class="tabtitle">
							<?php if(isset($feature['name']) && $feature['name'] != null):?>
								<?php echo $feature['name'];?>
							<?php else:?>
								<?php _e('New Feature Slide',TDOMAIN);?>
							<?php endif;?>
						</div>
								<?php
									// goes through setup array and makes sure option array has option have it set (for upgrades).. if not it will add it..
									foreach($fset as $setupoption => $val){
										if(!array_key_exists($setupoption, $feature)){
											$feature[$setupoption] = '';
										}
									}
								?>
							
						<?php foreach($feature as $field => $fieldvalue):?>
							<?php if(isset($fset[$field])):?>
								
								
								<?php 
									$engine_args = 'img_width='.$fset[$field]['imagepreview'];
									$optionid = 'feature['.$key.']['.$field.']';														
									option_engine($fset[$field]['type'], $optionid, $fieldvalue, $fset[$field]['title'], $fset[$field]['shortexp'], $fset[$field]['exp'], $fset[$field]['inputlabel'], $engine_args);
								?>
								
							<?php endif;?>
						<?php endforeach;?>
					
						<div class="insidebox context">
							<input class="button-secondary" type="submit" name="delete_feature_slide[<?php echo $key;?>]" onClick="return ConfirmDelSlide();" value="Delete" /> Delete this feature box.
						</div>
						<?php pl_action_confirm('ConfirmDelSlide', 'Are you sure? This will delete this feature slide.');?>		
					</div>
					
			<?php endforeach;?>
			<?php endif;?>

			<?php $fboxset = get_fbox_setup();?>

			<?php if(is_array(pagelines('fboxes'))):?>
				<?php foreach(pagelines('fboxes') as $key => $fbox):?>
					
					<div id="<?php echo 'fbox'.$key;?>" class="tabinfo fix">
						<div class="tabtitle">
						<?php if(isset($fbox['name']) && $fbox['name'] != null):?>
							<?php echo $fbox['name'];?>
						<?php else:?>
							<?php _e('New Feature Box',TDOMAIN);?>
						<?php endif;?>
						</div>

						<?php
						
							// goes through setup array and makes sure option array has option have it set (for upgrades).. if not it will add it..
							foreach($fboxset as $setupoption => $val){
								if(!array_key_exists($setupoption, $fbox)){
									$fbox[$setupoption] = '';
								}
							}
						
						?>

						<?php foreach($fbox as $field => $fieldvalue):?>			
							<?php if(isset($fboxset[$field])):?>
								
									<?php 													
										$optionid = 'fbox['.$key.']['.$field.']';														
										option_engine($fboxset[$field]['type'], $optionid, $fieldvalue, $fboxset[$field]['title'], $fboxset[$field]['shortexp'], $fboxset[$field]['exp'], $fboxset[$field]['inputlabel']);
									?>						
						
							<?php endif;?>
						<?php endforeach;?>
						
						<div class="insidebox context">
							<input class="button-secondary" type="submit" name="delete_feature_box[<?php echo $key;?>]" onClick="return ConfirmDelBox();" value="Delete" /> Delete this feature box.
						</div>
						<?php pl_action_confirm('ConfirmDelBox', 'Are you sure? This will delete this box.');?>
					</div>
					
				<?php endforeach;?>
			<?php endif;?>
		</div> <!-- end the tabs -->
	</div> <!-- end tabs -->
		
	<?php get_option_footer($option_type, $save_button);?>
<?php } ?>