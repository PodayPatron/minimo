<?php
/**
 * Widgets.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\Traits\Singleton;

class Widgets {
	use Singleton;

	/**
	 * Construct.
	 */
	protected function __construct() {
		$this->require_widgets();
		$this->setup_hooks();
	}

	/**
	 * Actions.
	 */
	protected function setup_hooks() {
		add_action( 'widgets_init', array( $this, 'register_widgets' ), 10 );
	}

	/**
	 * Require widgets.
	 */
	public function require_widgets() {
		require_once MINIMO_DIR_PATH . '/inc/widgets/class-hotel-category.php';
	}

	/**
	 * Register widgets.
	 */
	public function register_widgets() {
		register_widget( 'NZ_MINIMO_THEME\Inc\Widgets\Hotel_Widget' );
	}
}
