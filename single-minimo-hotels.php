<?php
/**
 * Single Hotel page.
 *
 * @package Minimo
 */
$photo_gallery = get_post_meta( get_the_ID(), '_custom_box_gallery', true );

get_header();
?>

<section class="single-blog">
	<div class="container">
		<h2>
			<?php esc_html( the_title() ); ?>
		</h2>

		<div class="row row-bottom">
			<div class="col-lg-12">
				<?php if ( isset( $photo_gallery ) && ! empty( $photo_gallery ) ) : ?>
					<div class="single-page-photo main-carousel">
						<?php foreach ( $photo_gallery as $single_photo_gallery ) : ?>
							<div class="carousel-cell">
								<img class="nz-slider-img" src="<?php echo esc_url( wp_get_attachment_url( $single_photo_gallery ) ); ?>" alt="Photo hotel">
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-12">
				<div class="single-page-content">
					<?php esc_html( the_content() ); ?>
				</div>
				<div class="nz_hotel_country">
					<?php echo get_post_meta( get_the_ID(), '_custom_box_country', true ); ?>
				</div>
				<div class="nz_hotel_address">
					<?php echo get_post_meta( get_the_ID(), '_custom_box_address', true ); ?>
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
