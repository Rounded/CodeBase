<?php 

//Saving hook for options -- Takes post data and sends it to the appended filename ( after admin_post_ )
add_action('admin_post_pagelines_save', 'pagelines_save');

function pagelines_save(){
	$pagelines = new Options;
	$pageaction = '';

	if($_POST['pagelines_form'] == "feature_form"){
		$setup_page = 'admin.php?page=pagelines_feature';
		
		if($_POST['restore_default_feature']){

			$pagelines->restore_features();		
			$pageaction = "featuresrestored";

		}elseif($_POST['restore_feature_backup']){

			$pagelines->restore_features_from_backup();
			wp_redirect(admin_url($setup_page.'&pageaction=restoredfrombackup&selectedtab=' . $_POST['selectedtab']));
			$pageaction = "featuresrestoredfrombackup";
		
		}elseif($_POST['backup_feature']){

			$pagelines->backup_features($_POST);
			$pageaction = "featuresbackup";

		}elseif($_POST['delete_feature_slide']){
		
			$delete_slide_no = key($_POST['delete_feature_slide']);
			unset($_POST['feature'][$delete_slide_no]);
			$pagelines->save_features($_POST);
			$pageaction = "deleteslide";
		
		}elseif($_POST['newslide']){

			$_POST['feature'][] = array();
			$pagelines->save_features($_POST);
			$pageaction = "newslide";
		
		}elseif($_POST['delete_feature_box']){
		
			$delete_box_no = key($_POST['delete_feature_box']);
			unset($_POST['fbox'][$delete_box_no]);
			$pagelines->save_features($_POST);
			$pageaction = "deletebox";
		
		}elseif($_POST['newfbox']){

			$_POST['fbox'][] = array();
			$pagelines->save_features($_POST);
			$pageaction = "newbox";
		
		}elseif($_POST['submit']){	

			$pagelines->save_features($_POST);
			$pageaction = "featuresupdated";
		
		}
	}else{
		
		$setup_page = 'admin.php?page=pagelines';
	
		if($_POST['restore_default_option']){

			$pagelines->restore_options();
			$pageaction = 'optionrestored';

		}elseif($_POST['restore_option_backup']){

			$pagelines->restore_from_backup();
			$pageaction = 'optionrestoredfrombackup';

		}elseif($_POST['backup_option']){

			$pagelines->backup_options($_POST);
			$pageaction = 'optionbackup';

		}elseif($_POST['submit']){

			$pagelines->update_options_from_array(get_option_array());
			$pagelines->save_options();
			$pageaction = 'optionsupdated';
		}
	}

	wp_redirect(admin_url($setup_page.'&pageaction='.$pageaction.'&selectedtab='.$_POST['selectedtab']));	
}

// OPTION HEADER

function get_option_header($option_type, $intro, $save_button = 'Save'){?>
	<div class='wrap'>
		<table id="optionstable"><tbody><tr><td valign="top" width="100%">
			
		  <form method="post" action="<?php echo admin_url('admin-post.php?action=pagelines_save'); ?>">
			  
				 <!-- hidden fields -->
					<?php wp_nonce_field('update-options') ?>
					
					<input type="hidden" name="pagelines_form" id="pagelines_form" value="<?php echo $option_type;?>_form" />	
					<input type="hidden" name="selectedtab" id="selectedtab" value="" />
					<input type="hidden" name="action" value="pagelines_save" /> <!-- the function we execute to process -->
				
					<?php if($_GET['pageaction']):?>
							<?php $a = $_GET['pageaction'];?>
							<div id="message" class="updated fade" style="background-color: rgb(255, 251, 204);">
								<p>	<strong>
									<?php 
									if($a == 'optionrestored') echo "Options restored to default.";
									elseif($a =='optionrestoredfrombackup') echo "Options restored from backup";	
									elseif($a =='optionbackup') echo "Options backed up in database";	
									elseif($a == 'optionsupdated') echo "Options Saved.";
									elseif($a == 'featuresrestored') echo "Feature information restored to default.";
									elseif($a =='featuresrestoredfrombackup') echo "Feature information restored from backup.";	
									elseif($a =='featuresbackup') echo "Feature information backed up in database";	
									elseif($a =='newbox') echo "New feature box created";	
									elseif($a =='deletebox') echo "Feature box deleted.";	
									elseif($a =='newslide') echo "New feature slide created";	
									elseif($a =='deleteslide') echo "Feature slide deleted.";
									elseif($a =='featuresupdated') echo "Feature setup saved.";
									elseif($a =='activated') echo THEMENAME ." activated!";
											
									?>

								</strong></p>
							</div>
					<?php endif;?>
					<?php if(floatval(phpversion()) < 5.0):?>
					<div id="message" class="updated fade" style="background-color: rgb(255, 251, 204);">	
						<p><strong>You are using PHP version <?php echo phpversion(); ?>.</strong>  Version 5 or higher is required for this theme to work correctly.</p>  
						<p>Please check with your host about upgrading to a newer version.</p> 
					</div>
					<?php endif;?>

			<?php
				if(isset($_GET['selectedtab']) && !empty($_GET['selectedtab'])) {
					$tab = $_GET['selectedtab'];
				} else {
					$tab = 0;
				}
			?>

				<script type="text/javascript">
						jQuery.noConflict();
						jQuery(document).ready(function($) {						
							var $myTabs = $("#tabs").tabs({ fx: { opacity: "toggle", duration: "fast" }, selected: <?php echo $tab; ?>});

							$('#tabs').bind('tabsshow', function(event, ui) {
								$("#selectedtab").val($('#tabs').tabs('option', 'selected'));
							});
							
							$('#newoption_button').click(function() { // bind click event to link
							    $myTabs.tabs('select', 8); // switch to third tab
							    return false;
							});
						});
				</script>

						<div id="optionsheader">

							<div class="hl"></div>
							<div id="optionstop" class="fix">
								<!-- Form Title -->

								<!-- Configuration intro text -->
								<div class="options_intro">
									<div class="form_title">
										<?php echo THEMENAME;?> &raquo; 
										<?php if($option_type == 'option'):?>
											<?php _e('Theme Options', TDOMAIN);?>
										<?php elseif($option_type == 'feature'):?>
											<?php _e('Feature Setup', TDOMAIN);?>
										<?php endif;?>
									</div>
									<?php echo $intro;?>
								</div>

								<!-- Pagelines Link -->
								<a class="optionsheader_plink" href="http://www.pagelines.com/" target="_blank">&nbsp;</a>
							</div>
						
							
							
							<div id="optionssubheader">
								<div class="hl"></div>
								<div class="padding fix">
									<div class="subheader_links">
										<?php if(!VPRO):?>
											<a class="sh_pro" href="http://www.pagelines.com/themes/<?php echo strtolower(THEMENAME).'pro';?>/"><?php _e('Get ', TDOMAIN);?> <?php echo THEMENAME;?>Pro</a>
											<a class="sh_pro" href="http://www.pagelines.com/demos/<?php echo strtolower(THEMENAME).'pro';?>/"><?php echo THEMENAME;?>Pro <?php _e('Demo', TDOMAIN);?> </a>
										<?php else:?>
											<a class="sh_docs" href="http://www.pagelines.com/docs/"><?php _e('Theme Docs', TDOMAIN);?></a>
											<a class="sh_forum" href="http://www.pagelines.com/forum/"><?php _e('Forum', TDOMAIN);?></a>
										<?php endif;?>
									</div>
									
									<div class="subheader_right">
										<?php if($option_type == 'feature'):?>
											<input class="button-secondary" type="submit" name="newslide" value="New Feature Slide" />
											<input class="button-secondary" type="submit" name="newfbox" value="New Feature Box" />
										<?php elseif($option_type == 'option' && VDEV):?>
											<a class="button-secondary" href="#newoption" name="newoption" id="newoption_button" >New Custom Option</a>

										<?php endif;?>
							
										<input class="button-primary" type="submit" name="submit" value="<?php echo $save_button;?>" />
									</div>
								</div>
							</div>
							
						

							<div class="clear"></div>
						</div>			
<?php } 

// OPTION ENGINE

function option_engine( $optiontype, $optionname, $optionvalue = null, $optiontitle, $option_eshort, $option_exp, $optionlabel = '', $args = ''){
	$defaults = array(
		'version' => null,
		'img_width' => 200, 
		'selectvalues' => '',
		'optionicon' => '', 
		'layout' => 'normal'
	);

	$option_atts = wp_parse_args( $args, $defaults );
	extract( $option_atts, EXTR_SKIP );
	$option_atts['selectvalues'] = maybe_unserialize(stripslashes($option_atts['selectvalues']));

?>

<div class="optionrow fix <?php if(isset($option_atts['layout']) && $option_atts['layout']=='full') echo 'wideinputs';?>">
	<div class="optiontitle ">
		<?php if($option_atts['optionicon']):?>
			<img src="<?php echo $option_atts['optionicon'];?>" class="optionicon" style=" ">
		<?php endif;?>
		<strong><?php echo $optiontitle;?></strong><br/>
		<small><?php echo $option_eshort;?></small><br/>
	</div>
	<div class="theinputs ">
		<div class="optioninputs">
			
		<?php if($optiontype == 'image_url'):?>
			<p>	<label class="context" for="<?php echo $optionname;?>">Full Image URL</label><br/>
				<input class="regular-text" type="text" id="<?php echo $optionname;?>" name="<?php echo $optionname;?>" value="<?php echo $optionvalue; ?>" /></p>
			<p>
				<?php if($optionvalue):?>
					<div class="context">Current image:</div> 
					<img class="border" src="<?php echo $optionvalue;?>" style="width:<?php echo $option_atts['img_width'];?>px"/></p>
				<?php endif;?>
			</p>
		
		<?php elseif($optiontype == 'check'):?>
			<p>
				<label for="<?php echo $optionname;?>" class="context"><input class="admin_checkbox" type="checkbox" id="<?php echo $optionname;?>" name="<?php echo $optionname;?>" <?php if($optionvalue) echo 'checked'; else echo 'unchecked';?> /><?php echo $optionlabel;?></label>
			</p>
		<?php elseif($optiontype == 'check_multi'):?>
			
				<?php foreach($option_atts['selectvalues'] as $multi_optionid => $multi_o):?>
				<p>
					<label for="<?php echo $multi_optionid;?>" class="context"><input class="admin_checkbox" type="checkbox" id="<?php echo $multi_optionid;?>" name="<?php echo $multi_optionid;?>" <?php if(pagelines($multi_optionid)) echo 'checked'; else echo 'unchecked';?> /><?php echo $multi_o['inputlabel'];?></label>
				</p>
				<?php endforeach;?>		
		<?php elseif($optiontype == 'text_small'):?>
			<p>
				<label for="<?php echo $optionname;?>" class="context"><?php echo $optionlabel;?></label>
				<input class="small-text"  type="text" name="<?php echo $optionname;?>" id="<?php echo $optionname;?>" value="<?php echo $optionvalue; ?>" />
			</p>
		<?php elseif($optiontype == 'text'):?>
			<p>
				<label for="<?php echo $optionname;?>" class="context"><?php echo $optionlabel;?></label>
				<input class="regular-text"  type="text" name="<?php echo $optionname;?>" id="<?php echo $optionname;?>" value="<?php echo $optionvalue; ?>" />
			</p>
		<?php elseif($optiontype == 'textarea' || $optiontype == 'textarea_big'):?>
			<p>
				<label for="<?php echo $optionname;?>" class="context"><?php echo $optionlabel;?></label><br/>
				<textarea name="<?php echo $optionname;?>" class="html-textarea <?php if($optiontype=='textarea_big') echo "longtext";?>" cols="70%" rows="5"><?php echo $optionvalue; ?></textarea>
			</p>
		<?php elseif($optiontype == 'radio'):?>
				<?php foreach($option_atts['selectvalues'] as $selectid => $selecttext):?>
					<p>
						<input type="radio" id="<?php echo $optionname;?>_<?php echo $selectid;?>" name="<?php echo $optionname;?>" value="<?php echo $selectid;?>" <?php if($optionvalue == $selectid):?>checked<?php endif;?>> 
						<label for="<?php echo $optionname;?>_<?php echo $selectid;?>"><?php echo $selecttext;?></label>
					</p>
				<?php endforeach;?>
			
		<?php elseif($optiontype == 'select' || $optiontype == 'select_same'):?>
			<p>
				<label for="<?php echo $optionname;?>" class="context"><?php echo $optionlabel;?></label><br/>
				<select id="<?php echo $optionname;?>" name="<?php echo $optionname;?>">
					<option value="">&mdash;SELECT&mdash;</option>
					
					<?php foreach($option_atts['selectvalues'] as $sval => $stext):?>
						<?php if($optiontype == 'select_same'):?>
								<option value="<?php echo $stext;?>" <?php if($optionvalue==$stext) echo 'selected';?>><?php echo $stext;?></option>
						<?php else:?>
								<option value="<?php echo $sval;?>" <?php if($optionvalue==$sval) echo 'selected';?>><?php echo $stext;?></option>
						<?php endif;?>
					
					<?php endforeach;?>
				</select>
			</p>
		<?php elseif($optiontype == 'text_content'):?>
			<div class="text_content fix"><?php echo $option_exp;?></div>
		<?php endif;?>
			
			</div>
		</div>
	
		<?php if($option_exp && $optiontype != 'text_content'):?>
		<div class="theexplanation">
			<div class="context">More Info</div>
			<p><?php echo $option_exp;?></p>
	
		</div>
		<?php endif;?>
		<div class="clear"></div>
	</div>
	
<?php }


// OPTION FOOTER 

function get_option_footer($type, $save_button){?>
		
		
		<div id="optionsfooter">
			<div class="hl"></div>
				<div class="theinputs">
					<?php if(VPRO):?><a class="admin_footerlink" href="http://www.pagelines.com/feedback/" target="_blank"><?php _e('Customer Feedback Form &raquo;', TDOMAIN);?></a><?php endif;?>
	  	  			<input class="button-primary" type="submit" name="submit" value="<?php echo $save_button;?>" />
				</div>
			<div class="clear"></div>
		</div>

		<div class="optionrestore">
				<p>
					<div class="context"><input class="button-primary" type="submit" name="backup_<?php echo $type;?>" value="Backup <?php echo ucfirst($type);?> Information" />To be sure you don't lose your <?php echo $type;?> information, make sure to save a copy in your DB from time to time.</div>

				</p>
				<p>
					<div class="context">	<input class="button-secondary" type="submit" name="restore_<?php echo $type;?>_backup" onClick="return ConfirmRestoreBackup();" value="Restore From Backup" />If you'd like to restore the <?php echo $type;?>s from your latest backup, use this button.</div>
					<?php pl_action_confirm('ConfirmRestoreBackup', 'Are you sure? This will restore your '.$type.' information to the most recent database backup.');?>	
				</p>
				<p>
					<div class="context"><input class="button-secondary" type="submit" name="restore_default_<?php echo $type;?>" onClick="return ConfirmRestore();" value="Restore <?php echo ucfirst($type);?>s To Default" />Sometimes the <?php echo $type;?> information can get tweaked and its best to restore to its defaults. To do that use this button.</div>
				<?php pl_action_confirm('ConfirmRestore', 'Are you sure? This will restore '.$type.' information to its default HTML.');?>
				</p>

			<br/>
			<br/>
		</div>

		 <!-- close entire form -->
	  	</form>
	</td></tr></tbody></table>

	<div class="clear"></div>
	</div>	
	
<?php }

function pl_action_confirm($name, $text){ ?>
	
	<script language="jscript" type="text/javascript">
		function <?php echo $name;?>(){	
			var a = confirm ("<?php echo $text;?>");
			if(a) return true;
			else return false;
		}
	</script>
	
<?php }

?>