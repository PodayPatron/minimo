<?php
/**
 * Shortcode hotels.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc\shortcodes\Hotel;

use NZ_MINIMO_THEME\Inc\shortcodes;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;
use WP_Query;

/**
 * Hotels
 */
class Hotel {
	use Singleton;

	/**
	 * Construct.
	 */
	protected function __construct() {
		add_shortcode( 'hotels', array( $this, 'shortcode_hotel' ) );
	}

	/**
	 * Shortcode hotel.
	 *
	 * @param array $atts Attributes.
	 */
	public function shortcode_hotel( $atts ) {
		$atts = shortcode_atts(
			array(
				'posts_per_page' => 5,
				'orderby'        => '',
				'order'          => '',
				'post_type'      => 'minimo-hotels',
				'columns'        => '2',
				'view'           => 'carousel',
			),
			$atts
		);

		$posts = new WP_Query( $atts );

		if ( ! $posts ) {
			return '';
		}

		$class_wrapper    = 'row';
		$class_item       = 'col-md-12 slider-card col-lg-' . intval( 12 / $atts['columns'] );
		$class_additional = '';

		if ( 'carousel' === $atts['view'] ) {
			$class_wrapper    = 'carousel-wrapper';
			$class_item      .= ' carousel-cell';
			$class_additional = 'carousel-main';
		}

		ob_start();
		Shortcodes::get_view_shortcode(
			'hotel',
			array(
				'hotels'           => $posts,
				'class_wrapper'    => $class_wrapper,
				'class_item'       => $class_item,
				'class_additional' => $class_additional,
			)
		);

		return ob_get_clean();
	}
}
