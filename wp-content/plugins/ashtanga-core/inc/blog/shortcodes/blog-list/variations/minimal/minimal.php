<?php

if ( ! function_exists( 'ashtanga_core_add_blog_list_variation_minimal' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_blog_list_variation_minimal( $variations ) {
		$variations['minimal'] = esc_html__( 'Minimal', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_blog_list_layouts', 'ashtanga_core_add_blog_list_variation_minimal' );
	add_filter( 'ashtanga_core_filter_simple_blog_list_widget_layouts', 'ashtanga_core_add_blog_list_variation_minimal' );
}
