<?php
/**
 * Carousel html template.
 */
?>
<div class="carousel-wrapper">
	<div class="main-carousel" data-flickity='{ "groupCells": 1, "prevNextButtons": true, "wrapAround": true }'>
		<?php echo do_shortcode( $args['content'] ); ?>
	</div>
</div>
