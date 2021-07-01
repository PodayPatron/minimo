<?php
/**
 * Shortcode button.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc\shortcodes\Button;

use NZ_MINIMO_THEME\Inc\shortcodes;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Class Button
 */
class Button {
	use Singleton;

	/**
	 * Button constructor.
	 */
	protected function __construct() {
		add_shortcode( 'button', array( $this, 'shortcode_button' ) );
	}

	/**
	 * Shortcode button.
	 *
	 * @param array $atts Attribute.
	 */
	public function shortcode_button( $atts ) {
		$atts = shortcode_atts(
			array(
				'text'  => 'Button',
				'link'  => '',
				'style' => '',
			),
			$atts
		);

		ob_start();
		Shortcodes::get_view_shortcode(
			'button',
			$atts
		);

		return ob_get_clean();
	}
}
