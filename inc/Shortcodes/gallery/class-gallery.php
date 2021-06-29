<?php
/**
 * Shortcode gallery.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc\Shortcodes\Gallery;

use NZ_MINIMO_THEME\Inc\Shortcodes;
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

		$class_wrapper    = 'carousel-wrapper';
		$class_item       = ' carousel-cell';
		$class_additional = 'carousel-main';

		ob_start();
		Shortcodes::get_view_shortcode(
			'gallery',
			array(
				'gallery'          => explode( ', ', $atts['images'] ),
				'img_size'         => $atts['image_size'],
				'class_wrapper'    => $class_wrapper,
				'class_item'       => $class_item,
				'class_additional' => $class_additional,
			)
		);

		return ob_get_clean();
	}

}
