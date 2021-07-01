<?php
/**
 * Shortcode carousel.
 */

namespace NZ_MINIMO_THEME\Inc\shortcodes\carousel;

use NZ_MINIMO_THEME\Inc\shortcodes;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Class Carousel
 */
class Carousel {
	use Singleton;

	/**
	 * Carousel constructor.
	 */
	protected function __construct() {
		add_shortcode( 'carousel', array( $this, 'shortcode_carousel' ) );
	}

	/**
	 * Shortcode carousel.
	 *
	 * @param array  $atts Attribute.
	 * @param string $content Content.
	 */
	public function shortcode_carousel( $atts, $content ) {
		$atts = shortcode_atts(
			array(),
			$atts
		);

		$atts['content'] = $content;

		ob_start();
		Shortcodes::get_view_shortcode(
			'carousel',
			$atts
		);
		return ob_get_clean();
	}
}
