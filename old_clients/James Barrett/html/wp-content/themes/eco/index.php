<?php 
/*
	This theme is Copyright (C) 2008-2010 Andrew Powers, PageLines.com (andrew AT pagelines DOT com)

	Licensed under the terms of GPL.

*/

global $pagelines;

 	get_header(); 
	require(THEME_LIB.'/_spotlight.php');
	require(THEME_LIB.'/_sub_head.php');
	require(THEME_LIB.'/template_posts.php');
	get_footer(); 
	
?>
