<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if ( is_tag() ) {
			echo 'Tag Archive for &quot;'.$tag.'&quot; | '; bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title(); echo ' Archive | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
		} elseif ( is_home() ) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		}  elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} else {
			echo wp_title( ' | ', false, right ); bloginfo( 'name' );
		} ?></title>
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="generator" content="WordPress" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width; initial-scale=1"/><?php /* Add "maximum-scale=1" to fix the Mobile Safari auto-zoom bug on orientation changes, but keep in mind that it will disable user-zooming completely. Bad for accessibility. */ ?>
	<link rel="index" title="<?php bloginfo( 'name' ); ?>" href="<?php echo get_option('home'); ?>/" />
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); /* Loads jQuery if it hasn't been loaded already */ ?>
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php /* Remove the Less Framework CSS line to not include the CSS Reset, basic styles/positioning, and Less Framework itself */?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/style1.css" />
	<?php wp_head(); ?> <?php /* this is used by many Wordpress features and for plugins to work proporly */ ?>
</head>

<body>

<div class="hide" style="display: none;">
	<p><a href="#content">Skip to Content</a></p><?php /* used for accessibility, particularly for screen reader applications */ ?>
</div><!--.hide-->

<?php  if (is_user_logged_in()) { /* An option admin menu that only displays when logged in */ ?>
<div id="if-logged-in" style="display:none;">
	<div class="container">
		<p class="left">
			<a href="<?php bloginfo('url'); ?>/wp-admin/">Control Panel</a> |
			<a href="<?php bloginfo('url'); ?>/wp-admin/edit.php">Posts</a> |
			<a href="<?php bloginfo('url'); ?>/wp-admin/edit.php?post_type=page">Pages</a> |
			<a href="<?php bloginfo('url'); ?>/wp-admin/edit-comments.php">Comments</a> |
			<a href="<?php bloginfo('url'); ?>/wp-admin/upload.php">Media</a> 
		</p>
		<p class="right">
			<a href="<?php bloginfo('url'); ?>/wp-admin/options-general.php">Settings</a> |
			<a href="<?php bloginfo('url'); ?>/wp-admin/profile.php">Profile</a> |
			<?php wp_loginout() ?>
		</p>
	</div>
</div><!--#if-logged-in-->
<?php } ?>

	<div id="header">
		<header>
			<div id="top-bar"></div>
			<div class="container">
				<div id="nav-primary" class="nav">
					<nav>
						<?php if ( is_user_logged_in() ) {
						     wp_nav_menu( array( 'theme_location' => 'logged-in-menu' ) ); /* if the visitor is logged in, this primary navigation will be displayed */
						} else {
						     wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); /* if the visitor is NOT logged in, this primary navigation will be displayed */
						     /* if a single menu should be displayed for both conditions, set the same menues to be displayed under both conditions through the Wordpress backend */
						} ?>
					</nav>
				</div><!--#nav-primary-->
				<div id="title">
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
						<h1 id="logo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><img src="http://weqwiu2183.cloudformed.com/wp-content/uploads/2011/04/jb-logo.png" alt="<?php bloginfo('name'); ?>" /></a></h1>
						<h2 id="tagline"><?php bloginfo('description'); ?></small></h2>
					<?php } else { ?>
						<h1 id="logo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><img src="http://weqwiu2183.cloudformed.com/wp-content/uploads/2011/04/jb-logo.png" alt="<?php bloginfo('name'); ?>" /></a></h1>
						<h2 id="tagline"><?php bloginfo('description'); ?></small></h2>
					<?php } ?>
				</div><!--#title-->
				
				<?php if ( ! dynamic_sidebar( 'Header' ) ) : ?>
					<!-- Wigitized Header -->
				<?php endif ?>
				<div class="clear"></div>
			</div><!--.container-->
		</header>
	</div><!--#header-->
	<div class="container">