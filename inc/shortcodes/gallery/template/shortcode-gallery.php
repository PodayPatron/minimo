<?php
/**
 * Html shortcodes.
 */
?>
<div class="carousel-wrapper minimo-hotels-element">
	<div class="carousel-main" data-flickity='{ "groupCells": 1, "prevNextButtons": true, "wrapAround": true, "wrapAround": true }'>
		<?php foreach ( $args['gallery'] as $id_images ) : ?>
			<div class="carousel-cell">
				<?php echo wp_get_attachment_image( $id_images, $args['img_size'] ); ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>
