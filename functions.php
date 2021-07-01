<?php
/**
 * Theme Functions.
 *
 * @package Minimo
 */

use \NZ_MINIMO_THEME\Inc\NZ_MINIMO_THEME;

if ( ! defined( 'MINIMO_DIR_PATH' ) ) {
	define( 'MINIMO_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'MINIMO_DIR_URI' ) ) {
	define( 'MINIMO_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once MINIMO_DIR_PATH . '/inc/traits/trait-singleton.php';
require_once MINIMO_DIR_PATH . '/inc/classes/class-minimo-theme.php';
require_once MINIMO_DIR_PATH . '/inc/classes/class-assets.php';
require_once MINIMO_DIR_PATH . '/inc/classes/class-menus.php';
require_once MINIMO_DIR_PATH . '/inc/classes/class-post-type.php';
require_once MINIMO_DIR_PATH . '/inc/classes/class-meta-boxes.php';
require_once MINIMO_DIR_PATH . '/inc/widgets/class-wph-widget.php';
require_once MINIMO_DIR_PATH . '/inc/widgets/class-widgets.php';
require_once MINIMO_DIR_PATH . '/inc/Shortcodes/class-shortcodes.php';
require_once MINIMO_DIR_PATH . '/inc/posttypes/class-post-types.php';

if ( ! function_exists( 'nz_get_instance_theme' ) ) {
	/**
	 * Get instance theme.
	 */
	function nz_get_instance_theme() {
		NZ_MINIMO_THEME::get_instance();
	}

	nz_get_instance_theme();
}

if ( ! function_exists( 'nz_the_excerpt' ) ) {
	/**
	 * Get the excerpt.
	 *
	 * @param  int $trim_character_count Count symbols.
	 */
	function nz_the_excerpt( $trim_character_count = 0 ) {
		if ( has_excerpt() || 0 === $trim_character_count ) {
			the_excerpt();
			return;
		}

		$excerpt = wp_strip_all_tags( get_the_excerpt() );
		$excerpt = substr( $excerpt, 0, $trim_character_count );
		$excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );

		echo esc_html( $excerpt ) . '[...]';
	}
}

if ( ! function_exists( 'nz_my_comments_style' ) ) {
	/**
	 * Comments style.
	 *
	 * @param  string $comment comments.
	 * @param  array  $args values of array.
	 * @param  int    $depth  levels of comments.
	 */
	function nz_my_comments_style( $comment, $args, $depth ) {
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<div class="comment-body">
				<?php echo get_avatar( $comment, 70, '', 'avatar-user', array( 'class' => 'comment-avatar' ) ); ?>
				<div class="comment-content">
					<span class="comment-author"><?php comment_author(); ?></span>
					<span class="comment-date"><?php comment_date( 'j F Y H:i' ); ?></span>
					<?php comment_text(); ?>
					<?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'depth' => $depth,
							)
						)
					);
					?>

				</div>
			</div>
		<?php
	}
}

/**
 * Box html.
 *
 * @param  array  $option array.
 * @param  string $value  value.
 */
function nz_box_html( $option, $value ) {
	?>
		<label for="<?php echo esc_html( $option['id'] ); ?>"><?php echo esc_html( $option['title'] ); ?></label>
		<input name="<?php echo esc_html( $option['name'] ); ?>" id="<?php echo esc_html( $option['id'] ); ?>" class="postbox widefat" type="text" value="<?php echo esc_html( $value ); ?>">
	<?php
}


/**
 * Button html.
 *
 * @param  array $args array.
 */
function nz_button_html( $args ) {
	?>
		<div id="gallery-minimo">
			<label><?php echo esc_html( $args['title'] ); ?></label>
			<button class="button upload-custom-img">
				<?php echo esc_html__( 'Add photo', 'minimo' ); ?>
			</button>
			<input type="hidden" class="<?php echo esc_html( $args['class'] ); ?>" name="<?php echo esc_html( $args['name'] ); ?>" value="<?php echo esc_html( ( $args['id_images'] ) ? implode( ',', $args['id_images'] ) : '' ); ?>">
			<div class="custom-img-container">
				<?php if ( $args['id_images'] ) : ?>
					<?php foreach ( $args['id_images'] as $id_image ) : ?>
						<div class="custom-img-gallery" data-id="<?php echo esc_html( $id_image ); ?>">
							<img class="img-gallery" src="<?php echo esc_url( wp_get_attachment_url( $id_image ) ); ?>" alt="photo hotel">
							<button class="custom-remove-image">
								X
							</button>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php
}