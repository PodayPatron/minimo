<?php
/**
 * Archive courses template.
 */

get_header();
?>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<div>
				<?php get_template_part( 'template-parts/content', 'courses' ); ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

<?php
get_footer();

