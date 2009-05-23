<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<!--Start Post-->
<div <?php post_class(); ?> style="margin-bottom: 40px;">
      			
<div class="p-head">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'compositio'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
<p class="p-cat"><?php printf(__('In: %s', 'compositio'), get_the_category_list('|', '', false)); ?></p>
<small class="p-time">
<strong class="day"><?php the_time('j') ?></strong>
<strong class="month"><?php the_time('M') ?></strong>
<strong class="year"><?php the_time('Y') ?></strong>
</small>
</div>


<div class="p-con">
<?php the_content(__('Read the rest of this entry &raquo;', 'compositio')); ?>
<div class="clear"></div>
<?php wp_link_pages(); ?>
<?php edit_post_link(__('Edit this entry.', 'compositio'), '<p class="edit">', '</p>'); ?>
</div>


<div class="p-det">
 <ul>
   <li class="p-det-com"><?php comments_popup_link(__('No Comments', 'compositio'), __('(1) Comment', 'compositio'), __('(%) Comments', 'compositio'), '', __('Comments Closed', 'compositio')); ?></li>
  <?php if (function_exists('the_tags')) { ?> <?php the_tags('<li class="p-det-tag">' . __('Tags: ', 'compositio'), ', ', '</li>'); ?> <?php } ?>
</ul>
</div>

</div>
<!--End Post-->

				
<?php //comments_template(); ?>
				
<?php endwhile; ?>
<?php include("nav.php"); ?>
<?php else : ?>

<?php include("404.php"); ?>
<?php endif; ?>

<?php if (function_exists('trackTheme')) { ?>
 <?php trackTheme("Compositio");  ?>
<?php } ?>

<?php get_footer(); ?>
