<?php
/**
 * Courses post type.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc\posttypes\courses;

use NZ_MINIMO_THEME\Inc\posttypes;
use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Class Courses
 */
class Courses {
	use Singleton;

	/**
	 * Courses constructor.
	 */
	protected function __construct() {
		add_action( 'init', array( $this, 'courses_post_type' ), 10 );
		add_action( 'init', array( $this, 'courses_taxonomy' ), 10 );
	}

	/**
	 * Courses post type.
	 */
	public function courses_post_type() {
		$labels = array(
			'name'          => esc_html__( 'Courses' ),
			'singular_name' => esc_html__( 'Courses' ),
			'menu_name'     => esc_html__( 'Courses' ),
		);
		$args   = array(
			'labels'        => $labels,
			'public'        => true,
			'menu_icon'     => 'dashicons-welcome-learn-more',
			'menu_position' => 6,
			'has_archive'   => true,
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments' ),
			'taxonomies'    => array(),
		);

		register_post_type( 'minimo-courses', $args );
	}

	/**
	 * Courses taxonomy.
	 */
	public function courses_taxonomy() {
		$labels = array(
			'name'              => esc_html__( 'Courses Categories' ),
			'singular_name'     => esc_html__( 'Category' ),
			'search_items'      => esc_html__( 'Categories' ),
			'all_items'         => esc_html__( 'Categories' ),
			'parent_item'       => esc_html__( 'Parent Category' ),
			'parent_item_colon' => esc_html__( 'Parent Category:' ),
			'edit_item'         => esc_html__( 'Edit Category' ),
			'update_item'       => esc_html__( 'Update Category' ),
			'add_new_item'      => esc_html__( 'Add New Category' ),
			'new_item_name'     => esc_html__( 'New Category Name' ),
			'menu_name'         => esc_html__( 'Category' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'Categories' ),
		);

		register_taxonomy( 'courses_categories', 'minimo-courses', $args );
	}
}



