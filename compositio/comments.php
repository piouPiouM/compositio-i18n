<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die(__('Please do not load this page directly. Thanks!', 'compositio'));

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p><?php _e('This post is password protected. Enter the password to view comments.', 'compositio'); ?></p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = ' alt';
?>

<!-- You can start editing here. -->

<div id="comments" class="comments-list">
<?php if ($comments) : ?>
<h2><?php printf(__('%1$s to %2$s', 'compositio'), comments_number(__('No Responses', 'compositio'), __('1 Response', 'compositio'), __('% Responses', 'compositio')), the_title('', '', false)); ?></h2>

<?php foreach ($comments as $comment) : ?>
 <div class="entry <?php echo $oddcomment; ?>" id="comment-<?php comment_ID(); ?>">
 <p class="avt"><img src="<?php gravatar("R", 45, get_bloginfo('template_url')."/images/avatar-replace.png"); ?>" alt="<?php _e('Avatar', 'compositio'); ?>" /></p>
 
 <p class="name"><?php comment_author_link(); ?></p>
 <p class="date"><?php printf(__('<a href="#comment-%1$s">%2$s at %3$s</a>', 'compositio'), get_comment_ID(), get_comment_date(__('F jS, Y', 'compositio')), get_comment_time()); edit_comment_link(__('edit', 'compositio'),'&nbsp;&nbsp;',''); ?></p>
<?php if ($comment->comment_approved == '0') : ?>
 <p><em style=" font-style: normal; color:#FF0000;"><?php _e('Your comment is awaiting moderation.', 'compositio'); ?></em></p>
 <?php endif; ?>
 <div class="con"><?php comment_text() ?></div>
</div>

<?php
/* Changes every other comment to a different class */
$oddcomment = ( empty( $oddcomment ) ) ? ' alt ' : '';
?>
<?php endforeach; ?>

<?php elseif ('open' != $post->comment_status) : ?>
<p class="note"><?php _e('Comments are closed.', 'compositio'); ?></p>
<?php endif; ?>
</div>

<?php if ('open' == $post->comment_status) : ?>
<div class="comments-form">
<h3 id="respond"><?php _e('Comment Form', 'compositio'); ?></h3>
<form id="comment-form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'compositio'), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>

<?php if ( $user_ID ) : ?>
<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'compositio'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?></p>
<?php else : ?>
<p><input id="comment-name" value="<?php echo $comment_author; ?>" name="author" type="text" class="formid" /> <label for="comment-name"><?php printf(__('Your Name%s', 'compositio'), ($req) ? '<strong class="required">' . __(' (required)', 'compositio') . '</strong>' : ''); ?></label></p>
<p><input id="comment-email" name="email" value="<?php echo $comment_author_email; ?>" type="text" class="formemail" /> <label for="comment-name"><?php printf(__('Your Email%s', 'compositio'), ($req) ? '<strong class="required">' . __(' (required)', 'compositio') . '</strong>' : ''); ?></label></p>
<p><input id="comment-url" name="url" value="<?php echo $comment_author_url; ?>" type="text" class="formuri"/> <label for="comment-name"><?php _e('Your URL', 'compositio'); ?></label></p>
<?php endif; ?>
<p><textarea name="comment" cols="50" rows="8"></textarea></p>
<p><input name="submit" type="submit" id="submit" tabindex="5" class="button" value="<?php _e('Submit Comment', 'compositio'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<?php endif; ?>
</form>
</div>
<?php endif; ?>
