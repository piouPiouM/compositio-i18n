<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
 <div class="p-head">
  <h1><?php the_title(); ?></h1>
 </div>
<div class="p-con">
<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'compositio') . '</p>'); ?>
</div>
<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'compositio') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<?php if ( comments_open() ) comments_template(); ?>
<?php endwhile; endif; ?>
<?php edit_post_link(__('Edit this entry.', 'compositio'), '<p class="edit">', '</p>'); ?>

<?php get_footer(); ?>