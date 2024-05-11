<?php

if ( ! function_exists( 'ashtanga_core_add_banner_variation_link_overlay' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_banner_variation_link_overlay( $variations ) {
		$variations['link-overlay'] = esc_html__( 'Link Overlay', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_banner_layouts', 'ashtanga_core_add_banner_variation_link_overlay' );
}
