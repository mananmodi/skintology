<?php

if ( ! function_exists( 'ashtanga_core_add_button_variation_textual' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_button_variation_textual( $variations ) {
		$variations['textual'] = esc_html__( 'Textual', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_button_layouts', 'ashtanga_core_add_button_variation_textual' );
}
