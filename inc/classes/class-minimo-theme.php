<?php
/**
 * Bootstraps the Theme.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * NZ MINIMO THEME.
 */
class NZ_MINIMO_THEME {
	use Singleton;

	/**
	 * Construct.
	 */
	protected function __construct() {
		Assets::get_instance();
		Menu::get_instance();
		Post_type::get_instance();
		Meta_Boxes::get_instance();
		WPH_Widget::get_instance();
		Widgets::get_instance();
		Shortcodes::get_instance();
		Post_Types::get_instance();

		$this->setup_hooks();
	}

	/**
	 * Actions.
	 */
	protected function setup_hooks() {
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ), 10 );
		add_action( 'widgets_init', array( $this, 'nz_register_widgets' ), 10 );
	}

	/**
	 * Setup theme.
	 */
	public function setup_theme() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'post-thumbnails' );
	}

	/**
	 * Register widgets.
	 */
	public function nz_register_widgets() {
		register_sidebar(
			array(
				'name'         => esc_html__( 'Sidebar' ),
				'id'           => 'nz-minimo-sidebar',
				'before_title' => '<h2>',
				'after_title'  => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'         => esc_html__( 'Sidebar Hotels' ),
				'id'           => 'nz-minimo-hotels-sidebar',
				'before_title' => '<h2>',
				'after_title'  => '</h2>',
			)
		);
	}
}
