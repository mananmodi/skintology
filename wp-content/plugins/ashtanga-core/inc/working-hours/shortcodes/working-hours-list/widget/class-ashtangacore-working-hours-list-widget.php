<?php

if ( ! function_exists( 'ashtanga_core_add_working_hours_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function ashtanga_core_add_working_hours_list_widget( $widgets ) {
		$widgets[] = 'AshtangaCore_Working_Hours_List_Widget';

		return $widgets;
	}

	add_filter( 'ashtanga_core_filter_register_widgets', 'ashtanga_core_add_working_hours_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AshtangaCore_Working_Hours_List_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'ashtanga-core' ),
				)
			);
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'ashtanga_core_working_hours_list',
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'ashtanga_core_working_hours_list' );
				$this->set_name( esc_html__( 'Ashtanga Working Hours List', 'ashtanga-core' ) );
				$this->set_description( esc_html__( 'Add a working hours list element into widget areas', 'ashtanga-core' ) );
			}
		}

		public function render( $atts ) {
			echo AshtangaCore_Working_Hours_List_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
