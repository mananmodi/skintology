<?php

if ( ! function_exists( 'ashtanga_core_add_social_share_variation_text' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_social_share_variation_text( $variations ) {
		$variations['text'] = esc_html__( 'Text', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_social_share_layouts', 'ashtanga_core_add_social_share_variation_text' );
	add_filter( 'ashtanga_core_filter_social_share_layout_options', 'ashtanga_core_add_social_share_variation_text' );
}

if ( ! function_exists( 'ashtanga_core_set_default_social_share_variation_text' ) ) {
	/**
	 * Function that set default variation layout for this module
	 *
	 * @return string
	 */
	function ashtanga_core_set_default_social_share_variation_text() {
		return 'text';
	}

	add_filter( 'ashtanga_core_filter_social_share_layout_default_value', 'ashtanga_core_set_default_social_share_variation_text' );
}
