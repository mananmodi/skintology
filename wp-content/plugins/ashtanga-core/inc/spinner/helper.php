<?php

if ( ! function_exists( 'ashtanga_core_is_page_spinner_enabled' ) ) {
	/**
	 * Function that check is option enabled
	 *
	 * @return bool
	 */
	function ashtanga_core_is_page_spinner_enabled() {
		return 'yes' === ashtanga_core_get_post_value_through_levels( 'qodef_enable_page_spinner' );
	}
}

if ( ! function_exists( 'ashtanga_core_set_page_spinner_body_classes' ) ) {
	/**
	 * Function that add additional class name into global class list for body tag
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function ashtanga_core_set_page_spinner_body_classes( $classes ) {
		$is_enabled = 'yes' === ashtanga_core_get_post_value_through_levels( 'qodef_page_spinner_fade_out_animation' );

		if ( ashtanga_core_is_page_spinner_enabled() && $is_enabled ) {
			$classes[] = 'qodef-spinner--fade-out';
		}

		return $classes;
	}

	add_filter( 'body_class', 'ashtanga_core_set_page_spinner_body_classes' );
}

if ( ! function_exists( 'ashtanga_core_load_page_spinner' ) ) {
	/**
	 * Loads Spinners HTML
	 */
	function ashtanga_core_load_page_spinner() {

		if ( ashtanga_core_is_page_spinner_enabled() ) {
			$parameters = array();

			ashtanga_core_template_part( 'spinner', 'templates/spinner', '', $parameters );
		}
	}

	add_action( 'ashtanga_action_after_body_tag_open', 'ashtanga_core_load_page_spinner' );
}

if ( ! function_exists( 'ashtanga_core_get_spinners_type' ) ) {
	/**
	 * Function that return module layout template content
	 *
	 * @return string that contains html content
	 */
	function ashtanga_core_get_spinners_type() {
		$html = '';
		$type = ashtanga_core_get_post_value_through_levels( 'qodef_page_spinner_type' );

		if ( ! empty( $type ) ) {
			$html = ashtanga_core_get_template_part( 'spinner', 'layouts/' . $type . '/templates/' . $type );
		}

		echo qode_framework_wp_kses_html( 'svg custom', $html );
	}
}

if ( ! function_exists( 'ashtanga_core_set_page_spinner_classes' ) ) {
	/**
	 * Function that return classes for page spinner area
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function ashtanga_core_set_page_spinner_classes( $classes ) {
		$type = ashtanga_core_get_post_value_through_levels( 'qodef_page_spinner_type' );

		if ( ! empty( $type ) ) {
			$classes[] = 'qodef-layout--' . esc_attr( $type );
		}

		return $classes;
	}

	add_filter( 'ashtanga_core_filter_page_spinner_classes', 'ashtanga_core_set_page_spinner_classes' );
}

if ( ! function_exists( 'ashtanga_core_set_page_spinner_styles' ) ) {
	/**
	 * Function that generates module inline styles
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function ashtanga_core_set_page_spinner_styles( $style ) {
		$spinner_styles = array();

		$spinner_background_color = ashtanga_core_get_post_value_through_levels( 'qodef_page_spinner_background_color' );
		$spinner_color            = ashtanga_core_get_post_value_through_levels( 'qodef_page_spinner_color' );

		if ( ! empty( $spinner_background_color ) ) {
			$spinner_styles['background-color'] = $spinner_background_color;
		}

		if ( ! empty( $spinner_color ) ) {
			$spinner_styles['color'] = $spinner_color;
		}

		if ( ! empty( $spinner_styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-page-spinner .qodef-m-inner', $spinner_styles );
		}

		return $style;
	}

	add_filter( 'ashtanga_filter_add_inline_style', 'ashtanga_core_set_page_spinner_styles' );
}
