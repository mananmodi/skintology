<?php

if ( ! function_exists( 'ashtanga_set_404_page_inner_classes' ) ) {
	/**
	 * Function that return classes for the page inner div from header.php
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function ashtanga_set_404_page_inner_classes( $classes ) {

		if ( is_404() ) {
			$classes = 'qodef-content-full-width';
		}

		return $classes;
	}

	add_filter( 'ashtanga_filter_page_inner_classes', 'ashtanga_set_404_page_inner_classes' );
}

if ( ! function_exists( 'ashtanga_get_404_page_parameters' ) ) {
	/**
	 * Function that set 404-page area content parameters
	 */
	function ashtanga_get_404_page_parameters() {

		$params = array(
			'custom_text' => esc_html__( '404', 'ashtanga' ),
			'title'       => esc_html__( 'eror page / page does not exist', 'ashtanga' ),
			'text'        => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Eiusmod. Tempor incididunt ut labore et dolore magna aliqua.', 'ashtanga' ),
			'button_text' => esc_html__( 'Homepage', 'ashtanga' ),
		);

		return apply_filters( 'ashtanga_filter_404_page_template_params', $params );
	}
}
