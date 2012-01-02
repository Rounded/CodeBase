<form method="get" id="searchform" class="" action="<?php bloginfo('home'); ?>/">
	<fieldset>
		<input type="text" value="<?php _e('Search',TDOMAIN);?>" name="s" id="s" onfocus="if (this.value == '<?php _e('Search',TDOMAIN);?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search',TDOMAIN);?>';}" />

		<input type="image" value="Go" src="<?php echo THEME_IMAGES;?>/search-btn.png" class="submit btn" />
	</fieldset>
</form>
