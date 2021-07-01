<?php
/**
 * Shortcode titles.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc\shortcodes\Title;

use NZ_MINIMO_THEME\Inc\shortcodes;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Title
 */
class Title {
	use Singleton;

	/**
	 * Construct.
	 */
	protected function __construct() {
		add_shortcode( 'title', array( $this, 'shortcode_title' ) );
	}

	/**
	 * Shortcode title.
	 *
	 * @param array $atts Attributes.
	 */
	public function shortcode_title( $atts ) {
		$atts = shortcode_atts(
			array(
				'title' => '',
			),
			$atts
		);

		ob_start();
		Shortcodes::get_view_shortcode( 'title', $atts );
		return ob_get_clean();
	}
}
