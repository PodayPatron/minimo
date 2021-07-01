<?php
/**
 * Shortcode gallery.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc\shortcodes\Gallery;

use NZ_MINIMO_THEME\Inc\shortcodes;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Gallery.
 */
class Gallery {
	use Singleton;

	/**
	 * Gallery constructor.
	 */
	protected function __construct() {
		add_shortcode( 'images_gallery', array( $this, 'shortcode_images_gallery' ) );
	}

	/**
	 * Shortcode gallery.
	 *
	 * @param array $atts Attribute.
	 */
	public function shortcode_images_gallery( $atts ) {
		$atts = shortcode_atts(
			array(
				'images'     => '294, 293, 285, 276, 277',
				'view'       => 'carousel',
				'columns'    => '2',
				'image_size' => '',
			),
			$atts
		);

		ob_start();
		Shortcodes::get_view_shortcode(
			'gallery',
			array(
				'gallery'  => explode( ', ', $atts['images'] ),
				'img_size' => $atts['image_size'],
			)
		);

		return ob_get_clean();
	}
}
