<?php

if ( ! function_exists( 'ashtanga_register_justified_gallery_scripts' ) ) {
	/**
	 * Function that register module 3rd party scripts
	 */
	function ashtanga_register_justified_gallery_scripts() {
		wp_register_script( 'jquery-justified-gallery', ASHTANGA_INC_ROOT . '/justified-gallery/assets/js/plugins/jquery.justifiedGallery.min.js', array( 'jquery' ), true );
	}

	add_action( 'ashtanga_action_before_main_js', 'ashtanga_register_justified_gallery_scripts' );
}

if ( ! function_exists( 'ashtanga_include_justified_gallery_scripts' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts
	 *
	 * @param array $atts
	 */
	function ashtanga_include_justified_gallery_scripts( $atts ) {

		if ( isset( $atts['behavior'] ) && 'justified-gallery' === $atts['behavior'] ) {
			wp_enqueue_script( 'jquery-justified-gallery' );
		}
	}

	add_action( 'ashtanga_core_action_list_shortcodes_load_assets', 'ashtanga_include_justified_gallery_scripts' );
}

if ( ! function_exists( 'ashtanga_register_justified_gallery_scripts_for_list_shortcodes' ) ) {
	/**
	 * Function that set module 3rd party scripts for list shortcodes
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function ashtanga_register_justified_gallery_scripts_for_list_shortcodes( $scripts ) {

		$scripts['jquery-justified-gallery'] = array(
			'registered' => true,
		);

		return $scripts;
	}

	add_filter( 'ashtanga_core_filter_register_list_shortcode_scripts', 'ashtanga_register_justified_gallery_scripts_for_list_shortcodes' );
}
