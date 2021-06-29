<?php
/**
 * Content template.
 *
 * @package Minimo
 */

$the_post_id   = get_the_ID();
$article_terms = wp_get_post_terms( $the_post_id, array( 'category' ) );

if ( ! empty( $article_terms ) && ! is_array( $article_terms ) ) {
	return;
}
?>

<div class="col-lg-6">
    <article class="blog-card">
        <div class="nz-post-img">
            <a href="<?php esc_url( the_permalink() ); ?>"></a>
            <div class="nz-img-scale">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
        <div class="nz-post-text">
            <div class="nz-post-category">
                <?php foreach ( $article_terms as $key => $article_term ) : ?>
                    <a href="<?php echo esc_url( get_the_excerpt( $article_term ) ); ?>">
                        <?php
                        echo esc_html( $article_term->name );
                        ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <h2 class="nz-post-title">
                <a href="<?php esc_url( the_permalink() ); ?>">
                    <?php esc_html( the_title() ); ?>
                </a>
            </h2>
            <div class="nz-post-subtitle">
                <p>
                    <?php esc_html( nz_the_excerpt( 185 ) ); ?>
                </p>
            </div>
        </div>
    </article>
</div>
