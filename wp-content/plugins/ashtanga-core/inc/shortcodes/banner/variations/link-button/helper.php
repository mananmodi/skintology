<?php

if ( ! function_exists( 'ashtanga_core_add_banner_variation_link_button' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_banner_variation_link_button( $variations ) {
		$variations['link-button'] = esc_html__( 'Link Button', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_banner_layouts', 'ashtanga_core_add_banner_variation_link_button' );
}
