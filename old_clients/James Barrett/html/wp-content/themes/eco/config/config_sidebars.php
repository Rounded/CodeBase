<?php

register_sidebar(array(
'name'=>'main_sidebar',
'description' => __('The main sidebar for your site.', TDOMAIN),
       'before_widget' => '<div id="%1$s" class="%2$s widget"><div class="winner">',
       'after_widget' => '&nbsp;</div></div>',
       'before_title' => '<h4 class="wtitle">',
       'after_title' => '</h4>'
   ));

register_sidebar(array(
'name'=>'Content Sidebar',
'description' => __('These widgets appear underneath your page/post content. Select the "individual page" checkbox option for them to appear.', TDOMAIN),
    'before_widget' => '<div id="%1$s" class="%2$s widget"><div class="winner">',
    'after_widget' => '</div></div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

if(VPRO == 1) { include(PRO.'/sidebars_pro.php'); }

?>