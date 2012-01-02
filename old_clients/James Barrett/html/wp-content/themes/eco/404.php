<?php 
/*
	This theme is Copyright (C) 2008-2009 Andrew Powers, PageLines.com (andrew AT pagelines DOT com)
*/

global $pagelines;

 	get_header(); 
	require(THEME_LIB.'/_spotlight.php');
	include (THEME_LIB . '/template_posts.php');
	get_footer(); 
	
?>
