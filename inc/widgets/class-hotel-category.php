<?php
/**
 * Hotel category widgets.
 *
 * @package Minino
 */

namespace NZ_MINIMO_THEME\Inc\Widgets;

use NZ_MINIMO_THEME\Inc\WPH_Widget;

/**
 * Register Widget.
 */
class Hotel_Widget extends WPH_Widget {
	/**
	 * Construct.
	 */
	public function __construct() {
		$args = array(
			'label'       => esc_html__( 'Hotel Category Widget', 'minimo' ),
			'description' => esc_html__( 'This widgets show all hotel category', 'minimo' ),
		);

		$args['fields'] = array(
			array(
				'name'     => esc_html__( 'Title', 'minimo' ),
				'desc'     => esc_html__( 'Enter the widget title.', 'minimo' ),
				'id'       => 'title',
				'type'     => 'text',
				'class'    => 'widefat',
				'std'      => esc_html__( 'Hotel Category', 'minimo' ),
				'validate' => 'alpha_dash',
				'filter'   => 'strip_tags|esc_attr',
			),
		);

		$this->create_widget( $args );
	}

    /**
     * Generation view widget.
     *
     * @param array $args     Widget arguments.
     * @param array $instance Save values from database.
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $args['before_widget'];

        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        get_template_part( 'inc/widgets/template/widget', 'category' );

        echo $args['after_widget'];
    }
}
