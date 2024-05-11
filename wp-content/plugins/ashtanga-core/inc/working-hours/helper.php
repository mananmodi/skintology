<?php

if ( ! function_exists( 'ashtanga_core_include_working_hours_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function ashtanga_core_include_working_hours_shortcodes() {
		foreach ( glob( ASHTANGA_CORE_INC_PATH . '/working-hours/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}

	add_action( 'qode_framework_action_before_shortcodes_register', 'ashtanga_core_include_working_hours_shortcodes' );
}

if ( ! function_exists( 'ashtanga_core_include_working_hours_widgets' ) ) {
	/**
	 * Function that includes widgets
	 */
	function ashtanga_core_include_working_hours_widgets() {
		foreach ( glob( ASHTANGA_CORE_INC_PATH . '/working-hours/shortcodes/*/widget/include.php' ) as $widget ) {
			include_once $widget;
		}
	}

	add_action( 'qode_framework_action_before_widgets_register', 'ashtanga_core_include_working_hours_widgets' );
}

if ( ! function_exists( 'ashtanga_core_set_working_hours_template_params' ) ) {
	/**
	 * Function that set working hours area content parameters
	 *
	 * @param array $params
	 *
	 * @return array
	 */
	function ashtanga_core_set_working_hours_template_params( $params ) {
		$days = array(
			'monday'    => esc_html__( 'Monday', 'ashtanga-core' ),
			'tuesday'   => esc_html__( 'Tuesday', 'ashtanga-core' ),
			'wednesday' => esc_html__( 'Wednesday', 'ashtanga-core' ),
			'thursday'  => esc_html__( 'Thursday', 'ashtanga-core' ),
			'friday'    => esc_html__( 'Friday', 'ashtanga-core' ),
			'saturday'  => esc_html__( 'Saturday', 'ashtanga-core' ),
			'sunday'    => esc_html__( 'Sunday', 'ashtanga-core' ),
		);

		foreach ( $days as $day => $label ) {
			$option = ashtanga_core_get_post_value_through_levels( 'qodef_working_hours_' . $day );

			$params[ $day ] = ! empty( $option ) ? esc_attr( $option ) : '';
		}

		return $params;
	}

	add_filter( 'ashtanga_core_filter_working_hours_template_params', 'ashtanga_core_set_working_hours_template_params' );
}

if ( ! function_exists( 'ashtanga_core_set_working_hours_special_template_params' ) ) {
	/**
	 * Function that set working hours area special content parameters
	 *
	 * @param array $params
	 *
	 * @return array
	 */
	function ashtanga_core_set_working_hours_special_template_params( $params ) {
		$special_days = ashtanga_core_get_post_value_through_levels( 'qodef_working_hours_special_days' );
		$special_text = ashtanga_core_get_post_value_through_levels( 'qodef_working_hours_special_text' );

		if ( ! empty( $special_days ) ) {
			$special_days = array_filter( (array) $special_days, 'strlen' );
		}

		$params['special_days'] = $special_days;
		$params['special_text'] = esc_attr( $special_text );

		return $params;
	}

	add_filter( 'ashtanga_core_filter_working_hours_special_template_params', 'ashtanga_core_set_working_hours_special_template_params' );
}

if ( ! function_exists( 'ashtanga_core_working_hours_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param int $position
	 * @param string $map
	 *
	 * @return int
	 */
	function ashtanga_core_working_hours_set_admin_options_map_position( $position, $map ) {

		if ( 'working-hours' === $map ) {
			$position = 90;
		}

		return $position;
	}

	add_filter( 'ashtanga_core_filter_admin_options_map_position', 'ashtanga_core_working_hours_set_admin_options_map_position', 10, 2 );
}
