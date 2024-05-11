<?php

if ( ! function_exists( 'ashtanga_core_add_pulse_circles_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts - module layouts
	 *
	 * @return array
	 */
	function ashtanga_core_add_pulse_circles_spinner_layout_option( $layouts ) {
		$layouts['pulse-circles'] = esc_html__( 'Pulse Circles', 'ashtanga-core' );

		return $layouts;
	}

	add_filter( 'ashtanga_core_filter_page_spinner_layout_options', 'ashtanga_core_add_pulse_circles_spinner_layout_option' );
}
