<?php
/**
 * Main template file.
 *
 * @package Minimo
 */

get_header();
?>
<section class="nz-blog">
	<div class="container">

		<div class="row row-bottom">
			<div class="col-lg-9">
				<?php if ( have_posts() ) : ?>
					<div class="row inner-row">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content' );
						endwhile;
						?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-3">
				<?php dynamic_sidebar( 'nz-minimo-sidebar' ); ?>
			</div>
		</div>
		<div class="pagination">
			<?php the_posts_pagination( array( 'end_size' => 2 ) ); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
