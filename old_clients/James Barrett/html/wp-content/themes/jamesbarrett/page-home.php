<?php /* Template Name: Home Page */?>

<?php get_header(); ?>
	<div class="h-spacer20"></div>
	<div class="clear"></div>
	
	<div id="htop-section" class="section">
		<div id="htop" class="center">
			<div id="h-img">
				<img src="images/home-img.jpg" alt="Home Image" />
			</div><!-- END #home-img -->
			<?php get_sidebar('home'); ?>
			<div class="clear"></div>
		</div><!-- END #htop -->
	</div><!-- END #htop-section -->
	
	<div class="h-spacer20"></div>
	
	<div id="hbottom-section" class="section">
		<div id="hbottom" class="center">
			<div id="htwitter-column" class="column312">
				<?php dynamic_sidebar( 'HTwitter' ); ?>
			</div>
			<div class="v-spacer21"></div>
			<div id="hfacebook-column" class="column312">
				<?php dynamic_sidebar( 'HFacebook' ); ?>
			</div>
			<div class="v-spacer21"></div>
			<div class="column312"></div>
		</div><!-- END #hbottom -->
	</div><!-- END #hbottom-section -->
	
	<div class="h-spacer20"></div>
<?php get_footer(); ?>