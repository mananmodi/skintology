<?php

if ( ! function_exists( 'ashtanga_core_add_social_share_variation_list' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_social_share_variation_list( $variations ) {
		$variations['list'] = esc_html__( 'List', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_social_share_layouts', 'ashtanga_core_add_social_share_variation_list' );
	add_filter( 'ashtanga_core_filter_social_share_layout_options', 'ashtanga_core_add_social_share_variation_list' );
}
