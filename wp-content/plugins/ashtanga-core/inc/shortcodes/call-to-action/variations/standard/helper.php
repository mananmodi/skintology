<?php

if ( ! function_exists( 'ashtanga_core_add_call_to_action_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_call_to_action_variation_standard( $variations ) {
		$variations['standard'] = esc_html__( 'Standard', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_call_to_action_layouts', 'ashtanga_core_add_call_to_action_variation_standard' );
}
