<?php if(pagelines('fontreplacement')):?>
<!-- Font Replacement -->
	<script type="text/javascript" src="<?php echo CORE_JS.'/cufon-yui.js';?>" ></script>	
	<script type="text/javascript" src="<?php e_pagelines('font_file', THEME_JS.'/Museo.font.js' ); ?>"></script>
	<script type="text/javascript">
		<?php if(pagelines('replace_font')): ?>
			Cufon.replace('<?php echo pagelines("replace_font"); ?>', {hover: true});
		<?php endif;?>
		Cufon.replace('.fcontent .fsub, .fcontent .ftitle, .fcontent .ftext p,  #highlight .fcontent', {textShadow: '#444 0px -1px'});
		Cufon.replace('.site-title, .pagetitle, a.featurelink', {hover: true, textShadow: '#444 0px -1px'});
	</script>
<?php endif;?>