<?php

if ( ! function_exists( 'ashtanga_core_add_fixed_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function ashtanga_core_add_fixed_header_option( $options ) {
		$options['fixed'] = esc_html__( 'Fixed', 'ashtanga-core' );

		return $options;
	}

	add_filter( 'ashtanga_core_filter_header_scroll_appearance_option', 'ashtanga_core_add_fixed_header_option' );
}
