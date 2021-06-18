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
		add_action( 'add_meta_boxes', array( $this, 'nz_custom_meta_box_price' ), 10 );
		add_action( 'add_meta_boxes', array( $this, 'nz_custom_meta_box_city' ), 10 );

		add_action( 'save_post', array( $this, 'nz_save_data_price' ), 10 );
		add_action( 'save_post', array( $this, 'nz_save_data_city' ), 10 );
	}

	/**
	 * Custom meta box price.
	 */
	public function nz_custom_meta_box_price() {
		add_meta_box(
			'id_price',
			'Price',
			array( $this, 'nz_custom_box_html_price' ),
			'minimo-hotels',
			'normal',
			'default'
		);
	}

	/**
	 * Custom meta box city.
	 */
	public function nz_custom_meta_box_city() {
		add_meta_box(
			'id_city',
			'City',
			array( $this, 'nz_custom_box_html_city' ),
			'minimo-hotels',
			'normal',
			'default'
		);
	}

	/**
	 * Custom box html.
	 *
	 * @param  mixed $post
	 */
	public function nz_custom_box_html_price( $post ) {
		$value = get_post_meta( $post->ID, '_custom_box_value', true );
		wp_nonce_field( 'custom_box', '_custom_box_id' );

		?>
		<label for="nz_input_field">Description for this field</label>
		<input name="nz_input_field" id="nz_input_field" class="postbox" type="text" value="<?php echo $value; ?>">
		<?php
	}

	public function nz_custom_box_html_city( $post ) {
		$value = get_post_meta( $post->ID, '_custom_box_value_city', true );
		wp_nonce_field( 'custom_box', '_custom_box_id' );

		?>
		<label for="nz_input_field">Description for this field</label>
		<input name="nz_input_field_city" id="nz_input_field_city" class="postbox" type="text" value="<?php echo $value; ?>">
		<?php
	}

	public function nz_save_data_price( $post_id ) {
		if ( array_key_exists( 'nz_input_field', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_custom_box_value',
				$_POST['nz_input_field']
			);
		}
	}

	public function nz_save_data_city( $post_id ) {
		if ( array_key_exists( 'nz_input_field_city', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_custom_box_value_city',
				$_POST['nz_input_field_city']
			);
		}
	}
}
