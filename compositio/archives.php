<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<h2><?php _e('Archives by Month:', 'compositio'); ?></h2>

<ul>
 <?php wp_get_archives('type=monthly'); ?>
</ul>

<h2><?php _e('Archives by Subject:', 'compositio'); ?></h2>
 <ul>
 <?php wp_list_categories(); ?>
</ul>


<?php get_footer(); ?>