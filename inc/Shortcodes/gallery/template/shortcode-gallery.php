<?php
/**
 * Html shortcodes.
 */
?>
<div class="<?php echo esc_attr( $args['class_wrapper'] ); ?> minimo-hotels-element">
	<?php if ( $args['class_additional'] ) : ?>
	<div class=" <?php echo esc_attr( $args['class_additional'] ); ?>" data-flickity='{ "groupCells": 1, "prevNextButtons": true, "wrapAround": true, "wrapAround": true }'>
		<?php endif; ?>
		<?php foreach ( $args['gallery'] as $id_images ) : ?>
		<div class="<?php echo $args['class_item']; ?> ">
			<?php echo wp_get_attachment_image( $id_images, $args['img_size'] ); ?>
		</div>
		<?php endforeach; ?>
		<?php if ( $args['class_additional'] ) : ?>
	</div>
	<?php endif; ?>
</div>
