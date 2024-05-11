<?php

if ( ! function_exists( 'ashtanga_core_register_timetable_events_for_meta_options' ) ) {
    /**
     * Function that register timetable event post type for meta box options
     *
     * @param array $post_types
     *
     * @return array
     */
    function ashtanga_core_register_timetable_events_for_meta_options( $post_types ) {

        if ( qode_framework_is_installed( 'timetable' ) ) {
            $timetable_events_settings = timetable_events_settings();
            $post_types[] = $timetable_events_settings['slug'];

        }

        return $post_types;
    }

    add_filter( 'qode_framework_filter_meta_box_save', 'ashtanga_core_register_timetable_events_for_meta_options' );
    add_filter( 'qode_framework_filter_meta_box_remove', 'ashtanga_core_register_timetable_events_for_meta_options' );
}

if ( ! function_exists( 'ashtanga_core_include_timetable_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function ashtanga_core_include_timetable_plugin_is_installed( $installed, $plugin ) {
		if ( 'timetable' === $plugin ) {
			return function_exists( 'timetable_init' );
		}

		return $installed;
	}

	add_filter( 'qode_framework_filter_is_plugin_installed', 'ashtanga_core_include_timetable_plugin_is_installed', 10, 2 );
}
