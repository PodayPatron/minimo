<?php
/**
 * Single template.
 *
 * @package Minimo
 */

get_header();
?>

<section class="single-blog">
	<div class="container">
		<h2>
			<?php esc_html( the_title() ); ?>
		</h2>

		<div class="row row-bottom">
			<div class="col-lg-6">
				<div class="single-page-photo">
					<?php the_post_thumbnail(); ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="single-page-content">
					<?php esc_html( the_content() ); ?>
				</div>
			</div>
		</div>
		<?php comments_template(); ?>
	</div>
</section>

<?php get_footer(); ?>
