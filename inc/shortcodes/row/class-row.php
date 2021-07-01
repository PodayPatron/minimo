<?php
/**
 * Shortcode row.
 */

namespace NZ_MINIMO_THEME\Inc\shortcodes\Row;

use NZ_MINIMO_THEME\Inc\shortcodes;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Class Row
 */
class Row {
	use Singleton;

	/**
	 * Row constructor.
	 */
	protected function __construct() {
		add_shortcode( 'row', array( $this, 'shortcode_row' ) );
	}

	/**
	 * Shortcode row.
	 *
	 * @param array       $atts Attributes.
	 * @param string null $content Content.
	 */
	public function shortcode_row( $atts, $content ) {
		$atts = shortcode_atts(
			array(
				'class' => 'row',
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
