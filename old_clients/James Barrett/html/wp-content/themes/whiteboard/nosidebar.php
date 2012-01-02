<?php
/*
Template Name: No-Sidebars
*/
?>

<?php include('header.php'); ?>

<div id="content_box">

<div id="no_sidebar">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="nosidebar" id="no_sidebar-<?php the_ID(); ?>">
<br>
<div class="entry">
<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
</div>
</div>
<?php endwhile; endif; ?>

</div>

</div>

<?php get_footer(); ?>