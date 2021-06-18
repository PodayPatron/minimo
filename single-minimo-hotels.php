<?php
/**
 * Single Hotel page.
 *
 * @package Minimo
 */

get_header();
?>

<section class="single-blog">
	<div class="container">
		<h2>
			<?php the_title(); ?>
		</h2>

		<div class="row row-bottom">
			<div class="col-lg-12">
				<div class="single-page-photo">
					<?php the_post_thumbnail(); ?>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="single-page-content">
					<?php the_content(); ?>
				</div>
				<div class="nz-hotel-price">
					<span>Price:</span>
					<?php echo get_post_meta( get_the_ID(), '_custom_box_value', true ); ?>
				</div>
			</div>
		</div>
		
		<?php comments_template(); ?>
	</div>
</section>

<?php get_footer(); ?>
