<?php

if ( ! function_exists( 'ashtanga_core_add_pricing_table_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_pricing_table_variation_standard( $variations ) {

		$variations['standard'] = esc_html__( 'Standard', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_pricing_table_layouts', 'ashtanga_core_add_pricing_table_variation_standard' );
}
