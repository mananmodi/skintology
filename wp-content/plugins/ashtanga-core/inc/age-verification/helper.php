<?php

if ( ! function_exists( 'ashtanga_core_get_age_verification' ) ) {
	/**
	 * Loads age-verification HTML
	 */
	function ashtanga_core_get_age_verification() {
		if ( 'yes' === ashtanga_core_get_post_value_through_levels( 'qodef_enable_age_verification' ) ) {
			ashtanga_core_load_age_verification_template();
		}
	}

	// Get age-verification HTML
	add_action( 'ashtanga_action_before_page_header', 'ashtanga_core_get_age_verification' );
}

if ( ! function_exists( 'ashtanga_core_body_class_age_verification' ) ) {
	/**
	 * Function that add additional class name into global class list for body tag
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function ashtanga_core_body_class_age_verification( $classes ) {
		if ( ! isset( $_COOKIE['disabledAgeVerification'] ) ) {
			$classes[] = 'qodef-age-verification--opened';
		}

		return $classes;
	}

	// Add plugin's body classes
	add_filter( 'body_class', 'ashtanga_core_body_class_age_verification' );
}

if ( ! function_exists( 'ashtanga_core_age_verification_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param int $position
	 * @param string $map
	 *
	 * @return int
	 */
	function ashtanga_core_age_verification_set_admin_options_map_position( $position, $map ) {

		if ( 'age-verification' === $map ) {
			$position = 98;
		}

		return $position;
	}

	add_filter( 'ashtanga_core_filter_admin_options_map_position', 'ashtanga_core_age_verification_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'ashtanga_core_load_age_verification_template' ) ) {
	/**
	 * Loads HTML template with params
	 */
	function ashtanga_core_load_age_verification_template() {
		$logo_image = ashtanga_core_get_option_value( 'admin', 'qodef_age_verification_logo_image' );

		$params                     = array();
		$params['logo_image']       = ! empty( $logo_image ) ? $logo_image : ashtanga_core_get_post_value_through_levels( 'qodef_logo_main' );
		$params['title']            = ashtanga_core_get_option_value( 'admin', 'qodef_age_verification_title' );
		$params['subtitle']         = ashtanga_core_get_option_value( 'admin', 'qodef_age_verification_subtitle' );
		$params['note']             = ashtanga_core_get_option_value( 'admin', 'qodef_age_verification_note' );
		$params['link']             = ashtanga_core_get_option_value( 'admin', 'qodef_age_verification_link' );
		$background_image           = ashtanga_core_get_option_value( 'admin', 'qodef_age_verification_background_image' );
		$params['content_style']    = ! empty( $background_image ) ? 'background-image: url(' . esc_url( wp_get_attachment_url( $background_image ) ) . ')' : '';
		$params['prevent_behavior'] = ashtanga_core_get_option_value( 'admin', 'qodef_age_verification_prevent_behavior' );

		$holder_classes           = array();
		$holder_classes[]         = ! empty( $params['prevent_behavior'] ) ? 'qodef-prevent--' . $params['prevent_behavior'] : 'qodef-prevent--cookies';
		$params['holder_classes'] = implode( ' ', $holder_classes );

		echo ashtanga_core_get_template_part( 'age-verification', 'templates/age-verification', '', $params );
	}
}
