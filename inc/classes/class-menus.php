<?php
/**
 * Register menus.
 *
 * @package Minino
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Menus
 */
class Menu {
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
		add_action( 'init', array( $this, 'register_menus' ), 10 );
	}

	/**
	 * Register menus.
	 */
	public function register_menus() {
		register_nav_menus(
			array(
				'nz-minimo-header-menu' => esc_html__( 'Header Menu', 'Minimo' ),
				'nz-minimo-footer-menu' => esc_html__( 'Footer Menu', 'Minimo' ),
			)
		);
	}
}
