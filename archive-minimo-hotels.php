<?php
/**
 * Archive minimo hotels.
 */

get_header();
?>
<section class="nz-blog nz-hotel-page">
	<div class="container">
		<div class="row row-bottom">
			<div class="col-lg-9">
				<div class="row">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : ?>
							<?php the_post(); ?>
							<div class="col-lg-6">
								<article class="hotel-card">
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
                                        <h2 class="nz-post-title">
                                            <a href="<?php esc_url( the_permalink() ); ?>">
                                                <?php esc_html( the_title() ); ?>
                                            </a>
                                        </h2>
                                        <div class="nz-post-subtitle">
                                            <p>
                                                <?php esc_html( nz_the_excerpt( 185 ) ); ?>
                                            </p>
                                        </div>
                                        <div class="nz_hotel_country">
                                            <?php echo get_post_meta( get_the_ID(), '_custom_box_country', true ); ?>
                                        </div>
                                        <div class="nz_hotel_address">
                                            <?php echo get_post_meta( get_the_ID(), '_custom_box_address', true ); ?>
                                        </div>
                                        <div class="nz-hotel-price">
                                            <span>Price:</span>
                                            <?php echo get_post_meta( get_the_ID(), '_custom_box_price', true ); ?>
                                        </div>
                                    </div>
                                </article>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-3">
				<?php dynamic_sidebar( 'nz-minimo-hotels-sidebar' ); ?>
			</div>
		</div>
		<div class="pagination">
			<?php the_posts_pagination( array( 'end_size' => 2 ) ); ?>
		</div>
	</div>
</section>

<?php
get_footer();
?>
