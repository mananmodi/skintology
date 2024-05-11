<?php

if ( ! function_exists( 'ashtanga_core_add_image_with_text_variation_text_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_image_with_text_variation_text_below( $variations ) {
		$variations['text-below'] = esc_html__( 'Text Below', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_image_with_text_layouts', 'ashtanga_core_add_image_with_text_variation_text_below' );
}
