<?php
/**
 * Html shortcodes.
 */
?>
<div class="<?php echo esc_attr( $args['class'] ); ?>">
	<?php echo do_shortcode( $args['content'] ); ?>
</div>


