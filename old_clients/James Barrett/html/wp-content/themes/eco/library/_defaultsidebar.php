	<?php if(VPRO) include(THEME_LIB.'/widget_welcome.php');?>
	<?php if(VPRO) include(PRO.'/widget_ads.php');?>
	<?php if(VPRO) include(PRO.'/widget_flickr.php');?>
	<?php include(THEME_LIB.'/_social_icons.php');?>
	
    <!--sidebox start -->
      <div id="dcategories" class="widget_categories widget">
		<div class="winner">
     	   <h3 class="wtitle"><?php _e('Categories',TDOMAIN); ?></h3>
	          <ul>
	            <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
	          </ul>

        </div>
      </div>
      <!--sidebox end -->

      <!--sidebox start -->
      <div id="darchive" class="widget_archive widget">
		<div class="winner">
     	   <h3 class="wtitle"><?php _e('Articles',TDOMAIN); ?></h3>
	          <ul>
            <?php wp_get_archives('type=monthly'); ?>
      		</ul>
        </div>
      </div>
      <!--sidebox end -->


      <!--sidebox start -->
      <div id="dmeta" class="widget_meta widget">
		<div class="winner">
     	   <h3 class="wtitle"><?php _e('Meta',TDOMAIN); ?></h3>
          	<ul>
				<?php wp_register(); ?>
				<li class="login"><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
              <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
			</ul>
        </div>
      </div>
      <!--sidebox end -->