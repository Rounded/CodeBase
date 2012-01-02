	<div class="clear"></div>
	</div><!--.container-->
	<div class="h-spacer21"></div>
	<div id="footer">
		<footer>
			<div class="container">
				<div id="footer-content">
					<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
						<!--Wigitized Footer-->
					<?php endif ?>
					<!--<div id="nav-footer" class="nav"><nav>
						<?php wp_nav_menu( array('theme_location' => 'footer-menu' )); /* editable within the Wordpress backend */ ?>
					</nav></div>--><!--#nav-footer-->
					<!-- <p class="clear"><a href="#main">Top</a></p>
					<p><a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow">Entries (RSS)</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow">Comments (RSS)</a></p> -->
	
					<p>&copy; <?php echo date("Y") ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.</p>
				</div><!--#footer-content-->
			</div><!--.container-->
		</footer>
	</div><!--#footer-->

<?php wp_footer(); /* this is used by many Wordpress features and for plugins to work proporly */ ?>
</body>
</html>