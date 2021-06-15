<?php
/**
 * Content template.
 *
 * @package Merac
 */

$the_post_id   = get_the_ID();
$article_terms = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] );

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
			<?php foreach ( $article_terms as $key => $article_term ) : ?>
				<a href="<?php echo esc_url( get_the_excerpt( $article_term ) ); ?>">
					<?php
					echo esc_html( $article_term->name ); 
					?>
				</a>
			<?php endforeach; ?>
		</div>
		<h2 class="nz-col-main-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
		<div class="nz-col-suptitle">
			<p>
				<?php
					nz_the_excerpt( 185 );
				?>
			</p>
		</div>
	</div>
</div>