<?php

if ( ! function_exists( 'ashtanga_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function ashtanga_load_page_mobile_header() {
		// Include mobile header template
		echo apply_filters( 'ashtanga_filter_mobile_header_template', ashtanga_get_template_part( 'mobile-header', 'templates/mobile-header' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	add_action( 'ashtanga_action_page_header_template', 'ashtanga_load_page_mobile_header' );
}

if ( ! function_exists( 'ashtanga_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function ashtanga_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'ashtanga_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'ashtanga' ) ) );

		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}

	add_action( 'ashtanga_action_after_include_modules', 'ashtanga_register_mobile_navigation_menus' );
}
