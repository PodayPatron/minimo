<?php
/**
 * Content template.
 *
 * @package Merac
 */

$the_post_id   = get_the_ID();
$article_terms = wp_get_post_terms( $the_post_id, [ 'category' ] );

if ( ! empty( $article_terms ) && ! is_array( $article_terms ) ) {
	return;
}
?>

<div class="col-lg-6">
	<div class="art-img">
		<a href="<?php the_permalink(); ?>"></a>
		<div class="img-scale">
			<?php
			the_post_thumbnail( 'size' );
			?>
		</div>
	</div>
	<div class="nz-col-text">
		<div class="nz-col-main-category">
			Lifestyle
		</div>
		<h2 class="nz-col-main-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
		<div class="nz-col-suptitle">
			<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing 
			elit, sed do eiusmod tempor incididunt ut labore et dolore 
			magna aliqua. 
			</p>
		</div>
	</div>
</div>