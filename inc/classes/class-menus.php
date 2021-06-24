<?php
/**
 * Register menu.
 *
 * @package Minino
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Menu
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
	 * Register menu.
	 */
	public function register_menus() {
		register_nav_menus(
			array(
				'nz-minimo-header-menu' => esc_html__( 'Header Menu', 'minimo' ),
				'nz-minimo-footer-menu' => esc_html__( 'Footer Menu', 'minimo' ),
			)
		);
	}
}
