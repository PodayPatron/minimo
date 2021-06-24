<?php
/**
 * Theme comments.
 */
?>

<div id="comment">
	<?php if ( have_comments() ) : ?>
		<!-- Comments -->
		<div class="entry-comments mt-20">
			<div class="heading-lines mb-30">
				<h3 class="heading small">
					<?php esc_html( comments_number() ); ?>
				</h3>
			</div>

			<ul class="comment-list">
				<?php
				wp_list_comments(
					array(
						'callback' => 'nz_my_comments_style',
					)
				);
				?>

			</ul>
		</div>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<!-- Leave a Comment -->
		<div id="respond" class="comment-form">
			<div class="heading-lines mb-30">
				<h3 class="heading small">Leave a Comment</h3>
				<p><?php cancel_comment_reply_link(); ?></p>
			</div>
			<form id="form" method="post" action="<?php echo site_url( 'wp-comments-post.php' ); ?>">
				<div class="row">
					<?php if ( ! is_user_logged_in() ) : ?>
						<div class="col-md-4">
							<input name="author" id="name" type="text" placeholder="Name*" aria-label="name">
						</div>
						<div class="col-md-4">
							<input name="email" id="mail" type="email" placeholder="E-mail*" aria-label="email">
						</div>
					<?php else : ?>
						<div class="col-12">
							<p>
								You are logged as 
								<?php
								$current_user = wp_get_current_user();
								echo $current_user->display_name;
								?>
								,<a href="<?php echo wp_logout_url( get_permalink() ); ?>"> Log out</a>
							</p>
						</div>
					<?php endif; ?>
					<div class="col-md-12">
						<textarea name="comment" id="comment" placeholder="Message" rows="8"></textarea>
					</div>
				</div>
				<?php comment_id_fields(); ?>
				<input type="submit" class="btn" value="Leave a comment" id="submit-message" aria-label="send comment">
			</form>
		</div>
	<?php else : ?>
		<p>Comments for this post is close.</p>
	<?php endif; ?>
</div>
