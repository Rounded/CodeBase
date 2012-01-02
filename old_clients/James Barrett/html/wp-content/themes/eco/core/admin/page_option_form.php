<?php if(VPRO || (!VPRO && $o['version'] != 'pro')):?>
<div class="page_option">
	
		<?php if($o['type']=='check'):?>
		<p style="">
			<label for="<?php echo $optionid;?>">
				<input class="admin_checkbox" type="checkbox" id="<?php echo $optionid;?>" name="<?php echo $optionid;?>" <?php if(pagelines($optionid, $post_ID)) echo 'checked'; else echo 'unchecked';?> /><strong><?php echo $o['inputlabel'];?></strong>
			</label>
		</p>
		<p><?php echo $o['exp'];?></p>
		<?php elseif($o['type'] == 'textarea'):?>
			<div class="page_option_text_exp">
				<p>
				<label for="<?php echo $optionid;?>"><strong><?php echo $o['inputlabel'];?></strong></label><br/>
				<small><?php echo $o['exp'];?></small>
				</p>
			</div>
				<textarea class="html-textarea"  id="<?php echo $optionid;?>" name="<?php echo $optionid;?>" /><?php em_pagelines($optionid, $post_ID); ?></textarea>
		<?php elseif($o['type'] == 'text'):?>
			
			<p>
				<label for="<?php echo $optionid;?>"><strong><?php echo $o['inputlabel'];?></strong></label><br/>
				<small><?php echo $o['exp'];?></small><br/>
				<input type="text" class="html-text"  id="<?php echo $optionid;?>" name="<?php echo $optionid;?>" value="<?php em_pagelines($optionid, $post_ID); ?>" />
			</p>
		<?php elseif($o['type'] == 'select'):?>
				<p>
					<label for="<?php echo $optionid;?>" class="context"><?php echo $o['inputlabel'];?></label><br/>
					<small><?php echo $o['exp'];?></small>
				</p>
				<p>
					<select id="<?php echo $optionid;?>" name="<?php echo $optionid;?>">
						<option value="">&mdash;SELECT&mdash;</option>
						
						<?php foreach($o['selectvalues'] as $sval => $stext):?>
							<?php if($o['type']=='select_same'):?>
									<option value="<?php echo $stext;?>" <?php if(m_pagelines($optionid, $post_ID)==$stext) echo 'selected';?>><?php echo $stext;?></option>
							<?php else:?>
									<option value="<?php echo $sval;?>" <?php if(m_pagelines($optionid, $post_ID)==$sval) echo 'selected';?>><?php echo $stext;?></option>
							<?php endif;?>
						
						<?php endforeach;?>
					</select>
				</p>
			
		<?php endif;?>
	<div class="clear"></div>
</div>
<?php endif; ?>