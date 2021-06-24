<?php
/**
 * Taxonomy  template.
 *
 * @package Minimo
 */

get_header();
?>
<section class="nz-blog">
	<div class="container">
		<div class="row row-bottom">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
					<?php
					the_post();
					get_template_part( 'template-parts/content' );
					?>
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
