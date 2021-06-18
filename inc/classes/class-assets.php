<?php
/**
 * Enqueue theme assets.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Assets
 */
class Assets {
	use Singleton;

	/**
	 * Construct.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * Actions.
	 */
	protected function setup_hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ), 10 );
		add_action( 'wp_enqueue_scripts', array( $this, 'nz_register_scripts' ), 10 );
	}

	/**
	 * Register styles.
	 */
	public function register_styles() {
		$version = wp_get_theme()->get( ' Version ' );

		wp_enqueue_style( 'css-style', MINIMO_DIR_URI . '/style.css', array(), $version );
		wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap', array(), '1.0' );
		wp_enqueue_style( 'fontawesome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css', array(), '5.10.0' );
	}

	/**
	 * Register scripts.
	 */
	public function nz_register_scripts() {
		wp_enqueue_script( 'comment-reply' );
	}
}
