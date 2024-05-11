<?php

if ( ! function_exists( 'ashtanga_core_add_clients_list_variation_image_only' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_clients_list_variation_image_only( $variations ) {
		$variations['image-only'] = esc_html__( 'Image Only', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_clients_list_layouts', 'ashtanga_core_add_clients_list_variation_image_only' );
}
