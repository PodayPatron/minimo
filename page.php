<?php
/**
 * Page template.
 * 
 * @package Minimo
 */

get_header();
?>

<section class="nz-page-home">
	<div class="container">
		<h2><?php the_title(); ?></h2>

		<div class="row">
			<div class="col-lg-12">
				<div class="nz-home-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
