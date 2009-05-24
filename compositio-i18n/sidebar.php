<div class="SR">

<!-- Start Search -->
<div class="search">
  <form method="get" action="<?php bloginfo('url'); ?>/">
   <fieldset>
     <legend><span><?php _e('Search'); ?></span></legend>
   <input type="text" value="<?php the_search_query(); ?>" name="s" /><button type="submit"><?php echo _c('Search|verb', 'compositio'); ?></button>
   </fieldset>
  </form>
<div class="syn">
 <ul>
  <li><?php printf(__('<a href="%s">Entries</a> (RSS)', 'compositio'), get_bloginfo('rss2_url', 'display')); ?></li>
  <li><?php printf(__('<a href="%s">Comments</a> (RSS)', 'compositio'), get_bloginfo('comments_rss2_url', 'display')); ?></li>
 </ul>
</div>
</div>
<!-- End Search -->

<!-- Start About This Blog -->
<div class="about">
<h3><?php _e('About this blog', 'compositio'); ?></h3>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque sed felis. Aliquam sit amet felis. Mauris semper, velit semper laoreet dictum, quam diam dictum urna, nec placerat elit nisl in quam. Etiam augue pede, molestie eget, rhoncus at, convallis ut, eros. Aliquam pharetra.</p>
</div>
<!-- End About This Blog -->


<?php if (function_exists('get_flickrrss')) { ?>
<div class="photostream">
<h3><?php _e('Photostream', 'compositio'); ?></h3>
<!-- Start Flickr Photostream -->
  <ul>
   <?php get_flickrrss(); ?> 
  </ul>
<!-- End Flickr Photostream -->
</div>
<?php } ?>


<div class="categs">
  <div> 
	<h3><?php _e('Categories'); ?></h3>
	 <ul> 
		<?php wp_list_categories('show_count=1&title_li='); ?> 
	</ul> 
	</div>
	<div style="margin-left: 10px;">
	 <h3><?php _e('Archives'); ?></h3>
	  <ul>
	   <?php wp_get_archives('type=monthly'); ?>
	  </ul>
	</div>
</div>


<!-- Start Recent Comments/Articles -->
<div class="recent">
 <ul class="tabs">
  <li><a class="active" href="#tab-comments"><?php _e('Recent Comments', 'compositio'); ?></a></li>
  <li><a href="#tab-posts"><?php _e('Recent Posts', 'compositio'); ?></a></li>
  <li><a style="margin-right:0px;" href="#tab-tags"><?php _e('Tags', 'compositio'); ?></a></li>
 </ul>
 <ul id="tab-comments">
  <?php dp_recent_comments(5); ?>
 </ul> 
 <ul id="tab-posts">
 <?php $posts = get_posts("numberposts=10&orderby=post_date&order=DESC"); foreach($posts as $post) : ?>	
  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
 <?php endforeach; ?>
 </ul>
 <div id="tab-tags">
  <?php wp_tag_cloud(''); ?>
 </div>
</div>
<!-- End Recent Comments/Articles -->


<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<?php endif; ?>
</div>
<!-- End SideBar1 -->
