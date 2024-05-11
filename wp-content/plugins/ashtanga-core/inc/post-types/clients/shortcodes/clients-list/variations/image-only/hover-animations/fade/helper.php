<?php

if ( ! function_exists( 'ashtanga_core_filter_clients_list_image_only_fade' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_filter_clients_list_image_only_fade( $variations ) {
		$variations['fade'] = esc_html__( 'Fade', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_clients_list_image_only_animation_options', 'ashtanga_core_filter_clients_list_image_only_fade' );
}
