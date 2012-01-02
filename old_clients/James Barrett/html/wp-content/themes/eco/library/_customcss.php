<style type="text/css">

<?php if (pagelines('linkcolor')):?>
		a,.commentlist cite,.commentlist cite a, #sub_head #subnav .current_page_item a, #grandchildnav .current_page_item > a, .branding h1 a:hover, #nav ul li a:hover, #nav .current_page_item a, #nav .current_page_item a:hover, #nav .current_page_ancestor a, #nav .current_page_parent a,#nav ul li a:active, .post-comments a:hover{color:<?php echo pagelines('linkcolor'); ?>;}
<?php endif;?>

<?php if(VPRO):?>

	<?php if (pagelines('linkcolor_hover')):?>
		a:hover,.commentlist cite a:hover,  #grandchildnav .current_page_item a:hover, .headline h1 a:hover {color:<?php echo pagelines('linkcolor_hover'); ?>;}
	<?php endif;?>

	<?php if (pagelines('headercolor')):?>
		h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a{color: <?php echo pagelines('headercolor'); ?>;}
	<?php endif;?>
	
	<?php if (pagelines('metacolor')):?>
		.post-title .metabar em{background:<?php echo pagelines('metacolor');?>;}
	<?php endif;?>
	<?php if (pagelines('metacolortext')):?>
		.post-title .metabar em{color:<?php echo pagelines('metacolortext');?>;}
	<?php endif;?>
	<?php if (pagelines('metacolorlink')):?>
		.post-title .metabar em a{color:<?php echo pagelines('metacolorlink');?>;}
	<?php endif;?>
	
	<?php if (pagelines('customcss')):?>
		<?php echo pagelines('customcss');?>
	<?php endif;?>
<?php endif;?>
</style>