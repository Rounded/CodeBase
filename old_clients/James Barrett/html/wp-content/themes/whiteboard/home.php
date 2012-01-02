<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
<div id="home-image">
	<img src="http://weqwiu2183.cloudformed.com/wp-content/uploads/2011/04/main-image.png" alt="<?php bloginfo('name'); ?>" />
</div><!--#home-image-->
<?php get_sidebar('home'); ?>

<div class="clear"></div>
<div class="h-spacer21"></div>
<div class="clear"></div>

<div id="home-social">
	<div class="column306">
		<div class="padding">
			<h1>Twitter</h1>
		</div><!-- END .padding -->
	</div><!-- END .column306 -->
	<div class="v-spacer21"></div>
	<div class="column306">
		<div class="padding">
			<h1>Facebook</h1>
		</div><!-- END .padding -->
	</div><!-- END .column306 -->
	<div class="v-spacer21"></div>
	<div class="column306">
		<div class="padding">
			<h1>Something Else</h1>
		</div><!-- END .padding -->
	</div><!-- END .column306 -->
</div><!-- END .column306 -->

<div class="clear"></div>

</div> <!-- END .container -->
<?php get_footer(); ?>
