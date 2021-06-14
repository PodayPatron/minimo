<?php
/**
 * Enqueue theme assets.
 *
 * @package Minimo
 */

namespace MINIMO_THEME\Inc;

use MINIMO_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * Actions.
	 */
	protected function setup_hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
	}

	/**
	 * Register styles.
	 */
	public function register_styles() {
		$version = wp_get_theme()->get( ' Version ' );

		wp_enqueue_style( 'css-style', MINIMO_DIR_URI . '/style.css', array(), $version, 'all' );
		wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap', array(), '1.0', 'all' );
		wp_enqueue_style( 'fontawesome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css', array(), '5.10.0', 'all' );
	}

	/**
	 * Register scripts.
	 */
	public function register_scripts() {
		wp_enqueue_script( 'main-js', MINIMO_DIR_URI . '/assets/js/main.js', array(), '1.0', 'true' );
	}
}