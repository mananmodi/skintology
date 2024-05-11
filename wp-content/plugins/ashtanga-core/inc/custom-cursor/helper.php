<?php

if ( ! function_exists( 'ashtanga_core_set_custom_cursor_icon' ) ) {
	/**
	 * Function that add drag cursor icon into global js object
	 *
	 * @param $array
	 *
	 * @return mixed
	 */
	function ashtanga_core_set_custom_cursor_icon( $array ) {
		$array['dragCursor'] = ashtanga_core_get_svg_icon( 'drag-cursor' );

		return $array;
	}

	add_filter( 'ashtanga_filter_localize_main_js', 'ashtanga_core_set_custom_cursor_icon' );
}
