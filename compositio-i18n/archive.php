<?php get_header(); ?>
<?php if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="title"><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'compositio'), single_cat_title('', false)); ?></h2>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="title"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'compositio'), single_tag_title('', false)); ?></h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="title"><?php printf(_c('Archive for %s|Daily archive page', 'compositio'), get_the_time(__('F jS, Y', 'compositio'))); ?></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="title"><?php printf(_c('Archive for %s|Monthly archive page', 'compositio'), get_the_time(__('F, Y', 'compositio'))); ?></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="title"><?php printf(_c('Archive for %s|Yearly archive page', 'compositio'), get_the_time(__('Y', 'compositio'))); ?></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="title"><?php _e('Author Archive', 'compositio'); ?></h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="title"><?php _e('Blog Archives', 'compositio'); ?></h2>
<?php } ?>

<?php include("nav.php"); ?>

<?php while (have_posts()) : the_post(); ?>

<!--Start Post-->
<div <?php post_class(); ?> style="margin-bottom: 40px;">

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
 <?php the_excerpt(); ?>
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

<h2 class="title"><?php __('Not found.', 'compositio'); ?></h2>

<?php endif; ?>
<?php get_footer(); ?>
