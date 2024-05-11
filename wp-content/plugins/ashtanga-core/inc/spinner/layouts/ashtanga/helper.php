<?php

if ( ! function_exists( 'ashtanga_core_add_ashtanga_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts - module layouts
	 *
	 * @return array
	 */
	function ashtanga_core_add_ashtanga_spinner_layout_option( $layouts ) {
		$layouts['ashtanga'] = esc_html__( 'Ashtanga', 'ashtanga-core' );

		return $layouts;
	}

	add_filter( 'ashtanga_core_filter_page_spinner_layout_options', 'ashtanga_core_add_ashtanga_spinner_layout_option' );
}

if ( ! function_exists( 'ashtanga_core_set_ashtanga_spinner_layout_as_default_option' ) ) {
	/**
	 * Function that set default value for page spinner layout options map
	 *
	 * @param string $default_value
	 *
	 * @return string
	 */
	function ashtanga_core_set_ashtanga_spinner_layout_as_default_option( $default_value ) {
		return 'ashtanga';
	}

	add_filter( 'ashtanga_core_filter_page_spinner_default_layout_option', 'ashtanga_core_set_ashtanga_spinner_layout_as_default_option' );
}
