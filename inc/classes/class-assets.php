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
		add_action( 'admin_enqueue_scripts', array( $this, 'nz_register_admin_style' ), 10 );

		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 10 );
		add_action( 'admin_enqueue_scripts', array( $this, 'nz_register_admin_scripts' ), 10 );
	}

	/**
	 * Register styles.
	 */
	public function register_styles() {
		if ( ! defined( 'THEME_VERSION' ) ) {
			define( 'THEME_VERSION', untrailingslashit( 'wp_get_theme()->get( " Version " )' ) );
		}

		wp_enqueue_style( 'css-style', MINIMO_DIR_URI . '/style.css', array(), THEME_VERSION );
		wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap', array(), THEME_VERSION );
		wp_enqueue_style( 'fontawesome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css', array(), '5.10.0' );
		wp_enqueue_style( 'flickity-css', MINIMO_DIR_URI . '/assets/css/flickity.css', array(), 'THEME_VERSION' );
	}

	/**
	 * Register admin style.
	 */
	public function nz_register_admin_style() {
		wp_enqueue_style( 'admin-styles', MINIMO_DIR_URI . '/assets/admin-style/admin-style.css', array(), '1.1' );
	}

	/**
	 * Register scripts.
	 */
	public function register_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'flickity-js', MINIMO_DIR_URI . '/assets/lib/flickity.min.js', array(), '2.2', true );
		wp_enqueue_script( 'main-js', MINIMO_DIR_URI . '/assets/js/main.js', array( 'jquery' ), THEME_VERSION, true );
		wp_enqueue_script( 'courses-js', MINIMO_DIR_URI . '/assets/js/courses-tabs.js', array( 'jquery' ), THEME_VERSION, true );
	}

	/**
	 * Register admin scripts.
	 */
	public function nz_register_admin_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'script-js', MINIMO_DIR_URI . '/assets/js/admin-gallery.js', array( 'jquery' ), '1.0', true );
	}
}
