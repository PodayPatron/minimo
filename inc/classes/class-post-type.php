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
class PostType {
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
			'name'          => 'Hotels',
			'singular_name' => 'Hotel', // админ панель Добавить->Функцию
			'menu_name'     => 'Hotels', // ссылка в меню в админке
		);
		$args   = array(
			'labels'        => $labels,
			'public'        => true, // благодаря этому некоторые параметры можно пропустить
			'menu_icon'     => 'dashicons-admin-multisite', // иконка корзины
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
				'label'             => 'Categories',
				'labels'            => array(
					'name'              => 'Categories',
					'singular_name'     => 'Category',
					'search_items'      => 'Search Category',
					'all_items'         => 'All Categories',
					'view_item '        => 'View Categories',
					'parent_item'       => 'Parent Category',
					'parent_item_colon' => 'Parent Category:',
					'edit_item'         => 'Edit Category',
					'update_item'       => 'Update Category',
					'add_new_item'      => 'Add New Category',
					'new_item_name'     => 'New Category Name',
					'menu_name'         => 'Category',
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
