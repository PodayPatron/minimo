<?php
/**
 * Archive minimo hotels.
 */

get_header();
?>
<section class="nz-blog nz-hotel-page">
	<div class="container">
		<div class="row row-bottom">
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<div class="col-lg-6">
						<div class="nz-post-img">
							<a href="<?php the_permalink(); ?>"></a>
							<div class="nz-img-scale">
								<?php the_post_thumbnail(); ?>
							</div>
						</div>
						<div class="nz-post-text">
							<div class="nz-post-category">
								<?php echo get_the_term_list( $post->ID, 'hotel-categories' ); ?>
							</div>
							<h2 class="nz-post-title">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<div class="nz-post-subtitle">
								<p>
									<?php nz_the_excerpt( 185 ); ?>
								</p>
							</div>
							<div class="nz_hotel_country">
								<?php echo get_post_meta( $post->ID, '_custom_box_country', true ); ?>
							</div>
							<div class="nz_hotel_address">
								<?php echo get_post_meta( $post->ID, '_custom_box_address', true ); ?>
							</div>
							<div class="nz-hotel-price">
								<span>Price:</span>
								<?php echo get_post_meta( $post->ID, '_custom_box_price', true ); ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="pagination">
			<?php the_posts_pagination( array( 'end_size' => 2 ) ); ?>
		</div>
	</div>
</section>

<?php
get_footer();
?>
