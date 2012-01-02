<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<!-- Meta Images -->
		<?php if(pagelines('favicon')):?><link rel="shortcut icon" href="<?php echo pagelines('favicon');?>" type="image/x-icon" /><?php endif;?>
		<?php if(pagelines('touchicon')):?><link rel="apple-touch-icon" href="<?php echo pagelines('touchicon');?>" /><?php endif;?>

	<!-- Title and External Script Integration -->
		<?php 
			global $bbpress_forum;
			if($bbpress_forum ):?>
				<title><?php bb_title() ?></title>
				<?php bb_feed_head(); ?>
				<?php bb_head(); ?>
				<link rel="stylesheet" href="<?php bb_stylesheet_uri(); ?>" type="text/css" />
		<?php else:?>
			<title><?php if(is_front_page()) { echo SITENAME; } else { wp_title(''); } ?></title>
		<?php endif;?>
		
	
	<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo CORE_CSS.'/reset.css';?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo CORE_CSS.'/wp_core.css';?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo THEME_ROOT.'/style.css';?>" type="text/css" media="screen" />


		<?php if(VPRO):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/pro.css';?>" type="text/css" media="screen" /><?php endif; ?>
	
		<?php if(VPRO  && pagelines('colorscheme', $post->ID) == 'black'):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/color_black.css';?>" type="text/css" media="screen" /><?php endif;?>
		<?php if(VPRO  && pagelines('colorscheme', $post->ID) == 'blue'):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/color_blue.css';?>" type="text/css" media="screen" /><?php endif;?>
		<?php if(VPRO  && pagelines('colorscheme', $post->ID) == 'orange'):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/color_orange.css';?>" type="text/css" media="screen" /><?php endif;?>
		<?php if(VPRO  && pagelines('colorscheme', $post->ID) == 'red'):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/color_red.css';?>" type="text/css" media="screen" /><?php endif;?>


	<!-- PageLines Options -->
		<?php include (THEME_LIB.'/_customcss.php'); ?>
			
	<!-- Wordpress Stuff -->
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?> <!-- This makes the comment box appear where the ‘reply to this comment’ link is -->
		<?php wp_enqueue_script("jquery"); ?>
		<?php wp_head(); ?>
	
	<!-- Modules w/ Javascript -->	
		<?php if((is_page_template('page-carousel.php') || is_page_template('page-carousel-full.php')) && VPRO) require (CORE_INITS.'/init_carousel.php');?>

		<?php if((is_page_template('page-feature.php') || is_page_template('page-feature-page.php')) && VPRO) require (CORE_INITS.'/init_feature.php');?>

		<?php if(pagelines('enable_drop_down') && VPRO) require (CORE_INITS.'/init_dropdown.php');?>

		<?php if(DEMO) include(CORE_INITS.'/init_demo.php');?>	
		<!-- Font Replacement -->
    		<?php if(VPRO) include(THEME_LIB.'/_font_replacement.php');?>
		<!-- Fix IE -->
    		<?php include(THEME_LIB.'/_ie_fixes.php');?>

		<?php if (pagelines('headerscripts')) echo pagelines('headerscripts');?>
		
</head>
<body <?php body_class(); ?>>
	<?php if (pagelines('asynch_analytics')) echo pagelines('asynch_analytics');?>
	<div id="site">
		
		<div id="header" class="fix">
			<div class="content">
				<?php include(THEME_LIB."/_brand.php");?>
				<?php include(THEME_LIB."/_nav.php");?>
			</div>
		</div>
		<div id="main" class="fix">
