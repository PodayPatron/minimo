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
								<?php get_template_part( 'template-parts/content', 'hotel' ); ?>
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
