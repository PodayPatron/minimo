<?php
/**
 * Shortcode tabs.
 */

namespace NZ_MINIMO_THEME\Inc\shortcodes\Tabs;

use NZ_MINIMO_THEME\Inc\shortcodes;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Class tabs
 */
class Tabs {
	use Singleton;

	/**
	 * Row constructor.
	 */
	protected function __construct() {
		add_shortcode( 'tabs', array( $this, 'shortcode_tabs' ) );
	}

	/**
	 * Shortcode row.
	 *
	 * @param array       $atts Attributes.
	 * @param string null $content Content.
	 */
	public function shortcode_tabs( $atts, $content ) {
		$atts = shortcode_atts(
			array(
				'id' => 'tabs-course',
			),
			$atts
		);

		$atts['content'] = $content;

		ob_start();
		Shortcodes::get_view_shortcode(
			'tabs',
			$atts
		);
		return ob_get_clean();
	}
}
