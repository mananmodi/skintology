<?php

if ( ! function_exists( 'ashtanga_core_add_icon_with_text_variation_before_title' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_icon_with_text_variation_before_title( $variations ) {
		$variations['before-title'] = esc_html__( 'Before Title', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_icon_with_text_layouts', 'ashtanga_core_add_icon_with_text_variation_before_title' );
}
