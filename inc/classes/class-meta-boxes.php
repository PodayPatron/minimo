<?php
/**
 * Theme meta boxes.
 *
 * @package Minimo
 */

namespace NZ_MINIMO_THEME\Inc;

use NZ_MINIMO_THEME\Inc\Traits\Singleton;

/**
 * Meta Boxes.
 */
class Meta_Boxes {
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
			'normal'
		);
	}

	/**
	 * Custom box html.
	 */
	public function nz_custom_box_html() {
		$price     = get_post_meta( get_the_ID(), '_custom_box_price', true );
		$address   = get_post_meta( get_the_ID(), '_custom_box_address', true );
		$country   = get_post_meta( get_the_ID(), '_custom_box_country', true );
		$id_images = get_post_meta( get_the_ID(), '_custom_box_gallery', true );

		wp_nonce_field( 'custom_box', '_custom_box_id' );

		nz_box_html(
			array(
				'name'  => 'nz_input_price',
				'id'    => 'nz_input_price',
				'title' => esc_html__( 'Price:' ),
			),
			$price
		);

		nz_box_html(
			array(
				'name'  => 'nz_input_address',
				'id'    => 'nz_input_address',
				'title' => esc_html__( 'Address:' ),
			),
			$address
		);

		nz_box_html(
			array(
				'name'  => 'nz_input_country',
				'id'    => 'nz_input_country',
				'title' => esc_html__( 'Country:' ),
			),
			$country
		);

		nz_button_html(
			array(
				'name'      => 'nz_button_gallery',
				'id'        => 'nz_button_gallery',
				'title'     => esc_html__( 'Gallery:' ),
				'id_images' => $id_images,
				'class'     => 'custom-img-id',
			)
		);
	}

	/**
	 * Save data.
	 *
	 * @param  int $post_id post get id.
	 */
	public function nz_save_data( $post_id ) {
		if ( isset( $_POST['nz_input_price'] ) ) {
			update_post_meta(
				$post_id,
				'_custom_box_price',
				esc_html( $_POST['nz_input_price'] )
			);
		}

		if ( isset( $_POST['nz_input_address'] ) ) {
			update_post_meta(
				$post_id,
				'_custom_box_address',
				esc_html( $_POST['nz_input_address'] )
			);
		}

		if ( isset( $_POST['nz_input_country'] ) ) {
			update_post_meta(
				$post_id,
				'_custom_box_country',
				esc_html( $_POST['nz_input_country'] )
			);
		}

		if ( isset( $_POST['nz_button_gallery'] ) ) {
			$id_photos = explode( ',', esc_html( wp_unslash( $_POST['nz_button_gallery'] ) ) );

			update_post_meta(
				$post_id,
				'_custom_box_gallery',
				$id_photos
			);
		}
	}
}
