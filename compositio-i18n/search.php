<?php get_header(); ?>


<?php if (have_posts()) : ?>
<h2 class="title"><strong><?php _e('Search Results', 'compositio'); ?></strong></h2>

<?php include("nav.php"); ?>

<?php while (have_posts()) : the_post(); ?>
<div <?php post_class(); ?> style="margin-bottom: 40px;" id="post-<?php the_ID(); ?>">

<div class="p-head">
<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'compositio'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
<p class="p-cat"><?php printf(__('In: %s', 'compositio'), get_the_category_list('|', '', false)); ?></p>
<small class="p-time">
<strong class="day"><?php the_time('j') ?></strong>
<strong class="month"><?php the_time('M') ?></strong>
<strong class="year"><?php the_time('Y') ?></strong>
</small>
</div>

<div class="p-con">
<?php the_excerpt() ?>
</div>

<div class="p-det">
 <ul>
   <li class="p-det-com"><?php comments_popup_link(__('No Comments', 'compositio'), __('(1) Comment', 'compositio'), __('(%) Comments', 'compositio'), '', __('Comments Closed', 'compositio')); ?></li>
  <?php if (function_exists('the_tags')) { ?> <?php the_tags('<li class="p-det-tag">' . __('Tags: ', 'compositio'), ', ', '</li>'); ?> <?php } ?>
</ul>
</div>

</div>

<?php endwhile; ?>
<br />
<?php include("nav.php"); ?>
<?php else : ?>

<h2 class="title"><?php _e('Not Found', 'compositio'); ?></h2>

<?php endif; ?>
<?php get_footer(); ?>