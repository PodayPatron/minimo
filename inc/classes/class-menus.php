<?php
/**
 * Register menus.
 *
 * @package Minino
 */

namespace MINIMO_THEME\Inc;

use MINIMO_THEME\Inc\Traits\Singleton;

class Menus {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * Actions.
	 */
	protected function setup_hooks() {
		add_action( 'init', array( $this, 'register_menus' ) );
	}

	/**
	 * Register menus.
	 */
	public function register_menus() {
		register_nav_menus(
			array(
				'minimo-header-menu' => esc_html__( 'Header Menu', 'Minimo' ),
				'minimo-footer-menu' => esc_html__( 'Footer Menu', 'Minimo' ),
			)
		);
	}

}
