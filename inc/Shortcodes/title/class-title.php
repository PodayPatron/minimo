<?php
/**
 * Shortcode titles.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc\Shortcodes\Title;

use NZ_MINIMO_THEME\Inc\Shortcodes;
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
	}
}
