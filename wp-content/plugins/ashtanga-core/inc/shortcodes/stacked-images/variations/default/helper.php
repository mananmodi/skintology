<?php

if ( ! function_exists( 'ashtanga_core_add_stacked_images_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_stacked_images_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_stacked_images_layouts', 'ashtanga_core_add_stacked_images_variation_default' );
}
