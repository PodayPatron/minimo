<?php
/**
 * Bootstraps the Theme.
 *
 * @package Minimo
 */

namespace MINIMO_THEME\Inc;

use MINIMO_THEME\Inc\Traits\Singleton;

class MINIMO_THEME {
	use Singleton;

	protected function __construct() {
		Assets::get_instance();
		Menus::get_instance();

		$this->setup_hooks();
	}

	/**
	 * Actions.
	 */
	protected function setup_hooks() {
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
	}

	/**
	 * Setup theme.
	 */
	public function setup_theme() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'size', 420, 280, true );

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1240;
		}
	}
}