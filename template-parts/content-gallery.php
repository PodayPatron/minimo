<?php
/**
 * Gallery content template.
 *
 * @package Minimo
 */
?>
<article class="gallery-card">
	<div class="nz-post-img">
		<a href="<?php esc_url( the_permalink() ); ?>"></a>
		<div class="nz-img-scale">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>
</article>
