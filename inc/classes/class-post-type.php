<?php
/**
 * Theme post types.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Post type.
 */
class Post_type {
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
		add_action( 'init', array( $this, 'nz_create_post_type' ), 10 );
		add_action( 'init', array( $this, 'nz_create_taxonomy' ), 10 );
	}

	/**
	 * Create post type.
	 */
	public function nz_create_post_type() {
		$labels = array(
			'name'          => esc_html__( 'Hotels' ),
			'singular_name' => esc_html__( 'Hotel' ),
			'menu_name'     => esc_html__( 'Hotels' ),
		);
		$args   = array(
			'labels'        => $labels,
			'public'        => true,
			'menu_icon'     => 'dashicons-admin-multisite',
			'menu_position' => 5,
			'has_archive'   => true,
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments' ),
			'taxonomies'    => array( 'post_tag' ),
		);

		register_post_type( 'minimo-hotels', $args );
	}

	/**
	 * Create taxonomy.
	 */
	public function nz_create_taxonomy() {
		register_taxonomy(
			'hotel-categories',
			'minimo-hotels',
			array(
				'label'             => esc_html__( 'Categories' ),
				'labels'            => array(
					'name'              => esc_html__( 'Hotels Categories' ),
					'singular_name'     => esc_html__( 'Category' ),
					'search_items'      => esc_html__( 'Search Category' ),
					'all_items'         => esc_html__( 'All Categories' ),
					'view_item '        => esc_html__( 'View Categories' ),
					'parent_item'       => esc_html__( 'Parent Category' ),
					'parent_item_colon' => esc_html__( 'Parent Category:' ),
					'edit_item'         => esc_html__( 'Edit Category' ),
					'update_item'       => esc_html__( 'Update Category' ),
					'add_new_item'      => esc_html__( 'Add New Category' ),
					'new_item_name'     => esc_html__( 'New Category Name' ),
					'menu_name'         => esc_html__( 'Category' ),
				),
				'public'            => true,
				'rewrite'           => array(
					'slug' => 'taxonomy',
				),
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => false,
			)
		);
	}
}
