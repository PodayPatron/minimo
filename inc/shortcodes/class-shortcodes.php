<?php
/**
 * Main shortcode class.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\shortcodes\Hotel\Hotel;
use NZ_MINIMO_THEME\Inc\shortcodes\gallery\Gallery;
use NZ_MINIMO_THEME\Inc\shortcodes\Tabs\Tabs;
use NZ_MINIMO_THEME\Inc\shortcodes\title\Title;
use NZ_MINIMO_THEME\Inc\shortcodes\button\Button;
use NZ_MINIMO_THEME\Inc\shortcodes\column\Column;
use NZ_MINIMO_THEME\Inc\shortcodes\row\Row;
use NZ_MINIMO_THEME\Inc\shortcodes\carousel\Carousel;
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
		require MINIMO_DIR_PATH . '/inc/shortcodes/hotel/class-hotels.php';
		require MINIMO_DIR_PATH . '/inc/shortcodes/gallery/class-gallery.php';
		require MINIMO_DIR_PATH . '/inc/shortcodes/title/class-title.php';
		require MINIMO_DIR_PATH . '/inc/shortcodes/button/class-button.php';
		require MINIMO_DIR_PATH . '/inc/shortcodes/column/class-column.php';
		require MINIMO_DIR_PATH . '/inc/shortcodes/row/class-row.php';
		require MINIMO_DIR_PATH . '/inc/shortcodes/carousel/class-carousel.php';
		require MINIMO_DIR_PATH . '/inc/shortcodes/tabs/class-tabs.php';
	}

	/**
	 * Instance meta boxes.
	 */
	public function instance_shortcode() {
		Hotel::get_instance();
		Gallery::get_instance();
		Title::get_instance();
		Button::get_instance();
		Column::get_instance();
		Row::get_instance();
		Carousel::get_instance();
		Tabs::get_instance();


	}

	/**
	 * Get template shortcode.
	 *
	 * @param string $type Type of shortcode.
	 * @param array  $attr Attributes.
	 */
	public static function get_view_shortcode( $type, $attr ) {
		get_template_part( '/inc/shortcodes/' . $type . '/template/shortcode', $type, $attr );
	}
}
