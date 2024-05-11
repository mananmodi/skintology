<?php

if ( ! function_exists( 'ashtanga_core_add_button_variation_filled' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_button_variation_filled( $variations ) {
		$variations['filled'] = esc_html__( 'Filled', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_button_layouts', 'ashtanga_core_add_button_variation_filled' );
}
