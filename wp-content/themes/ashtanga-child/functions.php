<?php

if ( ! function_exists( 'ashtanga_child_theme_enqueue_scripts' ) ) {
	/**
	 * Function that enqueue theme's child style
	 */
	function ashtanga_child_theme_enqueue_scripts() {
		$main_style = 'ashtanga-main';

		wp_enqueue_style( 'ashtanga-child-style', get_stylesheet_directory_uri() . '/style.css', array( $main_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'ashtanga_child_theme_enqueue_scripts' );
}
