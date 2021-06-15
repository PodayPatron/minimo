<?php
/**
 * Theme Functions.
 *
 * @package Minimo
 */

use \MINIMO_THEME\Inc\MINIMO_THEME;

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

/**
 * Get instance theme.
 */
function nz_get_instance_theme() {
	MINIMO_THEME::get_instance();
}

nz_get_instance_theme();

add_filter( 'navigation_markup_template', 'nz_navigation', 10, 2 );

/**
 * Navigation.
 *
 * @param  mixed $template
 * @param  mixed $class
 * @return void
 */
function nz_navigation( $template, $class ) {

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

/**
 * Get the excerpt.
 *
 * @param  mixed $trim_character_count
 */
function nz_the_excerpt( $trim_character_count = 0 ) {
	if ( has_excerpt() || 0 === $trim_character_count ) {
		the_excerpt();
		return;
	}

	$excerpt = wp_strip_all_tags( get_the_excerpt() );
	$excerpt = substr( $excerpt, 0, $trim_character_count );
	$excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );

	echo $excerpt . '[...]';
}
