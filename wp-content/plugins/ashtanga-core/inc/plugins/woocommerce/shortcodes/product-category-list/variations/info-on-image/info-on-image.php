<?php

if ( ! function_exists( 'ashtanga_core_add_product_category_list_variation_info_on_image' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_product_category_list_variation_info_on_image( $variations ) {
		$variations['info-on-image'] = esc_html__( 'Info On Image', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_product_category_list_layouts', 'ashtanga_core_add_product_category_list_variation_info_on_image' );
}
