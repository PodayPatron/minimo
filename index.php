<?php
/**
 * Main template file.
 *
 * @package Minimo
 */

get_header();
?>
<section class="blog">
	<div class="container">

	<?php if ( have_posts() ) : ?>
		<div class="row">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content' );
			endwhile;
			?>
		</div>
	<?php endif; ?>
	</div>
</section>

