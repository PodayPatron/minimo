<?php
/**
 * Html shortcodes.
 */
?>
<div class="<?php echo esc_attr( esc_html( $args['class_wrapper'] ) ); ?> minimo-hotels-element">
		<?php if ( $args['class_additional'] ) : ?>
			<div class=" <?php echo esc_attr( esc_html( $args['class_additional'] ) ); ?>" data-flickity='{ "groupCells": 2, "prevNextButtons": true, "wrapAround": true, "wrapAround": true }'>
		<?php endif; ?>
		<?php while ( $args['hotels']->have_posts() ) : ?>
			<?php $args['hotels']->the_post(); ?>
			<div class="<?php echo esc_attr( esc_html( $args['class_item'] ) ); ?>">
				<?php get_template_part( '/template-parts/content', 'hotel' ); ?>
			</div>
		<?php endwhile; ?>
		<?php if ( esc_html( $args['class_additional'] ) ) : ?>
			 </div>
		<?php endif; ?>
</div>
