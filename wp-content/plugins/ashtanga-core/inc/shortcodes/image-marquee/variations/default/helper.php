<?php

if ( ! function_exists( 'ashtanga_core_add_image_marquee_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_image_marquee_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_image_marquee_layouts', 'ashtanga_core_add_image_marquee_variation_default' );
}
