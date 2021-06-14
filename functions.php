<?php
/**
 * Theme Functions.
 *
 * @package Minimo
 */

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
	\MINIMO_THEME\Inc\MINIMO_THEME::get_instance();
}

nz_get_instance_theme();
