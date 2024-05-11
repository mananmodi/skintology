<?php

if ( ! function_exists( 'ashtanga_core_add_countdown_variation_simple' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_countdown_variation_simple( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_countdown_layouts', 'ashtanga_core_add_countdown_variation_simple' );
}