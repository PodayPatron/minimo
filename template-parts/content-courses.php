<?php
/**
 * Courses content template.
 *
 * @package Minimo
 */

?>
<article class="courses-card">
	<div class="nz-post-img">
		<a href="<?php esc_url( the_permalink() ); ?>"></a>
		<div class="nz-img-scale">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>
	<div class="nz-post-text">
		<div class="nz-post-category">
			<?php echo get_the_term_list( get_the_ID(), 'hotel-categories' ); ?>
		</div>
		<h3 class="nz-post-title nz-post-title-courses">
			<a href="<?php esc_url( the_permalink() ); ?>">
				<?php esc_html( the_title() ); ?>
			</a>
		</h3>
	</div>
	<div class="nz-line"></div>
	<div class="nz-courses-level-price">
		<span>Junior</span>
		<span>30.00$</span>
	</div>
</article>
