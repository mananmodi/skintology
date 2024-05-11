<?php

if ( ! function_exists( 'ashtanga_core_add_timetable_events_list_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_timetable_events_list_variation_info_below( $variations ) {
		$variations['info-below'] = esc_html__( 'Info Below', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_timetable_events_list_layouts', 'ashtanga_core_add_timetable_events_list_variation_info_below' );
}
