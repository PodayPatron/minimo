<?php
/**
 * Shortcode column.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc\shortcodes\Column;

use NZ_MINIMO_THEME\Inc\shortcodes;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Class Column
 */
class Column {
	use Singleton;

	/**
	 * Column constructor.
	 */
	protected function __construct() {
		add_shortcode( 'col', array( $this, 'shortcode_column' ) );
	}

	/**
	 * Shortcode column.
	 *
	 * @param array       $atts Attributes.
	 * @param string null $content Content.
	 */
	public function shortcode_column( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'class' => 'col-lg-6',
			),
			$atts
		);

		$atts['content'] = $content;

		ob_start();
		Shortcodes::get_view_shortcode(
			'column',
			$atts
		);
		return ob_get_clean();
	}

}
