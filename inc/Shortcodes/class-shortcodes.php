<?php
/**
 * Main shortcode class.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\Shortcodes\Hotel\Hotel;
use NZ_MINIMO_THEME\Inc\Shortcodes\gallery\Gallery;
use NZ_MINIMO_THEME\Inc\Shortcodes\title\Title;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Class Shortcodes
 */
class Shortcodes {
	use Singleton;

	/**
	 * Shortcodes constructor.
	 */
	protected function __construct() {
		$this->include_shortcode();
		$this->instance_shortcode();
	}

	/**
	 * Include meta boxes.
	 */
	public function include_shortcode() {
		require MINIMO_DIR_PATH . '/inc/Shortcodes/hotel/class-hotels.php';
		require MINIMO_DIR_PATH . '/inc/Shortcodes/gallery/class-gallery.php';
		require MINIMO_DIR_PATH . '/inc/Shortcodes/title/class-title.php';
	}

	/**
	 * Instance meta boxes.
	 */
	public function instance_shortcode() {
		Hotel::get_instance();
		Gallery::get_instance();
		Title::get_instance();
	}

	/**
	 * Get template shortcode.
	 *
	 * @param string $type Type of shortcode.
	 * @param array  $attr Attributes.
	 */
	public static function get_view_shortcode( $type, $attr ) {
		get_template_part( '/inc/Shortcodes/' . $type . '/template/shortcode', $type, $attr );
	}
}
