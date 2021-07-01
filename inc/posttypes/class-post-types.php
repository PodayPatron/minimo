<?php
/**
 * Main post type class.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\posttypes\courses\Courses;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Class Post_Types.
 */
class Post_Types {
	use Singleton;

	/**
	 * Post_Types constructor.
	 */
	protected function __construct() {
		$this->include_post_types();
		$this->instance_post_types();
	}

	/**
	 * Include post types.
	 */
	public function include_post_types() {
		require MINIMO_DIR_PATH . '/inc/posttypes/courses/courses-post-type.php';
	}

	/**
	 * Instance post types.
	 */
	public function instance_post_types() {
		Courses::get_instance();
	}

}
