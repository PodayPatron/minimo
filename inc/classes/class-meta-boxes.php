<?php
/**
 * Theme meta boxes.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Post type.
 */
class MetaBoxes {
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
		add_action( 'add_meta_boxes', array( $this, 'nz_custom_meta_box' ), 10 );

		add_action( 'save_post', array( $this, 'nz_save_data' ), 10 );
	}

	/**
	 * Custom meta box.
	 */
	public function nz_custom_meta_box() {
		add_meta_box(
			'id_custom_box',
			'Custom Settings',
			array( $this, 'nz_custom_box_html' ),
			'minimo-hotels',
			'normal',
		);
	}

	/**
	 * Custom box html.
	 *
	 * @param  mixed $post
	 */
	public function nz_custom_box_html( $post ) {
		$price               = get_post_meta( $post->ID, '_custom_box_price', true );
		$address             = get_post_meta( $post->ID, '_custom_box_address', true );
		$country             = get_post_meta( $post->ID, '_custom_box_country', true );
		$gallery             = get_post_meta( $post->ID, '_custom_box_gallery', true );
		$gallery_text_button = 'Add Photo';

		wp_nonce_field( 'custom_box', '_custom_box_id' );

		nz_box_html(
			array(
				'name'  => 'nz_input_price',
				'id'    => 'nz_input_price',
				'title' => 'Price:',
			),
			$price
		);

		nz_box_html(
			array(
				'name'  => 'nz_input_address',
				'id'    => 'nz_input_address',
				'title' => 'Address:',
			),
			$address
		);

		nz_box_html(
			array(
				'name'  => 'nz_input_country',
				'id'    => 'nz_input_country',
				'title' => 'Country:',
			),
			$country
		);

		nz_button_html(
			array(
				'name'  => 'nz_button_gallery',
				'id'    => 'nz_button_gallery',
				'title' => 'Gallery:',
			),
			$gallery,
			$gallery_text_button
		);
	}

	/**
	 * Save data.
	 *
	 * @param  mixed $post_id post id.
	 */
	public function nz_save_data( $post_id ) {
		if ( isset( $_POST['nz_input_price'] ) ) {
			update_post_meta(
				$post_id,
				'_custom_box_price',
				$_POST['nz_input_price']
			);
		}

		if ( array_key_exists( 'nz_input_address', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_custom_box_address',
				$_POST['nz_input_address']
			);
		}

		if ( array_key_exists( 'nz_input_country', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_custom_box_country',
				$_POST['nz_input_country']
			);
		}
	}
}
